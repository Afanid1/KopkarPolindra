<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{asset('dist/img/logopolindra.ico')}}">
    <!-- <img class="img-circle elevation-2" alt="User Image"> -->

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <link href="auth/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="auth/css/components.css" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" type="text/css" href="css/util.css"> -->
  <link href="auth/css/peyton.css" rel="stylesheet" type="text/css">
  <style>
 

  </style>
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
      <div data-collapse="medium" data-animation="default" data-duration="400" class="navbars w-nav">
        <div class="navbar-container align-middle w-container">
          <div class="col lg-4 no-margin-bottom order-first no-padding-left col-logo xs-12 md-grow">
            <h4 href="/" class="brand on-polin w-nav-brand w--current" style="max-width: 85px; font-weight: bold; padding-left: 20px;
margin-left: 10px;"><img src="dist/img/logopolindra.png" alt="Logo Polindra">KOPKAR POLINDRA</h4></div>
          <div class="col lg-8 no-margin-bottom position-absolute-md  zindex99">
            <nav role="navigation" class="nav-menu w-nav-menu">
              <a href="/" class="nav-link w-nav-link w--current">Beranda</a>
              <div class="dropdown-w">
                <button class="nav-link w-nav-link" href="#visi">Profile</button>
                <div class="dropdown-content">
                  <a href="#sejarah">Sejarah</a>
                  <a href="#visi">Visi & Misi</a>
                  <a href="/features">Struktur Organisasi</a>
                </div>
              </div>
              
              <!-- <a href="features.html" class="nav-link w-nav-link">Features</a> -->
              <a href="/berita" class="nav-link w-nav-link">Berita</a>
              <a href="/galeri" class="nav-link w-nav-link">Galeri</a>
               <a href="/contac" class="nav-link w-nav-link">Kontak Kami
              </a>
               <!-- <a href="contact.html" class="nav-link w-nav-link">Contact</a> -->
          <div class="col lg-1 no-margin-bottom flexh-justify-end no-padding-right hidden-xs test">
            <a href="{{route('login.index')}}" class="button-primary is-small order-last w-inline-block">
              <div class="button-primary-text">Login</div>
            </a>
          </div>
          <div class="menu-button w-nav-button">
            <div class="iconfont is-16px"><em class="iconfont__no-italize"></em></div>
          </div>
        </div>
      </div>
    </div>
  </header>


  <div class="section is-hero hero-hosting overflow-hidden hei-min position-relative zindex99">
    <div class="container">
      <div data-w-id="41174ade-f098-d525-84e7-186e4fb18c7e" class="col block-centered text-align-center lg-7 md-12">
        <h1>Blog Galeri</h1>
        <div class="padding-left padding-right margin-bottom">Kumpulan galeri terbaru dari Koperasi Karyawan Politeknik Negeri Indramayu</div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container is-wrapping">
    @foreach ($galeri as $key => $row)

      <div class="col lg-6 md-12">
        <div class="card   card-img-demo2">
        <div class="c-gridpost__card style4"><a href="#" class="c-gridpost__image-bg w-inline-block"><img src="{{ asset('uploads/' . $row->gambar) }}"</a>
          <div class="c-gridpost__category style4"><a href="#" class="c-gridpost__category-link">{{ $row->created_at }}</div>
          <a href="#" class="c-gridpost__clickable style4 w-inline-block">
            <div class="c-gridpost__text style2">
              <h3>{{ $row->judul }}</h3>
              <div class="flexh-align-center flexh-space-between xs-is-wrapping">
                <div class="flexh-align-center xs-margin-bottom">
                </div>
               
              </div>
            </div>
          </a>
        </div>
        <div class=" btm-minus">
                                    <p class="lh-sm hosting-tittle-deskripsi">{{ $row->keterangan }}</p>
                                </div>
      </div>
         </div>
         @endforeach
         </div>
    <div class="container">
      <div class="col lg-12">
        <div class="c-paging">
          <div class="iconfont margin-right-small is-11px"><em class="iconfont__no-italize"></em></div>
          <div class="c-paging__number is-dark is-rounded on-dark">1</div><a href="#" class="c-paging__number">2</a><a href="#" class="c-paging__number">3</a><a href="#" class="c-paging__number">4</a><a href="#" class="c-paging__number">5</a><a href="#" class="c-paging__number">6</a><a href="#" class="c-paging__number">7</a>
          <div class="c-paging__number">...</div><a href="#" class="c-paging__number">99</a><a href="#" class="iconfont margin-left-small is-11px"><em class="iconfont__no-italize"></em></a></div>
      </div>
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

<!-- Mirrored from detheme.com/templates/peyton/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Nov 2021 07:08:38 GMT -->
</html>