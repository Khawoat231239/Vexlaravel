<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <title>VEX | MyOrder</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <!-- Fonts -->
        <!-- Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400i|Source+Sans+Pro:300,400,600,700" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
        
        <!-- CSS -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
        

        <link rel="stylesheet" href="css/themefisher-fonts.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href="css/responsive.css">
        <script type="text/script.js"></script>
    </head>
<body>

      <div id="preloader-wrapper">
        <div class="pre-loader"></div>
      </div>

      <!-- 
      Header start
      ==================== -->
        <div class="container">
            <nav class="navbar navigation " id="top-nav">
                <a class="navbar-brand logo" href="{{ route('index.index')}}">
                    <h1>Vex</h1>
                </a>

              <button class="navbar-toggler hidden-lg-up float-lg-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
                  <i class="tf-ion-android-menu"></i>
              </button>
              <div class="collapse navbar-toggleable-md" id="navbarResponsive">
                <ul class="nav navbar-nav menu float-lg-right" id="top-nav">
                  <li class=" active">
                    <a href="{{ route('index.index')}}">HOME</a>
                  </li>
                  <li class="">
                    <a href="{{ route('collection.collection')}}">COLLECTION</a>
                  </li>
                  <li class="">
                    <a href="{{ route('support.support')}}">SUPPORT</a>
                  </li>
                  <li class="">
                    <a href="{{ route('contact.contact')}}">CONTACT</a>
                  </li>
                  <li>
                      
                    <div class="login" align="right">
            @if (Auth::guest())
            <a href="{{ url('login')}}">
                <button style="background-color: #4def4d;border-color: white;border-style: solid;border-radius: 5px"><span class="fa fa-fw fa-sign-in"></span>Sign In</button>
            </a>
            @else
            
            @if(Auth::user()->status == 1)
                <a href="/admin/dashboard" style="color: black">
                        <button style="background-color: #89bbf7;border-color: blue;border-style: solid;border-radius: 5px"><span class="fa fa-fw fa-user-secret"></span>Admin System</button>
                </a>
                <a style="color: black" type = "button" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                           <button style="background-color: #fd8d31;border-color: #fd8d31;border-style: solid;border-radius: 5px"><span class="fa fa-fw fa-sign-out"></span>Logout</button>
                                                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                @else
                <button style="color: white;background-color: #c71345;border-color: #c71345;border-style: solid;border-radius: 5px" disabled>Welcome {{ Auth::user()->firstName }}</button>
                       <!--  <a href="#">
                        <button style="background-color: white;border-color: white;border-radius: 5px;border-style: solid;"><span class="fa fa-fw fa-key"></span>Change Password</button></a> -->
                    <a href="/orderStatus">
                        <button style="background-color: white;border-color: white;border-radius: 5px;border-style: solid;"><span class="fa fa-fw fa-key"></span>My Order<span class="badge" style="background-color: red"></span></button></a>
                        
                    <a type = "button" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                <button style="background-color: white;border-color: white;border-radius: 5px;border-style: solid;"><span class="fa fa-fw fa-sign-out"></span>Logout</button>
                                                </a>
                                                
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                @endif
            @endif

        </div>

                  </li>     
                </ul>
              </div>
            </nav>
        </div>

        <div class="contact-body">
          <div>
            <p>ORDER STATUS</p>
          </div>
        </div>

        <style>
                                table {
                                    border-collapse: collapse;
                                    width: 100%;
                                    
                                    
                                }

                                th, td {
                                    text-align: center;
                                    padding: 8px;
                                     border: 1px solid black;
                                   /* border-radius: 30px*/
                                }

                                tr:nth-child(even){background-color: #f2f2f2}

                                th {
                                    background-color: #808c81;
                                    color: white;
                                }
                            </style>
                            <br><br>
                            <table>   
                                       
                                   <thead>
                                      <tr role="row">
                                       <th width="6%">Order</th>
                                       <th width="6%">Date</th>
                                        <th width="6%">Name</th>
                                        <th width="6%">Product</th>
                                        <th width="6%">Status</th>          
                                      </tr>
                                    </thead>
                                @foreach($orders as $order)       
                                  
                                <tbody>

                                    <tr role="row">

                                      <td><div align="center">#{{$order->orderCode}}</div></td>
                                      <td><div align="center">{{$order->date}}</div></td>
                                     <td><div align="center">{{$order->firstName}} </div></td>
                                     <td><div align="center">{{$order->productName}} </div></td>
                                      @if($order->status==0)
                          <td ><div align="center"><b style="color: #daaa00">Waiting</b></div></td> 
          
                        @endif
              @if($order->status==1)
                          <td><div align="center"><b style="color: #daaa00>Waiting for payment</b></div></td> 
         
                        @endif
                 @if($order->status==2)
                          <td><div align="center"><b style="color: #174aff>Progress</b></div></td> 
          
                        @endif
                    @if($order->status==3)
                          <td><div align="center"><b style="color: #00b50d>Completed</b></div></td> 
          
                        @endif   

                                
                                        
                                    </tr> 
                                    
                                </tbody>
                                @endforeach
                            </table>

            <footer>
            <div class="container text-center">


        <!-- Js -->
        <script src="js/vendor/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/main.js"></script>

</body>
</html>