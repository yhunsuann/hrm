<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap coreUi Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,coreUi,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Bravo</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('coreUi/assets/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('coreUi/css/vendors/simplebar.css')}}">
    <link href="{{ asset('coreUi/css/style.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,100&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ asset('coreUi/css/examples.css')}}" rel="stylesheet">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
</head>
<body>
    <div>
        <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card-group d-block d-md-flex row">
                            <div class="card col-md-7 p-4 mb-0">
                                <div class="card-body text-center">
                                    <h1>Login</h1>
                                    <p class="text-medium-emphasis">Sign In to your account</p>
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif
                                    <form method="post" class="form-login">
                                        @csrf
                                        <div class="input-group mb-3"><span class="input-group-text">
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                                                </svg></span>
                                            <input class="form-control" name="email" type="text" placeholder="Username">
                                        </div>
                                        <div class="input-group mb-4"><span class="input-group-text">
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                                                </svg></span>
                                            <input class="form-control" name="password" type="password" placeholder="Password">
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <input class="btn btn-primary px-4 mx-auto d-block a-forgetpass" type="submit" value="Login"></input>
                                                <a href="{{ route('admin.forgot-password') }}" class="float-end text-decoration-none">Forget Pass</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('coreUi/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('coreUi/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script>
    </script>
</body>

</html>