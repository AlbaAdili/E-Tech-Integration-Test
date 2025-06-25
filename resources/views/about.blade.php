@extends("layouts/master")

@section("title","About Page")

@section("content")
<section>
        <div class="pt-5 text-center">
          <h1 class="display-5 text-body-emphasis">About Us</h1>
          <div class="col-lg-7 mx-auto mt-3">
            <p class="lead">We privileged to be an authorized reseller for industry-leading tech giants, including Apple, Samsung, Sony, and a host of other renowned companies. Our commitment to excellence extends beyond the exceptional range of products we offer. Our foremost objective is your satisfaction, and these cherished partnerships empower us to consistently raise the bar, ensuring we continually outperform your expectations.</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center pt-3">
            <a href="{{ route('product.index') }}"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Shop now</button></a>
            <a href="{{ route('contact.create') }}"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Contact us</button></a>
            </div>
        </div>
      </section>
      <section>
        <div class="container marketing">
          <hr class="featurette-divider">
          <div class="row featurette">
            <div class="col-md-7 d-flex align-items-center"> 
                <div class="text-container">
                  <h2 class="featurette-heading fw-normal lh-1">Crafting Tomorrow's Technology Experience. <span class="text-body-secondary">Our Purpose</span></h2>
                  <p class="lead">Welcome to our company, where we're on a mission to craft tomorrow's technology experience. We're not just in the business of selling products; we're in the business of shaping the future. Our journey is dedicated to making technology more accessible, exciting, and fulfilling for all. Join us on this adventure as we explore, innovate, and redefine what's possible in the world of tech.</p>
               </div>
            </div>
            <div class="col-md-5">
              <img src="{{ asset('images/newsroom-1.jpg') }}" alt="Newsroom Number 1" style="width: 500px; height: 500px;">
            </div>
          </div>
          <hr class="featurette-divider">
          <div class="row featurette">
            <div class="col-md-7 order-md-2 d-flex align-items-center">
               <div class="text-container">
                 <h2 class="featurette-heading fw-normal lh-1">Our Tech Story. <span class="text-body-secondary">Passion for Innovation</span></h2>
                 <p class="lead">Dive into a world of possibilities with us. Our virtual shelves are stocked with a diverse range of tech products to cater to your every need. Whether you're an avid gamer, a creative professional, or a tech-savvy individual, we have something special for you. Explore our selection, and discover the tech solutions that make your life easier, more entertaining, and more productive.</p>
               </div>
            </div>
            <div class="col-md-5 order-md-1">
              <img src="{{ asset('images/newsroom-2.jpg') }}" alt="Newsroom Number 2" style="width: 500px; height: 500px;">
            </div>
          </div>
          <hr class="featurette-divider">
          <div class="row featurette">
            <div class="col-md-7 d-flex align-items-center">
                <div class="text-container">
                 <h2 class="featurette-heading fw-normal lh-1">Customer-Centric Excellence. <span class="text-body-secondary">Your Needs, Our Priority</span></h2>
                 <p class="lead">At our company, our customers are at the forefront of everything we do. Our dedicated team is here to provide you with a seamless and enjoyable shopping experience. Whether you have questions, need assistance, or simply want advice on the latest tech trends, our experts are always ready to assist you. We're committed to delivering not only top-notch tech products but also exceptional customer service.</p>
                </div>
              </div>
            <div class="col-md-5">
              <img src="{{ asset('images/newsroom-2.jpg') }}" alt="Newsroom Number 3" style="width: 500px; height: 500px;">
            </div>
          </div>
          <hr class="featurette-divider">
        </div>
      </section>
@endsection