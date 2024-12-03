<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Models\OperationalCarReport;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OperationalCarReportDailyExport implements FromView, WithStyles, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $operationalCarReport;
    public function __construct(OperationalCarReport $operationalCarReport)
    {
        $this->operationalCarReport = $operationalCarReport;
    }

    public function view(): View

    {

        return view('reporttransportreq.operational_car.daily_export', [
            'operationalCarReport' => $this->operationalCarReport
        ]);
    }

        // Method untuk mengatur style, termasuk top alignment dan warna header
        public function styles(Worksheet $sheet)
        {
            return [
                3 => [
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
                    ],
                ],
            ];
        }

        // Method untuk mengatur lebar kolom
        public function columnWidths(): array
        {
            return [
                'A' => 50,
                'B' => 15,
                'C' => 15,
                'D' => 15,
                'E' => 20,
                'F' => 20,
                'G' => 20,
                // 'H' => 20,
                // 'I' => 20,
                // 'J' => 20,
                // 'K' => 15,
                // 'L' => 20,
                // 'M' => 20,
                // 'N' => 15,
                // 'O' => 15,
                // 'P' => 15,
                // 'Q' => 30,
                // 'R' => 30,
                // 'S' => 15,
                // 'T' => 30,
                // 'U' => 15,
                // 'V' => 30,
                // 'W' => 15,
                // 'X' => 30,
                // 'Y' => 15,
                // 'Z' => 30,



                // Lanjutkan pengaturan lebar kolom lainnya sesuai kebutuhan
            ];
        }
}
