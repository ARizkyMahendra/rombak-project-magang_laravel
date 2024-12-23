@extends('admin.layout.index')
@section('content')
<div class="container">
    <div class="row g-5 mt-5">
        <div class="col-lg-12">
            <div class="text-center">
                <h3>Daftar Jabatan</h3>
            </div>
            <div class="card mb-1" style="display: grid">
                <button class="btn btn-success addJabatan" id="addAgenda">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Agenda</span>
                </button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">waktu</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Pejabat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if ($jabatan->isEmpty())
                        <td colspan="10">Jabatan Kosong</td>
                    @else
                        @foreach ($jabatan as $y => $x) --}}
                            <tr class="align-middle justify-content-center">
                                <th>aaaaaa</th>
                                <td>aaaaaaa</td>
                                <td>aaaaaaa</td>
                                <td>aaaaaaa</td>
                                <td>aaaaaaa</td>
                                <td>aaaaaaa</td>
                                <td>
                                    <button class="btn btn-info editModal" data-id="">
                                        <i class="far fa-edit"></i>
                                    </button>

                                    <button class="btn btn-danger deleteData" data-id="">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        {{-- @endforeach
                    @endif --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="tampilData" style="display: none;"></div>
<div class="tampilEditData" style="display: none;"></div>

<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    })

    //script agenda
        $('#addAgenda').click(function() {
            $.ajax({
                url: "{{route('admin.addAgenda')}}",
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#addModal').modal('show');
                }
            });
        });
    //end
</script>

@endsection