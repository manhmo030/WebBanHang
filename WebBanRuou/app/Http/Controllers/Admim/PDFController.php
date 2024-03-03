<?php

namespace App\Http\Controllers\Admim;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function exportOrder($madonhang)
    {
        $data = ChiTietDonHang::where('madonhang', $madonhang)
            ->join('tbl_sanpham', 'tbl_sanpham.masp', '=', 'tbl_ctdonhang.masp')
            ->select('tbl_sanpham.*', 'tbl_ctdonhang.*')
            ->get()  // get() trả về 1 collection
            ->toArray();// loadView yêu cầu dữ liệu được truyền vào phải là một mảng (array)

        $pdf = PDF::loadView('Admin.Order.exportOrderDetailPdf', compact('data'));
        return $pdf->download('OrderDetail.pdf'); //Tên tệp pdf tải xuống
    }
}
