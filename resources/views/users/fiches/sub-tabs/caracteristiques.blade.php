<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>

    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.property_type') }}</strong>
            @php
                $types = [];
                foreach (Config::get('datas.type_propriete') as $item) {
                    $types[$item['key']] = $item['key'] ? __('datas.type_propriete.' . $item['key']) : '-';
                }
            @endphp
            {!! Form::select('caracteristique_type_propriete', $types, isset($fiche->caracteristique_type_propriete) ? $fiche->caracteristique_type_propriete : '', ['class' => 'form-control']) !!}
        </div>
    </div>
    
    @if($fiche && $fiche->categorie=='condo' && $fiche->type=='master' || isset($ficheMaster) && $ficheMaster->categorie=='condo' )
    <div class="col-xs-12 col-sm-12 col-md-12 ">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.condo_type') }}</strong>
            @php
                $copro = [];
                foreach (Config::get('datas.type_copropriete') as $item) {
                    $copro[$item['key']] = $item['key'] ? __('datas.type_copropriete.' . $item['key']) : '-';
                }
            @endphp
            {!! Form::select('type_copropriete', $copro, isset($fiche->type_copropriete) ? $fiche->type_copropriete : '', ['class' => 'form-control']) !!}
        </div>
    </div>
    @endif
    @if($fiche && $fiche->categorie!='condo' && $fiche->type=='master' || isset($ficheMaster) && $ficheMaster->categorie!='condo' )
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.building_type') }}</strong>
            @php
                $batiments = [];
                foreach (Config::get('datas.type_batiment') as $item) {
                    $batiments[$item['key']] = $item['key'] ? __('datas.type_batiment.' . $item['key']) : '-';
                }
            @endphp
            {!! Form::select('caracteristique_type_batiment', $batiments, isset($fiche->caracteristique_type_batiment) ? $fiche->caracteristique_type_batiment : '', ['class' => 'form-control']) !!}
        </div>
    </div>
    @endif

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.year_built') }}</strong>
            @php
            $annees=[];
            for($i=date('Y');$i>=1800;$i--){
            $annees[$i]=$i;
            }
            @endphp
            {!! Form::select('caracteristique_annee_construction', $annees,(isset($fiche->caracteristique_annee_construction))? $fiche->caracteristique_annee_construction:'', array('class' => 'form-control')) !!}
        </div>
    </div>
    @if(($fiche && ($fiche->categorie!="condo")) || (isset($ficheMaster) && ($ficheMaster->categorie!="condo" )))

    <div class="col-xs-12 col-sm-12 col-md-12  @error('caracteristique_superficie_terrain') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.land_area') }}</strong>
            {!! Form::text('caracteristique_superficie_terrain', (isset($fiche->caracteristique_superficie_terrain))? $fiche->caracteristique_superficie_terrain:'', array('class' => 'money form-control')) !!}
        </div>
    </div>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12  @error('caracteristique_superficie_habitable') is-invalid @enderror is-required">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.living_area_sqft') }}</strong>
            {!! Form::text('caracteristique_superficie_habitable', (isset($fiche->caracteristique_superficie_habitable))? $fiche->caracteristique_superficie_habitable:'', array('class' => 'money form-control')) !!}
        </div>
    </div>

  
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h4>{{ __('fiches_subtabs.parkings_and_garages') }}</h4>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 pl-5">
    
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.num_parkings') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=999;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('caracteristique_stationnement', $nb,(isset($fiche->caracteristique_stationnement))? $fiche->caracteristique_stationnement:'', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 pl-5">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.num_garages') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=999;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('caracteristique_garage', $nb,(isset($fiche->caracteristique_garage))? $fiche->caracteristique_garage:'', array('class' => 'form-control')) !!}
        </div>
    </div>

    
    @if(($fiche && !isset($ficheMaster) && ($fiche->categorie=="condo" || $fiche->categorie=="unifamiliale")) || (isset($ficheMaster) && ($ficheMaster->categorie=="condo" || $ficheMaster->categorie=="unifamiliale")))
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.num_rooms') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=31;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('caracteristique_nombre_piece', $nb,(isset($fiche->caracteristique_nombre_piece))? $fiche->caracteristique_nombre_piece:'', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.num_bedrooms') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=999;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('caracteristique_nombre_chambre', $nb,(isset($fiche->caracteristique_nombre_chambre))? $fiche->caracteristique_nombre_chambre:'', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        {{ __('fiches_subtabs.num_bathrooms') }} <div class="form-group">
            <strong></strong>
            @php
            $nb=[];
            for($i=0;$i!=11;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('caracteristique_nombre_salle_de_bain', $nb,(isset($fiche->caracteristique_nombre_salle_de_bain))? $fiche->caracteristique_nombre_salle_de_bain:'', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.num_powder_rooms') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=11;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('caracteristique_nombre_salle_eau', $nb,(isset($fiche->caracteristique_nombre_salle_eau))? $fiche->caracteristique_nombre_salle_eau:'', array('class' => 'form-control')) !!}
        </div>
    </div>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            @if($fiche && $fiche->categorie=="condo" && !isset($ficheMaster) || (isset($ficheMaster) && $ficheMaster->categorie=="condo"))
            <strong>{{ __('fiches_subtabs.condo_floor') }}</strong>
            @else
            <strong>{{ __('fiches_subtabs.num_floors') }}</strong>
            @endif

            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('caracteristique_etage', $nb,(isset($fiche->caracteristique_etage))? $fiche->caracteristique_etage:'', array('class' => 'form-control')) !!}
        </div>
    </div>
    @if(isset($ficheMaster) && $ficheMaster->categorie!='unifamiliale' )

    <div class="col-xs-12 col-sm-12 col-md-12  @error('type_vue') is-invalid @enderror">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.view') }}</strong>
            @php
                $vues = [];
                foreach (Config::get('datas.type_vue') as $item) {
                    $vues[$item['key']] = $item['key'] ? __('datas.type_vue.' . $item['key']) : '-';
                }
            @endphp
            {!! Form::select('type_vue', $vues, isset($fiche->type_vue) ? $fiche->type_vue : '', ['class' => 'form-control']) !!}
        </div>
    </div>
    @endif

    <!-- Commercial-plexes -->

    @if($fiche && $fiche->categorie!="condo" && $fiche->categorie!="unifamiliale" || isset($ficheMaster) && $ficheMaster->categorie!="condo" && $ficheMaster->categorie!="unifamiliale")

    <div class="col-xs-12 col-sm-12 col-md-12  @error('type_finition') is-invalid @enderror">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.interior_finish_quality') }}</strong>
            @php
                $finitions = [];
                foreach (Config::get('datas.type_finition') as $item) {
                    $finitions[$item['key']] = $item['key'] ? __('datas.type_finition.' . $item['key']) : '-';
                }
            @endphp
            {!! Form::select('type_finition', $finitions, isset($fiche->type_finition) ? $fiche->type_finition : '', ['class' => 'form-control']) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <h4>{{ __('fiches_subtabs.num_units') }}</h4>
        @if(($fiche && ($fiche->categorie=="commercial" || $fiche->categorie=="mixte" || $fiche->categorie=="residentiel") ) || (isset($ficheMaster) && ($ficheMaster->categorie=="commercial" || $ficheMaster->categorie=="mixte" || $ficheMaster->categorie=="residentiel") ))
        @if(($fiche && ($fiche->categorie=="commercial" || $fiche->categorie=="mixte")) || (isset($ficheMaster) && ($ficheMaster->categorie=="commercial" || $ficheMaster->categorie=="mixte")) )
        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.commercial_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_commercial', $nb,(isset($fiche->unites_commercial))? $fiche->unites_commercial:'', array('class' => 'form-control')) !!}
        </div>
        @endif
        @if(($fiche && ($fiche->categorie=="mixte" || $fiche->categorie=="residentiel") ) || (isset($ficheMaster) && ($ficheMaster->categorie=="mixte" || $ficheMaster->categorie=="residentiel") ))

        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.studio_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_residentiel_studio', $nb,(isset($fiche->unites_residentiel_studio))? $fiche->unites_residentiel_studio:'', array('class' => 'form-control')) !!}
        </div>
        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.one_and_half_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_residentiel_1', $nb,(isset($fiche->unites_residentiel_1))? $fiche->unites_residentiel_1:'', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.two_and_half_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_residentiel_2', $nb,(isset($fiche->unites_residentiel_2))? $fiche->unites_residentiel_2:'', array('class' => 'form-control')) !!}
        </div>
        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.three_and_half_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_residentiel_3', $nb,(isset($fiche->unites_residentiel_3))? $fiche->unites_residentiel_3:'', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.four_and_half_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_residentiel_4', $nb,(isset($fiche->unites_residentiel_4))? $fiche->unites_residentiel_4:'', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.five_and_half_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_residentiel_5', $nb,(isset($fiche->unites_residentiel_5))? $fiche->unites_residentiel_5:'', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.six_and_half_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_residentiel_6', $nb,(isset($fiche->unites_residentiel_6))? $fiche->unites_residentiel_6:'', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.seven_and_half_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_residentiel_7', $nb,(isset($fiche->unites_residentiel_7))? $fiche->unites_residentiel_7:'', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.eight_and_half_units') }}</strong>
            @php
            $nb=[];
            for($i=0;$i!=100;$i++){
            $nb[$i]=$i;
            }
            @endphp
            {!! Form::select('unites_residentiel_8', $nb,(isset($fiche->unites_residentiel_8))? $fiche->unites_residentiel_8:'', array('class' => 'form-control')) !!}
        </div>

        @endif
        @endif
    </div>
    @endif

    @if(($fiche && ($fiche->categorie=="commercial" || $fiche->categorie=="mixte" || $fiche->categorie=="residentiel") ) || (isset($ficheMaster) && ($ficheMaster->categorie=="commercial" || $ficheMaster->categorie=="mixte" || $ficheMaster->categorie=="residentiel") ))

    <div class="col-xs-12 col-sm-12 col-md-12">
        <h4>{{ __('fiches_subtabs.returns') }}</h4>
        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.gross_income') }}</strong>
            {!! Form::text('rendement_revenus_brut', (isset($fiche->rendement_revenus_brut))? $fiche->rendement_revenus_brut:'', array('class' => 'money form-control')) !!}
        </div>
        <div class="form-group pl-5">
            <strong>{{ __('fiches_subtabs.expenses') }}</strong>
            {!! Form::text('rendement_depense', (isset($fiche->rendement_depense))? $fiche->rendement_depense:'', array('class' => 'money form-control')) !!}
        </div>
    </div>
    @endif


</div>