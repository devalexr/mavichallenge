@if($value)
<?php $I_decimals = isset($decimals) ? $decimals : 2; ?>
<span>{{number_format($value, $I_decimals, '.', ',')}}</span>
@endif