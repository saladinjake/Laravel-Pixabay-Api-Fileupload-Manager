/*
* @message  {String or DOMElement} The notification message contents.
* @type     {String }              The Type of notification message (CSS class name 'ajs-{type}' to be added).
* @wait     {Number}               The time (in seconds) to wait before the notification is auto-dismissed.
* @callback {Function}             A callback function to be invoked when the notification is dismissed.
*
* @return {Object} .
*
* app.app(param1)
*
*/

//mixins
function GetFilename(url)
{
   if (url)
   {
      var m = url.substring(url.lastIndexOf("/") + 1, url.lastIndexOf("."));
      return m;
   }
   return "";
}

// ***Here is the code for converting "image source" (url) to "Base64".***

const toDataURL =  async (url) =>  fetch(url)
  .then(response => response.blob())
  .then(blob => new Promise((resolve, reject) => {
      const reader = new FileReader()
      reader.onloadend = () => resolve(reader.result)
      reader.onerror = reject
      reader.readAsDataURL(blob)
}))


// ***Here is code for converting "Base64" to javascript "File Object".***
async function  dataURLtoFile(dataurl, filename) {
     var arr = dataurl.split(',');
     var mime = arr[0].match(/:(.*?);/)[1];
     var bstr = atob(arr[1]);
     var n = bstr.length;
     var  u8arr = new Uint8Array(n);
     while(n--){
       u8arr[n] = bstr.charCodeAt(n);
     }
     return new File([u8arr], filename, {type:mime});
  }



const initializeLoader = () =>{
  //show loader or spinner
  const mainFrame = document.getElementById("gtd");
  const loader = document.getElementById("loader");
  loader.style.display="block";
  loader.style.opacity = 1;
}
const clearLoader = () =>{
  const mainFrame = document.getElementById("gtd");
  const loader = document.getElementById("loader");
  loader.style.opacity=0;
  loader.style.display ="none";
  mainFrame.style.display ="block";
}




const API_KEY ='9592284-ac011e65dcf94b111588bba1b';
class SearchPixaApi{
  constructor(){
    this.displayBox = document.querySelector('#imageView');
    this.paginationContainer = document.querySelector('#paginationContainer');
    this.searchBox = document.querySelector("#searchBox");
    this.endPage = 10;
    this.pageNumber = null;
    this.searchTerm = null;
    this.imageType = 'photo';
    this.getUrl =`https://pixabay.com/api/?key=${API_KEY}`;
    this.hero=   document.querySelector('#heroView');

  }

  static attachEvents(val =1){
    const SearchPixaApiClass = new SearchPixaApi()
    SearchPixaApiClass.onHandleSearchRequest();
  }

  onShowFormBox(){
    let that = this;
    document.getElementById("showformbox").addEventListener("click",function(){
      this.style.display="none";
      that.hero.style.display ="block";
       document.getElementById("landing").style.marginTop="-10px";
       that.displayBox.innerHTML ='';


    })
  }

  onHandleSearchRequest(){
    let that = this;
    if(this.searchBox){
      this.searchBox.addEventListener('click', function(evt){
         evt.preventDefault();
         that.searchTerm = document.querySelector("#searchInput").value;
         that.pageNumber = 10;
         that.onHandleSearchRequest();
         that.onHandleImageDisplay(10, that.searchTerm);
         // that.onHandleSearchRequest();
         that.onShowFormBox();
      });

    }

  }

  refreshPage(pageToLoad, searchTerm){
      if (1 > pageToLoad || pageToLoad > this.endPage) {
         return;
      }
      // set global pageNumber variable
      this.pageNumber = pageToLoad;
      this.onHandleSearchRequest();
      this.onHandleImageDisplay(pageToLoad, searchTerm);
  }

  onHandleImageDisplay(){
    //use fetch api with plain javascript
    let category ="";
    let counter = 0;
    let midPaginationBtn;
    this.displayBox.innerHTML = '';
    // this.getUrl+=`&q=+${this.searchTerm}&image_type=photo&pretty=true`
    let searchTerm = document.querySelector("#searchInput").value;
    this.getUrl = "https://pixabay.com/api/?key="+API_KEY+"&safesearch=true&q="+encodeURIComponent(searchTerm);
    fetch(this.getUrl, {
      method: 'GET',

    })
      .then(response => response.json())
      .then(data => {


         if (data.hits) {
           if(!data.totalHits){
               noSearchFound();
               return;
           }
           this.hero.style.display="none";
           document.getElementById("landing").style.marginTop="-480px";
           document.getElementById("showformbox").style.display ="block";

           let images = data.hits;
           let imageDiv = '';

           if(!data.totalHits){
               noSearchFound();
               return;
           }

           for (let i = 0; i < images.length; i++) {
               imageDiv +=
               `
               <div class="col-sm-4 col-md-4 col-lg-4 product" id="1">
                   <div class="card cardbox " >
                      <div class="image-wrapper">
                         <img src="${images[i].webformatURL}" class="img">
                       </div>
                       <div class="card-body">
                           <div class="card-content">

                           </div>
                           <div class="">

                             <div onclick="Uploader.onItemSelected(this)"  class="selected butt">select</div>
                             <div class="deselected " onclick="Uploader.onItemDeselected(this)">unselect</div>

                           </div>
                       </div>
                   </div>
               </div>
                   `
           }
             this.displayBox.innerHTML=imageDiv ;

         }else{
           this.displayBox.innerHTML="some error" ;
         }
      })
      .catch(error => {
        throw error;
      });


  }

