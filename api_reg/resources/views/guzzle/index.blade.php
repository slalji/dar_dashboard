@extends('layouts/blank')

@section('content')

<style>

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

</style>
<script>
$( document ).ready(function() {
    $('#nav-home').attr('show',true);
});
</script>
 
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div xclass="x_panel">
                  <div class="x_title ">
                    
                  </div>
                  <div xclass="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <!-- Main  for a primary marketing message or call to action -->
                   

                    </div>
                   
                        <div class="container">
                        <h1>Try HTTP POST {{$post->title}}</h1>
        <form id="theForm" action="{{route('tryit')}}" method="post">              
    
        <div class="form-group row">        
         
        <div class="form-group">
            {{Form::label('response_success', 'JWT Header')}}
            {{ Form::textarea('request_header', null, ['placeholder' => 'Request Header', 'class' => 'form-control' , 'cols' => 20, 'rows' =>2, 'required' => '', 'maxlength' => "400"]) }} 
        </div>
        <div class="form-group">
            {{Form::label('request_body', 'Request')}}
            {{ Form::textarea('request_body', $post->request_body, ['placeholder' => 'Request Body', 'class' => 'form-control' , 'cols' => 20, 'rows' =>10, 'required' => '', 'maxlength' => "400"]) }} 
        </div>
        <div class="form-group">
            {{Form::label('request_result', 'Request')}}
            {{ Form::textarea('request_result', null, ['placeholder' => 'Request Result', 'class' => 'form-control' , 'cols' => 20, 'rows' =>10,  'maxlength' => "400"]) }} 
        </div>
        
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" id="save" value="Submit" name="submit"> 
                <button type="button" class="btn btn-secondary" id="home" value="home" data-dismiss="modal">Cancel</button>

        </form>
          
                </div>
                 
 <!-- myModal -->
 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="myModalLabel">Edit Parmaters</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span>
      <form id="theForm" action="{{route('update-params',$post->id)}}" method="post">    
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Datatype</th>
                    <th scope="col">Required</th>
                    <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                 
               
               
                </tbody>
            </table>
        </span> 
      </div>
      <div class="modal-footer">
     
                    
      {{ csrf_field() }}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update">
        </form>
      </div>
    </div>
  </div>
</div>
     
   
 
  <!-- end modal-->
  <!-- add Modal -->
 
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="addModalLabel">Add New Parmater</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span>
      <form id="theForm" action="{{route('add-params',$post->id)}}" method="post">    
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Datatype</th>
                    <th scope="col">Required</th>
                    <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                 
                
                    
               
                </tbody>
            </table>
        </span> 
      </div>
      <div class="modal-footer">
     
                    
      {{ csrf_field() }}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Add">
        </form>
      </div>
    </div>
  </div>
</div>
     
   
 
  <!-- end modal-->

@stop
 