<div>

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Menu</h2>
                <p>Check Our Tasty Menu</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        @php
                        // $categories = \App\Models\Category::all();
                        $categories = \App\Models\Category::has('products')->get();
                        @endphp
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ( $categories as $category )
                        <li data-filter=".{{$category->name }}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Lazy eager loading for products with category   --}}

            {{-- @foreach ( $categories as $category )
            @php
            $catRelation = $category->load('products')
            @endphp
            @foreach ( $catRelation->products as $product)
            {{ $product->name }}
            @endforeach

            @endforeach --}}

            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                @foreach ( $categories as $category )

                @php

                $catRelation = $category->load('products')

                @endphp

                @foreach ( $catRelation->products as $product)

                <div class="col-lg-6 menu-item {{ $category->name }}">
                    <img src="assets/img/menu/lobster-bisque.jpg" class="menu-img mr-3" alt="">
                    <div>
                        <p>{{ $product->name }}</p>
                        <small style="font-style: italic; font-size: 14px; color:
                            rgba(255, 255, 255, 0.5);">{{ $product->description }}
                        </small>

                    </div>
                    <div class="d-flex justify-content-between" style="margin: 15px 0 0 86px;">
                        <p style="font-weight: 600; color: #cda45e;">${{ $product->price }}</p>
                        <a href="#" style="font-size: 26px;"><i class="icofont-plus-square"></i></a>
                    </div>
                </div>

                @endforeach

                @endforeach

            </div>

        </div>
    </section><!-- End Menu Section -->

</div>