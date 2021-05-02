@extends('layouts.public')
@section('title', 'Dashboard')
@section('nav-status-1', 'active')
@section('nav-status-2', '')
@section('nav-status-3', '')
@section('nav-status-4', '')
@section('content')
<div class="row d-flex flex-row mt-lg-5">
    <div class="col col-xl-8 col-sm-12 px-0">
        <img src="{{asset('/icons/landing_illustration.svg')}}" class="pl-0" width="500px" height="500px" alt="">
    </div>
    <div class="col col-xl-4 col-sm-12 text-center ml-lg-n5 mt-lg-5 pt-lg-5">
        <h2 class="text-dark align-content-center" style="line-height: 2.5rem">Temukan Data <br>Alumni dan Prestasi<br>
        <span class="mt-2 font-weight-bold">Alumni SMA TMIP</span></h2>
        <a href="#cardAction" class="btn btn__icon-yellow btn-lg px-4 mt-2">Mulai</a>
    </div>
</div>
<div class="row mb-lg-2 d-flex flex-row px-4 mt-lg-4" id="cardAction">
    <div class="col col-xl-4 col-md-8 col-sm-12">
        <div class="card">
            <img src="{{asset('/icons/calendar_card_blue.svg')}}" class="card-img-top rounded mx-auto d-block w-25 mt-4" width="100px" height="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Tahun Akademik</h5>
              <p class="card-text"></p>
              <div class="text-center"><a href="/lihat/tahun-akademik" class="btn btn__icon-first text-end">Lihat Tahun</a></div>
            </div>
        </div>
    </div>
    <div class="col col-xl-4 col-md-8 col-sm-10">
        <div class="card">
            <img src="{{asset('/icons/alumni_card_blue.svg')}}" class="card-img-top rounded mx-auto d-block w-25 mt-4" width="100px" height="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Alumni</h5>
              <p class="card-text"></p>
              <div class="text-center"><a href="/lihat/alumni" class="btn btn__icon-first text-end">Lihat Alumni</a></div>
            </div>
        </div>
    </div>
    <div class="col col-xl-4 col-md-8 col-sm-10">
        <div class="card">
            <img src="{{asset('/icons/trophy_card_blue.svg')}}" class="card-img-top rounded mx-auto d-block w-25 mt-4" width="100px" height="100px" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Prestasi</h5>
              <p class="card-text"></p>
              <div class="text-center"><a href="/lihat/prestasi" class="btn btn__icon-first text-end">Lihat Prestasi</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
