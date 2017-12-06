<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homestay;

class HomestayController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homestays = Homestay::latest()->paginate(5);
        return view('homestays.index',compact('homestays'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homestays.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request -> all());

        request()->validate([
            'nama_homestay' => 'required',
            'harga' => 'required',
            'kuota' => 'required',
            'lat' => 'required',
            'long' => 'required',
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

        Homestay::create($request->all());
        return redirect()->route('homestays.index')
                        ->with('success','Homestay has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $homestay = Homestay::find($id);
        return view('homestays.show',compact('homestay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homestay = Homestay::find($id);
        return view('homestays.edit',compact('homestay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request -> all());

        request()->validate([
            'nama_homestay' => 'required',
            'harga' => 'required',
            'kuota' => 'required',
            'lat' => 'required',
            'long' => 'required',
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

        Homestay::find($id)->update($request->all());
        return redirect()->route('homestays.index')
                        ->with('success','Homestay has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Homestay::find($id)->delete();
        return redirect()->route('homestays.index')
                        ->with('success','Homestay has been deleted successfully');
    }
}
