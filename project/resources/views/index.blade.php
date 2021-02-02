<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">

      <div class=" px-6 py-4 ">
              <a href="#" class="text-lg text-gray-700">File Uploader</a>
                <a href="{{url('/')}}" style="float:right" class="text-lg text-gray-700">Back</a>
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

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                     <h1> File Uploader Project</h1>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                  <div class="ml-4 text-lg leading-7 font-semibold">

                                  <form method="post" enctype="multipart/form-data"  action="/image-list/upload/via/device" >
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                        <label for="Product Name">Upload Pictures from device</label>

                                        </div>
                                        <label for="Product Name">Product photos (can attach more than one):</label>
                                        <br />
                                        <input type="file" class="form-control" name="photos[]" multiple style="border:3px solid #fafafa;padding:20px" />
                                        <br /><br />
                                        <input type="submit" class="btn btn-primary" value="Upload" style="background-color:green;padding:10px;border-radius:25px" />
                                  </form>

                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    You can select more than one files form your device to our local server.
                                </div>
                            </div>
                        </div>




                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">


                            <a href="#" class="ml-1">
                                &copy
                            </a>



                            <a href="#" class="ml-1">
                                Saladin
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        fileuploader project
                    </div>
                </div>
            </div>
        </div>
      
    </body>
</html>
