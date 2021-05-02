<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetController extends Controller
{
    public function academicYear(){
        //call apis
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/tahun-akademik")); 
        return view('pages.admin.academicyear.index', compact('posts'));
    }
    public function academicYearShow($slug){
        //call apis
        $academicYear = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/tahun-akademik/$slug"));
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/siswa"));
        return view('pages.admin.academicyear.detail', compact('academicYear','posts'));
    }
    public function alumni(){
        //call apis
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/siswa"));
        $posts2 = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/tahun-akademik"));
        return view('pages.admin.alumni.index', compact('posts','posts2'));
    }
    public function alumniDetail($slug){
        //call apis
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/siswa/$slug"));
        $post = $posts -> data;
        return view('pages.admin.alumni.detail', compact('posts', 'post'));
    }
    public function prestasi(){
        //call apis
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/prestasi"));
        $achievementCategories = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/kategori-prestasi"));
        $rankCategories = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/kategori-juara"));
        $posts4 = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/siswa"));

        
        return view('pages.admin.achievement.index', compact('posts','achievementCategories','rankCategories','posts4'));
    }

    public function detailPrestasi($slug){
        //call apis
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/prestasi/$slug"));

        foreach($posts  as $item){
            // $docs = $post->link_dokumentasi;
            $posts = $item[0];
        }
        $docsURL = explode(',', $posts->link_dokumentasi);
       
        return view('pages.admin.achievement.detail', compact('posts', 'docsURL'));
    }

    public function dashboardAdmin(){
        $posts = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/jumlah/siswa"));
        $posts2 = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/jumlah/prestasi"));
        return view('pages.admin.dashboard', compact('posts', 'posts2'));
    }

    public function grafik(){
        $academicYears = json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/tahun-akademik"));     
        
        $data = array();
        
        foreach($academicYears->data as $academicYear){
            array_push($data,  [
                'tahun' => $academicYear->tahun_awal . '-'. $academicYear->tahun_akhir,
                'total' => $academicYear->jumlah_siswa
            ]);
        }
        
        return response()->json($data, 200);
    }
    public function chart(){
        $categories= json_decode(Http::get("https://shielded-headland-74924.herokuapp.com/api/jumlah/prestasi"));     
        
        $data = array();
        
        foreach($categories->data->detail_jumlah as $category){
            if($category->total!=0){
                array_push($data,  [
                    'kategori' => $category->kategori,
                    'total' => $category->total
                ]);
            }
        }
        
        return response()->json($data, 200);
    }
}
