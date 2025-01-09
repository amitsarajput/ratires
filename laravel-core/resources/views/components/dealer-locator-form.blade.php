<div {{ $attributes->merge(['class' => 'contact-form']) }} >    
        {!! Form::open(['route'=>'form.dealerlocator','method'=>'post','class'=>'omniform']) !!}
            {{ Form::hidden('phone', '') }}
            {{ Form::hidden('url_current', url()->current()) }}
            {{ Form::hidden('g-recaptcha-response', '',['id'=>'g-recaptcha-response']) }}
            @if ($errors->any())
                <div class="alert alert-danger  error horizontal" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="grid">
                <p class="col-12">
                    If you can’t find a dealer near you or if you may need any additional information from us on sizes, specifications or anything else, please get in touch with us via the below form and we will get back to you as soon as we can. 
                </p>
            </div>
            <div class="grid">
                <div class="col-4">
                    {{ Form::text('name', '', ['class'=>'sm-form-control required','placeholder'=>'NAME*']) }}
                </div>
                <div class="col-4">
                    {{ Form::email('email', '', ['class'=>'sm-form-control required email','placeholder'=>'EMAIL*']) }}
                </div>
                <div class="col-4">
                    {{ Form::text('location', '', ['class'=>'sm-form-control required','placeholder'=>'LOCATION*']) }}
                </div>
            </div>        
            <div class="grid">
                <div class="col-12">
                    {{ Form::textarea('message', '', ['class'=>'sm-form-control required','placeholder'=>'MESSAGE']) }}
                </div>
            </div>
            <div class="grid">
                <div class="col-12">
                    {{ Form::button('Send',['type'=>'submit','id'=>'submit','class'=>"knopf red sharp heading-font ls-1 p"]); }}
                    <small class="mandatory">*Required Fields</small>
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