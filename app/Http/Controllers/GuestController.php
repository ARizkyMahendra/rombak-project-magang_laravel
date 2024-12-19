<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return view('guest.page.dashboard',[
            'title' => "Agenda Bupati Wonogiri",
        ]);
    }
}
