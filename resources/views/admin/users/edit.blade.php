@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


{!! Form::model($user, [ 'files' => true,'method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prénom et nom:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
            {!! Form::checkbox('design_sans_plus', 1 , $user->design_sans_plus ) !!}
        </div>
    </div>

    <!-- 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Logo:</strong>
            {!! Form::text('logo', null, array('placeholder' => 'logo','class' => 'form-control')) !!}
        </div>
    </div> -->

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Slogan:</strong>
            {!! Form::text('slogan', null, array('placeholder' => 'slogan','class' => 'form-control')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
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
            <strong>Compte administrateur:</strong>
            {!! Form::checkbox('is_admin', 1 , $user->is_admin ) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}



@endsection