  noSearchFound(){
     let noSearchFoundBox = document.createElement('div');
     noSearchFoundBox.innerHTML =
       `<center>
          <p> 🙄🙄🙄🙄!!! Could not find a search related term. Please try again.</p>
       </center>`;
     this.displayBox.appendChild(noSearchFoundBox);
     this.paginationContainer.innerHTML = '';
  }


  loadPaginationBtns(midPaginationBtn){}

}




let _singleton2 = null;
class Uploader{
   constructor(){
     this.selectedImages = document.getElementsByClassName('selected');
     this.deSelectedImages = document.getElementsByClassName('deselected');
     this.uploadedImages = [];
     this.currentItem = this.selectedImages[0];
     this.deselected = null;
     this.selected =null;
     this.imgUrl = null;
     this.uploadUrl = "./"
     this.uploadBtn = document.getElementById("uploadViaApi");
     if(!_singleton2){
        _singleton2 = this;
      }
      return _singleton2;
   }

   static attachEvents(){
     if(document.getElementById("landing")){
       let UploaderClass = new Uploader();
       // UploaderClass.onHandleSelection();
       // UploaderClass.onHandleDeselection();
       UploaderClass.onHandleUpload();
     }

   }

   static onItemSelected(el){
     let UploaderClass = new Uploader();
     Uploader.onHandleSelection(el,UploaderClass)
   }

   static onItemDeselected(el){
     let UploaderClass = new Uploader();
     Uploader.onHandleDeselection(el,UploaderClass)
   }


   static onHandleSelection(el,self) {
     //for selecting images into stack
     let that = self;
     let element = el;

     that.currentItem = element;
     that.deselected = that.currentItem.parentNode.querySelector(".deselected");
     that.selected = that.currentItem.parentNode.querySelector(".selected");
     that.imgUrl = that.currentItem.parentNode.parentNode.parentNode.querySelector(".img").src;
     that.deselected.style.opacity =1;
     that.selected.style.opacity =0;
     console.log("pushing")
     that.uploadedImages.push(that.imgUrl);
     console.log(that.uploadedImages)
    document.getElementById("uploadViaApi").style.display="block";


   }

   static onHandleDeselection(el,self) {
     //for selecting images into stack
     let that = self;
     let element = el;

    that.currentItem =  element;
    that.deselected = that.currentItem.parentNode.querySelector(".deselected");
    that.selected = that.currentItem.parentNode.querySelector(".selected");
    that.imgUrl = that.currentItem.parentNode.parentNode.parentNode.querySelector(".img").src;
    that.deselected.style.opacity =0;
    that.selected.style.opacity =1;
    let filteredCopy = that.uploadedImages.filter((image)=> image != that.imgUrl);
    that.uploadedImages = filteredCopy;
    console.log(that.uploadedImages)

   }

  async onHandleUpload(){
     //for uploading to servr
     let that = this;
     // if(this.uploadBtn){

       this.uploadBtn.addEventListener("click",(e)=>{

         let loader = document.getElementById("uploadViaApi");
         loader.disabled=true;
         // document.getElementById("uploadViaApi").style.display="none";
         loader.classList.add('loader');
         loader.innerHtml="Loading.."
         e.preventDefault()
         for(let checked =0; checked<that.uploadedImages.length;checked++){
           let url = that.uploadedImages[checked];
           let realFilename =  GetFilename(url);
           // *** Calling both function ***
            let dataUrl = await  toDataURL(url);
            let fileData = await dataURLtoFile(dataUrl, realFilename);
             // toDataURL(url)
             // .then(dataUrl => {
             //    var fileData = dataURLtoFile(dataUrl, realFilename);
             //    console.log("Here is JavaScript File Object",fileData);
             //    this._uploadFileToServer(fileData,'image-list/apiupload');
             //
             //
             //
             //  })
         }
       })

     // }

   }

  _uploadFileToServer(file,postUrl){
    return UploadService.uploadFile(file,postUrl);
  }


}



//EngineApp
class EngineApp{
  static attachEvents(){
    //runs the script
    document.addEventListener('DOMContentLoaded',()=>{
        setTimeout(()=>{
          initializeLoader();
          clearLoader();
          var notification = alertify.notify('Dom content loaded succesfully', 'success', 5, function(){  console.log('dismissed'); });
        },3000);
        SearchPixaApi.attachEvents();
        Uploader.attachEvents();


    });
  }
}


//runner
EngineApp.attachEvents();











class UploadService {
  static _(el){
      return document.getElementById(el);
  }

  static uploadFile(file, postUrl) {
    var file = UploadService._("hidden_uploads").files[0];
    var formdata = new FormData();
    formdata.append("hidden_uploads", file);
    console.log(formdata.toString());



    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('image-list/apiupload', {
      headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
      },
      method: 'post',
                          // credentials: "same-origin",

      body: JSON.stringify({

           name: "saladin",
          filename: formdata,


        })
    })
                      .then(response => response.json())
                      .then(data =>{
                        console.log(data);
                      }).catch(e =>{
                         throw new Error(e)
                      })
  }


}
