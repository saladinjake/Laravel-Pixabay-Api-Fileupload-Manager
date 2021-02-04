

>   Developer Challenge 1  and 2

## BUILD A FULLSTACK FINISHED PRODUCT: IMage Uploader
This repository contains:

### Project Overview Task

Objective
Your assignment is to implement an image storage using Laravel and VueJS/Javascript.






## Table of Contents

- [Background](#background)
- [Features (UI)](###Features)
- [Usage](#usage)



- [License](#license)

## Background
 - Brief
 Aminat, an influencer from PH, has a great idea. She wants to build a storage that allows her and her friends to upload images from their devices and also from pixabay.
 Tasks
 - Implement assignment using
 - Language: PHP, Javascript
 - Framework: Laravel, VueJS/Any js



 ### Features
 - [No authentication required]
 - [Create a view that will,]
     * Let users have an option to search and select multiple images from pixabay(using Pixabay API) on the system and upload their selection.
     * Let users have an option to upload multiple images from their devices.
 - [Create a view that will let users view previously uploaded images.]
 - [Users Should be able to delete images]
 - [Validate the users request only images are required.]



### Endpoints Features (API)
- Route::get('/', [FrontController::class, 'index']): Index page for search and display record via pixabay api
- Route::get('image-list/create/new', [FrontController::class, 'create']): Form to upload multiple images to platform
- Route::get('image-list/lists', [FrontController::class, 'viewAll']): list all my previous uploads
- Route::post('image-list/upload/via/device', [UploaderController::class, 'uploadViaDevice']): Post request resolver to upload images from device
- Route::post('image-list/apiupload', [UploaderController::class, 'uploadViaApi']): post request resolver to upload images from pixa bay
- Route::delete('/image-list/{id}/delete',[FrontController::class, 'delete']): Delete request handler


## Usage javascript

- clone the repo or download the repo
- run the cmd : npm install or yarn install if you have them installed in your dev env

- npm run eslint   - to test linting on js
- npm run testjs   - to test front end js
- npm run cover -to test coverall output
- npm run coverage  - to run coveralls and output it to file

## Usage PHP
- run the command composer install    - to install laravel packages
- php artisan serve
- enjoy and prosper

## License

[MIT](LICENSE) © Juwa Victor Aka SALADINJAKE
