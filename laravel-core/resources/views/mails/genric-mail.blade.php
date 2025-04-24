<div>
    @foreach($mailData as $key=>$value)
    
        @if($key!='url_current')
        <b>{{ ucfirst(str_replace('_',' ', $key)) }}</b>: {{ $value }}<br> 
        @else
            <br><br><br>
            This message was sent from {{ $value }}
        @endif
    @endforeach
</div>
