<?php 
$ID_input = 'INP_' . $input['name'];
$B_required = isset($input['required']) && $input['required'];
?>

<label class="form-label" for="{{$ID_input}}">
    {{$input['label']}}
    @if($B_required)
        <span class="text-danger">*</span>
    @endif
</label>
@if(isset($input['label_description']))
    <p class="text-muted mb-2">
        {{$input['label_description']}}
    </p>
@endif