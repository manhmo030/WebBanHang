<?php

namespace App\Http\Controllers\Admim;

use App\Http\Controllers\Controller;
use App\Models\GiamGia;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    public function showCoupon()
    {
        $giamgia = GiamGia::orderBy('giamgia_id', 'DESC')->paginate(10);
        return view('Admin.coupon.listCoupon', compact('giamgia'));
    }

    public function showFormAddCoupon()
    {

        return view('Admin.coupon.addCoupon');
    }

    public function addCoupon(Request $request)
    {
        $data = $request->all();
        GiamGia::create($data);
        return redirect('/admin/coupon');
    }

    public function showFormUpdateCoupon($giamgia_id){
        $giamgia_item = GiamGia::where('giamgia_id', $giamgia_id)->first();
        return view('Admin.coupon.updateCoupon', compact('giamgia_item'));
    }

    public function updateCoupon(Request $request){
        $data = $request->all();
        GiamGia::where('giamgia_id', $data['giamgia_id'])->update([
            'magiamgia' => $data['magiamgia'],
            'soluong' => $data['soluong'],
            'hinhthucgiamgia' => $data['hinhthucgiamgia'],
            'sotiengiamgia' => $data['sotiengiamgia'],
            'ngayhethan' => $data['ngayhethan'],
            'title' => $data['title']
        ]);
        return redirect('/admin/coupon');
    }

    public function deleteCouponAjax(Request $request){
        if($request->has('selected_items')){
            $couponItems = $request->selected_items;
            GiamGia::whereIn('giamgia_id', $couponItems)->delete();
            return response()->json(['massage', 'Xóa thành công']);
        }else{
            return response()->json(['massage', 'Xóa ko thành công']);
        }

    }
}
