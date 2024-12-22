<?php

function datebirth($day, $month, $year)
{
    //       datebirth
    if ($day < 10) {
        $day = "0" . $day;
    }
    if ($month < 10) {
        $month = "0" . $month;
    }
    $datebirth =    $year . "-" . $month . "-" . $day;
    return $datebirth;
}
function fileStore($photo, $directory)
{
    if ($photo != "") {

        //get imageName
        $imageName =  time() . "_" . $photo->getClientOriginalName();
        //move imageFile
        $photo->move($directory, $imageName);
        return    $imageName;
    }
}
function fileUpdate($photo, $directory,$imagename)
{
    if ($photo != "") {

     $imageName = $imagename;
        //move imageFile
        $photo->move($directory, $imageName);
        return    $imageName;
    }
}
function fileDestroy($photo, $directory)
{
    try {
        $image_path = public_path() . '/' . $directory . '/' . $photo;
        unlink($image_path);
    } catch (\Exception $e) {
               //   return  $e->getMessage();
               return "<div style='background-color:red'> ERROR de carga de imagen</div>";
    }
}
function saludo(){
    return "hola";
}
