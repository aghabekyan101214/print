@extends("layouts.front")
@section("content")
    <section class="container">
        <p class="text-center">Our specialists stay late to answer and reply to all your needs. To get your order in advance and make sure everything is processed correctly, also to ensure  an uninterrupted flow of work for next day early production team.
        </p>
        <div class="contact-us-inner">
            <div>
                <div class="flex">
                    <p class="blue">Phone number:</p>
                    <p>+1(818)814-4220, +1(818)221-5451</p>
                </div>
                <div class="flex">
                    <p class="blue">Address:</p>
                    <p>PO Box 11174 Glendale, CA 91226</p>
                </div>
                <div class="flex">
                    <p class="blue">Email:</p>
                    <p>
                        production@caliprintworks.com, Info@caliprintworks.com
                    </p>
                </div>
            </div>
            <div>
                <div class="flex">
                    <p class="blue">Horse:</p>
                    <p>Monday-Friday: 8:00am  - 7:00pm </p>
                </div>
            </div>
        </div>
    </section>
    <section class="boxes container">
        <div> <a href="#"><img src="{{ asset("assets/static/images/box1.png") }}" alt="logo"></a></div>
        <div> <a href="#"><img src="{{ asset("assets/static/images/box2.png") }}" alt="logo"></a></div>
        <div> <a href="#"><img src="{{ asset("assets/static/images/box3.png") }}" alt="logo"></a></div>
        <div> <a href="#"><img src="{{ asset("assets/static/images/box4.png") }}" alt="logo"></a></div>
    </section>
@endsection
