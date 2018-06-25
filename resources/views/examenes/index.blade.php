@extends('layout')
@section('content')

    <h1 class="text-light">Examenes<span class="mif-money place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <div class="tile-container bg-white">
        @if(Auth::user()->user_tipo=='USER1')
        <a href="{{url('/examenes/crear')}}" class="tile bg-red fg-white" data-role="tile">
            <div class="tile-content iconic">
                <span class="icon mif-question"></span>
            </div>
            <h4 class="tile-label" align="center">Preguntas</h4>
        </a>
        {{--<a href="{{url('/ingresar')}}" class="tile bg-darkGreen fg-white" data-role="tile">
            <div class="tile-content iconic">
                <span class="icon mif-user-check"></span>
            </div>
            <h4 class="tile-label" align="center">Examen</h4>
        </a>--}}

        @endif
        <a href="{{url('/examenes/resultados')}}" class="tile bg-darkBlue fg-white" data-role="tile">
            <div class="tile-content iconic">
                <span class="icon mif-registered"></span>
            </div>
            <h4 class="tile-label" align="center">Resultados</h4>
        </a>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/examen.js')}}"></script>
@endsection
