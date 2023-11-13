<?php 
$CLASS_container = 'text-end';
$CLASS_btn = isset($submit['btn_class']) ? $submit['btn_class'] : 'primary';
$CLASS_icon = isset($submit['icon']) ? $submit['icon'] : 'uil-check-circle';
$S_title = '';
$S_type = isset($submit['type']) ? $submit['type'] : 'button';

if(is_array($submit)) {
    if(isset($submit['container_class'])){
        $CLASS_container = $submit['container_class'];
    }
    $S_title = $submit['title'];
} else {
    $S_title = $submit;
}
?>

<div class="{{$CLASS_container}}">
    @if($S_type === 'button')
        <button 
            class="btn btn-{{$CLASS_btn}} w-sm waves-effect waves-light" 
            type="submit"
        >
            <i class="{{$CLASS_icon}}"></i>
            {{$S_title}}
        </button>
    @else 
        <input 
            class="btn btn-{{$CLASS_btn}} w-sm waves-effect waves-light" 
            type="submit"
            name="submit"
            value="{{$S_title}}"
        >
    @endif
</div>