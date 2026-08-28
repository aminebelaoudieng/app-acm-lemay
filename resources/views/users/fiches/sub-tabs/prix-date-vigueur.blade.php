<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 @error('comparable_vigueur_date_vente') is-invalid @enderror is-required ">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.sale_date') }}</strong>
            {!! Form::text('comparable_vigueur_date_vente', (isset($fiche->comparable_vigueur_date_vente))? $fiche->comparable_vigueur_date_vente:'', array('class' => 'datepicker form-control', 'placeholder' => '(ex: 2024-03-15)')) !!}
        </div>
    </div>


    <div class="field-evaluation-municipale col-xs-12 col-sm-12 col-md-12 @error('comparable_vigueur_prix_evaluation') is-invalid @enderror   @if ((isset($fiche) && ($fiche->type_copropriete!=" divise") && $ficheMaster->categorie!="condo") || (isset($fiche) && ($fiche->type_copropriete=="divise") && $ficheMaster->categorie=="condo") || (!isset($fiche) && $ficheMaster->categorie!="condo")) is-required @else d-none @endif">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.municipal_evaluation') }}</strong>
            {!! Form::text('comparable_vigueur_prix_evaluation', (isset($fiche->comparable_vigueur_prix_evaluation))? $fiche->comparable_vigueur_prix_evaluation:'', array('class' => 'money form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12  @error('comparable_vigueur_prix_demande') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.asked_price') }}</strong>
            {!! Form::text('comparable_vigueur_prix_demande', (isset($fiche->comparable_vigueur_prix_demande))? $fiche->comparable_vigueur_prix_demande:'', array('class' => 'money form-control')) !!}
        </div>
    </div>
</div>