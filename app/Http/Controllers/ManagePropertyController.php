<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class ManagePropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::latest()->paginate(4);
        return view('admin.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_type' => 'required|in:Sale,Rent',
            'property_type' => 'required|in:House,Apartment',
            'price' => 'required',
            'address' => 'required',
        ]);

        Property::create($validated);

        return redirect('/manage-property')->with('status', 'Property added successfully');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('admin.property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'sale_type' => 'required|in:Sale,Rent',
            'property_type' => 'required|in:House,Apartment', # nanti diganti pake tabel
            'price' => 'required',
            'address' => 'required',
        ]);

        $validated['status'] = $property->status;
        $property->update($validated);

        return redirect('/manage-property')->with('status', 'Property updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->back()->with('status', 'Property deleted successfully');
    }

    public function finish(Property $property)
    {
        $property->update(['status' => 'Completed']);
        return redirect()->back()->with('status', 'Property transaction completed!');
    }
}
