<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.image_header') }}</strong>
            <p>{{ __('fiches_subtabs.image_header_desc') }}</p>
            @if($fiche->imageHeaderSrc)
            <img class="image-header" src="{{  $fiche->imageHeaderSrc }}" width="500" />
            <br/><br/>
            @endif
            {!! Form::file('image_header', array('class' => 'form-control','id'=>'image_header')) !!}
        </div>

    </div>
</div>