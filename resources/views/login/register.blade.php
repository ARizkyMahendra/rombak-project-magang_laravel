@extends('guest.layout.index')
@section('content')
<div class="text-center mt-5" >
    <h2>Registrasi Aplikasi</h2>
    <p>Silakan isi formulir berikut untuk mengakses aplikasi</p>
</div>

<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route ('submitRegister')}}" method="post">
                    @csrf
                    <label for="name">Nama Lengkap</label>
                    <input class="form-control mb-2" type="text" name="name" required>

                    <label for="email">Email Address</label>
                    <input class="form-control mb-2" type="email" name="email" required>

                    <label for="password">Password</label>
                    <input class="form-control mb-2" type="password" name="password" required>

                    <p>Sudah punya akun ? <a href="/login">Masuk</a></p>

                    <button class="btn btn-primary">Registrasi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection