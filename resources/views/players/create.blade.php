@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-primary bg-gradient shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6"><a href="{{route('players.show', ['id' => $teamID])}}" class="btn btn-block d-inline"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i></a>Crear Jugador</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form id="form">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input id="name" name="name" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="age" class="form-label">Edad</label>
                                        <input id="age" name="age" type="number" min="0" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="position" class="form-label">Posición</label>
                                        <input id="position" name="position" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="jerseyNumber" class="form-label">Número camiseta</label>
                                        <input id="jerseyNumber" name="jerseyNumber" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="nationality" class="form-label">Nacionalidad</label>
                                        <input id="nationality" name="nationality" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="formFile" class="form-label">Seleccione una imagén:</label>
                                        <input class="form-control" type="file" id="playerIMG">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-success bg-gradient m-4 float-end pe-4 ps-4" value="Crear">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal-->
    <div class="modal" tabindex="-1" role="dialog" id="successModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 class="text-center text-success" style="font-style: italic;">Jugador creado satisfactoriamente</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--EndModal-->
    <script type="text/javascript">
        $('#form').submit(function(e) {
            let playerIMG = document.getElementById('playerIMG').files[0];
            e.preventDefault();
            let formData = new FormData();
            formData.append('name', $('#name').val());
            formData.append('age', $('#age').val());
            formData.append('position', $('#position').val());
            formData.append('jerseyNumber', $('#jerseyNumber').val());
            formData.append('nationality', $('#nationality').val());
            formData.append('teamID', '{{$teamID}}');
            formData.append('playerIMG', playerIMG);

            $.ajax({
                url: "{{getenv('APP_URL')}}/api/v1/player/store",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(r){
                    $('#successModal').show();
                },
                error: function(r){
                    console.log('error');
                }
            });
        });

        function closeModal()
        {
            $('#successModal').modal('hide');
        }
    </script>
@endsection
