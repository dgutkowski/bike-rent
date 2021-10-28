@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Nasza oferta</h1>
            <div class="row mt-3">
    @if(1 == 2)
        @foreach($bikes as $bike)
        <div class="col-3 d-flex mb-3">
            <div class="card shadow-sm w-100">
                @if(!is_null($bike->image_path))
                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$bike->image_path) }}"/>
                @else
                    <img src="https://via.placeholder.com/240x240/ffffff/444444/.png?text=BlankImage" class="img-fluid img-thumbnail" alt="Card image cap">
                    <!--<img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$bike->image_path) }}"/>-->
                @endif
            <div class="card-body d-flex flex-column">
                <h5>{{ $bike->name }}</h5>
                <p class="card-text" >{{ $bike->description }}</p>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <div class="btn-group">
                        <span type="button" class="btn bg-primary text-light">{{ $bike->cost }} zł/dzień</span>
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='bikes/{{ $bike->id }}'">Rezerwuj</button>
                    </div>
                    <small class="text-muted"></small>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        
        <div class="d-flex justify-content-center">
        {{ $bikes->onEachSide(2)->links() }}  
        </div>
    @else
        <h2>Brak ofert w tej chwili</h2>
    @endif
            </div>
        </div>
    </div>
</div>
@endsection