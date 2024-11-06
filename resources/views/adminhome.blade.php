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
        .cig{
            margin-left: 35px;
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
        .img-fluid1{
           height: 80px;
           border-radius: 10px;
           margin-bottom: 10px;
        }
        .card {
    height: 400px; /* Set the height of the card */
    width: 100%; /* Set the width of the card to 100% of its parent */
}


.img-fluid2{
    height: 200px;
    width:200px;
    margin-left: 100px;
}
input{
        border: none;
     } 
     .btn1{
            border-radius: 5px;
        }
        .btn1>hover{
           color: black;
        }
        .bt{
            border:none;
            border-radius: 5px;

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
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
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
                        <a href="{{url('/adminpanel')}}" class="nav-item nav-link active">Adminpanel</a>
                            <a href="{{url('/adminhome')}}" class="nav-item nav-link active">Home</a>
                            <a href="{{url('/shopview')}}" class="nav-item nav-link">Shop</a>
                            
                            <a href="{{url('/admincontact')}}" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <button class="btn btn-primary py-2 px-4"><a href="{{'/logout'}}">Log-Out</a></button>
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="banner/cover/n1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Men Section</h3>
                                    <a href="{{url('/mensection')}}" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="banner/cover/women.jpg" alt="Image" height="500px">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Women Section</h3>
                                    <a href="{{url('/womensectionview')}}" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="banner/cover/limited.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Limited Edition</h3>
                                    <a href="{{url('/limitedviewpage')}}" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="banner/cover/tshir_t.jpg" alt="Image" height="500px">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">T-Shirt Section</h3>
                                    <a href="{{url('/tshirtviewpage')}}" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="banner/cover/jacket.jpg" alt="Image" height="500px">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Jacket Section</h3>
                                    <a href="{{url('/jacketviewpage')}}" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="{{url('/mensection')}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="banner/snek/sn1.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Men's Section</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="{{url('/womensectionview')}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="banner/women/NIKEAIRMAX90LV8.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Women Section</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="{{url('/slipperviewpage')}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="banner/sandel/JORDANROAM.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Slipper Section</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="{{url('/limitedviewpage')}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="banner/limited/jordon1.webp" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Limited Edition </h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-1" >
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="{{url('/tshirtviewpage')}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="banner/tshirt/85SSCREW.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">T-Shirt Section </h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-1" >
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="{{url('/jacketviewpage')}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="banner/jacket/UVJKT.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Jacket </h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-1" >
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    
                    <a href="{{url('/basketballviewpage')}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="banner/basket/3PF.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Basketball Section </h5>
                </div>
              </div>
            
        </div>
    </div>
    <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">NEW ARRIVAL</span></h2>
        </div>
    @if (isset($NewArr))
    <div class="row">

                    @foreach ($NewArr->all() as $item )
                    
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1 text-center" style="padding:60px;">
            <div class="card product-item border-0 mb-4">
            
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <form action="{{url('/addcart')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <img class="img-fluid2 mx-auto d-block" src="{{$item->Image}}" alt="" height="100px" width="100px">
                    <input type="hidden" name="s_avatar" value="{{$item->Image}}">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3" >
                    <h4 class="text-truncate mb-3"><input type="text" name="s_name" value="{{$item->Name}}" readonly style="text-align: center;" ></h4>
                    <p>{{$item->Catagory}}</p>
                    <h5 style="margin-right:60px;">Color: <input type="text" value="{{$item->Color}}" name="s_color" readonly  ></h5>
                    <div class="d-flex justify-content-center" >
                      <h4>&#8377;<input type="number" value="{{$item->Price}}" name="s_price" readonly style="width:110px;margin-right:100px;" > </h4>
                      <p>size:
                      <select name="s_size" id="size-{{$item->User_id}}">
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
                    </div>
                    @endif
                 
                 <br><br>
    <!-- Categories End -->
    <div class="row px-xl-5 pb-3">
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="banner/cover/cover1.jpg" alt="">
                    </div>
                   
                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="banner/cover/cover2.jpg" alt="">
                    </div>
                   
                   
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="banner/cover/jk.jfif" alt="">
                    </div>
                   
                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="banner/cover/tee.jfif" alt="">
                    </div>
                    
                    
                </div>
            </div>
            </div>

    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-4 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    
                    <div class="position-relative" style="z-index: 1;">
                        
                        <h1 class="mb-4 font-weight-semi-bold">Sneakers</h1>
                        <a href="{{url('/sneakerviewpage')}}" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pb-4">
                
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                   
                    <div class="position-relative" style="z-index: 1;">
                         
                       
                        <h1 class="mb-4 font-weight-semi-bold">Limited Edition</h1>
                        <a href="{{url('/limitedviewpage')}}" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                   
                  
                    <div class="position-relative" style="z-index: 1;">
                        
                        <h1 class="mb-4 font-weight-semi-bold">Sport Edition</h1>
                        <a href="{{url('/sportshoeviewpage')}}" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                    </div>
                  
                    
                </div>
            </div>
        </div>
    </>
    <!-- Offer End -->


    



   

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="banner/limited/dunk-low-piegon.webp" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="banner/limited/Jordan_1_Retro_High_Off-White_University_Blue.webp" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="banner/snek/JORDANONETAKE5PF.png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="banner/snek/NIKEAIRDUNKLOWJUMBO.png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="banner/women/WAIRFORCE107.png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="banner/women/WMNSNIKEAIRMAXSC (2).png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="banner/sandel/NIKECALM.png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="banner/sandel/NIKEOFFCOURT.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


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
                           <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Adminpanel</a>
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