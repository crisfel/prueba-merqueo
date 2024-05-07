@extends('layouts.dashboard')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient bg-primary shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3"><a href="{{route('teams.show-all')}}" class="btn btn-block d-inline"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i></a>Jugadores de {{$team->name}}<a href="{{route('players.create', ['id' => $team->id])}}" class="btn btn-block btn-Secondary d-inline"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">library_add</i></a></h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id= "my_table" class="table align-items-center mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edad</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Posición</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Número camiseta</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($players as $player)
                                    <tr class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <td>
                                            <a class="magnific" href="{{getenv('APP_URL')}}/storage{{$player->img_url}}">
                                                <img class="img-fluid"  style="width:80px;" src="{{getenv('APP_URL')}}/storage{{$player->img_url}}" onError="this.onerror=null;this.src='/assets/img/imagen-fallo.jpg';">
                                            </a>
                                        </td>
                                        <td>{{$player->name}}</td>
                                        <td>{{$player->age.' años'}}</td>
                                        <td>{{$player->position}}</td>
                                        <td>{{$player->jersey_number}}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
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
