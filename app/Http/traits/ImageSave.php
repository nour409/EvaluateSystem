<?php
namespace App\Http\traits;
trait ImageSave {

    public function uploadPhoto($photo ,$path)
    {
        $fileExtension =$photo->getClientOriginalExtension();
        $fileName=time().'.'.$fileExtension;
        $photo->move($path,$fileName);
        return $fileName;
    }
}
