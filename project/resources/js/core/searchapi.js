/*
* @param : Number.
*
* @usage SearchPixaApi.attachEvents()
*
*/
const API_KEY ='9592284-ac011e65dcf94b111588bba1b';
export  class SearchPixaApi{
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

  /*
  * @param : null or Integer
  *
  *
  *
  */

  static attachEvents(val =1){
    const SearchPixaApiClass = new SearchPixaApi()
    SearchPixaApiClass.onHandleSearchRequest();
  }

  /*
  * @param : null.
  *
  */

  onShowFormBox(){
    let that = this;
    document.getElementById("showformbox").addEventListener("click",function(){
      this.style.display="none";
      that.hero.style.display ="block";
       document.getElementById("landing").style.marginTop="-10px";
       that.displayBox.innerHTML ='';


    })
  }

  /*
  * @param : null.
  *
  *
  */
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

  /*
  * @param : null.
  *
  * @description : refresh page
  *
  */

  refreshPage(pageToLoad, searchTerm){
      if (1 > pageToLoad || pageToLoad > this.endPage) {
         return;
      }
      // set global pageNumber variable
      this.pageNumber = pageToLoad;
      this.onHandleSearchRequest();
      this.onHandleImageDisplay(pageToLoad, searchTerm);
  }

  /*
  * @param : null.
  *
  * @description : display of images fro search api
  *
  */

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
