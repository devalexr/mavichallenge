

<?php 
/*
$this->_navbarSET([
    [
        'icon' => 'uil-home-alt',
        'name' => 'Dashboard',
        'url' => '/dashboard',
        'active' => true,
    ],
    [
        'icon' => 'uil-home-alt',
        'name' => 'MENU 1',
        'active' => false,
        'elements' => [
            ['name' => 'Item 1', 'url' => '/dashboard'],
            ['name' => 'Item 2', 'url' => '/dashboard'],
            [
                'name' => 'Item 3',
                'links' => [
                    ['name' => 'Item 4', 'url' => '/dashboard'],
                    ['name' => 'Item 5', 'url' => '/dashboard'],
                ]
            ]
        ]
    ],
    [
        'type' => 'mega',
        'icon' => 'uil-home-alt',
        'name' => 'MENU 2 (MEGA)',
        'active' => false,
        'elements' => [
            [
                'links' => [
                    ['name' => 'Item 1', 'url' => '/dashboard'],
                    ['name' => 'Item 2', 'url' => '/dashboard'],
                ]
            ],
            [
                'links' => [
                    ['name' => 'Item 3', 'url' => '/dashboard'],
                    ['name' => 'Item 4', 'url' => '/dashboard'],
                ]
            ]
        ]
    ]
]);
*/
?>

@if(isset($GUI_navbar))

<style type="text/css">
    #DIVNavbarContainer{
        margin-bottom: 18px;
    }
    #DIVNavbarTop{
        background-color: var(--bs-green-intelix);
        height: 60px;
        margin: -20px;
        margin-bottom: -30px;
        margin-top: -30px;
    }
    #BTNNavbarTop{
        margin-top: -30px;
    }
    
    #DIVNavbarContainer  .badge {
        margin-left: 8px;
    }
    </style>

<div>
    <div id="DIVNavbarTop">
    </div>
    <button id="BTNNavbarTop" type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light collapsed" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content" aria-expanded="false">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    <div class="topnav" id="DIVNavbarContainer">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    @foreach($GUI_navbar as $A_element)
                        @if(!isset($A_element['elements']))
                            {{NAVBARItemSimple($A_element)}}
                        @elseif(isset($A_element['type']) && $A_element['type'] == 'mega')
                            {{NAVBARItemMega($A_element)}}
                        @else
                            {{NAVBARItemDropdown($A_element)}}
                        @endif
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>

<script>
var LIS_nav_dropdown = $('.nav-dropdown');
LIS_nav_dropdown.each(function(i, LI_nav_dropdown){

    var I_badge_total = 0;

    //nivel 1
    var LINKS_nav_dropdown_1 = $(LI_nav_dropdown).find('.nav-dropdown-1');

    LINKS_nav_dropdown_1.each(function(j, LINK_nav_dropdown_1){
        if($(LINK_nav_dropdown_1).find('.badge').html()) {
            I_badge_total += parseInt($(LINK_nav_dropdown_1).find('.badge').html());
        }
    });

    //nivel 2 (multinivel)
    var DIVS_nav_dropdown_2 = $(LI_nav_dropdown).find('.nav-dropdown-2');

    DIVS_nav_dropdown_2.each(function(j, DIV_nav_dropdown_1){

        var I_bage_nav_dropdown_2 = 0;
        var SPANS_badge = $(DIV_nav_dropdown_1).find('.badge');

        if(SPANS_badge) {
            SPANS_badge.each(function(k, SPAN_badge){
                var I_bage = parseInt($(SPAN_badge).html());
                I_bage_nav_dropdown_2 += I_bage;
            });
        }

        if(I_bage_nav_dropdown_2) {
            var LINK_dropdown_toggle = $(DIV_nav_dropdown_1).find('.dropdown-toggle');
            const HTML_dropdown_toggle = LINK_dropdown_toggle.html();

            LINK_dropdown_toggle.html(HTML_dropdown_toggle + '<span class="badge rounded-pill bg-primary">'+I_bage_nav_dropdown_2+'</span>');
        }

        I_badge_total += I_bage_nav_dropdown_2;
    });

    if(I_badge_total) {
        $(LI_nav_dropdown).find('.badge-total').html( '<span class="badge rounded-pill bg-primary">'+I_badge_total+'</span>')
    }

});

