<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\DaftarDataKelas;
use Illuminate\Support\Str;

class KelasDanUser extends Component
{
    public $tambahkelas, $edit_id;

    public $nama_kelas, $deskripsi, $angkatan='0', $harga_kelas='0', $trainer, $status_publish='yes';
    
    
    public function render()
    {
        return view('livewire.superadmin.kelas-dan-user',[
            'users' => User::all(),
            'daftarkelas' => DaftarDataKelas::all(),
            'user' => User::where('role', '!=' ,'user')->get(),
        ]);
    }

    public function resetform()
    {
        $this->edit_id = '';
        $this->nama_kelas = '';
        $this->deskripsi = '';
        $this->angkatan = '';
        $this->harga_kelas = '';
        $this->trainer = '';
        $this->status_publish = '';
    }

    public function tambahkelas()
    {
        $this->tambahkelas = '1';
    }

    public function closetambahkelas()
    {
        $this->tambahkelas = '';
        $this->resetform();
    }
    
    public function simpankelas()
    {
        $this->validate([
            'nama_kelas' => 'required',
            'deskripsi' => 'required',
            'angkatan' => 'required',
            'harga_kelas' => 'required',
            'trainer' => 'required',
            'status_publish' => 'required',

        ]);

        DaftarDataKelas::create([
            'nama_kelas' => $this->nama_kelas,
            'deskripsi' => $this->deskripsi,
            'angkatan' => $this->angkatan,
            'harga_kelas' => $this->harga_kelas,
            'trainer' => $this->trainer,
            'status_publish' => $this->status_publish,

            'kode_kelas' => Str::random('12'),
            'slug' => Str::slug($this->nama_kelas),
        ]);

        session()->flash('success', 'Kelas berhasil ditambahkan.');

    }

    public function editkelas($id)
    {
        $this->tambahkelas = '1';
        $data = DaftarDataKelas::find($id);
        
        $this->edit_id = $data->id;
        $this->nama_kelas = $data->nama_kelas;
        $this->deskripsi = $data->deskripsi;
        $this->angkatan = $data->angkatan;
        $this->harga_kelas = $data->harga_kelas;
        $this->trainer = $data->trainer;
        $this->status_publish = $data->status_publish;

    }

    public function updatekelas()
    {
        $this->validate([
            'nama_kelas' => 'required',
            'deskripsi' => 'required',
            'angkatan' => 'required',
            'harga_kelas' => 'required',
            'trainer' => 'required',
            'status_publish' => 'required',

        ]);

        DaftarDataKelas::where('id', $this->edit_id)->update([
            'nama_kelas' => $this->nama_kelas,
            'deskripsi' => $this->deskripsi,
            'angkatan' => $this->angkatan,
            'harga_kelas' => $this->harga_kelas,
            'trainer' => $this->trainer,
            'status_publish' => $this->status_publish,

            'slug' => Str::slug($this->nama_kelas),
        ]);

        session()->flash('success', 'Kelas berhasil diupdate.');

    }

    public function hapus($id)
    {
        DaftarDataKelas::where('id', $id)->delete();
        session()->flash('success', 'Kelas berhasil dihapus.');
    }
}
