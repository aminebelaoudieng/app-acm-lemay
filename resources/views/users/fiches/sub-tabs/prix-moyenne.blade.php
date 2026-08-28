<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.sold_properties_average') }}</strong>
            {!! Form::text('moyenne_prix_vendu', (isset($fiche->moyenne_prix_vendu))? $fiche->moyenne_prix_vendu:'', array('class' => 'money form-control')) !!}
        </div>
    </div>

</div>