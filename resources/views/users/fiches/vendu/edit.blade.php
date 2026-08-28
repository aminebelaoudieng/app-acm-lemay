@extends('layouts.app')

@push('footer-scripts')
<script type="text/javascript">
    var gmap_key = "{{ env('GMAP_KEY') }}";
    /* beautify preserve:start */
    var map_lat = {{ $fiche->map_lat }};
    var map_lng = {{ $fiche->map_lng }};
    var map_zoom = {{ $fiche->map_zoom }};
    var street_lat = {{ $fiche->street_lat }};
    var street_lng = {{ $fiche->street_lng }};
    var street_heading = {{ $fiche->street_heading }};
    var street_pitch = {{ $fiche->street_pitch }};
    var street_zoom = {{ $fiche->street_zoom }};
    /* beautify preserve:end */
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GMAP_KEY') }}&libraries=places&language=fr"></script>
<script src="{{ asset('js/google-autocomplete.js') }}"></script>
@endpush

@section('content')
<div class="row mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex">
            <a class="btn btn-primary mr-3" href="{{ route('fiches.edit',$ficheMaster->id).'#vigueur' }}">{{ __('profile.back') }}</a>
            <h2 class="mb-0">{{ $ficheMaster->adresse }}</h2>
        </div>
    </div>
</div>


@include('share.messages')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="home-tab" href="{{ route('fiches.edit',$ficheMaster->id) }}">{{ __('fiches_form.main_subject') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ route('fiches.edit',$ficheMaster->id) }}#vigueur">{{ __('fiches_form.current_properties') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" id="vendu-tab" href="{{ route('fiches.edit',$ficheMaster->id) }}#vendu">{{ __('fiches_form.sold_properties') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="annexe-tab" href="{{ route('fiches.edit',$ficheMaster->id) }}#annexe">{{ __('fiches_form.annexes') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger" id="delete-tab" href="{{ route('fiches.edit',$ficheMaster->id) }}#delete">{{ __('fiches_form.delete') }}</a>
    </li>
</ul>
<div class="tab-content p-5" id="mainContent">

    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
        {!! Form::model($fiche, ['method' => 'PATCH', 'files' => true, 'route' => ['fiches.vendu.update',$ficheMaster->id, $fiche->id]]) !!}
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-adresse-tab" data-toggle="pill" href="#v-pills-adresse" role="tab" aria-controls="v-pills-adresse" aria-selected="false">{{ __('fiches_subtabs.address') }}</a>
                    <a class="nav-link" id="v-pills-prixdate-tab" data-toggle="pill" href="#v-pills-prixdate" role="tab" aria-controls="v-pills-prixdate" aria-selected="false">{{ __('fiches_subtabs.price_and_date') }}</a>
                    <a class="nav-link" id="v-pills-caracteristiques-tab" data-toggle="pill" href="#v-pills-caracteristiques" role="tab" aria-controls="v-pills-caracteristiques" aria-selected="false">Caractéristiques</a>
                    <a class="nav-link text-danger" id="v-pills-delete-tab" data-toggle="pill" href="#v-pills-delete" role="tab" aria-controls="v-pills-delete" aria-selected="false">Supprimer</a>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="tab-content" id="v-pills-tabContent">
                    @include('share.errors')
                    <h2>Modifier une propriété vendue</h2>
                    <div class="tab-pane fade show active" id="v-pills-adresse" role="tabpanel" aria-labelledby="v-pills-adresse-tab">
                        @include('users.fiches.sub-tabs.adresse',['fiche'=>$fiche])
                    </div>
                    <div class="tab-pane fade" id="v-pills-prixdate" role="tabpanel" aria-labelledby="v-pills-prixdate-tab">
                        @include('users.fiches.sub-tabs.prix-date-vendu',['fiche'=>$fiche])
                    </div>
                    <div class="tab-pane fade" id="v-pills-caracteristiques" role="tabpanel" aria-labelledby="v-pills-caracteristiques-tab">
                        @include('users.fiches.sub-tabs.caracteristiques',['fiche'=>$fiche])
                    </div>
                    {!! Form::close() !!}
                    <div class="tab-pane fade" id="v-pills-delete" role="tabpanel" aria-labelledby="v-pills-delete-tab">
                        @include('users.fiches.vendu.delete',['fiche'=>$fiche])
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>


</div>


@endsection