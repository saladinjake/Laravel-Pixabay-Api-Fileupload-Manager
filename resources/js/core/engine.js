import { initializeLoader ,clearLoader } from './helpers/mixins';
import { SearchPixaApi } from './searchapi';
import { Uploader, UploadService} from './uploader';
//EngineApp

/*
* @param : null.
*
* @usage EngineApp.attachEvents()
*
*/
export class EngineApp{
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
