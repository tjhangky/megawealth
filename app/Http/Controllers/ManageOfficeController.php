<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class ManageOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::paginate(4);
        return view('admin.office.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.office.create');
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
            'name' => 'required',
            'address' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|file|max:10240',
        ]);

        if($request->file('image')) {
            $validated['image'] = $request->file('image')->store('office-images');
        }

        Office::create($validated);

        return redirect('/manage-company')->with('status', 'Office added successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {   
        return view('admin.office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
        ]);

        $office->update($validated);

        return redirect('/manage-company')->with('status', 'Office updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        $office->delete();

        return redirect()->back()->with('status', 'Office deleted successfully');
    }
}
