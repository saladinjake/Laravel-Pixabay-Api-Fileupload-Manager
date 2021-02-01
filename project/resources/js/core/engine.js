import SearchPixaApi from './searchapi';
import Uploader from './uploader';
import { initializeLoader,clearLoader } from './helpers/mixins';

export class EngineApp{
  static attachEvents = () => {
    //runs the script
    document.addEventListener('DOMContentLoaded',()=>{
        setTimeout(()=>{
          initializeLoader();
          clearLoader();
        },5000);
        SearchPixaApi.attachEvents();
        Uploader.attachEvents();
    });
  }
}
