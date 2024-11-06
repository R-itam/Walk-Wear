<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
   

    <!-- Favicon -->
    <link href="bootstrap-shop-template/img/favicon.ico" rel="icon">

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
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{url('/cartview')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
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
                    <a href="{{url('/sneakerviewpage')}}" class="nav-item nav-link">Sneakers</a>
                        <a href="{{url('/sportshoeviewpage')}}" class="nav-item nav-link">Sport Shoe</a>
                        <a href="{{url('/slipperviewpage')}}" class="nav-item nav-link">Sandel</a>
                        <a href="{{url('/womenshoeviewpage')}}" class="nav-item nav-link">Women</a>
                        <a href="{{url('/limitedviewpage')}}" class="nav-item nav-link">Limited Edition</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <!-- <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a> -->
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                     
                         @if ($DATA)
 <a href="{{url('/adminhome')}}" class="nav-item nav-link">Home</a>
 @else
 <a href="{{url('/userhome')}}" class="nav-item nav-link">Home</a>

@endif
                            <a href="{{url('/shopview')}}" class="nav-item nav-link active">Shop</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <button class="btn btn-primary py-2 px-4"><a href="{{'/logout'}}">Log-Out</a></button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div><br>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    @if (isset($details))
                   <form action="{{url('/buynoworderaction')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label> Name</label>
                            <input class="form-control" type="text" name="name" placeholder="John" value="{{$details['C_name']}}" readonly>
                        </div>
                       
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" placeholder="example@email.com"  value="{{$details['C_email']}}" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="number" name="phone" placeholder="+123 456 789"  required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" name="address" placeholder="123 Street" required>
                        </div>
                        
                        
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="city" placeholder="New York" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" name="state" placeholder="New York" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="number" name="pin" placeholder="123" required>
                        </div>
                       
                    </div>
                 
                    
                    @endif
    
                </div>
             
            </div>
            <div class="col-lg-4">
    <div class="card border-secondary mb-5">
        <div class="card-header bg-secondary border-0">
            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
        </div>
        <div class="card-body">
            @if (isset($details))
                @php
                    $total = 0;
                   
                @endphp
                <table class="table table-hover">
                    <tr>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
      
                
                    <tr>
                        <td>{{$details['name']}} <input type="hidden" name="p_name" value="{{$details['name']}}"></td>
                        <td>{{$details['size']}} <input type="hidden" name="p_size" value="{{$details['size']}}"</td>
                        <td>{{$details['qty']}} <input type="hidden" name="p_qty" value="{{$details['qty']}}"></td>
                        <td>{{ number_format($details['price'], 2) }} <input type="hidden" name="p_price" value="{{$details['price']}}"></td>
                    </tr>
                
                   
                    @php
                        // Accumulate the total price
                        $total += $details['price'] * $details['qty'];
                    @endphp
           
                </table>
                <hr class="mt-0">
                <div class="d-flex justify-content-between mb-3 pt-1">
                    <h6 class="font-weight-medium">Subtotal</h6>
                    <h6 class="font-weight-medium">{{ number_format($total) }}</h6>
                </div>
                @php
                            if($total<10000){
                            $shipping=100;
                            }else{
                                $shipping=$total * 0.01;
                            }

                           
                            @endphp
                <div class="d-flex justify-content-between">
                    <h6 class="font-weight-medium">Shipping</h6>
                    <h6 class="font-weight-medium"> {{ round($shipping) }}</h6>
                    <input type="hidden" name="ship_c" value="{{ round($shipping, 2) }}">
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="font-weight-medium">Total</h6>
                    <h6 class="font-weight-medium"> {{ round($total + $shipping) }}</h6>
                </div>
            @endif
        </div>
        @php
        $Total=round($total+$shipping);
        
        @endphp
        <div class="card-footer border-secondary bg-transparent">
            <div class="d-flex justify-content-between mt-2">
                <h5 class="font-weight-bold">Total</h5>
                <h5 class="font-weight-bold"> {{$Total}}</h5>
                <!-- <input type="hidden" name="total" value="{{$Total}}"> -->
            </div>
        </div>
    </div>

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="COD">
                                <label class="custom-control-label" for="directcheck">Cash On Delivery</label>
                            </div>
                        </div>
                        <!-- <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="Bank-Transfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                <button id="banktransfer">Online</button> 
                            </div> -->
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                    </form>
                </di>
            </div>
        </div>
    </div>
    <!-- Checkout End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-6 col-md-12 mb-5 pr-3 pr-xl-5">
            <img src="banner/cover/logo.png" alt="" height="70px" class="img-fluid1" style="border-radius:10px;margin-buttom:30px;">
                
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-6 col-md-12">
                
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    
                   
                
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4" >
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark" >
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. 
					
					<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
					Designed by <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
           
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-shop-template/lib/easing/easing.min.js"></script>
    <script src="bootstrap-shop-template/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="bootstrap-shop-template/mail/jqBootstrapValidation.min.js"></script>
    <script src="bootstrap-shop-template/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="bootstrap-shop-template/js/main.js"></script>

   
</body>

</html>