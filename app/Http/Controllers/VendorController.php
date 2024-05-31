<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $vendor = Vendor::all();
        $total_vendor = $vendor->count(); // Retrieve all vendors from the database
        return view('vendor.index', compact('vendor', 'total_vendor')); // Pass vendors to the view
        // $vendor = Vendor::with('position')->when($request->cari, function ($query) use ($request) {
        //     $query->where('vendor_name', 'like', "%{$request->cari}%");
        // })->paginate(15);
        // $total_vendor = $vendor->count();
        // return view('vendor.index', compact('vendor', 'total_vendor'));
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Vendor::create($data);
        return redirect()->route('vendor.index');
    }
}
