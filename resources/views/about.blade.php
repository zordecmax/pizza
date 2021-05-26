@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Fast and Delicious Pizza. <span class="text-muted" style="color: red!important;">We do pizza right</span></h2>
                <p class="lead">
                    here’s nothing cookie-cutter about Pizza Hut. Not our pizzas. Not our people. And definitely not the way we live life. Around here, we don’t settle
                    for anything less than food we’re proud to serve. And we don’t just clock in. Not when we can also<br>
                    <strong> We’re the pizza company that lives life unboxed.</strong><br>
                    At Pizza Hut, we don’t just make pizza. We make people happy. Pizza Hut was built on the belief that pizza night should be special, and we carry that belief into everything we do.
                </p>
            </div>
            <div class="col-md-5">
{{--                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>--}}
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="/images/pizza-about.jpg" width="100%" >

            </div>
        </div>

        <div class="row text-center text-lg-left">
            <div class="col-12">
                <h2>Gallery</h2>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal1.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal2.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal3.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal4.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal5.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal6.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal1.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal1.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal1.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal1.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal1.jpg" alt="" width="100%">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/images/gallery/pizza_gal1.jpg" alt="" width="100%">
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Our team</h2>
            </div>
            <div class="col-lg-4 text-center">
{{--                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>--}}
                <img class="bd-placeholder-img rounded-circle" src="/images/man1.jpg" width="100%" style="max-width: 150px">

                <h3>George Arnold</h3>
                <p>Department manager<br>
                704-439-1310<br>
                GeorgeArnold@jourrapide.com<br>
                Facebook<br>
                Linkedin</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 text-center">
{{--                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>--}}
                <img class="bd-placeholder-img rounded-circle" src="/images/woman.jpg" width="100%" style="max-width: 150px">

                <h3>Katie Stephens</h3>
                <p>Administrative services manager<br>
                    843-272-9702<br>
                    KatieStephens@armyspy.com<br>
                    Facebook<br>
                    Linkedin</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 text-center">
{{--                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>--}}
                <img class="bd-placeholder-img rounded-circle" src="/images/man2.jpg" width="100%" style="max-width: 150px">
                <h3>Benjamin Williams</h3>
                <p>Personnel associate<br>
                    802-356-4240<br>
                    BenjaminWilliams@teleworm.us<br>
                    Facebook<br>
                    Linkedin</p>
            </div><!-- /.col-lg-4 -->
        </div>
    </div>
@endsection
