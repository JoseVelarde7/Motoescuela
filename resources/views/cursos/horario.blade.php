@extends('layout')

@section('estilos')
    <link href="{{asset('css/bootstrap-table.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="text-light">Horarios<span class="mif-motorcycle place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <table id="table"></table>

@endsection
@section('scripts')
    <script src="{{asset('js/bootstrap-table.min.js')}}"></script>
    <script src="{{asset('js/cursos.js')}}"></script>
    <script>
        $('#table').bootstrapTable({
            columns: [{
                field: 'id',
                title: 'Item ID'
            }, {
                field: 'name',
                title: 'Item Name'
            }, {
                field: 'price',
                title: 'Item Price'
            }],
            data: [{
                id: 1,
                name: 'Item 1',
                price: '$1'
            }, {
                id: 2,
                name: 'Item 2',
                price: '$2'
            }]
        });
    </script>
@endsection