<?php 
$ID_input = 'SWITCH_' . $input['name'];
?>

<div>
    <div style="flex-direction: row; display: flex;">
        @if(isset($input['icon']))
            <i class="{{$input['icon']}}" style="margin-right: 6px; color: var(--bs-green-intelix);"></i>
        @endif
        <div style="margin-right: 10px;">
            <strong>{{$input['label']}}</strong>
        </div>
        <div >
            <input 
            type="checkbox" 
            id="{{$ID_input}}" 
            switch="none" 
            @if($input['checked'])
                checked
            @endif
            @if(isset($input['class']))
                class="{{$input['class']}}"
            @endif
            @if(isset($input['data']))
                {{$input['data']}}
            @endif
            value="{{$input['value']}}"
            >
            <label for="{{$ID_input}}" data-on-label="Sí" data-off-label="No"></label>
        </div>
    </div>
    @if(isset($input['placeholder']))
        <small style="" class="text-muted">{{$input['placeholder']}}</small>
    @endif
    
</div>
