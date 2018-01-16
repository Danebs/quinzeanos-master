<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Quicksand:300,400,500,700|Chewy" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />

    <!-- Pet Demo Specific Stylesheet -->
    <link rel="stylesheet" href="css/pet.css" type="text/css" />
    <link rel="stylesheet" href="css/fonts.css" type="text/css" />

    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/colors.php?color=f0a540" type="text/css" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    @yield('header')
    <!-- Slider
    ============================================= -->
    @yield('slider')
    <!-- Content
    ============================================= -->
    <section id="content">
        @yield('content')
    </section>

    <!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">

        <div class="container clearfix">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap clearfix">

                <div class="col_one_fourth">
                    <div class="widget clearfix">

                        <p>{{$empresa->resume}}</p>

                        <div>
                            @foreach($address as $addr)
                                <address>
                                    <p><b>{{$addr->name}}</b> <br/>
                                        {{$addr->city}} <br/>
                                        {{$addr->neighborhood}}<br/>
                                        {{$addr->address}}<br></p>
                                </address>
                            @endforeach

                            @foreach($contacts as $contact)

                                    @if($contact->type_contact_id==1 || $contact->type_contact_id==2)
                                        <abbr title="Phone Number"><strong>Telefone:</strong></abbr> {{$contact->contact}}<br>
                                    @endif
                                    @if($contact->type_contact_id==3)
                                            <abbr title="Email Address"><strong>Email:</strong></abbr> {{$contact->contact}}
                                        @endif
                                        @if($contact->type_contact_id==4)
                                            <abbr title="Skype"><strong>Skype:</strong></abbr> {{$contact->contact}}
                                        @endif
                                        @if($contact->type_contact_id==5)
                                            <abbr title="Whatsapp"><strong>Whatsapp:</strong></abbr> {{$contact->contact}}
                                        @endif

                                @endforeach
                        </div>

                    </div>
                </div>

                <div class="col_one_fourth">
                    <div class="widget widget_links clearfix">

                        <h4>Nosso site</h4>
                        <ul>
                            <li><a href="http://codex.wordpress.org/">Página Inicial</a></li>
                            <li><a href="http://wordpress.org/support/forum/requests-and-feedback">Vitrine</a></li>
                            <li><a href="http://wordpress.org/extend/plugins/">Nossa coleção</a></li>
                            <li><a href="http://wordpress.org/support/">Sobre nós</a></li>
                            <li><a href="http://wordpress.org/extend/themes/">Contate-nos</a></li>

                        </ul>


                    </div>
                </div>

                <div class="col_one_fourth">
                    <div class="widget widget_links clearfix">

                        <h4>Essa página</h4>

                        <ul>
                            <li><a href="http://codex.wordpress.org/">Inicio</a></li>
                            <li><a href="http://wordpress.org/support/forum/requests-and-feedback">O que fazemos?</a></li>
                            <li><a href="http://wordpress.org/extend/plugins/">Nossos clientes</a></li>
                            <li><a href="http://wordpress.org/support/">Um pouco de nossa coleção</a></li>
                            <li><a href="http://wordpress.org/extend/themes/">Nossos principais vestidos</a></li>
                            <li><a href="http://wordpress.org/news/">Saiba mais sobre nós</a></li>
                            <li><a href="http://planet.wordpress.org/">Como entrar em contato</a></li>
                        </ul>

                    </div>
                </div>

                <div class="col_one_fourth col_last">
                    <div class="widget center clearfix" style="border: 2px dashed #AAA; ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.7905313823826!2d-43.949249629108834!3d-19.933229981199418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699fc9746877b%3A0xb47786be02aad17!2sEdif%C3%ADcio+Mariana!5e0!3m2!1spt-BR!2sbr!4v1514335207788" width="800" height="800" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

            </div><!-- .footer-widgets-wrap end -->

        </div>

        <div class="line nomargin"></div>

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Direitos reservados &copy; {{date('Y') }} Todos os direitos Reservados à <strong>{{ config('app.name')}}</strong>.
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        @if(!empty($empresa->facebook))
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        @endif
                        @if(!empty($empresa->twitter))
                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        @endif
                        @if(!empty($empresa->google_plus))
                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>
                        @endif
                    </div>
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
</body>
</html>
