<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Print</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/static/css/bootstrap.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/static/css/style.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/static/css/font-awesome.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/static/css/lightslider.css") }}" />
</head>

<body>
    <div class="container">
        <header>
            <div class="header">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="/"><img src="{{ asset("assets/static/images/logo.png") }}" alt="logo"></a>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                            <li class="nav-item "><a href="/" class="nav-link">
                                    ALL products</a></li>
                            <li class="nav-item "><a href="/services" class="nav-link">business services
                                </a></li>
                            <li class="nav-item "><a href="/contact-us" class="nav-link">Contact Us
                                </a></li>
                            <li class="nav-item "><a href="#" class="nav-link">Franchise
                                </a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </div>

    @yield("content")

    <footer class="full-container footer">
        <div class="footer-inner">
            <div class="row m0">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <h2>Useful links</h2>
                    <ul>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Terms and Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <h2>Follow us</h2>
                    <ul class="social-list">
                        <li>
                            <a href="#"><img src="{{ asset("assets/static/images/fb-icon.png") }}" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset("assets/static/images/insta-icon.png") }}" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </div>
        <p class="text-center">CaliPrintWork. All rights reserved</p>
    </footer>
</body>
<script src="{{ asset("assets/static/js/jquery.min.js") }}"></script>
<script src="{{ asset("assets/static/js/bootstrap.js") }}"></script>
<script src="{{ asset("assets/static/js/lightslider.js") }}"></script>
<script src="{{ asset("assets/static/js/main.js") }}"></script>

</html>
