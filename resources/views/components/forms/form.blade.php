<?php 
$type = isset($type) ? $type : '';
$DATA_form = isset($data) ? $data : [];
?>

<?php RENDERFormTypeHead($type); ?>
@isset($title)
    <h4 class="card-title">{{$title}}</h4>
@endif
@isset($description)
    <p class="card-title-desc">{{$description}}</p>
@endif

@if(isset($showErrors) && $errors->all())
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $S_error)
        <strong>- {{$S_error}}</strong><br />
    @endforeach
    <button style="position: absolute; top: 6px; right: 10px;  width: 2px;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<form 
    class="custom-validation"
    action="{{isset($action) ? $action : ''}}"  
    method="{{isset($method) ? $method : 'POST'}}"
    enctype="multipart/form-data"
>
    @csrf
    @foreach($inputs as $A_input)
        <?php 
        //value del input
        $X_value = null;

        if(isset($A_input['name'])) {
            if(isset($DATA_form[$A_input['name']])){
                $X_value = old($A_input['name'], $DATA_form[$A_input['name']]);
            } else {
                $X_value = old($A_input['name']);
            }
            if(!$X_value && isset($A_input['default'])){
                $X_value = $A_input['default'];
            }
            $A_input['value'] = $X_value;
        }
       
        switch ($A_input['type']): 
            case 'text':  ?>
                <x-forms.inputs.text_default :input="$A_input" type="text" />
            <?php break; ?>
            <?php  case 'select':  ?>
                <x-forms.inputs.select :input="$A_input"  />
            <?php break; ?>
            <?php  case 'select_search':  ?>
                <?php 
                $A_input['class'] = 'select2';
                ?>
                <x-forms.inputs.select :input="$A_input"  />
            <?php break; ?>
            <?php  case 'textarea':  ?>
                <x-forms.inputs.textarea :input="$A_input"  />
            <?php break; ?>
            <?php  case 'email':  ?>
                <?php 
                $A_input['icon'] = 'uil-envelope';
                ?>
                <x-forms.inputs.text_default :input="$A_input" type="email" parsley="email" />
            <?php break; ?>
            <?php  case 'url':  ?>
                <?php 
                $A_input['icon'] = 'uil-link-alt';
                ?>
                <x-forms.inputs.text_default :input="$A_input" type="url" parsley="url" />
            <?php break; ?>
            <?php  case 'int':  ?>
                <?php 
                $A_input['columns'] = 4;
                //$A_input['placeholder'] = '0';
                ?>
                <x-forms.inputs.text_default :input="$A_input" type="text"  parsley="digits" />
            <?php break; ?>
            <?php  case 'numeric':  ?>
                <?php 
                $A_input['columns'] = 4;
                //$A_input['placeholder'] = '0.00';
                ?>
                <x-forms.inputs.text_default :input="$A_input" type="text" parsley="number" />
            <?php break; ?>
            <?php  case 'color': ?>
                <?php 
                $A_input['class'] = 'form-control-color';
                ?>
                <x-forms.inputs.text_default :input="$A_input" type="color" title="Selecciona el color" />
            <?php break; ?>
            <?php  case 'switch': ?>
                <x-forms.inputs.switch :input="$A_input"/>
            <?php break; ?>
            <?php  case 'phone':  ?>
                <?php 
                $A_input['icon'] = 'uil-phone';
                ?>
                <x-forms.inputs.text_default 
                    :input="$A_input" 
                    type="digits" 
                    size="10" 
                    parsley="digits" 
                    data="data-parsley-length-message='El número telefónico debe ser de 10 dígitos.'"
                />
            <?php break; ?>
            <?php  case 'date':  ?>
                <?php 
                $A_input['icon'] = 'uil-calendar-alt';
                $A_input['class'] = 'datepicker-basic';
                ?>
                <x-forms.inputs.text_default :input="$A_input" type="text" data="{{_getDateInputDataValue($A_input)}}" />
            <?php break; ?>
            <?php  case 'datetime':  ?>
                <?php 
                $A_input['icon'] = 'uil-calendar-alt';
                $A_input['class'] = 'datepicker-datetime';
                ?>
                <x-forms.inputs.text_default :input="$A_input" type="text" data="{{_getDateInputDataValue($A_input)}}" />
            <?php break; ?>
            <?php  case 'time':  ?>
                <?php 
                $A_input['icon'] = 'uil-clock-nine';
                $A_input['class'] = 'datepicker-timepicker';
                ?>
                <x-forms.inputs.text_default :input="$A_input" type="text"  />
            <?php break; ?>
            <?php  case 'password':  ?>
                <?php 
                $A_input['icon'] = 'uil-lock-alt';
                ?>
                <x-forms.inputs.text_default :input="$A_input" type="password" />
            <?php break; ?>
            <?php  case 'password-equal':  ?>
                <x-forms.inputs.password_equal :input="$A_input"  />
            <?php break; ?>
            <?php case 'img_crop':  ?>
                <x-forms.inputs.img_crop :input="$A_input" />
            <?php break; ?>
            <?php case 'img':  ?>
                <x-forms.inputs.img :input="$A_input" />
            <?php break; ?>
            <?php case 'checkbox':  ?>
                <x-forms.inputs.checkbox :input="$A_input" />
            <?php break; ?>
            <?php case 'boolean': ?>
                <x-forms.inputs.boolean :input="$A_input" />
            <?php break; ?>
            <?php  case 'hidden':  ?>
                <x-forms.inputs.hidden :input="$A_input"  />
            <?php break; ?>
            <?php case 'separator':  ?>
                <hr class="hr hr-blurry my-4">
            <?php break; ?>
        <?php endswitch; ?>
    @endforeach
    <div class="d-flex " style="justify-content: flex-end; column-gap: 10px;">
        @if(isset($submitwithvalue) && sizeof($submitwithvalue))
            <x-forms.buttons.submit :submit="$submitwithvalue" />
        @endif
        @if(isset($submit))
            <x-forms.buttons.submit :submit="$submit" />
        @endif
    </div>
