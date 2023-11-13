@if($value)
<span>{{\Carbon\Carbon::parse($value)->translatedFormat('l j F Y')}}</span>
@endif
