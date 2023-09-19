<!DOCTYPE html>
<html lang="en">

<head>
    <title>JIST</title>
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
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css"
        integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
</head>

<body class="topheaderBelowNav">
    <!-- Page Preloder -->
    <!-- header section -->
    @include('layouts.top-header')
    <!-- header section end-->

    <!-- NavBar section  -->
    @include('layouts.navbar')
    <!-- NavBar section end -->

    <!-- Hero section -->
    <div class="">
        @yield('content')
    </div>


    <!-- Gallery Section End -->

    <!-- Footer section -->
    @include('layouts.footer')
    <!-- Footer section end-->
    <!--====== Javascripts & Jquery ======-->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.js')}}"></script>
    <script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup.min.js')}}"></script>
    <!-- <script src="{{asset('js/main.js')}}"></script> -->
    <script src="{{asset('./js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
        integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        let $affectedElements = $("p, h1, h2, h3, h4, h5, h6,span,li,a");
		$affectedElements.each( function(){
		var $this = $(this);
		$this.data("orig-size", $this.css("font-size") );
		});

		$("#btn-increase").click(function(){
		changeFontSize(1);
		})

		$("#btn-decrease").click(function(){
		changeFontSize(-1);
		})

		$("#btn-orig").click(function(){
		$affectedElements.each( function(){
				var $this = $(this);
				$this.css( "font-size" , $this.data("orig-size") );
		});
		})

		function changeFontSize(direction){
			$affectedElements.each( function(){
				var $this = $(this);
				$this.css( "font-size" , parseInt($this.css("font-size"))+direction );
			});
		}
    </script>
    @yield('scripts')

</body>

</html>
