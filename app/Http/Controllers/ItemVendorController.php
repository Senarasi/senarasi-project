<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\ItemVendor;


class ItemVendorController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all ItemVendor data from the database
        $item_vendors = ItemVendor::all();

        // Count the total number of ItemVendor
        $total_item = $item_vendors->count();

        // Pass the data to the view
        return view('item_vendor.index', compact('item_vendors', 'total_item'));
    }

    public function create()
    {
        $vendor = Vendor::orderBy('vendor_name', 'asc')->pluck('vendor_name', 'vendor_id')->prepend('Select Vendor', '');
        return view('item_vendor.create', compact('vendor'));
    }

    public function getItemPrice(Request $request)
    {
        $itemVendor = ItemVendor::find($request->item_vendor_id);

        return response()->json($itemVendor);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'vendor_id' => 'required|exists:vendors,vendor_id',
            'item_name' => 'required|string|max:255',
            'item_description' => 'required|string|max:255',
            'item_price' => 'required|numeric',
        ]);

        // Create a new ItemVendor object
        $itemVendor = new ItemVendor;

        // Assign the form data to the ItemVendor object
        $itemVendor->vendor_id = $request->vendor_id;
        $itemVendor->item_name = $request->item_name;
        $itemVendor->item_description = $request->item_description;
        $itemVendor->item_price = $request->item_price;

        // Save the ItemVendor object to the database
        $itemVendor->save();

        // Redirect the user back to the item vendor index page
        return redirect()->route('item_vendor.index')->with('success', 'Item Vendor created successfully!');
    }

    public function edit($id)
    {
        // Fetch the existing ItemVendor object from the database
        $itemVendor = ItemVendor::find($id);

        // Fetch all vendors from the database
        $vendors = Vendor::all();

        // Pass the data to the view
        return view('item_vendor.edit', compact('itemVendor', 'vendors'));
    }


    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'vendor_id' => 'required|exists:vendors,vendor_id',
            'item_name' => 'required|string|max:255',
            'item_description' => 'required|string|max:255',
            'item_price' => 'required|numeric',
        ]);

        // Fetch the existing ItemVendor object from the database
        $itemVendor = ItemVendor::find($id);

        // Update the ItemVendor object with the new form data
        $itemVendor->vendor_id = $request->vendor_id;
        $itemVendor->item_name = $request->item_name;
        $itemVendor->item_description = $request->item_description;
        $itemVendor->item_price = $request->item_price;

        // Save the updated ItemVendor object to the database
        $itemVendor->save();

        // Redirect the user back to the item vendor index page
        return redirect()->route('item_vendor.index')->with('success', 'Item Vendor updated successfully!');
    }

    public function destroy($id)
    {
        // Fetch the existing ItemVendor object from the database
        $itemVendor = ItemVendor::find($id);

        // Delete the ItemVendor object from the database
        $itemVendor->delete();

        // Redirect the user back to the item vendor index page with a success message
        return redirect()->route('item_vendor.index')->with('success', 'Item Vendor deleted successfully!');
    }
}
