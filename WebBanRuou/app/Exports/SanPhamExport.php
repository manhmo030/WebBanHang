<?php

namespace App\Exports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;

class SanPhamExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $sanPhams = SanPham::with('chiTietSanPham')
        ->with('loaiSanPham')
        ->with('ncc')
        ->with('chatLieu')
        ->get();
        return $sanPhams;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Đặt tiêu đề cho tệp Excel
                $event->sheet->setTitle('Danh sách sản phẩm');

                $event->sheet->setCellValue('A1', 'Mã sản phẩm');
                $event->sheet->setCellValue('B1', 'Tên sản phẩm');
                $event->sheet->setCellValue('C1', 'Loại sản phẩm');
                $event->sheet->setCellValue('D1', 'Chất liệu');
                $event->sheet->setCellValue('E1', 'Đơn giá nhập');
                $event->sheet->setCellValue('F1', 'Đơn giá bán');
                $event->sheet->setCellValue('G1', 'Nhà cung cấp');
                $event->sheet->setCellValue('H1', 'Ảnh');
                $event->sheet->setCellValue('I1', 'Số lượng');
                $event->sheet->setCellValue('J1', 'Bảo quản');
                $event->sheet->setCellValue('K1', 'Hương vị');
                $event->sheet->setCellValue('L1', 'Dung tích');
                $event->sheet->setCellValue('M1', 'Ghi chú');

                $sanPhams = $this->collection();
                $row = 2;

                foreach ($sanPhams as $sanpham) {
                    $event->sheet->setCellValue('A'.$row, $sanpham->masp);
                    $event->sheet->setCellValue('B'.$row, $sanpham->tensp);
                    $event->sheet->setCellValue('C'.$row, $sanpham->loaiSanPham->tenloai);
                    $event->sheet->setCellValue('D'.$row, $sanpham->chatLieu->tenchatlieu);
                    $event->sheet->setCellValue('E'.$row, $sanpham->dongianhap);
                    $event->sheet->setCellValue('F'.$row, $sanpham->dongiaban);
                    $event->sheet->setCellValue('G'.$row, $sanpham->ncc->tenncc);
                    $event->sheet->setCellValue('H'.$row, $sanpham->anh);
                    $event->sheet->setCellValue('I'.$row, $sanpham->chiTietSanPham->soluong);
                    $event->sheet->setCellValue('J'.$row, $sanpham->chiTietSanPham->baoquan);
                    $event->sheet->setCellValue('K'.$row, $sanpham->chiTietSanPham->huongvi);
                    $event->sheet->setCellValue('L'.$row, $sanpham->chiTietSanPham->dungtich);
                    $event->sheet->setCellValue('M'.$row, $sanpham->ghichu);
                    // Căn lề trái cho các ô
                    $event->sheet->getStyle('A'.$row.':M'.$row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

                    $row++;
                }
            },
        ];
    }
}

