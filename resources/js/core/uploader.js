import { GetFilename, toDataURL, dataURLtoFile } from './helpers/mixins';
/*
* @param : null.
*
* @usage Uploader.attachEvents()
*
*/
let _singleton2 = null;
export class Uploader{
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

   /*
   * @param : null.

   *
   */

   static attachEvents(){
     if(document.getElementById("landing")){
       let UploaderClass = new Uploader();
       // UploaderClass.onHandleSelection();
       // UploaderClass.onHandleDeselection();
       UploaderClass.onHandleUpload();
     }

   }

   /*
   * @param : DOMElement.

   *
   */


   static onItemSelected(el){
     let UploaderClass = new Uploader();
     Uploader.onHandleSelection(el,UploaderClass)
   }

   /*
   * @param : DOMElement

   *
   */

   static onItemDeselected(el){
     let UploaderClass = new Uploader();
     Uploader.onHandleDeselection(el,UploaderClass)
   }

   /*
   * @param : DOMElement.
   *@param : Uploader Object
   *
   */

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

   /*
   * @param : DOMElement.
   *@param : Uploader Object
   *
   */

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


   /*
   * @param : null
   *
   */

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

             toDataURL(url)
             .then(dataUrl => {
                var fileData = dataURLtoFile(dataUrl, realFilename);
                console.log("Here is JavaScript File Object",fileData);
                this._uploadFileToServer(url,'image-list/apiupload');



              })
         }
       })

     // }

   }

  _uploadFileToServer(file,postUrl){
    return UploadService.uploadFile(file,postUrl);
  }


}











/*
* @usage: UploadService.attachEvents();
*
*/
export class UploadService {
  static _(el){
      return document.getElementById(el);
  }

  static uploadFile(file, postUrl) {
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
          image_url: file,
        })
    })
    .then(response => response.json())
    .then(data =>{
          let loader = document.getElementById("uploadViaApi");
          loader.disabled=false;
          // document.getElementById("uploadViaApi").style.display="none";
          loader.classList.remove('loader');
          var notification = alertify.notify('Upload successful', 'success', 5, function(){  console.log('dismissed'); });

          document.getElementById("showformbox").click();
          }).catch(e =>{
                throw new Error(e)
       })
  }


}
