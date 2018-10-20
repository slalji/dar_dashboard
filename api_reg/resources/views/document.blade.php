@extends('layouts/blank')

@section('content')

<style>
/*.col-sm-4 {
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
}*/
#tabs{
	xbackground: #D9DEE4;
    color: #73879C;
}
#tabs h6.section-title{
    color: #73879C;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #73879C;
    background-color: transparent;
    border-color: transparent transparent #73879C;
    border-bottom: 4px solid !important;
    font-size: 20px;
    font-weight: bold;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #73879C;
    font-size: 20px;
}
.tab-pane{
    padding:10px;
    min-height:200px
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    xborder: 0px solid #2a40543d; 
    border-left: solid 1px #2a40543d!important;
    border-top: solid #2a40543d 1px !important;
}
</style>
<script>
$( document ).ready(function() {
    $('.nav-tabs a[href="#nav-profile"]').tab('show');
    $('.nav-tabs a[href="#nav-desc"]').tab('show');
});
</script>
   @foreach ($posts as $post)
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div xclass="x_panel">
                  <div class="x_title ">
                    <h1>Detailed Documentation</h1>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div xclass="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <div id="loading"></div>
                     click on tabs below to view JSON
                                       
                                                         
                    <!-- Main  for a primary marketing message or call to action -->
                   

                    </div>
                        <div class="container">
                        <section id="tabs">
                       
	 
      
    <div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">{{$post->title}}  @if(Auth::user()->isAdmin())
                                          <a class="badge badge-secondary"  href="{{route('edit-doc',$post->title)}}"  > Edit <i class="fa fa-pencil"></i></a>
                                          
                                          @endif  </h3>					 
				</div>
				<div class="panel-body">
                <nav>
					<ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						  <li><a class="nav-item nav-link" id="nav-desc-tab" data-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-contact" aria-selected="false">Description</a></li>
						<li><a class="nav-item nav-link" id="nav-params-tab" data-toggle="tab" href="#nav-params" role="tab" aria-controls="nav-about" aria-selected="false">Required</a></li>
					</ul>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					
					 <div class="tab-pane fade" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                         <span xstyle=color:darkgreen>{{$post->description}}</span> 
                    </div>
					<div class="tab-pane fade" id="nav-params" role="tabpanel" aria-labelledby="nav-params-tab">
                         <span xstyle=color:darkred>{{$post->required}}</span> 
                    </div>
				</div>    
				</nav>

                </div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Request Response JSON Payload <a class="btn btn-primary"   href="{{route('show-doc',$post->title)}}"  > Try It <i class="fa fa-plus"></i></a></h3> 				 
				</div>
				<div class="panel-body">
                <div class="row">
			<div class="col-xs-12 ">
				<nav>
					<ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						 <li><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Request</a></li>
						<li><a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Response Success</a></li>
						<li><a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Response Error</a></li>
                         
                    </ul>
                     
				</nav>
               
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <pre><code>{{$post->request_body}}</code></pre>
                    </div>
					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <pre><code><span style=color:darkgreen>{{$post->response_success}}</span></code></pre>
                    </div>
					<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        <pre><code><span style=color:darkred>{{$post->response_error}}</span></code></pre>
                    </div>
				</div>
                @endforeach
			</div>
	</div>
                </div><!--end of col-8-->
	</div><!--end row-->
	</div>
 
</section>
                          
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