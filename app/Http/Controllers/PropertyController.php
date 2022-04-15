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
                ->paginate(4);
        } else {
            $properties = Property::paginate(4);
        }
    
        // $properties->get();
        return view('properties.index', compact('properties'));
    }

    public function buy() {
        $properties = Property::where('sale_type', '=', 'Sale')->paginate(4);
        return view('properties.buy', compact('properties'));
    }

    public function rent() {
        $properties = Property::where('sale_type', '=', 'Rent')->paginate(4);
        return view('properties.rent', compact('properties'));
    }
}