</form>
<?php RENDERFormTypeBottom($type); ?>

<?php function RENDERFormTypeHead($S_type){ ?>
    <?php switch ($S_type): 
        case 'center-small':  ?>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4"> 
        <?php break; ?>
    <?php endswitch ?>
<?php } ?>

<?php function RENDERFormTypeBottom($S_type){ ?>
    <?php switch ($S_type): 
        case 'center-small':  ?>
            </div></div></div></div>
        <?php break; ?>
    <?php endswitch ?>
<?php } ?>


<?php 
function _getDateInputDataValue($A_input){ 

    $S_data = '';
                
    if(isset($A_input['future'])) {
        $S_data = 'data-mindate=today';
    }

    if(isset($A_input['pass'])) {
        $S_data = 'data-maxdate=today';
    }

    if(isset($A_input['min_date'])) {
        $S_data = 'data-mindate=' . $A_input['min_date'];
    }

    if(isset($A_input['max_date'])) {
        $S_data = 'data-maxdate=' . $A_input['max_date'];
    }

    return $S_data;
}

function getInputConfiguration($A_input, $BLADE_errors) {

    $S_class = 'form-control';
    $B_error = $BLADE_errors->has($A_input['name']);

    if(isset($A_input['class']) && $A_input['class']) {
        $S_class .= ' ' . $A_input['class'];
    }

    if($B_error) {
        $S_class .= ' input-invalid ';
    }

    return [
        'id' => 'INP_' . $A_input['name'],
        'error' => $B_error,
        'required' => isset($A_input['required']) && $A_input['required'],
        'class' => $S_class,
        'columns' => isset($A_input['columns']) ? $A_input['columns'] : 12,
    ];
}
?>
    
