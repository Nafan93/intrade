<div class="section products" id="products" uk-scrollspy="cls: uk-animation-fade; repeat: true">
    <div class="container">
        <div class="section-wrap">
            <div class="section-head">
                <div class="section-head__title">
                    <h2>Продукция</h2>
                </div>
                <!-- /.section-head__title -->
                <div class="section-head__description">
                    <p>На всю нашу продукцию мы предоставляем <br>
                        паспорта качсва и сертификаты соответствия</p>
                </div>
                <!-- /.section-head__description -->
            </div>
            <!-- /.section-head -->
            <div class="section-content">
                @if (isset($products))
                    <div class="products-grid">
                        @foreach ($products as $product)
                            <div class="product-card__body">
                                <div class="product-card__title">
                                    <h3>
                                        <a href="{{ route('productShow', $product->alias) }}">{{ $product->name }}</a>
                                    </h3>
                                </div> 
                                
                                <!-- Category -->
                                @foreach ($product->categories as $category)
                                    <div class="product-card__category transparentText__small">
                                        <a href="{{ $category->category_alias }}"> {{ $category->category_name }} </a>
                                    </div>
                                @endforeach
                                <!--/ .Category --> 

                                <div class="product-card__desc">
                                    <p href="">{{ Str::words( $product->short_desc, 17) }}</p>
                                </div>
                                <div class="product-card__price">
                                    <span>от {{ $product->product_price }} рублей/тонна</span>
                                </div>

                                <!-- Manufacturer -->
                                @foreach ($product->manufacturers as $manufacturer)
                                    <div class="product-card__manufacturer transparentText__small">
                                        <a href="{{ route('manufacturerShow', $manufacturer->manufacturer_alias)}}"> {{ $manufacturer->name }} </span>
                                    </div>
                                @endforeach
                                <!-- / .Manufacturer -->

                                <div class="product-card__footer">
                                    <a uk-toggle="target: #my-id"class="uk-button uk-button-primary" >Оставить заявку</a>
                                </div>
                            </div>
                            <!-- /.product-card__body -->
                        @endforeach 
                    </div>
                @endif
            </div>
            <!-- /.section-content -->
        </div>
        <!-- /.section-wrap -->
        
    </div>
    <!-- /.container -->
    <div class="products_offer">
        <a href="{{ route('catalog') }}" class="uk-button uk-button-primary">
            Перейти в каталог
        </a>
    </div>
    <!-- /.products_offer -->
    <div class="section-footer products-footer"  uk-parallax="bgy: 200; easing: 5">
            <div class="products-footer-wrap" uk-parallax="bgy: 200; easing: 5">
               
            </div>
        </div>
        <!-- /.section-footer products-footer -->
</div>
<!-- /.section-products -->