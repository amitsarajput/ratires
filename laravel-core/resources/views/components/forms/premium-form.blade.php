<div {{ $attributes->merge(['class' => '']) }} >    
        {!! Form::open(['route'=>'form.landing-premium','method'=>'post','class'=>'omniform']) !!}
            {{ Form::hidden('url_current', url()->current()) }}
            {{ Form::hidden('g-recaptcha-response', '',['id'=>'g-recaptcha-response']) }}
            @if ($errors && $errors->any())
                <div class="alert alert-danger error horizontal" role="alert">
                    <ul>
                        {{-- ✅ This shows only the first error --}}
                        @if ($errors->any())
                        <li>{{ $errors->first() }}</li>
                        @endif

                    </ul>
                </div>
            @endif
            
            <div class="grid">
                <div class="col-12 col-sm-6 col-bleed-y mb-1">
                    {{ Form::text('name', '', ['class'=>'sm-form-control required','placeholder'=>'NAME*']) }}
                </div>
                <div class="col-12 col-sm-6 col-bleed-y mb-1">
                    {{ Form::text('company', '', ['class'=>'sm-form-control required','placeholder'=>'COMPANY NAME*']) }}
                </div>
                <div class="col-12 col-sm-6 col-bleed-y mb-1">
                    {{ Form::email('email', '', ['class'=>'sm-form-control required email','placeholder'=>'EMAIL*']) }}
                </div>
                <div class="col-12 col-sm-6 col-bleed-y mb-1">
                    {{ Form::text('phone', '', ['class'=>'sm-form-control','placeholder'=>'PHONE']) }}
                </div>
                <div class="col-12 col-bleed-y mb-1">
                    {{ Form::text('address', '', ['class'=>'sm-form-control','placeholder'=>'ADDRESS/LOCATION']) }}
                </div>
                <div class="col-12 col-bleed-y mb-1">
                    {{ Form::textarea('message', '', ['class'=>'sm-form-control valid','cols'=>'30','rows'=>'4','placeholder'=>'INQUIRY*']) }}
                </div>                
            </div>
            <div class="grid">
                <div class="col-7 ">
                    <div class="form-inline">
                        <div class="form-group mb-2">
                            <label>I AM A</label>
                        </div>
                        <div class="form-group mx-sm-1 mb-2">
                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="wholeseller">
                                <label class="form-check-label" for="defaultCheck1">WHOLESALER</label>
                        </div>
                        <div class="form-group mx-sm-1 mb-2">
                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="retailer">
                                <label class="form-check-label" for="defaultCheck2">RETAILER</label>
                        </div>
                        <div class="form-group mx-sm-1 mb-2">
                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck3" name="consumer">
                                <label class="form-check-label" for="defaultCheck3">CONSUMER</label>
                        </div>
                    </div>
                </div>
                <div class="col-5 tright">
                    <div class="form-inline justify-content-end">
                            <small class="mandatory">*Required Fields</small>                        
                            {{ Form::button('SUBMIT',['type'=>'submit','id'=>'submit','class'=>"knopf red sharp heading-font ls-1 p"]); }}
                        
                    </div>
                </div>
                
            </div>
            @if (session('status'))
                <div class="alert alert-success result" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        {!! Form::close() !!}        
</div>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.site') }}', { action: 'submit' }).then(function(token) {
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script>