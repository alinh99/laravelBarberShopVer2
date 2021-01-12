@extends('master') @section('content')
<div class="container" style="background-color: #ffffff;">
    <!-- Start: Content Slide 2 With Images-1 -->
    <div class="slideshow">
        <style>
            background-color: #fbf4f4;
        </style>
        <input id="button-1" type="radio" name="radio-set" class="selector-1" checked="checked" />
        <label for="button-1" class="button-label-1"></label>

        <input id="button-2" type="radio" name="radio-set" class="selector-2" />
        <label for="button-2" class="button-label-2"></label>

        <input id="button-3" type="radio" name="radio-set" class="selector-3" />
        <label for="button-3" class="button-label-3"></label>

        <input id="button-4" type="radio" name="radio-set" class="selector-4" />
        <label for="button-4" class="button-label-4"></label>

        <input id="button-5" type="radio" name="radio-set" class="selector-5" />
        <label for="button-5" class="button-label-5"></label>

        <label for="button-1" class="arrow a1"></label>
        <label for="button-2" class="arrow a2"></label>
        <label for="button-3" class="arrow a3"></label>
        <label for="button-4" class="arrow a4"></label>
        <label for="button-5" class="arrow a5"></label>

        <div class="content">
            <ul class="slider">
                @foreach ($slides as $sl)
                <li>
                    <div class="slider-content">
                        <figure>
                            <img src="assets/img/{{ $sl->image }}" alt="image" />
                        </figure>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- content -->
    </div>
    <!-- slideshow -->
    <!-- End: Content Slide 2 With Images-1 -->
</div>
<div class="container">
    <h1 class="text-center" style="font-family: Aldrich, sans-serif; color: rgb(0, 0, 0);">
        DANH MỤC SẢN PHẨM<br />
    </h1>
    <hr />
</div>
<div class="container">
    <!-- Start: --mp-- Multiple items slider responsive -->
    <section style="margin-top: 20px;">
        <div class="d-flex flex-row multiple-item-slider">
            @foreach ($slide_second as $sl_second)
            <div class="justify-content-center spacer-slider">
                <figure class="figure">
                    <a href="{{ route('trang-chu') }}"><img class="img-fluid figure-img"
                                    src="assets/img/{{ $sl_second->image }}" alt="alt text here" /></a>
                    <figcaption class="figure-caption">{{ $sl_second->name }}</figcaption>
                </figure>
            </div>
            @endforeach
        </div>
    </section>
    <!-- End: --mp-- Multiple items slider responsive -->
</div>
<div class="container" style='background-color: #fbf4f4";'>
    <!-- Start: Multiple Slides - Bootstrap 4 -->
    <div class="container text-center my-3">
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">
                <div class="carousel-item row no-gutters active" style="background-color: #fbf4f4;">
                    @foreach ($icons as $icon)
                    <div class="col-3 float-left">
                        <img class="img-fluid" src="assets/img/{{ $icon->image }}" style="background-color: #fbf4f4;" />
                        <h5>{{ $icon->title }}</h5>
                        <p>{{ $icon->description }}</p>
                    </div>
                    @endforeach
                </div>
                <!--             <div class="carousel-item row no-gutters">
                                  <div class="col-3 float-left"><img class="img-fluid" src=""></div>
                                  <div class="col-3 float-left"><img class="img-fluid" src=""></div>
                                  <div class="col-3 float-left"><img class="img-fluid" src=""></div>
                                  <div class="col-3 float-left"><img class="img-fluid" src=""></div> -->
            </div>
        </div>
        <!--         <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                          </a> -->
    </div>
    <!-- End: Multiple Slides - Bootstrap 4 -->
</div>
<div class="container">
    <h1 class="text-center align-content-center" style="
                            background-color: #fbf4f4;
                            color: rgb(0, 0, 0);
                            font-family: Aldrich, sans-serif;
                          ">
        SẢN PHẨM HOT<br />
    </h1>
    <hr />
</div>

<div class="container">
    <section class="products">
        <div class="products-center">
            @foreach ($products as $product)
            <article class="product">
                <div class="img-container">
                    <img src="assets/img/{{ $product->image }}" alt="product" class="product-img" />
                    <button class="bag-btn" data-id="{{ $product->id }}">
                                <a onclick="AddCart({{ $product->id }})" href="javascript:"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ
                                hàng</a>
                            </button>
                </div>
                <h3>{{ $product->title }}</h3>
                <h4>{{ number_format($product->price) }} đồng</h4>
            </article>
            @endforeach
        </div>
        <br>
        <br>
        <div class="row">{{ $products->links() }}</div>
    </section>
</div>
</div>
@endsection
