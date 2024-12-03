<?php

namespace App\Exports;

use App\Models\AuditLaptop;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AuditLaptopViewExport implements FromView, WithStyles, WithColumnWidths
{
    public function view(): View
    {

        // $auditLaptops = AuditLaptop::with('user')->get();
        $auditLaptops = AuditLaptop::all();

        // Return tampilan blade sebagai sumber data Excel
        return view('audit_laptop.excel', compact('auditLaptops'));
    }

    // Method untuk mengatur style, termasuk top alignment dan warna header
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFFFF'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FF4CAF50'],  // Hijau
                ],
            ],
            'A1:Z1000' => [
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_TOP,
                    'horizontal' => Alignment::HORIZONTAL_LEFT,
                ],
            ],
        ];
    }

    // Method untuk mengatur lebar kolom
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 50,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 20,
            'G' => 20,
            'H' => 15,
            'I' => 15,
            'J' => 30,
            'K' => 40,
            'L' => 30,
            'M' => 40,
            'N' => 30,
            'O' => 40,
            'P' => 30,
            'Q' => 40,
            'R' => 30,
            'S' => 40,
            'T' => 30,
            'U' => 30,
            'V' => 35,
            'W' => 35,
            'X' => 50,
            'Y' => 30,
            'Z' => 30,



            // Lanjutkan pengaturan lebar kolom lainnya sesuai kebutuhan
        ];
    }
}
