@extends('layouts.app')

@section('content')
<div class="row align-items-center mb-3">
    <!-- Titre -->
    <div class="col-md-4">
        <h2>{{ __('fiches.your_fiches') }}</h2>
    </div>
    
    <!-- Barre de recherche -->
    <div class="col-md-4 text-center">
        <form action="{{ route('user.dashboard') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="{{ __('fiches.search_placeholder') }}" value="{{ request('search') }}">
            <button type="submit" class="btn ms-2">
                <img src="{{ asset('images/search.svg') }}" alt="Rechercher" style="width: 30px; height: 30px;margin-top:-8px;">
            </button>
        </form>
    </div>
    
    <!-- Boutons align avec gap -->
    
    <div class="col-md-4 d-flex justify-content-end">
    <a class="btn btn-success" href="{{ route('user.dashboard') }}">{{ __('fiches.see_all') }}</a>
    <div style="width: 10px;"></div>
    <a class="btn btn-success" href="{{ route('fiches.create') }}">{{ __('fiches.add') }}</a>
</div>
    
</div>

@include('share.messages')

@foreach ($fiches as $fiche)
<div class="row no-gutters list-proprietes mb-2">
    <div class="col-2">
        <img id="imgStreet" class="googleImg" style="max-width:150px" src="{{ $fiche->streetView ?? '' }}">
    </div>
    <div class="col-8 d-flex align-items-center titre">{{ $fiche->adresse }}</div>
    <div class="col-2 d-flex align-items-center justify-content-center">
        <a class="btn btn-info" href="{{ route('fiches.edit',$fiche->id) }}">{{ __('fiches.edit') }}</a>
    </div>
</div>
@endforeach

@endsection
