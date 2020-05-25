<?php

use App\Niveau;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class niveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='6E';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='5E';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='4E';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='3E';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='2ND LE';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='2ND S';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='1ERE LE';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='1ERE S';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='TLE LE';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

        $slugify=new Slugify();
        $niveau= new Niveau();
        $niveau->nom='TLE S';
        $niveau->slug= $slugify->slugify($niveau->nom);
        $niveau->save();

    }
}
