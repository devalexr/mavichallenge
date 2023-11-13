@if(Session::has('flash_message'))
    <div class="alert alert-{{Session::get('flash_message_class')}}" role="alert">
        {{Session::get('flash_message')}}
        <button style="position: absolute; top: 6px; right: 10px;  width: 2px;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif