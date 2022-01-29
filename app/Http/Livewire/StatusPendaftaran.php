<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DaftarDataKelas;
use App\Models\PendaftaranKelas;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class StatusPendaftaran extends Component
{
    use WithFileUploads;
    public $formpendaftaran, $bukti_pembayaran;
    public $kode_kelas;
    public $info, $uploud;

    public function render()
    {
        return view('livewire.user.status-pendaftaran',[
            'daftarkelas' => DaftarDataKelas::all(),

            'formdaftar' => DaftarDataKelas::where('id', $this->kode_kelas)->get(),

            'pendaftarankelas1' => PendaftaranKelas::where([['user_id', auth()->user()->id]])->get(),

            'status_pendaftaran' => PendaftaranKelas::where([['id', $this->kode_kelas],['user_id', auth()->user()->id]])->get(),

            'pendaftarankelas' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['user_id', auth()->user()->id]])->count(),
        ]);
    }

    public function info($kode)
    {
        $this->info = '1';
        $this->kode_kelas = $kode;
    }

    public function kembali()
    {
        $this->info = '';
        $this->kode_kelas = '';
        $this->uploud = '';
    }

    public function uploud()
    {
        $this->uploud = '1';
    }

    public function closeuploud()
    {
        $this->uploud = '';
    }

    public function kirimbuktibayar()
    {
        $this->validate([
              
            'bukti_pembayaran' => 'required|file|mimes:pdf,jpg,png|max:500',
        
        ]);

            $file = $this->bukti_pembayaran->store('file-bukti-pembayaran');


        PendaftaranKelas::where('id', $this->kode_kelas)->update([
            	
            'status_pendaftaran' 	=> 'dalam-peninjauan',
            'status_pembayaran'     => 'sedang-diverifikasi',
            'bukti_pembayaran'      => $file,
        ]);

        $this->uploud = '';
        session()->flash('success', 'Bukti Bayar Berhasil Dikirim.');
    }
}
