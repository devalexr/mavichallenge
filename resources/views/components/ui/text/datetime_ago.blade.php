@if($value)
<span>
    <span>
        {{\Carbon\Carbon::parse($value)->translatedFormat('l j F Y')}}
        @if(isset($time))
            a las {{date('h:i A', strtotime($value))}}
        @endif
    </span><br>
    <small class="text-muted">{{\Carbon\Carbon::parse($value)->diffForHumans()}}</small>
</span>
@endif