<?php

use App\Matiere;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class matiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugify=new Slugify();
        $matiere= new Matiere();
        $matiere->nom='Français';
        $matiere->slug= $slugify->slugify($matiere->nom);
        $matiere->save();

        $slugify=new Slugify();
        $matiere= new Matiere();
        $matiere->nom='Sciences Physiques';
        $matiere->slug= $slugify->slugify($matiere->nom);
        $matiere->save();

        $slugify=new Slugify();
        $matiere= new Matiere();
        $matiere->nom='Mathématiques';
        $matiere->slug= $slugify->slugify($matiere->nom);
        $matiere->save();

        $slugify=new Slugify();
        $matiere= new Matiere();
        $matiere->nom='philosophie';
        $matiere->slug= $slugify->slugify($matiere->nom);
        $matiere->save();

        $slugify=new Slugify();
        $matiere= new Matiere();
        $matiere->nom='Histoire Geographie';
        $matiere->slug= $slugify->slugify($matiere->nom);
        $matiere->save();

        $slugify=new Slugify();
        $matiere= new Matiere();
        $matiere->nom='Anglais';
        $matiere->slug= $slugify->slugify($matiere->nom);
        $matiere->save();

        $slugify=new Slugify();
        $matiere= new Matiere();
        $matiere->nom='SVT';
        $matiere->slug= $slugify->slugify($matiere->nom);
        $matiere->save();

        $slugify=new Slugify();
        $matiere= new Matiere();
        $matiere->nom='Sciences économiques';
        $matiere->slug= $slugify->slugify($matiere->nom);
        $matiere->save();

        $slugify=new Slugify();
        $matiere= new Matiere();
        $matiere->nom='espagnol';
        $matiere->slug= $slugify->slugify($matiere->nom);
        $matiere->save();
    }
}
