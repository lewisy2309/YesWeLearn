<?php

namespace App\http\managers;

class PaymentManager{
    public function getPartProfesseur($total){

        $pourcentage=50;
        $pourcentageDecimal= $pourcentage /100;

        $part = $pourcentageDecimal * $total;
        return $part;
    }

    public function getPartYesWeLearn($total){

        $pourcentage=50;
        $pourcentageDecimal= $pourcentage /100;

        $part = $pourcentageDecimal * $total;
        return $part;
    }

}
