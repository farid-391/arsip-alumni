@extends('layouts.public')
@section('title', 'Alumni')
@section('nav-status-1', '')
@section('nav-status-2', '')
@section('nav-status-3', 'active')
@section('nav-status-4', '')
@section('content')
<nav aria-label="breadcrumb" class="mt-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/lihat/alumni">Alumni</a></li>
      <li class="breadcrumb-item active">{{ $student -> data -> slug}}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-xl-3 col-sm-12">
        <div class="card mb-4">
            <div class="card-header d-flex flex-row">
                <i class='bx bx-image px-2 icon__size-2'></i>
                <span>Pas Foto</span>
            </div>
            <div class="card-body">
                <td class="align-center">                    
                    <div class="d-flex flex-column">
                        <img src="{{$student -> data -> foto_siswa}}" alt="Photo" width="200" height="200">
                    </div>
                </td>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-sm-12">
        <div class="card mb-4">
            <div class="card-header d-flex flex-row">
                <i class='bx bxs-user-detail px-2 icon__size-2'></i>
                <span>Detail Alumni</span>
            </div>
            <div class="card-body">
                <table class="table table-striped table-md table-borderless" id="alumniDetailTable" width="100%" cellspacing="0">
                    <tr>
                        <td width="20%"><span class="fw-bold"> Nama Lengkap</span></td>
                        <td width="5%">:</td>
                        <td width="75%">{{$student -> data -> nama_lengkap}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> NISN</span></td>
                        <td>:</td>
                        <td>{{$student -> data -> nisn}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> NIS</span></td>
                        <td>:</td>
                        <td>{{$student -> data -> nis}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Tempat Lahir</span></td>
                        <td>:</td>
                        <td>{{$student -> data -> tempat_lahir}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Tanggal Lahir</span></td>
                        <td>:</td>
                        <td>{{$student -> data -> tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Jenis Kelamin</span></td>
                        <td>:</td>
                        <td>{{($student -> data -> jenis_kelamin) === 'L' ? 'Laki-Laki' : "Perempuan" }}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Jurusan</span></td>
                        <td>:</td>
                        <td>{{$student -> data -> jurusan}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Tahun Lulus</span></td>
                        <td>:</td>
                        <td>{{$student -> data -> tahun_lulus}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
