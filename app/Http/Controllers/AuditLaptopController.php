<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditLaptop;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer',
            'laptop_number' => 'required|string',
            'serial_number' => 'required|string',
            'no_asset' => 'required|string',
            'processor' => 'nullable|string',
            'processor_other' => 'nullable|string',
            'ram' => 'nullable|string',
            'ram_other' => 'nullable|string',
            'ssd' => 'nullable|string',
            'ssd_other' => 'nullable|string',
            'charger' => 'required|string',
            'battery' => 'required|string',
            'layar' => 'required|string',
            'keyboard' => 'required|string',
            'body' => 'required|string',
            'speaker' => 'required|string',
            'kamera' => 'required|string',
            'lainnya' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('audit/laptop', 'public');
            $validated['picture'] = $path;
        }

        // Use custom input if 'Other' is selected
        $validated['ssd'] = $request->ssd === 'other' ? $request->ssd_other : $request->ssd;
        $validated['processor'] = $request->processor === 'other' ? $request->processor_other : $request->processor;
        $validated['ram'] = $request->ram === 'other' ? $request->ram_other : $request->ram;


        AuditLaptop::create($validated);

        return redirect()->route('audit_laptop.index')->with('success', 'Audit laptop created successfully.');
    }

    public function edit($id)
    {
        $laptop = AuditLaptop::findOrFail($id); // Assuming your model is named `AuditLaptop`
        $users = Employee::all(); // Retrieve employees for the dropdown
        return view('audit_laptop.edit', compact('laptop', 'users'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'laptop_number' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'no_asset' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'ssd' => 'required|string|max:255',
            'charger' => 'required|string|max:255',
            'battery' => 'required|string|max:255',
            'layar' => 'required|string|max:255',
            'keyboard' => 'required|string|max:255',
            'body' => 'required|string|max:255',
            'speaker' => 'required|string|max:255',
            'kamera' => 'required|string|max:255',
            'lainnya' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Find the laptop by ID
        $laptop = AuditLaptop::findOrFail($id);

        if ($request->hasFile('picture')) {
            // Delete old picture if exists
            if ($laptop->picture) {
                Storage::disk('public')->delete($laptop->picture);
            }

            $path = $request->file('picture')->store('audit/laptop', 'public');
            $laptop->picture = $path;
        }


        // Update fields with provided data
        $laptop->employee_id = $request->employee_id;
        $laptop->laptop_number = $request->laptop_number;
        $laptop->serial_number = $request->serial_number;
        $laptop->no_asset = $request->no_asset;

        // Check if 'Other' option is used for processor, otherwise use selected option
        $laptop->processor = $request->processor === 'other' ? $request->processor_other : $request->processor;

        // Check if 'Other' option is used for RAM, otherwise use selected option
        $laptop->ram = $request->ram === 'other' ? $request->ram_other : $request->ram;

        // Check if 'Other' option is used for SSD, otherwise use selected option
        $laptop->ssd = $request->ssd === 'other' ? $request->ssd_other : $request->ssd;

        // Other basic fields
        $laptop->charger = $request->charger;
        $laptop->battery = $request->battery;

        // Repeat similar checks for additional fields if necessary

        // Save the updated record
        $laptop->save();

        return redirect()->route('audit_laptop.index')->with('success', 'Audit laptop created successfully.');
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
