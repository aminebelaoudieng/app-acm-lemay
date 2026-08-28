<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 @error('date') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.analysis_date') }}</strong>
            {!! Form::text('date', (isset($fiche->date))? $fiche->date:'', array('class' => 'datepicker form-control', 'placeholder' => '(ex: 2024-03-15)')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 @error('but') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.analysis_goal') }}</strong>
            {!! Form::text('but', (isset($fiche->but))? $fiche->but:'', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 @error('periode') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.analysis_period') }}</strong>
            {!! Form::number('periode', (isset($fiche->periode))? $fiche->periode:'', array('class' => 'form-control')) !!}
        </div>
    </div>
</div>