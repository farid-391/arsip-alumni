<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/******* Fixed Route ********/  

/* Public */ 

Route::get('/', function () {
    return view('pages/public/index'); //public dashboard page
});
Route::get('/lihat/alumni', 'PublicController@publicAlumni');
Route::get('/lihat/prestasi', 'PublicController@publicPrestasi');
Route::get('/lihat/tahun-akademik', 'PublicController@tahunAkademik');
Route::get('/lihat/tahun-akademik/{slug}', 'PublicController@detailTahunAkademik'); //list tahun
Route::get('/tahun-akademik/{slug}', 'GetController@academicYearShow'); 


Route::get('/lihat/alumni/{slug}', 'PublicController@detailAlumni');
Route::get('/lihat/prestasi/{slug}', 'PublicController@detailPrestasi');
Route::get('/prestasi/{slug}', 'GetController@detailPrestasi');

Route::get('/beranda', function () {
    return view('pages/admin/index'); //dashboard page
});
Route::post('/beranda', 'AuthController@login'); //Login 
Route::get('/masuk', function () {
    return view('pages/auth/signin');
});

//grafik
Route::get('/grafik', 'GetController@grafik');
Route::get('/bar', 'GetController@chart');

// Tahun Akademik
Route::get('/tahun-akademik', 'GetController@academicYear'); //list tahun
Route::post('/tambah-tahun', 'PostController@addYear'); //tambah data tahun


// Alumni
Route::get('/alumni', 'GetController@alumni'); //alumni lihat list
Route::post('/tambah-alumni', 'PostController@addAlumni'); //tambah data alumni
Route::get('/alumni/{slug}', 'GetController@alumniDetail');

// Menu Prestasi
Route::get('/prestasi', 'GetController@prestasi');
Route::post('/tambah-prestasi', 'PostController@addAchievement');
Route::post('/tambah-kategori-prestasi', 'PostController@addAchievCategory');
Route::post('/tambah-kategori-juara', 'PostController@addRankCategory');
?>