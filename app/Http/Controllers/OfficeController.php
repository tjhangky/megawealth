<?php

namespace App\Http\Controllers;

use App\Models\Office;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::paginate(5);
        $active = 'about-us';
        return view('about-us', compact('offices', 'active'));
    }
}
