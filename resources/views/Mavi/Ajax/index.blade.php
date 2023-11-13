
<?php foreach($A_clients as $A_client): ?>
    <tr>
        <td>{{$A_client['name']}}</td>
        <td>{{$A_client['last_name']}}</td>
        <td><small><p>{{$A_client['address']}}</p></small></td>
        <td>{{$A_client['email']}}</td>
        <td><x-ui.text.datetime_ago value="{{$A_client['updated_at']}}" /></td>
        <td>
            <x-CRUD.index.btn_action route="/clients" id="{{$A_client['id']}}" />
        </td>
    </tr>
<?php endforeach; ?>