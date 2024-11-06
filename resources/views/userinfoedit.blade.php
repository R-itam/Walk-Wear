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
                           
                            <h3 style="color:red;">Update Profile</h3>
                        </div>
                       @if (isset($Edinfo))
                       @foreach ($Edinfo->all() as $all )
                       <form action="{{url('/usereditaction')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="userinfo_ed" value="{{$all->User_id}}">
                       <div class="form-group">
                        <label for="Name">Name:</label>
                            <input type="text" class="form-control" id="floatingText"  name="name" value="{{$all->Name}}">
                        </div>
                        <div class="form-group">
                        <label for="Email">Email:</label>
                            <input type="email" class="form-control" id="floatingText"  name="email"  value="{{$all->Email}}">
                        </div>
                        <div class="form-group">
                        <label for="Phone">Phone:</label>
                            <input type="number" class="form-control" id="floatingText"  name="phone"  value="{{$all->Phone}}">
                        </div>
                        <div class="form-group">
                        <label for="Name">Gender:</label>
                            <input type="radio"   name="gender" value="Male" {{ $all->Gender == 'Male' ? 'checked' : '' }}>Male
                            <input type="radio"   name="gender" value="Female" {{ $all->Gender == 'Female' ? 'checked' : '' }} >Female
                        </div>
                        <div class="form-group">
                        <label for="Address">Address:</label>
                           <textarea name="address" id="" class="form-control" rows="5"> {{$all->Address}}</textarea>
                        </div>
                        <div class="form-group">
                        <label for="Image">Upload-Photo:</label>
                            <input type="file"   name="avatar"><img src="{{$all->Image}}" alt="" height="40" width="40">
                        </div><br>
                      
                        <button type="submit" class="btn btn-success py-3 w-100 mb-4">Update </button><br>
                       </form>
                       
                       @endforeach
                       
                       @endif
                        <center><a href="{{url('/myinfo')}}">  < < <  </a></center>
                       
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