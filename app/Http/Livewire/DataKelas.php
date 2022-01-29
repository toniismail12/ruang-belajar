<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DaftarDataKelas;
use App\Models\PendaftaranKelas;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DataKelas extends Component
{
    public $formpendaftaran;
    public $kode_kelas;
    public $popform;

    public function render()
    {
        return view('livewire.data-kelas.data-kelas',[

            'daftarkelas' => DaftarDataKelas::where('status_publish', 'yes')->get(),

            'formdaftar' => DaftarDataKelas::where('id', $this->kode_kelas)->get(),

            'pendaftarankelas1' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['user_id', auth()->user()->id]])->get(),

            'pendaftarankelas' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['user_id', auth()->user()->id]])->count(),
        ]);
    }

    public function formpendaftaran($kode)
    {
        $this->popform = '1';
        $this->kode_kelas = $kode;
    }

    public function closeform()
    {
        $this->popform = '';
        $this->kode_kelas = '';
    }

    public function daftarkelas($id)
    {
        PendaftaranKelas::create([
            	
            'kode_daftar' 	        => Str::random('12'),
            'user_id' 		        => Auth()->User()->id,
            'nama' 	                => Auth()->User()->name,
            'kelas_id' 			    => $id,
            'status_pendaftaran' 	=> 'belum-diverifikasi',
            'status_pembayaran'     => 'belum-dibayar',
            'bukti_pembayaran'      => 'uploud',
        ]);


        session()->flash('success', 'Pendaftaran Berhasil.');
    }


}
