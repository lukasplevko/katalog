@extends('layout.layout')

@section('obsah')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{$produkt->alternate_image}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{$produkt->product_name}}</h2>
          <p>{{$produkt->description}}</p>
          <p class="mb-4">{{$produkt->merchant_category}}</p>
        <p><strong class="text-primary h4">{{$produkt->display_price}}</strong></p>
          <div class="mb-1 d-flex">
            <label for="option-sm" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"></span> <span class="d-inline-block text-black">{{$produkt->size}}</span>
            </label>

          </div>

        <p><a href="{{$produkt->merchant_deep_link}}" target="blank" class="buy-now btn btn-sm btn-primary">Aboutyou.cz</a></p>
        @if (Auth::guest())
            <a href="/login">Prihláste sa aby ste mohli pridávať produkty do obľúbených</a>

        @else
        @if ($oznacene == true)
        <a class="buy-now btn btn-sm btn-primary" href="/produkt/delete/{{$produkt->merchant_product_id}}">Odstrániť z obľúbených</a>

          @else
          <a class="buy-now btn btn-sm btn-primary" href="/produkt/add/{{$produkt->merchant_product_id}}">Pridať do obľúbených</a>
         @endif
        @endif


        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Podobné produkty</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="nonloop-block-3 owl-carousel">
            @foreach ($podobne as $item)
            @if ($item->product_name != $produkt->product_name)
            <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                  <img src="{{$item->alternate_image}}" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                  <h3><a href="/produkt/{{$item->merchant_product_id}}">{{$item->brand_name}}</a></h3>
                    <p class="mb-0">{{$item->merchant_category}}</p>
                    <p class="text-primary font-weight-bold">{{$item->display_price}}</p>
                  </div>
                </div>
              </div>
            @endif


            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
