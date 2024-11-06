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
        .btn>a{
            color:black;
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
           
        </div>
    </div>
    <!-- Topbar End -->


   
   


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Registration Form</h1>
            <div class="d-inline-flex">
                <p class="m-0">Register-Here</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Register-Here</span></h2>
        </div>
        <div class="row px-xl-5">
            @if (session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
            
            @endif
            <div class="col-lg-12 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form method="post" action="{{url('/registeraction')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" placeholder="enter name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" placeholder="enter email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="number" placeholder="enter phone number" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <input type="radio" name="gender" value="Male" >Male
                            <input type="radio" name="gender" value="Female" >Female
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" id="" placeholder="enter phone number" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Upload-Photo:</label>
                            <input type="file" name="avatar"> 
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" placeholder="enter password" name="password" class="form-control">
                        </div>
                        
                           <center> <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
                           Sign-Up</button></center><br><br>
                          
                           

                       
                    </form>
                </div>
            </div>
           
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
   


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