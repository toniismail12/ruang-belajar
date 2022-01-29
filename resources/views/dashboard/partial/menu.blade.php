
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg shadow-sm mx-auto">
            <div class="container">
         
                {{-- menu user biasa --}}
                @can('user')

                <div class="navbar-collapse align-items-center collapse mx-auto justify-content-center" id="navbar">

                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item dropdown">
                            <a href="/home" class="nav-link">
                                <i class="fa fa-home"></i> Home
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a href="/kelas-saya" class="nav-link">
                                <i class="fa fa-book"></i> Kelas Saya
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a href="/data-kelas" class="nav-link">
                                <i class="fa fa-star"></i> Daftar Kelas
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a href="/status-pendaftaran" class="nav-link">
                                <i class="fa fa-info-circle"></i> Status Pendaftaran
                            </a>
                            
                        </li>
                        
                       
                    </ul>
                
                </div>

                @endcan
                {{-- end menu user biasa  --}}
    

                {{-- menu admin --}}
                @can('superadmin')
                <div class="navbar-collapse align-items-center collapse" id="navbar">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item dropdown">
                            <a href="/superadmin" class="nav-link">
                                <i class="fa fa-home"></i> Home
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a href="/data-pendaftaran" class="nav-link">
                                <i class="fa fa-file-text-o"></i> Pendaftaran
                            </a>
                            
                        </li>

                        <li class="nav-item dropdown">
                            <a href="/data-kelas-user" class="nav-link">
                                <i class="fa fa-star-o"></i> Data Kelas
                            </a>
                            
                        </li>


                         <li class="nav-item dropdown">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-navicon"></i> Lainnya
                            </a>
                            <ul class="dropdown-menu animated bounceIn">
                                
                                <li class="nav-item"><a href="/data-user"> User </a>
                                <li class="nav-item"><a href="/project-list">Project List</a></li>                                    
                                <li class="nav-item"><a href="/taskboard-list">Taskboard</a></li>
                       
                            </ul>
                        </li>
                      
                       
                    </ul>
                </div>
                @endcan  
                
                 {{-- menu user trainer / anggota --}}
                 @can('anggota')

                 <div class="navbar-collapse align-items-center collapse mx-auto justify-content-center" id="navbar">
 
                     <ul class="navbar-nav justify-content-center">
                         <li class="nav-item dropdown">
                             <a href="/home-trainer" class="nav-link">
                                 <i class="fa fa-home"></i> Home
                             </a>
                             
                         </li>
                         <li class="nav-item dropdown">
                             <a href="/kelas-trainer" class="nav-link">
                                 <i class="fa fa-book"></i> Kelas Belajar
                             </a>
                             
                         </li>
                         {{-- <li class="nav-item dropdown">
                             <a href="/data-kelas" class="nav-link">
                                 <i class="fa fa-star-o"></i>Data Kelas
                             </a>
                             
                         </li> --}}
                         <li class="nav-item dropdown">
                             <a href="/data-pendaftaran-trainer" class="nav-link">
                                 <i class="fa fa-info-circle"></i>Pendaftaran
                             </a>
                             
                         </li>
                         
                        
                     </ul>
                 
                 </div>
 
                 @endcan
                 {{-- end menu user biasa  --}}

            </div>
        </nav>
    </div>
