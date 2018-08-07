<!DOCTYPE html>
<html lang="en">

<head>
  <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	 * Demo Developed by Kayla Pratt - kaylapratt.com
	 * Copyright (C) 2017 Kayla Pratt - All Rights Reserved
	 * You may view and distribute this demo only for
     the Emory University web developer job search committee.
   * This project nor any assets attached may be used for any purpose except
     what is previously specified.
	////////////////////////////////////////// -->
  <!--  Meta  -->
  <meta charset="UTF-8" />
  <meta name='pagename' content='About | Oxford College of Emory University'>
  <meta name='keywords' content='oxford,emory,college,university,education,atlanta,georgia,school,liberal arts,undergraduate,leadership,bachelors'>
  <meta name='summary' content='Oxford College is an undergraduate division of Emory University for freshmen and sophomores only, located 38 miles east of Atlanta. On Emory’s original campus in Oxford, Ga., students enjoy a distinctive, small liberal-arts college environment with excellence in teaching and an emphasis on student leadership. All students continue on to Emory’s Atlanta campus as juniors to complete their bachelor’s degree. '>
  <meta name='description' content='Oxford College is an undergraduate division of Emory University for freshmen and sophomores located 38 miles east of Atlanta on Emory’s original campus.'>
  <meta name='abstract' content='Oxford College is an undergraduate division of Emory for freshmen and sophomores only emphasizing stellar teaching and student leadership.'>
  <title>About</title>

  <!--  Styles  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Noto+Sans" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="{{ asset('css/index.processed.css') }}">
</head>

