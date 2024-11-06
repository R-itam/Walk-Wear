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
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
       


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                
                    <!-- <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Nike</h3> -->
                    <img src="banner/cover/walk.png" alt="" height="70px"style="margin-left:10px;">
             
                
                <div class="d-flex align-items-center ms-4 mb-4">
                    @if (isset($Info))
                    @foreach ($Info->all() as $all )
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{$all->Image}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{$all->Name}}</h6>
                        <span>Admin</span>
                    </div>
                    
                    @endforeach
                    
                    @endif
                </div>
                <div class="navbar-nav w-100">
                <a href="{{url('/adminhome')}}" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Home</a>
                    <a href="{{url('/adminpanel')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{url('/newarrivalsection')}}" class="nav-item nav-link"><i class="fa fa-box  me-2"></i>New Arrival</a>
                    <a href="{{url('/tshirtsection')}}" class="nav-item nav-link"><i class="fa fa-box  me-2"></i>T-Shirt</a>
                    <a href="{{url('/snekarsection')}}" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Sneakers</a>
                    <a href="{{url('/sportsection')}}" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Sports Shoe</a>
                    <a href="{{url('/limitedsection')}}" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Limited Edition</a>
                    <a href="{{url('/womensection')}}" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Women</a>
                    <a href="{{url('/slippersection')}}" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Slipper</a>
                    <a href="{{url('/jacketsection')}}" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Jacket</a>
                    <a href="{{url('/allorderview')}}" class="nav-item nav-link"><i class="fa fa-bookmark me-2"></i>All Order</a>
                    <a href="{{url('/userinfo')}}" class="nav-item nav-link"><i class="fa fa-user me-2"></i>All User</a>
                    <a href="{{url('/feedbackpage')}}" class="nav-item nav-link"><i class="fa fa-user me-2"></i>All Feedback</a>
                    <a href="{{url('/deliverysection')}}" class="nav-item nav-link"><i class="fa fa-user me-2"></i>All Delivery Partner</a>
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
                   
                   
                    @if (isset($Info))
                    @foreach ($Info->all() as $all )
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{$all->Image}}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{$all->Name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="{{url('/logout')}}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                    
                    @endforeach
                    
                    @endif
                </div>
            </nav><br>
            <!-- Navbar End -->
             <h1 align="center" style="color:red;">ALL SLIPPER  </h1>
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                       
                    </div>
                    <div class="table-responsive">
                       @if (isset($SLdAtA))
                       <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead align="center">
                                <tr class="text-white">
                                    
                                    <th scope="col">NAME</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">COLOR</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach ($SLdAtA->all() as $item)
                            <tbody align="center">
                                <tr>
                                    <td>{{$item->Name}}</td>
                                    <td>{{$item->Price}}</td>
                                    <td>{{$item->Color}}</td>
                                    <td><img src="{{$item->Image}}" alt="" height="40px" width="40px"></td>
                                    <td><a class="btn btn-sm btn-success" href="{{url('/slipper_edit')}}{{$item->User_id}}">Edit</a> <a class="btn btn-sm btn-primary" href="{{url('/slipper_del')}}{{$item->User_id}}">Delete</a></td>
                                </tr>
                               
                            </tbody>
                            
                            @endforeach
                        </table>
                       
                       @endif
                       
                    </div>
                    <a href="{{url('/slippersection')}}"> < < < </a>
                </div>
            </div>
            <!-- Recent Sales End -->
<div class="br" style="margin-top:22%;"></div>


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Walk & Wear</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="#">Ritam</a>
                        </div>
                    </div>
                </div>
            </div>
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