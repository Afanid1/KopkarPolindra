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

  <div class="section is-hero hero-hosting overflow-hidden hei-min position-relative  zindex99">
    <div class="container">
      <div data-w-id="41174ade-f098-d525-84e7-186e4fb18c7e" class="col block-centered text-align-center lg-7 md-12">
        <h1>Profile Kami</h1>
        <div class="padding-left padding-right margin-bottom">Kopkar Polindra mempunyai berbagai macam informasi Profile</div>
      </div>
    </div>
  </div>
  <section id="visi"  class="section has-bg-accent">
    <div class="container flexh-align-center margin-bottom-double">
        <div class="col lg-6 alignself-center md-12">
        <div class="pre-title">Koperasi Di Era Revolusi Industri 4.0</div>
                @foreach ($visi as $key => $row)
        <h2 class="margin-bottom">{{ $row->judul }}</h2>
        <ul class="c-checklist">
          <li class="c-checklist_item margin-bottom"><strong class="is-heading-color">Visi Kopkar Polindra</strong>
          <br>{{ $row->keterangan }}</li>
          <li class="c-checklist_item margin-bottom"><strong class="is-heading-color">Misi Kopkar Polindra</strong>
          <br>{{ $row->keterangan2 }}</li>
          <!-- <li class="c-checklist_item margin-bottom"><strong class="is-heading-color">Predictable Performance</strong><br>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue laoreet </li> -->
        </ul><a href="/features" class="cta-link margin-left-32px"><span class="margin-right">View more features</span> <span class="fa c-cta1_arrow-hovered"></span> <span class="fa c-cta1__arrow-normal"></span></a></div>
      
      <div class="col lg-5 md-12 ">
      <img src="{{ asset('uploads/' . $row->gambar) }}" alt="Gedung Polindra" class="has-shadow img-big"></div>
      @endforeach

    </div>
</section>

  <section class="section" id="manfaat">
    <div class="container flexh-align-center">
    @foreach ($sejarah as $key => $row)

      <div class="col lg-6 md-12 order-first"><img src="{{ asset('uploads/' . $row->gambar) }}"  alt="Gedung Polindra" class="has-shadow img-big"></div>
            <div class="col lg-6 alignself-center md-12">
        <div class="pre-title">Sejarah Koperasi Keyawan Polindra</div>
        <h2>{{ $row->judul }}</h2>
        <div class="margin-bottom">{{ $row->keterangan }}</div>
        <div class="margin-bottom">{{ $row->keterangan2 }}</div>

          <!-- <div class="col lg-6 no-margin-bottom">
            <ul class="c-checklist">
              <li class="c-checklist_item">Memperoleh keuntungan</li>
              <li class="c-checklist_item">Mengatur keuangan dengan baik</li>
              <li class="c-checklist_item">Saling membantu karyawan satu sama lain</li>
              <li class="c-checklist_item">Menjadi mitra perusahaan</li>
              <li class="c-checklist_item">Flexible routing</li>
              <li class="c-checklist_item">DDos protection</li> 
            </ul>
          </div> -->
          <a href="/features" class="cta-link "><span class="margin-right">View more features</span> <span class="fa c-cta1_arrow-hovered"></span> <span class="fa c-cta1__arrow-normal"></span></a></div>

        </div>
        </div>
    </div>
    @endforeach

  </section>
<div class="section has-bg-accent">
    <div class="container">
      <div class="col block-centered text-align-center lg-6 md-12">
        <h2>Struktur Organisasi</h2>
        <div class="text-medium low-text-contrast margin-bottom">Susunan Organisasi pada Koperasi Karyawan Politeknik Negeri Indramayu</div>
      </div>
    </div>
    <div class="container position-relative md-margin-bottom">
      <div class="c-process__line hidden-md"></div>
  @foreach ($struktur as $key => $row)
      <div class="col lg-1-5 md-12 md-margin-bottom-quad">
        <div class="margin-bottom text-align-center">
          <!-- <div class="c-process__step-no"> -->
          <img src="{{ asset('uploads/' . $row->gambar) }}" class="c-process__step-noss">

          <!-- </div> -->
        </div>
        
        <h4 class="text-align-center">{{ $row->judul }}</h4>
        <div class="text-align-center">{{ $row->keterangan }}</div>
      </div>
      @endforeach
     
    </div>
    <div class="container">
      <div class="col lg-12 flexh-justify-center">
        <a data-w-id="d9cc6231-645b-3fcb-073a-da7ccd66013e" href="#" class="button-primary animated is-small w-inline-block">
          <div style="-webkit-transform:translate3d(0, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:1" class="button-primary-text">get started free</div>
          <div style="opacity:0;display:block;-webkit-transform:translate3d(0, 20PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-primary-text for-hover">let&#x27;s go <span class="fa margin-left"></span></div>
        </a>
      </div>
    </div>
  </div>

     <div class="section">
    <div class="container">
      <div class="col block-centered text-align-center lg-6 md-12">
        <h2>Formulir Data</h2>
        <div class="padding-left padding-right margin-bottom low-text-contrast text-medium">Form download data yang dipublikasikan oleh Koperasi Karyawan Polindra</div>
      </div>
    </div>

    <div class="container">
  @foreach ($download as $key => $row)
      <div class="col text-align-center lg-3 md-6 xs-12">
        <div class="heading-betas is-xthin">{{ $row->judul }}</div>
        <div class="weight-is-medium">{{ $row->keterangan }}</div>
        <a href="{{ asset('uploads/' . $row->gambar) }}" download>Download link</a>

        <!-- <imag src="{{ asset('uploads/' . $row->gambar) }}" style="width:50px"> -->
      </div>
    @endforeach
     
    </div>
  </div>
  <!-- <div class="section no-padding-top xs-no-padding-bottom">
    <div class="container is-wide">
      <div class="col lg-12 position-relative xs-no-margin-bottom"><img src="images/2126.jpg" srcset="images/2126-p-1080.jpeg 1080w, images/2126.jpg 1400w" sizes="(max-width: 479px) 90vw, (max-width: 767px) 94vw, (max-width: 991px) 95vw, 97vw" alt="">
        <div class="c-quotebox has-shadow position-relative">
          <div class="quotemark2">“</div>
          <div class="text-medium margin-bottom-double">Fusce dapibus, tellus ac cursus commodo tortor mauris condimentum nibh ut fermentum massa justo sit amet </div>
          <div class="text-small is-bold">Noah John</div>
          <div class="text-small">Web developer at Surabaya jatim</div>
        </div>
      </div>
    </div>
  </div> -->
  <section class="section bg-cta position-relative overflow-hidden">
    <div class="container">
      <div class="col block-centered text-align-center lg-6 md-12">
        <h2 class="on-dark">Gabung Sekarang!</h2>
        <div class="on-dark margin-bottom-double">Mari bergabung bersama kami untuk mendapatkan kelebihan dan hadiah yang lebih menarik. </div>
        <a href="#header-top" class="button-primary animated is-white order-last w-inline-block"style="z-index:99;">
              <div class="button-primary-text">Login Sekarang</div>
        </a>
        
      </div><img src="auth/images/network.svg" alt="" class="block-decoration-1 opacity-20"></div>
  </section>
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


</html>