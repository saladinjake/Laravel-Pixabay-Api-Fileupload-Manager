import { GetFilename, toDataURL, dataURLtoFile } from './helpers/mixins';

let _singleton = null;
export default class Uploader{
   constructor(){
     this.selectedImages = document.getElementsByClassName('selected');
     this.deSelectedImages = document.getElementsByClassName('deselected');
     this.uploadedImages = [];
     this.currentItem = selectedImages[0];
     this.deselected = null;
     this.selected =null;
     this.imgUrl = null;
     this.uploadBtn = document.getElementById("upload");
     if(!_singleton){
        _singleton = this;
      }
      return _singleton;
   }

   static attachEvents = () =>{
      let UploaderClass = new Uploader();
      UploaderClass.onHandleSelection();
      UploaderClass.onHandleDeselection();
      UploaderClass.onHandleUpload();
   }


   onHandleSelection = () => {
     //for selecting images into stack
     for(let checked =0; checked<this.selectedImages.length;checked++){
         this.selectedImages[checked].addEventListener('click',function(e){
             currentItem = this.selectedImages[checked];
             deselected = currentItem.parentNode.querySelector(".deselected");
             selected = currentItem.parentNode.querySelector(".selected");
             imgUrl = currentItem.parentNode.querySelector(".img").src;
             deselected.style.opacity =1;
             selected.style.opacity =0;
             this.uploadedImages.push(imgUrl)
         })
     }
   }

   onHandleDeselection = () => {
     //for deselecting image stack
     for(let checked =0; checked<this.deSelectedImages.length;checked++){
         this.deSelectedImages[checked].addEventListener('click',function(e){
             currentItem = this.deSelectedImages[checked];
             deselected = currentItem.parentNode.querySelector(".deselected");
             selected = currentItem.parentNode.querySelector(".selected");
             imgUrl = currentItem.parentNode.querySelector(".img").src;
             deselected.style.opacity =0;
             selected.style.opacity =1;
             let filteredCopy = this.uploadedImages.filter((image)=> image != imgUrl);
             uploadedImages = filteredCopy;
             console.log(uploadedImages)
         })
     }
   }

   onHandleUpload = () => {
     //for uploading to servr
     uploadBtn.addEventListener("click",()=>{
       for(let checked =0; checked<this.uploadedImages.length;checked++){
         let url = this.uploadedImages[checked];
         let realFilename =  GetFilename(url);
         // *** Calling both function ***
           toDataURL(url)
           .then(dataUrl => {
              console.log('Here is Base64 Url', dataUrl)
              var fileData = dataURLtoFile(dataUrl, realFilename);
              console.log("Here is JavaScript File Object",fileData)
              //this. _uploadFileToServer(fileData);
            })
       }
     })
   }

   _uploadFileToServer = (file) =>{
     let queryTerm = document.getElementById("searchForm").value;
     let apiLink = "/put my upload link here";
     fetch(apiLink, {
         method: 'POST',
         headers: {
           "Content-Type": "application/json"
         },
         body: file
       }).then(
         response => response.json()
       ).then(
         success => console.log(success)
       ).catch(
         error => console.log(error)
       );
   }

}
