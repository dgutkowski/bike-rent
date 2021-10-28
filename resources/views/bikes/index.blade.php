@extends('layouts.app')
@section('subtitle',' - Tabela rowerów')
@section('content')
<div class="container">
    @if(session('status'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-6"><h1>Rowery</h1></div>
        <div class="col-6"><a class="float-right" href="{{ route('bikes.create') }}"><button class="btn btn-primary">Dodaj</button></a></div>
    </div>
    
    <div class="row">
        <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa</th>
            <th scope="col" class="w-50">Opis</th>
            <th scope="col">Kategoria</th>
            <th scope="col" class="text-center">Cena</th>
            <th scope="col" class="text-center">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bikes as $bike)
        <tr>
            <th scope="row">{{ $bike->id }}</th>
            <td>{{ $bike->name }}</td>
            <td>{{ $bike->description }}</td>
            <td>@if(!is_null($bike->category)){{ $bike->category->name }}@endif</td>
            <td class="text-center">{{ $bike->cost }}</td>
            <td class="text-center">
                <a href="{{ route('bikes.show', $bike->id) }}"><button class="btn btn-primary btn-sm rounded">P</button></a>
                <a href="{{ route('bikes.edit', $bike->id) }}"><button class="btn btn-primary btn-sm rounded">E</button></a>
                <a href="#"><button data-id="{{ $bike->id }}" class="btn btn-danger btn-sm rounded delete">X</button></a>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    
    <div class="d-flex justify-content-center">
    {{ $bikes->onEachSide(2)->links() }}  
    </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
$(function()
{
    $('.delete').click(function(){
        $.ajax({
            method: "DELETE",
            url: "bikes/" + $(this).data("id"),
            // data: { id: $(this).data("id") }
        })
        .done(function( response ) {
            window.location.reload();
        })
        .fail(function( response ) {
            alert("Fail")
        });
    });
});
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection