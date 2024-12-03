<?php

namespace App\Exports;


use Illuminate\Support\Collection;
use App\Exports\SingleTransportSheet;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class TransportReportExport implements WithMultipleSheets
{
    protected $transportrequests;

    public function __construct(Collection $transportrequests)
    {
        // $this->transportrequests = $transportrequests;
        // Filter out 'Operational Car' transport types
        $this->transportrequests = $transportrequests->filter(function($item) {
            return $item->transport !== 'Operational Car';
        });
    }

    public function sheets(): array
    {
        // $sheets = [];

        // // Group by transport type or combination of transport types
        // $groupedData = $this->transportrequests->groupBy(function($item) {
        //     return $item->transitLocations->isEmpty()
        //         ? $item->transport
        //         : $item->transitLocations->pluck('transport')->join(' + ');
        // });

        // // Create a sheet for each group
        // foreach ($groupedData as $transportCombination => $data) {
        //     $sheets[] = new SingleTransportSheet($data, $transportCombination);
        // }

        // return $sheets;

        $sheets = [];

        // Group by transport type or combination of transport types
        $groupedData = $this->transportrequests->groupBy(function($item) {
            if ($item->transitLocations->isEmpty()) {
                return $item->transport;
            }

            // Pluck the transport types, sort them to normalize the order, and then join them with ' + '
            $sortedTransports = $item->transitLocations->pluck('transport')->sort()->values();
            return $sortedTransports->join(' + ');
        });

        // Create a sheet for each group
        foreach ($groupedData as $transportCombination => $data) {
            $sheets[] = new SingleTransportSheet($data, $transportCombination);
        }

        return $sheets;
    }
}



