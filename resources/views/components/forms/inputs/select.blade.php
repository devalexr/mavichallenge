<?php 
$A_conf = getInputConfiguration($input, $errors); 
$A_conf['class'] .= ' form-select';
?>
<div class="mb-3">
    <x-forms.inputs.elements.top :input="$input" />
    <x-forms.inputs.elements.label :input="$input" />
    <div class="col-md-12 input-group">
        <select 
            class="{{$A_conf['class']}}"
            name="{{$input['name']}}"
            @if($A_conf['required'])
                required
                data-parsley-min="1"
                data-parsley-min-message="Este valor es requerido."
            @endif
        >
            @if($input['empty'])
                <option>Seleccione un elemento</option>
            @endif
            @foreach($input['options'] as $X_value => $S_name)
                <option 
                    value="{{$X_value}}"
                    @if($X_value == $input['value'])
                        selected="selected"
                    @endif
                >
                    {{$S_name}}
                </option>
            @endforeach
        </select>
    </div>
    <x-forms.inputs.elements.errors :input="$input" />
    <x-forms.inputs.elements.bottom :input="$input" />
</div>