<!DOCTYPE html>
<html lang="en">

<head>
    <title>Department</title>
    <meta charset="UTF-8">
    <meta name="description"
        content="Jorhat Institute of Science and Technology is a premier and unique Institute of Assam, situated in Sotai, Jorhat District of Assam. Formerly, it was Science College, established in 1971, as a Degree Science College with Courses in Major Science subjects namely Physics, Chemistry and Mathematics.">
    <meta name="keywords" content="Science, Technology, Education, Institute">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="shortcut icon"/> -->
    <link rel="icon" type="image/x-icon" href="./images/logo_main.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
    <!-- Stylesheets -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" />

    <style>
        .showcase {
            height: 280px;
            margin-top: 0
        }

        .showcase .overlay {
            height: 280px;
        }

        .ul_list {
            height: 330px;
        }

        .owl-stage-outer {
            height: 280px !important;
        }

        .hero-section {
            background-color: #f1f1e6;
        }
    </style>

</head>

<body class="topheaderBelowNav">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- header section -->
    <header class="header-section top-header">
        <div class="container">
            <div class="top_header_dept">
                <div class="department-title">
                    <img src="{{asset('images/logo_main.png')}}" alt="JIST Logo">
                    <h2>  {{$subcategory->title}}</h2>
                    <h6><i>Jorhat Institute of Science & Technology</i></h6>
                </div>

                <div class="gotohome-btn-container">
                    <a href="{{url('/')}}">
                        <button class="gotohome-btn">
                            <span class="text">Go to Main Page</span>
                            <div class="icon-container">
                                <div class="icon icon--left">
                                    <img src="{{asset('icon-fonts/icons8-home-15.png')}}" alt="">
                                </div>
                                <div class="icon icon--right">
                                    <img src="{{asset('icon-fonts/icons8-home-15.png')}}" alt="">
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end-->

    <nav class="navbar navbar-expand-lg nav-section topheaderBelowNav">
        <div class="container mobile-toggle-btn">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 navbar_ul">
                    @php
                        $dept_menu = App\Models\DepartmentMenu::where('status',1)->get();
                    @endphp
                    <li class="nav-item active">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    @foreach ($dept_menu as $menu)
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="">{{$menu->name}}</a>
                        </li>
                    @endforeach
                    {{-- <li class="nav-item"><a class="nav-link" aria-current="page" href="#">Faculties</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page"
                            href="phy-research-scholars.html">Research Scholars</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="phy-staffs.html">Staff</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="phy-syllabus.html">Courses
                            & Syllabus</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="phygallery.html">Photo
                            Gallery</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Contact Us</a></li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header section end -->
    <div class="">

        <section class="department-home hero-section" style="height: 280px;padding: .5rem 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="hero-slider owl-carousel" style="height: 280px;">

                            <div class="hs-item set-bg" data-setbg="{{asset('jist_new_img/physics_glry/2.jpeg')}}" style="background-position: 43% 100%;"></div>
                            <div class="hs-item set-bg" data-setbg="{{asset('jist_new_img/physics_glry/4.jpeg')}}"
                                style="background-position: 43% 100%;"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <section class="showcase">
                            <!-- <img src="https://images.unsplash.com/photo-1505410603994-c3ac6269711f?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="Picture"> -->
                            <div class="overlay notice_content">
                                <h4 class="notice_heading">Department Notifications</h4>
                                <marquee behavior="scroll" direction="up" scrollamount="4" height="180"
                                    onMouseOver="this.stop()" onMouseOut="this.start()">
                                    <ul class="ul_list">
                                        <li><strong>Admission</strong><br><a href="#">6th,8th and Intermediate Research
                                                Scholar admission notice</a><br><strong class="notice-date"><em>Posted on
                                                    22-01-2023</em></strong></li>
                                        <li><strong>Admission</strong><br><a href="#">Transfer Notice for B.Tech 1st
                                                Semester (Fee)</a><br><strong class="notice-date"><em>Posted on
                                                    22-01-2023</em></strong></li>
                                        <li><strong>Admission</strong><br><a href="#">Abhishek Phukon Borah, student of JIST
                                                is awarded as the BEST DELEGATE (1st) of Economic and financial committee of
                                                United nations, ECOFIN, of IITG MUN in collaboration with
                                                G20.</a><br><strong class="notice-date"><em>Posted on
                                                    22-01-2023</em></strong></li>
                                        <li><strong>Admission</strong><br><a href="#">Refund of CEE admission
                                            </a><br><strong class="notice-date"><em>Posted on 22-01-2023</em></strong></li>
                                        <li><a href="#">Academic Calender (even semester), 2023</a><br><strong
                                                class="notice-date"><em>Posted on 22-01-2023</em></strong></li>
                                    </ul>
                                </marquee>
                                <a href="#" class="read_more_btn"><span>View All</span></a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

        </section>
        @yield('content')
    </div>

    <!-- Hero section -->

    <!-- Hero section end -->


    {{-- <!-- Counter section  -->
    <section class="department-home counter-section counter-section_announce" style="padding: 40px 0 40px 0;">
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="big-icon">
                        <!-- <i class="fa fa-graduation-cap"></i> -->
                        <img src="./icon-fonts/icons8-admission-30.png" alt="" srcset="">
                    </div>
                    <div class="counter-content">
                        <h2>Dept. Admission</h2>
                        <p><i class="fa fa-calendar-o"></i>Published on: 24 Oct 2022</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="big-icon">
                        <!-- <i class="fa fa-graduation-cap"></i> -->
                        <img src="./icon-fonts/icons8-schedule-30.png" alt="" srcset="">
                    </div>
                    <div class="counter-content">
                        <h2>Class Routine</h2>
                        <p><i class="fa fa-calendar-o"></i>Published on: 2 Nov 2022</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="big-icon">
                        <!-- <i class="fa fa-graduation-cap"></i> -->
                        <img src="./icon-fonts/icons8-test-passed-30.png" alt="" srcset="">
                    </div>
                    <div class="counter-content">
                        <h2>Class Notes</h2>
                        <p><i class="fa fa-calendar-o"></i>New Updates</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="big-icon">
                        <!-- <i class="fa fa-graduation-cap"></i> -->
                        <img src="./icon-fonts/icons8-report-card-30.png" alt="" srcset="">
                    </div>
                    <div class="counter-content">
                        <h2>Results</h2>
                        <p><i class="fa fa-calendar-o"></i>Published on: 12 Sept 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter section end -->

    <!-- HOD Desk Start -->
    <section class="service-section spad">
        <div class="container services">
            <div class="principal_div_section">
                <h3>About the <span style="color: #f27639">Department</span></h3>
                <div class="row">
                    <div class="col-lg-8">
                        <p style="text-align:justify">
                            The Physics Department started its functioning since in the inception of the college known
                            as Science College, Jorhat in the year 1971, which was the only general degree Science
                            college under Govt. of Assam. It may be mentioned that Honours (Major) in Physics was
                            compulsory from the beginning of the college. In the year 2008, Science College was renamed
                            as Jorhat Institute of Science and Technology with an aim to expand the Institute.
                        </p>
                        <p style="text-align:justify">
                            Physics Department introduced M.Sc. Course under semester system mode from the academic
                            session 2016-17 affiliated to Dibrugarh University. Now, all the courses of M.Sc. and B.Sc.
                            are under CBCS system affiliated to Assam Science and Technology University, Guwahati, Assam
                            from the year 2018-19 onward. Moreover Ph.D. programme in Physics started from the session
                            2019-20 under Assam Science and Technology University, Guwahati, Assam.
                            The department has well equipped laboratories, departmental library and a common computer
                            laboratory for imparting the education to all fraternities of the department.
                        </p>
                        <!-- <a href="#" class="read_more_btn"><span>Read More</span></a> -->
                    </div>
                    <div class="col-lg-4 principal_img">
                        <div class="hod">
                            <img src="./jist_new_img/faculties/monisa.png" alt="" width="180">
                            <h6 style="color: #000;margin-top: .6rem;">Head of the Department(HOD)</h6>
                            <span>Dr. Monisa Rajkhowa</span><br>
                            <span>Assoc. Prof. & HOD</span><br>
                            <span>Email: <a href="mailto:monisa.rajkhowa@gmail.com"
                                    style="color: #344986;">monisa.rajkhowa@gmail.com</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hod Desk End -->

    <!-- Mission Vision Start -->
    <section class="service-section spad">
        <div class="container services">
            <div class="principal_div_section">
                <div class="section-title2">
                    <h3>Mission & <span style="color:#f27639">Vision</span></h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="margin-inner-h-tag">
                            <h6>Our Mission</h6>
                        </div>
                        <p style="text-align:justify">
                            To create an environment where the faculties continue to grow as scholars providing high
                            quality physics education and equipping students for higher education.
                        </p>
                        <div class="margin-inner-h-tag">
                            <h6>Our Vision</h6>
                        </div>
                        <p style="text-align:justify">
                            To build a foundation for excellence and encourage the development of the Institution as a
                            premier Institution by igniting and promoting enthusiasm, interests and passion, in the
                            study of physics, in professional courses, as a part of curriculum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Mission vision End -->

    <!-- Research Scholars Start -->
    <section class="service-section spad">
        <div class="container services">
            <div class="research_scholar_section">
                <h3 class="section-title" style="color:#358b88">Our <span style="color:#f27639">Faculties</span></h3>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="card-container">
                            <!-- <span class="pro">1</span> -->
                            <img class="round" src="./jist_new_img/faculties/monisa.png" alt="user" />
                            <h5>Dr. Monisa Rajkhowa </h5>
                            <span class="qualification">M.Sc., Ph.D.</span>
                            <h6>Designation: Assoc.Prof.</h6>
                            <p><a href="mailto:monisa.rajkhowa@gmail.com">monisa.rajkhowa@gmail.com</a></p>
                            <div class="buttons">
                                <button class="primary ghost">
                                    <a href="mailto:monisa.rajkhowa@gmail.com"><img
                                            src="./icon-fonts/icons8-mail-account-20.png" alt=""></a>
                                </button>
                                <button class="primary">Publication</button>
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-phone-20.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card-container">
                            <img class="round" src="./jist_new_img/faculties/rongita.png" alt="user" />
                            <h5>Mrs. Ranjita Goswami </h5>
                            <span class="qualification">M.Sc., M.Phil.</span>
                            <h6>Designation: Assoc.Prof.</h6>
                            <p>Not Available</p>
                            <div class="buttons">
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-mail-account-20.png" alt="">
                                </button>
                                <button class="primary">Publication</button>
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-phone-20.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card-container">
                            <img class="round" src="./jist_new_img/faculties/gg.jpg" alt="user" />
                            <h5>Dr. Gauri Goutam Borthakur </h5>
                            <span class="qualification">M.Sc., PhD.</span>
                            <h6>Designation: Asstt. Prof.</h6>
                            <p>Email: Not Available</p>
                            <div class="buttons">
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-mail-account-20.png" alt="">
                                </button>
                                <button class="primary">Publication</button>
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-phone-20.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card-container">
                            <img class="round"
                                src="https://us.123rf.com/450wm/kritchanut/kritchanut1410/kritchanut141000071/32813949-businessman-silhouette-photo-de-profil-avatar-sur-fond-blanc.jpg?ver=6"
                                alt="user" />
                            <h5> Dr. Pranjal Saikia </h5>
                            <span class="qualification">M.Sc., PhD</span>
                            <h6>Designation: Asstt. Prof.</h6>
                            <p>Email: Not Available</p>
                            <div class="buttons">
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-mail-account-20.png" alt="">
                                </button>
                                <button class="primary">Publication</button>
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-phone-20.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card-container">
                            <img class="round"
                                src="https://us.123rf.com/450wm/kritchanut/kritchanut1410/kritchanut141000071/32813949-businessman-silhouette-photo-de-profil-avatar-sur-fond-blanc.jpg?ver=6"
                                alt="user" />
                            <h5>Mr. Anshuman Phukon</h5>
                            <span class="qualification">M.Sc.(Physics), M.Tech (Exploration Geophysics) </span>
                            <h6>Designation: Asstt. Prof.</h6>
                            <p>Email: phukan.anshu@gmail.com</p>
                            <div class="buttons">
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-mail-account-20.png" alt="">
                                </button>
                                <button class="primary">Publication</button>
                                <a href="tel:7002977383"><button class="primary ghost">
                                        <img src="./icon-fonts/icons8-phone-20.png" alt="">
                                    </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card-container">
                            <img class="round"
                                src="https://us.123rf.com/450wm/kritchanut/kritchanut1410/kritchanut141000071/32813949-businessman-silhouette-photo-de-profil-avatar-sur-fond-blanc.jpg?ver=6"
                                alt="user" />
                            <h5>Mr. Palash Jyoti Konwar </h5>
                            <span class="qualification">M.Sc.</span>
                            <h6>Designation: Asstt. Prof.</h6>
                            <p>Email: Not Available</p>
                            <div class="buttons">
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-mail-account-20.png" alt="">
                                </button>
                                <button class="primary">Publication</button>
                                <button class="primary ghost">
                                    <img src="./icon-fonts/icons8-phone-20.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card-container">
                            <img class="round"
                                src="https://us.123rf.com/450wm/kritchanut/kritchanut1410/kritchanut141000071/32813949-businessman-silhouette-photo-de-profil-avatar-sur-fond-blanc.jpg?ver=6"
                                alt="user" />
                            <h5>Mr. Rajesh Dutta </h5>
                            <span class="qualification"> M.Sc.</span>
                            <h6>Designation: Asstt. Prof.</h6>
                            <p>Email: Not Available</p>
                            <div class="buttons">
                                <a href="mailto:phukan.anshu@gmail.com"><button class="primary ghost">
                                        <img src="./icon-fonts/icons8-mail-account-20.png" alt="">
                                    </button></a>
                                <button class="primary">Publication</button>
                                <a href="tel:7002977383"><button class="primary ghost">
                                        <img src="./icon-fonts/icons8-phone-20.png" alt="">
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Research Scholars End -->
 --}}

    <!-- Newsletter section -->
    {{-- <section class="newsletter-section" style="margin-top:2rem">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-7">
                    <div class="section-title mb-md-0">
                        <h3>JIST NEWSLETTER</h3>
                        <span>Department of Physics</span><br>
                        <a href="#" class="read_more_btn" style="float: left;
					margin-top: 2rem;"><span>Subscribe</span></a>
                        <!-- <p>Subscribe and get the latest news and useful tips, advice and best offer.</p> -->
                    </div>
                </div>
                <div class="col-md-7 col-lg-5">
                    <div class="jist_newsletter_div">
                        <a href=""><img src="./images/jistNewsletter_1.jpg" alt=""></a>
                        <a href=""><img src="./images/jist_newsletter.jpg" alt=""></a>
                    </div>

                    <!-- <form class="newsletter">
						<input type="text" placeholder="Enter your email">
						<button class="site-btn">SUBSCRIBE</button>
					</form> -->
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Newsletter section end -->

    <!--====== Javascripts & Jquery ======-->

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.js')}}"></script>
    <script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
        integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
