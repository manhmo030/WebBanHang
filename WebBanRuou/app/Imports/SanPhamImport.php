<?php

namespace App\Imports;

use App\Models\ChiTietSanPham;
use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SanPhamImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $sanpham = SanPham::create([
            'tensp' => $row[0],
            'maloai' => $row[1],
            'machatlieu' => $row[2],
            'dongianhap' => $row[3],
            'dongiaban' => $row[4],
            'mancc' => $row[5],
            'anh' => $row[6],
            'ghichu' => $row[7]
        ]);
        ChiTietSanPham::create([
            'masp' => $sanpham->masp,
            'soluong' => $row[8],
            'baoquan' => $row[9],
            'huongvi' => $row[10],
            'dungtich' => $row[11]
        ]);

        return null;
    }

    public function startRow(): int
    {
        return 2; // Bắt đầu import từ hàng thứ 2 (để bỏ qua hàng tiêu đề)
    }
}
