@extends('layouts/default')
@section('content')


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

@endsection

<script src="{{ asset('js/clients/form.js')}}"></script>