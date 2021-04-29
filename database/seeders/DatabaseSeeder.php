<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Location;
use App\Models\Resource;
use App\Models\Tweet;
use App\Models\TweetAttachment;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $resources = ["remdesivir", "oxygen", "hospital", "beds", "ventilators"];

        // $locations = ["mumbai", "delhi", "lucknow", "pune", "bangalore", "chennai"];

        // foreach($resources as $resource) {
        //     Resource::create([
        //         "name" => $resource,
        //     ]);
        // }

        // foreach($locations as $location) {
        //     Location::create([
        //         "name" => $location,
        //     ]);
        // }

        for($i = 1 ; $i <= 3321 ; $i++) {
            $faker = Factory::create();
            $location_id = Location::pluck("id")->random(1);
            $resource_id = Resource::pluck("id")->random(1);
            $tweet = Tweet::create([
                "content" => $faker->sentence(),
                "is_verified" => 0,
                "tweeted_time" => Carbon::now()->toDateTimeString(),
                "location_id" => $location_id[1-1],
                "resource_id" => $resource_id[1-1],
            ]);

            Contact::create([
                "number" => rand(7827625739, 9192782539),
                "tweet_id" => $tweet->id
            ]);

            TweetAttachment::create([
                "url" => "media/new.jpg",
                "tweet_id" => $tweet->id,
            ]);
        }

        

    }
}
