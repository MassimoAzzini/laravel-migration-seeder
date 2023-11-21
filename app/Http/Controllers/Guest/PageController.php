<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index (){
        // $trains = Train::all();
        $trains = Train::where('Partenza', '>=', date('Y-m-d H:i:s'))
                    ->orderBy('Partenza')
                    ->get();

        return view('home', compact('trains'));
    }
}
