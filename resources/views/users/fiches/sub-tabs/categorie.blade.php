<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.category') }}</strong>
            {!!Form::select('categorie',Arr::pluck(Config::get('datas.categories'), 'name', 'key'), null , ['class' => 'form-control'])!!}
        </div>
    </div>



</div>