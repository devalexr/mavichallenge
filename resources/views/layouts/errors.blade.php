<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>¡Upsss! Ha ocurrido algo...  |  {{env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="/template/images/favicon.ico">
        <!-- Bootstrap Css -->
        <link href="/template/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="/template/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="/template/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
        <link href="/template/css/template.css" rel="stylesheet" type="text/css">
    </head>
    <body class="authentication-bg">
        <div class="my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-4">
                                        <div class="error-img">
                                            <img src="/template/images/500-error.png" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @yield('content')
                            <div class="mt-5">
                                <a class="btn btn-primary waves-effect btn-url w-100" href="/admin/dashboard">Regresar al Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>