<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index(){
        $data = DB::table('agenda')
            ->join('jabatan', 'agenda.id_pejabat','=','jabatan.kode_jabatan')
            ->select('agenda.*','jabatan.jabatan')
            ->get();
        return view('guest.page.dashboard',[
            'title' => "Agenda Bupati Wonogiri",
            'data' => $data,
        ]);
    }
}
