@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

@include('share.messages')
@include('share.errors')

{!! Form::open(array( 'files' => true,'route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prénom et nom:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Nom complet','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>

    @include('profile.plugins.photo')

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Téléphone:</strong>
            {!! Form::text('telephone', null, array('placeholder' => 'Téléphone','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Adresse:</strong>
            {!! Form::text('adresse', null, array('placeholder' => 'Adresse','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ville:</strong>
            {!! Form::text('ville', null, array('placeholder' => 'Ville','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Province:</strong>
            {!! Form::text('province', null, array('placeholder' => 'province','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code Postal:</strong>
            {!! Form::text('code_postal', null, array('placeholder' => 'Code Postal','class' => 'form-control')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Site web:</strong>
            {!! Form::text('siteweb', null, array('placeholder' => 'Site web','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Poste:</strong>
            {!! Form::text('poste', null, array('placeholder' => 'Poste','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Compagnie:</strong>
            {!! Form::text('compagnie', null, array('placeholder' => 'Compagnie','class' => 'form-control')) !!}
        </div>
    </div>
    @include('profile.plugins.image_header')
    @include('profile.plugins.logo_header')
    @include('profile.plugins.logo_footer')
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Couleur:</strong>
            {!! Form::text('color', null, array('placeholder' => 'Couleur','class' => 'form-control','id' => 'color-picker')) !!}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Design sans plus:</strong>
            {!! Form::checkbox('design_sans_plus', true, false) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Slogan:</strong>
            {!! Form::text('slogan', null, array('placeholder' => 'slogan','class' => 'form-control')) !!}
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:{{ old('slogan')}}</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Admin:</strong>
                {!! Form::checkbox('is_admin', true, false) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}



    @endsection