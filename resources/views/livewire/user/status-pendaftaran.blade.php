
<div id="main-content">

    <div class="container">


        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2>Status Pendaftaran</h2>
                   
                </div>            

            </div>
        </div>

        @if (session()->has('success'))

        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-info-circle"></i> {{ session('success') }}
        </div>
    
        @endif

        @if($uploud == '1')
        {{-- <div class="row clearfix justify-content-center">
            
            <div class="col-lg-10 col-12">
                 
                <div class="card top_counter shadow">
                    <div class="card-header">
                        <h5>Uploud Bukti Pembayaran</h5>
                        <small class="text-danger">pdf atau foto jpg</small>
                    </div>

                    <div class="body">
                        <div class="text text-center"> 

                            <input type="file" wire:model="bukti_pembayaran"> 
                            <br>
                            @error('bukti_pembayaran') 
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                      
                      <div class="col-12 col-lg-12 mb-2">
                       
                        <button class="btn btn-sm btn-success float-right mb-3" wire:click.prevent="kirimbuktibayar()"><i class="fa fa-send"></i> Kirim </button>
                        

                        <button class="btn btn-sm btn-secondary mr-2 float-right mb-3" wire:click.prevent="closeuploud()"><i class="fa fa-times"></i> Close </button>
                      </div>

                    </div>
                </div>
            </div>
            
            
        </div> --}}
        @endif



        {{-- Kelas --}}
        @if($info == '')
        <div class="row clearfix">
            @foreach ($pendaftarankelas1 as $kelas)
            
            <div class="col-lg-12 col-12">
                {{-- <a href="#" wire:click.prevent="info({{ $kelas->id }})" class="text-dark">     --}}
                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="icon text-success"><i class="fa fa-book"></i> </div>
                        
                            <div class="text"><b>{{ $kelas->datakelas->nama_kelas }},</b></div>
                            
                            <p class="text">{{ $kelas->datakelas->deskripsi }}</p>

                            <div class="text">
                                Status Pendaftaran: <span class="badge badge-info"> {{ $kelas->status_pendaftaran }} </span>
                            </div>
                    </div>
                </div> 
                {{-- </a>  --}}
            </div>
            
            @endforeach
            
        </div>
        @endif
        {{-- end kelas --}}


        {{-- info pendaftaran kelas --}}
        {{-- <div class="row clearfix">
            @if($kode_kelas)
            <div class="col-lg-12 col-12 mb-3"> 
                <button class="btn btn-sm btn-secondary" wire:click.prevent="kembali()"><i class="fa fa-arrow-circle-o-left"></i> Back </button>
            </div>
            @endif
            @foreach ($status_pendaftaran as $status)

            <div class="col-lg-12 col-12"> 

                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="icon text-success"><i class="fa fa-book"></i> </div>
                        
                            <div class="text"><b>{{ $status->datakelas->nama_kelas }},</b></div>
                            
                            <p class="text">{{ $status->datakelas->deskripsi }}</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-6 text-center">
                  
                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="text"><i class="fa fa-spinner"></i> <b>Pendaftaran</b></div><hr>
                      
                            <p class="text text-success">{{ $status->status_pendaftaran }}</p>
                  
                    </div>
                </div> 
                
            </div>

            <div class="col-lg-3 col-6 text-center">
                 
                <div class="card top_counter shadow">
                    <div class="body">
                        
                        <div class="text"><i class="fa fa-ticket"></i> <b>Pembayaran</b></div><hr>
                        
                            <p class="text text-success">{{ $status->status_pembayaran }}</p>
                        
                    </div>
                </div> 
                
            </div>

            <div class="col-lg-3 col-6 text-center">
                    
                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="text"><i class="fa fa-file-pdf-o"></i> <b>Bukti Bayar</b></div><hr>
                            @if($status->bukti_pembayaran=='uploud')
                                <a href="#" class="btn btn-sm btn-success" wire:click.prevent="uploud()" class="text-dark"><i class="fa fa-upload"></i> Uploud </a>
                            @else
                                <a target="_blank" href="{{ asset('/storage/'.$status->bukti_pembayaran) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat </a>
                            @endif
                    </div>
                </div> 
                
            </div>

            <div class="col-lg-3 col-6 text-center">
                    
                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="text"><i class="fa fa-credit-card"></i> <b>Invoice</b></div><hr>
                           
                            <a href="#" class="btn btn-sm btn-warning" wire:click.prevent="uploud()" class="text-dark"><i class="fa fa-eye"></i> Lihat </a>
                           
                    </div>
                </div> 
                
            </div>
            
            @endforeach
            
        </div> --}}
        {{-- end info pendaftaran kelas --}}

    </div>
</div>