<body>
  <!-- Navigation -->
  <!-- megamenu -->
  <nav class="navbar navbar-fixed-top">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Oxford College</a>
    </div>
    <div class="collapse navbar-collapse js-navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <i class="fa fa-chevron-down" aria-hidden="true"></i></a>

          <ul class="dropdown-menu mega-dropdown-menu row">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">About Oxford</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/255x150/3498db/f5f5f5/&text=Quick+Facts" class="img-responsive" alt="product 1"></a>
                      <h4><small>86% of Classes have fewer than 30 students.</small></h4>

                      <button href="#" class="btn btn-primary" type="button"><i class="fa fa-pie-chart" aria-hidden="true"></i> More Quick Facts</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/255x150/ef5e55/f5f5f5/&text=Visit+Us" class="img-responsive" alt="product 2"></a>
                      <h4><small>We are located on Emory's first campus.</small></h4>
                      <button href="#" class="btn btn-primary" type="button"><i class="fa fa-map-marker" aria-hidden="true"></i> Come Visit Us</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/255x150/2ecc71/f5f5f5/&text=Tour" class="img-responsive" alt="product 3"></a>
                      <h4><small>Get to know Oxford.</small></h4>
                      <button href="#" class="btn btn-primary" type="button"><i class="fa fa-calendar" aria-hidden="true"></i> Schedule a Tour</button>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <!--
                <li class="divider"></li>
                <li><a href="#">View all Collection <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
								-->
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">What is Oxford?</li>
                <li><a href="#">Experience Oxford</a></li>
                <li><a href="#">Part of Emory</a></li>
                <li><a href="#">Quick Facts</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Leadership</li>
                <li><a href="#">Dean</a></li>
                <li><a href="#">Senior Leadership</a></li>
                <li><a href="#">Student Leadership</a></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Location</li>
                <li><a href="#">Surrounding Area</a></li>
                <li><a href="#">Transportation</a></li>
                <li><a href="#">Visit Oxford</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Visiting Oxford</li>
                <li><a href="#">Accommodations</a></li>
                <li><a href="#">Maps and Directions</a></li>
                <li><a href="#">Schedule a Tour</a></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Oxford College Address</li>
                <li>
                  <a href="#"></i><address><i class="fa fa-map-marker" aria-hidden="true"></i> 110 Few Circle<br />
									Oxford, GA 30054</address></a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-header">Oxford Newsletter</li>
                <form class="form" role="form">
                  <div class="form-group">
                    <label class="sr-only" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                </form>
              </ul>
            </li>
          </ul>
        </li>
        <!-- end About -->
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academics <i class="fa fa-chevron-down" aria-hidden="true"></i></a>

          <ul class="dropdown-menu mega-dropdown-menu row">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Upcoming Events</li>
                <div class="calendar-list">
                  <ul>
                    <li>
                      <a href="#">
                        <div class="calendar-list__date">
                          <span>Mar</span><span>21</span>
                        </div>
                        <div class="calendar-list__desc">
                          <span>Authoritatively communicate emerging</span>
                          <span><i class="fa fa-clock-o" aria-hidden="true"></i> 5:00 pm</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="calendar-list__date">
                          <span>Apr</span><span>2</span>
                        </div>
                        <div class="calendar-list__desc">
                          <span>Objectively disintermediate revolutionary</span>
                          <span><i class="fa fa-clock-o" aria-hidden="true"></i> 7:00 am</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="calendar-list__date">
                          <span>Apr</span><span>17</span>
                        </div>
                        <div class="calendar-list__desc">
                          <span>Efficiently symbiotic excellence</span>
                          <span><i class="fa fa-clock-o" aria-hidden="true"></i> 12:00 pm</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
                <button href="#" class="btn btn-primary" type="button"><i class="fa fa-calendar" aria-hidden="true"></i> Academic Calendar</button>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">An Oxford Education</li>
                <li><a href="#">Academic Calendar</a></li>
                <li><a href="#">College catalog</a></li>
                <li><a href="#">Educational Experience</a></li>
                <li><a href="#">Library</a></li>
                <li><a href="#">Programs</a></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Studying Here</li>
                <li><a href="#">Inquiry-based Courses</a></li>
                <li><a href="#">Service Learning</a></li>
                <li><a href="#">Student Research</a></li>
                <li><a href="#">Travel Programs</a></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Divisions</li>
                <li><a href="#">History &amp; Social Science</a></li>
                <li><a href="#">Humanities</a></li>
                <li><a href="#">Natural Science &amp; Mathematics</a></li>
              </ul>
            </li>
          </ul>

        </li>
        <!-- end Academics -->
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Campus Life <i class="fa fa-chevron-down" aria-hidden="true"></i></a>

          <ul class="dropdown-menu mega-dropdown-menu row">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Campus Life</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=Quick+Facts" class="img-responsive" alt="product 1"></a>
                      <h4><small>Check out the Oxford Eagles!</small></h4>

                      <button href="#" class="btn btn-primary" type="button"><i class="fa fa-trophy" aria-hidden="true"></i> Oxford Athletics</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=Visit+Us" class="img-responsive" alt="product 2"></a>
                      <h4><small>Diversity is our strength.</small></h4>
                      <button href="#" class="btn btn-primary" type="button"><i class="fa fa-users" aria-hidden="true"></i> More about Diversity</button>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=Tour" class="img-responsive" alt="product 3"></a>
                      <h4><small>Become an active club member.</small></h4>
                      <button href="#" class="btn btn-primary" type="button"><i class="fa fa-smile-o" aria-hidden="true"></i> Clubs &amp; Organizations</button>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <!--
                <li class="divider"></li>
                <li><a href="#">View all Collection <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
								-->
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Living at Oxford</li>
                <li><a href="#">Dining</a></li>
                <li><a href="#">Diversity</a></li>
                <li><a href="#">Housing</a></li>
                <li><a href="#">International Students</a></li>
                <li><a href="#">Location</a></li>
                <li><a href="#">Sustainability</a></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Living at Oxford</li>
                <li><a href="#">Clubs and Student Organizations</a></li>
                <li><a href="#">Community Engagement and Service</a></li>
                <li><a href="#">Leadership Programs</a></li>
                <li><a href="#">SGA</a></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Thriving at Oxford</li>
                <li><a href="#">Athletics</a></li>
                <li><a href="#">Center for Healthful Living</a></li>
                <li><a href="#">Counseling and Career Services</a></li>
                <li><a href="#">Religious and Spiritual Life</a></li>
                <li><a href="#">Student Health Services</a></li>
              </ul>
            </li>
          </ul>

        </li>
        <!-- end Campus Life -->
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admission <i class="fa fa-chevron-down" aria-hidden="true"></i></a>

          <ul class="dropdown-menu mega-dropdown-menu row">
            <li class="col-sm-3">
              <ul>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=Quick+Facts" class="img-responsive" alt="product 1"></a>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=Visit+Us" class="img-responsive" alt="product 2"></a>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=Tour" class="img-responsive" alt="product 3"></a>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <!--
                <li class="divider"></li>
                <li><a href="#">View all Collection <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
								-->
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Admission</li>
                <li><a href="#">Apply</a></li>
                <li><a href="#">Request Information</a></li>
                <li><a href="#">Schedule Your Visit</a></li>
              </ul>
            </li>
          </ul>

        </li>
        <!-- end Admission -->
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumni <i class="fa fa-chevron-down" aria-hidden="true"></i></a>

          <ul class="dropdown-menu mega-dropdown-menu row">
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Connect</li>
									<img src="https://placehold.it/200x150/"/>
									<br />
									<br />
                	<div class="btn-group" role="group" aria-label="social media">
										<button type="button" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i></button>
										<button type="button" class="btn btn-primary"><i class="fa fa-twitter" aria-hidden="true"></i></button>
										<button type="button" class="btn btn-primary"><i class="fa fa-instagram" aria-hidden="true"></i></button>
										<button type="button" class="btn btn-primary"><i class="fa fa-flickr" aria-hidden="true"></i></button>
									</div>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Alumni &amp; Friends</li>
                <li><a href="#">Alumni Benefits</a></li>
                <li><a href="#">Awards</a></li>
                <li><a href="#">Mentor Programs &amp; Internships</a></li>
								<li class="divider"></li>
                <li class="dropdown-header">Alumni Involvement</li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Leadership</a></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Upcoming Events</li>
                <div class="calendar-list">
                  <ul>
                    <li>
                      <a href="#">
                        <div class="calendar-list__date">
                          <span>Mar</span><span>21</span>
                        </div>
                        <div class="calendar-list__desc">
                          <span>Authoritatively communicate emerging</span>
                          <span><i class="fa fa-clock-o" aria-hidden="true"></i> 5:00 pm</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="calendar-list__date">
                          <span>Apr</span><span>2</span>
                        </div>
                        <div class="calendar-list__desc">
                          <span>Objectively disintermediate revolutionary</span>
                          <span><i class="fa fa-clock-o" aria-hidden="true"></i> 7:00 am</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="calendar-list__date">
                          <span>Apr</span><span>17</span>
                        </div>
                        <div class="calendar-list__desc">
                          <span>Efficiently symbiotic excellence</span>
                          <span><i class="fa fa-clock-o" aria-hidden="true"></i> 12:00 pm</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
                <button href="#" class="btn btn-primary" type="button"><i class="fa fa-calendar" aria-hidden="true"></i> Alumni Events</button>
              </ul>
            </li>

          </ul>

        </li>
        <!-- end Alumni -->
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Offices &amp; Services <i class="fa fa-chevron-down" aria-hidden="true"></i></a>

          <ul class="dropdown-menu mega-dropdown-menu row">
            <li class="col-sm-4">
              <ul>
                <li class="dropdown-header">Offices &amp; Services</li>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=Quick+Facts" class="img-responsive" alt="product 1"></a>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=Visit+Us" class="img-responsive" alt="product 2"></a>
                    </div>
                    <!-- End Item -->
                    <div class="item">
                      <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=Tour" class="img-responsive" alt="product 3"></a>
                    </div>
                    <!-- End Item -->
                  </div>
                  <!-- End Carousel Inner -->
                </div>
                <!-- /.carousel -->
                <!--
                <li class="divider"></li>
                <li><a href="#">View all Collection <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
								-->
              </ul>
            </li>
            <li class="col-sm-4">
              <ul>
                <li class="dropdown-header">Offices</li>
                <li><a href="#">Human Resources</a></li>
                <li><a href="#">Institute for Pedagogy in the Liberal Arts</a></li>
                <li><a href="#">Oxford College Information Technology</a></li>
                <li><a href="#">Center for Academic Excellence</a></li>
                <li><a href="#">Four columns</a></li>
              </ul>
            </li>
            <li class="col-sm-4">
              <ul>
                <li class="dropdown-header">Services</li>
                <li><a href="#">Bookstore</a></li>
                <li><a href="#">Commencement</a></li>
                <li><a href="#">Events and Conferences</a></li>
								<li><a href="#">Oxford Organic Farm</a></li>
              </ul>
            </li>
          </ul>

        </li>
        <!-- end Offices & Services -->
      </ul>
      <!-- right side menu -->
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#"><i class="fa fa-gift" aria-hidden="true"></i> Give</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Inside Oxford</a>
        </li>
        <li class="search-wrap">
						<a href="#" class="btn btn-default toggle search"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
						<input type="text" class="form-control toggle-input" placeholder="Search...">
        </li>
      </ul>

    </div>
    <!-- /.nav-collapse -->
  </nav>
  <!-- megamenu -->


  <!-- Full Width Image Header with Logo -->
  <header class="image-bg-fluid-height hero">
    <div class="overlay">
      <div class="hero__content">
        <h1>Take off from here.<br />
				Go <em>anywhere.</em></h1>
        <img class="img-responsive img-center" src="http://oxford.emory.edu/_includes/images/site-wide/Ox_sq_rev.png" alt="Oxford College at Emory University">
      </div>
    </div>
  </header>

  <!-- Content Section -->
  <section id="kicker">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-heading">It's your turn to soar.</h2>
          <p class="lead section-lead">Start strong at one of two undergraduate options for first-year Emory University students.</p>
          <p class="section-paragraph">Oxford College offers an unusually intensive focus on the liberal arts, leadership, and service as well as the close attention of committed and outstanding faculty.</p>
          <p class="section-paragraph">Here, you’ll be able to chart your course through Emory, where you can earn a bachelor’s degree in the sciences and humanities, business, or nursing. Building on Oxford’s solid foundation, there’s no limit to where you’ll go or what you’ll do.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Fixed Height Image Aside -->
  <!-- Image backgrounds are set within the full-width-pics.css file. -->
  <aside class="image-bg-fixed-height"></aside>

  <!-- Content Section -->
  <section id="cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-heading">Experience Oxford</h2>
          <div class="cta-wrap">
            <div class="cta__text col-xs-9 col-sm-6">
              <h2>Part of Emory</h2>
              <p>Of Emory's nine schools, Oxford is among its most diverse. In fact, 19% of our students are international.</p>
              <button href="#" class="btn btn-default" type="button"><i class="fa fa-info" aria-hidden="true"></i> Learn More</button>
            </div>
            <div class="cta__bg col-xs-3 col-sm-6"></div>
          </div>
          <div class="cta-wrap">
            <div class="cta__bg col-xs-3 col-sm-6"></div>
            <div class="cta__text col-xs-9 col-sm-6">
              <h2>Liberal Arts Intensified</h2>
              <p>It’s knowledge turned up a notch. It’s where you put theory into practice and practice what we teach.</p>
              <button href="#" class="btn btn-default" type="button"><i class="fa fa-info" aria-hidden="true"></i> Learn More</button>
            </div>
          </div>
          <div class="cta-wrap">
            <div class="cta__text col-xs-9 col-sm-6">
              <h2>Leadership</h2>
              <p>Led by Dean Douglas Hicks, Oxford’s leadership team includes faculty, staff, and students.</p>
              <button href="#" class="btn btn-default" type="button"><i class="fa fa-info" aria-hidden="true"></i> Learn More</button>
            </div>
            <div class="cta__bg col-xs-3 col-sm-6"></div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>

