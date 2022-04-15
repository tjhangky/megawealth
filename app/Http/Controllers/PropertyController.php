<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $properties = Property::query()
                ->where('property_type', 'like', '%' . request('search') . '%')
                ->orWhere('address', 'like', '%' . request('search') . '%')
                ->orWhere('sale_type', 'like', '%' . request('search') . '%')
                ->get();
        } else {
            $properties = Property::all();
        }
    
        // $properties->get();
        return view('properties', compact('properties'));
    }
}
