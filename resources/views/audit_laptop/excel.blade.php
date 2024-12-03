<!DOCTYPE html>
<html>

    <head>

    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th scope="col ">NO</th>
                    <th scope="col ">EMPLOYEE NAME</th>
                    <th scope="col ">LAPTOP NUMBER</th>
                    <th scope="col ">LAPTOP TYPE</th>
                    <th scope="col ">SERIAL LAPTOP NUMBER</th>
                    <th scope="col ">ASSET NUMBER</th>
                    <th scope="col ">PROCESSOR</th>
                    <th scope="col ">RAM</th>
                    <th scope="col ">SSD</th>
                    <th scope="col ">CHARGER CONDITION</th>
                    <th scope="col ">CHARGER REASON</th>
                    <th scope="col ">SCREEN CONDITION</th>
                    <th scope="col ">SCREEN REASON</th>
                    <th scope="col ">KEYBOARD CONDITION</th>
                    <th scope="col ">KEYBOARD REASON</th>
                    <th scope="col ">CAMERA CONDITION</th>
                    <th scope="col ">CAMERA REASON</th>
                    <th scope="col ">BODY CONDITION</th>
                    <th scope="col ">BODY REASON</th>
                    <th scope="col ">SPEAKER CONDITION</th>
                    <th scope="col ">SPEAKER REASON</th>
                    <th scope="col ">BATTERY CURRENT CAPACITY (mAh)</th>
                    <th scope="col ">BATTERY DESIGN CAPACITY (mAh)</th>
                    <th scope="col ">NOTE</th>
                    <th scope="col ">AUDIT STATUS</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($auditLaptops as $audit)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $audit->employee->full_name }}</td>
                        <td>{{ $audit->laptop_number }}</td>
                        <td>{{ $audit->laptop_type }}</td>
                        <td>{{ $audit->serial_number }}</td>
                        <td>{{ $audit->no_asset }}</td>
                        <td>
                            @if ($audit->processor != null)
                                {{ $audit->processor }}
                            @else
                                {{ $audit->processor_other }}
                            @endif
                        </td>
                        <td>
                            @if ($audit->ram != null)
                                {{ $audit->ram }}
                            @else
                                {{ $audit->ram_other }}
                            @endif
                        </td>
                        <td>
                            @if ($audit->ssd != null)
                                {{ $audit->ssd }}
                            @else
                                {{ $audit->ssd_other }}
                            @endif
                        </td>
                        <td>{{ $audit->charger }}</td>
                        <td>{{ $audit->charger_reason }}</td>
                        <td>{{ $audit->lcd }}</td>
                        <td>{{ $audit->lcd_reason }}</td>
                        <td>{{ $audit->keyboard }}</td>
                        <td>{{ $audit->keyboard_reason }}</td>
                        <td>{{ $audit->camera }}</td>
                        <td>{{ $audit->camera_reason }}</td>
                        <td>{{ $audit->body }}</td>
                        <td>{{ $audit->body_reason }}</td>
                        <td>{{ $audit->speaker }}</td>
                        <td>{{ $audit->speaker_reason }}</td>
                        <td>{{ $audit->battery_current_capacity }}</td>
                        <td>{{ $audit->battery_design_capacity }}</td>
                        <td>{{ $audit->other }}</td>
                        <td>{{ $audit->audit_status }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </body>

</html>
