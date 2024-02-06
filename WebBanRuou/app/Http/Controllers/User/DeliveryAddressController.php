<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\QuanHuyen;
use App\Models\ThongTinNhanHang;
use App\Models\TinhThanhPho;
use App\Models\XaPhuongThitran;
use Illuminate\Http\Request;

class DeliveryAddressController extends Controller
{
    private $ttnh;
    public function __construct(ThongTinNhanHang $ttnh)
    {
        $this->ttnh = $ttnh;
    }
    public function showFormDeliveryAddress()
    {
        $makhachhang = auth()->user()->makhachhang;
        $address = $this->ttnh->thongtinnhanhangByUserId($makhachhang);
        return view('User.deliveryAddress.listDeliveryAddress', compact('address'));
    }

    public function showFormAddDeliveryAddress()
    {
        $tinhthanhpho = TinhThanhPho::get();
        return view('User.deliveryAddress.addDeliveryAddrerss', compact('tinhthanhpho'));
    }

    public function getDistricts($provinceId)
    {
        $district = QuanHuyen::where('matp', $provinceId)->get();
        return response()->json($district);
    }

    public function getWards($districtId)
    {
        $ward = XaPhuongThitran::where('maqh', $districtId)->get();
        return response()->json($ward);
    }

    public function addDeliveryAddress(Request $request)
    {
        $makhachhang = auth()->user()->makhachhang;
        $data = $request->all();
        $result = ThongTinNhanHang::where('makhachhang', $makhachhang)->get();
        if ($result->isNotEmpty()) {
            $trangthai = 'notDefault';
        } else {
            $trangthai = 'default';
        }
        ThongTinNhanHang::create([
            'hoten' => $data['hoten'],
            'sdt' => $data['sdt'],
            'email' => $data['email'],
            'xaid' => $data['ward'],
            'makhachhang' => $makhachhang,
            'trangthai' => $trangthai
        ]);
        return redirect('/user/delivery-address');
    }

    public function changeDeliveryAddress($mattnh)
    {
        $address_notDefault = $this->ttnh->thongtinnhanhangById($mattnh);
        return redirect('/user/purchase')->with('address_notDefault', $address_notDefault);
    }

    public function showFormUpdateDeliveryAddress($mattnh)
    {
        $ttnh = $this->ttnh->thongtinnhanhangById($mattnh);
        $tinhthanhpho = TinhThanhPho::get();
        return view('User.deliveryAddress.updateDeliveryAddress', compact('tinhthanhpho', 'ttnh'));
    }

    public function updateDeliveryAddress(Request $request)
    {
        $makhachhang = auth()->user()->makhachhang;
        $data = $request->all();
        if ($data['trangthai']) { //được check sẽ trả về value = true
            $trangthai = 'default';
            ThongTinNhanHang::where('makhachhang', $makhachhang)
                ->where('trangthai', 'default')
                ->update(['trangthai' => 'notDefault']);
        } else {
            $trangthai = 'notDefault';
        }
        ThongTinNhanHang::where('mattnh', $data['mattnh'])->update([
            'hoten' => $data['hoten'],
            'sdt' => $data['sdt'],
            'email' => $data['email'],
            'xaid' => $data['xaid'],
            'trangthai' => $trangthai
        ]);
        return redirect('/user/delivery-address');
    }

    public function deleteDeliveryAddress($mattnh)
    {
        ThongTinNhanHang::destroy($mattnh);
        return redirect('/user/delivery-address');
    }
}
