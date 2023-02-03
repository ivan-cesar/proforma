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
                        <form class="user" method="POST" action="{{route('departements.store')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="libelle" class="form-control" placeholder="Entrez le departement">
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
                        @forelse ($departements as $dpmt)
                          <tr class="odd">
                            <td class="sorting_1">{{$dpmt->libelle}}</td>
                            <td>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{route('departements.edit',$dpmt->id)}}"><i class="fas fa-fw fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{route('departements.delete',$dpmt->id)}}">
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
@endsection
