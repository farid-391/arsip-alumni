@extends('layouts.default')
@section('title', 'List Alumni')
@section('nav-status-1', '')
@section('nav-status-2', '')
@section('nav-status-3', 'active')
@section('nav-status-4', '')
@section('nav-status-5', '')
@section('content')
<ol class="breadcrumb d-flex flex-row mt-4">
    <li class="breadcrumb-item text-dark">Alumni</a></li>
</ol>
<div class="card mb-4">
    <div class="card-header d-flex justify-content-end">
        <button onclick="getToken()" class="btn btn-sm btn__icon-first d-flex" type="submit" name="addalumni" data-toggle="modal" id="addAlumni" data-target="#addAlumniModal"><i class='bx bx-plus bx-tada-hover icon__size-2'></i>Tambah
            Alumni</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="alumniTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th data-field="nama_lengkap">Nama Lengkap</th>
                        <th data-field="nisn">NISN</th>
                        <th data-field="nis">NIS</th>
                        <th data-field="tempat_lahir">Tempat Lahir</th>
                        <th data-field="tanggal_lahir">Tanggal Lahir</th>
                        <th data-field="jenis_kelamin">JK</th>
                        <th data-field="jurusan">Jurusan</th>
                        <th data-field="tahun_lulus">Tahun Lulus</th>
                        <th data-sortable="false">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($count=0)
                    @foreach($posts->data as $post)
                    @php($count++)
                        <tr>
                            <td class="align-middle text-center">{{ $count }}</td>
                            <td>{{ $post -> nama_lengkap }}</td>
                            <td>{{ $post -> nisn }}</td>
                            <td>{{ $post -> nis }}</td>
                            <td>{{ $post -> tempat_lahir }}</td>
                            <td>{{ $post -> tanggal_lahir }}</td>
                            <td>{{ $post -> jenis_kelamin }}</td>
                            <td>{{ $post -> jurusan }}</td>
                            <td>{{ $post -> tahun_lulus }}</td>
                            <td class=" d-flex flex-row justify-content-between">
                                <div class="btn-group" role="group" aria-label="Action Button">
                                    <a href="/alumni/{{$post ->slug}}" class="btn btn-outline-primary d-flex" type="button" name="detailAlumni" title="Lihat Detail">
                                        <i class='bx bxs-file icon__size-2 bx-tada-hover'></i>
                                    </a>
                                    <button class="btn btn-outline-success d-flex" type="button" name="editAlumni" data-toggle="modal" id="editAlumni" data-target="#editAlumniModal" title="Edit Data">
                                        <i class='bx bxs-edit-alt icon__size-2 bx-tada-hover'></i>
                                    </button>
                                    <button class=" btn btn-outline-danger d-flex " type="button" data-toggle="modal" id="deletedata" data-target="#deleteModal" title="Hapus Data">
                                        <i class='bx bxs-trash-alt icon__size-2 bx-tada-hover'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Data Alumni-->
<div class="modal fade" id="addAlumniModal" tabindex="-1" aria-labelledby="addAlumniLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg__first-color">
                    <h5 class="modal-title text-white" id="addAlumniLabel">Tambah Data Alumni</h5>
                    <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2 text-white" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body ">
                <form action="/tambah-alumni" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group mb-2">
                    <label for="tambahNamaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="tambahNamaLengkap" placeholder="Masukkan Nama Lengkap" name="tambah_namalengkap">
                </div>
                <div class="form-group mb-2">
                    <label for="tambahNisn">NISN</label>
                    <input type="text" class="form-control" id="tambahNisn" placeholder="Masukkan NISN" name="tambah_nisn">
                </div>
                <div class="form-group mb-2">
                    <label for="tambahNis">NIS</label>
                    <input type="text" class="form-control" id="tambahNis" placeholder="Masukkan NIS" name="tambah_nis">
                </div>
                <div class="form-group mb-2">
                    <label for="tambahTempatLahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tambahTempatLahir" placeholder="Masukkan tempat lahir" name="tambah_tempatlahir">
                </div>
                <div class="form-group mb-2">
                    <label for="tambahTanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tambahTanggalLahir" placeholder="Masukkan tanggal lahir" name="tambah_tanggallahir">
                </div>
                <div class="form-group mb-2">
                    <label for="tambahJenisKelamin">Jenis Kelamin</label>
                    <select class="form-control" id="tambahJenisKelamin" name="tambah_jeniskelamin">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="tambahJurusan">Jurusan</label>
                    <select class="form-control" id="tambahJurusan"  name="tambah_jurusan">
                        <option value="" disabled selected>Pilih Jurusan</option>
                        <option value="IPA">IPA/MIA</option>
                        <option value="IPS">IPS/IIS</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="tambahTahunLulus">Tahun Lulus</label>
                    <select class="form-control" id="tambahTahunLulus" name="tambah_tahunlulus">
                        <option value="" disabled selected>Pilih Tahun Lulus</option>
                        @foreach($posts2->data as $post2)
                        <option value="{{ $post2 -> id }}">{{ $post2 -> tahun_awal }} / {{ $post2 -> tahun_akhir }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="tambahFotoSiswa">Jurusan</label>
                    <input type="file" class="form-control" id="tambahFotoSiswa" name="tambah_fotosiswa">
                </div>
                <input type="hidden" id="bearerToken" name="bearer_token" hidden>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Modal Edit Data Alumni-->
<div class="modal fade" id="editAlumniModal" tabindex="-1" aria-labelledby="editAlumniLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAlumniLabel">Edit Data Alumni</h5>
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
<!-- Modal Hapus Data-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Peringatan</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">Yakin untuk menghapus?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                <a href="#delete" id="delete" class="btn btn-success">Yakin</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", "#delete", function() {
        $('#deleteYearModal').modal('hide');
    });

</script>

@endsection
