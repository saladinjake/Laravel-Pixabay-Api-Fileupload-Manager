<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('/css/application.css')}}" rel="stylesheet">
        <link href="{{ asset('js/css/alertify.min.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
 <style>
 .product{
   width:300px;
 }
 .ajs-message.ajs-custom { color: #31708f;  background-color: #d9edf7;  border-color: #31708f; }
 </style>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script type="text/javascript" src="{{ asset('js/alertify.min.js')}}"></script>
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
      @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                @endforeach
            </ul>
      </div>
      @endif


      <div class="col-sm-4 col-md-3 cardbox" style="position:absolute;margin-top:-200px;" id="heroView">
          <div class="card">
             <div class="image-wrapper">
                <img src="{{ asset('img/target.png') }}" />
              </div>
              <div class="card-body">
                  <div class="card-content">
                     <h2 class="main">Welcome to our image search app</h2><br/>
                     <p>We are motivated to empower you all across Africa
                        by usage of this platform to upload and share images
                     </p>

                     <div class="inner cover">
                         <div class="row">
                             <div class="col-sm-12">
                                 <div id="url" class="column">

                                     <input id="searchInput" style="float:left;width:400px;height:56px"  type="text" placeholder="Search the pixabay for images by name" value="" />
                                     <a href="javascript:void(0)"  id="searchBox" class="clicker" style="float:right">Search</a>
                                 </div>
                             </div>
                           </div>
                           <div class="clearfix"></div>
                          <!-- <input type="submit" id="upload" value="upload" /> -->
                         </div>
                     </div>
                  </div>
                  <br/><br/>
                  <div class="read-more text-center">
                      <a href="{{url('/image-list/create/new')}}" class="btn btn-primary btn-sm">click here to upload your images</a>
                  </div>
              </div>
          </div>
      </div>



      <section id="about" class="about" >
      <div class="my_wrapper" id="landing">
      <div class="container-fluid" style="position: absolute;margin-top:-240px">
          <div class="row">
              <h2>Search Result:  <span style="display:none" id="showformbox"><p>Click to search again</p></span></h2>


                <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                  <h3 id="status"></h3>
                  <p id="loaded_n_total"></p>
                  <input multiple type="file" name="allUploads[]" id="hidden_uploads" style="display:none"/>


              <!-- <span class="btn rounded" style="display:none; margin-left:10px" >Upload</span> -->
              <div class="row"  id="imageView">

              <!--    <div class="col-sm-4 col-md-4 col-lg-4 product" id="3">


                      <div class="card cardbox">
                         <div class="image-wrapper">
                            <img src="img/network.png" class="img">

                          </div>
                          <div class="card-body">
                              <div class="card-content">


                              </div>
                              <div class="" style="">
                                <div class="selected" >select</div>
                                <div class="deselected">unselect</div>
                              </div>

                          </div>
                      </div>
                  </div> -->
              </div>
                <div id="paginationContainer"></div>
          </div>
      </div>
  </div>

</section>









                  <!-- <div  style="position:absolute;margin-top:-240px;clear:both">
                     <div class="container-fluid">
                        <div class="row" id="imageView">
                            <div class="product" id="1">
                                 <img src="1.png" class="img" />
                                 <div class="selected" onclick="console.log('hello')">select</div>
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


<a id="uploadViaApi" href="#" style="display:none;color:#fff;text-align:center;font-size:15px" class="link-to-portfolio hover-target" >Go</a>
  <!-- Footer -->
<script type="text/javascript" src="{{ asset('js/bundle.js') }}"></script>
  </body>
</html>
