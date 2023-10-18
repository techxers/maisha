@extends('layouts.main')
  


@section('content')
  
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Welcome to Living Goods</h6>
                <h2>We Provide <em>Community</em> &amp; <span>Health Workers</span> Training</h2>
                <p>Africa’s first 100% online health workers training platform.</p>
                <form id="search" action="#" method="GET">
                  <fieldset>
                    <input type="address" name="address" class="email" placeholder="How it works..." autocomplete="on" required>
                  </fieldset>
                  <fieldset>
                    <button type="submit" class="main-button">Learn More</button>
                  </fieldset>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img style="border-radius:20%;" src="{{asset('assets/images/logo/image.jpg')}}" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <img src="{{asset('assets/images/bg/domestic.jpg')}}" alt="person graphic">
          </div>
        </div>
        <div class="col-lg-8 align-self-center">
          <div class="services">
            <div class="row">
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="icon">
                    <img src="{{asset('assets/images/bg/side.png')}}" alt="reporting">
                  </div>
                  <div class="right-text">
                    <h4>Why Choose Us</h4>
                    <p>Living Good focuses on achieving and maintaining the highest standards and cleanliness within home environment.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                  <div class="icon">
                    <img src="{{asset('assets/images/bg/mtrain.jpg')}}" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Get Started For Free</h4>
                    <p>The training courses will teach maids in-depth cleaning, efficiency as well as safety. </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                  <div class="icon">
                    <img src="{{asset('assets/images/bg/training.jpg')}}" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Our Training</h4>
                    <p>We offer various types of trainings, housekeeping, kitchen keeping and all child care.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                  <div class="icon">
                    <img src="{{asset('assets/images/bg/new7.jpg')}}" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Mission and Vision</h4>
                    <p>Our mission and vision is to bring housekeeping solutions that are carefully designed to accomplish ultimate convenience at excellent value</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="left-image">
            <img src="{{asset('assets/images/bg/new.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="section-heading">
            <h2>Grow your healthcare <em>skills</em> and &amp; <span>Knowledge</span> With Us</h2>
            <p>We train on child safety, food handling, food storing, bathroom-making techniques (pottie cleaning), keeping all toys hygienic and nursery (Child Care).</p>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="first-bar progress-skill-bar">
                <h4>Free Training</h4>
                <span>84%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="second-bar progress-skill-bar">
                <h4>Qualified Instructors</h4>
                <span>88%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="third-bar progress-skill-bar">
                <h4>Comprehensive Curriculum</h4>
                <span>94%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h2>See What Our Agency <em>Offers</em> &amp; What We <span>Provide</span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="hidden-content">
                <h4>Childcare Training</h4>
                <p>We train on child safety, food handling, food storing, bathroom-making techniques </p>
              </div>
              <div class="showed-content">
                <img src="{{asset('test/assets/images/portfolio-image.png')}}" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
              <div class="hidden-content">
                <h4>Cooking Training</h4>
                <p>Our videos trains domestic workers to cook wonderfully wholesome family meals</p>
              </div>
              <div class="showed-content">
                <img src="{{asset('test/assets/images/portfolio-image.png')}}" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="hidden-content">
                <h4>Housekeeping</h4>
                <p>Learn general housekeeping, safety and prevention, bed & bathroom-making techniques.</p>
              </div>
              <div class="showed-content">
                <img src="{{asset('test/assets/images/portfolio-image.png')}}" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
              <div class="hidden-content">
                <h4>Electricity and Electronics </h4>
                <p>Learn how to use various electronics.</p>
              </div>
              <div class="showed-content">
                <img src="{{asset('test/assets/images/portfolio-image.png')}}" alt="">
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div id="blog" class="our-blog section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Check Out What Is <em>Trending</em> In Our Latest <span>Training Courses</span></h2>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="top-dec">
            <img src="{{asset('test/assets/images/blog-dec.png')}}" alt="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="left-image">
            <a href="#"><img src="{{asset('assets/images/bg/happy.png')}}" alt="Workspace Desktop"></a>
            <div class="info">
              <div class="inner-content">
                <ul>
                  <li><i class="fa fa-calendar"></i> 2021</li>
                  <li><i class="fa fa-users"></i> Maisha</li>
                  <li><i class="fa fa-folder"></i>Homecare</li>
                </ul>
                <a href="#"><h4>Living &amp; Goods Hub</h4></a>
                <p>Living Goods Hub is a hospitality training facility committed to empowering home support workers to deliver value for their clients (home owners)....</p>
                <div class="main-blue-button">
                  <a href="#">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="right-list">
            <ul>
              <li>
                <div class="left-content align-self-center">
                  <span><i class="fa fa-calendar"></i> 18 Mar 2021</span>
                  <a href="#"><h4>Kitchen Planning &amp; Safety</h4></a>
                  <p>A course on kitchen planning and safety...</p>
                </div>
                <div class="right-image">
                  <a href="#"><img src="{{asset('assets/images/bg/kitchen.png')}}" alt=""></a>
                </div>
              </li>
              <li>
                <div class="left-content align-self-center">
                  <span><i class="fa fa-calendar"></i> 14 Mar 2021</span>
                  <a href="#"><h4>Cooking Tips &amp; Ideas</h4></a>
                  <p>Learn how to cook various types of healthy meals...</p>
                </div>
                <div class="right-image">
                  <a href="#"><img src="{{asset('assets/images/bg/avatar.gif')}}" alt=""></a>
                </div>
              </li>
              <li>
                <div class="left-content align-self-center">
                  <span><i class="fa fa-calendar"></i> 06 Mar 2021</span>
                  <a href="#"><h4>Childcare &amp;Safety</h4></a>
                  <p>A course on childcare tips including how to maintain...</p>
                </div>
                <div class="right-image">
                  <a href="#"><img src="{{asset('assets/images/bg/childcare.jpg')}}" alt=""></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Feel Free To Send Us a Message</h2>
            <p> For more information about the courses feel free to contact us</p>
            <div class="phone-info">
              <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button ">Send Message</button>
                </fieldset>
              </div>
            </div>
            <div class="contact-dec">
              <img src="{{asset('test/assets/images/contact-decoration.png')}}" alt="contact">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
  