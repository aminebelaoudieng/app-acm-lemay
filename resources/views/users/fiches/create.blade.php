@extends('layouts.app')

@push('footer-scripts')
<script type="text/javascript">
var gmap_key = "{{ env('GMAP_KEY') }}";
var map_lat = null;
var map_lng = null;
var map_zoom = null;
var street_lat = null;
var street_lng = null;
var street_heading = null;
var street_pitch = null;
var street_zoom = null;
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GMAP_KEY') }}&libraries=places&language=fr"></script>


<script>
    function initAutocomplete() {
        const input = document.getElementById('googleAutoComplete');
        const autocomplete = new google.maps.places.Autocomplete(input, {
            types: ['geocode'],
            componentRestrictions: { country: 'ca' }
        });

        autocomplete.setFields(['address_component', 'geometry']);

        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();

            // Coordonnées GPS
            if (place.geometry) {
                document.getElementById('map_lat').value = place.geometry.location.lat();
                document.getElementById('map_lng').value = place.geometry.location.lng();
                document.getElementById('street_lat').value = place.geometry.location.lat();
                document.getElementById('street_lng').value = place.geometry.location.lng();
                document.getElementById('map_zoom').value = 14;
                document.getElementById('street_zoom').value = 1;
                document.getElementById('street_heading').value = 0;
                document.getElementById('street_pitch').value = 0;
            }

            // Remplir les champs selon les composants d'adresse
            const components = {
                street_number: 'street_number',
                route: 'route',
                locality: 'locality',
                administrative_area_level_1: 'administrative_area_level_1',
                postal_code: 'postal_code'
            };

            for (const component in components) {
                const field = document.getElementById(components[component]);
                if (field) field.value = '';
            }

            place.address_components.forEach(function (component) {
                const types = component.types;
                for (const type in components) {
                    if (types.indexOf(type) > -1) {
                        const field = document.getElementById(components[type]);
                        if (field) field.value = component.long_name;
                    }
                }
            });
        });
    }

    document.addEventListener("DOMContentLoaded", initAutocomplete);
</script>

@endpush

@section('content')


@include('share.messages')
@include('share.errors')


{!! Form::open(array('route' => 'fiches.store', 'files' => true, 'method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_form.address_full') }}</strong>
            {!! Form::text('adresse', null, array('class' => 'form-control','id'=>'googleAutoComplete','placeholder' => __('fiches_form.address_placeholder'))) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
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



    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_form.street') }}</strong>
            {!! Form::text('rue', null, array('class' => 'form-control', 'id'=>'route')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_form.city') }}</strong>
            {!! Form::text('ville', (isset($fiche->ville))? $fiche->ville:'', array('class' => 'form-control','id'=>'locality')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_form.province') }}</strong>
            {!! Form::text('province', (isset($fiche->province))? $fiche->province:'', array('class' => 'form-control','id'=>'administrative_area_level_1')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_form.postal_code') }}</strong>
            {!! Form::text('code_postal', (isset($fiche->code_postal))? $fiche->code_postal:'', array('class' => 'form-control','id'=>'postal_code')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_form.category') }}</strong>
            <select name="categorie" class="form-control">
                @foreach(Config::get('datas.categories') as $cat)
                    <option value="{{ $cat['key'] }}">{{ __('datas.categories.' . $cat['key']) }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>{{ __('fiches_form.map') }}</strong>
            <img id="imgMap" class="googleImg" style="max-width:100%;">
            <div id="liveMap" class="googleLive" style="width:100%;height:437px;"></div>
            {!! Form::hidden('map_lat',null, array('class' => 'hidden','id'=>'map_lat')) !!}
            {!! Form::hidden('map_lng', null, array('class' => 'hidden','id'=>'map_lng')) !!}
            {!! Form::hidden('map_zoom', null, array('class' => 'hidden','id'=>'map_zoom')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>{{ __('fiches_form.photo') }}</strong>
            {!! Form::hidden('update_streetView', (!isset($fiche))?1:null , array('class' => 'hidden','id'=>'update_streetView')) !!}
            <img id="imgStreet" class="googleImg" style="max-width:100%;">
            <div id="liveStreet" class="googleLive" style="width:100%;height:437px;"></div>
            {!! Form::hidden('street_lat', null, array('class' => 'hidden','id'=>'street_lat')) !!}
            {!! Form::hidden('street_lng', null, array('class' => 'hidden','id'=>'street_lng')) !!}
            {!! Form::hidden('street_heading', null, array('class' => 'hidden','id'=>'street_heading')) !!}
            {!! Form::hidden('street_pitch', null, array('class' => 'hidden','id'=>'street_pitch')) !!}
            {!! Form::hidden('street_zoom', null, array('class' => 'hidden','id'=>'street_zoom')) !!}

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success float-right">{{ __('fiches_form.save') }}</button>
            </div>
        </div>
        {!! Form::close() !!}

        @endsection