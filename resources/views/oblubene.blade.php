@extends('layout.layout')
@section('obsah')


<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Obrázok</th>
                  <th class="product-name">Produkt</th>
                  <th class="product-price">Cena</th>
                  <th class="product-remove">Odstrániť</th>
                  <th class="product-name"> Stránka predajcu</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($produkty as $produkt)
                <tr>

                  <td class="product-thumbnail">
                    <img src="{{$produkt->alternate_image}}" alt="Image" class="img-fluid">
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black">{{$produkt->product_name}}</h2>
                  </td>
                  <td>{{$produkt->display_price}}</td>

                  <td><a href="/produkt/delete/{{$produkt->merchant_product_id}}" class="btn btn-primary btn-sm">X</a></td>

                <td><a href="{{$produkt->merchant_deep_link}}" target="blank">Stránka predajcu</a></td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-md-6">

            <div class="col-md-6">
              <a href="/shop" class="btn btn-outline-primary btn-sm btn-block">Produkty</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cena všetkých produktov v obľúbených</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Dokopy</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">{{$cena}}CZK</strong>
                </div>
              </div>

              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
