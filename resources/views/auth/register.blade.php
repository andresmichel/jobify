@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-5 offset-sm-1">
                <div class="card">
                    <div class="card-block">
                        <ul class="p-0" style="list-style:none;">
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Sube tu currículum vítae en formato PDF</li>
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Crea y guarda tu currículum vítae en tu cuenta</li>
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Visualiza tu historial de Currículums vítae enviados</li>
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Recibe notificaciones de vacantes acuerdo</li>
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Infórmate de ferias de empleo</li>
                        </ul>
                        <a href="{{ url('register/aspirant') }}" class="btn btn-block btn-primary mr-5">Aspirante</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-block">
                        <ul class="p-0" style="list-style:none;">
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Registre la información de su empresa</li>
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Publica oportunidades de empleo</li>
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Crea y aplique exámenes de conocimiento</li>
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Envia cartas de agradecimiento a los aspirantes</li>
                            <li class="py-2 flex">
                                <i class="material-icons text-success mr-2">check_circle</i>Filtre currículums vítae recibidos en tu cuenta</li>
                        </ul>
                        <a href="{{ url('register/company') }}" class="btn btn-block btn-primary">Empresa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
