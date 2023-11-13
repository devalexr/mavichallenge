<?php 
$S_label = isset($input['label']) ? $input['label'] : 'Nueva contraseña';
?>

<div class="mb-3">
    <x-forms.inputs.elements.label :input="['name' => 'password_new', 'label' => $S_label, 'required' => true]" />
    <div class="input-group">
        <span class="input-group-text"><i class="uil-lock-alt"></i></span>
        <input 
            name="new_password" 
            type="password" 
            id="pass2" 
            class="form-control" 
            required 
            placeholder="Contraseña"
            data-parsley-type="alphanum"
            data-parsley-minlength="8"
        >
    </div>
    <x-forms.inputs.elements.errors :input="['name' => 'new_password']" />
    <div class="mt-2">
        <div class="input-group">
            <span class="input-group-text"><i class="uil-lock-alt"></i></span>
            <input name="repeat_password" type="password" class="form-control" required data-parsley-equalto="#pass2" placeholder="Repite la contraseña">
        </div>
    </div>
</div>