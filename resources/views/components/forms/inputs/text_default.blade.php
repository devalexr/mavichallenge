<?php $A_conf = getInputConfiguration($input, $errors); ?>
<div class="mb-3">
    <x-forms.inputs.elements.top :input="$input" />
    <x-forms.inputs.elements.label :input="$input" />
    <div class="col-md-{{$A_conf['columns']}}">
        <div class="input-group">
            <x-forms.inputs.elements.icon :input="$input" />
            <input 
                type="{{$type}}" 
                name="{{$input['name']}}" 
                value="{{$input['value']}}"
                @if(isset($input['autofocus']) && $input['autofocus'])
                    autofocus
                @endif
                class="{{$A_conf['class']}}" 
                id="{{$A_conf['id']}}" 
                @if(isset($input['placeholder']))
                    placeholder="{{$input['placeholder']}}"
                @endif
                @if($A_conf['required'])
                    required
                @endif
                @if(isset($data))
                    {{$data}}
                @endif
                @if(isset($title))
                    title="{{$title}}"
                @endif
                @if(isset($parsley))
                    data-parsley-type="{{$parsley}}"
                    parsley-type="{{$parsley}}"
                @endif
                @if(isset($input['size']))
                    data-parsley-length="[{{$input['size']}},{{$input['size']}}]"
                @endif
            >
        </div>
    </div>
    <x-forms.inputs.elements.errors :input="$input" />
    <x-forms.inputs.elements.bottom :input="$input" />
</div>