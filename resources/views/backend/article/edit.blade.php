@extends('backend/layout/forms')

@section('topscripts')
<link rel="stylesheet" href="{!! asset('/clip/assets/bootstrap/css/bootstrap-tagsinput.css') !!}" type="text/css" />
<link rel="stylesheet" href="{!! asset('/clip/jasny-bootstrap/css/jasny-bootstrap.min.css') !!}" type="text/css" />
<script type="text/javascript">
     $(document).ready(function () {
        $("#title").slug();

    });
</script>
@endsection

@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">
            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
                <li><a href="{!! url(getLang() . '/admin/article') !!}"><i class="fa fa-book"></i> Article</a></li>
                <li class="active">Add Article</li>
            </ol>
            <div class="page-header">
            <h1> Article <small> | Add Article</small> </h1>
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
@include('backend.errors.forms')
 
        {!! Form::model($article, ['url' => [getLang().'/admin/articles/update', $article->id], 'method' => 'patch', 'files'=>true]) !!}
<div class="tabbable">
    <ul id="myTab" class="nav nav-tabs tab-bricky">
        <li class="active"> <a href="#panel_tab2_content" data-toggle="tab"> <i class="green fa fa-home"></i> Content </a> </li>
        <li> <a href="#panel_tab2_images" data-toggle="tab"> IMAGES <span class="badge badge-danger">4</span> </a> </li>
        <li> <a href="#panel_tab2_seo" data-toggle="tab"> SEO <span class="badge badge-danger">4</span> </a> </li>
        <li> <a href="#panel_tab2_social" data-toggle="tab"> SOCIAL <span class="badge badge-danger">4</span> </a> </li>
        <li> <a href="#panel_tab2_links" data-toggle="tab"> LINKS <span class="badge badge-danger">4</span> </a> </li>
    </ul>
    <div class="tab-content">
        {{-- @include('backend.article.partials.content') --}}
        @include('backend.article.partials.images')
        @include('backend.article.partials.seo')
        @include('backend.article.partials.social')
        @include('backend.article.partials.links')
    </div>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url(getLang(). '/admin/articles/index') !!}" class="btn btn-default">Cancel</a>
</div>

                {!! Form::close() !!}
                <!-- end: PANLEL TABS -->
            </div>
        </div>
    </div>
    <!-- Submit Field -->

</div>

@endsection

@section('bottomscripts')
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script type="text/javascript" src="{!! asset('/clip/assets/plugins/bootbox/bootbox.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/assets/plugins/jquery-mockjax/jquery.mockjax.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/assets/plugins/select2/select2.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/assets/plugins/DataTables/media/js/jquery.dataTables.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/assets/plugins/DataTables/media/js/DT_bootstrap.js') !!}"></script>
        <script src="{!! asset('/backend/assets/js/table-data.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('jasny-bootstrap/js/jasny-bootstrap.min.js') !!}"></script>
  {{--       <script type="text/javascript" src="{!! asset('ckeditor/ckeditor.js') !!}"></script> --}}
        <script type="text/javascript" src="{!! asset('assets/bootstrap/js/bootstrap-tagsinput.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('assets/js/jquery.slug.js') !!}"></script>
  
           
           
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
       <script type="text/javascript">
        window.onload = function () {
            CKEDITOR.replace('content', {
                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
            });
        };

        $(document).ready(function () {

            if ($('#tag').length != 0) {
                var elt = $('#tag');
                elt.tagsinput();
            }
        });
    </script>
@endsection

@section('clipinline')
 
@endsection
