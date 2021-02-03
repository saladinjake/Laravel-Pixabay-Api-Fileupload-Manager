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

const toDataURL = url => fetch(url)
  .then(response => response.blob())
  .then(blob => new Promise((resolve, reject) => {
      const reader = new FileReader()
      reader.onloadend = () => resolve(reader.result)
      reader.onerror = reject
      reader.readAsDataURL(blob)
}))


// ***Here is code for converting "Base64" to javascript "File Object".***
function dataURLtoFile(dataurl, filename) {
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



let _singleton = null;
const API_KEY ='9592284-ac011e65dcf94b111588bba1b';
class SearchPixaApi{
  constructor(){
    this.displayBox = document.querySelector('#imageView');
    this.paginationContainer = document.querySelector('#paginationContainer');
    this.searchBox = document.querySelector("#searchBox");
    this.endPage = 90;
    this.pageNumber = null;
    this.searchTerm = null;
    this.imageType = 'photo';
    this.getUrl =`https://pixabay.com/api/?key=${API_KEY}`;
    if(!_singleton){
       _singleton = this;
     }
     return _singleton;
  }

  static attachEvents(val =1){
    const SearchPixaApiClass = new SearchPixaApi()
    SearchPixaApiClass.onHandleSearchRequest();
  }

  onHandleSearchRequest(){
    let that = this;
     this.searchBox.addEventListener('submit', function(evt){
        evt.preventDefault();
        that.searchTerm = this.searchBox.value;
        that.refreshPage(1,this.searchTerm);
     });
  }

  refreshPage(pageToLoad, searchTerm){
      if (1 > pageToLoad || pageToLoad > lastPage) {
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
    this.getUrl+=`&q=+${this.searchTerm}&image_type=photo`

    fetch(this.getUrl, {
      method: 'GET',
      headers: {
        "Accept": 'application/json',
        'Content-Type': 'application/json',
      },
      mode: 'cors'
    })
      .then(response => response.json())
      .then(data => {
         if (data.status === 200) {
           if(!data.totalHits){
               noSearchFound();
               return;
           }
           lastPage = Math.ceil(data.totalHits/9);
           if (this.pageNumber < 4){
              loadPaginationBtns(4);
           } else if (this.pageNumber>(this.endPage-3)){
              loadPaginationBtns(this.endPage-3);
           } else {
              loadPaginationBtns(this.pageNumber);
           }

           //Populate the Images Container
           let images = data.hits;
           for (i = 0; i < images.length; i++) {
               let imageDiv = document.createElement("div");
               imageDiv.classList.add("imageBox");
               imageDiv.innerHTML =
               `
               <div class="product" id="${counter++}">
                    <img src='${images[i].webformatURL}' class="img" />
                    <div class="selected">select</div>
                    <div class="deselected">unselect</div>
               </div>
               <a target="_blank" href='https://pixabay.com/users/${images[i].user}'+'-'+${images[i].user_id}>${images[i].user}</a>
               `
               this.displayBox.appendChild(imageDiv);
           }
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


  loadPaginationBtns(midPaginationBtn){
     this.paginationContainer.innerHTML = '';
     let paginationButtonsList = document.createElement("ul");
     paginationButtonsList.classList.add("theButtonsList");
     paginationButtonsList.innerHTML =`<li class="button" onclick="refreshPage(${this.pageNumber-1})"><a>«</a></li>
        <li class="button" onclick="refreshPage(1)"><a>1</a></li>
        <li class="button" onclick="refreshPage(${this.midPaginationBtn-2})">${midPaginationBtn-2}</a></li>
        <li class="button" onclick="refreshPage(${midPaginationBtn-1})">${midPaginationBtn-1}</a></li>
        <li id="pageNumber" class="button" onclick="refreshPage(${midPaginationBtn})">${midPaginationBtn}</a></li>
        <li class="button" onclick="refreshPage(${midPaginationBtn+1})">${midPaginationBtn+1}</a></li>
        <li class="button" onclick="refreshPage(${midPaginationBtn+2})">${midPaginationBtn+2}</a></li>
        <li class="button" onclick="refreshPage(${lastPage})">${lastPage}</li>
        <li class="button" onclick="refreshPage(${this.pageNumber+1})">»</a></li>`

        this.paginationContainer.appendChild(paginationButtonsList);
  }

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
     this.uploadBtn = document.getElementById("upload");
     if(!_singleton2){
        _singleton2 = this;
      }
      return _singleton2;
   }

   static attachEvents(){
      let UploaderClass = new Uploader();
      UploaderClass.onHandleSelection();
      UploaderClass.onHandleDeselection();
      UploaderClass.onHandleUpload();
   }


   onHandleSelection() {
     //for selecting images into stack
     let that = this;

     for(let checked =0; checked<this.selectedImages.length;checked++){
         that.selectedImages[checked].addEventListener('click',function(e){
             that.currentItem = that.selectedImages[checked];
             that.deselected = that.currentItem.parentNode.querySelector(".deselected");
             that.selected = that.currentItem.parentNode.querySelector(".selected");
             that.imgUrl = that.currentItem.parentNode.parentNode.parentNode.querySelector(".img").src;
             that.deselected.style.opacity =1;
             that.selected.style.opacity =0;
             that.uploadedImages.push(that.imgUrl)
         })
     }
   }

   onHandleDeselection(){
     //for deselecting image stack
      let that = this;

     for(let checked =0; checked<this.deSelectedImages.length;checked++){
         that.deSelectedImages[checked].addEventListener('click',function(e){
             that.currentItem = that.deSelectedImages[checked];
             that.deselected = that.currentItem.parentNode.querySelector(".deselected");
             that.selected = that.currentItem.parentNode.querySelector(".selected");
             that.imgUrl = that.currentItem.parentNode.parentNode.parentNode.querySelector(".img").src;
             that.deselected.style.opacity =0;
             that.selected.style.opacity =1;
             let filteredCopy = that.uploadedImages.filter((image)=> image != that.imgUrl);
             that.uploadedImages = filteredCopy;
             console.log(that.uploadedImages)
         })
     }
   }

   onHandleUpload(){
     //for uploading to servr
     let that = this;
     this.uploadBtn.addEventListener("click",()=>{
       for(let checked =0; checked<that.uploadedImages.length;checked++){
         let url = that.uploadedImages[checked];
         let realFilename =  GetFilename(url);
         // *** Calling both function ***
           toDataURL(url)
           .then(dataUrl => {
              var fileData = dataURLtoFile(dataUrl, realFilename);
              console.log("Here is JavaScript File Object",fileData)
              //this._uploadFileToServer(fileData);
            })
       }
     })
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
        },5000);
        // SearchPixaApi.attachEvents();
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
    // var file = UploadService._("file1").files[0];
    var formdata = new FormData();
    formdata.append(file.name, file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", postUrl);
    ajax.send(formdata);
  }

  static progressHandler(event) {
    UploadService._("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    var percent = (event.loaded / event.total) * 100;
    UploadService._("progressBar").value = Math.round(percent);
    UploadService._("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
  }

  static completeHandler(event) {
    UploadService._("status").innerHTML = event.target.responseText;
    UploadService._("progressBar").value = 0; //wil clear progress bar after successful upload
  }

  static errorHandler(event) {
    UploadService._("status").innerHTML = "Upload Failed";
  }

  static  abortHandler(event) {
    UploadService._("status").innerHTML = "Upload Aborted";
  }

}
