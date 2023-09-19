<div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6 mt-0">
                <h1 class="text-white mb-4">
                    <img src="./new-images/logo.png" alt="" width="90">
                </h1>
                <p>
                    On 15th January 1980 (Army Day), the Chief of the Army Staff made an announcement regarding the
                    establishment of Army Schools throughout the country...
                </p>

            </div>
            <div class="col-lg-3 col-md-6 mt-0">
                <h4 class="text-light mb-4">Quick Links</h4>
                @php
                    $menus = App\Models\Menu::where('status', 1)->get();
                @endphp
                @foreach ($menus as $menues)
                <a class="btn btn-link" href="#">{{$menues->name}}</a>
                @endforeach
                {{-- <a class="btn btn-link" href="#">About Us</a>
                <a class="btn btn-link" href="#">Administration</a>
                <a class="btn btn-link" href="#">Admission</a>
                <a class="btn btn-link" href="#">Message Desk</a>
                <a class="btn btn-link" href="#">Activities</a>
                <a class="btn btn-link" href="#">Facilities</a>
                <a class="btn btn-link" href="#">Gallery</a> --}}
            </div>
            <div class="col-lg-3 col-md-6 mt-0">
                <h4 class="text-light mb-4">Information</h4>
                <a class="btn btn-link" href="">Activities</a>
                <a class="btn btn-link" href="">Rules & Regulations</a>
                <a class="btn btn-link" href="">Transfer Certificate</a>
                <a class="btn btn-link" href="">Examination & Promotion</a>
                <a class="btn btn-link" href="">Fee Structure</a>
                <a class="btn btn-link" href="">Results</a>
                <a class="btn btn-link" href="">Career</a>
            </div>
            <div class="col-lg-3 col-md-6 mt-0">
                <h4 class="text-light mb-4">Address</h4>
                <p>
                    <i class="fa fa-map-marker-alt me-3"></i>Maneckshaw Marg, Narangi, Kamrup,
                </p>
                <p><i class="fa fa-phone-alt me-3"></i>63226323</p>
                <p><i class="fa fa-phone-alt me-3"></i>9127482097</p>
                <p><i class="fa fa-envelope me-3"></i>apsnarangi@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-primary me-1" href=""><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-primary me-1" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-primary me-0" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-1">&copy; <a href="#">APS, Narangi</a>, All Right Reserved.</p>
                    <small class="mb-0">Designed By <a href="https://www.webcomindia.biz/"
                            target="_blank">Web.com (India) Pvt. Ltd. </a></small>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex pt-0" style="justify-content: flex-end;align-items: center;">
                        <a class="btn btn-square me-1" href="">Help</a>
                        |
                        <a class="btn btn-square me-1" href="">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
