@extends('guest.layout.index')
@section('content')
<div class="text-center mt-5" >
    <h2>Login Aplikasi</h2>
    <p>Silakan isi formulir berikut untuk mengakses aplikasi</p>
</div>

<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route ('submitLogin')}}" method="post">
                    @csrf
                    <label for="email">Email Address</label>
                    <input class="form-control mb-2" type="email" name="email" required>

                    <label for="password">Password</label>
                    <input class="form-control mb-2" type="password" name="password" required>

                    <p>Belum punya akun ? <a href="/login/register">Buat Akun</a></p>

                    <button class="btn btn-primary">Login</button>
                </form>
                @if (session('gagal'))
                    <p class="text-danger mt-3 text-center">{{session('gagal')}}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection