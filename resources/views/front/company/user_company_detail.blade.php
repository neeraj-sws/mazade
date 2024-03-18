@extends('layouts.front')


@section('content')

<div class="inner-banner">
         <div class="container">
            <h2 class="inner-banner-title  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s">Company Details</h2>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Company Details</li>
               </ol>
            </nav>
         </div>
      </div>

     <div id="contact-inner" class="mt-5 mb-5">
      <div class="container">
        <div class="row company-box p-5">
          <h2 class="mb-5">Company Details</h2>
          <div class="col-md-6">
            <form action="your-server-endpoint" method="POST" class="all-form-data">
                <div class="form-group">
                   <input type="cname" id="cname" placeholder="Company Name" name="cname">
                </div>
                <div class="form-group mt-3">
                   <input type="code" id="code" placeholder="Code" name="code">
                </div>
                <div class="form-group mt-3">
                   <input type="location" id="location" placeholder="Location" name="location">
                </div>
                <div class="form-group login-btn-new">
                    <button type="submit">Submit</button>
                </div>

              </form>
          </div>
          <div class="col-md-6 col-6-pad-l">
            <p class="text-16">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52918450.40025156!2d-161.85240697328845!3d35.949761324666035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1708926498296!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
@endsection
