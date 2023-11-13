<div class="d-flex flex-wrap gap-2">
    @foreach($buttons as $A_btn)
        <?php 
        $S_icon = isset($A_btn['icon']) ? $A_btn['icon'] : null;
        $S_type = 'outline-light';

        switch($A_btn['type']) {
            case 'edit':
                $S_icon = 'uil-edit-alt';
            break;
            case 'add':
                $S_type = 'primary';
                $S_icon = 'uil-plus';
            break;
        }
        switch ($A_btn['type']): 
            case 'edit':  
            case 'add':
            ?>
                <x-ui.buttons.default 
                    url="{{$A_btn['url']}}" 
                    type="{{$S_type}}" 
                    text="{{$A_btn['text']}}" 
                    icon={{$S_icon}} 
                    hideTextXS={{true}}
                />
            <?php break; ?>
            <?php 
            case 'delete':  
            ?>
                <x-ui.buttons.default 
                    url="{{$A_btn['url']}}" 
                    type="danger" 
                    text="Eliminar" 
                    icon="uil-trash-alt"
                    confirm="true"
                    hideTextXS={{true}}
                />
            <?php break; ?>
        <?php endswitch ?>
    @endforeach
</div>
