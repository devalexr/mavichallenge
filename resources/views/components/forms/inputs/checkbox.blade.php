<?php 
$ID_input = 'CHECKBOX_' . $input['name'];
$B_checked = old($input['name'])
?>
<div class="form-check">
    <input 
        name="{{$input['name']}}" 
        type="checkbox" 
        class="form-check-input" 
        id="{{$ID_input}}"
        {{$B_checked ? 'checked' : ''}}
    >
    <label class="form-check-label" for="{{$ID_input}}">{{$input['label']}}</label>
</div>