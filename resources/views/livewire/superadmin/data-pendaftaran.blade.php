
<div id="main-content">

    <div class="container">


        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2>Data Pendaftaran</h2>
                   
                </div>            

            </div>
        </div>

        

        @if($uploud == '1')
        <div class="row clearfix justify-content-center">
            
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
            
            
        </div>
        @endif



        {{-- Kelas --}}
        @if($info == '')
        <div class="row clearfix">
            @foreach ($daftarkelas as $kelas)
            
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


        {{-- info pendaftaran kelas --}}
        <div class="row clearfix">
            @if($kode_kelas)
            <div class="col-lg-12 col-12 mb-3"> 
                <button class="btn btn-sm btn-secondary" wire:click.prevent="kembali()"><i class="fa fa-arrow-circle-o-left"></i> Back </button>
            </div>
            @endif

            @foreach ($info_pendaftaran as $status)
           

            <div class="col-lg-12 col-12"> 

                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="icon text-success"><i class="fa fa-book"></i> </div>
                        
                            <div class="text"><b>{{ $status->datakelas->nama_kelas }},</b></div>
                            
                            <p class="text">{{ $status->datakelas->deskripsi }}</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-6 text-center">
                <a href="#" wire:click.prevent="popdata_pendaftar()">
                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="text"><i class="fa fa-spinner text-info"></i> <b>Pendaftaran</b></div><hr>
                      
                            <h3 class="text text-info"> {{ $jumlahpendaftaran }} </h3>
                       
                    </div>
                </div> 
                </a>
                
            </div>

            <div class="col-lg-4 col-6 text-center">
                <a href="#" wire:click.prevent="popdata_diterima()">    
                <div class="card top_counter shadow">
                    <div class="body">
                        <div class="text"><i class="fa fa-check text-success"></i> <b>Diterima</b></div><hr>
                        <h3 class="text text-success"> {{ $jumlahditerima }} </h3>
                    </div>
                </div> 
                </a>
            </div>

            <div class="col-lg-4 col-6 text-center">
                <a href="#" wire:click.prevent="popdata_bermasalah()"> 
                <div class="card top_counter shadow">
                    <div class="body">
                        
                        <div class="text"><i class="fa fa-times text-danger"></i> <b>Bermasalah</b></div><hr>
                       
                            <h3 class="text text-danger"> {{ $jumlahbermasalah }} </h3>
                       
                    </div>
                </div> 
                </a>
            </div>

            

            
            @endforeach
            
        </div>
        {{-- end info pendaftaran kelas --}}

        @if (session()->has('success'))

        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-info-circle"></i> {{ session('success') }}
        </div>
    
        @endif

        {{-- tabel pendaftar --}}
        @if($popdata_pendaftar == '1')
        <div class="row clearfix">
        
            <div class="card shadow">
                <div class="header">
                    <h2>Data Pendaftar</h2>
                    <hr>
                </div>
                <div class="row col-lg-12 ml-3 ">
                    <button type="button" class="btn btn-secondary mr-2" wire:click.prevent="closepopdata_pendaftar()"><i class="fa fa-arrow-left"></i></button>

                    <button type="button" class="btn btn-success mr-2" wire:click.prevent="terima()"><i class="fa fa-check"></i></button>

                    <button type="button" class="btn btn-warning"  wire:click.prevent="bermasalah()"><i class="fa fa-times"></i></button>
                </div>
                <div class="body">
                   
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0 c_list">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="fancy-checkbox">
                                            <i class="fa fa-check"></i>
                                        </label>
                                    </th>
                                    <th>Action</th>
                                    <th>Name</th>                                    
                                    <th>Email</th> 
                                    <th>Status Pembayaran</th>                                   
                                    <th>Bukti Bayar</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                @foreach ($data_pendaftar as $pendaftar)
                                    
                                <tr>
                                    <td style="width: 50px;">
                                        <label class="fancy-checkbox">
                                            <input class="checkbox-tick" type="checkbox" name="checkbox" value="{{ $pendaftar->id }}"wire:model="mark.{{ $pendaftar->id }}">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>                                            
                                        
                                        <button type="button" class="btn btn-danger" wire:click.prevent="hapus({{ $pendaftar->id }})"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                    <td>
                                        {{ $pendaftar->user->name }}
                                    </td>
                                    <td>
                                        {{ $pendaftar->user->email }}
                                    </td>
                                    <td>{{ $pendaftar->status_pembayaran }}</td>                                   
                                    <td>
                                        <a href="{{ asset('/storage/'.$pendaftar->bukti_pembayaran) }}" target="_blank"> Lihat </a>
                                    </td>
                                    <td>{{ $pendaftar->status_pendaftaran }} </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>
        @endif
        {{-- end table pendaftar --}}

        {{-- tabel pendaftar diterima--}}
        @if($popdata_diterima == '1')
        <div class="row clearfix">
        
            <div class="card shadow">
                <div class="header">
                    <h2>Pendaftar Diterima</h2>
                    <hr>
                </div>
                <div class="row col-lg-12 ml-3 ">
                    <button type="button" class="btn btn-secondary mr-2" wire:click.prevent="closepopdata_diterima()"><i class="fa fa-arrow-left"></i></button>

                    <button type="button" class="btn btn-warning"  wire:click.prevent="bermasalah()"><i class="fa fa-times"></i></button>
                </div>
                <div class="body">
                   
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0 c_list">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="fancy-checkbox">
                                            <i class="fa fa-check"></i>
                                        </label>
                                    </th>
                                    <th>Action</th>
                                    <th>Name</th>                                    
                                    <th>Email</th>                                    
                                    <th>Bukti Bayar</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                @foreach ($data_pendaftar3 as $pendaftar)
                                    
                                <tr>
                                    <td style="width: 50px;">
                                        <label class="fancy-checkbox">
                                            <input class="checkbox-tick" type="checkbox" name="checkbox" value="{{ $pendaftar->id }}"wire:model="mark.{{ $pendaftar->id }}">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>                                            
                                        <button type="button" class="btn btn-danger" wire:click.prevent="hapus({{ $pendaftar->id }})"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                    <td>
                                        {{ $pendaftar->user->name }}
                                    </td>
                                    <td>
                                        {{ $pendaftar->user->email }}
                                    </td>                                   
                                    <td>
                                        <a href="{{ asset('/storage/'.$pendaftar->bukti_pembayaran) }}" target="_blank"> Lihat </a>
                                    </td>
                                    <td>{{ $pendaftar->status_pendaftaran }} </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>
        @endif
        {{-- end table pendaftar --}}

        {{-- tabel pendaftar bermasalah--}}
        @if($popdata_bermasalah == '1')
        <div class="row clearfix">
        
            <div class="card shadow">
                <div class="header">
                    <h2>Pendaftar Bermasalah</h2>
                    <hr>
                </div>
                <div class="row col-lg-12 ml-3 ">
                    <button type="button" class="btn btn-secondary mr-2" wire:click.prevent="closepopdata_bermasalah()"><i class="fa fa-arrow-left"></i></button>

                    <button type="button" class="btn btn-success"  wire:click.prevent="terima()"><i class="fa fa-check"></i></button>
                </div>
                <div class="body">
                   
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0 c_list">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="fancy-checkbox">
                                            <i class="fa fa-check"></i>
                                        </label>
                                    </th>
                                    <th>Action</th>
                                    <th>Name</th>                                    
                                    <th>Email</th>                                    
                                    <th>Bukti Bayar</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                @foreach ($data_pendaftar2 as $pendaftar)
                                    
                                <tr>
                                    <td style="width: 50px;">
                                        <label class="fancy-checkbox">
                                            <input class="checkbox-tick" type="checkbox" name="checkbox" value="{{ $pendaftar->id }}"wire:model="mark.{{ $pendaftar->id }}">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>                                            
                                        <button type="button" class="btn btn-danger" wire:click.prevent="hapus({{ $pendaftar->id }})"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                    <td>
                                        {{ $pendaftar->user->name }}
                                    </td>
                                    <td>
                                        {{ $pendaftar->user->email }}
                                    </td>                                   
                                    <td>
                                        <a href="{{ asset('/storage/'.$pendaftar->bukti_pembayaran) }}" target="_blank"> Lihat </a>
                                    </td>
                                    <td>{{ $pendaftar->status_pendaftaran }} </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>
        @endif
        {{-- end table pendaftar --}}


    </div>

   
</div>



