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
                    <h1>Detailed Documentation</h1>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div xclass="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <div id="loading"></div>
                     click on tabs below to view JSON                   </p>
                    <!-- Main  for a primary marketing message or call to action -->
                   

                    </div>
                        <div class="container">
                        <h1>Edit Document</h1>
    {!! Form::open(['action' => ['DocumentsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
                </div>
                 


@stop
 