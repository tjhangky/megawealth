<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class PropertyController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin')) {
            abort(403, 'Unauthorized access.');
        }

        // kalo hasil search
        if (request('search')) {
            $search = request('search');
            if(Str::lower($search) == 'buy') {
                $search = 'sale';
            }
            $properties = Property::query()
                ->where('property_type', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('sale_type', 'like', '%' . $search . '%')
                ->paginate(4);
        } else {
            // kalo search kosongan
            $properties = Property::paginate(4);
        }
    
        return view('properties.index', compact('properties'));
    }

    public function buy() 
    {
        if (Gate::allows('admin')) {
            abort(403, 'Unauthorized access.');
        }

        $properties = Property::where('sale_type', 'like', 'sale')->paginate(4);
        return view('properties.buy', compact('properties'));
    }

    public function rent() 
    {
        if (Gate::allows('admin')) {
            abort(403, 'Unauthorized access.');
        }
        
        $properties = Property::where('sale_type', 'like', 'rent')->paginate(4);
        return view('properties.rent', compact('properties'));
    }
    
}
