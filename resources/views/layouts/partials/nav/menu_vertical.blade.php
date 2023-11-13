<div class="vertical-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/admin/dashboard" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/template/images/logo-sm.png" height="36">
            </span>
            <span class="logo-lg">
                <img src="/template/images/logo-dark.png" height="36">
            </span>
        </a>
        <a href="/admin/dashboard" class="logo logo-light">
            <span class="logo-sm">
                <img src="/template/images/logo-sm.png" height="36">
            </span>
            <span class="logo-lg">
                <img src="/template/images/logo-light.png" height="36">
            </span>
        </a>
    </div>
    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    <div data-simplebar="" class="sidebar-menu-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @foreach($GUI_menu as $A_item)
                    @if(isset($A_item['title']))
                        <li class="menu-title">{{$A_item['title']}}</li>
                    @elseif(!isset($A_item['elements']))
                        <?php MENUItemSimple($A_item);  ?>
                    @elseif(!MENUCheckElementsContainsElements($A_item))
                        <?php MENUItemSubnivel($A_item); ?>
                    @else
                        <?php MENUItemMultinivel($A_item); ?>
                    @endif
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>


<script>
var LIS_menu_item = $('.menu-li-item');
LIS_menu_item.each(function(i, LI_menu_item){
    var I_badge_total = 0;
    var SPANS_badge = $(LI_menu_item).find('.badge-countable');
    SPANS_badge.each(function(j, SPAN_badge){
        I_badge_total += parseInt($(SPAN_badge).html());
    });

    if(I_badge_total) {
        $(LI_menu_item).find('.badge-total').html('&nbsp;&nbsp;&nbsp;<span class="badge rounded-pill bg-primary">'+I_badge_total+'</span>');
    }
});

var LIS_menu_multi = $('.menu-li-multi');
LIS_menu_multi.each(function(i, LI_menu_multi){
    var I_badge_total = 0;
    var SPANS_badge = $(LI_menu_multi).find('.badge-countable');
    SPANS_badge.each(function(j, SPAN_badge){
        I_badge_total += parseInt($(SPAN_badge).html());
    });

    if(I_badge_total) {
        $(LI_menu_multi).find('.menu-li-item-title > .badge-total').html('&nbsp;&nbsp;&nbsp;<span class="badge rounded-pill bg-primary">'+I_badge_total+'</span>');
    }
});

</script>

<?php function MENUItemSimple($A_item){  if(isset($A_item['visible']) && !$A_item['visible']) { return; }  ?>
    <li>
        <a href="{{$A_item['url']}}">
            @if(isset($A_item['icon']))
                <i class="{{$A_item['icon']}}"></i>
            @endif
            @if(isset($A_item['badge']))
                <span class="badge rounded-pill bg-primary float-end badge-countable">{{$A_item['badge']}}</span>
            @endif
            <span>{{$A_item['name']}}</span>
        </a>
    </li>
<?php } ?>

<?php function MENUItemSubnivel($A_item){ if(isset($A_item['visible']) && !$A_item['visible']) { return; } ?>
    <li class="menu-li-item">
        <?php MENUItemTitleMultinivel($A_item); ?>
        <?php MENUSubmenuElements($A_item['elements']) ?>
    </li>
<?php } ?>

<?php function MENUItemMultinivel($A_item){ if(isset($A_item['visible']) && !$A_item['visible']) { return; } ?>
    <li class="menu-li-multi">
        <?php MENUItemTitleMultinivel($A_item, 'menu-li-item-title') ?>
        <ul class="sub-menu" aria-expanded="true">
            <?php foreach($A_item['elements'] as $A_element): ?>
                <?php if(!isset($A_element['elements'])): ?>
                    <?php MENUItemSimple($A_element) ?>
                <?php else:  ?>
                    <li class="menu-li-item">
                        @if(!(isset($A_element['visible']) && !$A_element['visible']))
                            <?php MENUItemTitleMultinivel($A_element) ?>
                            <?php MENUSubmenuElements($A_element['elements']); ?>
                        @endif
                    </li>
                <?php endif ?>
            <?php endforeach; ?>
        </ul>
    </li>
<?php } ?>

