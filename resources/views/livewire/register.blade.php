<div id="main-content">

    <div class="container">
       

        @if (session()->has('success'))

        <div class="alert alert-danger alert-dismissible text-white" role="alert" style="background-color: purple" wire:click.prevent="login()">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" wire:click.prevent="login()"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-info-circle"></i> {{ session('success') }}
        </div>
        @endif


        @if($tambahuser == '')
        <div class="row">
                    
            <div class="col-lg-12 col-12"> 
                <div class="card top_counter shadow">
                    
                    <div class="body">
                        <h5> Register </h5>

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

                        <button class="btn btn-sm btn-primary mt-3" wire:click.prevent="simpanuser()"><i class="fa fa-check"></i> Register</button>
                        
                        <a href="/" class="btn btn-sm btn-secondary mt-3"> Kembali</a>
                        
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>