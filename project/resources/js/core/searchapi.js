export default class SearchPixaApi{
  constructor(){

    this.displayHeader = document.querySelector('#header');
    this.displayBox = document.querySelector('#imagesContainer');
    this.paginationContainer = document.querySelector('#paginationContainer');
    this.searchBox = document.querySelector("#searchBox");
    this.endPage = 90;
    this.pageNumber = null;
    this.searchTerm = null;
    this.imageType = 'photo';
    this.postUrl ="https://pixabay.com/api"
  }

  attachEvents(val =1){
    this.onHandleSearchRequest();
  }

  onHandleSearchRequest = () => {
     this.searchBox.addEventListener('submit', function(evt){
        evt.preventDefault();
        this.searchTerm = this.searchBox.value;
        console.log('The current search is: ',this.searchTerm);
        refreshPage(1,this.searchTerm);
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
    let midPaginationBtn;
    this.displayBox.innerHTML = '';

    if(typeof this.searchTerm !== 'undefined'){
        category = this.searchTerm;
    }

    fetch(this.postUrl, {
      method: 'GET',
      headers: {
        "Accept": 'application/json',
        'Content-Type': 'application/json',
        key: '9648595-648ea08d9441c4123d7acaff0',
         image_type: image_type,
         q: category,
         page: this.pageNumber,
         per_page: 9
      },
      mode: 'cors',
    })
      .then(response => response.json())
      .then(data => {
         if (data.status === 200) {
           if(!data.totalHits){
               handleZeroResults();
               return;
           }
           lastPage = Math.ceil(data.totalHits/9);
           if (pageNumber < 4){
              loadPaginationBtns(4);
           } else if (pageNumber>(lastPage-3)){
              loadPaginationBtns(lastPage-3);
           } else {
              loadPaginationBtns(pageNumber);
           }

           //Populate the Images Container
           let images = data.hits;
           for (i = 0; i < images.length; i++) {
               let imageDiv = document.createElement("div");
               imageDiv.classList.add("imageBox");
               imageDiv.innerHTML =
               `<img class='imgPreview' src='${images[i].webformatURL}'>
               <img class='avatar' src='${images[i].userImageURL}'>
               <p class='username'>
               <a target="_blank" href='https://pixabay.com/users/${images[i].user}'+'-'+${images[i].user_id}>${images[i].user}</a>
               </p>`
               this.displayBox.appendChild(imageDiv);
           }


         }
      })
      .catch(error => {
        throw error;
      });


  }

  let noSearchFound = () => {
     let noSearchFoundBox = document.createElement('div');
     noSearchFoundBox.innerHTML =
       `<center>
          <p> 🙄🙄🙄🙄!!! Could not find a search related term. Please try again.</p>
       </center>`;
     this.displayBox.appendChild(searchAgainBox);
     this.paginationContainer.innerHTML = '';
  }


  let loadPaginationBtns = (midPaginationBtn) => {
     this.paginationContainer.innerHTML = '';

     let paginationButtonsList = document.createElement("ul");
     paginationButtonsList.classList.add("theButtonsList");
     paginationButtonsList.innerHTML =

        `<li class="button" onclick="refreshPage(${this.pageNumber-1})"><a>«</a></li>
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
