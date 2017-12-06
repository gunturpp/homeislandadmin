<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homestay;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('homestays.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost()
    {
        request()->validate([
            'foto_1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

        $imageName1 = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('/images'), $imageName1);

        $imageName2 = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('/images'), $imageName2);

        $imageName3 = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('/images'), $imageName3);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('foto_1',$imageName1);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('foto_2',$imageName2);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('foto_3',$imageName3);

        }
}