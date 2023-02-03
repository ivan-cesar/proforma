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
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <form class="user" method="POST" action="{{route('roles.update')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="libelle" value="{{$roles->libelle}}" class="form-control" placeholder="Entrez le role">
                                <input type="text" name="id"  value="{{$roles->id}}" hidden>
                            </div>
                            <button type="submit"  class="btn btn-primary btn-user btn-block">
                                Validez
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
 </div>
@endsection
