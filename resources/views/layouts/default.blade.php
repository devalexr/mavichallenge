<!DOCTYPE html>
<html lang="es">
    @include('layouts/head/head')
    <body>
        <div id="layout-wrapper">
            @include('layouts/partials/header')
            @include('layouts/partials/nav/menu_vertical')
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @include('layouts/partials/nav/navbar')
                        @include('layouts/partials/nav/navpills')
                        @include('layouts/partials/nav/breadcrumb')
                        <x-ui.messages.flash />
                        @yield('content')
                    </div>
                </div>
                @include('layouts/partials/footer')
            </div>
        </div>
        @include('layouts/partials/right_bar')
        @include('layouts/resources/js')
    </body>
</html>
