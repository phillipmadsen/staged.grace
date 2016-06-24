@extends('backend/layout/clip')

@section('topscripts')
 <script type="text/javascript">
        $(document).ready(function () {

            $('#notification').show().delay(4000).fadeOut(700);

            // publish settings
            $(".publish").bind("click", function (e) {
                var id = $(this).attr('id');
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{!! url(getLang() . '/admin/article/" + id + "/toggle-publish/') !!}",
                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    },
                    success: function (response) {
                        if (response['result'] == 'success') {
                            var imagePath = (response['changed'] == 1) ? "{!!url('/')!!}/assets/images/publish.png" : "{!!url('/')!!}/assets/images/not_publish.png";
                            $("#publish-image-" + id).attr('src', imagePath);
                        }
                    },
                    error: function () {
                        alert("error");
                    }
                })
            });
        });
    </script>
@endsection

@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">

            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Article</li>
            </ol>
            <div class="page-header">
                    <h1> Articles <small> | Control Panel</small> </h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
@endsection

@section('content')


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="clip-stats"></i>
                                    Panel Data
                                    <div class="panel-tools">
                                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                                        <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                                        <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                                    </div>
                                </div>
                                <div class="panel-body">



            @include('flash::message')
<div class="space12">
    <div class="btn-group btn-group-lg">
        <a class="btn btn-default active" href="javascript:;">
            Articles
        </a>
        <a class="btn btn-default hidden-xs" href="{!! langRoute('admin.article.create') !!}">
         <i class="fa fa-plus"></i>   Add Article
        </a>
        <a class="btn btn-default" href="{!! langRoute('admin.category.create') !!}">
            Add Category
        </a>

    </div>
</div>

            @if($articles->count())
                <div class="">
                    <table class="table table-striped table-bordered table-hover table-full-width">
                        <thead>
                        <tr>
                            <th>Title</th>
                            {{-- <th>Created Date</th> --}}
                            <th>Updated Date</th>
                            <th>Action</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $articles as $article )
                            <tr>
                                <td>
                                    <a href="{!! langRoute('admin.article.edit', array($article->id)) !!}" class="btn btn-link btn-xs">
                                        {!! $article->title !!} </a>
                                </td>
                                {{-- <td>{!! $article->created_at !!}</td> --}}
                                <td>{!! $article->updated_at !!}</td>


                                <td class="center">
                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                        <a href="{!! langRoute('admin.article.edit', array($article->id)) !!}" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i> </a>

                                        <a target="_blank" href="{!! URL::route('dashboard.article.show', ['slug' => $article->slug]) !!}" class="btn btn-xs btn-green tooltips" data-placement="top" data-original-title="Preview"><i class="fa fa-share"></i> </a>

                                        <a target="_blank" href="{!! URL::route('dashboard.article.show', ['slug' => $article->slug]) !!}" class="btn btn-xs btn-red tooltips"  data-placement="top" data-original-title="Preview on Site">
                                                   <i class="fa fa-eye"></i>
                                                </a>

                                        <a href="{!! URL::route('admin.article.delete', array($article->id)) !!}" class="btn btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i> </a>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" id="{!! $article->id !!}" class="publish">
                                        <img id="publish-image-{!! $article->id !!}" src="{!! url('/') !!}/assets/images/{!! ($article->is_published) ? 'publish.png' : 'not_publish.png'  !!}"/>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-danger">No results found</div>
            @endif
        </div>
        <div class="pull-left">
            <ul class="pagination">
                {!! $articles->render() !!}
            </ul>
        </div>




                                </div>
                            </div>
                        </div>

                    </div>







@endsection

@section('bottomscripts')

        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script type="text/javascript" src="{!! asset('/backend/assets/plugins/bootbox/bootbox.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/backend/assets/plugins/jquery-mockjax/jquery.mockjax.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/backend/assets/plugins/select2/select2.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/backend/assets/plugins/DataTables/media/js/jquery.dataTables.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/backend/assets/plugins/DataTables/media/js/DT_bootstrap.js') !!}"></script>
        <script src="{!! asset('/backend/assets/js/table-data.js') !!}"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')

TableData.init();
@endsection