<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showFormIndex()
    {
        // $b = Auth::user();
        // dd($b);

        $productType = LoaiSanPham::all();
        $products = SanPham::paginate(12);
        return view('User.products.index', compact('products', 'productType'));
    }

    public function showFormProductType($maloai)
    {
        $productType = LoaiSanPham::all();
        $products = SanPham::where('maloai', $maloai)->paginate(8);
        return view('User.products.productType', compact('products', 'productType'));
    }

    public function showFormProductDetail($masp)
    {
        $product = SanPham::with('chiTietSanPham', 'ncc', 'chatLieu')->where('masp', $masp)->first();

        $relatedProduct = SanPham::where('maloai', $product->maloai)->get();
        return view('User.products.productDetail', compact('product', 'relatedProduct'));
    }
}
