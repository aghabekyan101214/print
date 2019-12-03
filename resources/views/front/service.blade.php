@extends("layouts.front")
@section("content")
    <section class="banner full-container">
        <div class="row m0">
            <div class="col-lg-6">
                <img src="{{ asset("assets/static/images/banner-img.png") }}" alt="banner" class="banner-item">
            </div>
            <div class="col-lg-6">
                <h2>Business Services</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
            </div>
        </div>
    </section>
    <section class="banner full-container">
        <div class="row m0">
            <div class="col-lg-6">
                <div class="banner-inner">
                    <h2>Business Services</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset("assets/static/images/banner-img2.png") }}" alt="banner" class="banner-item">
            </div>
        </div>
    </section>
    <section class="slider-banner full-container">
        <div class="demo container">
            <div class="item">
                <h3 class="slider-title">testimonials</h3>
                <ul id="content-slider" class="content-slider">
                    <li>
                        <div class="slider-inner-box">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting.
                        </div>
                        <img src="{{ asset("assets/static/images/slider-item.png") }}" alt="First slide">
                    </li>
                    <li>
                        <div class="slider-inner-box">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting.
                        </div>
                        <img src="{{ asset("assets/static/images/slider-item.png") }}" alt="First slide">
                    </li>
                    <li>
                        <div class="slider-inner-box">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting.
                        </div>
                        <img src="{{ asset("assets/static/images/slider-item.png") }}" alt="First slide">
                    </li>
                    <li>
                        <div class="slider-inner-box">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting.
                        </div>
                        <img src="{{ asset("assets/static/images/slider-item.png") }}" alt="First slide">
                    </li>
                    <li>
                        <div class="slider-inner-box">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting.
                        </div>
                        <img src="{{ asset("assets/static/images/slider-item.png") }}" alt="First slide">
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
