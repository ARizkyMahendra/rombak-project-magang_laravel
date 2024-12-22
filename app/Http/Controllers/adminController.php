<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class adminController extends Controller
{
    public function index(){
        return view('admin.page.dashboard',[
            'title' => 'Admin Dashboard',
        ]);
    }

    public function Pegawai(){

        $jabatan = jabatan::paginate(10);
        return view('admin.page.pegawai',[
            'title' => 'Admin Tambah Data jabatan dan pejabat',
            'jabatan' => $jabatan,
        ]);
    }

    public function addJabatan(){
        return view('admin.modal.addModal',[
            'title' => 'Admin Tambah Data jabatan dan pejabat',
            'kode' => 'WNG' . rand(1, 999),
        ]);
    }
    
    public function addDataJabatan( Request $request){
        $data = new jabatan();
        $data->kode_jabatan = $request->kode;
        $data->jabatan = $request->jabatan;
        $data->save();
        
        Alert::toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('admin.pegawai');
    }
}
