@extends('layouts.default')
@section('title', 'Dashboard')
@section('nav-status-1', 'active')
@section('nav-status-2', '')
@section('nav-status-3', '')
@section('nav-status-4', '')
@section('nav-status-5', '')
@section('content')
<ol class="breadcrumb d-flex mt-4">
    <li class="breadcrumb-item active">Beranda</li>
</ol>
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card mb-4 d-flex">
            <div class="card-body card__body-title">
                <div class="d-flex flex-column">
                    <p>Selamat Datang,</p>
                    <input type="text" hidden id="token" value="{{$token}}">
                    <script>
                            let token = document.getElementById('token');
                            console.log(token.value);
                            localStorage.setItem("token", token.value);
                    </script>
                    <span class="h5 bold text__blue-color pt-1 pb-2">Admin Arsip</span>
                </div>
                <img src="{{asset('icons/welcome_icon.svg')}}" class="card__body-icon pt-1" alt="Welcome Icon">
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="text__blue-color stretched-link h6" href="#">Lihat Petunjuk</a>
                <div class="text__blue-color"><i class='bx bx-chevron-right bx-sm'></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card text__black bg-white  mb-4">
            <div class="card-body bg- card__body-title h6">Jumlah Alumni</div>
            <div class="card-body pt-0 h3 ">
             {{ $posts -> data -> jumlah_siswa }}
            </div>
            <img src="{{asset('icons/alumni_card_icon.svg')}}" width="60px" height="60px" class="card__body-icon mt-4" alt="Welcome Icon">
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class=" text__blue-color stretched-link h6" href="{{ url('/alumni')}}">Lihat
                    Detail</a>
                <div class="text__blue-color"><i class='bx bx-chevron-right bx-sm'></i></div>
            </div>
        </div>      
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card text__black mb-4">
            <div class="card-body card__body-title h6">Jumlah Prestasi</div>
            <div class="card-body pt-0 h3">
                {{ $posts2->data -> jumlah_prestasi }}
            </div>
            <img src="{{asset('icons/trophy_card_icon.svg')}}" width="60px" height="60px" class="card__body-icon mt-4" alt="Welcome Icon">
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="text__blue-color stretched-link h6" href="{{ url('/prestasi')}}">Lihat
                    Detail</a>
                <div class="text__blue-color"><i class='bx bx-chevron-right bx-sm'></i></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class='bx bx-bar-chart-alt-2 mr-2'></i>
                Grafik ALumni
            </div>
            <div class="card-body"><canvas id="alumniGraphAreaChart" width="100%" height="40"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class='bx bx-pie-chart-alt-2 mr-2'></i>
                Chart Prestasi
            </div>
            <div class="card-body"><canvas id="prestasiBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('/js/alumni-chart.js') }}"></script>
@endsection
