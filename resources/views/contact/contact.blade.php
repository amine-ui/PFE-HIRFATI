
@extends('layouts.app')
@section('title')
  HERFATI | Contact
@endsection

@section('style')
<link href="{{asset('assets/css/contact/style.css')}}" rel="stylesheet" />
@endsection

@section('content')
<section class="ftco-section login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-5">
        <h2 class="heading-section mt-5">Contactez-nous</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10 col-md-12">
        <div class="wrapper">
          <div class="row no-gutters bg-white">
            <div class="col-md-7 d-flex align-items-stretch">
              <div class="contact-wrap w-100 p-md-5 p-4">
                <h3 class="mb-4">Contactez-nous</h3>
                <!-- status sent mail -->
                <div id="form-message-warning" class="mb-4"></div> 
                <div id="form-message-success" class="mb-4">
                  Your message was sent, thank you!
                </div>
                <!-- end status sent mail -->
                <form method="POST" id="contactForm" name="contactForm">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nom complet">
                      </div>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0"> 
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-12 my-4">
                      <div class="form-group">
                        <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Sujet">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Message"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 mt-4">
                      <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary bg-navy sub-contact">
                        <div class="submitting"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-5 d-flex align-items-stretch">
              <div class="info-wrap bg-navy text-white w-100 p-lg-5 p-4">
                <h3 class="mb-4 mt-md-4">Localisation</h3>
                <div class="dbox w-100 d-flex align-items-start">
                  <span class="fa fa-map-marker me-2 mt-2"></span>
                  <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>
                <div class="w-100 d-flex align-items-start">
                  <span class="fa fa-phone  me-2 mt-2 "></span>
                  <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                </div>
                <div class="w-100 d-flex align-items-start">
                    <span class="fa fa-paper-plane  me-2 mt-2"></span>
                    <p><span>Email:</span> <a href="mailto:contact@firfati.ma">contact@firfati.ma</a></p>
                </div>
                <div class="w-100 d-flex align-items-start">
                    <span class="fa fa-globe  me-2 mt-1"></span>
                    <p><span>SiteWeb</span> <a href="#">hirfati.ma</a></p>
                </div>
                <div class="mt-4 d-flex align-items-center justify-content-center co-logo rounded-4">
                  <img height="200px" src="{{asset('assets/images/logo.png')}}" alt="" class="">
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection