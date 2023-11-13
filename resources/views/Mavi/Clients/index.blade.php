@extends('layouts/default')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <!-- end row -->
                <div class="table-responsive mb-4">
                    <table class="table table-centered table-nowrap mb-0 table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Domicilio</th>
                                <th>Correo electrónico</th>
                                <th>Actualizado</th>
                                <th scope="col" style="min-width: 150px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                @include('CRUD/partials/index/paginator', [
                    'show_arrows' => false,
                    'PAGINATION_index' => $PAGINATION_index,
                ])
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/clients/index.js')}}"></script>

@endsection