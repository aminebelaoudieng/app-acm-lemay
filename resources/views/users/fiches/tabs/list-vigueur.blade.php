<div class="row">
    {!! Form::model($fiche, ['method' => 'PATCH', 'files' => true, 'route' => ['fiches.updateAffichageVigueur', $fiche->id],'class'=>'col-xs-6 col-sm-6 col-md-6']) !!}

    <div class="form-group">
        <strong>{{ __('fiches_tabs.hide_current_properties') }}</strong>
        {!! Form::checkbox('ne_pas_afficher_les_vigueurs', 1 , $fiche->ne_pas_afficher_les_vigueurs) !!}
        <button type="submit" class="btn-sm btn-success pull-rght ml-3">{{ __('fiches_tabs.save') }}</button>
    </div>

    {!! Form::close() !!}
    <div class="col-lg-6 margin-tb">
        <div class="pull-left text-right">
            <a class="btn btn-success" href="{{ route('fiches.vigueur.create',$fiche->id) }}">{{ __('fiches_tabs.add') }}</a>
        </div>
    </div>
</div>

<div class="pt-2">


    @foreach ($fiches as $subfiche)
    <div class="row no-gutters list-proprietes">
        <div class="col-2">
            <img id="imgStreet" class="googleImg" style="max-width:150px" src="{{ (isset($subfiche->streetView))? $subfiche->streetView:''}}">
        </div>
        <div class="col-8 d-flex align-items-center titre">{{ $subfiche->adresse }}</div>
        <div class="col-2 d-flex align-items-center justify-content-center">
            <a class="btn btn-info" href="{{ route('fiches.vigueur.edit',array($fiche->id,$subfiche->id)) }}">{{ __('fiches_tabs.edit') }}</a>
        </div>
    </div>
    @endforeach

</div>