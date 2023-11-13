<?php 
$ID_input = 'SWITCH_' . $input['name'];
$B_checked = $input['value'];

if(sizeof($errors->all())) {
    $B_checked = old($input['name']) === null ? false : true;
}

?>
<div>
    <h5 class="font-size-14 mb-3">{{$input['label']}}</h5>
    <input name="{{$input['name']}}" type="checkbox" id="{{$ID_input}}" switch="bool" {{$B_checked ? 'checked' : ''}}>
    <label for="{{$ID_input}}" data-on-label="Si" data-off-label="No"></label>
</div>