<!-- Content Section -->
  <section id="history">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-heading">A history of making a difference.</h2>
          <p class="lead section-lead">Emory began when it was founded on the Oxford College campus more than 175 years ago.</p>
          <p class="section-paragraph">It’s where a small liberal arts college shaped a generation of leaders before moving to Atlanta to become a full-fledged university. Today, Oxford students still excel as leaders—and as models of community service.</p>
					<button href="#" class="btn btn-primary" type="button">Take a Tour <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
        </div>
      </div>
    </div>
  </section>

<!-- Content Section -->
  <section id="location">
		<div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-heading">Where We Are</h2>
          <p class="lead section-lead">Oxford College is about a 45-minute drive from Emory University’s main campus in Atlanta.</p>
          <p class="section-paragraph">There is more to this distinctive place than its location on the map. Plan a visit to the Oxford campus and our hometown, the historic birthplace of Emory.</p>
					<button href="#" class="btn btn-default" type="button"><i class="fa fa-info" aria-hidden="true"></i> Learn More</button>
        </div>
      </div>
    </div>
		</div>
  </section>

<!-- Content Section -->
  <section id="facts">
		
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-heading">Different at First Glance</h2>
          <p class="section-paragraph">Our size. The closeness and diversity of our community. The professors invested in you and in finding better ways for you to learn. The experiences you’ll have. The fun and friends you’ll make.</p>
					<p class="lead section-lead">It all adds up to an extraordinary education.</p>
					<div class="col-md-3 col-sm-6 info-wrap">
						
							<div class="info__title">
								<h3 class="info__stat">960</h3>
								<i class="info__icon fa fa-users" aria-hidden="true"></i>
							</div>
							<p class="info__desc">students enrolled in 2016</p>
					
					</div>
					<div class="col-md-3 col-sm-6 info-wrap">
						
							<div class="info__title">
								<h3 class="info__stat">20</h3>
								<i class="info__icon fa fa-star" aria-hidden="true"></i>
							</div>
							<p class="info__desc">average class size</p>
				
					</div>
					<div class="col-md-3 col-sm-6 info-wrap">
					
							<div class="info__title">
								<h3 class="info__stat">22.4<span>%</span></h3>
								<i class="info__icon fa fa-globe" aria-hidden="true"></i>
							</div>
							<p class="info__desc">number of international students</p>

					</div>
					<div class="col-md-3 col-sm-6 info-wrap">
						
							<div class="info__title">
								<h3 class="info__stat">9</h3>
								<i class="info__icon fa fa-trophy" aria-hidden="true"></i>
							</div>
							<p class="info__desc">NJCCA Division III varsity athletics teams</p>
					
					</div>
					<br />
					<button href="#" class="btn btn-default" type="button"><i class="fa fa-info" aria-hidden="true"></i> Learn More</button>
        </div>
      </div>
    </div>

  </section>

