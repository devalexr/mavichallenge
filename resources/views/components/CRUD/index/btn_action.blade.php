<ul class="list-inline mb-0">
    <li class="list-inline-item">
        <a href="{{$route}}/view/{{$id}}" class="px-2 text-info"><i class="bx bx-folder-open font-size-18"></i></a>
    </li>
    <li class="list-inline-item">
        <a href="{{$route}}/edit/{{$id}}" class="px-2 text-muted"><i class="uil uil-pen font-size-18"></i></a>
    </li>
    <li class="delete-link-confirm list-inline-item" data-url="{{$route}}/delete/{{$id}}" >
        <span class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></span>
    </li>
</ul>