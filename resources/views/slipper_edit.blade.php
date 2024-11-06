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

        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                           
                            <h3 style="color:red;">EDIT SLIPPER </h3>
                        </div>
                       @if (isset($SLIPdata))
                       @foreach ($SLIPdata->all() as $all)
                       <form action="{{url('/slippereditaction')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uid" value="{{$all->User_id}}">
                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" id="floatingText" placeholder="model name" name="model_nm" value="{{$all->Name}}">
                            <label for="floatingText">Model Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="price" name="m_price" value="{{$all->Price}}">
                            <label for="floatingInput"> Price</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="m_color" value="{{$all->Color}}">
                            <label for="floatingPassword">Color</label>
                        </div>
                        <div>
                            <label for="photo">Upload Photo:</label>
                            <input type="file" class=""  placeholder="Password" name="m_avatar"><img src="{{$all->Image}}" alt="" height="50"width="50">
                            
                        </div><br>
                      
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Update </button><br>
                       </form>
                       
                       @endforeach
                       
                       @endif
                        <center><a href="{{url('/slippersectioneditview')}}">  < < <  </a></center>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
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