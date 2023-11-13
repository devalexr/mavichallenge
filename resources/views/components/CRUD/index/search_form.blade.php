<div class="row mb-2">
    <div class="col-md-12">
        <div class="form-inline float-md-end mb-3">
            <div class="search-box ms-2">
                <div class="position-relative">
                    <form method="GET">
                        <input 
                            name="q" 
                            type="text" 
                            class="form-control rounded bg-light border-0" 
                            placeholder="Buscar . . . "
                            value="{{ Request::get('q') }}"
                        >
                        <i class="mdi mdi-magnify search-icon"></i>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>