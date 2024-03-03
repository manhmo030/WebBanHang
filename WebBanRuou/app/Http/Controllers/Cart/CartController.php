<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\ChiTietGioHang;
use App\Models\GiamGia;
use App\Models\GioHang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cart; //

    function __construct(GioHang $cart)
    {
        $this->cart = $cart;
    }

    public function showFormCart()
    {
        if (auth()->check()) {
            $makhachhang = auth()->user()->makhachhang;
            $cartData = $this->cart->showCart($makhachhang);
            if ($cartData['cartItems']->isNotEmpty()) {
                // Session::put('subtotal', $cartData['allTotal']);
                return view('User.cart.cart', compact('cartData'));
            } else {
                $errorMessage = 'Chưa có sản phẩm nào trong giỏ hàng';
                return view('User.cart.cart', compact('cartData', 'errorMessage'));
            }
        } else {
            return redirect('/user/login');
        }
    }

    public function addCart(Request $request)
    {
        if (auth()->check()) {
            $makhachhang = auth()->user()->makhachhang;
            $data = $request->all();
            $cart = $this->cart->addCartItem($makhachhang, $data);
            return redirect('user/cart');
        } else {
            return redirect('/user/login');
        }
    }

    public function addCartAjax(Request $request)
    {
        if (auth()->check()) {
            $makhachhang = auth()->user()->makhachhang;
            $productId = $request->input('product_id');
            $quantity = 1;
            $data = [
                'masp' => $productId,
                'quantity' => $quantity
            ];
            $this->cart->addCartItem($makhachhang, $data);
            // Trả về response JSON với thông báo
            return response()->json(['message' => 'Sản phẩm đã thêm vào giỏ hàng']);
        } else {
            return response()->json(['error' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng'], 401);
        }
    }

    public function updateCartAjax(Request $request)
    {
        if ($request->has('cart_items')) {
            $cartItems = $request->input('cart_items');

            foreach ($cartItems as $mactgiohang => $quantity) {
                $ctgiohang = ChiTietGioHang::where('mactgiohang', $mactgiohang)->first();
                $total = $ctgiohang->gia * $quantity;
                ChiTietGioHang::where('mactgiohang', $mactgiohang)->update(['soluong' => $quantity, 'tongcong' => $total]);
                $updatedCartItems[] = [ //update tổng tiền từng sp
                    'mactgiohang' => $mactgiohang,
                    'total' => $total
                ];
            }

            $makhachhang = auth()->user()->makhachhang;
            $subTotal = $this->cart->allTotal($makhachhang);

            return response()->json(['message' => 'Cập nhật giỏ hàng thành công', 'subTotal' => $subTotal, 'updatedCartItems' => $updatedCartItems]);
        } else {
            return response()->json(['message' => 'không lấy được cartItems']);
        }
    }

    public function deleteCart($mactgiohang)
    {
        ChiTietGioHang::destroy($mactgiohang);
        return redirect('user/cart');
    }

    public function deleteCartAjax(Request $request)
    {
        if ($request->has('cartDetail_id')) {  //if-else để debug
            $cartDetailId = $request->input('cartDetail_id');
            ChiTietGioHang::destroy($cartDetailId);

            $makhachhang = auth()->user()->makhachhang;
            $subtotal = $this->cart->allTotal($makhachhang);
            return response()->json(['message' => 'Xóa sp thành công', 'subtotal' => $subtotal]);
        } else {
            return response()->json(['message' => 'Xóa ko thành công']);
        }
    }

    public function checkCoupon(Request $request)
    {
        $coupon_input = $request->coupon;
        $couponn = GiamGia::where('magiamgia', $coupon_input)->first();
        if ($couponn) {
            if ($couponn->soluong > 0) {
                $a = Carbon::now();
                if ($a < $couponn->ngayhethan) {
                    $message = 'Áp dụng phiếu giảm giá thành công';
                    return redirect()->back()->with(compact('couponn', 'message'));
                } else {
                    return redirect()->back()
                        ->with('message', 'Tiếc quá, phiếu giảm giá này đã hết thời gian sử dụng');
                }
            } else {
                return redirect()->back()
                    ->with('message', 'Tiếc quá, phiếu giảm giá này không còn');
            }
        } else {
            return redirect()->back()
                ->with('message', 'Phiếu giảm giá không tồn tại');
        }
    }
}
