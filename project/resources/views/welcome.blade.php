<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" ></script><![endif]-->
        <title>Pixabay Image/Photo Search</title>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <style>
    a,a:focus,a:hover {color: #fff;}
.btn-default,.btn-default:hover,.btn-default:focus {color: #333;text-shadow: none; background-color: #fff;border: 1px solid #fff;}
.column input[type="text"], .column select{width:100%; padding: 8px 12px;color: #000;border-radius: 5px;border: 0;
height: 41px;}
html,body {height: 100%;background-color: #333;color: #fff;text-align: center;text-shadow: 0 1px 3px rgba(0, 0, 0, .5);}
#url {margin: 0 0 30px;}
.mt-20{margin-top:20px;}
.site-wrapper {width: 100%;float: left;padding: 170px 0 40px;}
.cover-container {margin-right: auto;margin-left: auto;}
.form-control{height:41px;}
.header {position: fixed;top: 0;left: 0;width: 100%;background: #609065; z-index: 10;}
.header .inner{padding-bottom: 0; text-align: left;}
.inner {padding:0 30px 30px;}
.masthead-brand {margin-top: 10px;margin-bottom: 10px;}.masthead-nav > li {display: inline-block;}
.imageSec {float: left;width: 100%;position: relative;height: 176px;overflow: hidden;margin: 0 0 27px;}
.imageSec img {height: 100%;width: 100%;}
.lb-loader,.lightbox{text-align:center;line-height:0}.lb-dataContainer:after,.lb-outerContainer:after{content:"";clear:both}body.lb-disable-scrolling{overflow:hidden}.lightboxOverlay{position:absolute;top:0;left:0;z-index:9999;background-color:#000;filter:alpha(Opacity=80);opacity:.8;display:none}.lightbox{position:absolute;left:0;width:100%;z-index:10000;font-weight:400}.lightbox .lb-image{display:block;height:auto;max-width:inherit;max-height:none;border-radius:3px;border:4px solid #fff}.lightbox a img{border:none}.lb-outerContainer{position:relative;width:250px;height:250px;margin:0 auto;border-radius:4px;background-color:#fff}.lb-loader,.lb-nav{position:absolute;left:0}.lb-outerContainer:after{display:table}.lb-loader{top:43%;height:25%;width:100%}.lb-cancel{display:block;width:32px;height:32px;margin:0 auto;background:url('https://lokeshdhakar.com/projects/lightbox2/images/loading.gif') no-repeat}.lb-nav{top:0;height:100%;width:100%;z-index:10}.lb-container>.nav{left:0}.lb-nav a{outline:0;background-image:url(data:image/gif;base64,R0lGODlhAQABAPAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==)}.lb-next,.lb-prev{height:100%;cursor:pointer;display:block}.lb-nav a.lb-prev{width:34%;left:0;float:left;background:url('https://lokeshdhakar.com/projects/lightbox2/images/prev.png') left 48% no-repeat;filter:alpha(Opacity=0);opacity:0;-webkit-transition:opacity .6s;-moz-transition:opacity .6s;-o-transition:opacity .6s;transition:opacity .6s}.lb-nav a.lb-prev:hover{filter:alpha(Opacity=100);opacity:1}.lb-nav a.lb-next{width:64%;right:0;float:right;background:url('https://lokeshdhakar.com/projects/lightbox2/images/next.png') right 48% no-repeat;filter:alpha(Opacity=0);opacity:0;-webkit-transition:opacity .6s;-moz-transition:opacity .6s;-o-transition:opacity .6s;transition:opacity .6s}.lb-nav a.lb-next:hover{filter:alpha(Opacity=100);opacity:1}.lb-dataContainer{margin:0 auto;padding-top:5px;width:100%;border-bottom-left-radius:4px;border-bottom-right-radius:4px}.lb-dataContainer:after{display:table}.lb-data{padding:0 4px;color:#ccc}.lb-data .lb-details{width:85%;float:left;text-align:left;line-height:1.1em}.lb-data .lb-caption{font-size:13px;font-weight:700;line-height:1em}.lb-data .lb-caption a{color:#4ae}.lb-data .lb-number{display:block;clear:left;padding-bottom:1em;font-size:12px;color:#999}.lb-data .lb-close{display:block;float:right;width:30px;height:30px;background:url('https://lokeshdhakar.com/projects/lightbox2/images/close.png') top right no-repeat;text-align:right;outline:0;filter:alpha(Opacity=70);opacity:.7;-webkit-transition:opacity .2s;-moz-transition:opacity .2s;-o-transition:opacity .2s;transition:opacity .2s}.lb-data .lb-close:hover{cursor:pointer;filter:alpha(Opacity=100);opacity:1}</style>
    <body>
           <div class="site-wrapper">
                <div class="site-wrapper-inner">
                  <div class="cover-container">
                    <div class="header clearfix">
                      <div class="inner">
                        <h3 class="masthead-brand">Pixabay</h3>
                      </div>
                    </div>

  <center>
    <h3><a href="https://javascript-html-5.blogspot.com" target="_blank">Visit Our Blog</a></h3>
  </center>
                    <div class="inner cover">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="url" class="column">
                                    <input id="webUrl" type="text" placeholder="Search By Name" value="rose" />
                                </div>
                            </div>

                          </div>
                          <div class="clearfix"></div>
                            <div class="col-md-12">
                              <a href="javascript:void(0);" id="Search" class="btn btn-lg btn-success">Search</a>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div id="result">
                     <div class="container-fluid">
                        <div class="row" id="imageView"></div>
                     </div>
                  </div>
                </div>
              </div>
<script>
function SearchImg(){
       var cur_url = document.getElementById('webUrl').value;
       $.getJSON("https://pixabay.com/api/?key=12763398-42249d3dd1db2f56d3171f8c0&q="+cur_url+"&image_type=photo", function(data){
         createHTML(data);
       });
   }

   function createHTML(data){
     //console.log(data);
     var htmlElements = "";
       for(var i = 0; i< data.hits.length; i++){
         htmlElements += '<div class="col-xs-3"><div class="imageSec"><a href="'+ data.hits[i].webformatURL +'" data-lightbox="example-set"><img class="img-responsive" src='+ data.hits[i].previewURL +' /></a></div></div>';
       }
     var imageView = document.getElementById("imageView");
     imageView.innerHTML = htmlElements;
   }
  document.getElementById('Search').addEventListener('click', SearchImg);
</script>
  </body>
</html>
