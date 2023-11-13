<?php 
$S_class = 'btn btn-'.$type.' waves-effect btn-url';
if(isset($confirm)) {
    $S_class .= ' delete-link-confirm';
}
if(isset($class)) {
    $S_class .= ' ' .$class;
}

$HTML_data = isset($data) ? $data : '';
?>

<a data-url="{{$url}}" href="{{$url}}" class="{{$S_class}}" {{$HTML_data}}>
    @if(isset($icon) && $icon)
        <i class="{{$icon}}"></i>
    @endif
    <?php 
    $S_text_class = isset($hideTextXS) ? 'd-none d-sm-block' : '';
    ?>
    <span class="{{$S_text_class}}">{{$text}}</span>
</a>