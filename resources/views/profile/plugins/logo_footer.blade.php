<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>{{ __('profile.logo_footer') }}</strong>
        <p class="mt-3 d-inline-block">{{ __('profile.logo_footer_size') }}</p>
        
        <!-- Input file personnalisé -->
        <div class="custom-file-wrapper">
            <input type="file" id="logo_footer" name="logo_footer" class="custom-file-input" accept="image/*" style="display: none;">
            <button type="button" class="btn btn-outline-secondary btn-file" onclick="document.getElementById('logo_footer').click();">
                <i class="fas fa-upload mr-2"></i>{{ __('profile.choose_file') }}
            </button>
            <span class="file-name ml-3" id="logo_footer_filename">{{ __('profile.no_file_selected') }}</span>
        </div>
        
        <script>
            document.getElementById('logo_footer').addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : '{{ __("profile.no_file_selected") }}';
                document.getElementById('logo_footer_filename').textContent = fileName;
            });
        </script>
        
        @if(isset($user) && $user->logo_footer)
        <img src="{{ (isset($user->logo_footer))? asset('uploads/users/logos/footer/'.$user->logo_footer):''}}" width="200" />
        <a href="#" class="delete-img-btn" id="logo_footer">{{ __('profile.delete_image') }}</a>
        {!! Form::hidden('logo_footer_old', (isset($user->logo_footer))? $user->logo_footer:'', array('id'=>'logo_footer_old','class' => 'form-control')) !!}
        @endif
    </div>
</div>