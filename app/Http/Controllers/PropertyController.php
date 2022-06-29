<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
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
            $properties = Property::paginate(4)->withQueryString();
        }
    
        return view('properties.index', compact('properties'));
    }

    public function buy() {
        // MASIH MANUAL TAR GANTI
        if (auth()->user() && auth()->user()->is_admin == true) {
            abort(403, 'Unauthorized access.');
        }
        $properties = Property::where('sale_type', 'like', 'sale')->paginate(4);
        return view('properties.buy', compact('properties'));
    }

    public function rent() {
        // MASIH MANUAL TAR GANTI
        if (auth()->user() && auth()->user()->is_admin == true) {
            abort(403, 'Unauthorized access.');
        }
        
        $properties = Property::where('sale_type', 'like', 'rent')->paginate(4);
        return view('properties.rent', compact('properties'));
    }

    // update status to 'Cart / Open / Completed'
    public function update($status, $id) {
        Property::find($id)->update(['status' => $status]);
        return redirect('/properties');
    }
}
