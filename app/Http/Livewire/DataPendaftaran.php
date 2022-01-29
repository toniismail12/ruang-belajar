<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DaftarDataKelas;
use App\Models\PendaftaranKelas;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class DataPendaftaran extends Component
{
    use WithFileUploads;
    public $formpendaftaran, $bukti_pembayaran;
    public $mark = [];
    public $kode_kelas;
    public $info, $uploud;

    public $popdata_pendaftar, $popdata_bermasalah, $popdata_diterima;

    public function render()
    {
        return view('livewire.superadmin.data-pendaftaran',[
            'daftarkelas' => DaftarDataKelas::all(),

            'formdaftar' => DaftarDataKelas::where('id', $this->kode_kelas)->get(),

            'info_pendaftaran' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas]])->select('id','kode_daftar', 'user_id', 'kelas_id')->limit(1)->get(),

            // jumlah data pendaftar baru
            'jumlahpendaftaran' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['status_pendaftaran', '!=', 'diterima']])->where([['kelas_id', $this->kode_kelas],['status_pendaftaran', '!=', 'bermasalah']])->count(),

            // jumlah pendaftar yang bermasalah
            'jumlahbermasalah' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['status_pendaftaran', 'bermasalah']])->count(),

            //jumlah data pendaftar diterima
            'jumlahditerima' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['status_pendaftaran', 'diterima']])->where([['kelas_id', $this->kode_kelas],['status_pendaftaran', '!=', 'bermasalah']])->count(),

            // melihat data pendaftar baru
            'data_pendaftar' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['status_pendaftaran', '!=', 'diterima']])->where([['kelas_id', $this->kode_kelas],['status_pendaftaran', '!=', 'bermasalah']])->get(),

            // melihat data pendaftar diterima
            'data_pendaftar3' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['status_pendaftaran', 'diterima']])->get(),

            // melihat data pendaftar bermasalah
            'data_pendaftar2' => PendaftaranKelas::where([['kelas_id', $this->kode_kelas],['status_pendaftaran', 'bermasalah']])->get(),
        ]);
    }

    public function mount()
    {
        $this->mark = [0];
    }

    public function info($kode)
    {
        $this->info = '1';
        $this->kode_kelas = $kode;
        $this->popdata_pendaftar = '1';
    }

    public function kembali()
    {
        $this->info = '';
        $this->kode_kelas = '';
        $this->uploud = '';

        $this->popdata_pendaftar = '';
        $this->popdata_diterima = '';
        $this->popdata_bermasalah = '';
       
       
    
    }

    public function popdata_pendaftar()
    {
        $this->popdata_pendaftar = '1';
        $this->popdata_diterima = '';
        $this->popdata_bermasalah = '';
    }

    public function popdata_diterima()
    {
        $this->popdata_diterima = '1';
        $this->popdata_pendaftar = '';
        $this->popdata_bermasalah = '';
    }

    public function popdata_bermasalah()
    {
        $this->popdata_bermasalah = '1';
        $this->popdata_diterima = '';
        $this->popdata_pendaftar = '';
    }

    public function closepopdata_bermasalah()
    {
        $this->popdata_bermasalah = '';
    }

    public function closepopdata_pendaftar()
    {
        $this->popdata_pendaftar = '';
    }

    public function closepopdata_diterima()
    {
        $this->popdata_diterima = '';
    }

    public function uploud()
    {
        $this->uploud = '1';
    }

    public function closeuploud()
    {
        $this->uploud = '';
    }

    public function terima()
    {
        PendaftaranKelas::whereIn('id', $this->mark)->update([
            	
            'status_pendaftaran' 	=> 'diterima',
            'status_pembayaran'     => 'lunas',
        ]);

        $this->mark = [0];
        session()->flash('success', 'Pendaftaran Diterima.');
    }

    public function bermasalah()
    {
        PendaftaranKelas::whereIn('id', $this->mark)->update([
            	
            'status_pendaftaran' 	=> 'bermasalah',
            'status_pembayaran'     => 'cek bukti bayar',
        ]);

        $this->mark = [0];
        session()->flash('success', 'Pendaftaran Bermasalah.');
    }

    public function hapus($id)
    {
        PendaftaranKelas::where('id', $id)->delete();
        session()->flash('success', 'Berhasil Dihapus.');
    }
} 
