<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('/css/application.css')}}" rel="stylesheet">
 <style>
 .product{
   width:300px;
 }
 </style>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <!-- Styles -->
<!-- <div class="loader" id="loader">Loading...</div> -->


<body class="antialiased">
<div id="gtd">
  <div class=" px-6 py-4 ">
          <a href="{{url('/')}}" class="text-lg text-gray-700"><img style="height:50px;width:50px" src="{{ asset('img/target.png') }}" /></a>
            <a href="{{url('/image-list/create/new')}}" style="float:right" class="text-lg text-gray-700">Add new upload +</a>
  </div>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
      @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                @endforeach
            </ul>
      </div>
      @endif







      <section id="about" class="about" >
      <div class="my_wrapper">
      <div class="container-fluid" style="">
          <div class="row">
              <h2>My uploaded files</h2>
              <div class="row"  id="imageView">
                  <div class="col-sm-4 col-md-4 col-lg-4 product" id="1">
                      <div class="card cardbox " >
                         <div class="image-wrapper">
                            <img src="img/target.png" class="img">
                          </div>
                          <div class="card-body">
                              <div class="card-content">
                                <!-- <h3 class="main"</h3>
                                <p></p> -->

                              </div>
                              <div class="">

                                  <div class="delete"><img src="{{ asset('img/delete.png') }}" /></div>


                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-4 product" id="2">
                      <div class="card cardbox">
                         <div class="image-wrapper">
                            <img src="img/team128.png" class="img">
                          </div>
                          <div class="card-body">
                              <div class="card-content">
                                 <!-- <h3 class="main"</h3>
                                 <p></p> -->

                              </div>
                              <div class="">
                                    <div class="delete"><img src="{{ asset('img/delete.png') }}" /></div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-4 product" id="3">
                      <div class="card cardbox">
                         <div class="image-wrapper">
                            <img src="img/network.png" class="img">
                          </div>
                          <div class="card-body">
                              <div class="card-content">
                                <!-- <h3 class="main"</h3>
                                <p></p> -->
                              </div>
                              <div class="">
                                  <div class="delete"><img  src="{{ asset('img/delete.png') }}" /></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div id="paginationContainer"></div>
</section>









                  <!-- <div id="result" style="position:absolute;margin-top:-240px;">
                     <div class="container-fluid">
                        <div class="row" id="imageView">
                            <div class="product" id="1">
                                 <img src="1.png" class="img" />
                                 <div class="selected">select</div>
                                 <div class="deselected">unselect</div>
                            </div>
                        </div>
                        <div id="paginationContainer"></div>
                     </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
  </div>



  <!-- Footer -->

<script type="text/javascript" src="{{ asset('js/bundle.js') }}"></script>
  </body>
</html>
