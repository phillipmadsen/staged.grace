<div class="tab-pane   active" id="panel_tab2_content">
	<div class="row">
		<div class="col-md-12">
			<div class="col-sm-8">
				<!-- Category -->
				<div class="col-md-3 control-group {!! $errors->has('category') ? 'error' : '' !!}">
					<label class="control-label" for="title">Category</label>
					<div class="controls">
						{!! Form::select('category', $categories, null, array('class' => 'form-control', 'value'=>Input::old('category'))) !!}
						@if ($errors->first('category'))
						<span class="help-block">{!! $errors->first('category') !!}</span>
						@endif
					</div>
				</div>
				<!-- Author Id Field -->
				<div class="form-group col-sm-3">
					{!! Form::label('author_id', 'Author:') !!}
					{!! Form::select('user', $users, null, ['class' => 'form-control', 'value'=>Input::old('user')]) !!}
				</div>
				<!-- Published -->
				<!-- 'bootstrap / Toggle Switch is_published Field' -->
				<div class="form-group col-sm-2 {!! $errors->has('is_published') ? 'has-error' : '' !!}">
					{!! Form::label('is_published', 'PUBLISHED:') !!}
					<label class="checkbox-inline">
					{!! Form::checkbox('is_published', 1, true,  ['data-toggle' => 'toggle']) !!}
					</label>
					@if ($errors->first('is_published'))
					<span class="help-block">{!! $errors->first('is_published') !!}</span>
					@endif
				</div>
			</div>
			<!-- Title -->
			<div class="form-group col-md-8 {!! $errors->has('title') ? 'has-error' : '' !!}">
				<label class="control-label" for="title">Title</label>
				<div class="controls">
					{!! Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
					@if ($errors->first('title'))
					<span class="help-block">{!! $errors->first('title') !!}</span>
					@endif
				</div>
			</div>
			<!-- Subtitle Field -->
			<div class="form-group col-md-8">
				{!! Form::label('subtitle', 'Subtitle:') !!}
				{!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
			</div>
			<!-- Excerpt Field -->
			<div class="form-group col-sm-12 col-lg-12">
				{!! Form::label('excerpt', 'Excerpt:') !!}
				{!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '5']) !!}
				<small>this is the short content on listing pages.</small>
			</div>
			<!-- Content Field -->
			<div class="form-group col-sm-12 col-lg-12 {!! $errors->has('content') ? 'has-error' : '' !!}" style="    visibility: visible;">
				{!! Form::label('content', 'Content:') !!}
				{!! Form::textarea('content', null, [ 'class' => 'form-control', 'value'=>Input::old('content'), 'rows' => '30']) !!}
				@if ($errors->first('content'))
				<span class="help-block">{!! $errors->first('content') !!}</span>
				@endif
			</div>
			<div class="col-sm-4 col_last">
				<!-- Tag -->
				<div class="col-md-12 form-group {!! $errors->has('tag') ? 'has-error' : '' !!}">
					{!! Form::label('tag', 'TAGS:') !!}
					{!! Form::text('tag', null, ['class'=>'tags', 'id' => 'tag',  'value'=>Input::old('tag')]) !!}
				</div>
			</div>
		</div>
	</div>
	<br style="clear:both" />
	<p> <a href="#panel_tab2_images" class="btn btn-teal show-tab pull-right"> Go to Images </a> </p>
</div>
<br style="clear:both" />