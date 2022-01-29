
<div id="main-content">

    <div class="container">


        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12 text-dark">                        
                    <h2>Kelas Saya</h2>
                   
                </div>            

            </div>
        </div>


        {{-- Kelas --}}
        @if($info == '')
        <div class="row clearfix">
            @foreach ($kelastrainer as $kelas)
            
            <div class="col-lg-12 col-12">
                <a href="#" wire:click.prevent="info({{ $kelas->id }})" class="text-dark">    
                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="icon text-success"><i class="fa fa-book"></i> </div>
                        
                            <div class="text"><b>{{ $kelas->nama_kelas }},</b></div>
                            
                            <p class="text">{{ $kelas->deskripsi }}</p>
                    </div>
                </div> </a> 
            </div>
            
            @endforeach
            
        </div>
        @endif
        {{-- end kelas --}}


        {{-- info kelas --}}
        <div class="row">
            @foreach ($status_kelas as $status)

            <div class="col-lg-12 col-12 mb-3"> 
                <button class="btn btn-sm btn-secondary" wire:click.prevent="kembali()"><i class="fa fa-arrow-circle-o-left"></i> Back </button>
            </div>

            {{-- <div class="col-lg-12 col-12"> 

                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="text"><i class="fa fa-user text-success"></i> <b>Data Siswa </b> </div>
                        <hr>
                        <a href="#">
                        <div class="text"><i class="fa fa-link text-info"></i> <b>Join Group Chat</b> </div>
                        </a>
                    </div>
                </div>
            </div> --}}

            <div class="col-lg-4 col-6 text-center">
                <a href="#" wire:click.prevent="lihatmateri()">
                <div class="card top_counter shadow">
                    <div class="body">
                        
                        <div class="text"> <b>Materi </b></div>
                       
                    </div>
                </div> 
                </a>
                
            </div>

            <div class="col-lg-4 col-6 text-center">
                <a href="#" wire:click.prevent="lihattugas()">    
                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="text"><b>Tugas</b></div>
                    </div>
                </div> 
                </a>
            </div>

            <div class="col-lg-4 col-12 text-center">
                <a href="#" wire:click.prevent="lihatperingkat()">
               <div class="card top_counter shadow">
                   <div class="body">
                       
                       <div class="text"> <b>Total Nilai</b></div>
                      
                   </div>
               </div> 
                </a>
           </div>
            
            @endforeach
            
        </div>
        {{-- end info kelas --}}

        @if (session()->has('success'))

        <div class="alert alert-danger alert-dismissible text-white" role="alert" style="background-color: purple">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-info-circle"></i> {{ session('success') }}
        </div>
    
        @endif

        {{-- Tambah materi form --}}
        @if($tambahmateri == '1')
        <div class="row">
           
            <div class="col-lg-12 col-12"> 
                <div class="card top_counter shadow">
                    <button class="btn btn-sm btn-secondary" wire:click.prevent="closetambahmateri()"><i class="fa fa-times"></i>  </button>
                    <div class="body">
                        <h5> Materi</h5>

                        <hr>
                        <label> Judul Materi</label>
                        @error('judul') 
                        <span class="text-danger error">{{ $message }}</span>
                        @enderror
                        <input type="text" wire:model="judul" class="form-control shadow-sm mb-3"> 
                        
                      
                        <label> Deskripsi</label>
                        @error('deskripsi') 
                        <span class="text-danger error">{{ $message }}</span><br>
                        @enderror
                        <textarea cols="30" rows="3" wire:model="deskripsi" class="form-control shadow-sm mb-3"></textarea>
                        

                        <label> Link Document</label>
                        @error('link_document') 
                        <span class="text-danger error">{{ $message }}</span><br>
                        @enderror
                        <input type="url" wire:model="link_document" class="form-control shadow-sm mb-3"> 
                        
                      

                        <label for="link_youtube"> Sematkan Video Youtube</label>
                        @error('link_youtube') 
                        <span class="text-danger error">{{ $message }}</span><br>
                        @enderror
                        <input type="url" wire:model="link_youtube" class="form-control shadow-sm mb-3"> 
                        

                        <label for="status_publish"> Status Publish : </label>
                        @error('status_publish') 
                        <span class="text-danger error">{{ $message }}</span><br>
                        @enderror
                        <select class="form-control mb-3" wire:model="status_publish">
                            <option value="yes" selected>YES</option>
                            <option value="no">NO</option>
                        </select>
                      
                      
                        <hr>

                        @if($edit_id)
                        <button class="btn btn-sm btn-success mt-3 " wire:click.prevent="update()"><i class="fa fa-check"></i> Update</button>
                        
                        @else 
                        <button class="btn btn-sm btn-primary mt-3 " wire:click.prevent="simpanmateri()"><i class="fa fa-check"></i> Simpan</button>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        @endif

         {{-- Tambah tugas form --}}
         @if($tambahtugas == '1')
         <div class="row">
            
             <div class="col-lg-12 col-12"> 
                 <div class="card top_counter shadow">
                     <button class="btn btn-sm btn-secondary" wire:click.prevent="closetambahtugas()"><i class="fa fa-times"></i>  </button>
                     <div class="body">
                         <h5> Tugas</h5>
 
                         <hr>
                         <label> Judul Tugas</label>
                         @error('judul') 
                         <span class="text-danger error">{{ $message }}</span>
                         @enderror
                         <input type="text" wire:model="judul" class="form-control shadow-sm mb-3"> 
                         
                       
                         <label> Deskripsi</label>
                         @error('deskripsi') 
                         <span class="text-danger error">{{ $message }}</span><br>
                         @enderror
                         <textarea cols="30" rows="3" wire:model="deskripsi" class="form-control shadow-sm mb-3"></textarea>
                         
 
                         <label> Link Document</label>
                         @error('link_document') 
                         <span class="text-danger error">{{ $message }}</span><br>
                         @enderror
                         <input type="url" wire:model="link_document" class="form-control shadow-sm mb-3"> 
                         
                       
 
                         <label for="link_youtube"> Sematkan Video Youtube</label>
                         @error('link_youtube') 
                         <span class="text-danger error">{{ $message }}</span><br>
                         @enderror
                         <input type="url" wire:model="link_youtube" class="form-control shadow-sm mb-3"> 
                         
 
                         <label for="status_publish"> Status Publish : </label>
                         @error('status_publish') 
                         <span class="text-danger error">{{ $message }}</span><br>
                         @enderror
                         <select class="form-control mb-3" wire:model="status_publish">
                             <option value="yes" selected>YES</option>
                             <option value="no">NO</option>
                         </select>
                       
                       
                         <hr>
 
                         @if($edit_id_tugas)
                         <button class="btn btn-sm btn-success mt-3 " wire:click.prevent="updatetugas()"><i class="fa fa-check"></i> Update</button>
                         
                         @else 
                         <button class="btn btn-sm btn-primary mt-3 " wire:click.prevent="simpantugas()"><i class="fa fa-check"></i> Simpan</button>
                         @endif
                         
                     </div>
                 </div>
             </div>
         </div>
         @endif


        {{-- lihat materi --}}
        @if($lihatmateri == '1')
        <div class="row">

            <div class="col-12 mb-2">
                <button class="btn btn-sm text-white" style="background-color: purple" wire:click.prevent="tambahmateri()"> <i class="fa fa-plus"></i> Materi</button>
            </div>

            <div class="col-lg-12 col-12"> 

                @foreach ($materi as $item)
                <div class="card top_counter shadow">
                    {{-- <button class="btn btn-sm btn-secondary" wire:click.prevent="closelihatmateri()"><i class="fa fa-times"></i> </button> --}}
                    <div class="body">

                        <div class="text col-12 mb-3">
                            <button class="btn btn-sm text-white mr-2" style="background-color: green" wire:click.prevent="edit({{ $item->id }})"><i class="fa fa-edit"></i></button>

                            <button class="btn btn-sm text-white" style="background-color: red" wire:click.prevent="hapus({{ $item->id }})"><i class="fa fa-trash"></i> </button>
                        </div>
                        <div class="text col-12 mb-3">
                            
                             <h3> {{ $item->judul }}</h3>
                             Status Publis: {{ $item->status_publish }}<br>
                            <i class="fa fa-calendar-o"></i> {{ $item->created_at }}<br>
                            <a href="{!! $item->link_document !!}" target="_blank" class="mt-2">
                            <i class="fa fa-file mt-2"> Lihat Document</i></a>
                        </div>
                        @if($item->link_youtube)
                        <div class="col-12 col-lg-12 videowrapper">
                           {!! $item->link_youtube !!}
                        </div>
                        @endif
                        <div class="text col-12 col-lg-6 mt-3">
                            <label> Deskripsi : </label><br>
                            {{ $item->deskripsi }}
                        </div>
                       
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        {{-- data tugas diserahkan --}}
        @if($tugasdiserahkan == '1')
        <div class="row">
                
            <div class="card shadow">
                <button type="button" class="btn btn-secondary mr-2" wire:click.prevent="close_tugasdiserahkan()"><i class="fa fa-times"></i></button>
                <div class="header">
                    <h2>Tugas Diserahkan</h2>
                    {{ $judul }}
                    <hr>
                </div>

                @if($edit_nilai == '1')
                <div class="row ml-2">
                <div class="col-12">
                    {{ $nama_user }}
                </div>
               
                <div class="col-4">
                    Catatan:
                    <textarea cols="12" rows="3" class="form-control" wire:model="catatan"></textarea>
                </div>
                <div class="col-4 col-lg-2">
                    Nilai:
                    <input type="number" class="form-control" wire:model="nilai" min="0">
                </div>
                <div class="col-4">

                   <button class="btn btn-sm btn-success mt-4 mr-2" wire:click.prevent="simpan_nilai()"><i class="fa fa-check"></i></button>

                   <button class="btn btn-sm btn-warning mt-4" wire:click.prevent="closeedit_nilai()"><i class="fa fa-times"></i></button>
                </div>
                </div>
                @endif
                
                <div class="body">
                
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-slack"></i></th>
                                    <th>Action</th>
                                    <th>Nama</th>                                    
                                    <th>Tugas</th> 
                                    <th>Nilai</th>
                                    <th>Catatan</th>                                   
                                    
                                </tr>
                            </thead>
                                <tbody>
                              
                                @foreach($tugas_diserahkan as $ts)    
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>                                            

                                        <button class="btn btn-sm text-white mr-2" style="background-color: green" wire:click.prevent="edit_nilai({{ $ts->id }})"><i class="fa fa-edit"></i></button>
            
                                        <button class="btn btn-sm text-white" style="background-color: red" wire:click.prevent="hapustugasdiserahkan({{ $ts->id }})"><i class="fa fa-trash"></i> </button>
                                    </td>
                                    <td>
                                       {{ $ts->nama_user }}
                                    </td>
                                    <td>

                                        @if($ts->status_dibaca !== 'belum')
                                        <a href="{{ $ts->link_tugas }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                        @else
                                        <a href="{{ $ts->link_tugas }}" target="_blank"> <i class="fa fa-eye-slash"></i> Lihat</a>
                                        @endif
                                       
                                    </td>
                                    <td>
                                       
                                        {{ $ts->nilai }}
                                       
                                    </td>
                                    <td>{{ $ts->catatan }}</td>                                   
                                    
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        @endif


        {{-- lihat tugas --}}
        @if($lihattugas == '1')
        <div class="row">

            <div class="col-12 mb-2">
                <button class="btn btn-sm text-white" style="background-color: purple" wire:click.prevent="tambahtugas()"> <i class="fa fa-plus"></i> Tugas</button>
            </div>

            <div class="col-lg-12 col-12"> 

                @foreach ($tugas as $item)
                <div class="card top_counter shadow">
                   
                    <div class="body">

                        <div class="text col-12 mb-3">
                            <button class="btn btn-sm text-white mr-2 btn-primary" wire:click.prevent="tugasdiserahkan({{ $item->id }})"><i class="fa fa-eye"></i> </button>

                            <button class="btn btn-sm text-white mr-2" style="background-color: green" wire:click.prevent="edittugas({{ $item->id }})"><i class="fa fa-edit"></i></button>

                            <button class="btn btn-sm text-white" style="background-color: red" wire:click.prevent="hapustugas({{ $item->id }})"><i class="fa fa-trash"></i> </button>
                        </div>
                        <div class="text col-12 mb-3">
                            
                            <h3> {{ $item->judul }}</h3>
                            Status Publis: {{ $item->status_publish }}<br>
                            <i class="fa fa-calendar-o"></i> {{ $item->created_at }}<br>
                            
                            @if($item->link_document)
                            <a href="{!! $item->link_document !!}" target="_blank" >
                            <i class="fa fa-file mt-2"> Lihat Document</i></a>
                            @endif
                        </div>
                        @if($item->link_youtube)
                        <div class="col-12 col-lg-12 videowrapper">
                           {!! $item->link_youtube !!}
                        </div>
                        @endif
                        <div class="text col-12 col-lg-6 mt-3">
                            <label> Deskripsi : </label><br>
                            {{ $item->deskripsi }}
                        </div>
                       
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- lihat peringkat --}}
        @if($lihatperingkat == '1')
        <div class="row">

            <div class="col-12 mb-2">
                Total Nilai
            </div>

            <div class="col-lg-12 col-12">
                
              <div class="row">
                  <div class="text col-2 col-lg-1 mb-2 bg-white rounded ">
                      <i class="fa fa-slack"></i>
                  </div>
                  <div class="text col-6 col-lg-7 mb-2 bg-white rounded ">
                            
                      <b>Nama</b>
                   
                  </div>

                  <div class="text col-4 mb-2 bg-white rounded">
                      
                    <b>Total Nilai</b>
                 
                </div>
              </div>

                @foreach ($peringkat as $item)
                  <div class="row">
                     
                      <div class="text col-2 col-lg-1 mb-2 bg-white rounded ">
                          {{ $loop->iteration }}
                      </div>

                        <div class="text col-6 col-lg-7 mb-2 bg-white rounded">
                            
                            {{ $item->nama }}
                         
                        </div>

                      <div class="text col-4 mb-2 bg-white rounded">
                            
                          {{ $item->total_nilai }}
                       
                      </div>
                  </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>



