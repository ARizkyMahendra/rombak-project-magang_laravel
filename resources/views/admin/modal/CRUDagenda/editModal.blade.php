<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.updateAgenda', $data->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')                 
                @csrf
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="inputText" class="col-sm-12 col-form-label">Pejabat</label>
                        @foreach($pejabat as $x)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="pejabat" name="pejabat" value="{{$x->id_jabatan}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$x->nama}}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Kegiatan</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="kegiatan" name="kegiatan" >{{$data->kegiatan}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Lokasi</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="lokasi" name="lokasi">{{$data->lokasi}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Waktu</label>
                        <div class="col-sm-8">
                            <input type="time" id="waktu" name="waktu" class="form-control" placeholder="Waktu mulai acara" value="{{$data->waktu}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control" placeholder="Tanggal Mulai Acara" value="{{$data->tgl_mulai}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>