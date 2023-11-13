<?php $A_conf = getInputConfiguration($input, $errors); ?>
<div class="mb-3">
    <x-forms.inputs.elements.top :input="$input" />
    <x-forms.inputs.elements.label :input="$input" />
    <div class="col-md-{{$A_conf['columns']}}">
        <div class="input-group">
            <input 
            type="file" 
            id="{{$A_conf['id']}}"  
            name="{{$input['name']}}" 
            class="{{$A_conf['class']}}"  
            accept=".png, .jpg, .jpeg, .web" 
            @if($A_conf['required'])
                required
            @endif
            @if(isset($data))
                {{$data}}
            @endif
            />
        </div>
    </div>
    <x-forms.inputs.elements.errors :input="$input" />
    <x-forms.inputs.elements.bottom :input="$input" />
</div>