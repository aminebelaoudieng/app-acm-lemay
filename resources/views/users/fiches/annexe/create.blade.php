@extends('layouts.app')


@section('content')
<div class="row mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex">
            <a class="btn btn-primary mr-3" href="{{ route('fiches.edit',$ficheMaster->id).'#vigueur' }}">Retour</a>
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
        <a class="nav-link" href="{{ route('fiches.edit',$ficheMaster->id) }}#vigueur">{{ __('fiches_form.current_properties') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " id="vendu-tab" href="{{ route('fiches.edit',$ficheMaster->id) }}#vendu">{{ __('fiches_form.sold_properties') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active " id="annexes-tab" href="{{ route('fiches.edit',$ficheMaster->id) }}#annexe">{{ __('fiches_form.annexes') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger" id="delete-tab" href="{{ route('fiches.edit',$ficheMaster->id) }}#delete">{{ __('fiches_form.delete') }}</a>
    </li>
</ul>
<div class="tab-content p-5" id="mainContent">

    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
    {!! Form::model(null, ['files'=>true, 'method' => 'POST','route' => ['fiches.annexe.store',$ficheMaster->id], 'id' => 'annexeForm']) !!}
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-fichier-tab" data-toggle="pill" href="#v-pills-fichier" role="tab" aria-controls="v-pills-fichier" aria-selected="false">{{ __('fiches_subtabs.file') }}</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="tab-content" id="v-pills-tabContent">
                    @include('share.errors')
                    <h2>{{ __('fiches_form.add_annex') }}</h2>
                    <div class="tab-pane fade show active" id="v-pills-fichier" role="tabpanel" aria-labelledby="v-pills-fichier-tab">
                        @include('users.fiches.sub-tabs.annexe',['annexe'=>null])
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>


</div>


@endsection