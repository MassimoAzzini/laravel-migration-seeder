<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Illuminate\Support\Str;


class TrainsTableSeederCsv extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_str = fopen(__DIR__. '/trains.csv', 'r');
        $i = 0;
        while(($row = fgetcsv($data_str)) !== false){
            if($i > 0){
                $train = new Train();
                $train->agency = $row[0];
                $train->departure_station = $row[1];
                $train->arrival_station = $row[2];
                $train->departure = $row[3];
                $train->arrival = $row[4];
                $train->train_code = $row[5];
                $train->number_carriages = $row[6];
                $train->in_time = $row[7];
                $train->deleted = $row[8];
                $train->slug = $this->generateSlug($train->train_code);
                $train->save();

            }
            $i++;
        }
        fclose($data_str);
    }


    private function generateSlug($reference){
        $slug = Str::slug($reference, '-');
        $original_slug = $slug;
        $exist = Train::where('slug', $slug)->first();
        $c = 1;
        while($exist){
            $slug = $original_slug. '-'. $c;
            $exist = Train::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }
}
