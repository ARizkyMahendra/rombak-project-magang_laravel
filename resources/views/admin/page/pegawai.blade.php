@extends('admin.layout.index')
@section('content')
<div class="container">
    <div class="row g-5 mt-5">
        <div class="col-lg-5">
            <div class="text-center">
                <h3>Daftar Jabatan</h3>
            </div>
            <div class="card mb-1" style="display: grid">
                <button class="btn btn-success" id="addJabatan">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Jabatan</span>
                </button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Jabatan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($jabatan->isEmpty())
                        <td colspan="10">Jabatan Kosong</td>
                    @else
                        @foreach ($jabatan as $y => $x)
                            <tr class="align-middle justify-content-center">
                                <th>{{++$y}}</th>
                                <td>{{$x -> kode_jabatan}}</td>
                                <td>{{$x -> jabatan}}</td>
                                <td>
                                    <button class="btn btn-info editModal" data-id="">
                                        <i class="far fa-edit"></i>
                                    </button>

                                    <button class="btn btn-danger deleteData" data-id="">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-lg-7">
            <div class="text-center">
                <h3>Daftar Pejabat</h3>
            </div>
            <div class="card mb-1" style="display: grid">
                <button class="btn btn-success" id="addPejabat">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Pejabat</span>
                </button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle ">
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <button class="btn btn-info editModal" data-id="">
                                <i class="far fa-edit"></i>
                            </button>

                            <button class="btn btn-danger deleteData" data-id="">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
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

    $('#addJabatan').click(function() {
        $.ajax({
            url: "{{route('admin.addJabatan')}}",
            success: function(response) {
                $('.tampilData').html(response).show();
                $('#addModal').modal('show');
            }
        });
    });
</script>

@endsection