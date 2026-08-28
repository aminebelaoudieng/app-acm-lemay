<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.role_year') }}</strong>
            @php
            $annees=[];
            for($i=date('Y');$i>=1800;$i--){
            $annees[$i]=$i;
            }
            @endphp
            {!! Form::select('annee_role', $annees, (isset($fiche->annee_role))? $fiche->annee_role:'', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 @error('evaluation_terrain') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.land_evaluation') }}</strong>
            {!! Form::text('evaluation_terrain', null, array('class' => 'money form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 @error('evaluation_batiment') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.building_evaluation') }}</strong>
            {!! Form::text('evaluation_batiment', null, array('class' => 'money form-control')) !!}
        </div>
    </div>
</div>