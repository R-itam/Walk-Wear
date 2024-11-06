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
       .card {
    height: 400px; /* Set the height of the card */
    width: 100%; /* Set the width of the card to 100% of its parent */
}


.img-fluid{
    height: 200px;
    width:200px;
    margin-left: 100px;
}
.btn{
            border-radius: 5px;
        }
        .btn>a{
            color: black;
        }
        .btn>a:hover{
            text-decoration: none;
          
        }
        input{
            border: none;
        }
        .bt{
            border: 0.5px;
            border-radius: 5px;
        }
        .bt:hover{
            background-color:#e6e8ea;
        }
        .btn1{
            border-radius: 5px;
        }
        .btn1>hover{
           color: black;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        
        </div>
        <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
               <img src="banner/cover/walk.png" alt="" height="70px">
            </div>
            <div class="col-lg-6 col-6 text-left">
                
            </div>
            <div class="col-lg-3 col-6 text-right">
            <a href="{{url('/ordersummery')}}" class="btn border">
                    <i class="fas fa-shopping-bag text-primary"></i>
                   
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
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
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
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;background-image:url(banner/cover/l1.jpg);
            background-repeat:no-repeat;
            background-size:cover ;">
            <h1 class="font-weight-semi-bold text-uppercase mb-3" style="color:red;">SPORT SHOE SECTION</h1>
            <div class="d-inline-flex">
                
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->



            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="{{ url()->current() }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request()->get('search') }}" style="width: 200px;">
        <button type="submit" class="btn btn-primary ml-2">Search</button>
    </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sort by
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="{{ url()->current()  }}?sort=latest">Latest</a>
                                    <a class="dropdown-item" href="{{ url()->current()  }}?sort=price_low_high">Price: Low to High</a>
                                    <a class="dropdown-item" href="{{ url()->current()  }}?sort=price_high_low">Price: High to Low</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($Sportinfo))
                    @if ($Sportinfo->isEmpty())
                        <div class="col-12 text-center">
            <h4 class="text-muted">Can't find anything.</h4>
        </div>
                    
                    
                    @else
                    @foreach ($Sportinfo->all() as $item )
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1 text-center" style="padding:60px;">
            <div class="card product-item border-0 mb-4">
            
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <form action="{{url('/addcart')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <img class="img-fluid mx-auto d-block" src="{{$item->Image}}" alt="" height="100px" width="100px">
                    <input type="hidden" name="s_avatar" value="{{$item->Image}}">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3" >
                    <h4 class="text-truncate mb-3"><input type="text" name="s_name" value="{{$item->Name}}" readonly style="text-align: center;" ></h4><br>
                    <h5 style="margin-right:60px;">Color: <input type="text" value="{{$item->Color}}" name="s_color" readonly  ></h5>
                    <div class="d-flex justify-content-center" >
                      <h4>&#8377;<input type="number" value="{{$item->Price}}" name="s_price" readonly style="width:110px;margin-right:100px;" > </h4>
                      <p>size:
                      <select name="s_size"  id="size-{{$item->User_id}}">
                      <option value=""></option>
                        <option value="6">6</option>
                         <option value="7">7</option>
                          <option value="8">8</option>
                           <option value="9">9</option>
                      </select></p>
                      <h6>Qty:<input type="number" value="0" id="qty-{{$item->User_id}}" name="s_qty" style="width:30px;margin-button:20px;" min="0"></h6>
                    </div>
                    
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                <button class="bt"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                </form>
                <form action="{{url('/buynowaction')}}" method="post" id="buy-now-form-{{$item->User_id}}">
                @csrf
               
                <input type="hidden" name="s_name" value="{{$item->Name}}">
                <input type="hidden" name="s_color" value="{{$item->Color}}">
                <input type="hidden" name="s_price" value="{{$item->Price}}">
                <input type="hidden" name="s_size" id="hidden-size-{{$item->User_id}}">
                <input type="hidden" name="s_qty" id="hidden-qty-{{$item->User_id}}">
                <button type="submit" class="btn1 btn-sm btn-primary mx-auto" onclick="updateBuyNowForm({{$item->User_id}})">Buy Now</button>
               </form>
                </div>
            </div>
        </div>
                    
                    @endforeach
                    
                    @endif
                 @endif
                 


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-6 col-md-12 mb-5 pr-3 pr-xl-5">
            <img src="banner/cover/walk.png" alt="" height="70px" class="img-fluid1" style="border-radius:10px;margin-buttom:30px;">
                
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
        <div class="row border-top border-light mx-xl-5 py-4" >
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark" >
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Walk & Wear</a>. All Rights Reserved. 
					
					<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
					Designed by <a class="text-dark font-weight-semi-bold" href="">Ritam</a>
                </p>
            </div>
           
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <script>
function updateBuyNowForm(itemId) {
    // Get the selected size and quantity
    var size = document.getElementById('size-' + itemId).value;
    var qty = document.getElementById('qty-' + itemId).value;
    
    // Set the values in the hidden input fields of the Buy Now form
    document.getElementById('hidden-size-' + itemId).value = size;
    document.getElementById('hidden-qty-' + itemId).value = qty;
    
    // Submit the form
    document.getElementById('buy-now-form-' + itemId).submit();
}
</script>

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