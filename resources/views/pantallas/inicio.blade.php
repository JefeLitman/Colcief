<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ColCIEF - @yield('titulo')</title>
    <meta name="description" content="A demo landing page for agencies or product oriented businesses built using Shards, a free, modern and lightweight UI toolkit based on Bootstrap 4.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    {{-- CSSs --}}
    <link rel="stylesheet" href="{{ asset('css/shards.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shards-extras.min.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- SCRIPTS --}}
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  </head>
  <body class="shards-app-promo-page--1">
    @if (Request::path()=="/")
      @include('pantallas.login')
    @endif

    @yield('contenedor_login')

    <!-- Features Section -->
    <div id="app-features" class="app-features section">
      <div class="container-fluid">
        <div class="row">
          <div class="app-screenshot col-lg-4 col-md-12 col-sm-12 px-0 py-5">
            <img class="mt-auto mb-auto" src="img/app-promo/iphone-app-screenshot.png" alt="App Screenshot - Shards App Promo Demo Page">
          </div>

          <!-- App Features Wrapper -->
          <div class="app-features-wrapper col-lg-4 col-md-6 col-sm-12 py-5 mx-auto">
            <div class="container">
              <h3 class="section-title underline--left my-5">Features</h3>
              <div class="feature py-4 d-flex">
                <div class="icon text-white bg-success mr-5"><i class="fa fa-refresh"></i></div>
                <div>
                    <h5>Everything Synced</h5>
                    <p>Quisque mollis mi ac aliquet accumsan. Sed sed dapibus libero. Nullam luctus purus duis sensibus signiferumque.</p>
                </div>
              </div>

              <div class="feature py-4 d-flex">
                <div class="icon text-white bg-success mr-5"><i class="fa fa-shield"></i></div>
                <div>
                    <h5>Security</h5>
                    <p>Quisque mollis mi ac aliquet accumsan. Sed sed dapibus libero. Nullam luctus purus duis sensibus signiferumque.</p>
                </div>
              </div>

              <div class="feature py-4 d-flex">
                <div class="icon text-white bg-success mr-5"><i class="fa fa-share"></i></div>
                <div>
                    <h5>Sharing</h5>
                    <p>Quisque mollis mi ac aliquet accumsan. Sed sed dapibus libero. Nullam luctus purus duis sensibus signiferumque.</p>
                </div>
              </div>

              <div class="feature py-4 d-flex">
                <div class="icon text-white bg-success mr-5"><i class="fa fa-globe"></i></div>
                <div>
                    <h5>Access Anywhere</h5>
                    <p>Quisque mollis mi ac aliquet accumsan. Sed sed dapibus libero. Nullam luctus purus duis sensibus signiferumque.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Features Section -->

    <!-- Testimonials Section -->
    <div class="testimonials section py-4">
        <h3 class="section-title text-center m-5">Testimonials</h3>

        <div class="container py-5">
          <div class="row">
              <div class="col-md-4 testimonial text-center">
                  <div class="avatar rounded-circle with-shadows mb-3 ml-auto mr-auto">
                      <img src="img/common/avatar-1.jpeg" class="w-100" alt="Testimonial Avatar" />
                  </div>
                  <h5 class="mb-1">Osbourne Tranter</h5>
                  <span class="text-muted d-block mb-2">CEO at Megacorp</span>
                  <p>Vivamus quis ex mattis, gravida erat a, iaculis urna. Proin ac eleifend tortor. Nunc in augue eget enim venenatis viverra.</p>
              </div>

              <div class="col-md-4 testimonial text-center">
                  <div class="avatar rounded-circle with-shadows mb-3 ml-auto mr-auto">
                      <img src="img/common/avatar-2.jpeg" class="w-100" alt="Testimonial Avatar" />
                  </div>
                  <h5 class="mb-1">Darrin Ollie</h5>
                  <span class="text-muted d-block mb-2">CEO at Megacorp</span>
                  <p>Nullam eu ligula facilisis, commodo velit non, vulputate dolor. Aenean congue euismod vestibulum.</p>
              </div>

              <div class="col-md-4 testimonial text-center">
                  <div class="avatar rounded-circle with-shadows mb-3 ml-auto mr-auto">
                      <img src="img/common/avatar-3.jpeg" class="w-100" alt="Testimonial Avatar" />
                  </div>
                  <h5 class="mb-1">Quinton Bruce</h5>
                  <span class="text-muted d-block mb-2">CEO at Megacorp</span>
                  <p> Aenean imperdiet ultrices tortor id convallis. Donec id metus magna. Morbi pretium odio faucibus blandit gravida.</p>
              </div>
          </div>
        </div>
    </div>
    <!-- / Testimonials Section -->

    <!-- Our Blog Section -->
    <div class="blog section section-invert py-4">
      <h3 class="section-title text-center m-5">Latest Posts</h3>
      <div class="container">
        <div class="py-4">
          <div class="row">
            <div class="card-deck">
              <div class="col-md-12 col-lg-4">
                <div class="card mb-4">
                  <img class="card-img-top" src="img/common/card-1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Find Great Places to Work While Travelling</h4>
                    <p class="card-text">He seems sinking under the evidence could not only grieve and a visit. The father is to bless and placed in his length hid...</p>
                    <a class="btn btn-outline-success btn-pill" href="#">Read More &rarr;</a>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-4">
                <div class="card mb-4">
                  <img class="card-img-top" src="img/common/card-3.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Quick Tips for Improving Your Website's Design</h4>
                    <p class="card-text">He seems sinking under the evidence could not only grieve and a visit. The father is to bless and placed in his length hid...</p>
                    <a class="btn btn-outline-success btn-pill" href="#">Read More &rarr;</a>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-4">
                <div class="card mb-4">
                  <img class="card-img-top" src="img/common/card-2.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">A Designer's Tips While Travelling and Working</h4>
                    <p class="card-text">He seems sinking under the evidence could not only grieve and a visit. The father is to bless and placed in his length hid...</p>
                    <a class="btn btn-outline-success btn-pill" href="#">Read More &rarr;</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Our Blog Section -->

    <!-- Subscribe Section -->
    <div class="subscribe section bg-dark py-4">
      <h3 class="section-title text-center text-white m-5">Newsletter</h3>
      <p class="text-muted col-md-6 text-center mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At voluptatum libero ipsum eius rem, facere deserunt repudiandae autem sapiente dolores.</p>
      <form class="form-inline d-table mb-5 mx-auto" action="/">
        <div class="form-group">
          <input class="form-control border-0 mr-3 mb-2" type="text" placeholder="Email address">
          <button class="btn btn-success mb-2" type="submit">Subscribe</button>
        </div>
      </form>
    </div>
    <!-- / Subscribe Section -->

    <!-- Contact Section -->
    <div class="contact section-invert py-4">
      <h3 class="section-title text-center m-5">Contact Us</h3>
      <div class="container py-4">
        <div class="row justify-content-md-center px-4">
          <div class="contact-form col-sm-12 col-md-10 col-lg-7 p-4 mb-4 card">
            <form>
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="contactFormFullName">Full Name</label>
                    <input type="email" class="form-control" id="contactFormFullName" placeholder="Enter your full name">
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="contactFormEmail">Email address</label>
                    <input type="email" class="form-control" id="contactFormEmail" placeholder="Enter your email address">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Message</label>
                      <textarea id="exampleInputEmail1" class="form-control mb-4" rows="10" placeholder="Enter your message..." name="message"></textarea>
                  </div>
                </div>
              </div>
              <input class="btn btn-success btn-pill d-flex ml-auto mr-auto" type="submit" value="Send Your Message">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- / Contact Section -->

    @include('pantallas.footer')
  </body>
</html>

