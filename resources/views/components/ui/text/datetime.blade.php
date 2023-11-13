@if($value)
<span>{{\Carbon\Carbon::parse($value)->translatedFormat('l j F Y')}} a las {{date('h:i A', strtotime($value))}}</span>
@endif