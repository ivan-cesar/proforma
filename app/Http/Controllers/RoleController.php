<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $data['module'] = "Roles collaborateurs";
        //$data['page_description'] = "Bienvenue sur votre espace de gestion de rôles";
        $data['roles'] = Role::orderBy("id","DESC")->get();
        //User::Logs('Gerer mes demandes');
        return view('roles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "libelle" => "required",
      ],[
            "libelle" => "le champ motif est obligatoire",
            ]);
            $role = new Role(); 
            $role->libelle = htmlspecialchars($request->libelle);
            if($role->save()){
                session()->flash('type', 'alert-success');
                session()->flash('message', 'Le rôle a étè crée avec succès');
                return redirect()->route('roles.index');
            }else{
                session()->flash('type', 'alert-danger');
                session()->flash('message', 'Erreur lors de la modification');
                return back();
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        /*$data['page_title'] = "Modifier une absence - ";
		$data['page_description'] = " ";*/

		$data['roles'] = Role::where(['id' => $request->id ])->first();
		if(empty($data['roles'])){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'Demande introuvable');
			return back();
		}

         /** Recuperation du département et des responsables */
         /*$data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();*/
            //dd($data['responsable'],$data['departement']);
		//Role:logs("Affichage de la page de modification de demande");

		return view('roles.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(),[
            "libelle" => "required",
      ],[
            "libelle" => "le champ motif est obligatoire",
            ]);
            $id = htmlspecialchars($request->id);
            //dd($id);
            $data['libelle'] = htmlspecialchars($request->libelle);

            if(Role::where([ 'id' => $id ])->update($data)){
                session()->flash('type', 'alert-success');
                session()->flash('message', "Le rôle a étè modifié avec succès");
                return redirect()->route('roles.index');
            }else{
                session()->flash('type', 'alert-danger');
                session()->flash('message', 'Erreur lors de la modification');
                return back();
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Role::where('id', $id)->delete()){
            session()->flash('type', 'alert-success');
			session()->flash('message', "Le rôle a étè supprimé avec succès");
			return redirect()->route('roles.index');
        }else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }
}
