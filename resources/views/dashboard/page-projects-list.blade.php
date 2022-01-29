@extends('dashboard.layouts.main')

@section('container') 


    <div id="main-content">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>Projects List</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active">Projects List</li>
                        </ul>
                    </div>            
                 
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body project_report">
                            <div class="table-responsive">
                                <table class="table m-b-0 table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Status</th>
                                            <th>Project</th>
                                            <th>Mitra</th>
                                            <th>Deadline</th>
                                            <th>Team</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($project as $projects)
                                       

                                        <tr>
                                            <td>
                                                <span class="badge badge-success">Active</span>
                                                <!-- {{ $projects->status }} -->
                                            </td>
                                            <td class="project-title">
                                                <h6><a href="javascript:void(0);">{{$projects->name}}</a></h6>
                                                <small>Created At: {{$projects->created_at}}</small>
                                            </td>
                                            <td>{{ $projects->mitra }} </td>
                                            <td>
                                               {{$projects->deadline}}
                                            </td>
                                            <td>

                                                <!-- <ul class="list-unstyled team-info">
                                                    <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                </ul> -->

                                                <!-- @foreach($users as $user)
                                                @if($user->projects_id == $projects->id)
                                                {{$user->name}} <br>
                                                @endif
                                                @endforeach -->

                                                <a href="#"><small> ADD</small></a>
                                            </td>
                                            <td class="project-actions">
                                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="icon-eye"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="icon-pencil"></i></a>
                                            </td>
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
    </div>
    
</div>



@endsection