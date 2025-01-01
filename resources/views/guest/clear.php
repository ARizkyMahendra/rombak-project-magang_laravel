@extends('guest.layout.index')
@section('content')
<div class="container">
    <div class="row g-5 mt-5">
        <div class="text-center mt-5">
            <h2>Jadwal agenda bupati wonogiri</h2>
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
                </tr>
            </thead>
            <tbody>
                @if ($data->isEmpty())
                <td colspan="10">Jadwal Kosong</td>
                @else
                @foreach ($data as $y => $x)
                <tr class="align-middle justify-content-center">
                    <th>{{++$y}}</th>
                    <td>{{$x->tgl_mulai}}</td>
                    <td>{{$x->waktu}}</td>
                    <td>{{$x->lokasi}}</td>
                    <td>{{$x->kegiatan}}</td>
                    <td>{{$x->jabatan}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection