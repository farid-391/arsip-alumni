@extends('layouts.public')
@section('title', 'Tahun Akademik')
@section('nav-status-1', '')
@section('nav-status-2', 'active')
@section('nav-status-3', '')
@section('nav-status-4', '')
@section('content')
<nav aria-label="breadcrumb" class="mt-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Tahun</a></li>
    </ol>
</nav>
<div class="card mb-4">
  <div class="card-header d-flex">
      <h5 class="text__first-color">Tahun Akademik</h5>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-md table-bordered table-hover " id="yearTable" width="100%" cellspacing="0">
              <tbody id="listTahun">
                  @php($count=0)
                  @foreach($posts->data as $post)
                  @php($count++)
                      <tr>
                          <td class="align-middle"><h6><a href="/lihat/tahun-akademik/{{$post->id}}" class="pe-auto">{{ $post-> tahun_awal }} / {{ $post-> tahun_akhir }}</a></h6></td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
@endsection
