<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Resource;
use App\Models\Tweet;
use Carbon\Carbon;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = FakerFactory::create();
        $location_id = Location::pluck("id")->random(1);
        $resource_id = Resource::pluck("id")->random(1);
        return [
            "content" => $faker->sentence(),
            "is_verified" => 0,
            "tweeted_time" => Carbon::now()->toDateTimeString(),
            "location_id" => $location_id[1-1],
            "resource_id" => $resource_id[1-1],
        ];
    }
}
