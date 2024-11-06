<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="bootstrap-5-admin-template/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="bootstrap-5-admin-template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="bootstrap-5-admin-template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap-5-admin-template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="bootstrap-5-admin-template/css/style.css" rel="stylesheet">
    <style>
        
        .btn{
            margin-top: 5px;
        }
        .btn>a{
            color: white;
        }
        .logo1{
            color: red;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
    


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
               
                    <h3 class="text-primary"><img src="banner/cover/walk.png" alt=""></h3>
                
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="banner/cover/avtar.avif" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    @if (isset($DELata))
                    @foreach ($DELata->all() as $all )
                    <div class="ms-3">
                        <h6 class="mb-0">{{$all->Name}}</h6>
                        <span>Delivery Partner</span>
                    </div>
                    @endforeach
                    
                    @endif
                    
                </div>
                <div class="navbar-nav w-100">
                <a href="{{url('/deliverypartnerhome')}}" class="nav-item nav-link"><i class="fa fa-home me-2"></i>Home </a>
                    <a href="{{url('/deliverypartnerorderview')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Order Details</a>
                   
                    
                    <a href="" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Update Profile</a>
                    <!-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> -->
                   
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">
                 
                  
                    <div class="nav-item dropdown">
                    @if (isset($DELata))
                    @foreach ($DELata->all() as $alld )
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="banner/cover/avtar.avif" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{$alld->Name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
            <!-- <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0" style="border:red,1px,solid;"> -->
            <h1 class="logo1" align="center"><i>YOUR ASSIGN ORDER </i></h1>
                  <div class="table-responsive">
                       @if (isset($AssignDel))
                       <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead align="center">
                                <tr class="text-white">
                                    <th scope="col">ORDER ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">PRODUCT QTY</th>
                                    <th scope="col">PRODUCT PRICE</th>
                                    <th scope="col">PAYMENT MODE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>
                                    
                                </tr>
                            </thead>
                            @foreach ($AssignDel->all() as $item)
                            <tbody align="center">
                                <tr>
                                   <td>{{$item->Order_id}}</td>
                                   <td>{{$item->Name}}</td>
                                   <td>{{$item->Email}}</td>
                                   <td>{{$item->Phone}}</td>
                                   <td>{{$item->Address}}</td>
                                   <td>{{$item->P_name}}</td>
                                   <td>{{$item->P_qty}}</td>
                                   <td>{{$item->P_price}}</td>
                                   <td>{{$item->Payment}}</td>
                                   <td>
                                    @if ($item->Auth==0)
                                    <b>Assign</b>
                                    @elseif($item->Auth==2)
                                    <b>Deliverd</b>
                                    @elseif($item->Auth==3)
                                    <b>Order Cancel</b>
                                    @else
                                    <b>Cancel</b>
                                    
                                    @endif
                                   </td>
                                   <td>
                                    @if ($item->Auth==0)
                                    
                                    
                                    <button class="btn btn-sm btn-success"><a href="{{url('/deliverorder')}}{{$item->Order_id}}">Deliver</a></button> <button class="btn btn-sm btn-danger"><a href="{{url('/cancelassorder')}}{{$item->Order_id}}">Cancel</a></button>
                                    @else
                                    <b>{{$item->Status}}</b>
                                    @endif
                                   </td>
                                </tr>
                               
                            </tbody>
                            
                            @endforeach
                        </table>
                        </div>
            <div class="pagination justify-content-center mt-4">
        {{ $SEEORDER->links('pagination::bootstrap-5') }}
    </div>
  

                       @endif
                       <hr><hr>
                  <h1 class="logo1" align="center"><i>YOUR ORDER </i></h1>
                  <div class="table-responsive">
                       @if (isset($SEEORDER))
                       <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead align="center">
                                <tr class="text-white">
                                    <th scope="col">ORDER ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">PRODUCT QTY</th>
                                    <th scope="col">PRODUCT PRICE</th>
                                    <th scope="col">PAYMENT MODE</th>
                                    <th scope="col">STATUS</th>
                                    <!-- <th scope="col">ACTION</th> -->
                                    
                                </tr>
                            </thead>
                            @foreach ($SEEORDER->all() as $item)
                            <tbody align="center">
                                <tr>
                                   <td>{{$item->Order_id}}</td>
                                   <td>{{$item->Name}}</td>
                                   <td>{{$item->Email}}</td>
                                   <td>{{$item->Phone}}</td>
                                   <td>{{$item->Address}}</td>
                                   <td>{{$item->P_name}}</td>
                                   <td>{{$item->P_qty}}</td>
                                   <td>{{$item->P_price}}</td>
                                   <td>{{$item->Payment}}</td>
                                   <td>
                                    @if ($item->Auth==0)
                                    <b>Assign</b>
                                    @elseif($item->Auth==2)
                                    <b>Deliverd</b>
                                    @elseif($item->Auth==3)
                                    <b>Order Cancel</b>
                                    @else
                                    <b>Cancel</b>
                                    
                                    @endif
                                   </td>
                                  
                                </tr>
                               
                            </tbody>
                            
                            @endforeach
                        </table>
                        </div>
            <div class="pagination justify-content-center mt-4">
        {{ $SEEORDER->links('pagination::bootstrap-5') }}
    </div>
  

@endif
</div>    
</div>             
                
    
            <!-- Blank End -->


            <!-- Footer Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">NIKE</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                           /*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            <!-- Designed By Ritam Samanta 
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-5-admin-template/lib/chart/chart.min.js"></script>
    <script src="bootstrap-5-admin-template/lib/easing/easing.min.js"></script>
    <script src="bootstrap-5-admin-template/lib/waypoints/waypoints.min.js"></script>
    <script src="bootstrap-5-admin-template/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="bootstrap-5-admin-template/lib/tempusdominus/js/moment.min.js"></script>
    <script src="bootstrap-5-admin-template/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="bootstrap-5-admin-template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="bootstrap-5-admin-template/js/main.js"></script>
</body>

</html>