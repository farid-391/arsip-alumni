<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller{

    public function addYear(Request $request){
        $token = $request->bearer_token;
        $response = Http::withToken($token)->post('https://shielded-headland-74924.herokuapp.com/api/tahun-akademik', [
            'tahun_awal' => $request->yearStart,
            'tahun_akhir' => $request->yearEnd
            ]);

        // sisanya cek sendiri, http response code 404 -> not found, 413 not authorized
        if($response->status() === 200){
            return redirect('/tahun-akademik');
        }else if($response->status() === 403){
            return redirect('/masuk');   
        }else{
            echo('messages : GAGAL');
            echo($response->status());
            return json_decode($response);
        }
    }


    public function addAlumni(Request $request){
        $token = $request->bearer_token;

        $image = $request->file('tambah_fotosiswa');
        // dd($image);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2056',
        ]);
        $imageName = time().'.'.$request->image->extension();
        

        // // // $validated = $request->validate([
        // // //     '' => 'mimes:jpg, png|max:2056',
        // // // $path = $request->file(‘image’)->storeAs(‘public/image’, $fileNameToStore);
        // // // ]);
       
            
        $response = Http::withToken($token)->post('https://shielded-headland-74924.herokuapp.com/api/siswa', [
            'nama_lengkap' => $request->tambah_namalengkap,
            'nisn' => $request->tambah_nisn,
            'nis' => $request->tambah_nis,
            'tempat_lahir' => $request->tambah_tempatlahir,
            'tanggal_lahir' => $request->tambah_tanggallahir,
            'jenis_kelamin ' => $request->tambah_jeniskelamin,
            'jurusan' => $request->tambah_jurusan,
            'id_tahun' => $request->tambah_tahunlulus,
            'foto_siswa' => $request->image
        ]);

        // dd($response->status());

        if($response->status() === 200){
            return redirect('/alumni');
        }else if($response->status() === 403){
            return redirect('/masuk');   
        }else{
            echo('messages : GAGAL');
            echo($response->status());
            return response()->json(json_decode($response));
        }
    }

    public function addAchievCategory(Request $request){
        $token = $request->bearer_token;
        $response = Http::withToken($token)->post('https://shielded-headland-74924.herokuapp.com/api/kategori-prestasi', [
            'kategori_prestasi' => $request->input_kategori,
            ]);
        // sisanya cek sendiri, http response code 404 -> not found, 413 not authorized
        if($response->status() === 200){
            return redirect('/prestasi');
        }else if($response->status() === 403){
            return redirect('/masuk');   
        }else{
            echo('messages : GAGAL');
            echo($response->status());
            return json_decode($response);
        }
    }
    public function addRankCategory(Request $request){
        $token = $request->bearer_token;
        $response = Http::withToken($token)->post('https://shielded-headland-74924.herokuapp.com/api/kategori-juara', [
            'kategori_juara' => $request->input_kategori,
            ]);

        // sisanya cek sendiri, http response code 404 -> not found, 413 not authorized
        if($response->status() === 200){
            return redirect('/prestasi');
        }else if($response->status() === 403){
            return redirect('/masuk');   
        }else{
            echo('messages : GAGAL');
            echo($response->status());
            return json_decode($response);
        }
    }
    public function addAchievement(Request $request){
        $token = $request->bearer_alttoken;
        $response = Http::withToken($token)->post('https://shielded-headland-74924.herokuapp.com/api/prestasi', [
            'nama_acara' => $request->tambah_namaacara,
            'id_kategori' => $request->tambah_kategoriacara,
            'penyelenggara' => $request->tambah_penyelenggara,
            'tanggal_acara' => $request->tambah_tanggalacara,
            'id_siswa' => $request->tambah_peserta,
            'id_juara' => $request->pilih_kategorijuara
            ]);
        // sisanya cek sendiri, http response code 404 -> not found, 413 not authorized
        if($response->status() === 200){
            return redirect('/prestasi');
        }else if($response->status() === 403){
            return redirect('/masuk');   
        }else{
            echo('messages : GAGAL');
            echo($response->status());
            return json_decode($response);
        }
    }

}
?>