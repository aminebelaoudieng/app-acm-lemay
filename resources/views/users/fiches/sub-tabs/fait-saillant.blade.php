<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <b>{{ __('fiches_subtabs.averages_and_value_calculations') }}</b>
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.by_land_sqft_price') }}</strong>
            ({{ __('fiches_subtabs.will_override_auto_calc') }})
            {!! Form::text('prix_au_pied_carre_terrain', (isset($fiche->prix_au_pied_carre_terrain))? $fiche->prix_au_pied_carre_terrain:'', array('class' => 'money form-control')) !!}
        </div>
    </div>

</div>