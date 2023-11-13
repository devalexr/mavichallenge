@if($value)
<span>{{date('h:i A', strtotime($value))}}</span>
@endif
