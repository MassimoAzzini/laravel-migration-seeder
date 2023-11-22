<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++){
            $train = new Train();
            $train->agency = $faker->words(1, true);
            $train->type = $faker->words(1, true);
            $train->departure_station = $faker->words(2, true);
            $train->arrival_station = $faker->words(2, true);
            $train->departure = $faker->dateTime();
            $train->arrival = $faker->dateTime();
            $train->train_code = $faker->numberBetween(1000, 99999);
            $train->number_carriages = $faker->numberBetween(4, 20);
            $train->in_time = $faker->boolean();
            $train->deleted = $faker->boolean();
            $train->slug = $this->generateSlug($train->train_code);
            $train->save();
        }
    }

    private function generateSlug($train_code){
        $slug =  Str::slug(strval($train_code), '-');
        $original_slug = $slug;

        $exists = Train::where('slug', $slug)->first();
        $c = 1;

        while($exists){
            $slug = $original_slug. '-'. $c;
            $exists = Train::where('slug', $slug)->first();

            $c++;
        }
        return $slug;
    }

}
