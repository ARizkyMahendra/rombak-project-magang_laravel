<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    public function Pegawai()
    {

        $jabatan = jabatan::paginate(10);
        return view('admin.page.pegawai', [
            'title' => 'Admin Tambah Data jabatan dan pejabat',
            'jabatan' => $jabatan,
        ]);
    }

    public function addJabatan()
    {
        return view('admin.modal.addModal', [
            'title' => 'Admin Tambah Data jabatan dan pejabat',
            'kode' => 'WNG' . rand(1, 999),
        ]);
    }

    public function addDataJabatan(Request $request)
    {
        $data = new jabatan();
        $data->kode_jabatan = $request->kode;
        $data->jabatan = $request->jabatan;
        $data->save();

        Alert::toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('admin.pegawai');
    }

    public function editJabatan($id)
    {
        $data = jabatan::findOrFail($id);
        return view('admin.modal.editModal', [
            'title' => 'Edit Data Jabatan',
            'data' => $data,
        ])->render();
    }

    public function updateJabatan(Request $request, $id)
    {
        $data = jabatan::findOrfail($id);
        $field = [
            'kode_jabatan' => $request->kode,
            'jabatan' => $request->jabatan,
        ];

        $data::where('id', $id)->update($field);
        Alert::toast('Edit berhasil ditambahkan', 'success');
        return redirect()->route('admin.pegawai');
    }

    public function deleteJabatan($id){
        $jabatan = jabatan::findOrFail($id);
        $jabatan->delete();

        $json = [
            'success' => "Data berhasil dihapus"
        ];

        echo json_encode($json);
    }
}
