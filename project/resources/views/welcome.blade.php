<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <!-- Styles -->
<div class="loader" id="loader">Loading...</div>
<body class="antialiased">
<div id="gtd">
  <div class=" px-6 py-4 ">
          <a href="#" class="text-lg text-gray-700">File Uploader</a>
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

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" style="position:absolute;margin-top:-230px">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                  <h1> Welcome to our image search app</h1>
            </div>

  <center>
    <h3><a class="clicker" href="{{ url('/image-list/create/new') }}" >Get Started</a></h3>
    <br/>
  </center>
                    <div class="inner cover">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="url" class="column">

                                    <input style="float:left;width:380px;height:56px" id="webUrl" type="text" placeholder="Search the pixabay for images by name" value="" />
                                    <a href="javascript:void(0);" id="Search" class="clicker" style="float:right">Search</a>
                                </div>
                            </div>
                          </div>
                          <!-- <div class="clearfix"></div> -->
                         <input type="submit" id="upload" value="upload" />
                        </div>
                    </div>
                  </div>

                  <div id="result" style="position:absolute;margin-top:-240px;">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
<script type="text/javascript" src="{{ asset('js/bundle.js') }}"></script>
  </body>
</html>
