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

class KelasTrainer extends Component
{
    use WithFileUploads;
    public $formpendaftaran, $bukti_pembayaran;
    public $kode_kelas;
    public $info, $uploud;

    public $judul, $deskripsi, $link_document, $link_youtube, $status_publish;

    public $lihatmateri, $tambahmateri, $inputmateri;

    public $tugasdiserahkan, $data_tugasdiserahkan, $nama_user, $nilai, $catatan;

    public $lihattugas, $tambahtugas;

    public $lihatperingkat;

    public $edit_id, $edit_id_tugas, $edit_nilai, $id_tugas, $user_id;

    public function render()
    
    {
        return view('livewire.trainer.kelas-trainer',[

            'kelastrainer' => DaftarDataKelas::where('trainer', auth()->user()->id)->get(),

            'status_kelas' => DaftarDataKelas::where([['id', $this->kode_kelas]])->get(),

            'materi' => Materi::where([['trainer_id', auth()->user()->id],['kelas_id', $this->kode_kelas]])->latest()->get(),

            'tugas' => Tugas::where([['trainer_id', auth()->user()->id],['kelas_id', $this->kode_kelas]])->latest()->get(),

            'tugas_diserahkan' => TugasDiserahkan::where('id_tugas', $this->id_tugas)->get(),

            'peringkat' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas]])->orderBy('total_nilai', 'DESC')->distinct()->get(),
        ]);
    }

    public function mount()
    {
        $this->status_publish = 'yes';
    }

    public function info($kode)
    {
        $this->info = '1';
        $this->kode_kelas = $kode;
        $this->lihatmateri = '1';
    }

    public function kembali()
    {
        $this->info = '';
        $this->kode_kelas = '';
        $this->uploud = '';
        $this->lihatmateri = '';
        $this->lihattugas = '';
        $this->tugasdiserahkan = '';
        $this->tambahtugas = '';
        $this->tambahmateri= '';
        $this->edit_id_tugas = '';
        $this->resetform();
        $this->lihatperingkat = '';

    }

   
    public function lihatmateri()
    {
        $this->lihatmateri = '1';
        $this->lihattugas = '';
        $this->tugasdiserahkan = '';
        $this->lihatperingkat = '';
        $this->tugasdiserahkan = '';
        $this->tambahmateri='';
        $this->tambahtugas = '';
    }

    public function closelihatmateri()
    {
        $this->lihatmateri = '';
    }

    public function lihattugas()
    {
        $this->lihatmateri = '';
        $this->lihattugas = '1';
        $this->lihatperingkat = '';
        $this->tugasdiserahkan = '';
        $this->tambahmateri='';
        $this->tambahtugas = '';
    }

    public function tugasdiserahkan($id)
    {
        $this->tugasdiserahkan = '1';
        $this->lihatmateri = '';
        $this->lihattugas = '';

        $data = Tugas::find($id);
        $this->judul = $data->judul;
        $this->id_tugas=$data->id;

        $this->data_tugasdiserahkan = TugasDiserahkan::where('id_tugas', $data->id)->get();

    }

    public function close_tugasdiserahkan()
    {
        $this->tugasdiserahkan = '';
        $this->lihatmateri = '';
        $this->lihattugas = '1';

        $this->edit_nilai = '';
        $this->nama_user = '';
        $this->nilai = '';
        $this->catatan = '';
        $this->user_id = '';

    }
    public function edit_nilai($id)
    {
        $this->edit_nilai = '1';
        $this->edit_id = $id;

        $data = tugasdiserahkan::find($id);
        $this->nama_user = $data->nama_user;
        $this->nilai = $data->nilai;
        $this->catatan = $data->catatan;
        $this->user_id = $data->user_id;

        TugasDiserahkan::where('id', $id)->update([
            'status_dibaca' => 'sudah',
        ]);

    }

    public function closeedit_nilai()
    {
        $this->edit_nilai = '';
        $this->nama_user = '';
        $this->lihattugas = '';
    }

    public function simpan_nilai()
    {
        $this->validate([
              
            'nilai' => 'required',
            'catatan' => 'required',
        
        ]);
        
        TugasDiserahkan::where('id', $this->edit_id)->update([
            'status_dibaca' => 'sudah',
            'nilai' => $this->nilai,
            'catatan' => $this->catatan,
        ]);

        $data = TugasDiserahkan::where([['kelas_id', $this->kode_kelas],['user_id', $this->user_id]])->sum('nilai');

        $jumlah = $data;
        
        PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['user_id', $this->user_id]])->update([
            'total_nilai' => $jumlah,
        ]);

        $this->lihattugas = '';
        $this->edit_nilai = '1';
        $this->nama_user = '';
        $this->lihattugas = '';

        session()->flash('success', 'Berhasil Dinilai.');
    }

    public function hapustugasdiserahkan($id)
    {
        TugasDiserahkan::where('id', $id)->delete();
        
        session()->flash('success', ' berhasil dihapus.');
    }

    public function tambahmateri()
    {
        $this->tambahmateri='1';
        $this->tambahtugas = '';
    }

    public function closetambahmateri()
    {
        $this->lihatmateri = '1';
        $this->tambahmateri='';
        $this->resetform();
    }

    public function resetform()
    {
        $this->judul = '';
        $this->deskripsi = '';
        $this->link_document = '';
        $this->link_youtube = '';

        $this->edit_id = '';
        
    }

    public function simpanmateri()
    {
        
        $this->validate([
              
            'judul' => 'required',
            'deskripsi' => 'required',
            'link_document' => 'required|url',
            'status_publish' => 'required',
        
        ]);

        Materi::create([
            
            'kode_materi' => Str::uuid(),
            'judul' 	=> $this->judul,
            'deskripsi'  => $this->deskripsi,
            'link_document'   => $this->link_document,
            'link_youtube' => $this->link_youtube,
            'status_publish' => $this->status_publish,

            'kelas_id' => $this->kode_kelas,
            'trainer_id' => auth()->user()->id,
        ]);
        $this->tambahmateri='';
        $this->resetform();
        session()->flash('success', 'Materi berhasil disimpan.');
    }

    public function edit($id)
    {
        $this->lihatmateri = '';
        
        $this->tambahmateri='1';
        $this->edit_id = $id;

        $data = Materi::find($id);

        $this->judul = $data->judul;
        $this->deskripsi = $data->deskripsi;
        $this->link_document = $data->link_document;
        $this->link_youtube = $data->link_youtube;
        $this->status_publish=$data->status_publish;
    }

    public function update()
    {
        
        $this->validate([
              
            'judul' => 'required',
            'deskripsi' => 'required',
            'link_document' => 'required|url',
            'status_publish' => 'required',
        
        ]);

        Materi::where('id', $this->edit_id)->update([
            
            'judul' 	=> $this->judul,
            'deskripsi'  => $this->deskripsi,
            'link_document'   => $this->link_document,
            'link_youtube' => $this->link_youtube,
            'status_publish' => $this->status_publish,

        ]);
        $this->lihatmateri = '1';
        $this->tambahmateri='';
        $this->resetform();
        session()->flash('success', 'Materi berhasil diupdate.');
    }

    public function hapus($id)
    {
        Materi::where('id', $id)->delete();
        
        session()->flash('success', 'Materi berhasil dihapus.');
    }

    public function tambahtugas()
    {
        $this->tambahtugas = '1';
        $this->tambahmateri= '';
    }

    public function closetambahtugas()
    {
        $this->lihattugas = '1';
        $this->tambahtugas = '';
        $this->tambahmateri= '';
        $this->edit_id_tugas = '';
        $this->resetform();
    }

    public function simpantugas()
    {

        $this->validate([
              
            'judul' => 'required',
            
            'deskripsi' => 'required',
            'status_publish' => 'required',
        
        ]);

        Tugas::create([
            
            'kode_materi' => Str::uuid(),
            'judul' 	=> $this->judul,
            'deskripsi'  => $this->deskripsi,
            'link_document'   => $this->link_document,
            'link_youtube' => $this->link_youtube,
            'status_publish' => $this->status_publish,

            'kelas_id' => $this->kode_kelas,
            'trainer_id' => auth()->user()->id,
        ]);
        $this->tambahtugas = '';
        $this->resetform();
        session()->flash('success', 'Tugas berhasil disimpan.');
    }

    public function edittugas($id)
    {
        $this->lihattugas = '';
        $this->tambahtugas='1';
        $this->edit_id_tugas = $id;

        $data = Tugas::find($id);

        $this->judul = $data->judul;
        $this->deskripsi = $data->deskripsi;
        $this->link_document = $data->link_document;
        $this->link_youtube = $data->link_youtube;
        $this->status_publish=$data->status_publish;
    }

    public function updatetugas()
    {
       
        $this->validate([
              
            'judul' => 'required',
            'deskripsi' => 'required',

            'status_publish' => 'required',
        
        ]);

        Tugas::where('id', $this->edit_id_tugas)->update([
            
            'judul' 	=> $this->judul,
            'deskripsi'  => $this->deskripsi,
            'link_document'   => $this->link_document,
            'link_youtube' => $this->link_youtube,
            'status_publish' => $this->status_publish,

        ]);
        $this->lihattugas = '1';
        $this->tambahtugas='';
        $this->edit_id_tugas = '';
        $this->resetform();
        session()->flash('success', 'Tugas berhasil diupdate.');
    }

    public function hapustugas($id)
    {
        Tugas::where('id', $id)->delete();
        
        session()->flash('success', 'Tugas berhasil dihapus.');
    }

    public function lihatperingkat()
    {
        $this->lihatperingkat = '1';
        $this->lihattugas = '';
        $this->lihatmateri = '';
        $this->tugasdiserahkan = '';
        $this->tambahmateri='';
        $this->tambahtugas = '';
    }
}