var LIS_nav_dropdown_mega = $('.nav-dropdown-mega');
LIS_nav_dropdown_mega.each(function(i, LI_nav_dropdown_mega){
    var I_badge_total = 0;
    var SPANS_badge = $(LI_nav_dropdown_mega).find('.badge');
    SPANS_badge.each(function(j, SPAN_badge){
        I_badge_total += parseInt($(SPAN_badge).html());
    }); 

    if(I_badge_total) {
        $(LI_nav_dropdown_mega).find('.badge-total').html('<span class="badge rounded-pill bg-primary">'+I_badge_total+'</span>');
    }
});
</script>

@endif

<?php function NAVBARItemSimple($A_element){ if(isset($A_element['visible']) && !$A_element['visible']) { return; } ?>
    <li class="nav-item">
        <a class="nav-link {{isset($A_element['active']) && $A_element['active'] ? 'active' : ''}}" href="{{$A_element['url']}}">
            @if(isset($A_element['icon']))
                <i class="{{$A_element['icon']}}"></i> 
            @endif
            {{$A_element['name']}}
            @if(isset($A_element['badge']))
                <span class="badge rounded-pill bg-primary">{{$A_element['badge']}}</span>
            @endif
        </a>
    </li>
<?php } ?>

<?php function NAVBARItemMega($A_element){ ?>

    <?php $ID_menu = 'MENU'. Str::slug($A_element['name'], '');  ?>

    <li class="nav-item dropdown nav-dropdown-mega {{isset($A_element['active']) && $A_element['active'] ? 'active' : ''}}">
        <a class="nav-link dropdown-toggle arrow-none" href="#" id="{{$ID_menu}}" role="button">
            @if(isset($A_element['icon']))
                <i class="{{$A_element['icon']}}"></i> 
            @endif
            {{$A_element['name']}} 
            <span class="badge-total"></span>
            <div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl" aria-labelledby="{{$ID_menu}}">
            <div class="row">
                <?php foreach($A_element['elements'] as $A_block): ?>
                    <div class="col-lg-4">
                        <div>
                            <?php foreach($A_block['links'] as $A_link): ?>
                                <?php if(isset($A_link['visible']) && !$A_link['visible']) { continue; } ?>
                                <a href="{{$A_link['url']}}" class="dropdown-item">
                                    {{$A_link['name']}}
                                    @if(isset($A_link['badge']))
                                        <span class="badge rounded-pill bg-primary">{{$A_link['badge']}}</span>
                                    @endif
                                </a>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </li>
<?php } ?>

<?php function NAVBARItemDropdown($A_element){ if(isset($A_element['visible']) && !$A_element['visible']) { return; } ?>

    <?php $ID_menu = 'MENU'. Str::slug($A_element['name'], '');  ?>

    <li class="nav-item dropdown nav-dropdown">
        <a class="nav-link dropdown-toggle arrow-none" href="#" id="{{$ID_menu}}" role="button">
            @if(isset($A_element['icon']))
                <i class="{{$A_element['icon']}}"></i> 
            @endif
            
            {{$A_element['name']}} 
            <span class="badge-total"></span>
            <div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="{{$ID_menu}}">
            <?php foreach($A_element['elements'] as $A_link):  ?>
                <?php if(isset($A_link['links'])): ?>
                    <?php if(isset($A_link['visible']) && !$A_link['visible']) { continue; } ?>
                    <div class="dropdown nav-dropdown-2">
                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email" role="button">
                            {{$A_link['name']}} 
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <?php foreach($A_link['links'] as $A_link_child): ?>
                                <?php if(isset($A_link_child['visible']) && !$A_link_child['visible']) { continue; } ?>
                                <a href="{{$A_link_child['url']}}" class="dropdown-item">
                                    {{$A_link_child['name']}}
                                    @if(isset($A_link_child['badge']))
                                        <span class="badge rounded-pill bg-primary">{{$A_link_child['badge']}}</span>
                                    @endif
                                </a>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if(isset($A_link['visible']) && !$A_link['visible']) { continue; } ?>
                    <a href="{{$A_link['url']}}" class="dropdown-item  nav-dropdown-1">
                        {{$A_link['name']}}
                        @if(isset($A_link['badge']))
                            <span class="badge rounded-pill bg-primary">{{$A_link['badge']}}</span>
                        @endif
                    </a>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
    </li>
<?php } ?>