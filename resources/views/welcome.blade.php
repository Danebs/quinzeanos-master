@extends('layouts.app')
@component('components.header',['transparent'=>true])
@endcomponent
@component('components.slider')
@endcomponent
@section('content')
<div class="content-wrap notoppadding clearfix">

            <div class="section nomargin clearfix" style="background-color: #eef2f5;">
                <div class="container clearfix">

                    <div class="heading-block center nobottomborder bottommargin topmargin-sm divcenter" style="max-width: 640px">
                        <h3 class="nott font-secondary t400" style="font-size: 36px;">Seu Momento</h3>
                        <span>15 anos é a marca da transição, lembre-se desses momentos com o vestido perfeito para a ocacisão. </span>
                    </div>

                    <div class="row clearfix">
                        <!-- Features colomns
                        ============================================= -->
                        <div class="row clearfix">
                            <div class="col-md-3 col-sm-6 bottommargin-sm">
                                <div class="feature-box media-box fbox-bg">
                                    <div class="fbox-media">
                                        <a href="#"><img class="image_fade" src="images/services/vestidos1.png" alt="Featured Box Image"></a>
                                    </div>
                                    <div class="fbox-desc noborder">
                                        <h3 class="nott ls0 t600">Vestidos Clássicos<span class="subtitle t300 ls0">Vestido clássicos para uma boa festa de 15 anos.</span></h3>
                                        <a href="#" class="button-link noborder color">SAIBA MAIS</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 bottommargin-sm">
                                <div class="feature-box media-box fbox-bg">
                                    <div class="fbox-media">
                                        <a href="#"><img class="image_fade" src="images/services/vestidos2.png" alt="Featured Box Image"></a>
                                    </div>
                                    <div class="fbox-desc noborder">
                                        <h3 class="nott ls0 t600">Diversos estilos<span class="subtitle t300 ls0">Diferentes vestidos trazendo diversas possibilidades</span></h3>
                                        <a href="#" class="button-link noborder color">SAIBA MAIS</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 bottommargin-sm">
                                <div class="feature-box media-box fbox-bg">
                                    <div class="fbox-media">
                                        <a href="#"><img class="image_fade" src="images/services/vestidos3.png" alt="Featured Box Image"></a>
                                    </div>
                                    <div class="fbox-desc noborder">
                                        <h3 class="nott ls0 t600">Preço certo<span class="subtitle t300 ls0">O vestido especial que caiba em suas condiçoes.</span></h3>
                                        <a href="#" class="button-link noborder color">SAIBA MAIS</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 bottommargin-sm">
                                <div class="feature-box media-box fbox-bg">
                                    <div class="fbox-media">
                                        <a href="#"><img class="image_fade" src="images/services/vestidos4.png" alt="Featured Box Image"></a>
                                    </div>
                                    <div class="fbox-desc noborder">
                                        <h3 class="nott ls0 t600">Conforto e Qualidade<span class="subtitle t300 ls0">Toda a elegância e estilo sem perder o conforto e qualidade.</span></h3>
                                        <a href="/" class="button-link noborder color">SAIBA MAIS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container topmargin clearfix">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="heading-block nobottomborder topmargin-sm nobottommargin">
                            <h2 class="font-secondary ls1 nott t400">O que falam de nós em nossas redes sociais</h2>
                            <br/>
                            <span>Nós nos preocupamos com sua opinião para construirmos um bom trabalho,<br/> por isso gostariamos que você acompanha-se nossas redes sociais,<br/> para que possamos nos conhecer melhor</span>
                            <br/>
                            <a href="#" class="social-icon si-large si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="social-icon si-large si-borderless si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="social-icon si-large si-borderless si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>
                            <div class="line line-sm"></div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div>
                                    <div class="counter counter-small color"><span data-from="10" data-to="100" data-refresh-interval="50" data-speed="10"></span>+</div>
                                    <h5 class="color t600 nott notopmargin" style="font-size: 16px;">seguidores em nosso Twitter</h5>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div>
                                    <div class="counter counter-small" style="color: #22c1c3;"><span data-from="10" data-to="145" data-refresh-interval="50" data-speed="700"></span>+</div>
                                    <h5 class="t600 nott notopmargin" style="color: #22c1c3; font-size: 16px;">seguidores em nossa página no Facebook</h5>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div>
                                    <div class="counter counter-small" style="color: #BD3F32;"><span data-from="10" data-to="50" data-refresh-interval="85" data-speed="1200"></span>+</div>
                                    <h5 class="t600 nott notopmargin" style="color: #BD3F32; font-size: 16px;">seguidores no Google+</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget" data-nav="false" data-animate-in="slideInUp" data-animate-out="slideOutUp" data-autoplay="5000" data-loop="true" data-stage-padding="5" data-margin="10" data-items-xs="1" data-items-sm="1" data-items-lg="1">

                            <div class="oc-item">
                                <div class="testimonial topmargin-sm">
                                    <div class="testi-image">
                                        <a href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Ligula scelerisque, tempus dicta eros dolorum itaque fugit, tempore pellentesque, leo dolor, aenean, inceptos aptent nostra adipisci harum etiam explicabo.</p>
                                        <div class="testi-meta">
                                            Mary Jane &middot;
                                            <span>Facebook</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="testimonial topmargin-sm">
                                    <div class="testi-image">
                                        <a href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Sint quae anim enim quaerat! Assumenda esse metus torquent, senectus similique tempor? Massa lacus a, dignissim sequi officiis, elementum non.</p>
                                        <div class="testi-meta">
                                            Rick Rich  &middot;
                                            <span>Twitter.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="oc-item">
                                <div class="testimonial topmargin-sm">
                                    <div class="testi-image">
                                        <a href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Placeat ultrices perferendis omnis consequat molestie quos pretium! Donec deserunt ratione ultrices laborum vehicula rutrum deserunt! Torquent officiis? Et occaecati.</p>
                                        <div class="testi-meta">
                                            Jane Doe &middot;
                                            <span>Facebook.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial topmargin-sm">
                                    <div class="testi-image">
                                        <a href="#"><img src="images/testimonials/4.jpg" alt="Customer Testimonails"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Occaecat autem turpis mollis ac nam cubilia, culpa adipiscing per cubilia porta fugit numquam dignissim sequi. Aspernatur aliquip. Ornare molestias.</p>
                                        <div class="testi-meta">
                                            Bill Donald &middot;
                                            <span>Google+.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="section nobottommargin clearfix">
                <div class="heading-block center nobottomborder nobottommargin divcenter" style="max-width: 640px">
                    <h3 class="nott font-secondary t400" style="font-size: 36px;">Incríveis Festas</h3>
                    <span>Algumas imagens de debutantes que escolheram Meus 15 Anos e tiveram momentos inesquecíveis em sua data especial.</span>
                </div>
            </div>

            <div class="masonry-thumbs col-6" data-big="3" data-lightbox="gallery">
                <a href="images/gallery/1.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/1.jpg" alt="Gallery Thumb 1"></a>
                <a href="images/gallery/2.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/2.jpg" alt="Gallery Thumb 2"></a>
                <a href="images/gallery/3.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/3.jpg" alt="Gallery Thumb 3"></a>
                <a href="images/gallery/4.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/4.jpg" alt="Gallery Thumb 4"></a>
                <a href="images/gallery/5.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/5.jpg" alt="Gallery Thumb 5"></a>
                <a href="images/gallery/6.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/6.jpg" alt="Gallery Thumb 6"></a>
                <a href="images/gallery/7.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/7.jpg" alt="Gallery Thumb 7"></a>
                <a href="images/gallery/8.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/8.jpg" alt="Gallery Thumb 8"></a>
                <a href="images/gallery/9.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/9.jpg" alt="Gallery Thumb 9"></a>
                <a href="images/gallery/10.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/10.jpg" alt="Gallery Thumb 10"></a>
                <a href="images/gallery/11.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/11.jpg" alt="Gallery Thumb 11"></a>
                <a href="images/gallery/12.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/12.jpg" alt="Gallery Thumb 12"></a>
                <a href="images/gallery/13.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/13.jpg" alt="Gallery Thumb 13"></a>
                <a href="images/gallery/14.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/14.jpg" alt="Gallery Thumb 14"></a>
                <a href="images/gallery/15.jpg" data-lightbox="gallery-item"><img src="images/gallery/thumbs/15.jpg" alt="Gallery Thumb 15"></a>
            </div>

            <div class="section nomargin nobg clearfix">
                <div class="container clearfix">
                    <div class="heading-block center nobottomborder divcenter" style="max-width: 640px">
                        <h3 class="nott font-secondary t400" style="font-size: 36px;">Nossos principais vestidos</h3>
                        <span>Veja o estilo que mais vem cativando as noivas nesses ultimos tempos.</span>
                    </div>
                    <div class="row topmargin clearfix">
                        <div class="col-md-5 hidden-sm hidden-xs">
                            <img src=" images/others/1.png" alt="Dogs">
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <div class="row clearfix">
                                <div class="col-sm-4 col-xs-6">
                                    <div class="iproduct">
                                        <div class="product-image noshadow">
                                            <a href="#"><img class="image_fade" src=" images/products/1.jpg" alt="High-Heel Girl's Sandals"></a>
                                        </div>
                                        <div class="product-desc center">
                                            <div class="product-title"><h3><a href="#">O sonho da noiva</a></h3></div>
                                            <!--<div class="product-price"><ins>$11.49</ins></div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="iproduct">
                                        <div class="product-image noshadow">
                                            <a href="#"><img class="image_fade" src=" images/products/2.jpg" alt="High-Heel Girl's Sandals"></a>
                                        </div>
                                        <div class="product-desc center">
                                            <div class="product-title"><h3><a href="#">Vestido tradicional</a></h3></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="iproduct">
                                        <div class="product-image noshadow">
                                            <a href="#"><img class="image_fade" src=" images/products/3.jpg" alt="High-Heel Girl's Sandals"></a>
                                        </div>
                                        <div class="product-desc center">
                                            <div class="product-title"><h3><a href="#">Bem casando</a></h3></div>
                                            <!--<div class="product-price"><ins>$14.49</ins></div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section dark parallax nomargin" style="background-image: url(' images/others/footer2.png'); padding: 140px 0;" data-stellar-background-ratio="0.3">
                <div class="container center clearfix">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="heading-block nobottomborder nobottommargin">
                                <div class="before-heading lowercase ls1" style="color: #FFF; font-style: normal;">Gostou de nosso vestidos?</div>
                                <h3 class="nott font-secondary t400" style="font-size: 32px;">Quer saber um pouco mais sobre nós.</h3>
                                <a href="#" class="button button-large button-circle button-border button-white button-light topmargin-sm noleftmargin">Veja Nossa história</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container topmargin-lg clearfix">
                <div class="heading-block center nobottomborder divcenter" style="max-width: 640px">
                    <h3 class="nott font-secondary t400" style="font-size: 36px;">Entre em contanto conosco</h3>
                    <span>Entre em contato e ouviremos seu pedido e ajudaremos a escolher o vestido certo cada ocassião.</span>
                </div>
                <div class="row contact-properties clearfix">
                    <div class="col-sm-4">
                        <a href="#" style="background: url(' images/help/help2.png') no-repeat center center; background-size: cover;">
                            <div class="vertical-middle dark center">
                                <div class="heading-block nomargin noborder">
                                    <h3 class="capitalize t400 font-secondary">Nosso endereço</h3>
                                    <span style="margin-top: 100px; font-size: 17px; font-weight: 500;">
											Av. Afonso Pena, 526 - Sala 514<br>
											Ed. Mariana - Centro, Belo Horizonte, BR
										</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" style="background: url(' images/help/help1.png') no-repeat center center; background-size: cover;">
                            <div class="vertical-middle dark center">
                                <div class="heading-block nomargin noborder">
                                    <h3 class="capitalize t400 font-secondary">Ligue para nós</h3>
                                    <span style="margin-top: 100px; font-size: 17px; font-weight: 500;">
											Nosso número<br>
											+55 (31) 3272-0510
										</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" style="background: url(' images/help/help3.png') no-repeat center center; background-size: cover;">
                            <div class="vertical-middle dark center">
                                <div class="heading-block nomargin noborder">
                                    <h3 class="capitalize t400 font-secondary">Envie-nos um e-mail</h3>
                                    <span style="margin-top: 100px; font-size: 17px; font-weight: 500;">
											E-mail para contatos<br>
											exemplos@exemplo.com
										</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
@endsection