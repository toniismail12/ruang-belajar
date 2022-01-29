@extends('dashboard.layouts.main')

@section('container') 

    <div id="main-content" class="taskboard">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>TaskBoard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            
                            <li class="breadcrumb-item active">TaskBoard</li>
                            <li class="breadcrumb-item active">{{$task_input->name}}</li>
                        </ul>
                    </div>            
                    
                </div>
            </div>

             @if (session()->has('succes'))

                    <div class="alert alert-warning col-lg-4 col-md-12" role="alert">
                        {{ session('succes') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>

                @endif

            <div class="row clearfix">

                <div class="col-lg-4 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                            <h2>Planned</h2>
                            <ul class="header-dropdown">
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#addcontact"><i class="icon-plus"></i></a></li>
                            </ul>
                        </div>
                       
                        <div class="body taskboard">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        
                                        @foreach($taskboard as $taskboard)
                                        <div class="dd-handle">{{$taskboard->created_at}}</div>
                                        
                                        <div class="dd-content p-15">
                                            <h5>{{$taskboard->task_title}}</h5>

                                            <p> {{$taskboard->deskripsi}} </p>
                                            <br>
                                            Rencana Selesai: {{$taskboard->selesai}}
                                            <hr>
                                            <div class="action">
                                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="icon-note"></i></button>

                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Time"><i class="icon-clock"></i></button>

                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Comment"><i class="icon-bubbles"></i></button> -->

                                                <form action="/delete-task/{{$taskboard->id}}" method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" data-type="confirm" class="btn btn-sm btn-outline-danger" title="Delete"><i class="icon-trash"></i></button>
                                                </form>

                                                <form action="/to-progress/{{$taskboard->id}}" method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-warning float-right" title="Move To In Progress"><i class="icon-arrow-right"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                    </li>                                    
                                </ol>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card progress_task">
                        <div class="header">
                            <h2>In progress</h2>
                            
                        </div>
                        <div class="body taskboard">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                   
                                    <li class="dd-item" data-id="1">

                                        @foreach($inprogress as $progress)

                                        <div class="dd-handle">{{$progress->updated_at}}</div>
                                        <div class="dd-content p-15">
                                            <h5>{{$progress->task_title}}</h5>
                                            <p>{{$progress->deskripsi}}</p>
                                            <br>
                                            Rencana Selesai: {{$progress->selesai}}
                                            <hr>
                                            <div class="action">
                                                <form action="/delete-task/{{$progress->id}}" method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" data-type="confirm" class="btn btn-sm btn-outline-danger" title="Delete"><i class="icon-trash"></i></button>
                                                </form>

                                                <form action="/completed/{{$progress->id}}" method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-success float-right" title="Completed"><i class="icon-check"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                     
                                        @endforeach
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card completed_task">
                        <div class="header">
                            <h2>Completed</h2>
                            
                        </div>
                        <div class="body taskboard">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">                                   
                                    <li class="dd-item" data-id="1">
                                        @foreach($completed as $done)
                                        <div class="dd-handle">{{$done->updated_at}}</div>
                                        <div class="dd-content p-15">
                                            <h5>{{$done->task_title}}</h5>
                                            <p>{{$done->deskripsi}}</p>
                                            
                                            <hr>
                                            
                                        </div>
                                        @endforeach
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</div>

<!-- Add New Task -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add New Task</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    
                    <form action="/task-proses" method="post" class="col-12">
                    @csrf
                    
                     <div class="col-12">
                        <div class="form-group"> 
                            <input type="hidden" name="project_id" class="form-control" value="{{$task_input->id}}" readonly required>
                            <input type="hidden" name="uuid" class="form-control" value="{{$task_input->uuid}}" readonly required>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">                                   
                            <input type="text" name="task_title" class="form-control" placeholder="Task title" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">                                    
                            <textarea type="text" name="deskripsi" class="form-control" placeholder="Description" required></textarea>
                        </div>
                    </div>
                
                    <div class="col-12">
                        <label>Rencana Selesai</label>
                        <!-- <div class="input-daterange input-group" data-provide="datepicker"> -->
                            <input type="date" class="form-control" name="selesai" required>
                        <!-- </div> -->
                    </div> 
                                       
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
