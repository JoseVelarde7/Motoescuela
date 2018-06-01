@extends('layout')
@section('content')

    <h1 class="text-light">Horarios<span class="mif-money place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <div class="tile-container bg-white">
        @if(Auth::user()->user_tipo=='USER1' || Auth::user()->user_tipo=='USER2')
        <a href="{{url('/horarios/nuevo')}}" class="tile bg-orange fg-white" data-role="tile">
            <div class="tile-content iconic">
                <span class="icon mif-redo"></span>
            </div>
            <h4 class="tile-label" align="center">Lista</h4>
        </a>
        <a href="{{url('/horarios/general')}}" class="tile bg-darkCrimson fg-white" data-role="tile">
            <div class="tile-content iconic">
                <span class="icon mif-school"></span>
            </div>
            <h4 class="tile-label" align="center">General</h4>
        </a>
        @endif
        <a href="{{url('/horarios/instructores')}}" class="tile bg-olive fg-white" data-role="tile">
            <div class="tile-content iconic">
                <span class="icon mif-user-check"></span>
            </div>
            <h4 class="tile-label" align="center">Instructores</h4>
        </a>

    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/horarios.js')}}"></script>
@endsection
