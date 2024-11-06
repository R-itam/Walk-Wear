<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="bootstrap-shop-template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap-shop-template/css/style.css" rel="stylesheet">
    <style>
        .btn{
            border-radius: 5px;
        }
        .btn>a{
            color: black;
        }
        .btn>a:hover{
            text-decoration: none;
        }
        .img-fluid1{
           height: 80px;
           border-radius: 10px;
           margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
       
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
            <img src="banner/cover/walk.png" alt="" height="70px">
            </div>
            <div class="col-lg-6 col-6 text-left"> 
             
            </div>
            <div class="col-lg-3 col-6 text-right">
            @if (isset($Info))
                @foreach ($Info->all() as $all )
                <img src="{{$all->Image}}" alt="" height="50px" width="50px" style="border-radius:30px;">
                <b>{{$all->Name}}</b>
                
                @endforeach
                
                @endif
                <a href="{{url('/ordersummery')}}" class="btn border">
                    <i class="fas fa-shopping-bag text-primary"></i>
                   
                </a>
                <a href="{{url('/cartview')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                  
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <a href="{{url('/tshirtviewpage')}}" class="nav-item nav-link">T-SHIRT</a>
                        <a href="{{url('/sneakerviewpage')}}" class="nav-item nav-link">Sneakers</a>
                        <a href="{{url('/sportshoeviewpage')}}" class="nav-item nav-link">Sport Shoe</a>
                        <a href="{{url('/slipperviewpage')}}" class="nav-item nav-link">Sandel</a>
                        <a href="{{url('/womenshoeviewpage')}}" class="nav-item nav-link">Women</a>
                        <a href="{{url('/limitedviewpage')}}" class="nav-item nav-link">Limited Edition</a>
                        <a href="{{url('/jacketviewpage')}}" class="nav-item nav-link">Jacket</a>
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">

                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{url('/adminpanel')}}" class="nav-item nav-link">Adminpanel</a>
                            <a href="{{url('/adminhome')}}" class="nav-item nav-link">Home</a>
                            <a href="{{url('/shopview')}}" class="nav-item nav-link">Shop</a>
                            <a href="{{url('/admincontact')}}" class="nav-item nav-link">Contact</a>
                            
                        </div>
                      
                        <div class="navbar-nav ml-auto py-0">
                            <button class="btn btn-primary py-2 px-4"><a href="{{'/logout'}}">Log-Out</a></button>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Contact Us</h1>
            <div class="d-inline-flex">
                
                
                <p class="m-0">Contact</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        @if (session('text'))
        <div class="alert alert-danger">
            {{session('text')}}
        </div>
        @endif
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form method="post" action="{{url('/feedbackaction')}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" name="name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"name="subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Message" name="message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h2 class="font-weight-semi-bold mb-3" align="center">GET IN TOUCH</h2><br><br>
               
                <div class="d-flex flex-column mb-3" align="center">
                    <h5 class="font-weight-semi-bold mb-3">Office Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-6 col-md-12 mb-5 pr-3 pr-xl-5">
            <img src="banner/cover/walk.png" alt="" height="70px" class="img-fluid1">
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-6 col-md-12">
                
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            
                            <a class="text-dark" href=""><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Walk & Wear</a>. All Rights Reserved. 
					
					<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
					Designed by <a class="text-dark font-weight-semi-bold" href="">Ritam</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-shop-template/bootstrap-shop-template/lib/easing/easing.min.js"></script>
    <script src="bootstrap-shop-template/bootstrap-shop-template/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="bootstrap-shop-template/bootstrap-shop-template/mail/jqBootstrapValidation.min.js"></script>
    <script src="bootstrap-shop-template/bootstrap-shop-template/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="bootstrap-shop-template/bootstrap-shop-template/js/main.js"></script>
</body>

</html>