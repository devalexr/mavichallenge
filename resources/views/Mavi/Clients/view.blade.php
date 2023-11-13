@extends('layouts/default')
@section('content')

<div class="row justify-content-center align-items-center">
    <div class="col-md-8 col-lg-7 col-xl-6">
        <div class="card" id="DIV_client" data-client-id="{{$ID_client_id}}">
            
        </div>
    </div>
</div>

<script src="{{ asset('js/clients/view.js')}}"></script>

@endsection