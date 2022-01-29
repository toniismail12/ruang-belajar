
<div id="main-content">

    <div class="container">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2>Data User</h2>
                   
                </div>            
    
            </div>
        </div>

        @if (session()->has('success'))

        <div class="alert alert-danger alert-dismissible text-white" role="alert" style="background-color: purple">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-info-circle"></i> {{ session('success') }}
        </div>
        @endif

        @if (session()->has('success2'))

        <div class="alert alert-danger alert-dismissible text-white" role="alert" style="background-color: red">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-info-circle"></i> {{ session('success2') }}
        </div>
        @endif

         {{-- Tambah user --}}
         @if($tambahuser == '1')
         <div class="row">
            
             <div class="col-lg-12 col-12"> 
                 <div class="card top_counter shadow">
                     <button class="btn btn-sm btn-secondary" wire:click.prevent="closetambahuser()"><i class="fa fa-times"></i>  </button>
                     <div class="body">
                         <h5> Tambah User </h5>
 
                         <hr>
                         <label> Nama</label>
                         @error('name') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <input type="text" wire:model="name" class="form-control shadow-sm mb-3"> 
                         
 
                         <label> Email</label>
                         @error('email') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <input type="email" wire:model="email" class="form-control shadow-sm mb-3"> 
                       
                         <label> Password</label>
                         @error('password') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <input type="text" wire:model="password" class="form-control shadow-sm mb-3">

                         <label> Role</label>
                         @error('role') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <select class="form-control shadow-sm mb-3" wire:model="role">
                             <option value="">Pilih</option>
                             <option value="superadmin">superadmin</option>
                             <option value="anggota">anggota</option>
                             <option value="user">user</option>
                         </select>
                         
                         <label> Tempat Lahir</label>
                         @error('tempat_lahir') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <input type="text" wire:model="tempat_lahir" class="form-control shadow-sm mb-3">
                         
                         <label> Tanggal lahir</label>
                         @error('tanggal_lahir') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <input type="date" wire:model="tanggal_lahir" class="form-control shadow-sm mb-3">
                         
                         <label> Pendidikan Terakhir</label>
                         @error('pendidikan') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <input type="text" wire:model="pendidikan" class="form-control shadow-sm mb-3"> 

                         <label> Hobi</label>
                         @error('hobi') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <input type="text" wire:model="hobi" class="form-control shadow-sm mb-3"> 
                         
                         <label> Jenis Kelamin</label>
                         @error('jenis_kelamin') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <select class="form-control shadow-sm mb-3" wire:model="jenis_kelamin">
                             <option value="">Pilih</option>
                             <option value="L">L</option>
                             <option value="P">P</option>
                         </select>

                         <label> Alamat</label>
                         @error('alamat') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <textarea class="form-control" rows="3" wire:model="alamat"></textarea> 
                         <hr>
 
                         @if($edit_id)
                         <button class="btn btn-sm btn-success mt-3" wire:click.prevent="update()"><i class="fa fa-check"></i> Update</button>
                         
                         @else 
                         <button class="btn btn-sm btn-primary mt-3" wire:click.prevent="simpanuser()"><i class="fa fa-check"></i> Simpan</button>
                         @endif
                         
                     </div>
                 </div>
             </div>
         </div>
         @endif

        <div class="row clearfix">
                
            <div class="card shadow">
               
                <div class="col-lg-12 mt-3">
                    <button type="button" class="btn btn-sm mr-2 text-white" wire:click.prevent="tambahuser()" style="background-color: purple"><i class="fa fa-plus"> Tambah</i></button>
                </div>
                
                <div class="body">
                
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-slack"></i></th>
                                    <th>Action</th>
                                    <th>Name</th>                                    
                                    <th>Email</th> 
                                    <th>TTL</th>                                   
                                    <th>Alamat</th>
                                    <th>Jenis kelamin</th>
                                    <th>Role</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>                                            
                                        <button type="button" class="btn btn-info mr-2" wire:click.prevent="edit({{ $user->id }})"><i class="fa fa-edit"></i></button>
                                        
                                        <button type="button" class="btn btn-danger" wire:click.prevent="hapus({{ $user->id }})"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>{{ $user->tempat_lahir }}, {{ $user->tanggal_lahir }}</td>                                   
                                    <td>
                                        {{ $user->alamat }}
                                    </td>
                                    <td>{{ $user->jenis_kelamin }} </td>
                                    <td>{{ $user->role }} </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
