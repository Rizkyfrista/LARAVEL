<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = karyawan::all();

        return view('karyawan/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('first_name', $request->first_name);
        Session::flash('last_name', $request->last_name);
        Session::flash('address', $request->address);
        Session::flash('city_state_zip', $request->city_state_zip);
        Session::flash('home_phone', $request->home_phone);
        Session::flash('cell_phone', $request->cell_phone);
        Session::flash('email', $request->email);
        Session::flash('applied_position', $request->applied_position);
        Session::flash('expected_salary', $request->expected_salary);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city_state_zip' => 'required',
            'home_phone' => 'required',
            'cell_phone' => 'required',
            'email' => 'required',
            'applied_position' => 'required',
            'expected_salary' => 'required',
            'photo' => 'required|mimes:jpeg,jpg,png',
        ]);

        $photo_file = $request->file('photo');
        $photo_ekstensi = $photo_file->extension();
        $photo_name = date('ymdhis').'.'.$photo_ekstensi;
        $photo_file->move(public_path('photo'), $photo_name);

        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'city_state_zip' => $request->input('city_state_zip'),
            'home_phone' => $request->input('home_phone'),
            'cell_phone' => $request->input('cell_phone'),
            'email' => $request->input('email'),
            'applied_position' => $request->input('applied_position'),
            'expected_salary' => $request->input('expected_salary'),
            'photo' => $photo_name,
        ];
        karyawan::create($data);

        return redirect('karyawan')->with('success', 'Input Data Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "<h1> Saya Karyawan dengan Nama $id</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = karyawan::where('first_name', $id)->first();

        return view('karyawan/edit')->with('data', $data);
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city_state_zip' => 'required',
            'home_phone' => 'required',
            'cell_phone' => 'required',
            'email' => 'required',
            'applied_position' => 'required',
            'expected_salary' => 'required',
        ]);

        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'city_state_zip' => $request->input('city_state_zip'),
            'home_phone' => $request->input('home_phone'),
            'cell_phone' => $request->input('cell_phone'),
            'email' => $request->input('email'),
            'applied_position' => $request->input('applied_position'),
            'expected_salary' => $request->input('expected_salary'),
        ];

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'mimes:jpeg,jpg,png',
            ], [
                'photo.mimes' => 'jpeg,jpg,png',
            ]);
            $photo_file = $request->file('photo');
            $photo_ekstensi = $photo_file->extension();
            $photo_name = date('ymdhis').'.'.$photo_ekstensi;
            $photo_file->move(public_path('photo'), $photo_name);

            $data_photo = karyawan::where('first_name', $id)->first();
            File::delete(public_path('photo').'/'.$data_photo->photo);

            // $data = [
            //     'foto' => $photo_name
            // ];
            $data['photo'] = $photo_name;
        }

        karyawan::where('first_name', $id)->update($data);

        return redirect('/karyawan')->with('success', 'Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = karyawan::where('first_name', $id)->first();
        File::delete(public_path('photo').'/'.$data->photo);

        karyawan::where('first_name', $id)->delete();

        return redirect('/karyawan')->with('success', 'Delete Successfully!');
    }
}
