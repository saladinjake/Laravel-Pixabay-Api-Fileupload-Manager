//mixins

/*
* @url  {String or DOMElement} The link to a resource.
*
* @return {String} .
*
* GetFilename(url)
*
*/

export function GetFilename(url)
{
   if (url)
   {
      var m = url.substring(url.lastIndexOf("/") + 1, url.lastIndexOf("."));
      return m;
   }
   return "";
}

// ***Here is the code for converting "image source" (url) to "Base64".***

/*
* @url  {String or DOMElement} The link to a resource.
*
* @return {Promise Object} .
*
* toDataURL(url)
*
*/

export const toDataURL =   (url) =>  fetch(url)
  .then(response => response.blob())
  .then(blob => new Promise((resolve, reject) => {
      const reader = new FileReader()
      reader.onloadend = () => resolve(reader.result)
      reader.onerror = reject
      reader.readAsDataURL(blob)
}));


/*
* @url  {String } The link to a resource.
*@url  {String } The name to the file .
* @return {Promise Object} .
*
* @usage dataURLtoFile(dataurl, filename)
*
*/


// ***Here is code for converting "Base64" to javascript "File Object".***
 export function  dataURLtoFile(dataurl, filename) {
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


  /*
  * @param : null.
  *
  * @usage initializeLoader()
  *
  */
export const initializeLoader = () =>{
  //show loader or spinner
  const mainFrame = document.getElementById("gtd");
  const loader = document.getElementById("loader");
  loader.style.display="block";
  loader.style.opacity = 1;
}

/*
* @param : null.
*
* @usage clearLoader()
*
*/
export const clearLoader = () =>{
  const mainFrame = document.getElementById("gtd");
  const loader = document.getElementById("loader");
  loader.style.opacity=0;
  loader.style.display ="none";
  mainFrame.style.display ="block";
}
