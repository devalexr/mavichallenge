@extends('layouts/login')

@section('content')

<div class="row align-items-center justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body p-4"> 
                <div class="text-center mt-2">
                    <h5 class="text-primary">¡Bienvenido!</h5>
                    <p class="text-muted">Para continuar iniciar sesión en {{env('APP_NAME')}}</p>
                </div>
                <div class="p-2 mt-4">
                    <x-ui.messages.flash />
                    <x-forms.form
                        action="/auth/login"
                        :inputs="[
                            [
                                'type' => 'email',
                                'name' => 'email',
                                'label' => 'Correo electrónico',
                                'placeholder' => 'usuario@mail.com',
                                'autofocus' => true,
                                'required' => true,
                                'default' => 'mail@mail.com'
                            ],
                            [
                                'type' => 'password',
                                'name' => 'password',
                                'label' => 'Contraseña',
                                'placeholder' => 'Ingresa tu contraseña',
                                'required' => true,
                                'default' => '12345678'
                            ],
                        ]" 
                        submit="Ingresar"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection