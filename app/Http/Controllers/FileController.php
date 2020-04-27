<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function downloadFile(){
        return response()->download(public_path('user_avatar.jpg'), 'profile avatar');
    }

    public function uploadFile(Request $request) {
        $filename = 'profile.jpg';
        $path = $request->file('photo')->move(public_path('/'),$filename);
        $imageURL = url('/'.$filename);

        return response()->json(['url' => $imageURL]);
    }
}
