<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Api\CommentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [PagesController::class, "viewCompany"]);
Route::get('/company/{id}', [PagesController::class, "companyPage"]);

/*
* Добавление нового комментария
* URI: {host}/api/comments
*/
Route::get('/comment/{id}', [CommentsController::class, "viewCommentsTitle"])->name('commentsTitle');
Route::get('/comment/{id}', [CommentsController::class, "viewCommentsInn"])->name('commentsInn');
Route::get('/comment/{id}', [CommentsController::class, "viewCommentsDescription"])->name('commentsDescription');
Route::get('/comment/{id}', [CommentsController::class, "viewCommentsManager"])->name('commentsManager');
Route::get('/comment/{id}', [CommentsController::class, "viewCommentsAddress"])->name('commentsAddress');
Route::get('/comment/{id}', [CommentsController::class, "viewCommentsTelephone"])->name('commentsTelephone');

Route::post('/comment', [CommentsController::class, "storeComment"]);
Route::post('/company', [CompanyController::class, "storeCompany"]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
