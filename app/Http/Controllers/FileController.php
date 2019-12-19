<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    private $imagePath;
    private $imageUrl;

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
//            foreach ( $request->image as  $i){
//                $filename=$i->getClientOriginalName();
//                $imageSize = $i->getClientSize();
//                $imagePath = $i->storeAs('public/assest',$filename);
//                $file = new File();
//                $file->path = $imagePath;
//                $file->size = $imageSize;
//                $file->save();
//            }

            $filename= $request->image->getClientOriginalName();
            $this->imagePath = $request->image->storeAs('public/assest',$filename);
            $imageSize = $request->image->getClientSize();
            echo $imageSize;
            $file = new File();
            $file->path = $this->imagePath;
            $file->size = $imageSize;
            $file->save();
        } else {
            echo "Image Is Null";
        }
    }

    public function showImages()
    {
        $url = Storage::url('');
        return Storage::files('public/assest');
        return "<img src='$url'/>";
    }

}
