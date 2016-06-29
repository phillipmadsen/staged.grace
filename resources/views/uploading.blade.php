@extends('backend.layout.clip')

@section('content')
<br style="clear:both" />
<br style="clear:both" />

<div class="col-md-12">

  @if(Session::has('success'))
    <div class="alert-box success">
      <h2>{!! Session::get('success') !!}</h2>
    </div>
  @endif

  <div class="secure"><h1>Upload form</h1></div>
  {!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true)) !!}
    <div class="control-group">
      	<div class="controls">
      {!! Form::file('images[]', ['multiple'=>true]) !!}
	<p class="errors">{!!$errors->first('images')!!}</p>
	@if(Session::has('error'))
	<p class="errors">{!! Session::get('error') !!}</p>
	@endif
     	</div>
	</div>
{!! Form::submit('Submit', array('class'=>'send-btn')) !!}
{!! Form::close() !!}


</div>



@endsection