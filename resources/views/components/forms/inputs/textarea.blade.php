<?php 
$A_conf = getInputConfiguration($input, $errors);
$I_rows = isset($input['rows']) ? $input['rows'] : 4;
?>
<div class="mb-3">
    <x-forms.inputs.elements.top :input="$input" />
    <x-forms.inputs.elements.label :input="$input" />
    <div class="input-group">
        <textarea 
            name="{{$input['name']}}" 
            @if(isset($input['autofocus']) && $input['autofocus'])
                autofocus
            @endif
            class="{{$A_conf['class']}}" 
            id="{{$A_conf['id']}}" 
            placeholder="{{isset($input['placeholder']) ? $input['placeholder'] : '' }}"
            @if($A_conf['required'])
                required
            @endif
            @if(isset($data))
                {{$data}}
            @endif
            @if(isset($input['maxlength']))
                maxlength="{{$input['maxlength']}}"
            @endif
            rows="{{$I_rows}}"
        >{{$input['value']}}</textarea>
    </div>
    <x-forms.inputs.elements.errors :input="$input" />
    <x-forms.inputs.elements.bottom :input="$input" />
</div>