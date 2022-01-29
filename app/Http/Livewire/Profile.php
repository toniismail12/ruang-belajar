<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $tambahuser, $edit_id;
    public $name, $email, $password, $role, $tempat_lahir, $tanggal_lahir, $pendidikan, $hobi, $jenis_kelamin, $alamat, $oldemail, $oldpassword;


    public function render()
    {

        return view('livewire.profile',[
            'users' => User::where('id', auth()->user()->id)->get(),
        ]);
    }

    public function mount()
    {
        $users1 = User::where('id', auth()->user()->id)->get();
        foreach($users1 as $data)
        {
            $this->name = $data->name;
            $this->email = $data->email;
            $this->password = $data->password;
            $this->tempat_lahir = $data->tempat_lahir;
            $this->tanggal_lahir = $data->tanggal_lahir;
            $this->hobi = $data->hobi;
            $this->jenis_kelamin = $data->jenis_kelamin;
            $this->pendidikan = $data->pendidikan;
            $this->alamat = $data->alamat;

            $this->oldemail = $data->email;
            $this->oldpassword = $data->password;
        }
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        if($this->email != $this->oldemail)
        {
            $this->validate([
                'email' => 'required|unique:users|email',
            ]);

            User::where('id', auth()->user()->id)->update([
                  
                'email' => $this->email,
            ]);
        }

        if($this->password != $this->oldpassword)
        {
            $this->validate([
                'password' => 'required|min:3',
            ]);

            $pass=Hash::make($this->password);

            User::where('id', auth()->user()->id)->update([
                'password' => $pass,
            ]);
        }

        User::where('id', auth()->user()->id)->update([
            'name' => $this->name,

            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'pendidikan' => $this->pendidikan,
            'jenis_kelamin' => $this->jenis_kelamin,
            'hobi' => $this->hobi,
            'alamat' => $this->alamat,

        ]);

        session()->flash('success', 'berhasil update.');
    }
}
