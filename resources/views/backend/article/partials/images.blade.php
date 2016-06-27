<div class="tab-pane" id="panel_tab2_images">

       <div class="form-group">
            <div class="col-sm-12 ">

                 {!! Form::label('image', 'Image Upload:', ['class' => 'control-label']) !!}
                <div class="fileupload fileupload-new  control-group {!! $errors->has('image') ? 'has-error' : '' !!}" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 1140px; height: 600px;">


                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 1140px; max-height: 600px; line-height: 20px;"></div>
                    <div>
                    <br>
                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                            {!! Form::file('image', null, ['class'=>'form-control', 'id' => 'image', 'files'=>true, 'value'=>Input::old('image')]) !!}
                        </span>
                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                            <i class="fa fa-times"></i> Remove
                        </a>
                    </div>
                </div>

            </div>
        </div>

    {!! Form::hidden('path', null, ['class' => 'form-control']) !!}
     {!! Form::hidden('file_size', null, ['class' => 'form-control']) !!}



 <p> <a href="#panel_tab2_seo" class="btn btn-red show-tab pull-right"> Go to SEO </a> </p>
 <br style="clear:both" />
  
</div>