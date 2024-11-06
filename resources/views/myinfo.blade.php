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
       




        <!-- Content Start -->
        <div class="content">
          <br>
            <!-- Navbar End -->
             <h1 align="center" style="color:red;">MY INFORMATION</h1>
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-2"style="margin-right:130px;">
                        <h3 class="mb-0" >MY INFORMATION</h3><br>
                    
                    <div class="table-responsive" >
                       @if (isset($Minfo))
                       <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead align="center">
                                <tr class="text-white">
                                    
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">GENDER</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            @foreach ($Minfo->all() as $item)
                            <tbody align="center">
                                <tr>
                                    <td>{{$item->Name}}</td>
                                    <td>{{$item->Email}}</td>
                                    <td>{{$item->Phone}}</td>
                                    <td>{{$item->Gender}}</td>
                                    <td>{{$item->Address}}</td>
                                    <td><img src="{{$item->Image}}" alt="" height="40px" width="40px"></td>
                                    <td><a class="btn btn-sm btn-warning" href="{{url('/userinfoedit')}}">Edit</a> <a class="btn btn-sm btn-success" href="{{url('/changepassword')}}">Change Password</a></td>
                                    
                                </tr>
                               
                            </tbody>
                            
                            @endforeach
                        </table>
                        <center>@if ($item->User_type=='Admin')
                            <a href="{{url('/adminpanel')}}"> < < < </a>
                            @else
                            <a href="{{url('/userhome')}}"> < < <</a>
                        
                        @endif</center>
                       
                       @endif
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
<div class="br" style="margin-top:22%;"></div>


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4"style="margin-right:130px;">
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