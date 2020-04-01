<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">


  <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

  </head>
  <body>

  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action={{route('obchod.hladaj')}} method="POST" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                {{ csrf_field() }}
                <input type="text" name="search-bar" class="form-control border-0" placeholder="Hľadaj">
                <input type="submit"
                style="position: absolute; left: -9999px; width: 1px; height: 1px;"
            tabindex="-1" />
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href={{route('domov')}} class="js-logo-clone">Shoppers</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                    @if (Auth::user())
                        <li class="mr-3">{{Auth::user()->name}}</li>
                        <li><a href="/logout">Odhlásiť sa</a></li>
                    @else
                    <li><a href="/login"><span class="icon icon-person"></span></a></li>
                    @endif

                  <li><a href="/oblubene"><span class="icon icon-heart-o"></span></a></li>
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children active">
              <a href={{route('domov')}}>Domov</a>
              <ul class="dropdown">
              <li><a href="{{route('obchod',['kategoria'=> 'muži'])}}">Pánske oblečenie</a></li>
                <li><a href={{route('obchod',['kategoria'=> 'ženy'])}}>Dámske oblečenie</a></li>
                <li><a href={{route('obchod',['kategoria'=> 'deti'])}}>Detské oblečenie</a></li>
                @if (isset($znacky_menu))
                <li class="has-children">
                  <a href="#">Značky</a>
                  <ul class="dropdown">
                      @foreach ($znacky_menu as $znacka)
                      <li><a href={{route('obchod', ['znacka'=> $znacka->brand_name])}}>{{$znacka->brand_name}}</a></li>
                      @endforeach
                  </ul>
                </li>
                @endif
              </ul>
            </li>

            <li><a href={{route('obchod')}}>Ponuka</a></li>


          </ul>
        </div>
      </nav>
    </header>

   <div>
       @yield('obsah')
   </div>

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigácia</h3>
              </div>

              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href={{route('domov')}}>Domovská stránka</a></li>
                  <li><a href={{route('obchod')}}>Ponúkaný tovar</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Kontakt</h3>
              <ul class="list-unstyled">
                <li class="address">Kysucké New Town</li>
                <li class="phone"><a href="tel://23923929210">+421696969666</a></li>
                <li class="email">lukassmehyl@gmail.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>

  <script src="{{asset('js/main.js')}}"></script>

  </body>
</html>
