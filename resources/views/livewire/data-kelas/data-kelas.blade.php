
<div id="main-content">

    <div class="container">


        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12 text-dark">                        
                    <h2>Daftar Kelas</h2>
                   
                </div>            

            </div>
        </div>

        @if (session()->has('success'))

        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-info-circle"></i> {{ session('success') }}
        </div>
    
        @endif

        @if($popform == '')
        <div class="row clearfix">
            @foreach ($daftarkelas as $kelas)
            
            
            <div class="col-lg-4 col-md-12 col-12">
                <a href="#" wire:click.prevent="formpendaftaran({{ $kelas->id }})" class="text-dark">
                <div class="card pricing3 shadow-sm">
                    <div class="body">
                        <div class="pricing-option">
                            <i class="fa fa-book text-primary"></i>
                            <h5>{{ $kelas->nama_kelas }}</h5>
                            <hr>
                            <div class="m-t-30 m-b-30">
                                <h6>Angkatan ke : {{ $kelas->angkatan }}</h6>
                                <p>{{ $kelas->deskripsi }}</p>
                            </div>
                            <div class="price">
                                <span class="price">{{ $kelas->harga_kelas }}<b>idr</b> </span>
                            </div>

                            <button  wire:click.prevent="formpendaftaran({{ $kelas->id }})" class="btn text-white" style="background-color: purple">Daftar Sekarang</button>
                        </div>
                    </div>
                </div>
                </a> 
            </div>
            
            @endforeach
            
        </div>
        @endif

        <div class="row clearfix justify-content-center">
           
            @foreach ($formdaftar as $kelas)
                
            <div class="col-lg-10 col-12">
                 
                <div class="card top_counter shadow">
                    <div class="card-header">
                        <h5>Form Pendaftaran Kelas</h5>
                    </div>

                    <div class="body">
                        <div class="text">Anda akan mendaftar pada kelas berikut : 
                            <br><br><b> {{ $kelas->nama_kelas }}</b>
                            <br><br> Angkatan : {{ $kelas->angkatan }}
                            <br> Deskripsi : <br>{{ $kelas->deskripsi }}
                        </div>
                        <br>
                      
                      <div class="col-12 col-lg-12 mb-2">
                        @if($pendaftarankelas == 0)
                        <button class="btn btn-sm btn-success float-right mb-3" wire:click.prevent="daftarkelas({{ $kelas->id }})"><i class="fa fa-check-square-o"></i> Daftar </button>
                        @else 
                        <a href="/status-pendaftaran" class="btn btn-sm btn-info float-right mb-3"><i class="fa fa-info-circle"></i> Status Pendaftaran </a>
                        @endif

                        <button class="btn btn-sm btn-secondary mr-2 float-right mb-3" wire:click.prevent="closeform()"><i class="fa fa-times"></i> Close </button>
                      </div>

                    </div>
                </div>
            </div>

            

            @endforeach
            
            
        </div>

        <div class="row clearfix">
           
            
            
           
        </div>

    </div>
</div>



