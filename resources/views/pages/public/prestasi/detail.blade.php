@extends('layouts.public')
@section('title', 'Dashboard')
@section('nav-status-1', '')
@section('nav-status-2', '')
@section('nav-status-3', '')
@section('nav-status-4', 'active')
@section('content')
<nav aria-label="breadcrumb" class="mt-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/lihat/prestasi">Prestasi</a></li>
      <li class="breadcrumb-item active">{{ $posts -> slug }}</li>
</nav>
<div class="row">
    <div class="col-xl-6 col-sm-12">
        <div class="card mb-4">
            <div class="card-header d-flex flex-row">
                <i class='bx bx-trophy px-2 icon__size-2'></i>
                <span>Detail Prestasi</span>
            </div>
            <div class="card-body">
                <table class="table table-striped table-md table-borderless" id="alumniDetailTable" width="100%" cellspacing="0">
                    <tr>
                        <td width="20%">Nama Lomba</td>
                        <td width="5%">:</td>
                        <td width="75%">{{$posts -> nama_acara}}</td>
                    </tr>
                    <tr>
                        <td>Kategori Lomba</td>
                        <td>:</td>
                        <td>{{$posts -> kategori_lomba}}</td>
                    </tr>
                    <tr>
                        <td>Penyelenggara</td>
                        <td>:</td>
                        <td>{{$posts -> penyelenggara}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lomba</td>
                        <td>:</td>
                        <td>{{$posts-> tanggal_acara}}</td>
                    </tr>
                    <tr>
                        <td>Peserta</td>
                        <td>:</td>
                        <td>
                            <ul class="fa-ul pl-0 ml-0">
                                @foreach($posts -> siswa as $siswa)
                                <li><span class="fa-li pl-0 ml-0"></span><i class='bx bx-checkbox-checked text__first-color pr-2 bx-sm align-middle'></i><a href="/lihat/alumni/{{$siswa->id}}">{{$siswa->full_name}}</a></li>
                                @endforeach 
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Juara</td>
                        <td>:</td>
                        <td>{{$posts -> kategori_juara}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header d-flex flex-row">
                <i class='bx bx-photo-album px-2 icon__size-2'></i>
                <span>File Dokumentasi</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <td class="text-left">Piagam / Sertifikat</td>
                        </tr>
                        <tr>
                            <td class="align-center"><img src="{{$posts -> link_piagam}}" alt="" width="200" height="200"></td>
                        </tr>
                        <tr>
                            <td class="text-left">Dokumentasi</td>
                        </tr>
                        <tr>
                            <td class="align-center">
                                @foreach ($docsURL as $url)<img src="{{$url}}" alt="" width="200" height="200" class="pr-2">@endforeach</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
