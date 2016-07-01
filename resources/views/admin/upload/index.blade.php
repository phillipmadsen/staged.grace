@extends('backend/layout/clip')

@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">

            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                @foreach ($breadcrumbs as $path => $disp)
                <li><a href="/admin/upload?folder={{ $path }}">{{ $disp }}</a></li>
                @endforeach
            <li class="active">{{ $folderName }}</li>
            </ol>
            <div class="page-header">
                    <h1> Media <small> | Uploads</small> </h1>
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


            <div class="space12">
               <div class="btn-group btn-group-lg">
                  <a class="btn btn-default active" href="javascript:;"> Uploads </a>
                  <a class="btn btn-default hidden-xs" data-toggle="modal" data-target="#modal-folder-create"> <i class="fa fa-plus"></i> New Folder </a>
                  <a class="btn btn-default" data-toggle="modal" data-target="#modal-file-upload"> <i class="fa fa-upload"></i> Upload File </a>
               </div>
            </div>


         <div class="row">
            <div class="col-sm-12">
               @include('admin.partials.errors')
               @include('admin.partials.success')
               <table id="uploads-table" class="table table-striped table-bordered">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Size</th>
                        <th data-sortable="false">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     {{-- The Subfolders --}}
                     @foreach ($subfolders as $path => $name)
                     <tr>
                        <td>
                           <a href="{!! url(getLang(). '/admin/upload?folder='.$path) !!}">
                           <i class="fa fa-folder fa-lg fa-fw"></i>
                           {{ $name }}
                           </a>
                        </td>
                        <td>Folder</td>
                        <td>-</td>
                        <td>-</td>
                        <td>
                           <button type="button" class="btn btn-xs btn-danger" onclick="delete_folder('{{ $name }}')">
                           <i class="fa fa-times-circle fa-lg"></i>
                           Delete
                           </button>
                        </td>
                     </tr>
                     @endforeach
                     {{-- The Files --}}
                     @foreach ($files as $file)
                     <tr>
                        <td>
                           <a href="{{ $file['webPath'] }}">
                           @if (is_image($file['mimeType']))
                           <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                           @else
                           <i class="fa fa-file-o fa-lg fa-fw"></i>
                           @endif
                           {{ $file['name'] }}
                           </a>
                        </td>
                        <td>{{ $file['mimeType'] or 'Unknown' }}</td>
                        <td>{{ $file['modified']->format('j-M-y g:ia') }}</td>
                        <td>{{ human_filesize($file['size']) }}</td>
                        <td>
                           <button type="button" class="btn btn-xs btn-danger" onclick="delete_file('{{ $file['name'] }}')">
                           <i class="fa fa-times-circle fa-lg"></i> Delete
                           </button>
                           @if (is_image($file['mimeType']))
                           <button type="button" class="btn btn-xs btn-success" onclick="preview_image('{{ $file['webPath'] }}')">
                           <i class="fa fa-eye fa-lg"></i> Preview
                           </button>
                           @endif
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

@include('admin.upload._modals')

<script>
    // Confirm file delete
    function delete_file(name) {
        $("#delete-file-name1").html(name);
        $("#delete-file-name2").val(name);
        $("#modal-file-delete").modal("show");
    }

    // Confirm folder delete
    function delete_folder(name) {
        $("#delete-folder-name1").html(name);
        $("#delete-folder-name2").val(name);
        $("#modal-folder-delete").modal("show");
    }

    // Preview image
    function preview_image(path) {
        $("#preview-image").attr("src", path);
        $("#modal-image-view").modal("show");
    }

    // Startup code
    $(function () {
        $("#uploads-table").DataTable();
    });
</script>
@endsection
