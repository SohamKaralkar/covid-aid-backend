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
    // dd(Carbon::now()->toDateTimeString());
    // dd(Tweet::factory()->count(6)->make());

    // Tweet::factory()->count(6)->make()->each(function($tweet) {
    //     $tweet->contacts()->create(["number" => "786176228"]);
    // });


    // dd(json_decode(request()->soham));
    
});
