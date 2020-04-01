@extends('layout.layout')

@section('obsah')
<div class="site-blocks-cover" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
    <div class="container">
      <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
          <h1 class="mb-2">Obuv z rôznych slovenských a českých e shopov</h1>
          <div class="intro-text text-center text-md-left">
            <p class="mb-4">Vyber si svoju obľúbenú značku a nakupuj z najlepších českých a slovenských obchodov </p>
            <p>
            <a href="{{route('obchod', ['kategoria' => 'boty'])}}" class="btn btn-sm btn-primary">Hľadať teraz!</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm site-blocks-1">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
          <div class="icon mr-4 align-self-start">
            <span class="icon-truck"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">Donášku zaobstará vybratý e-shop</h2>
            <p>Nakoľko je tento portál iba vyhľadávač o shipping na vašu adresu sa postará vybratý e-shop</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
          <div class="icon mr-4 align-self-start">
            <span class="icon-refresh2"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">Vrátenie zadarmo</h2>
            <p>Vybraté boli iba predajne, ktoré umožňujú vrátenie bez poplatkov</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
          <div class="icon mr-4 align-self-start">
            <span class="icon-help"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">Support</h2>
            <p>Na pomoc pri riešení problému sa obráťte na predajcu</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-blocks-2">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
          <a class="block-2-item" href="{{route('obchod', ['kategoria' => 'ženy'])}}">
            <figure class="image">
              <img src="images/women.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <span class="text-uppercase">Kolekcie</span>
              <h3>Ženy</h3>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
          <a class="block-2-item" href={{route('obchod', ['kategoria' => 'deti'])}}>
            <figure class="image">
              <img src="images/children.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <span class="text-uppercase">Kolekcie</span>
              <h3>Deti</h3>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
          <a class="block-2-item" href={{route('obchod',['kategoria' => 'muži'])}}>
            <figure class="image">
              <img src="images/men.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <span class="text-uppercase">Kolekcie</span>
              <h3>Muži</h3>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Ponúkané produkty</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="nonloop-block-3 owl-carousel">
              @foreach ($produkty as $produkt)
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{$produkt->alternate_image}}" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="/produkt/{{$produkt->merchant_product_id}}">{{$produkt->brand_name}}</a></h3>

                    <p class="text-primary font-weight-bold">{{$produkt->display_price}}</p>
                  </div>
                </div>
              </div>
              @endforeach


          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-8">
    <div class="container">
      <div class="row justify-content-center  mb-5">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Aboutyou.cz</h2>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 mb-5">
          <a href={{route('obchod')}}><img src="{{asset('images/blog_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded"></a>
        </div>
        <div class="col-md-12 col-lg-5 text-center pl-md-5">
          <h2><a href="/shop">Tovar z eshopu aboutyou.cz</a></h2>

          <p>Najlepšie kúsky oblečenia z najlepšieho e shopu na jednom mieste</p>
          <p><a href={{route('obchod')}} class="btn btn-primary btn-sm">Prezerať tovar</a></p>
        </div>
      </div>
    </div>
  </div>
@endsection
