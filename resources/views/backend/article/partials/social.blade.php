<div class="tab-pane" id="panel_tab2_social">
	<div class="row-fluid">
        <!-- Fb Title Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('fb_title', 'Facebook Title:') !!}
            {!! Form::text('fb_title', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Gp Title Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('gp_title', 'Google Plus Title:') !!}
            {!! Form::text('gp_title', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group col-sm-8">
            {!! Form::label('twitter_title', 'Twitter Title:') !!}
            {!! Form::text('twitter_title', null, ['class' => 'form-control']) !!}
        </div>

</div>
<br style="clear:both" />
<p> <a href="#panel_tab2_links" class="btn btn-purple show-tab pull-right"> Next: Links </a> </p>
<br style="clear:both" />
 
</div>