<?php function MENUItemTitleMultinivel($A_item, $S_class = ''){  if(isset($A_item['visible']) && !$A_item['visible']) { return; } ?>
    <a href="#" class="has-arrow waves-effect {{$S_class}}">
        @if(isset($A_item['icon']))
            <i class="{{$A_item['icon']}}"></i>
        @endif
        <span>{{$A_item['name']}}</span>
        <span class="badge-total"></span>
    </a>
<?php } ?>

<?php function MENUSubmenuElements($A_elements){ ?>
    <ul class="sub-menu" aria-expanded="false">
        <?php foreach($A_elements as $A_element): ?>
            <?php MENUItemSimple($A_element); ?>
        <?php endforeach ?>
    </ul>
<?php } ?>

<?php 
function MENUCheckElementsContainsElements($A_item) { 
    $B_contains = false;
    foreach($A_item['elements'] as $A_element) {
        if(isset($A_element['elements'])) {
            $B_contains = true;
            break;
        }
    }
    return $B_contains;
} 
?>

<?php 
/*
protected $_GUI_NAV_MENU = [
        ['title' => 'MENU'],
        [
            'name' => 'Dashboard',
            'icon' => 'uil-home-alt',
            'url' => '/admin/dashboard',
            'badge' => 6,
            'visible' => true, //opcional
        ],
        [
            'name' => 'Email',
            'icon' => 'uil-envelope',
            'visible' => true, //opcional
            'elements' => [
                [
                    'name' => 'Inbox',
                    'url' => '/email',
                    'badge' => 6,
                    'visible' => true, //opcional
                ],
                [
                    'name' => 'Read Email',
                    'url' => '/super',
                    'badge' => 3,
                    'visible' => true, //opcional
                ],
            ]
        ],
        [
            'name' => 'Email',
            'icon' => 'uil-envelope',
            'visible' => true, //opcional
            'elements' => [
                [
                    'name' => 'Inbox',
                    'url' => '/email',
                    'badge' => 1,
                    'visible' => true, //opcional
                ],
                [
                    'name' => 'Read Email',
                    'url' => '/super',
                    'badge' => 1,
                    'visible' => true, //opcional
                ],
            ]
        ],
        [
            'name' => 'Multi Level',
            'icon' => 'uil-share-alt',
            'visible' => true, //opcional
            'elements' => [
                [
                    'name' => 'Level 1',
                    'icon' => 'uil-share-alt',
                    'badge' => 6,
                    'visible' => true, //opcional
                    'elements' => [
                        [
                            'name' => 'Level 1.1',
                            'url' => '/level1.1',
                            'badge' => 6,
                            'visible' => true, //opcional
                        ],
                        [
                            'name' => 'Level 1.2',
                            'icon' => 'uil-home-alt',
                            'url' => '/level1.2',
                            'badge' => 3,
                            'visible' => true, //opcional
                        ],
                    ]
                ],
                [
                    'name' => 'Level 2',
                    'url' => '/level2',
                    'badge' => 3,
                    'visible' => true, //opcional
                ],
                [
                    'name' => 'Level 3',
                    'url' => '/level3',
                    'visible' => true, //opcional
                ],
                [
                    'name' => 'Level 4',
                    'icon' => 'uil-share-alt',
                    'badge' => 6,
                    'visible' => true, //opcional
                    'elements' => [
                        [
                            'name' => 'Level 4.1',
                            'url' => '/level1.1',
                            'badge' => 6,
                            'visible' => true, //opcional
                        ],
                        [
                            'name' => 'Level 4.2',
                            'icon' => 'uil-home-alt',
                            'url' => '/level1.2',
                            'badge' => 50,
                            'visible' => true, //opcional
                        ],
                    ]
                ],
            ]
        ],
    ];
*/
?>