<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_form.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 @error('adresse') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_form.address_full') }}</strong>
            {!! Form::text('adresse', (isset($fiche->adresse))? $fiche->adresse:'', array('class' => 'form-control','id'=>'googleAutoComplete','placeholder' => __('fiches_form.address_placeholder'))) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 @error('numero_civic') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_form.civic_number') }}</strong>
            {!! Form::text('numero_civic', null, array('class' => 'form-control', 'id'=>'street_number')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_form.apartment') }}</strong>
            {!! Form::text('appartement', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 @error('rue') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_form.street') }}</strong>
            {!! Form::text('rue', null, array('class' => 'form-control', 'id'=>'route')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 @error('ville') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_form.city') }}</strong>
            {!! Form::text('ville', (isset($fiche->ville))? $fiche->ville:'', array('class' => 'form-control','id'=>'locality')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 @error('province') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_form.province') }}</strong>
            {!! Form::text('province', (isset($fiche->province))? $fiche->province:'', array('class' => 'form-control','id'=>'administrative_area_level_1')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 @error('code_postal') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_form.postal_code') }}</strong>
            {!! Form::text('code_postal', (isset($fiche->code_postal))? $fiche->code_postal:'', array('class' => 'form-control','id'=>'postal_code')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>{{ __('fiches_form.map') }}</strong>
            <img id="imgMap" class="googleImg" style="max-width:100%;" src="{{  (isset($fiche->map))? $fiche->map:'' }}">
            <div id="liveMap" class="googleLive" style="width:100%;height:317px;"></div>
            {!! Form::hidden('map_lat', (isset($fiche->map_lat))? $fiche->map_lat:'', array('class' => 'hidden','id'=>'map_lat')) !!}
            {!! Form::hidden('map_lng', (isset($fiche->map_lng))? $fiche->map_lng:'', array('class' => 'hidden','id'=>'map_lng')) !!}
            {!! Form::hidden('map_zoom', (isset($fiche->map_zoom))? $fiche->map_zoom:'', array('class' => 'hidden','id'=>'map_zoom')) !!}
            @if(isset($fiche)) <a href="#" class="btn btn-info mt-3" id="editLiveMap">{{ __('fiches_subtabs.edit_map') }}</a> @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>{{ __('fiches_form.photo') }}</strong>
            {!! Form::hidden('update_streetView', (!isset($fiche))?1:null , array('class' => 'hidden','id'=>'update_streetView')) !!}
            <div id="frameStreet" style="height:317px;overflow:hidden;display:flex;align-items:center;background-position:center;background-size:cover;">
                <!--<img id="imgStreet" class="googleImg" style="max-width:100%;" src="{{ (isset($fiche->streetView))? $fiche->streetView:''}}">-->
                <img id="imgStreet" class="googleImg" style="max-width:100%;" src="{{ (isset($fiche->streetView)) ? $fiche->streetView . '?v=' . time() : '' }}">
            </div>
            <div id="liveStreet" class="googleLive" style="width:100%;height:317px;"></div>
            {!! Form::hidden('street_lat', (isset($fiche->street_lat))? $fiche->street_lat:'', array('class' => 'hidden','id'=>'street_lat')) !!}
            {!! Form::hidden('street_lng', (isset($fiche->street_lng))? $fiche->street_lng:'', array('class' => 'hidden','id'=>'street_lng')) !!}
            {!! Form::hidden('street_heading', (isset($fiche->street_heading))? $fiche->street_heading:'', array('class' => 'hidden','id'=>'street_heading')) !!}
            {!! Form::hidden('street_pitch', (isset($fiche->street_pitch))? $fiche->street_pitch:'', array('class' => 'hidden','id'=>'street_pitch')) !!}
            {!! Form::hidden('street_zoom', (isset($fiche->street_zoom))? $fiche->street_zoom:'', array('class' => 'hidden','id'=>'street_zoom')) !!}

            @if(isset($fiche)) <a href="#" class="btn btn-info float-left  mt-3" id="editLiveStreet">{{ __('fiches_subtabs.edit_via_streetview') }}</a>@endif


            <label for='photo_custom' id="photo_custom_btn" class="btn btn-info float-right  mt-3">{{ __('fiches_subtabs.upload_image') }}</label>
            {!! Form::file('photo_custom', array('class' => 'form-control d-none','id'=>'photo_custom')) !!}

        </div>
    </div>
</div>