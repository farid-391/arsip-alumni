@extends('layouts.default')
@section('title', 'List Prestasi')
@section('nav-status-1', '')
@section('nav-status-2', '')
@section('nav-status-3', '')
@section('nav-status-4', 'active')
@section('nav-status-5', '')
@section('content')
<ol class="breadcrumb d-flex flex-row mt-4">
    <li class="breadcrumb-item"><a href="{{ url('/prestasi')}}">Prestasi</a></li>
    <li><i class="bx bx-chevron-right px-2 bx-sm"></i></li>
    <li class="breadcrumb-item active">{{ $posts -> slug }}</li>
</ol>
<div class="row">
    <div class="col-xl-6">
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
                                <li><span class="fa-li pl-0 ml-0"></span><i class='bx bx-checkbox-checked text__first-color pr-2 bx-sm align-middle'></i><a href="/alumni/{{$siswa->id}}">{{$siswa->full_name}}</a></li>
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
                <button class="btn btn__icon-blue d-flex align-content-end" type="submit" name="editPrestasi" data-toggle="modal" id="editPrestasi" data-target="#editPrestasiModal"><i class='bx bx-edit bx-tada-hover pr-2 icon__size-2'></i>Edit Data</button>
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
                <button class="btn btn__icon-green d-flex align-content-end" type="submit" name="editfiledokumentasi" data-toggle="modal" id="editfiledokumentasi" data-target="#editFileDokumentasiModal"><i class='bx bx-edit bx-tada-hover icon__size-2'></i>Edit File</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Data Prestasi-->
<div class="modal fade" id="editPrestasiModal" tabindex="-1" aria-labelledby="editPrestasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPrestasiLabel">Tambah Data Prestasi</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group mb-2">
                        <label for="namalomba">Nama Acara</label>
                        <input type="text" class="form-control" id="namalomba" placeholder="Olimpiade Siswa Nasional" name="nama_lomba">
                    </div>
                    <div class="form-group mb-2">
                        <label for="kategori_lomba">Kategori Acara</label>
                        <select class="form-control" name="kategori_lomba" id="kategori_lomba">
                            <option value="" disabled>Pilih Kategori</option>
                            <option value="1" selected>OSN</option>
                            <option value="2">Olahraga</option>
                            <option value="3">Pentas Seni</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="penyelenggara">Penyelenggara Acara</label>
                        <input type="text" class="form-control" id="penyelenggara" placeholder="Kementerian Pendidikan" name="penyelenggara">
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal_acara">Tanggal Acara</label>
                        <input type="date" class="form-control" id="tanggal_acara" placeholder="14/02/2001" name="tanggal_acara">
                    </div>
                    <div class="form-group mb-2">
                        <label for="peserta">Peserta</label>
                        <input type="text" class="form-control" id="peserta" placeholder="Farid Afgar" name="
                                peserta">
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="juara">Juara</label>
                        <select class="form-control" name="juara" id="juara">
                            <option value="" disabled>Pilih Juara</option>
                            <option value="1" selected>1</option>
                            <option value="2">Harapan</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit File Alumni -->
<div class="modal fade" id="editFileDokumentasiModal" tabindex="-1" aria-labelledby="editFileDokumentasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFileDokumentasiLabel">Edit Dokumentasi Prestasi</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group mb-4">
                        <label for="skhun">Unggah File Dokumentasi (.img/.jpeg/jpg/pdf)</label>
                        <input type="file" class="form-control" id="skhun" name="skhun" accept="image/jpeg, image/png, image/jpg, application/pdf" multiple>
                    </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
