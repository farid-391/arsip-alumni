@extends('layouts.default')
@section('title', 'Detail Prestasi')
@section('nav-status-1', '')
@section('nav-status-2', '')
@section('nav-status-3', '')
@section('nav-status-4', 'active')
@section('nav-status-5', '')
@section('content')
<ol class="breadcrumb d-flex mt-4">
    <li class="breadcrumb-item">Prestasi</a></li>
</ol>
<div class="card mb-4">
    <div class="card-header d-flex justify-content-end">
        <button class="btn btn-sm btn-success d-flex mr-2" onclick="getToken()"  type="submit" name="addcategory" data-toggle="modal" id="addCategory" data-target="#addCategoryModal"><i class='bx bx-plus bx-tada-hover icon__size-2'></i>Tambah
            Kategori</button>
        <button class="btn btn-sm btn__icon-first d-flex" onclick="getAltToken()" type="submit" name="addprestasi" data-toggle="modal" id="addprestasi" data-target="#addPrestasiModal"><i class='bx bx-plus bx-tada-hover icon__size-2'></i>Tambah
            Prestasi</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th data-field="counter">#</th>
                        <th data-field="nama_lomba">Nama Lomba</th>
                        <th data-field="kategori_acara">Kategori</th>
                        <th data-field="penyelenggara">Penyelenggara</th>
                        <th data-field="tanggal_acara">Tanggal</th>
                        <th data-field="peserta">Peserta</th>
                        <th data-field="kategori_juara">Juara</th>
                        <th data-sortable="false">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($count=0)
                    @foreach($posts->data as $post)
                    @php($count++)
                    <tr>
                        <td class="align-middle text-center">{{ $count }}</td>
                        <td class="align-middle">{{ $post -> nama_acara }}</td>
                        <td class="align-middle">{{ $post -> kategori_lomba}}</td>
                        <td class="align-middle">{{ $post -> penyelenggara}}</td>
                        <td class="align-middle">{{ $post -> tanggal_acara }}</td>
                        <td class="align-middle"> @foreach ($post->siswa as $list)<i class='bx bx-chevron-right'></i> <a href="/alumni/{{$list -> id}}">{{$list -> full_name }}</a> <br/>@endforeach</td>
                        <td class="align-middle text-center">{{ $post -> kategori_juara }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Action Button">
                                <a href="/prestasi/{{$post->slug}}" class="btn btn-outline-primary d-flex" type="button" name="detailPrestasi" data-placement="bottom" title="Detail Prestasi">
                                    <i class='bx bxs-photo-album icon__size-2 bx-tada-hover'></i>
                                </a>
                                <button class="btn btn-outline-success d-flex" type="button" name="editprestasi" data-toggle="modal" id="editPrestasi" data-target="#editPrestasiModal" title="Edit Data Prestasi">
                                    <i class='bx bxs-pencil icon__size-2 bx-tada-hover'></i>
                                </button>
                                <button class=" btn btn btn-outline-danger d-flex" type="button" data-toggle="modal" id="deletedata" data-target="#deleteModal" title="Hapus Data">
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
</div>


<!-- Modal Tambah Data Prestasi-->
<div class="modal fade" id="addPrestasiModal" tabindex="-1" aria-labelledby="addPrestasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg__first-color text-white">
                <h5 class="modal-title" id="addPrestasiLabel">Tambah Data Prestasi</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2 text-white" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/tambah-prestasi" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="tambahNamaAcara">Nama Acara</label>
                        <input type="text" class="form-control" id="tambahNamaAcara" placeholder="Masukkan Nama Acara" name="tambah_namaacara" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tambahKategoriAcara">Kategori Prestasi</label>
                        <select class="form-control" id="tambahKategoriAcara"  name="tambah_kategoriacara" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($achievementCategories as $achievementCategory)
                                <option value="{{$achievementCategory->id}}">{{$achievementCategory->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tambahPenyelenggara">Penyelenggara Acara</label>
                        <input type="text" class="form-control" id="tambahPenyelenggara" placeholder="Masukkan Penyelenggara" name="tambah_penyelenggara" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tambahTanggalAcara">Tanggal Acara</label>
                        <input type="date" class="form-control" id="tambahTanggalAcara" placeholder="Masukkan tanggal acara" name="tambah_tanggalacara" required="true"
                        oninput="this.setCustomValidity('')"
                        oninvalid="this.setCustomValidity('This is my custom message.">
                    </div>
                    <div class="form-group mb-2" id="pesertaField">
                        <label for="tambahPeserta" class="form-label">Peserta</label>
                        <input class="form-control" list="pesertaOpsi" id="tambahPeserta" placeholder="Cari NIS atau Nama..." name="tambah_peserta">
                        <datalist id="pesertaOpsi">
                            @foreach($posts4->data as $siswa)
                            <option value="{{$siswa ->id_siswa}}">{{$siswa ->nama_lengkap}}</option>
                            @endforeach
                        </datalist>
                        <button onclick="addNewStudent()">Tambah Siswa Lain</button>
                        <script>
                            function addNewStudent(){
                                let form = document.getElementById('pesertaField')
                                let new field = ""
                                form.insertAdjacentElement()
                            }
                        </script>
                    </div>
                    <div class="form-group mb-2">
                        <label for="pilihKategoriJuara">Juara</label>
                        <select class="form-control" id="pilihKategoriJuara" name="pilih_kategorijuara">
                            <option value="" disabled selected>Pilih Kategori Juara</option>
                            @foreach($rankCategories as $rankCategory)
                            <option value="{{$rankCategory-> id}}">{{$rankCategory->rank}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="bearerAltToken" name="bearer_alttoken" hidden>
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

<!-- Modal Edit Data Prestasi-->
<div class="modal fade" id="editPrestasiModal" tabindex="-1" aria-labelledby="editPrestasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPrestasiLabel">Edit Data Prestasi</h5>
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

<!-- Modal Tambah Data Kategori-->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg__first-color text-white">
                <h5 class="modal-title" id="addCategoryLabel">Tambah Data Kategori</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2 text-white" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" id="formCategory" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <select class="form-control" name="kategori_lomba" id="selectCategory" onchange="catFunction()">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Prestasi">Prestasi</option>
                            <option value="Juara">Juara</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="kategori" id="labelCategory">Kategori</label>
                        <input type="text" class="form-control" id="kategori" placeholder="Masukkan Kategori" name="input_kategori">
                        <input type="hidden" id="bearerToken" name="bearer_token" hidden>
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

<script src="{{asset('js/prestasi.js')}}"></script>

@push('script')
<script>
    

    $(document).on("click", "#delete", function() {
        $('#deleteYearModal').modal('hide');
    });

</script>

@endpush
@endsection
