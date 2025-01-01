@extends('admin.layout.index')
@section('content')
<div class="container">
    <div class="row g-5 mt-5">
        <div class="col-lg-5">
            <div class="text-center">
                <h3>Daftar Jabatan</h3>
            </div>
            <div class="card mb-1" style="display: grid">
                <button class="btn btn-success " id="addJabatan">
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
                                <td>{{$x->kode_jabatan}}</td>
                                <td>{{$x->jabatan}}</td>
                                <td>
                                    <button class="btn btn-info editModal mb-1" data-id="{{$x->id}}">
                                        <i class="far fa-edit"></i>
                                    </button>

                                    <button class="btn btn-danger deleteData" data-id="{{$x->id}}">
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
                        <th scope="col">Kode Jabatan</th>
                        <th scope="col">Nama Pejabat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pejabat->isEmpty())
                        <td colspan="10">Data Pejabat Kosong</td>
                    @else
                        @foreach ($pejabat as $y => $x)
                            <tr class="align-middle justify-content-center">
                                <th>{{++$y}}</th>
                                <td>{{$x->id_jabatan}}</td>
                                <td>{{$x->nama}}</td>
                                <td>
                                    <button class="btn btn-info editModalPejabat" data-id="{{$x->id}}">
                                        <i class="far fa-edit"></i>
                                    </button>

                                    <button class="btn btn-danger deleteData" data-id="{{$x->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
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

    //script Jabatan
        $('#addJabatan').click(function() {
            $.ajax({
                url: "{{route('admin.addJabatan')}}",
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#addModal').modal('show');
                }
            });
        });

        $('.editModal').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "{{route('admin.editJabatan',['id'=>':id'])}}".replace(':id', id),
                success: function(response) {
                    $('.tampilEditData').html(response).show();
                    $('#editModal').modal('show');
                }
            });
        });

        $('.deleteData').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var jabatan = $('#jabatan').val();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
            });

            Swal.fire({
                title: 'Hapus data ?',
                text: "Kamu yakin untuk menghapus jabatan " + jabatan + " ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('admin.deleteJabatan', ['id' => ':id']) }}".replace(':id', id),
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan notifikasi error jika terjadi kesalahan
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat menghapus data',
                                icon: 'error'
                            });
                        }
                    });
                }
            })
        });
    //end

    //script Pejabat
        $('#addPejabat').click(function() {
            $.ajax({
                url: "{{route('admin.addPejabat')}}",
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#addModalPejabat').modal('show');
                }
            });
        });

        $('.editModalPejabat').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "{{route('admin.editPejabat',['id'=>':id'])}}".replace(':id', id),
                success: function(response) {
                    $('.tampilEditData').html(response).show();
                    $('#editModalPejabat').modal('show');
                }
            });
        });

        $('.deleteData').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var pejabat = $('#id_pejabat').val();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
            });

            Swal.fire({
                title: 'Hapus data ?',
                text: "Kamu yakin untuk menghapus Pejabat " + pejabat + " ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('admin.deletePejabat', ['id' => ':id']) }}".replace(':id', id),
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan notifikasi error jika terjadi kesalahan
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat menghapus data',
                                icon: 'error'
                            });
                        }
                    });
                }
            })
        });
    //end
    
    
    
    
    

    

    
</script>

@endsection