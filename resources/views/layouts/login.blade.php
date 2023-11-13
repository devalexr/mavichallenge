<!DOCTYPE html>
<html lang="es">
    @include('layouts/head/head')
    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="/" class="mb-5 d-block auth-logo">
                                <img src="/images/logo-dark.png" alt="" height="50" class="logo logo-dark">
                                <img src="/images/logo-light.png" alt="" height="50" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                @yield('content')
                <div class="mt-5 text-center">
                    <p>© <script>2023</script> {{env('APP_NAME')}} es un software desarrollado por <a href="https://intelixlabs.com/" target="_BLANK">Alejandro Robles</a></p>
                </div>
            </div>
        </div>
        @include('layouts/resources/js')
    </body>
</html>
