<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug) {
        // Kita tampilan data TravelPackage dan Gallery berdasarkan slug ($travelPackage) yang kita pilih 
        $item = TravelPackage::with(['galleries'])
                ->where('slug', $slug)
                ->firstOrFail();
        return view('pages.detail', compact('item'));
    }
}