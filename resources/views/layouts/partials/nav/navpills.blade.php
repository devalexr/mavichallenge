<?php 
/*
$this->_navpillsSET([
    [
        'name' => 'Link 1',
        'url' => '/login',
        'icon' => 'uil-home-alt',
        'active' => true,
        'badge' => 300,
        'visible' => true, //opcional
    ],
    [
        'name' => 'Link 2',
        'url' => '/login',
        'badge' => 12,
    ],
    [
        'name' => 'Link 1',
        'url' => '/login',
        'icon' => 'uil-share-alt',
    ],
]);
*/


$A_btn_accion = isset($GUI_btn_accion) ? $GUI_btn_accion : [];
if(!$A_btn_accion) {
    $A_btn_accion = isset($GUI_navpills_btn) ? $GUI_navpills_btn : [];
}

?>

@if(isset($GUI_navpills) || $A_btn_accion)
<style type="text/css">
    #NAVPills{
       background-color: white;
       margin: -20px;
       @if(isset($GUI_navbar))
        margin-top: -10px;
       @endif
       margin-bottom: 20px;
       padding: 10px;
       height: 70px;
    }
    #NAVPills .nav-item{
        background-color: white;
        margin-right: 20px;
        margin-bottom: 6px;
        margin-top: 6px;
        padding-left: 10px;
        padding-right: 10px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
       
    }

    #NAVPills .nav-item i {
        font-size: 20px;
        margin-right: -10px;
        color: var(--bs-green-intelix);
        margin-top: 2px;
    }

    #NAVPills .nav-item:hover{
        background-color:var(--bs-body-bg);
        cursor: pointer;
    }

    #NAVPills .nav-item a:hover{
        color: var(--bs-green-intelix);
    }

    #NAVPills .nav-item a{
        color: var(--bs-sidebar-menu-item-color);
    }   

    #NAVPills .nav-item.active {
        background-color: var(--bs-green-intelix);
    }
    #NAVPills .nav-item.active i{
        color: var(--bs-sidebar-menu-item-color);
    }
    #NAVPills .nav-item.active a{
        color: white;
        font-weight: bold;
    }

    #NAVPills .nav-item.active i{
        color: white;
    }

    #NAVPills .badge {
        margin-left: -8px;
    }

    #NAVPillsBTNContainer{
        position: absolute;
        right: 14px;
        margin-top: 8px;
    }
   
    @media (min-width: 312px) {
        #NAVPills .nav-item{
            padding-right: 18px;
        }
    }
</style>

<ul class="nav justify-content-center" id="NAVPills">

    @if(isset($GUI_navpills))
        @foreach($GUI_navpills as $A_element)
            <?php 
            if(isset($A_element['visible']) && !$A_element['visible']) {
                continue;
            }

            $S_a_class = isset($A_element['icon']) ? 'd-none d-sm-block' : '';
            $S_li_class = isset($A_element['active']) && $A_element['active'] ? ' active ' : '';
            ?>
            <li class="nav-item {{$S_li_class}}">
                @if(isset($A_element['icon']))
                    <i class="{{$A_element['icon']}}"></i>
                @endif
                <a class="nav-link {{$S_a_class}}" aria-current="page" href="{{$A_element['url']}}">
                    {{$A_element['name']}}
                </a>
                @if(isset($A_element['badge']))
                    <x-ui.badge value="{{$A_element['badge']}}" class="primary" />
                @endif
            </li>
        @endforeach
    @endif
    @isset($A_btn_accion)
        <div id="NAVPillsBTNContainer">
            <?php 
            /*
            $this->_navpillsBTNSET([
                [
                    'type' => 'edit',
                    'text' => 'Modificar mis datos',
                    'url' => '/profile/profile_edit',
                ],
            ]);
            */
            ?>
            @include('layouts/partials/nav/btn/btn_accion', [
                'buttons' => $A_btn_accion
            ])
        </div>
    @endif
</ul>

<script>
var LIS_navpills = $('#NAVPills li');
LIS_navpills.on('click', function(){
    var LINK_navpills = $(this).find('a');
    window.location.replace(LINK_navpills.attr('href'));
});
</script>

@endif