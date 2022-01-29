<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class Register extends Component
{
    public $tambahuser, $edit_id;
    public $name, $email, $password, $role, $tempat_lahir, $tanggal_lahir, $pendidikan, $hobi, $jenis_kelamin, $alamat, $oldemail, $oldpassword;

    public function render()
    {
        return view('livewire.register');
    }

    public function resetform()
    {
        $this->edit_id = '';

        $this->name ='';
        $this->email = '';
        $this->password = '';

        $this->tempat_lahir = '';
        $this->tanggal_lahir = '';
        $this->hobi = '';
        $this->jenis_kelamin = '';
        $this->pendidikan = '';
        $this->alamat = '';
    }

    public function simpanuser()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required',
          
        ]);

        $pass=Hash::make($this->password);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $pass,
            'role' => 'user',
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'pendidikan' => $this->pendidikan,
            'jenis_kelamin' => $this->jenis_kelamin,
            'hobi' => $this->hobi,
            'alamat' => $this->alamat,

            'uuid' => Str::uuid(),
        ]);
        $this->tambahuser = '1';
        $this->resetform();

        session()->flash('success', 'Register Berhasil silahkan Login untuk Daftar Kelas Belajar .');
    }

    public function login()
    {
        return redirect('/login');
    }

}
