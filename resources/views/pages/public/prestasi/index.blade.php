@extends('layouts.public')
@section('title', 'Dashboard')
@section('nav-status-1', '')
@section('nav-status-2', '')
@section('nav-status-3', '')
@section('nav-status-4', 'active')
@section('content')
<nav aria-label="breadcrumb" class="mt-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Prestasi</a></li>
    </ol>
</nav>
<div class="card mb-4">
    <div class="card-header d-flex">
        <h5 class="text__first-color">Data Prestasi</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg__first-color text-white ">
                    <tr>
                        <th data-field="counter" class="text-center">#</th>
                        <th data-field="nama_lomba">Nama Lomba</th>
                        <th data-field="penyelenggara">Penyelenggara</th>
                        <th data-field="kategori_juara">Juara</th>
                        <th data-sortable="false" class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @php($count=0)
                    @foreach($posts->data as $post)
                    @php($count++)
                    <tr>
                        <td class="align-middle text-center">{{ $count }}</td>
                        <td>{{ $post -> nama_acara }}</td>
                        <td>{{ $post -> penyelenggara}}</td>
                        <td>{{ $post -> kategori_juara }}</td>
                        <td class="text-center">
                            <a href="/lihat/prestasi/{{$post->slug}}">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection