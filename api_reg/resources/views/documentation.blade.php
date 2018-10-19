@extends('layouts/blank')

@section('content')
<script src="./app/js/nbc.js"></script>
<style>
.col-sm-4 {
    width: 33.33333333%;
    background: white;
    border: 1px solid;
    border-radius: 15px;
    padding: 5px;
    margin: 5px;
}
.plan-feature ul li{
  list-type-style:none !important;
}
.tile_count .tile_stats_count{
  background:white;
  white-space:normal !important;  
  overflow:visible;
  border: 1px solid #D9DEE4;
}
</style>
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div xclass="x_panel">
                  <div class="x_title ">
                    <h1>API List of Keys</h1>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="pull-right">
                  @if(Auth::user()->isAdmin())
                          <a class="btn btn-default " style=" border-radius:5px" href="#" role="button">Create New API</a>
                                        
                          
                          @endif
                  </div>
                  <div xclass="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <div id="loading"></div>
                     click to see example of a request and response                   </p>
                    <!-- Main  for a primary marketing message or call to action -->
                   

                    </div>
                <div class="container">
                    <div >
                          <div class="row tile_count" id="tile" >
                         
                            @foreach ($docs as $doc)
                            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                          <span class="count_top"><h2>{{$doc->title}}</h2></span>
                                          <div class="count_top">{{$doc->description}}</div> 
                                          
                                          <a class="badge badge-primary"   href="{{route('show-doc',$doc->title)}}"  > more <i class="fa fa-plus"></i></a>
                                        
                                        @if(Auth::user()->isAdmin())
                                          <a class="badge badge-secondary"  href="{{route('edit-doc',$doc->title)}}"  > edit <i class="fa fa-pencil"></i></a>
                                          
                                          @endif
                                        </div>
                              
                                @endforeach
                                </div>
                          </div> 
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="ModalLabel">New Project</h3>
                <div class="message" id="message"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <form id="theForm" action="{{route('create_keys')}}" method="post">
            <div xclass="modal-body">

                <div class="col-xs-12 col-sm-6">
                 
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                         
                        <div class="form-group">
                          <label for="title">Project Title</label>
                          <input type="text" name="title" id="title" value="" required class="form-control" />
                        </div>
                        <div class="form-group">
                          <label for="utility_ref">Pass Pharse <span class="small"></span></label>
                          <input type="password" name="passphrase" id="passphrase" value="" required class="form-control"  />
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="accountNo" id="accountNo" value="{{Auth::user()->accountNo}}" class="form-control"  />
                        </div>
                      
               

              </div>
                
            </div>
            <div class="modal-footer">               
                <input type="submit" class="btn btn-primary" id="save" value="Save" name="submit"> 
                <!--<button type="button" class="btn btn-warning" id="download" value="download" name="download">Download</button>-->
                <button type="button" class="btn btn-secondary" id="createKeys" value="createKeys" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
  </div>
 
  <!-- end modal-->

@stop