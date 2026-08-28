@push('footer-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#colorSelector').ColorPicker({
            color: '#0000ff',
            onShow: function(colpkr) {
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function(colpkr) {
                $(colpkr).fadeOut(500);
                return false;
            },
            onChange: function(hsb, hex, rgb) {
                $('#colorSelector div').css('backgroundColor', '#' + hex);
                $(".colorpickerTool").val(hex);
            }
        });
    })
</script>
@endpush
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Couleur:</strong>
        <div id="colorSelector">
            <div style="background-color: #{{ $user->couleur}}"></div>
        </div>
        {!! Form::text('couleur', null, array('placeholder' => 'Couleur','class' => 'colorpickerTool d-none form-control')) !!}
    </div>
</div>