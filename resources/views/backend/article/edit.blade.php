@extends('backend/layout/forms')

@section('topscripts')



<script type="text/javascript">
     $(document).ready(function () {
        $("#title").slug();
        if ($('#tag').length != 0) {
            var elt = $('#tag');
            elt.tagsinput();
        }
    });
</script>

@endsection

@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">
            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
         <li><a href="{!! url(getLang() . '/admin/article') !!}"><i class="fa fa-book"></i> Article</a></li>
        <li class="active">Update Article</li>
            </ol>
            <div class="page-header">
                     <h1> Article <small> | Update Article</small> </h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
@endsection

@section('content')
<div class="row">
        <div class="col-sm-12">
        <!-- start: PANLEL TABS -->
            <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-reorder"></i>
                Panel Tabs
                </div>
                <div class="panel-body">
                
                
                
{!! Form::open( array( 'route' => array(getLang(). '.admin.article.update', $article->id), 'method' => 'PATCH', 'files'=>true)) !!} 
<div class="tabbable">
    <ul id="myTab" class="nav nav-tabs tab-bricky">
        <li class="active"> <a href="#panel_tab2_content" data-toggle="tab"> <i class="green fa fa-home"></i> Content </a> </li>
        <li> <a href="#panel_tab2_images" data-toggle="tab"> IMAGES <span class="badge badge-danger">4</span> </a> </li>
        <li> <a href="#panel_tab2_seo" data-toggle="tab"> SEO <span class="badge badge-danger">4</span> </a> </li>
        <li> <a href="#panel_tab2_social" data-toggle="tab"> SOCIAL <span class="badge badge-danger">4</span> </a> </li>
        <li> <a href="#panel_tab2_links" data-toggle="tab"> LINKS <span class="badge badge-danger">4</span> </a> </li>
    </ul>
    <div class="tab-content">
    
    <!-- Title -->
    <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
        <label class="control-label" for="title">Title</label>

        <div class="controls">
            {!! Form::text('title', $article->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
            @if ($errors->first('title'))
            <span class="help-block">{!! $errors->first('title') !!}</span>
            @endif
        </div>
    </div>
    
    
    
    
    
    
{{--         @include('backend.article.partials.content')
        @include('backend.article.partials.images')
        @include('backend.article.partials.seo')
        @include('backend.article.partials.social')
        @include('backend.article.partials.links') --}}
    </div>
</div>
                
                
                
                
                
                
                
                
           
                <!-- end: PANLEL TABS -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('bottomscripts')
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
            <script>
        onload = function () {
            CKEDITOR.replace('content', {
                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
            });
        };
    </script>
@endsection

@section('clipinline')
{{-- TableData.init(); --}}
@endsection
