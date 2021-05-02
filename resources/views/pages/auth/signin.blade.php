@extends('layouts.auth')
@section('title', 'Masuk')
@section('content')
<center>
    <div class="card col-sm-10 col-md-8 col-xl-4 align-self-center px-0" style="border-radius:8px;">
        <form action="/beranda" method="POST">
            @csrf
        <div class="card-header radius-10 bg__first-color px-0" style="border-radius: 8px 8px 0px 0px;">
            <div class="text-light bg__login-header px-4">
                <div class="logo"><img src="{{asset('/img/smatmip_logo.png')}}" class="login__logo" alt="SMATMIP">
                </div>
                <div class="title">
                    <h4 class="text-left">Arsip Alumni<br />SMA TMIP</h4>
                </div>
            </div> 
        </div>
        <div class="card-body px-2">
            <div class="col pt-3 ">
                <label class="sr-only" for="inputEmail">Email</label>
                <div class="input-group mb-2 mt-0">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0 bg__first-color "><i class='bx bxs-user bx-sm text-white'></i>
                        </div>
                    </div>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="col pt-2">
                <label class="sr-only" for="inputPassword">Password</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text border-0 bg__first-color">
                            <i class='bx bxs-lock-alt bx-sm text-white'></i></i>
                        </div>
                    </div>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="col-sm-12 pt-4 btn-submit">
                <button class="btn bg__first-color px-3 text-white" type="submit">Login</button>
            </div>
            <div class="col text-center py-3">
                <p>Lupa Password? <a class="text__first-color font-weight-bold" href="#">Reset</a></p>
            </div>
        </div>
    </div>
</center>
{{-- 

    <div class="row-cols-1 wrap-form">
        <div class="col pt-2">
            <span id="warning"></span>
        </div>
        <div class="col pt-2">
            <label class="sr-only" for="inputEmail">Email</label>
            <div class="input-group mb-2 mt-0">
                <div class="input-group-prepend">
                    <div class="input-group-text border-0 bg__first-color "><i class='bx bxs-user bx-sm text-white'></i>
                    </div>
                </div>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
            </div>
        </div>
        <div class="col pt-2">
            <label class="sr-only" for="inputPassword">Password</label>
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                    <div class="input-group-text border-0 bg__first-color">
                        <i class='bx bxs-lock-alt bx-sm text-white'></i></i>
                    </div>
                </div>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
            </div>
        </div>
        <div class="col-sm-12 pt-4 btn-submit">
            <button class="btn bg__first-color px-3 text-white" type="submit">Login</button>
        </div>
        <div class="col text-center py-3">
            <p>Lupa Password? <a class="text__first-color font-weight-bold" href="#">Reset</a></p>
        </div>
</form> --}}
@endsection
