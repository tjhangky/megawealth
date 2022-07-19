<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Support\Facades\Gate;

class OfficeController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin')) {
            abort(403, 'Unauthorized access.');
        }

        $offices = Office::paginate(5);
        $active = 'about-us';
        return view('about-us', compact('offices', 'active'));
    }
}
