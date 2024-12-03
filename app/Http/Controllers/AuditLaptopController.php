<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditLaptop;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AuditLaptopViewExport;

class AuditLaptopController extends Controller
{

    public function index()
    {
        $auditLaptops = AuditLaptop::all();
        return view('audit_laptop.index', compact('auditLaptops'));
    }

    public function create()
    {
        $users = Employee::orderBy('full_name', 'asc')->get();
        return view('audit_laptop.create', compact('users'));
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'laptop_number' => 'required|string',
    //         'employee_id' => 'nullable|string',
    //         'laptop_type' => 'required|string',
    //         'serial_number' => 'required|string',
    //         'no_asset' => 'required|string',
    //         'processor' => 'nullable|string',
    //         'processor_other' => 'nullable|string',
    //         'ram' => 'nullable|string',
    //         'ram_other' => 'nullable|string',
    //         'ssd' => 'nullable|string',
    //         'ssd_other' => 'nullable|string',
    //         'charger' => 'required|string',
    //         'battery' => 'required|string',
    //         'layar' => 'required|string',
    //         'keyboard' => 'required|string',
    //         'body' => 'required|string',
    //         'speaker' => 'required|string',
    //         'kamera' => 'required|string',
    //         'lainnya' => 'nullable|string',
    //         'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     if ($request->hasFile('picture')) {
    //         $path = $request->file('picture')->store('audit/laptop', 'public');
    //         $validated['picture'] = $path;
    //     }

    //     // Use custom input if 'Other' is selected
    //     $validated['ssd'] = $request->ssd === 'other' ? $request->ssd_other : $request->ssd;
    //     $validated['processor'] = $request->processor === 'other' ? $request->processor_other : $request->processor;
    //     $validated['ram'] = $request->ram === 'other' ? $request->ram_other : $request->ram;


    //     AuditLaptop::create($validated);

    //     return redirect()->route('audit_laptop.index')->with('success', 'Audit laptop created successfully.');
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'laptop_number' => 'nullable|string',
            'laptop_type' => 'nullable|string',
            'serial_number' => 'nullable|string',
            'no_asset' => 'nullable|string',

            // Existing validations...
            'processor' => 'nullable|string',
            'processor_other' => 'nullable|string|required_if:processor,other',
            'ram' => 'nullable|string',
            'ram_other' => 'nullable|string|required_if:ram,other',
            'ssd' => 'nullable|string',
            'ssd_other' => 'nullable|string|required_if:ssd,other',
            'battery_current_capacity' => 'nullable|integer|min:0',
            'battery_design_capacity' => 'nullable|integer|min:0',

            // Add audit status validation
            'audit_status' => 'nullable|in:Pending,Completed',

            // Existing component validations...
            'charger' => 'nullable|in:Good,Damaged,Missing',
            'charger_reason' => 'nullable|string|required_if:charger,Damaged,Missing',

            // ... other component validations remain the same

            'other' => 'nullable|string',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Set audit status to Completed if all required fields are filled
        $validatedData['audit_status'] = $request->audit_status;

        // Existing processing...
        if ($request->processor === 'other') {
            $validatedData['processor'] = $request->processor_other;
            unset($validatedData['processor_other']);
        }

        if ($request->ram === 'other') {
            $validatedData['ram'] = $request->ram_other;
            unset($validatedData['ram_other']);
        }

        if ($request->ssd === 'other') {
            $validatedData['ssd'] = $request->ssd_other;
            unset($validatedData['ssd_other']);
        }

        if ($request->hasFile('user_image')) {
            $path = $request->file('user_image')->store('audit/laptop', 'public');
            $validated['user_image'] = $path;
        }

        $laptopAudit = AuditLaptop::create($validatedData);

        return redirect()->route('audit_laptop.index')
            ->with('success', 'Laptop Audit Record Created Successfully');
    }

    private function determineAuditStatus($data)
    {
        // Check if critical fields are filled
        $criticalFields = [
            'laptop_number',
            'laptop_type',
            'serial_number',
            'no_asset',
            'processor',
            'ram',
            'ssd',
            'battery_current_capacity',
            'battery_design_capacity',
            'charger',
            'lcd',
            'keyboard',
            'body',
            'speaker',
            'camera'
        ];

        foreach ($criticalFields as $field) {
            if (empty($data[$field])) {
                return 'Pending';
            }
        }

        return 'Completed';
    }

    // public function edit($id)
    // {
    //     $laptop = AuditLaptop::findOrFail($id); // Assuming your model is named `AuditLaptop`
    //     $users = Employee::all(); // Retrieve employees for the dropdown
    //     return view('audit_laptop.edit', compact('laptop', 'users'));
    // }

    // public function update(Request $request, $id)
    // {

    //     $request->validate([
    //         'laptop_number' => 'required|string|max:255',
    //         'laptop_type' => 'required|string|max:255',
    //         'serial_number' => 'required|string|max:255',
    //         'no_asset' => 'required|string|max:255',
    //         'processor' => 'required|string|max:255',
    //         'ram' => 'required|string|max:255',
    //         'ssd' => 'required|string|max:255',
    //         'charger' => 'required|string|max:255',
    //         'battery' => 'required|string|max:255',
    //         'layar' => 'required|string|max:255',
    //         'keyboard' => 'required|string|max:255',
    //         'body' => 'required|string|max:255',
    //         'speaker' => 'required|string|max:255',
    //         'kamera' => 'required|string|max:255',
    //         'lainnya' => 'required|string|max:255',
    //         'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     // Find the laptop by ID
    //     $laptop = AuditLaptop::findOrFail($id);

