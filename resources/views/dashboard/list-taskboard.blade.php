@extends('dashboard.layouts.main')

@section('container') 


    <div id="main-content">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>Taskboard Projects </h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active">Taskboard List Project Anda</li>
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
                                            <th>Taskboard</th>
                                            <th>Project</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($pro as $ject)
                                        @foreach($project as $projects)
                                        @if($projects->id == $ject->project_id)
                                        <tr>
                                            <td>
                                                 <a href="/app-taskboard/{{$projects->uuid}}" class="btn btn-warning"><i class="icon-pencil"></i></a>
                                            </td>
                                            <td class="project-title">
                                                <h6><a href="javascript:void(0);">{{$projects->name}}</a></h6>
                                                <small>Created At: {{$projects->created_at}}</small>
                                            </td>
                                            
                                        </tr>
                                        @endif
                                        @endforeach
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