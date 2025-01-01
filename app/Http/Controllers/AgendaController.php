<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\jabatan;
use App\Models\pejabat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AgendaController extends Controller
{
    public function agenda(){
        $agenda = agenda::all();
        $data = DB::table('agenda')
            ->join('jabatan', 'agenda.id_pejabat','=','jabatan.kode_jabatan')
            ->select('agenda.*','jabatan.jabatan')
            ->get();
        return view('admin.page.agenda',[
            'title' => 'Agenda Bupati Wonogiri',
            'agenda' => $agenda,
            'data' => $data,
        ]);
    }

    public function addAgenda(){
        $pejabat = pejabat::all();
        return view('admin.modal.CRUDagenda.addmodal',[
            'title' => 'Agenda Bupati Wonogiri',
            'pejabat' => $pejabat,
        ]);
    }

    public function addDataAgenda(Request $request)
        {
            $data = new agenda();
            $data->id_pejabat = $request->pejabat;
            $data->kegiatan = $request->kegiatan;
            $data->lokasi = $request->lokasi;
            $data->waktu = $request->waktu;
            $data->tgl_mulai = $request->tgl_mulai;
            $data->save();

            Alert::toast('Data berhasil ditambahkan', 'success');
            return redirect()->route('admin.agenda');
        }

        public function editAgenda($id)
        {
            $pejabat = pejabat::all();            
            $data = agenda::findOrFail($id);            
            return view('admin.modal.CRUDagenda.editModal', [
                'title' => 'Edit Data agenda',
                'pejabat' => $pejabat,
                'data' => $data,
            ])->render();
        }

        public function updateAgenda(Request $request, $id)
        {
            $data = agenda::findOrfail($id);
            $field = [
                'id_pejabat' => $request->pejabat,
                'kegiatan' => $request->kegiatan,
                'lokasi' => $request->lokasi,
                'waktu' => $request->waktu,
                'tgl_mulai' => $request->tgl_mulai,
            ];

            $data::where('id', $id)->update($field);
            Alert::toast('Edit berhasil ditambahkan', 'success');
            return redirect()->route('admin.agenda');
        }

        public function deleteAgenda($id){
            $agenda = agenda::findOrFail($id);
            $agenda->delete();

            $json = [
                'success' => "Data berhasil dihapus"
            ];

            echo json_encode($json);
        }

        
}
