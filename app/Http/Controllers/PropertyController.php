<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class PropertyController extends Controller
{
    public function index()
    {
        // admin gabole akses
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
                ->whereIn('status', ['Open', 'Cart'])
                ->paginate(4);
        } else {
            // kalo search kosongan
            $properties = Property::whereIn('status', ['Open', 'Cart'])->paginate(4);
        }
        $active = 'property';
        return view('properties.index', compact('properties', 'active'));
    }

    public function buy() 
    {
        // admin gabole akses
        if (Gate::allows('admin')) {
            abort(403, 'Unauthorized access.');
        }

        $properties = Property::where('sale_type', 'sale')->whereIn('status', ['Open', 'Cart'])->paginate(4);

        $active = 'buy';
        return view('properties.buy', compact('properties', 'active'));
    }

    public function rent() 
    {
        // admin gabole akses
        if (Gate::allows('admin')) {
            abort(403, 'Unauthorized access.');
        }
        
        $properties = Property::where('sale_type', 'rent')->whereIn('status', ['Open', 'Cart'])->paginate(4);

        $active = 'rent';
        return view('properties.rent', compact('properties', 'active'));
    }
    
}
