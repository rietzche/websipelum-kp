<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Mahasiswa;
use App\Kandidat;
use App\Pemilih;
use \Crypt;

class AgendaController extends Controller
{   
    
    function agendaview($id){
        $cekJur = Agenda::find($id)->kat_jurusan;
        $cekFak = Agenda::find($id)->kat_fakultas;
        $cekMet = Agenda::find($id)->metodep;
        
        if ($cekFak=='Semua Mahasiswa') {
            if ($cekMet=='Pemilu Raya') {
                $tbMahasiswa = Mahasiswa::all();   
            }else{
                $tbMahasiswa = Mahasiswa::where('fakultas', $cekFak);
            }
        }
        
        elseif ($cekJur=='Semua Jurusan') {
            if ($cekMet=='Pemilu Raya') {
                $tbMahasiswa = Mahasiswa::where('fakultas', $cekFak)->get();
            }else{
                $tbMahasiswa = Mahasiswa::where('fakultas', $cekFak);
            }
        }

        else{
            if ($cekMet=='Pemilu Raya') {
                $tbMahasiswa = Mahasiswa::where('jurusan', $cekJur)->get();
            }else{
                $tbMahasiswa = Mahasiswa::where('fakultas', $cekFak);
            }
        }

        $tbKandidat = Kandidat::where('agenda_id', $id)->get();
        $tbPemilih = Pemilih::where('agenda_id', $id)->get();
        
        //$encrypted = \Crypt::encrypt('secret');
        //$decrypted = \Crypt::decrypt($encrypted);

        return view('agenda_view')
        ->with('IdAgenda', $id)
        ->with('tbMhs', $tbMahasiswa)
        ->with('tbP', $tbPemilih)
        ->with('tbK', $tbKandidat);
    }

    function show(){
    	$table = Agenda::all();  //where('id','=',3)->get();

    	return view('agenda_tabel')
    	->with("data", $table);
    }

    function insert(Request $req){
        $tb = new Agenda;
        $tb->admin_id = $req->admin_id;
        $tb->nm_agenda = $req->nm_agenda;
        $tb->metodep = $req->metodep;
        $tb->kat_fakultas   = $req->fakultas;
        $tb->kat_jurusan   = $req->jurusan;
        $tb->tgl_agenda= $req->tgl_agenda;
        $tb->save();

    	return redirect('/tabel agenda')
        ->with('pesan','Data berhasil disimpan');
    }

    function edit($id){
        $tb = Agenda::find($id);

        return view('agenda_edit')
        ->with('data', $tb);
    }

    function update(Request $req, $id) {
        $tb = Agenda::find($id);
        $tb->nm_agenda = $req->nm_agenda;
        $tb->kat_jurusan   = $req->jurusan;
        $tb->tgl_agenda= $req->tgl_agenda;
        $tb->save();

        return redirect('/tabel agenda')
        ->with('pesan', 'Data berhasil diupdate');
    }

    function delete($id) {
        Agenda::find($id)->delete();

        return redirect('/tabel agenda')
        ->with('pesan', 'Data berhasil dihapus');
    }
}
