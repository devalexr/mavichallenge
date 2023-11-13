@if (isset($GUI_breadcumb))
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">{{$GUI_view_title}}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach($GUI_breadcumb as $A_element)
                        <li class="breadcrumb-item">
                            <a href="{{$A_element['url']}}">{{$A_element['name']}}</a>
                        </li>
                    @endforeach
                    <li class="breadcrumb-item active">{{isset($GUI_breadcumb_index) ? $GUI_breadcumb_index : $GUI_view_title}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endif
