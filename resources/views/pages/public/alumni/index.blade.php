@extends('layouts.public')
@section('title', 'Alumni')
@section('nav-status-1', '')
@section('nav-status-2', '')
@section('nav-status-3', 'active')
@section('nav-status-4', '')
@section('content')
<nav aria-label="breadcrumb" class="mt-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Alumni</a></li>
    </ol>
</nav>
<div class="card mb-4">
    <div class="card-header d-flex">
        <h5 class="text__first-color">Data Alumni</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table rounded-10 table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg__first-color text-white">
                    <tr>
                        <th width="2%">#</th>
                        <th data-field="nama_lengkap">Nama Lengkap</th>
                        <th data-field="nisn">NISN</th>
                        <th data-field="nis">NIS</th>
                        <th data-field="tahun_lulus">Tahun Lulus</th>
                        <th data-field="aksi" class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @php($count=0)
                    @foreach($students->data as $student)
                    @php($count++)
                        
                        <tr>
                            <td class="align-middle text-center">{{ $count }}</td>
                            <td>{{ $student -> nama_lengkap }}</td>
                            <td>{{ $student -> nisn }}</td>
                            <td>{{ $student -> nis }}</td>
                            <td>{{ $student -> tahun_lulus }}</td>
                            <td class="text-center"><a href="/lihat/alumni/{{$student->slug}}" >Lihat</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
