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
              <script type="text/javascript" src="{{ asset('js/alertify.min.js')}}"></script>
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

      <section id="about" class="about" >
      <div class="my_wrapper" id="pageupload">
      <div class="container-fluid" style="">
          <div class="row">
              <h2>My uploaded files</h2>
              <div class="row"  id="imageView">

                @foreach($images as $image)
                  @if(strlen($image) >0)
                      <div class="col-sm-4 col-md-4 col-lg-4 product" id="{{time().$image}}">
                          <div class="card cardbox " >
                             <div class="image-wrapper">
                                <img src="{{ url('/uploads/'. $image)}}" class="img">
                              </div>
                              <div class="card-body">
                                  <div class="card-content">
                                    <!-- <h3 class="main"</h3>
                                    <p></p> -->

                                  </div>
                                  <div class="">

                                    <form class="col-xs-2" method="POST" action="{{ url('image-list/'. $image .'/delete' ) }}">

                                        {!! csrf_field() !!}

                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_file" value="{{$image}}">

                                        <button type="submit" class="fa fa-times pull-left" id="deleteFileButton">
                                           <div class="delete"><img src="{{ asset('img/delete.png') }}" /></div>
                                        </button>


                                    </form>




                                  </div>
                              </div>
                          </div>
                      </div>
                  @endif



                @endforeach

                @if(count($errors) > 0)
                <div class="col-sm-4 col-md-4 col-lg-4 product" id="{{time()}}">
                    <div class="card cardbox " >

                        <div class="card-body">
                            <div class="card-content">
                              <h3 class="main">No images uploaded yet!!</h3>
                              <p>Upload one by clicking the create button at the top right of the page.</p>

                            </div>

                        </div>
                    </div>
                </div>
                @endif


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
<script type="text/javascript">
function run(){
  console.log("hello")
}
 document.addEventListener('DOMContentLoaded',()=>{

 })
</script>
  </body>
</html>
