<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DaftarDataKelas;
use App\Models\PendaftaranKelas;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\TugasDiserahkan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class KelasSaya extends Component
{
    use WithFileUploads;
    public $formpendaftaran, $bukti_pembayaran;
    public $kode_kelas;
    public $info, $uploud;

    public $id_kelas;

    public $info1;

    public $judul, $deskripsi, $link_document, $link_youtube, $status_publish;

    public $lihatmateri, $tambahmateri, $inputmateri;

    public $lihattugas, $formkumpultugas, $id_tugas, $judul_tugas, $trainer_id, $link_tugas, $nilai, $catatan, $status_dibaca ,$cektugas, $id_jawaban;

    public $lihatperingkat;

    public function render()
    {
         // info apakah sudah menyerahkan tugas (belum kebuat)
         $data = TugasDiserahkan::where('user_id', auth()->user()->id)->get();
         foreach($data as $dt)
         {
             $this->info1 = $dt->id_tugas;
         }

        return view('livewire.user.kelas-saya',[
            'daftarkelas' => DaftarDataKelas::all(),

            'formdaftar' => DaftarDataKelas::where('id', $this->kode_kelas)->get(),

            'pendaftarankelas1' => PendaftaranKelas::where([['user_id', auth()->user()->id],['status_pendaftaran', 'diterima']])->get(),

            //notifikasi
            'pendaftarankelas2' => PendaftaranKelas::where([['user_id', auth()->user()->id],['status_pendaftaran','!=', 'diterima']])->get(),

            'status_pendaftaran' => PendaftaranKelas::where([['id', $this->kode_kelas]])->get(),

            'materi' => Materi::where([['kelas_id', $this->id_kelas],['status_publish', 'yes']])->latest()->get(),

            'tugas' => Tugas::where([['kelas_id', $this->id_kelas],['status_publish', 'yes']])->latest()->get(),

            'peringkat' => PendaftaranKelas::where([['kelas_id', $this->id_kelas]])->orderBy('total_nilai', 'DESC')->distinct()->get(),

        ]);
    }

    public function mount()
    {

        if($this->info1 == '')
        {
            $this->info1 == '0';
        }
      
    }

    public function info($kode)
    {
        $this->info = '1';
        $this->kode_kelas = $kode;
        $this->lihatmateri = '1';

        $data = PendaftaranKelas::find($kode);
        $this->id_kelas = $data->kelas_id;
        
    }

    public function kembali()
    {
        $this->info = '';
        $this->kode_kelas = '';
        $this->uploud = '';
        $this->lihatmateri = '';
        $this->lihattugas = '';
        $this->lihatperingkat = '';
        $this->formkumpultugas = '';
    }

    public function uploud()
    {
        $this->uploud = '1';
    }

    public function closeuploud()
    {
        $this->uploud = '';
    }

    public function lihatmateri()
    {
        $this->lihatmateri = '1';
        $this->lihattugas = '';
        $this->lihatperingkat = '';
        $this->formkumpultugas = '';
    }

    public function lihattugas()
    {
        $this->lihatmateri = '';
        $this->lihattugas = '1';
        $this->lihatperingkat = '';
        $this->formkumpultugas = '';
    }

    public function serahkantugas($id)
    {
        $this->formkumpultugas = '1';
        $this->id_tugas = $id;
        $this->lihattugas = '';

        $data = Tugas::find($id);
        $this->judul_tugas = $data->judul;
        $this->trainer_id = $data->trainer_id;

        $this->cektugas = TugasDiserahkan::where([['user_id', auth()->user()->id], ['id_tugas', $id]])->count();

        if($this->cektugas !== 0)
        {
            $datatugas = TugasDiserahkan::where([['user_id', auth()->user()->id], ['id_tugas', $id]])->get();

            foreach ($datatugas as $dt)
            {
                $this->id_jawaban = $dt->id;
                $this->link_tugas = $dt->link_tugas;
                $this->status_dibaca = $dt->status_dibaca;
                $this->nilai = $dt->nilai;
                $this->catatan = $dt->catatan;
            }
            
        }

    }

    public function closeserahkantugas()
    {
        $this->formkumpultugas = '';
        $this->id_tugas = '';
        $this->link_tugas = '';
        $this->status_dibaca = '';
        $this->nilai = '';
        $this->catatan = '';
        $this->lihattugas = '1';
    }

    public function simpantugas()
    {

        $this->validate([
              
            'link_tugas' => 'required',
        
        ]);

        TugasDiserahkan::create([
            
            'judul' 	=> $this->judul_tugas,
            'id_tugas' => $this->id_tugas,
            'link_tugas'   => $this->link_tugas,
            
            'kelas_id' => $this->id_kelas,
            'nama_user' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'trainer_id' => $this->trainer_id,
            'nilai' => 0,
            'status_dibaca' => 'belum',
        ]);

        $this->closeserahkantugas();
        $this->lihattugas = '1';
        session()->flash('success', 'Tugas berhasil disimpan.');
    }

    public function updatetugas()
    {

        $this->validate([
              
            'link_tugas' => 'required',
        
        ]);

        TugasDiserahkan::where('id', $this->id_jawaban)->update([
           
            'link_tugas'   => $this->link_tugas,
    
        ]);
        
        $this->closeserahkantugas();
        
        session()->flash('success', 'Tugas berhasil diupdate.');
    }

    public function lihatperingkat()
    {
        $this->lihatperingkat = '1';
        $this->lihattugas = '';
        $this->lihatmateri = '';
        $this->formkumpultugas = '';
    }
    
}
