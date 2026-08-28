<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{!! __('fiches_subtabs.use_avg_price') !!}</strong><br /> <label for="use_moyenne_prix_pi2">{{ __('fiches_subtabs.yes') }}</label>
            {!! Form::checkbox('use_moyenne_prix_pi2', 1 , $fiche->use_moyenne_prix_pi2) !!}
        </div>
    </div>

</div>