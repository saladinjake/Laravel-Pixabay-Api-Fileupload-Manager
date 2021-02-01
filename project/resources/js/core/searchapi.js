let _singleton = null;
const API_KEY ='9592284-ac011e65dcf94b111588bba1b';
export default class SearchPixaApi{
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
    this.onHandleSearchRequest();
  }

  onHandleSearchRequest = () => {
     this.searchBox.addEventListener('submit', function(evt){
        evt.preventDefault();
        this.searchTerm = this.searchBox.value;
        this.refreshPage(1,this.searchTerm);
     });
  }

  refreshPage = (pageToLoad, searchTerm) => {
      if (1 > pageToLoad || pageToLoad > lastPage) {
         return;
      }
      // set global pageNumber variable
      this.pageNumber = pageToLoad;
      this.onHandleSearchRequest();
      this.onHandleImageDisplay(pageToLoad, searchTerm);
  }

  onHandleImageDisplay = () =>{
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

  noSearchFound = () => {
     let noSearchFoundBox = document.createElement('div');
     noSearchFoundBox.innerHTML =
       `<center>
          <p> 🙄🙄🙄🙄!!! Could not find a search related term. Please try again.</p>
       </center>`;
     this.displayBox.appendChild(noSearchFoundBox);
     this.paginationContainer.innerHTML = '';
  }


  loadPaginationBtns = (midPaginationBtn) => {
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