<!-- Content Section -->
  <section id="splan">
		<div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-heading">Forging Pathways of Excellence</h2>
         
            <div class="splan__text col-md-6">
              <p class="lead section-lead">For nearly 180 years, our campus has served as a crossroads where people venture to be educated and then follow their own paths to serve a world in need of thoughtful, principled, and effective leaders.</p>
            </div>
						 <div class="splan__text col-md-6">
							<p class="section-paragraph">Oxford’s 2020 strategic plan outlines the steps the college will take, with the help of its dedicated alumni, to harness its strengths in academics, teaching, and leadership training for first- and second-year students to make, paraphrasing former president Atticus Haygood, what is really good much better.</p>
							 <button href="#" class="btn btn-default" type="button"><i class="fa fa-info" aria-hidden="true"></i> Learn More</button>
						</div>
         
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
		</div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <img class="logo" src="http://oxford.emory.edu/_includes/images/site-wide/Ox_sq_rev.png" />
        </div>
        <div class="col-sm-3">
					<h3>Oxford College of Emory University</h3>
					<address>110 Few Circle<br />
						Oxford, Georgia<br />
						30054 USA <br />
						<i class="fa fa-phone" aria-hidden="true"></i> 770.784.8888</address>
        </div>
        <div class="col-sm-3">
					<nav>
						<ul aria-role="navigation">
							<h3>Resources</h3>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Directory</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Maps &amp; Directions</a></li>
							<li><a href="#">Visit</a></li>
							<li><a href="#">Inside Oxford</a></li>
						</ul>
					</nav>
        </div>
        <div class="col-sm-3">
					<h3>Connect</h3>
          <div class="btn-group" role="group" aria-label="social media">
						<button type="button" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-primary"><i class="fa fa-twitter" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-primary"><i class="fa fa-youtube" aria-hidden="true"></i></button>
					</div>
					<br />
					<br />
					<div id='MicrosoftTranslatorWidget' class='Light'></div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </footer>
<section id="post-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p>&copy; 2017 Oxford College of Emory University. All Rights Reserved.</p>
			</div>
			<div class="col-md-6">
				<nav>
					<ul aria-role="navigation">
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Careers</a></li>
						<li><a href="#">Emergency Information</a></li>
						<li><a href="#">Compliance</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</section>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="{{ asset('js/megamenu.js') }}"></script>
  <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>