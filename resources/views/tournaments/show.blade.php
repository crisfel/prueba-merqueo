@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient bg-primary shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3">Torneos<a href="{{route('tournaments.create')}}" class="btn btn-block btn-Secondary d-inline"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">library_add</i></a></h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id= "my_table" class="table align-items-center mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Torneo</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tournaments as $tournament)
                                    <tr class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <td><h2 class="text-center text-primary">{{$team->name}}</h2></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a style="color: darkred;" href="{{route('players.show', ['id' => $team->id])}}" title="Jugadores" class="btn btn-link px-1 mb-0"><i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">groups</i></a>
                                                <a style="color: darkred;" href="{{route('teams.edit', ['id' => $team->id])}}" title="Editar" class="btn btn-link px-1 mb-0"><i style="color: darkgreen; font-size: 25px !important;" class="material-icons opacity-10">edit</i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
