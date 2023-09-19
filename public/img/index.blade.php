@extends('layouts.app')
@section('content')
    <section class="hero-section">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="hero-slider owl-carousel">
                    <div class="hs-item set-bg" data-setbg="jist_new_img/jist_1st.jpg" style="background-position: 100%;">
                    </div>
                    <div class="hs-item hs-item-2 set-bg" data-setbg="jist_new_img/slider_2.jpg"></div>
                    <div class="hs-item set-bg" data-setbg="jist_new_img/slider_2_3.jpg"
                        style="background-position: 43% 100%;"></div>
                    <div class="hs-item set-bg" data-setbg="jist_new_img/slider2_2.jpg" style="background-position: 100%;">
                    </div>
                    <div class="hs-item set-bg" data-setbg="jist_new_img/slider_5.jpg"
                        style="background-position: 100% 100%;"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mobile-notice-padding">
                <section class="showcase">

                    <div class="overlay notice_content">
                        <h4 class="notice_heading">News & Notifications</h4>
                        <marquee behavior="scroll" direction="up" scrollamount="4" height="290" onMouseOver="this.stop()"
                            onMouseOut="this.start()">
                            <ul class="ul_list" style="min-height: 310px;">
                                <li><strong>Admission</strong><br><a href="#">6th,8th and Intermediate Research Scholar
                                        admission notice</a><br><strong class="notice-date"><em>Posted on
                                            22-01-2023</em></strong></li>
                                <li><strong>Admission</strong><br><a href="#">Transfer Notice for B.Tech 1st Semester
                                        (Fee)</a><br><strong class="notice-date"><em>Posted on 22-01-2023</em></strong>
                                </li>
                                <li><strong>Admission</strong><br><a href="#">Abhishek Phukon Borah, student of JIST is
                                        awarded as the BEST DELEGATE (1st) of Economic and financial committee of United
                                        nations, ECOFIN, of IITG MUN in collaboration with G20.</a><br><strong
                                        class="notice-date"><em>Posted on 22-01-2023</em></strong></li>
                                <li><strong>Admission</strong><br><a href="#">Refund of CEE admission </a><br><strong
                                        class="notice-date"><em>Posted on 22-01-2023</em></strong></li>
                                <li><a href="#">Academic Calender (even semester), 2023</a><br><strong
                                        class="notice-date"><em>Posted on 22-01-2023</em></strong></li>
                                <li><a href="#">Bus Timing</a><br><strong class="notice-date"><em>Posted on
                                            22-01-2023</em></strong></li>
                                <li><a href="#">Formula for Conversion of CGPA into Equivalent Percentage under
                                        ASTU</a><br><strong class="notice-date"><em>Posted on 22-01-2023</em></strong>
                                </li>
                            </ul>
                        </marquee>
                        <a href="notifications.html" class="read_more_btn"><span>Read More</span></a>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- Hero section end -->
    <!-- Counter section  -->
    <section class="counter-section counter-section_announce" style="padding: 40px 0 40px 0;">
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="big-icon">
                        <!-- <i class="fa fa-graduation-cap"></i> -->
                        <img src="./icon-fonts/icons8-admission-30.png" alt="" srcset="">
                    </div>
                    <div class="counter-content">
                        <h2><a href="admission.html">Admission</a></h2>
                        <p><i class="fa fa-calendar-o"></i>Published on: 24 Oct 2022</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="big-icon">
                        <!-- <i class="fa fa-graduation-cap"></i> -->
                        <img src="./icon-fonts/icons8-calendar-30.png" alt="" srcset="">
                    </div>
                    <div class="counter-content">
                        <h2><a href="academic-calender.html">Academic Calendar</a></h2>
                        <p><i class="fa fa-calendar-o"></i>Published on: 2 Nov 2022</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="big-icon">
                        <!-- <i class="fa fa-graduation-cap"></i> -->
                        <img src="./icon-fonts/icons8-test-passed-30.png" alt="" srcset="">
                    </div>
                    <div class="counter-content">
                        <h2>Examination Cell</h2>
                        <p><i class="fa fa-calendar-o"></i>New Updates</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="big-icon">
                        <!-- <i class="fa fa-graduation-cap"></i> -->
                        <img src="./icon-fonts/icons8-test-results-30.png" alt="" srcset="">
                    </div>
                    <div class="counter-content">
                        <h2><a href="result.html">Results</a></h2>
                        <p><i class="fa fa-calendar-o"></i>Published on: 12 Sept 2022</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Counter section end -->

    <!-- Principal Desk Start -->
    <section class="service-section spad">
        <div class="container">
            <div class="mobile-h3-size">
                <span style="color: #f6783a;font-weight: 700;font-style: italic;">Welcome to</span>
                <h3 class="notice_heading">Jorhat Institute of <span style="color: #f6783a;">Science & Technology</span>
                </h3>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <p style="text-align:justify">
                        Jorhat Institute of Science and Technology, in short, JIST is a premier and unique Institute of
                        Assam, situated in Sotai, Jorhat District of Assam. Formerly, it was Science College,
                        established in 1971, as a Degree Science College with Courses in Major Science subjects namely
                        Physics, Chemistry and Mathematics .
                    </p>
                    <p style="text-align:justify">
                        In the year 2008, it was renamed as Jorhat Institute of Science and Technology with an aim to
                        expand the Institute. New Departments namely Department of Computer Science and Information
                        Technology was introduced in the year, 2007 by introducing 3 years professional course in B.Sc.
                        (IT) and two Engineering Branches namely, Electronics and Telecommunications (ETC) and Power
                        Electronics and Instrumentation (PE&I) in August, 2009 and two more new branches namely
                        Mechanical Engineering and Civil Engineering are introduced form the academic session 2016-17.
                        To fulfill the Mission and Vision of the Institute, from this acadmic session i.e August,2016,
                    </p>
                    <a href="about.html" class="read_more_btn"><span>Read More</span></a>
                </div>
                <div class="col-lg-3">
                    <a href="principal.html">
                        <!-- <img src="./jist_new_img/jist_slider_2.jpg" alt=""> -->
                        <div class="jist-principal-div">
                            <div style="margin-bottom: 8px;">
                                <img src="./jist_new_img/principal-atanudutta-new.jpg" alt="">
                            </div>
                            <h5>Dr. Atanu Kumar Dutta</h5>
                            <h6>Principal</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Principal Desk End -->


    <!-- Notice & Event Section Start -->
    <section class="service-section spad" style="padding-top:0">
        <div class="container jist_news_events">
            <div class="row">
                <div class="col-lg-8 news_margin_top">
                    <h3 class="notice_heading" style="margin-top: 11px;color:#111111">Upcoming News & Events</h3>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="blog-item">
                                <div class="blog-thumb set-bg" data-setbg="./images/lachit_diwas.jpg"></div>
                                <div class="blog-content">
                                    <h6>Lachit Diwas Celebration</h6>
                                    <div class="blog-meta">
                                        <span><i class="fa fa-calendar-o"></i> 24 Nov 2022</span>
                                        <span><i class="fa fa-user"></i> JIST</span>
                                    </div>
                                    <p>November 24 is celebrated as Lachit Divas (Lachit Day)..</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="blog-item">
                                <div class="blog-thumb set-bg" data-setbg="./images/logo_main.png"></div>
                                <div class="blog-content">
                                    <h6>JIST Students' Union Body Election -2022</h6>
                                    <div class="blog-meta">
                                        <span><i class="fa fa-calendar-o"></i> 28 Nov 2022</span>
                                        <span><i class="fa fa-user"></i> JIST</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="blog-item">
                                <div class="blog-thumb set-bg" data-setbg="./images/logo_main.png"></div>
                                <div class="blog-content">
                                    <h6>JIST Students' Union Body Election -2022</h6>
                                    <div class="blog-meta">
                                        <span><i class="fa fa-calendar-o"></i> 24 Dec 2022</span>
                                        <span><i class="fa fa-user"></i> JIST</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="blog-item">
                                <div class="blog-thumb set-bg" data-setbg="./images/logo_main.png"></div>
                                <div class="blog-content">
                                    <h6>JIST Students' Union Body Election -2022</h6>
                                    <div class="blog-meta">
                                        <span><i class="fa fa-calendar-o"></i> 23 Mar 2022</span>
                                        <span><i class="fa fa-user"></i>
                                            JIST</span>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <section class="showcase1">
                        <h3 class="notice_heading" style="margin-top: 11px;color:#111111">Important Links</h3>
                        <div class="important-links">
                            <div class="student_corner_div_2">
                                <div class="icon_corner">
                                    <img src="./jist_new_img/anti-rag-1.png" alt="" srcset="">
                                </div>
                                <div class="content_corner1">
                                    <h6><a href="#">Anti Ragging</a></h6>
                                </div>
                            </div>
                            <div class="student_corner_div_2">
                                <div class="icon_corner">
                                    <img src="./jist_new_img/advertisement.png" alt="" srcset="" width="40">
                                </div>
                                <div class="content_corner1">
                                    <h6><a href="#">Mandatory Disclosure</a></h6>
                                </div>
                            </div>
                            <div class="student_corner_div_2">
                                <div class="icon_corner">
                                    <img src="./jist_new_img/UGC-Preview.png" alt="" srcset="" width="40">
                                </div>
                                <div class="content_corner1">
                                    <h6><a href="union-body.html">UGC</a></h6>
                                </div>
                            </div>
                            <div class="student_corner_div_2">
                                <div class="icon_corner">
                                    <img src="./jist_new_img/NAAC-Logo-250x250-1.webp" alt="" srcset="" width="40">
                                </div>
                                <div class="content_corner1">
                                    <h6><a href="#">NAAC</a></h6>
                                </div>
                            </div>
                            <div class="student_corner_div_2">
                                <div class="icon_corner">
                                    <img src="./jist_new_img/All_India_Council_for_Technical_Education_logo.png" alt=""
                                        srcset="" width="40">
                                </div>
                                <div class="content_corner1">
                                    <h6><a href="#">AICTE</a></h6>
                                </div>
                            </div>
                            <div class="student_corner_div_2">
                                <div class="icon_corner">
                                    <img src="./jist_new_img/complaint.png" alt="" srcset="" width="40">
                                </div>
                                <div class="content_corner1">
                                    <h6><a href="grievance.html">Grievance Cell</a></h6>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </section>


    <section class="enroll-section spad set-bg"
        data-setbg="https://i0.wp.com/mountain-ink.com/wp-content/uploads/2021/01/Feature-Photo-2.jpg?fit=800%2C375&ssl=1"
        style="margin:0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h3 style="color: #eaeaea;">STUDENT CORNER</h3>
                    </div>
                    <div class="enroll-list text-white">
                        <div class="student_corner_div">
                            <div class="icon_corner">
                                <img src="./icon-fonts/icons8-scholarship-30.png" alt="" srcset="">
                            </div>
                            <div class="content_corner">
                                <h4><a href="scholarship.html">Scholarship</a></h4>
                            </div>
                        </div>
                        <div class="student_corner_div">
                            <div class="icon_corner">
                                <img src="./icon-fonts/icons8-team-30.png" alt="" srcset="">
                            </div>
                            <div class="content_corner">
                                <h4><a href="union-body.html">Union Body</a></h4>
                            </div>
                        </div>
                        <div class="student_corner_div">
                            <div class="icon_corner">
                                <img src="./icon-fonts/icons8-festival-30.png" alt="" srcset="">
                            </div>
                            <div class="content_corner">
                                <h4><a href="#">Techno Fest</a></h4>
                            </div>
                        </div>
                        <div class="student_corner_div">
                            <div class="icon_corner">
                                <img src="./icon-fonts/icons8-flower-medal-for-the-marine-corps-officers-30.png" alt=""
                                    srcset="">
                            </div>
                            <div class="content_corner">
                                <h4><a href="#">NSS / NCC</a></h4>
                            </div>
                        </div>
                        <div class="student_corner_div">
                            <div class="icon_corner">
                                <img src="./icon-fonts/icons8-complain-30.png" alt="" srcset="">
                            </div>
                            <div class="content_corner">
                                <h4><a href="grievance.html">Grievance Cell</a></h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 p-lg-0 p-4">
                    <div class="section-title text-white">
                        <h3 style="color: #eaeaea;">PLACEMENT CELL</h3>
                    </div>
                    <div class="enroll-list text-white">
                        <p>The training and placement cell of JIST is an elite association of faculty/student initiative
                            interested in producing successful engineers, educational experts. After the establishment
                            of this cell way back in 2011, it has been constantly trying to bridge the gap between
                            industry andacademia.</p>
                    </div>
                    <h5 class="section-title text-white" style="color:#358b88!important;">Industrial Organizations/
                        Sectors that have extended their support for Training and Internship</h5>
                    <div class="placement_org">
                        <div class="org_1">
                            <img src="./jist_new_img/apgcl.png" alt="">
                        </div>
                        <div class="org_1">
                            <img src="./jist_new_img/indian_oil.jpg" alt="">
                        </div>
                        <div class="org_1">
                            <img src="./jist_new_img/indian_railway.jpg" alt="">
                        </div>
                        <div class="org_1">
                            <img src="./jist_new_img/neist.jpg" alt="">
                        </div>
                        <div class="org_1">
                            <img src="./jist_new_img/neepco.jpg" alt="">
                        </div>
                        <div class="org_1">
                            <img src="./jist_new_img/doordarshan.jpg" alt="">
                        </div>
                    </div>
                    <a href="tpc.html" class="read_more_btn" style="margin-top:1.5rem"><span>Read More</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section Start -->
    <section class="image_gallery" style="margin:50px 0;padding-bottom:50px">
        <main class="main">
            <div class="section-title text-center">
                <h3>Image Gallery</h3>
            </div>
            <!-- <h3>Image Gallery</h3> -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-image">
                        <a href="./jist_new_img/gallery_1.jpg" data-fancybox="gallery" data-caption="Caption Images 1"
                            data-lightbox="roadtrip">
                            <img src="./jist_new_img/gallery_1.jpg" alt="Image Gallery">
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <a href="./jist_new_img/slider_1.jpg" data-fancybox="gallery" data-caption="Caption Images 1"
                            data-lightbox="roadtrip">
                            <img src="./jist_new_img/slider_1.jpg" alt="Image Gallery">
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <a href="./jist_new_img/gallery_2.jpg" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="./jist_new_img/gallery_2.jpg" alt="Image Gallery">
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <a href="./jist_new_img/gallery_3.jpg" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="./jist_new_img/gallery_3.jpg" alt="Image Gallery">
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <a href="./jist_new_img/gallery_4.jpg" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="./jist_new_img/slider_2.jpg" alt="Image Gallery">
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <a href="./jist_new_img/IMG-20221214-WA0001.jpg" data-fancybox="gallery"
                            data-caption="Caption Images 1">
                            <img src="./jist_new_img/IMG-20221214-WA0001.jpg" alt="Image Gallery">
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <a href="./jist_new_img/IMG-20221214-WA0018.jpg" data-fancybox="gallery"
                            data-caption="Caption Images 1">
                            <img src="./jist_new_img/IMG-20221214-WA0018.jpg" alt="Image Gallery">
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image">
                        <a href="./jist_new_img/IMG-20221214-WA0010.jpg" data-fancybox="gallery"
                            data-caption="Caption Images 1">
                            <img src="./jist_new_img/IMG-20221214-WA0010.jpg" alt="Image Gallery">
                        </a>
                    </div>
                </div>
                <!-- <div class="card">
    					<div class="card-image">
    					<a href="./jist_new_img/IMG-20221214-WA0011.jpg" data-fancybox="gallery" data-caption="Caption Images 1">
    						<img src="./jist_new_img/IMG-20221214-WA0011.jpg" alt="Image Gallery">
    					</a>
    					</div>
    				</div> -->
            </div>
            <a href="gallery.html" class="read_more_btn_dept" style="float:right;margin: 1.2rem 1rem 0 0;"><span>View
                    Gallery</span></a>
        </main>
    </section>
@endsection

