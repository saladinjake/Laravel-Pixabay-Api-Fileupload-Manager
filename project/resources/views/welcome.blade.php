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
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
    </style>
    <style>
    a.clicker,a.clicker:focus,a.clicker:hover {color: #000;padding:20px;background-color: #ccc;font-size:10px;border-radius: 50px}
.btn-default,.btn-default:hover,.btn-default:focus {color: #333;text-shadow: none; background-color: #fff;border: 1px solid #fff;}
.column input[type="text"], .column select{width:100%; padding: 8px 12px;color: #000;border-radius: 5px;border: 0;
height: 41px;}

.mt-20{margin-top:20px;}
.site-wrapper {width: 100%;float: left;padding: 170px 0 40px;}
.cover-container {margin-right: auto;margin-left: auto;}
.form-control{height:41px;}
.header {position: fixed;top: 0;left: 0;width: 100%; z-index: 10;}
.header .inner{padding-bottom: 0; text-align: left;}
.inner {padding:0 30px 30px;}
.masthead-brand {margin-top: 10px;margin-bottom: 10px;}.masthead-nav > li {display: inline-block;}
.imageSec {float: left;width: 100%;position: relative;height: 176px;overflow: hidden;margin: 0 0 27px;}
.imageSec img {height: 100%;width: 100%;}
.lb-loader,.lightbox{text-align:center;line-height:0}.lb-dataContainer:after,.lb-outerContainer:after{content:"";clear:both}


.content {
	position: relative;
	min-height: 300px;
	margin: 0 0 0 300px;
}

.content--loading {
	background: url(./loading.svg) no-repeat 50% 50%;
}

.products {
	margin: 0;
	padding: 2em;
	text-align: center;
}

.product {
	display: inline-block;
	width: 200px;
	height: 200px;
	margin: 10px;
	border-radius: 5px;
	background: #1c1d22;
}


.avatar-edit {
       position: absolute;
       right: 12px;
       z-index: 1;
       top: 10px;

}
  .avatar-edit     input {
           display: none;
  }
  .delete {
               display: inline-block;
               width: 34px;
               height: 34px;
               margin-bottom: 0;
               border-radius: 100%;
               background: #FFFFFF;
               border: 1px solid transparent;
               box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
               cursor: pointer;
               font-weight: normal;
               transition: all .2s ease-in-out;
}

.selected, .deselected {
             display: inline-block;
             width: 84px;
             height: 24px;
             margin-bottom: 40px;
             border-radius: 50px;
             text-align:center;
             color:#000;

             margin-top:230px;
             margin-right:7px;

             background: red;
             border: 1px solid transparent;
             box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
             cursor: pointer;
             font-weight: normal;
             transition: all .2s ease-in-out;
}
.deselected{

   background: #ccc;
   opacity:0;



}

#gtd{
  display:none;
}

.loader {
  border: 5px solid #f3f3f3; /* Light grey */
  border-top: 8px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
  margin:0px auto;
  margin-top:30%;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}



</style>
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
