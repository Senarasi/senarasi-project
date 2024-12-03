<?php

// app/Exports/SingleTransportSheet.php

namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SingleTransportSheet implements FromView, WithTitle, WithStyles, WithColumnWidths
{
    protected $transportrequests;
    protected $transportCombination;

    public function __construct(Collection $transportrequests, $transportCombination)
    {
        $this->transportrequests = $transportrequests;
        $this->transportCombination = $transportCombination;
    }

    public function view(): View
    {
        return view('reporttransportreq.viewexcel', [
            'transportrequests' => $this->transportrequests,
            'transportCombination' => $this->transportCombination,
        ]);
    }

    public function title(): string
    {
        return ucfirst($this->transportCombination);
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
                ],
            ],
        ];
    }

    // Method untuk mengatur lebar kolom
    public function columnWidths(): array
    {
        return [
            'A' => 5,    // No
            'B' => 15,   // Date
            'C' => 15,   // Time
            'D' => 20,   // User Name
            'E' => 15,   // WA Number
            'F' => 25,   // Program / Department
            'G' => 25,   // Activity
            'H' => 20,   // Start Location
            'I' => 20,   // Destination
            'J' => 10,   // Passenger
            'K' => 15,   // Service Type
            'L' => 20,   // Notes
            'M' => 20,   // Transportation
            'N' => 15,   // Card
            'O' => 15,   // Start Balance
            'P' => 15,   // Final Balance
            'Q' => 30,   // Screenshot Start Balance
            'R' => 30,   // Screenshot Final Balance
            'S' => 15,   // Grab Cost
            'T' => 30,   // Screenshot Grab
            'U' => 15,
            'V' => 30,
            'W' => 15,
            'X' => 30,
            'Y' => 15,
            'Z' => 30,



            // Lanjutkan pengaturan lebar kolom lainnya sesuai kebutuhan
        ];
    }
}

