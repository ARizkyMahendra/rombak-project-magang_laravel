@extends('admin.layout.index')
@section('content')
<div class="container">
    <div class="row g-5 mt-5">
        <div class="col-lg-12">
            <div class="text-center">
                <h3>Daftar Agenda 2024/2025</h3>
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
                    @if ($data->isEmpty())
                        <td colspan="10">Jabatan Kosong</td>
                    @else
                        @foreach ($data as $y => $x)
                            <tr class="align-middle justify-content-center">
                                <th>{{++$y}}</th>
                                <td>{{$x->tgl_mulai}}</td>
                                <td>{{$x->waktu}}</td>
                                <td>{{$x->lokasi}}</td>
                                <td>{{$x->kegiatan}}</td>
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

        $('.editModal').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "{{route('admin.editAgenda',['id'=>':id'])}}".replace(':id', id),
                success: function(response) {
                    $('.tampilEditData').html(response).show();
                    $('#editModal').modal('show');
                }
            });
        });

        $('.deleteData').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var jabatan = $('#kegiatan').val();
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
                        url: "{{ route('admin.deleteAgenda', ['id' => ':id']) }}".replace(':id', id),
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