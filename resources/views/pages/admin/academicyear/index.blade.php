@extends('layouts.default')
@section('title', 'Tahun Akademik')
@section('nav-status-1', '')
@section('nav-status-2', 'active')
@section('nav-status-3', '')
@section('nav-status-4', '')
@section('nav-status-5', '')
@section('content')
<ol class="breadcrumb d-flex mt-4">
    <li class="breadcrumb-item active">Tahun Akademik</li>
</ol>
<div class="card mb-4">
    <div class="card-header d-flex justify-content-end">
        <button onclick="getToken()" class="btn btn-sm btn__icon-first d-flex" type="submit" name="addyear" data-toggle="modal" id="addYear" data-target="#addYearModal"><i class='bx bx-plus bx-tada-hover icon__size-2'></i>Tambah
            Tahun</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover " id="yearTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="mt-4">
                        <th width="75%">Tahun Akademik</th>
                        <th class="align-center" data-sortable="false">Aksi</th>
                    </tr>
                </thead>
                <tbody id="listTahun">
                    @php($count=0)
                    @foreach($posts->data as $post)
                    @php($count++)
                        <tr>
                            <td class="align-middle"><a href="/tahun-akademik/{{$post->id}}" class="pe-auto text-dark">{{ $post-> tahun_awal }} / {{ $post-> tahun_akhir }}</a></td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Action Button">
                                    <a class="btn btn-outline-primary d-flex p-1 pr-1" href="/tahun-akademik/{{$post->id}}" type="button" title="Lihat Data">
                                        <i class="bx bxs-show icon__size-2 bx-tada-hover"></i>Lihat
                                    </a>
                                    <a class="btn btn-outline-success d-flex p-1 pr-1" type="button" name="edityear" data-toggle="modal" id="editYear" data-target="#editYearModal" title="Edit Data">
                                        <i class="bx bxs-edit-alt icon__size-2 bx-tada-hover"></i>Edit
                                    </a>
                                    <a class="btn btn-outline-danger d-flex p-1" type="button" data-toggle="modal" id="deleteYear" data-target="#deleteYearModal" data-placement=" bottom" title="Hapus Data">
                                        <i class="bx bxs-trash-alt icon__size-2 bx-tada-hover"></i>Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                        {{-- @foreach($post->siswa as $siswa) --}}
                           {{-- siswa --}}
                        {{-- @endforeach --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Data Tahun Akademik-->
<div class="modal fade" id="addYearModal" tabindex="-1" aria-labelledby="addYearLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg__first-color">
                <h5 class="modal-title text-white" id="addYearLabel">Tambah Tahun Akademik</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2 text-white" aria-hidden="true">&times;</span></button>
            </div>
            <form action="/tambah-tahun" method="POST" id="academicYearForm" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="w-100 mb-2">Tahun Akademik</label>
                        <input type="text" id="tambahTahunAwal" placeholder="Tahun Awal" name="yearStart">
                        <span class="px-1">/</span>
                        <input type="text" id="tambahTahunAkhir" placeholder="Tahun Akhir" name="yearEnd">
                        <input type="hidden" id="bearerToken" name="bearer_token" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="cancel" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Data Tahun Akademik-->
<div class="modal fade" id="editYearModal" tabindex="-1" aria-labelledby="editYearLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editYearLabel">Edit Tahun Akademik</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="w-100 mb-2">Tahun Akademik</label>
                    <input type="text" id="editTahunAwal" placeholder="2018" name="edit_tahunawal">
                    <span class="px-1">/</span>
                    <input type="text" id="editTahunAkhir" placeholder="2019" name="edit_tahunakhir">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Data-->
<div class="modal fade" id="deleteYearModal" tabindex="-1" role="dialog" aria-labelledby="deleteYearLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteYearLabel">Peringatan</h5>
                <button type="button" class="close border-0 rounded-circle bg-transparent" data-dismiss="modal" aria-label="Close"><span class="fs-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body"><span class="fw-bold">Yakin untuk menghapus?</span>
                <p class="fw-lighter">Seluruh data alumni pada tahun ini
                    juga akan ikut terhapus!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                <a href="#delete" id="delete" class="btn btn-success">Yakin</a>
            </div>
        </div>
    </div>
</div>
<script>
    // $(document).on("click", "#delete", function() {
    //     $('#deleteYearModal').modal('hide');
    // });

</script>
@endsection
