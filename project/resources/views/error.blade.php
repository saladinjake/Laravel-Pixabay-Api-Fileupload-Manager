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
<div class="loader" id="loader">Loading...</div>


<body class="antialiased">
<div id="gtd">
  <div class=" px-6 py-4 ">
          <a href="{{url('/')}}" class="text-lg text-gray-700"><img style="height:50px;width:50px" src="{{ asset('img/target.png') }}" /></a>
            <a href="{{url('/image-list/create/new')}}" style="float:right" class="text-lg text-gray-700">Add new upload +</a>
  </div>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">



      <div class="col-sm-4 col-md-3" style="position:absolute;margin-top:-200px;">
          <div class="">
             <div class="">

                     <br/>
                     <h2 class="main">{{ "Some error occured"}}</h2><br/>
                     <p>Please wait ...
                     </p><br/><br/>
              </div>
                  <br/><br/>
                  <!-- <div class="read-more text-center">
                      <a href="{{url('/image-list/create/new')}}" class="btn btn-primary btn-sm">click here to upload your images</a>
                  </div> -->
              </div>
          </div>
      </div>












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
<script type="text/javascript">
  setTimeout(()=>{
       window.location.href="http://localhost:8000/image-list/lists"
  },6000)
</script>
  </body>
</html>
