<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class adminController extends Controller
{
    public function index(){
        $agenda = agenda::all();
        $agenda1 = DB::table('agenda')
            ->join('jabatan', 'agenda.id_pejabat','=','jabatan.kode_jabatan')
            ->select('agenda.*','jabatan.jabatan')
            ->get();
        return view('admin.page.dashboard',[
            'title' => 'Admin Dashboard',
            'agenda1' => $agenda1,
        ]);
    }
}
