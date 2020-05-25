<?php


use App\Statut;
use Illuminate\Database\Seeder;

class statutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statut= new Statut();
        $statut->statuts_nom='Utilisateur';
        $statut->save();

        $statut= new Statut();
        $statut->statuts_nom='Professeur';
        $statut->save();

        $statut= new Statut();
        $statut->statuts_nom='Administrateur';
        $statut->save();

    }
}
