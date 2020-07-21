<?php

namespace App\http\managers;
use getID3;
use Illuminate\Support\Facades\Auth;
use App\User;

class VideoManager{
    public function videoStorage($video){
        $filefullname=$video->getClientOriginalName();
        $fileName=pathinfo($filefullname,PATHINFO_FILENAME);
        $extension=$video->getClientOriginalExtension();
        $file=time().'_'.$fileName.'.'.$extension;
        $video->storeAs('public/cours_chapitres/'.Auth::user()->id, $file);
        return $file;
    }

    public function getVideoDuration($video){
        $getID3= new getID3;
       $pathvideo='storage/cours_chapitres/'.Auth::user()->id.'/'.$video;
       $fileanalyse=$getID3->analyze($pathvideo);
    //    dd($fileanalyse);
       $playtime=$fileanalyse['playtime_string'];
       return $playtime;
    }
}
