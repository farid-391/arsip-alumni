@extends('layouts.default')
@section('title', 'Detail Alumni')
@section('nav-status-1', '')
@section('nav-status-2', '')
@section('nav-status-3', 'active')
@section('nav-status-4', '')
@section('nav-status-5', '')
@section('content')
<ol class="breadcrumb d-flex flex-row mt-4">
    <li class="breadcrumb-item"><a href="{{ url('/alumni')}}">Alumni</a></li>
    <li><i class="bx bx-chevron-right px-2 bx-sm"></i></li>
    <li class="breadcrumb-item active">{{ $post -> slug}}</li>
</ol>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header d-flex flex-row">
                <i class='bx bxs-user-detail px-2 icon__size-2'></i>
                <span>Detail Alumni</span>
            </div>
            {{-- @foreach($posts->data as $post) --}}
            <div class="card-body">
                <table class="table table-striped table-md table-borderless" id="alumniDetailTable" width="100%" cellspacing="0">
                    <tr>
                        <td width="35%"><span class="fw-bold"> Nama Lengkap</span></td>
                        <td width="5%">:</td>
                        <td width="65%">{{$post -> nama_lengkap}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> NISN</span></td>
                        <td>:</td>
                        <td>{{$post -> nisn}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> NIS</span></td>
                        <td>:</td>
                        <td>{{$post -> nis}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Tempat Lahir</span></td>
                        <td>:</td>
                        <td>{{$post -> tempat_lahir}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Tanggal Lahir</span></td>
                        <td>:</td>
                        <td>{{$post -> tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Jenis Kelamin</span></td>
                        <td>:</td>
                        <td>{{($post -> jenis_kelamin) === 'L' ? 'Laki-Laki' : "Perempuan" }}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Jurusan</span></td>
                        <td>:</td>
                        <td>{{$post -> jurusan}}</td>
                    </tr>
                    <tr>
                        <td><span class="fw-bold"> Tahun Lulus</span></td>
                        <td>:</td>
                        <td>{{$post -> tahun_lulus}}</td>
                    </tr>
                </table>
                <button class="btn btn__icon-blue d-flex align-content-end" type="submit" name="editalumni" data-toggle="modal" id="editAlumni" data-target="#editAlumniModal"><i class='bx bx-edit bx-tada-hover pr-2 icon__size-2'></i>Edit Data</button>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header d-flex flex-row">
                <i class='bx bx-file px-2 icon__size-2'></i>
                <span>File Alumni</span>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td class="text-left">Pas Foto</td>
                        </tr>
                        <tr>
                            <td class="align-center"><img src="{{$post -> foto_siswa}}" alt="" width="200" height="200"></td>
                        </tr>
                        <tr>
                            <td class="text-left">Ijazah dan SKHUN</td>
                        </tr>
                        <tr>
                            <td class="align-center"><img src="{{asset('/img/temp/ijazah.jpg')}}" alt="" width="200" height="200" class="pr-4">
                                <img src="{{asset('/img/temp/skhun.jpg')}}" alt="" width="200" height="200"></td>
                        </tr>
                    </table>
                    <button class="btn btn__icon-green d-flex align-content-end" type="submit" name="editfilealumni" data-toggle="modal" id="editFileAlumni" data-target="#editFileAlumniModal"><i class='bx bx-edit bx-tada-hover icon__size-2'></i>Edit File</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Data Alumni-->
<div class="modal fade" id="editAlumniModal" tabindex="-1" aria-labelledby="editAlumniLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAlumniLabel">Edit Data Alumni</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group mb-2">
                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namalengkap" placeholder="Farid Afgar" name="nama_lengkap">
                    </div>
                    <div class="form-group mb-2">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" placeholder="00171402222" name="nisn">
                    </div>
                    <div class="form-group mb-2">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" placeholder="1800018391" name="nis">
                    </div>
                    <div class="form-group mb-2">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Tulehu" name="tempat_lahir">
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal_lahir">Tenggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" placeholder="14/02/2001" name="tanggal_lahir">
                    </div>
                    <div class="form-group mb-2">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="" disabled>Pilih Jenis Kelamin</option>
                            <option value="L" selected>Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="" disabled>Pilih Jurusan</option>
                            <option value="SAINS" selected>IPA/MIA</option>
                            <option value="SOCIAL">IPS/IIS</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <select class="form-control" name="tahun_lulus" id="tahun_lulus">
                            <option value="" disabled>Pilih Tahun Lulus</option>
                            <option value="2018/2019" selected>2018/2019</option>
                            <option value="2019/2020">2019/2020</option>
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
<div class="modal fade" id="editFileAlumniModal" tabindex="-1" aria-labelledby="editFileAlumniLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFileAlumniLabel">Edit File Data Alumni</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group mb-4">
                        <label for="img">Unggah Foto Siswa(.jpg, .jpeg, .png)</label>
                        <input type="file" class="form-control" id="pasfoto" name="pasfoto" accept="image/jpeg, image/png, image/jpg">
                    </div>
                    <div class="form-group mb-4">
                        <label for="ijazah">Unggah File Ijazah Siswa (.pdf)</label>
                        <input type="file" class="form-control" id="ijazah" name="ijazah" accept="application/pdf">
                    </div>
                    <div class="form-group mb-4">
                        <label for="skhun">Unggah File SKHUN Siswa (.pdf)</label>
                        <input type="file" class="form-control" id="skhun" name="skhun" accept="application/pdf" multiple>
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
@endsection
