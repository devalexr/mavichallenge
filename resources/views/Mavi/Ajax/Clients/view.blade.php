<div class="card-body" >
    <strong>Nombre</strong><br />
    <span>{{$A_client['name']}}</span>
    <hr />
    <strong>Apellido</strong><br />
    <span>{{$A_client['last_name']}}</span>
    <hr />
    <strong>Domicilio</strong><br />
    <p>{{$A_client['address']}}</p>
    <hr />
    <strong>Correo electronico</strong><br />
    <span>{{$A_client['email']}}</span>
    <hr />
    <strong>Creado:</strong><br />
    <x-ui.text.datetime_ago value="{{$A_client['created_at']}}" />
    <hr />
    <strong>Actualizado:</strong><br />
    <x-ui.text.datetime_ago value="{{$A_client['updated_at']}}" />
    <hr />
</div>