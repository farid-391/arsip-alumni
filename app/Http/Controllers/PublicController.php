<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublicController extends Controller
{
    public function tahunAkademik(){
        $students = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/siswa"));
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/tahun-akademik"));
        
        return view('pages.public.tahun.index', compact('students', 'posts'));
    }

    public function publicAlumni(){
        $students = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/siswa"));
        $posts2 = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/tahun-akademik"));
        
        return view('pages.public.alumni.index', compact('students', 'posts2'));
    }
    public function publicPrestasi(){
        //call apis
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/prestasi"));
        return view('pages.public.prestasi.index', compact('posts'));
    }

    public function detailAlumni($slug){
        $student = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/siswa/$slug"));
        return view('pages.public.alumni.detail', compact('student'));
    }
    public function detailPrestasi($slug){
        //call apis
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/prestasi/$slug"));

        foreach($posts  as $item){
            // $docs = $post->link_dokumentasi;
            $posts = $item[0];
        }
        $docsURL = explode(',', $posts->link_dokumentasi);
       
        return view('pages.public.prestasi.detail', compact('posts', 'docsURL'));
    }

    public function detailTahunAkademik($attr){
        $academicYear = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/tahun-akademik/$attr"));
        return view('pages.public.tahun.detail', compact('academicYear'));
    }
}
?>