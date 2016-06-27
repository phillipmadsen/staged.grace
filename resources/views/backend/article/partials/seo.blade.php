<div class="tab-pane" id="panel_tab2_seo">


 
                        <div class="row-fluid">
                            <!-- Meta Title Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('meta_title', 'Meta Title:') !!}
                                {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- Meta Keywords Field -->
                            <div class="form-group col-sm-12 col-lg-12 {!! $errors->has('meta_keywords') ? 'has-error' : '' !!}">
                                {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
                                {!! Form::text('meta_keywords', null, ['class' => 'form-control']) !!}
                                @if ($errors->first('meta_keywords'))
                                <span class="help-block">{!! $errors->first('meta_keywords') !!}</span>
                                @endif
                            </div>
                            <!-- Meta Description Field -->
                            <div class="form-group col-sm-12 col-lg-12 {!! $errors->has('meta_description') ? 'has-error' : '' !!}">
                                {!! Form::label('meta_description', 'Meta Description:') !!}
                                {!! Form::textarea('meta_description', null, ['class' => 'form-control']) !!}
                                @if ($errors->first('meta_description'))
                                <span class="help-block">{!! $errors->first('meta_description') !!}</span>
                                @endif
                            </div>
                        </div>



<br style="clear:both" />
    <p> <a href="#panel_tab2_social" class="btn btn-purple show-tab pull_right"> Go to Social </a> </p>
    <br style="clear:both" />
     
</div>