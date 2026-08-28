<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h1>{{ __('fiches_delete.warning_title') }}</h1>
            <p>{{ __('fiches_delete.annex_warning_text') }}</p>
            <p><b>{{ __('fiches_delete.irreversible') }}</b></p>
            {!! Form::open(['method' => 'DELETE','route' => ['fiches.annexe.delete',$ficheMaster->id, $annexe->id],'style'=>'display:inline']) !!}
            {!! Form::submit(__('fiches_delete.annex_confirm_button'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>