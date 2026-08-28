@extends('layouts.app')

@push('footer-scripts')
<script type="text/javascript">
    var userColor = "{{ $user->color}}";
</script>
@endpush


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-5">
        <div class="pull-left">

            <a class="btn btn-outline-secondary" href="{{ route('user.dashboard') }}">{{ __('profile.back') }}</a>
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
    <strong>{{ __('profile.whoops') }}</strong> {{ __('profile.problems_input') }}<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{!! Form::model($user, ['files' => true, 'method' => 'PATCH','route' => ['profile.update', $user->id]]) !!}
<div class="row">
    @if(!$user->is_admin) <div class="col-md-6 col-12 no-gutters"> @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.email') }}</strong>
                {!! Form::text('email', null, array('placeholder' => __('profile.email_placeholder'),'class' => 'form-control')) !!}
            </div>
        </div>

        @if(!$user->is_admin)

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.telephone') }}</strong>
                {!! Form::text('telephone', null, array('placeholder' => __('profile.telephone_placeholder'),'class' => 'tel form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.adresse') }}</strong>
                {!! Form::text('adresse', null, array('placeholder' => __('profile.adresse_placeholder'),'class' => 'form-control')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.ville') }}</strong>
                {!! Form::text('ville', (isset($user->ville))? $user->ville:'', array('placeholder' => __('profile.ville_placeholder'),'class' => 'form-control','id'=>'locality')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.province') }}</strong>
                {!! Form::text('province', (isset($user->province))? $user->province:'', array('placeholder' => __('profile.province_placeholder'),'class' => 'form-control','id'=>'administrative_area_level_1')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.code_postal') }}</strong>
                {!! Form::text('code_postal', (isset($user->code_postal))? $user->code_postal:'', array('placeholder' => __('profile.code_postal_placeholder'),'class' => 'form-control','id'=>'postal_code')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.siteweb') }}</strong>
                {!! Form::text('siteweb', null, array('placeholder' => __('profile.siteweb_placeholder'),'class' => 'form-control')) !!}
            </div>
        </div>
        @if(app()->getLocale() == 'fr')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.poste') }}</strong>
                {!! Form::text('poste', null, array('placeholder' => __('profile.poste_placeholder'),'class' => 'form-control')) !!}
            </div>
        </div>
        @else
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.poste') }}</strong>
                {!! Form::text('poste_en', null, array('placeholder' => __('profile.poste_placeholder'),'class' => 'form-control')) !!}
            </div>
        </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.compagnie') }}</strong>
                {!! Form::text('compagnie', null, array('placeholder' => __('profile.compagnie_placeholder'),'class' => 'form-control')) !!}
            </div>
        </div>
        @include('profile.plugins.image_header')
        @include('profile.plugins.logo_header')
        @include('profile.plugins.logo_footer')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.color') }}</strong>
                {!! Form::text('color', null, array('placeholder' => __('profile.color_placeholder'),'class' => 'form-control','id' => 'color-picker')) !!}

            </div>
        </div>

        @if(app()->getLocale() == 'fr')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.slogan') }}</strong>
                {!! Form::text('slogan', null, array('placeholder' => __('profile.slogan_placeholder'),'class' => 'form-control')) !!}
            </div>
        </div>
        @else
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('profile.slogan') }}</strong>
                {!! Form::text('slogan_en', null, array('placeholder' => __('profile.slogan_placeholder'),'class' => 'form-control')) !!}
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-6 col-12 mt-4 no-gutters">
        @include('profile.plugins.photo')
    </div>
    @endif

    @if(!$user->is_admin)
</div> @endif
<div class="col-xs-12 col-sm-12 col-md-12 mt-4">
    <div class="form-group">
        <p>{{ __('profile.password_info') }}</p>
        <strong>{{ __('profile.current_password') }}</strong>
        {!! Form::password('current_password', array('placeholder' => __('profile.current_password_placeholder'),'class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>{{ __('profile.new_password') }}</strong>
        {!! Form::password('password', array('placeholder' => __('profile.new_password_placeholder'),'class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>{{ __('profile.confirm_password') }}</strong>
        {!! Form::password('confirm-password', array('placeholder' => __('profile.confirm_password_placeholder'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-success">{{ __('profile.save') }}</button>
</div>
</>
{!! Form::close() !!}



@endsection