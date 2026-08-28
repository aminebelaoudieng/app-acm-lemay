@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Supprimer l'utilisateur</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom :</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Courriel:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h4>Êtes vous sur de vouloir supprimer cet utilisateur ainsi que toutes ses fiches ? </h4>
            <h5>Cette action est irréversible.</h5>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 ">
        @if(Auth::user()->id != $user->id)
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Oui, supprimer', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endif
    </div>



</div>
@endsection