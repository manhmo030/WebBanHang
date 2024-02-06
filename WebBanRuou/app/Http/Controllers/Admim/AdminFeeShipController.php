<?php

namespace App\Http\Controllers\Admim;

use App\Http\Controllers\Controller;
use App\Models\QuanHuyen;
use App\Models\TinhThanhPho;
use App\Models\XaPhuongThitran;
use Illuminate\Http\Request;

class AdminFeeShipController extends Controller
{
    public function showFormFeeShip()
    {
        $xaphuongthitran = XaPhuongThitran::join('tbl_quanhuyen', 'tbl_quanhuyen.maqh', '=', 'tbl_xaphuongthitran.maqh')
            ->join('tbl_tinhthanhpho', 'tbl_tinhthanhpho.matp', '=', 'tbl_quanhuyen.matp')
            ->paginate(30);
        return view('Admin.feeship.listFeeship', compact('xaphuongthitran'));
    }

    public function showFormAddFeeShip()
    {
        $tinhthanhpho = TinhThanhPho::get();
        return view('Admin.feeship.addFeeship', compact('tinhthanhpho'));
    }

    public function getDistric($provinceId)
    {
        $districs = QuanHuyen::where('matp', $provinceId)->get();
        return response()->json($districs);
    }

    public function getWards($districtId)
    {
        $wards = XaPhuongThitran::where('maqh', $districtId)->get();
        return response()->json($wards);
    }

    public function updateFeeship(Request $request, $feeshipId){
        if($request->has('feeship_value')){
            $feeshipValue = $request->feeship_value;
            XaPhuongThitran::where('xaid', $feeshipId)->update(['phivanchuyen'=>$feeshipValue]);
            return response()->json(['message' => 'cập nhật thành công']);
        }else{
            return response()->json(['message' => 'cập nhật ko thành công']);
        }

    }

}
