<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left text-right">
            <a class="btn btn-success" href="{{ route('fiches.annexe.create',$fiche->id) }}">{{ __('fiches_tabs.add') }}</a>
        </div>
    </div>
</div>

<div class="pt-2">

    @foreach ($annexes as $annexe)
    <div class="row no-gutters list-proprietes py-3 pl-3">
        <div class="col-10 d-flex align-items-center titre">{{ $annexe->name }}</div>
        <div class="col-2 d-flex align-items-center justify-content-center">
            <a class="btn btn-info" href="{{ route('fiches.annexe.edit',array($fiche->id,$annexe->id)) }}">{{ __('fiches_tabs.edit') }}</a>
        </div>
    </div>
    @endforeach

</div>