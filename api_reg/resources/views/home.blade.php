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
}
</style>
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div xclass="x_panel">
                  <div class="x_title ">
                    <h1>Your API Project Key List</h1>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div xclass="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <div id="loading"></div>
                      To connect to Selcom API Gateway, you will require URL Key which you add to the URL, for example, <span class="label" style="background:white; color:#1ABB9C"> http://api.selcom.net?key=wr8werRd</span> and a pass pharse to sign payload for each API request. Pass Pharse will be hashed and displayed. Use this hash create JWT bearer token. Please review <a href="#" class="label" style="background:white; color:#1ABB9C"> <i class="fa fa-file"></i> documentation on generating bearer token</a>
                      You can create API Keys by clicking on Create New Key Set and enter a project title and the pass pharse. Note this pass pharse hashed using HS256 before it is saved.
                   </p>
                    <!-- Main  for a primary marketing message or call to action -->
                   

                    </div>
                        <div class="container">
                          <div class="pricing-table pricing-three-column row">
                          <div class="row tile_count" id="tile">
                      @foreach ($projects as $project)
                      <div class="col-md-12 col-sm-12 col-xs-6 tile_stats_count">
                                    <span class="count_top"><i class="fa fa"></i><h2>  {{$project->title}}</h2></span>
                                    <div class="count_bottom">URL Key <i class="fa fa-key" style="color:"> {{$project->request_id}}</i></div>
                                    <span class="count_bottom" >Signing Hash<i class="green"> {{$project->secret_hash}}</i></span>
                                  
                                  </div>
                        
                          @endforeach
                          </div>
                      </div> 
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Create New Key Set</button>
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