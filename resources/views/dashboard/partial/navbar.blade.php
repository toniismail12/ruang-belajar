@auth

<nav class="navbar navbar-fixed-top" style="background-color: purple">
    <div class="container">
        <div class="col-lg-7 col-7 mt-2 mb-1">
            
                {{-- <img src="../assets/images/logo.svg" alt="Lucid Logo" class="img-responsive logo"> --}}
                <h3 class="text-white"> Lentera </h3>
                          
        </div>
        
        <div class="col-lg-4 col-2 mt-2 mb-1">
                           
            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                 
                    <li>
                        <div class="user-account margin-0 float-right">
                            <div class="dropdown mt-0">
                                <div class="row">
                                <a href="javascript:void(0);" class="dropdown-toggle user-name text-large text-white mr-3" data-toggle="dropdown">
                                    {{-- <img src="../assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture"> --}}
                                    <i class="icon icon-settings"></i>
                                </a>
                              
                                <ul class="dropdown-menu dropdown-menu-right account">
                                    <li>
                                        <span>Welcome,</span>
                                        <strong>{{ auth()->user()->name }}</strong>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="/profile"><i class="icon-user"></i>Profile</a></li>
                                  
                                    <li class="divider"></li>
                                    <li> 
                                        <form action="/logout" method="post">
                                            @csrf
                                        <button class="btn btn-sm btn-outline-white"><i class="fa fa-sign-out"></i>Logout</button> 
                                        </form>
                                    </li>
                                    
                                </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

        <div class="navbar-btn col-1 ">
            <button class="navbar-toggler float-right text-white" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <i class="lnr lnr-menu fa fa-bars"></i>
            </button>
        </div>
    </div>
</nav>
@endauth