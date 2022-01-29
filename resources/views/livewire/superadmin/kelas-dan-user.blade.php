
<div id="main-content">

    <div class="container">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2>Kelas Dan Trainer</h2>
                   
                </div>            
    
            </div>
        </div>

        @if (session()->has('success'))

        <div class="alert alert-danger alert-dismissible text-white" role="alert" style="background-color: purple">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-info-circle"></i> {{ session('success') }}
        </div>
    
        @endif

         {{-- Tambah kelas --}}
         @if($tambahkelas == '1')
         <div class="row">
            
             <div class="col-lg-12 col-12"> 
                 <div class="card top_counter shadow">
                     <button class="btn btn-sm btn-secondary" wire:click.prevent="closetambahkelas()"><i class="fa fa-times"></i>  </button>
                     <div class="body">
                         <h5> Tambah Kelas </h5>
 
                         <hr>
                         <label> Kelas</label>
                         @error('nama_kelas') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <input type="text" wire:model="nama_kelas" class="form-control shadow-sm mb-3"> 
                         
                       
                         <label> Deskripsi</label>
                         @error('deskripsi') 
                         <span class="text-danger error">{{ $message }}</span><br>
                         @enderror
                         <textarea cols="30" rows="3" wire:model="deskripsi" class="form-control shadow-sm mb-3"></textarea>
                         
 
                         <label> Angkatan</label>
                         @error('angkatan') 
                         <span class="text-danger error">{{ $message }}</span><br>
                         @enderror
                         <input type="number" wire:model="angkatan" class="form-control shadow-sm mb-3"> 
                         
                       
 
                         <label > Harga</label>
                         @error('harga_kelas') 
                         <span class="text-danger error">{{ $message }}</span><br>
                         @enderror
                         <input type="number" wire:model="harga_kelas" class="form-control shadow-sm mb-3"> 
                         
 
                         <label > Trainer</label>
                         @error('trainer') 
                         <span class="text-danger error">{{ $message }}</span><br>
                         @enderror
                         <select class="form-control mb-3" wire:model="trainer">
                            <option value="">Pilih</option>
                             @foreach ($user as $item)
                             <option value="{{ $item->id }}">{{ $item->name }}</option>
                             @endforeach
                        
                         </select>

                         <label for="status_publish"> Status Publish</label>
                         @error('status_publish') 
                         <span class="text-danger error">{{ $message }}</span><br>
                         @enderror
                         <select class="form-control mb-3" wire:model="status_publish">
                             <option value="yes" selected>YES</option>
                             <option value="no">NO</option>
                         </select>
                       
                       
                         <hr>
 
                         @if($edit_id)
                         <button class="btn btn-sm btn-success mt-3 " wire:click.prevent="updatekelas()"><i class="fa fa-check"></i> Update</button>
                         
                         @else 
                         <button class="btn btn-sm btn-primary mt-3 " wire:click.prevent="simpankelas()"><i class="fa fa-check"></i> Simpan</button>
                         @endif
                         
                     </div>
                 </div>
             </div>
         </div>
         @endif

        <div class="row clearfix">
                
            <div class="card shadow">
              
                <div class="col-lg-12 mt-3">
                    <button type="button" class="btn btn-sm mr-2 text-white" wire:click.prevent="tambahkelas()" style="background-color: purple"><i class="fa fa-plus"> Tambah</i></button>
                </div>
                
                <div class="body">
                
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-slack"></i></th>
                                    <th>Action</th>
                                    <th>Kelas</th>                                    
                                    <th>Angkatan</th> 
                                    <th>Trainer</th>
                                    <th>Harga</th>
                                    <th>Status Publish</th>                                   
                                    
                                </tr>
                            </thead>
                                <tbody>
                                @foreach ($daftarkelas as $kelas)
                                    
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>                                            
                                        <button type="button" class="btn btn-info mr-2" wire:click.prevent="editkelas({{ $kelas->id }})"><i class="fa fa-edit"></i></button>
                                        
                                        <button type="button" class="btn btn-danger" wire:click.prevent="hapus({{ $kelas->id }})"><i class="fa fa-trash-o" ></i></button>
                                    </td>
                                    <td>
                                        {{ $kelas->nama_kelas }}
                                    </td>
                                    <td>
                                        {{ $kelas->angkatan }}
                                    </td>
                                    <td> 
                                        @foreach($users as $user)
                                        @if($user->id == $kelas->trainer)
                                        {{ $user->name }}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $kelas->harga_kelas }}</td>                                   
                                    <td>{{ $kelas->status_publish }}</td>
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

