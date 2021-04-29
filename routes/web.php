<?php

use App\Http\Controllers\TweetsController;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Resource;
use App\Models\Tweet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route("tweets.index"));
});

Route::get("/about-us", function() {
    return view("about-us");
})->name("about-us");

Route::get("tweets/search", [TweetsController::class, "search"])->name("tweet.search");
Route::resource("/tweets", TweetsController::class);
