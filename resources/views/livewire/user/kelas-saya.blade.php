
<div id="main-content">

    <div class="container">


        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2>Kelas Saya</h2>
                   
                </div>            

            </div>
        </div>

        @foreach ($pendaftarankelas2 as $kelas)
        @if ($kelas->status_pendaftaran != 'diterima')

        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-info-circle"></i> Apabila Status Pendaftaran Kelas Diterima, Kelas Anda akan muncul disini,
        </div>
    
        @endif
        @endforeach


        {{-- Kelas --}}
        @if($info == '')
        <div class="row clearfix">
            @foreach ($pendaftarankelas1 as $kelas)
            
            <div class="col-lg-12 col-12">
                <a href="#" wire:click.prevent="info({{ $kelas->id }})" class="text-dark">    
                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="icon text-success"><i class="fa fa-book"></i> </div>
                        
                            <div class="text"><b>{{ $kelas->datakelas->nama_kelas }},</b></div>
                            
                            <p class="text">{{ $kelas->datakelas->deskripsi }}</p>
                    </div>
                </div> </a> 
            </div>
            
            @endforeach
            
        </div>
        @endif
        {{-- end kelas --}}


        {{-- info kelas --}}
        <div class="row clearfix">
            @foreach ($status_pendaftaran as $status)

            <div class="col-lg-12 col-12 mb-3"> 
                <button class="btn btn-sm btn-secondary" wire:click.prevent="kembali()"><i class="fa fa-arrow-circle-o-left"></i> Back </button>
            </div>

            {{-- <div class="col-lg-12 col-12"> 

                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="text">
                        <i class="fa fa-book text-success"></i> <b>{{ $status->datakelas->nama_kelas }} </b> 
                        </div>
                        <hr>
                        <a href="#">
                        <div class="text"><i class="fa fa-user"></i> <b>Teman Sekelas</b> </div>
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

        @if($lihatmateri == '1')
        <div class="row">
            <div class="col-12 mb-2">
                Materi
            </div>
            <div class="col-lg-12 col-12"> 

                @foreach ($materi as $item)
                <div class="card top_counter shadow">
                    {{-- <button class="btn btn-sm btn-secondary" wire:click.prevent="closelihatmateri()"><i class="fa fa-times"></i> </button> --}}
                    <div class="body">

                        <div class="text col-12 mb-3">
                            
                             <h3> {{ $item->judul }}</h3>
                            <i class="fa fa-calendar-o"></i> {{ $item->created_at }}<br>
                            <a href="{!! $item->link_document !!}" target="_blank">
                            <i class="fa fa-file"> Lihat Document</i></a>
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


        {{-- Tambah tugas form --}}
        @if($formkumpultugas == '1')
        <div class="row">
           
            <div class="col-lg-12 col-12"> 
                <div class="card top_counter shadow">
                    <button class="btn btn-sm btn-secondary" wire:click.prevent="closeserahkantugas()"><i class="fa fa-times"></i>  </button>
                    <div class="body">
                        <h5>Serahkan Tugas</h5>

                        <hr>
                        @if($status_dibaca)
                        <label >Status Dibaca: </label> {{ $status_dibaca }}<br>
                        @endif
                        @if($nilai > 0)
                        <label >Nilai: </label> {{ $nilai }}<br>
                        @endif
                        @if($catatan)
                        <label >Catatan: </label> {{ $catatan }}<br>
                        @endif
                        <label >Judul Tugas</label><br>
                        {{ $judul_tugas }}<br><br>
  
                        <label> Link Tugas </label>
                        @error('link_tugas') 
                        <span class="text-danger error">{{ $message }}</span><br>
                        @enderror
                        <textarea cols="30" rows="3" wire:model="link_tugas" class="form-control shadow-sm mb-3"></textarea>
                      
                        <hr>

                        @if($cektugas !== 0 && $nilai == 0)

                        <button class="btn btn-sm btn-success mt-3 " wire:click.prevent="updatetugas()"><i class="fa fa-check"></i> Update</button>

                        @elseif($cektugas !== 0 && $nilai > 0)
                        <button class="btn btn-sm btn-success mt-3 " disabled><i class="fa fa-check"></i> Update</button>
                        
                        @else 
                        <button class="btn btn-sm btn-primary mt-3 " wire:click.prevent="simpantugas()"><i class="fa fa-check"></i> Kirim</button>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        @endif


         {{-- lihat tugas --}}
         @if($lihattugas == '1')
         <div class="row">
 
             <div class="col-12 mb-2">
                 Tugas
             </div>
 
             <div class="col-lg-12 col-12"> 
 
                 @foreach ($tugas as $item)
                 <div class="card top_counter shadow">
                    
                     <div class="body">
 
                         <div class="text col-12 mb-3">
                             
                             <button class="btn btn-sm text-white mr-2 btn-primary" wire:click.prevent="serahkantugas({{ $item->id }})"><i class="fa fa-send"></i> Serahkan</button>

                         </div>
                         <div class="text col-12 mb-3">
                             
                             <h3> {{ $item->judul }}</h3>
                             <i class="fa fa-calendar-o"></i> {{ $item->created_at }}<br>
                             
                             @if($item->link_document)
                             <a href="{!! $item->link_document !!}" target="_blank">
                             <i class="fa fa-file"> Lihat Document</i></a>
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



