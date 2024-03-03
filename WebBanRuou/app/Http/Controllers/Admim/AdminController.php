<?php

namespace App\Http\Controllers\Admim;

use App\Exports\SanPhamExport;
use App\Http\Controllers\Controller;
use App\Imports\SanPhamImport;
use App\Models\ChatLieu;
use App\Models\ChiTietSanPham;
use App\Models\LoaiSanPham;
use App\Models\Ncc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function sqlList()
    {
        $nccList = Ncc::all();
        $loaisanphamList = LoaiSanPham::all();
        $chatlieuList = ChatLieu::all();
        return compact('nccList', 'loaisanphamList', 'chatlieuList');
    }

    public function showDashBoard()
    {
        $allProduct = SanPham::with('chiTietSanPham')->paginate(10);
        return view('Admin.products.listProduct', compact('allProduct'));
    }

    public function showFormAddProduct()
    {
        $data = $this->sqlList();
        return view('Admin.products.addProduct', $data);
    }

    public function addProduct(Request $request)
    {

        $productData = $request->all();
        $product = SanPham::create($productData);

        $productId = $product->masp;
        ChiTietSanPham::create([
            'masp' => $productId,
            'soluong' => $productData['soluong'],
            'baoquan' => $productData['baoquan'],
            'huongvi' => $productData['huongvi'],
            'dungtich' => $productData['dungtich']
        ]);
        return redirect('/admin/show-dash-board');
    }

    public function showFormUpdateProduct($masp)
    {
        $data = $this->sqlList();
        $product = SanPham::with('chiTietSanPham')->where('masp', $masp)->first();

        return view('Admin.products.updateProduct', compact('data', 'product'));
    }

    public function updateProduct(Request $request, $masp)
    {
        $product = $request->all();
        if ($product['anh_new'] == '') {
            $anh = $product['anh_old'];
        } else {
            $anh = $product['anh_new'];
        }

        SanPham::where('masp', $masp)->update([
            'tensp' => $product['tensp'],
            'maloai' => $product['maloai'],
            'machatlieu' => $product['machatlieu'],
            'mancc' => $product['mancc'],
            'anh' => $anh,
            'dongianhap' => $product['dongianhap'],
            'dongiaban' => $product['dongiaban'],
            'ghichu' => $product['ghichu']
        ]);
        ChiTietSanPham::where('masp', $masp)->update([
            'dungtich' => $product['dungtich'],
            'baoquan' => $product['baoquan'],
            'huongvi' => $product['huongvi'],
            'soluong' => $product['soluong']
        ]);
        return redirect('/admin/show-dash-board');
    }

    public function deleteProduct($masp)
    {
        SanPham::destroy($masp);
        return redirect('/admin/show-dash-board');
    }

    public function deleteProductAjax($masp)
    {
        SanPham::destroy($masp);
        return response()->json(['message' => 'Xóa thành công']);
    }

    public function deleteMultipleProducts(Request $request)
    {
        $list_id = $request->selected_products;
        SanPham::destroy($list_id);
        return redirect('/admin/show-dash-board');
    }

    public function searchKeyword(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = SanPham::with('chiTietSanPham')
            ->where('masp', $keyword)
            ->orWhere('tensp', 'LIKE', '%' . $keyword . '%')
            ->get();
        return view('Admin.products.searchProduct', compact('products'));
    }

    public function exportProductsExcel()
    {
        return Excel::download(new SanPhamExport, 'products.xlsx');
    }

    public function importProductsExcel(Request $request)
    {
        if ($request->hasFile('fileImport')) {
            $file = $request->file('fileImport'); //lấy tên file
            $filePath = $file->getPathName(); //lấy đường dẫn tạm thời
            try {
                Excel::import(new SanPhamImport, $filePath);
            } catch (\Exception $e) {
                return back()->with('success', 'Dữ liệu trong file bị lỗi');
            }

            return back()->with('success', 'Dữ liệu đã được import thành công!');
        } else {
            return back()->with('error', 'Vui lòng chọn một tệp để import.');
        }
    }
}
