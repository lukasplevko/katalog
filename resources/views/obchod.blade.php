@extends('layout.layout')

@section('obsah')
<div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="#">Men</a>
                    <a class="dropdown-item" href="#">Women</a>
                    <a class="dropdown-item" href="#">Children</a>
                  </div>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">Relevance</a>
                    <a class="dropdown-item" href="#">Name, A to Z</a>
                    <a class="dropdown-item" href="#">Name, Z to A</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Price, low to high</a>
                    <a class="dropdown-item" href="#">Price, high to low</a>
                  </div>
                </div>
              </div>
            </div>
            Počet nájdených produktov: {{$produkty->total()}}
          </div>
          <div class="row mb-5">

            @if ($produkty->total() != 0)
            @foreach ($produkty as $produkt)
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                  <a href="/produkt/{{$produkt->merchant_product_id}}"><img src="{{$produkt->alternate_image}}" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="/produkt/{{$produkt->merchant_product_id}}">{{$produkt->product_name}}</a></h3>
                    <p class="mb-0">{{$produkt->brand_name}}</p>
                  <p class="text-primary font-weight-bold">{{$produkt->display_price}}</p>
                  </div>
                </div>
              </div>
              @endforeach
            @else
            <h3>Nenašli sme žiadne produkty</h3>
            <a href="/shop" class="filter-btn btn">Reset filtrov</a>
            @endif








          </div>
          <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  {{$produkty->links()}}
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Kategórie</h3>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><a href="{{route('obchod',['kategoria' => 'muži', 'triedenie'=>request('triedenie'), 'najlacnejsie'=>request('najlacnejsie'),'najdrahsie'=>request('najdrahsie') ])}}" class="d-flex"><span>Pánske oblečenie</span> <span class="text-black ml-auto"></span></a></li>
              <li class="mb-1"><a href="{{route('obchod',['kategoria' => 'ženy', 'triedenie'=>request('triedenie'), 'najlacnejsie'=>request('najlacnejsie'),'najdrahsie'=>request('najdrahsie') ])}}" class="d-flex"><span>Dámske oblečenie</span> <span class="text-black ml-auto"></span></a></li>
              <li class="mb-1"><a href="{{route('obchod', ['triedenie'=>request('triedenie'), 'najlacnejsie'=>request('najlacnejsie'),'najdrahsie'=>request('najdrahsie')])}}"><span>Všetky produkty</span></a></li>
            </ul>
          </div>

          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block"> Cenové rozpätie</h3>
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              <input style="display:none" type="number"  name="" id="minamount" value={{$min_price->base_price}}>
              <input style="display:none" type="number" type="hidden" name="maxamount" id="maxamount" value={{$max_price->base_price}}>


              @if (request()->has('znacka'))
              <a class="filter-btn btn" onclick="this.href='shop?kategoria={{request('kategoria')}}&najlacnejsie='+document.getElementById('minamount').value+ '&najdrahsie='+document.getElementById('maxamount').value+'&znacka={{request('znacka')}}'">Filtruj cenu</a>
              @else
              <a class="filter-btn btn" onclick="this.href='shop?kategoria={{request('kategoria')}}&najlacnejsie='+document.getElementById('minamount').value+ '&najdrahsie='+document.getElementById('maxamount').value">Filtruj cenu</a>

              @endif



            </div>


            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Značky</h3>
              @foreach ($znacky as $znacka)


              <a href="{{route('obchod',['kategoria' => request('kategoria'), 'triedenie'=>request('triedenie'),'znacka' => $znacka->brand_name ])}}" class="">{{$znacka->brand_name}}</a> <br>
              @endforeach


            </div>
            <a href="/shop" class="filter-btn btn">Reset filtrov</a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="site-section site-blocks-2">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7 site-section-heading pt-4">
                  <h2>Kategória</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                <a class="block-2-item" href="{{route('obchod',['kategoria'=> 'ženy'])}}">
                    <figure class="image">
                      <img src="{{asset('images/women.jpg')}}" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <span class="text-uppercase">Kolekcia</span>
                      <h3>Ženy</h3>
                    </div>
                  </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                <a class="block-2-item" href="{{route('obchod', ['kategoria' => 'deti'])}}">
                    <figure class="image">
                      <img src="{{asset('images/children.jpg')}}" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <span class="text-uppercase">Kolekcia</span>
                      <h3>Deti</h3>
                    </div>
                  </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                <a class="block-2-item" href="{{route('obchod', ['kategoria' => 'muži'])}}">
                    <figure class="image">
                      <img src="{{asset('images/men.jpg')}}" alt="" class="img-fluid">
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
      </div>

    </div>
  </div>

  <script>
      var siteSliderRange = function() {
    $( "#slider-range" ).slider({
      range: true,
      min: {!! json_encode($min_price->base_price, JSON_HEX_TAG) !!},
      max: {!! json_encode($max_price->base_price, JSON_HEX_TAG) !!},
      values: [ {!! json_encode($min_price->base_price, JSON_HEX_TAG) !!}, {!! json_encode($max_price->base_price, JSON_HEX_TAG) !!} ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "CZK" + ui.values[ 0 ] + " - CZK" + ui.values[ 1 ] );
        $( "#minamount" ).val( ui.values[ 0 ] );
        $( "#maxamount" ).val( ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "CZK" + $( "#slider-range" ).slider( "values", 0 ) +
      " - CZK" + $( "#slider-range" ).slider( "values", 1 ) );

	};


  </script>
@endsection
