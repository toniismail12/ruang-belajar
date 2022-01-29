<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class DataUser extends Component
{
    public $tambahuser, $edit_id;
    public $name, $email, $password, $role, $tempat_lahir, $tanggal_lahir, $pendidikan, $hobi, $jenis_kelamin, $alamat, $oldemail, $oldpassword;

    public function render()
    {
        return view('livewire.superadmin.data-user',[
            'users' => User::where('role', '!=', 'superadmin')->get(),
        ]);
    }

    public function resetform()
    {
        $this->edit_id = '';

        $this->name ='';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->tempat_lahir = '';
        $this->tanggal_lahir = '';
        $this->hobi = '';
        $this->jenis_kelamin = '';
        $this->pendidikan = '';
        $this->alamat = '';
    }

    public function tambahuser()
    {
        $this->tambahuser = '1';
    }

    public function closetambahuser()
    {
        $this->resetform();
        $this->tambahuser = '';
    }

    public function simpanuser()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $pass=Hash::make($this->password);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $pass,
            'role' => $this->role,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'pendidikan' => $this->pendidikan,
            'jenis_kelamin' => $this->jenis_kelamin,
            'hobi' => $this->hobi,
            'alamat' => $this->alamat,

            'uuid' => Str::uuid(),
        ]);

        $this->tambahuser = '';
        $this->resetform();

        session()->flash('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $this->edit_id = $id;
        $this->tambahuser = '1';
        $data = User::find($id);

        $this->name = $data->name;
        $this->email = $data->email;
        $this->password = $data->password;
        $this->role = $data->role;
        $this->tempat_lahir = $data->tempat_lahir;
        $this->tanggal_lahir = $data->tanggal_lahir;
        $this->hobi = $data->hobi;
        $this->jenis_kelamin = $data->jenis_kelamin;
        $this->pendidikan = $data->pendidikan;
        $this->alamat = $data->alamat;

        $this->oldemail = $data->email;
        $this->oldpassword = $data->password;

    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'role' => 'required',
        ]);

        if($this->email != $this->oldemail)
        {
            $this->validate([
                'email' => 'required|unique:users|email',
            ]);

            User::where('id', $this->edit_id)->update([
                  
                'email' => $this->email,
            ]);
        }

        if($this->password != $this->oldpassword)
        {
            $this->validate([
                'password' => 'required|min:3',
            ]);

            $pass=Hash::make($this->password);

            User::where('id', $this->edit_id)->update([
                'password' => $pass,
            ]);
        }

        User::where('id', $this->edit_id)->update([
            'name' => $this->name,
            'role' => $this->role,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'pendidikan' => $this->pendidikan,
            'jenis_kelamin' => $this->jenis_kelamin,
            'hobi' => $this->hobi,
            'alamat' => $this->alamat,

        ]);

        $this->tambahuser = '';
        $this->resetform();

        session()->flash('success', 'User berhasil update.');
    }

    public function hapus($id)
    {
        User::where('id', $id)->delete();
        session()->flash('success2', 'berhasil dihapus.');
    }

}
