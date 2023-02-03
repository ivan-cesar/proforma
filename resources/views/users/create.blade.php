@extends('layouts.template_dashboard')
@section('content')
 <div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    Default Card Example
                </div>
                <div class="card-body">
                    <div class="p-5">
                        <form class="user" method="POST" action="{{route('users.store')}}">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Information Générale</h1>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Matricule</label>
                                            <input type="text" name="matricule" class="form-control" placeholder="Entrez le departement">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Numero CNI</label>
                                            <input type="text" name="cni" class="form-control" placeholder="Entrez le departement">
                                        </div>
                                        <div class="contenair">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Departement</label>
                                                        <select name="departement" class="form-control">
                                                            <option value="">Séléctionner un département</option>
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Rôle</label>
                                                        <select name="role" class="form-control">
                                                            <option value="">Séléctionner un rôle</option>
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                        </select>                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Entrez le departement">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date de prise de fonction</label>
                                            <input type="date" name="date_debut" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Détails du contact</h1>
                                        </div>
                                        <div class="form-group" style="text-align: center;border: 1px dashed #BBB;border-radius: 20px;">
                                          <img id="previewImg" src="{{asset('img/rectangle-385@1x.png')}}" alt="Placeholder" style="width: 30%;height: 150px;padding-top: 10px;">
                                          <div id="yourBtn" onclick="getFile()">cliquez pour télécharger une image</div>
                                          <div style='height: 0px;width: 0px; overflow:hidden;'>
                                            <input type="file" id="upfile" name="photo" onchange="previewFile(this);">
                                        </div>
                                       </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nom</label>
                                                        <input type="text" name="nom" class="form-control" placeholder="Entrez le nom">
                                                    </div>  
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Prénoms</label>
                                                        <input type="text" name="prenoms" class="form-control" placeholder="Entrez le prenom">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Numero de télèphone</label>
                                                        <input type="tel" name="numero" class="form-control" placeholder="Entrez le numero">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Adresse Géographique</label>
                                                        <input type="text" name="adress" class="form-control" placeholder="Entrez l'adresse">
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button type="reset"  class="btn btn-primary btn-user btn-block">
                                                                Annuler
                                                            </button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit"  class="btn btn-primary btn-user btn-block">
                                                                Validez
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
     @include('flashmessage')
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" style="width: 166px;">Libelle</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" colspan="2" style="width: 254px;text-align:center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                          <tr class="odd">
                            <td class="sorting_1">{{$user->nom}}</td>
                            <td>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{route('users.edit',$user->id)}}"><i class="fas fa-fw fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{route('users.delete',$user->id)}}">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                         </tr>
                         @empty
                            <tr>
                                <td colspan="3" style="width: 254px;text-align:center;">
                                    <h4>la bd est vide </h4>

                                </td>
                            </tr>
                         @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        </div>
            </div>
        </div>
    </div>
 </div>
 <style>
    #yourBtn {
  position: relative;
  top: -1%;
  width: 63%;
    padding: 10px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border: 1px dashed #BBB;
  text-align: center;
  background-color: #DDD;
  cursor: pointer;
  left: 16%;
}
 </style>
 <script>
    function getFile() {
  document.getElementById("upfile").click();
}

function sub(obj) {
  var file = obj.value;
  var fileName = file.split("\\");
  document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
  document.myForm.submit();
  event.preventDefault();
}
 </script>
@endsection
