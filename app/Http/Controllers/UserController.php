<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["users"] = User::orderBy("id","DESC")->get();
        return view('users.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            "nom" => "required",
            "prenoms" => "required",
            "email" => "required|email|max:255|unique:users",
            "adress" => "required",
            "fonction" => "required|integer",
            "departement" => "required|integer",
            "numero" => "required",
            "cni"=> "required",
            "date_debut" => "required|date",
            "role" => "required|integer",
            "photo" => "nullable",
      ],
      [
               "nom" => "Le champ nom est obligatoire",
            "prenoms" => "Le champ prénoms est obligatoire",
            "email" => "Le champ email est obligatoire",
            "adress" => "Le champ adresse est obligatoire",
            "fonction" => "Le champ fonction est obligatoire",
            "departement" => "Le champ departement est obligatoire",
            "numero" => "Le champ téléphone est obligatoire",
            "cni"=> "Le champ numero de la cni est obligatoire",
            "date_debut" => "Le champ la date debut est obligatoire",
            "role" => "Le champ rôle est obligatoire",
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
