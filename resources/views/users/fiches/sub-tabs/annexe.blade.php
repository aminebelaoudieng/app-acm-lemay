<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">{{ __('fiches_subtabs.save') }}</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.file_name') }}</strong>
            {!! Form::text('name', (isset($annexe->name))? $annexe->name:'', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('fiches_subtabs.file') }}</strong>

            <!-- Input file personnalisé (annexe) -->
            <div class="custom-file-wrapper">
                <input type="file" id="annexe_file" name="file" class="custom-file-input" style="display: none;" accept="application/pdf">
                <button type="button" class="btn btn-outline-secondary btn-file" onclick="document.getElementById('annexe_file').click();">
                    <i class="fas fa-upload mr-2"></i>{{ __('profile.choose_file') }}
                </button>
                <span class="file-name ml-3" id="annexe_file_filename">{{ __('profile.no_file_selected') }}</span>
            </div>

            <script>
                document.getElementById('annexe_file').addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        const fileName = file ? file.name : '{{ __("profile.no_file_selected") }}';
                        document.getElementById('annexe_file_filename').textContent = fileName;

                        // Client-side check: only accept PDF
                        if (file) {
                            const isPdf = file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf');
                            const pdfNotice = document.getElementById('annexe_file_pdf_notice');
                            if (!isPdf) {
                                if (!pdfNotice) {
                                    const span = document.createElement('div');
                                    span.id = 'annexe_file_pdf_notice';
                                    span.className = 'text-danger mt-2';
                                    span.textContent = '{{ __('fiches_subtabs.only_pdf_allowed') }}';
                                    e.target.parentNode.appendChild(span);
                                } else {
                                    pdfNotice.textContent = '{{ __('fiches_subtabs.only_pdf_allowed') }}';
                                }
                            } else {
                                if (pdfNotice) pdfNotice.remove();
                            }
                        }
                    });
            </script>

            <!-- Upload progress and reporting -->
            <div class="row mt-3">
                <div class="col-12">
                    <div id="uploadProgressWrapper" style="display:none;">
                        <div class="progress">
                            <div id="uploadProgressBar" class="progress-bar" role="progressbar" style="width:0%">0%</div>
                        </div>
                        <div class="mt-2" id="uploadStatus"></div>
                    </div>
                    <div id="uploadReport" class="mt-3"></div>
                </div>
            </div>

            <script>
                (function(){
                    const form = document.getElementById('annexeForm');
                    if (!form) return; // defensive

                    form.addEventListener('submit', function(e){
                        // if FormData is not supported, let the form submit normally
                        if (!window.FormData || !document.getElementById('annexe_file')) return;
                        e.preventDefault();

                        const fileInput = document.getElementById('annexe_file');
                        if (!fileInput.files || fileInput.files.length === 0) {
                            alert('{{ __('fiches_subtabs.file_required', [], app()->getLocale()) }}');
                            return;
                        }

                        const fd = new FormData(form);

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', form.action, true);
                        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                        xhr.setRequestHeader('Accept', 'application/json');

                        const progressWrapper = document.getElementById('uploadProgressWrapper');
                        const progressBar = document.getElementById('uploadProgressBar');
                        const status = document.getElementById('uploadStatus');
                        const report = document.getElementById('uploadReport');

                        progressWrapper.style.display = 'block';
                        progressBar.style.width = '0%';
                        progressBar.textContent = '0%';
                        status.innerHTML = 'Uploading...';
                        report.innerHTML = '';

                        xhr.upload.onprogress = function(evt) {
                            if (evt.lengthComputable) {
                                const percent = Math.round((evt.loaded / evt.total) * 100);
                                progressBar.style.width = percent + '%';
                                progressBar.textContent = percent + '%';
                            }
                        };

                        xhr.onload = function() {
                            if (xhr.status >= 200 && xhr.status < 300) {
                                let data = {};
                                try { data = JSON.parse(xhr.responseText); } catch(e){ /* ignore */ }
                                if (data.success) {
                                     // status.innerHTML = '<span class="text-success">' + (data.message || 'Upload successful') + '</span>';
                                    // // // show annexe info
                                    report.innerHTML = '<div class="alert alert-success">' + (data.message || 'Fichier téléversé') + '</div>';
                                
                                    // Optionally reload page or redirect to edit with anchor
                                    setTimeout(function(){ location.href = '{{ route('fiches.edit', $ficheMaster->id) }}#annexe'; }, 900);
                                } else {
                                    status.innerHTML = '<span class="text-danger">Upload failed</span>';
                                    report.innerHTML = '<div class="alert alert-danger">' + (data.message || 'Erreur lors du téléversement') + '</div>';
                                }
                            } else if (xhr.status === 422) {
                                // validation errors
                                const json = JSON.parse(xhr.responseText);
                                const errors = json.errors || {};
                                let html = '<div class="alert alert-danger"><ul>';
                                Object.keys(errors).forEach(function(k){
                                    errors[k].forEach(function(msg){ html += '<li>' + msg + '</li>'; });
                                });
                                html += '</ul></div>';
                                report.innerHTML = html;
                                status.innerHTML = '<span class="text-danger">Validation error</span>';
                            } else {
                                status.innerHTML = '<span class="text-danger">Error: ' + xhr.status + '</span>';
                                report.innerHTML = '<div class="alert alert-danger">Erreur serveur (' + xhr.status + ')</div>';
                            }
                        };

                        xhr.onerror = function() {
                            status.innerHTML = '<span class="text-danger">Upload error</span>';
                            report.innerHTML = '<div class="alert alert-danger">Erreur réseau pendant le téléversement.</div>';
                        };

                        // Send
                        xhr.send(fd);
                    });
                })();
            </script>

            @if(isset($annexe->file))
            <a href="{{ (isset($annexe->file))? $annexe->fileLink:'' }}" target="_blank">{{ __('fiches_subtabs.download_file') }}</a>
            @endif  
            <sup>{!! __('fiches_subtabs.compress_advice', ['url' => 'https://www.ilovepdf.com/compress_pdf']) !!}</sup>

        </div>
    </div>


</div>