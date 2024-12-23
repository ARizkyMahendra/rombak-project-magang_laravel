<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use App\Models\pejabat;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function agenda(){
        return view('admin.page.agenda',[
            'title' => 'Agenda Bupati Wonogiri',
        ]);
    }

    public function addAgenda(){
        $pejabat = pejabat::all();
        return view('admin.modal.CRUDagenda.addmodal',[
            'title' => 'Agenda Bupati Wonogiri',
            'pejabat' => $pejabat,
        ]);
    }
}
