<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left text-right">
            <a class="btn btn-success" href="{{ route('fiches.vendu.create',$fiche->id) }}">{{ __('fiches_tabs.add') }}</a>
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
            <a class="btn btn-info" href="{{ route('fiches.vendu.edit',array($fiche->id,$subfiche->id)) }}">{{ __('fiches_tabs.edit') }}</a>
        </div>
    </div>
    @endforeach

</div>