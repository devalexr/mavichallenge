@if($value !== null && $value !== "")
    @if($value)
        <span class="badge rounded-pill bg-success"><i class="uil-check"></i></span>
    @else
        <span class="badge rounded-pill bg-soft-dark"><i class="uil-times"></i></span>
    @endif
@endif
