@extends('dashboard.layouts.main')

@section('container') 

    <div id="main-content">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                                                
                        <h2>Home</h2>
                       
                    </div>            

                </div>
            </div>


            <div class="row clearfix w_social3">
               
                <div class="col-lg-4 col-6 ">
                    <a href="/kelas-saya" class="text-dark">
                    <div class="card facebook-widget shadow">
                        <div class="icon"><i class="fa fa-book"></i></div>
                        <div class="content">
                            <div class="text">Kelas Belajar</div>
                            
                        </div>
                    </div></a>
                </div>
                
                
                <div class="col-lg-4 col-6">

                    <a href="/data-kelas" class="text-dark">
                    <div class="card instagram-widget shadow">
                        <div class="icon"><i class="fa fa-star-o"></i></div>
                        <div class="content">
                            <div class="text">Daftar Kelas</div>
                            
                        </div>
                    </div>
                    </a>

                </div>

                <div class="col-lg-4 col-6">

                    <a href="/status-pendaftaran" class="text-dark">
                    <div class="card shadow">
                        <div class="icon text-success"><i class="fa fa-info-circle"></i></div>
                        <div class="content">
                            
                            <div class="text">Status Pendaftaran</div>
                            
                        </div>
                    </div>
                    </a>

                </div>
               
            </div>

           
        </div>
    </div>
    
@endsection

