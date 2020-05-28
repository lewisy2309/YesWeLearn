<?php

use App\Examen;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class examenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugify= new Slugify();
        $examen= new Examen();
        $examen->nom='BEPC';
        $examen->slug=$slugify->slugify($examen->nom);
        $examen->niveau_id=4;
        $examen->save();

        $slugify= new Slugify();
        $examen= new Examen();
        $examen->nom='BAC LE';
        $examen->slug=$slugify->slugify($examen->nom);
        $examen->niveau_id=9;
        $examen->save();

        $slugify= new Slugify();
        $examen= new Examen();
        $examen->nom='BAC S';
        $examen->slug=$slugify->slugify($examen->nom);
        $examen->niveau_id=10;
        $examen->save();
    }
}
