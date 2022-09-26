<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{asset('dist/img/logopolindra.ico')}}">
    <!-- <img class="img-circle elevation-2" alt="User Image"> -->

    <title>@yield('title')</title>
  <link href="auth/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="auth/css/components.css" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" type="text/css" href="css/util.css"> -->
  <link href="auth/css/peyton.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
      WebFont.load({
        google: {
          families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Merriweather:300,300italic,400,400italic,700,700italic,900,900italic", "Gothic A1:100,200,300,regular,500,600,700,800,900"]
        }
      });
    </script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">
      ! function(o, c) {
        var n = c.documentElement,
          t = " w-mod-";
        n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
      }(window, document);
    </script>
    <!-- <link href="auth/images/favicon.png" rel="shortcut icon" type="image/x-icon"> -->
  <link href="auth/images/webclip.png" rel="apple-touch-icon">
</head>
<body>
  <header class="section-header position-absolute bg-bg">
    <div class="container space-between align-middle ">
      <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
        <div class="navbar-container align-middle w-container">
          <div class="col lg-4 no-margin-bottom order-first no-padding-left col-logo xs-12 md-grow">
            <h4 href="/" class="brand on-polin w-nav-brand w--current" style="max-width: 85px; font-weight: bold; padding-left: 20px;
margin-left: 10px;"><img src="dist/img/logopolindra.png" alt="Logo Polindra">KOPKAR POLINDRA</h4></div>
          <div class="col lg-7 no-margin-bottom position-absolute-md  zindex99">
            <nav role="navigation" class="nav-menu w-nav-menu">
              <a href="/" class="nav-link w-nav-link w--current">Home</a>
              <a href="/features" class="nav-link w-nav-link"> Fitur
              </a>
              <!-- <a href="features.html" class="nav-link w-nav-link">Features</a> -->
              <a href="/blog" class="nav-link w-nav-link">Berita</a>
               <a href="/contact" class="nav-link w-nav-link">Kontak 
              </a>
               <!-- <a href="contact.html" class="nav-link w-nav-link">Contact</a> -->
            
              <!-- <div data-hover="1" data-delay="0" data-w-id="c3e36890-8a2b-3062-d502-b11e8f16c866" class="nav-dropdown w-dropdown">
                <div class="nav-link w-dropdown-toggle">
                  <div>Pages</div>
                  <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                </div>
                <nav class="dropdown-list w-dropdown-list"><a href="our-team.html" class="dropdown-link w-dropdown-link">Our Team</a><a href="faq.html" class="dropdown-link w-dropdown-link">FAQ</a><a href="general-contact.html" class="dropdown-link w-dropdown-link">General contact</a><a href="career-landing.html" class="dropdown-link w-dropdown-link">Career</a><a href="single-post.html" class="dropdown-link w-dropdown-link">Single post</a><a href="resources.html" class="dropdown-link w-dropdown-link">Resource center</a></nav>
              </div> -->
            </nav>
          </div>
          <div class="col lg-1 no-margin-bottom flexh-justify-end no-padding-right hidden-xs test">
            <a href="{{route('login.index')}}" class="button-primary is-small order-last w-inline-block">
              <div class="button-primary-text">Login</div>
            </a>
          </div>
          <div class="menu-button w-nav-button">d5e2769f-a2bd-61bb-b4b4-c7405fec4f9e
            <div class="iconfont is-16px"><em class="iconfont__no-italize"></em></div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="section is-hero img1 article-banner">
    <div class="container">
      <div class="col block-centered text-align-center lg-7 md-12">
        <div class="pre-title"><a href="#" class="c-categorylink__over-banner">Design</a> / <a href="#" class="c-categorylink__over-banner">Technology</a></div>
        <h1>Creativity is breaking the traditional norms</h1>
        <div class="text-small flexh-justify-center">
          <div class="flexh-align-center margin-right"><img src="images/portrait3.png" width="56" alt="" class="is-rounded margin-right-small">
            <div>by Johan Pirlo</div>
          </div>
          <div class="flexh-align-center">
            <div class="icomoon margin-right-small"></div>
            <div>7 June 2020</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="col lg-3 md-12 md-order-last">
        <div class="c-article__related">
          <div class="margin-bottom-double text-small weight-is-black low-text-contrast">Related Articles</div>
          <div data-delay="3000" data-animation="slide" data-autoplay="1" data-duration="500" data-infinite="1" class="c-article_related-slider w-slider">
            <div class="w-slider-mask">
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Sollicitudin Consectetur Ullamcorper Risus Ligula</h4>
                  <div class="text-small low-text-contrast">1 January 2020</div>
                </div>
              </div>
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Cras justo odio, dapibus ac facilisis in, egestas eget quam</h4>
                  <div class="text-small low-text-contrast">9 January 2020</div>
                </div>
              </div>
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </h4>
                  <div class="text-small low-text-contrast">21 February 2021</div>
                </div>
              </div>
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Fusce Fermentum Pellentesque Egestas Commodo</h4>
                  <div class="text-small low-text-contrast">3 March 2020</div>
                </div>
              </div>
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Dapibus Pellentesque Ornare Ultricies</h4>
                  <div class="text-small low-text-contrast">31 November 2020</div>
                </div>
              </div>
            </div>
            <div class="hidden w-slider-arrow-left">
              <div class="w-icon-slider-left"></div>
            </div>
            <div class="hidden w-slider-arrow-right">
              <div class="w-icon-slider-right"></div>
            </div>
            <div class="c-article_related-slider-nav w-slider-nav w-slider-nav-invert w-round"></div>
          </div>
        </div>
      </div>
      <div class="col lg-1 no-margin-bottom"></div>
      <div class="col lg-8 md-12">
        <div class="rich-text w-richtext">
          <p>Aenean lacinia bibendum nulla sed consectetur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. <a href="#">Maecenas sed diam eget</a> risus varius blandit sit amet non magna. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Nullam quis risus eget urna mollis ornare vel eu leo. Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <h3>01. What is creative implosion?</h3>
          <p>Donec id elit non mi porta gravida at eget metus. Nullam quis risus eget urna mollis ornare vel eu leo. Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col lg-12">
        <div class="margin-bottom-double"><img src="images/photo-1562184647-7c5c35548033.jpg" srcset="images/photo-1562184647-7c5c35548033-p-500.jpeg 500w, images/photo-1562184647-7c5c35548033-p-800.jpeg 800w, images/photo-1562184647-7c5c35548033-p-1080.jpeg 1080w, images/photo-1562184647-7c5c35548033-p-1600.jpeg 1600w, images/photo-1562184647-7c5c35548033.jpeg 1967w" sizes="(max-width: 479px) 90vw, (max-width: 767px) 94vw, (max-width: 991px) 95vw, 96vw" alt="" class="c-article_image">
          <div class="image-caption">Man standing next to a booth</div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col lg-3 md-12 md-order-last">
        <div class="c-article__related">
          <div class="margin-bottom-double text-small weight-is-black low-text-contrast">Related Articles</div>
          <div data-delay="3000" data-animation="slide" data-autoplay="1" data-duration="500" data-infinite="1" class="c-article_related-slider w-slider">
            <div class="w-slider-mask">
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Donec id elit non mi porta gravida at eget metus</h4>
                  <div class="text-small low-text-contrast">1 January 2020</div>
                </div>
              </div>
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Cras justo odio, dapibus ac facilisis in, egestas eget quam</h4>
                  <div class="text-small low-text-contrast">9 January 2020</div>
                </div>
              </div>
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </h4>
                  <div class="text-small low-text-contrast">21 February 2021</div>
                </div>
              </div>
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Fusce Fermentum Pellentesque Egestas Commodo</h4>
                  <div class="text-small low-text-contrast">3 March 2020</div>
                </div>
              </div>
              <div class="w-slide">
                <div>
                  <h4 class="margin-bottom">Dapibus Pellentesque Ornare Ultricies</h4>
                  <div class="text-small low-text-contrast">31 November 2020</div>
                </div>
              </div>
            </div>
            <div class="hidden w-slider-arrow-left">
              <div class="w-icon-slider-left"></div>
            </div>
            <div class="hidden w-slider-arrow-right">
              <div class="w-icon-slider-right"></div>
            </div>
            <div class="c-article_related-slider-nav w-slider-nav w-slider-nav-invert w-round"></div>
          </div>
        </div>
      </div>
      <div class="col lg-1 no-margin-bottom"></div>
      <div class="col lg-8 no-margin-bottom md-12">
        <div class="rich-text w-richtext">
          <p>Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla:</p>
          <ul>
            <li>List item one</li>
            <li>List item number two</li>
            <li>Unordered list item number three</li>
            <li>And the last but not least, its number four</li>
          </ul>
          <p>Aenean lacinia bibendum nulla sed consectetur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. </p>
          <blockquote>Creativity is inventing, experimenting, growing, taking risks, breaking rules, making mistakes, and having fun</blockquote>
          <h3>02. Implement the impossible</h3>
          <p>Pellentesque ornare sem lacinia quam venenatis vestibulum. <a href="#">Maecenas sed diam eget</a> risus varius blandit sit amet non magna. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
          <p>‍<strong>Let&#x27;s recap the paragraph:</strong></p>
          <ol>
            <li>One</li>
            <li>Two</li>
            <li>Three</li>
            <li>Four and then..</li>
            <li>Five is the last number</li>
          </ol>
          <h3>03. Make mistakes and have fun</h3>
          <p>Donec id elit non mi porta gravida at eget metus. Nullam quis risus eget urna mollis ornare vel eu leo. Vestibulum id ligula porta felis euismod semper. </p>
          <figure style="padding-bottom:56.206088992974244%" id="w-node-cadde97f3e96-66cce4ce" class="w-richtext-align-fullwidth w-richtext-figure-type-video">
            <div><iframe allowfullscreen="true" frameborder="0" scrolling="no" src="https://www.youtube.com/embed/RyShHO2iqGk"></iframe></div>
          </figure>
          <p>Donec ullamcorper nulla non metus auctor fringilla. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        </div>
        <div class="c-article__author">
          <div class="container container-nested flexh-align-center">
            <div class="col lg-2 text-align-center no-margin-bottom-lg xs-12"><img src="images/portrait3.png" alt="" class="margin-bottom is-rounded max-width-100px">
              <div class="text-small text-align-center weight-is-black">Johan Pirlo</div>
            </div>
            <div class="col lg-10 no-margin-bottom xs-12">
              <p class="text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="col lg-12">
        <div class="size-h2">Other blog posts</div>
      </div>
    </div>
    <div class="container flex-horizontal">
      <div class="col lg-4 md-12"><img src="images/gratisography-358H.jpg" srcset="images/gratisography-358H-p-500.jpeg 500w, images/gratisography-358H-p-1080.jpeg 1080w, images/gratisography-358H.jpg 1200w" sizes="(max-width: 479px) 90vw, (max-width: 767px) 94vw, (max-width: 991px) 95vw, 29vw" alt="" class="margin-bottom">
        <h3 class="margin-bottom-small">Tesla May Have Invented a Million-Mile Electric Car Battery</h3>
        <div class="margin-bottom">Nullam id dolor id nibh ultricies vehicula ut id elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</div><a href="#" class="cta-link"><span class="margin-right">Read more</span><span class="fa c-cta1_arrow-hovered"></span> <span class="fa c-cta1__arrow-normal"></span></a></div>
      <div class="col lg-4 md-12"><img src="images/gratisography-tape-face.jpg" srcset="images/gratisography-tape-face-p-1080.jpeg 1080w, images/gratisography-tape-face.jpg 1200w" sizes="(max-width: 479px) 90vw, (max-width: 767px) 94vw, (max-width: 991px) 95vw, 29vw" alt="" class="margin-bottom">
        <h3 class="margin-bottom-small">The Camera Feature That’s Missing: Eye Contact</h3>
        <div class="margin-bottom">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus</div><a href="#" class="cta-link"><span class="margin-right">Read more</span><span class="fa c-cta1_arrow-hovered"></span> <span class="fa c-cta1__arrow-normal"></span></a></div>
      <div class="col lg-4 md-12"><img src="images/gratisography-346H.jpg" srcset="images/gratisography-346H-p-500.jpeg 500w, images/gratisography-346H.jpg 1000w" sizes="(max-width: 479px) 90vw, (max-width: 767px) 94vw, (max-width: 991px) 95vw, 29vw" alt="" class="margin-bottom">
        <h3 class="margin-bottom-small">A.I. Is Changing How You See the World</h3>
        <div class="margin-bottom">Ut fermentum massa justo sit amet risus. Cum sociis natoque penatibus. Praesent commodo cursus magna, vel scelerisque</div><a href="#" class="cta-link"><span class="margin-right">Read more</span><span class="fa c-cta1_arrow-hovered"></span> <span class="fa c-cta1__arrow-normal"></span></a></div>
    </div>
  </div>
  <footer class="section padding-bottom-16 is-dark">
    <div class="container flex-horizontal">
      <div class="col lg-3 flexv-space-between md-12 flexv-align-left"><img src="images/-asset-peyton-light.svg" alt="">
        <div class="footer-tagline margin-bottom">.cloud for developer</div>
      </div>
      <div class="col lg-1 no-margin-bottom"></div>
      <div class="col lg-8 md-12">
        <div class="container container-nested is-wrapped">
          <div class="col lg-3 no-margin-bottom-lg md-12">
            <div class="size-h4 margin-bottom on-dark">Product</div><a href="#" class="footer-nav-link on-dark">Kubernetes</a><a href="#" class="footer-nav-link on-dark">Micro host</a><a href="#" class="footer-nav-link on-dark">Cloud compute</a><a href="#" class="footer-nav-link on-dark">Cloud storage</a><a href="#" class="footer-nav-link on-dark">Dedicate cloud</a></div>
          <div class="col lg-3 no-margin-bottom-lg md-12">
            <div class="size-h4 margin-bottom on-dark">Why Superly host</div><a href="#" class="footer-nav-link on-dark">Support experience</a><a href="#" class="footer-nav-link on-dark">Predictable pricing</a><a href="#" class="footer-nav-link on-dark">Global infrastructure</a><a href="#" class="footer-nav-link on-dark">Craft of code</a><a href="#" class="footer-nav-link on-dark">open cloud</a></div>
          <div class="col lg-3 no-margin-bottom-lg md-12">
            <div class="size-h4 margin-bottom on-dark">Company</div><a href="#" class="footer-nav-link on-dark">About</a><a href="#" class="footer-nav-link on-dark">Pricing</a><a href="#" class="footer-nav-link on-dark">Career</a><a href="#" class="footer-nav-link on-dark">Leadership</a><a href="#" class="footer-nav-link on-dark">Press</a></div>
          <div class="col lg-3 no-margin-bottom-lg md-12">
            <div class="size-h4 margin-bottom on-dark">Let&#x27;s connect</div>
            <a href="#" class="footer-nav-link on-dark w-inline-block">
              <div><span class="fa-brand-2 w24"></span> LinkedIn</div>
            </a>
            <a href="#" class="footer-nav-link on-dark w-inline-block">
              <div><span class="fa-brand-2 w24"></span> Youtube</div>
            </a>
            <a href="#" class="footer-nav-link on-dark w-inline-block">
              <div><span class="fa-brand-2 w24"></span> Facebook</div>
            </a>
            <a href="#" class="footer-nav-link on-dark w-inline-block">
              <div><span class="fa-brand-2 w24"></span> Twitter</div>
            </a><a href="#" class="footer-nav-link on-dark w-inline-block"></a></div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col lg-12 margin-bottom">
        <div class="hr on-dark opacity"></div>
      </div>
    </div>
    <div class="container">
      <div class="col lg-6 no-margin-bottom md-12 md-order-last">
        <div class="low-text-contrast text-small flexh-space-between md-flex-vertical">
          <div class="md-order-last">©2019 Peyek Beton, Co. All rights reserved. </div><a href="#" class="footer-bottom-link on-dark">Privacy Policy</a><a href="#" class="footer-bottom-link on-dark">Term Of Service</a></div>
      </div>
      <div class="col lg-6 no-margin-bottom md-12">
        <div class="w100 text-align-right footer-bottom md-text-align-left">Made in Surabaja, Indonesia</div>
      </div>
    </div>
  </footer>
  <script src="../../../d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/peyton.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

<!-- Mirrored from detheme.com/templates/peyton/single-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Nov 2021 07:09:40 GMT -->
</html>