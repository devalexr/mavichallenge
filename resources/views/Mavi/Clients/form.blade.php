@extends('layouts/default')
@section('content')


@if(isset($ID_client_id))
    <div id="DIV_client" data-client-id="{{$ID_client_id}}"></div>
@endif

<x-forms.form
    type="center-small"
    :inputs="[
        [
            'name' => 'name',
            'label' => 'Nombre', 
            'type' => 'text',
            'required' => true,
            'autofocus' => true,
            'placeholder' => 'Nombre del ciente',
        ],
        [
            'name' => 'last_name',
            'label' => 'Apellido', 
            'type' => 'text',
            'required' => true,
            'placeholder' => 'Apellido del ciente',
        ],
        [
            'name' => 'address',
            'label' => 'Domicilio', 
            'type' => 'textarea',
            'placeholder' => 'Calle # Colonia CP',
            'required' => true,
        ],
        [
            'name' => 'email',
            'label' => 'Correo electronico', 
            'type' => 'email',
            'placeholder' => 'mail@mail.com',
            'required' => true,
        ],
    ]" 
    submit="Guardar"
/>

<script src="{{ asset('js/clients/'.$S_action.'.js')}}"></script>

@endsection

