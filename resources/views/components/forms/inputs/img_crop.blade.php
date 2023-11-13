<?php 
$A_conf = getInputConfiguration($input, $errors);
$ID_input_b64 = $A_conf['id'] .'_b64'; //este es el input que contendra la img en B64
$ID_img_cropped = 'IMG_cropped_' .$input['name'];
$S_class = $A_conf['class'];
$S_class .= ' form-control input-file-img-crop';

?>
<div class="mb-3 input-img-cropper-container">
    <x-forms.inputs.elements.label :input="$input" />
    <input 
        type="file" 
        name="{{$input['name'].'_file'}}" 
        class="{{$S_class}}" 
        id="{{$A_conf['id']}}" 
        @if($A_conf['required'])
            required
        @endif
        data-parsley-file-img="jpg|jpeg|png|webp"
        accept="image/*"
        data-img-cropped-id="{{$ID_img_cropped}}"
        data-crooper-width="{{$input['width']}}"
        data-ratio="{{$input['ratio']}}"
        data-input-b64-id={{$ID_input_b64}} 
    >
    <input type="hidden" name={{$input['name'].'_b64'}} id="{{$ID_input_b64}}" />
    <div class="img-cropped-container hidden">
        <img id="{{$ID_img_cropped}}" src="" class="img-cropped-selected" />
        <button type="button" class="btn btn-outline-light waves-effect btn-sm img-cropped-btn-delete">
            <i class="uil-trash-alt"></i>
        </button>
    </div>
    <x-forms.inputs.elements.errors :input="$input" />
</div>