    //     if ($request->hasFile('picture')) {
    //         // Delete old picture if exists
    //         if ($laptop->picture) {
    //             Storage::disk('public')->delete($laptop->picture);
    //         }

    //         $path = $request->file('picture')->store('audit/laptop', 'public');
    //         $laptop->picture = $path;
    //     }


    //     // Update fields with provided data
    //     $laptop->employee_id = $request->employee_id;
    //     $laptop->laptop_number = $request->laptop_number;
    //     $laptop->laptop_type = $request->laptop_type;
    //     $laptop->serial_number = $request->serial_number;
    //     $laptop->no_asset = $request->no_asset;
    //     $laptop->status = $request->status;

    //     // Check if 'Other' option is used for processor, otherwise use selected option
    //     $laptop->processor = $request->processor === 'other' ? $request->processor_other : $request->processor;

    //     // Check if 'Other' option is used for RAM, otherwise use selected option
    //     $laptop->ram = $request->ram === 'other' ? $request->ram_other : $request->ram;

    //     // Check if 'Other' option is used for SSD, otherwise use selected option
    //     $laptop->ssd = $request->ssd === 'other' ? $request->ssd_other : $request->ssd;

    //     // Other basic fields
    //     $laptop->charger = $request->charger;
    //     $laptop->battery = $request->battery;

    //     // Repeat similar checks for additional fields if necessary

    //     // Save the updated record
    //     $laptop->save();

    //     return redirect()->route('audit_laptop.index')->with('success', 'Audit laptop created successfully.');
    // }

    public function edit($id)
    {
        $laptopAudit = AuditLaptop::findOrFail($id);
        $users = Employee::all(); // Adjust based on your actual user/employee model

        return view('audit_laptop.edit', compact('laptopAudit', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Find the existing record
        $laptopAudit = AuditLaptop::findOrFail($id);

        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'laptop_number' => 'nullable|string',
            'laptop_type' => 'nullable|string',
            'serial_number' => 'nullable|string',
            'no_asset' => 'nullable|string',
            'processor' => 'nullable|string',
            'processor_other' => 'nullable|string|required_if:processor,other',
            'ram' => 'nullable|string',
            'ram_other' => 'nullable|string|required_if:ram,other',
            'ssd' => 'nullable|string',
            'ssd_other' => 'nullable|string|required_if:ssd,other',
            'battery_current_capacity' => 'nullable|integer|min:0',
            'battery_design_capacity' => 'nullable|integer|min:0',
            'audit_status' => 'nullable|in:Pending,Completed',
            'charger' => 'nullable|in:Good,Damaged,Missing',
            'charger_reason' => 'nullable|string|required_if:charger,Damaged,Missing',
            'lcd' => 'nullable|in:Good,Damaged,Missing',
            'lcd_reason' => 'nullable|string|required_if:lcd,Damaged,Missing',
            'keyboard' => 'nullable|in:Good,Damaged,Missing',
            'keyboard_reason' => 'nullable|string|required_if:keyboard,Damaged,Missing',
            'camera' => 'nullable|in:Good,Damaged,Missing',
            'camera_reason' => 'nullable|string|required_if:camera,Damaged,Missing',
            'body' => 'nullable|in:Good,Damaged,Missing',
            'body_reason' => 'nullable|string|required_if:body,Damaged,Missing',
            'speaker' => 'nullable|in:Good,Damaged,Missing',
            'speaker_reason' => 'nullable|string|required_if:speaker,Damaged,Missing',
            'other' => 'nullable|string',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Handle 'other' inputs for processor, ram, and ssd
        if ($request->processor === 'other') {
            $validatedData['processor'] = $request->processor_other;
            unset($validatedData['processor_other']);
        }
        if ($request->ram === 'other') {
            $validatedData['ram'] = $request->ram_other;
            unset($validatedData['ram_other']);
        }
        if ($request->ssd === 'other') {
            $validatedData['ssd'] = $request->ssd_other;
            unset($validatedData['ssd_other']);
        }

        // Determine audit status
        $validatedData['audit_status'] = $request->audit_status;

        // Handle image upload
        if ($request->hasFile('user_image')) {
            // Delete old image if exists
            if ($laptopAudit->user_image && Storage::disk('public')->exists($laptopAudit->user_image)) {
                Storage::disk('public')->delete($laptopAudit->user_image);
            }

            $path = $request->file('user_image')->store('audit/laptop', 'public');
            $validatedData['user_image'] = $path;
        }

        // Update the existing record directly
        $laptopAudit->update($validatedData);

        return redirect()->route('audit_laptop.index')
            ->with('success', 'Laptop Audit Record Updated Successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new AuditLaptopViewExport, 'audit_laptops.xlsx');
    }

    public function destroy($id)
    {
        // Find the laptop record by ID
        $laptop = AuditLaptop::findOrFail($id);

        // Check if the image file exists and delete it
        if ($laptop->picture) {
            Storage::disk('public')->delete($laptop->picture);
        }

        // Delete the laptop record from the database
        $laptop->delete();

        // Redirect back with a success message
        return redirect()->route('audit_laptop.index')->with('success', 'Laptop deleted successfully!');
    }
}
