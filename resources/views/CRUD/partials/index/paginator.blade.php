<?php 
$A_paginator = $PAGINATION_index->toArray();
$URL_get_parameters = '';
$B_show_arrows = isset($show_arrows) ? $show_arrows : true;

$A_parameters = (array) Request()->all();
foreach($A_parameters as $S_parameter => $S_value) {
    if($S_parameter === 'page')
        continue;
    $URL_get_parameters.= '&' . $S_parameter .'=' .$S_value;
}
?>
<div class="row mt-4">
    <hr class="my-4">
    <div class="col-sm-6">
        <div>
            <p class="mb-sm-0"><strong>Pagina {{$A_paginator['current_page']}} de {{$A_paginator['last_page']}}</strong></p>
            <?php 
            $I_registros = sizeof($A_paginator['data']);
            ?>
            <p class="card-title-desc">
                Mostrando: {{$I_registros}} registros de {{$A_paginator['total']}} en total. 
                @if($I_registros === $A_paginator['per_page'])
                    Comenzando en el registro {{($A_paginator['current_page'] * $A_paginator['per_page'] - $A_paginator['per_page']) + 1}} 
                    y terminando en {{$A_paginator['current_page'] * $A_paginator['per_page']}}.
                @else
                    <?php 
                    $I_comenzando = $A_paginator['total'] - $I_registros;
                    $I_comenzando = ($I_comenzando === 0) ? 1 : $I_comenzando;
                    ?>
                    Comenzando en el registro {{$I_comenzando}}
                    y terminando en {{$A_paginator['total']}}.
                @endif
            </p>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="float-sm-end">
            <ul class="pagination mb-sm-0">
                @if($A_paginator['current_page'] > 1 && $B_show_arrows)
                    <li class="page-item">
                        <a class="page-link" href="{{$A_paginator['first_page_url'].$URL_get_parameters}}">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </li>
                @endif
                <?php for($I_i = -3; $I_i < 5; $I_i++) : ?>
                    <?php 
                    $I_page = $A_paginator['current_page'] + $I_i;
                    if($I_page < 1) {
                        continue;
                    }
                    if($I_page > $A_paginator['last_page']) {
                        break;
                    }
                    ?>
                    <li class="page-item {{$A_paginator['current_page'] === $I_page ? 'active' : '' }}">
                        <a class="page-link" href="{{$A_paginator['path'].'?page='.$I_page.$URL_get_parameters}}">{{$I_page}}</a>
                    </li>
                <?php endfor; ?>
                @if($A_paginator['current_page'] < $A_paginator['last_page'] && $B_show_arrows)
                    <li class="page-item">
                        <a class="page-link" href="{{$A_paginator['last_page_url'].$URL_get_parameters}}">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>