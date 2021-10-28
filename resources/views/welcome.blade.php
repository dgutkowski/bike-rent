@extends('layouts.app')

@section('content')

<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <figure class="text-center bg-dark rounded p-3">
                <blockquote class="blockquote text-light">
                    <p>[...] opłaci się żyć tylko tak długo, póki życie sprawia przyjemność.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Oscar Wilde, <cite title="Teleny">Teleny</cite>
                </figcaption>
            </figure>
        </div>
    </div>
</div>-->

<div class="container d-flexbox">
    <div class="row justify-content-center welcome">
        <div class="col-8 text-center align-self-center">
            <h1>Zacznij przygodę już dziś razem z Nami!</h1>
            <p>
                Z każdym dniem staramy się aby nasza wypożyczalnia umiliła Ci Twój czas na świeżym powietrzu. Wybór w naszej ofercie pozwola na swobodny wybór między komfortem, a przyjemnością. Nie musisz się jednak martwić, ponieważ dla prawdziwych konserów przygotowaliśmy również coś specjalnego!
                Zapoznaj się z naszą ofertą.
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Nasza oferta</h1>
            <div class="row mt-3">
    
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
            <div class="d-flex justify-content-center align-items-center mt-auto">
                <div class="btn-group">
                    <span type="button" class="btn btn-outline-primary" onclick="location.href='{{ route('reserv.show', $bike->id) }}'">{{ $bike->cost }} zł/dzień</span>
                    <button type="button" class="btn btn bg-primary text-light" onclick="location.href='{{ route('reserv.show', $bike->id) }}'">Rezerwuj</button>
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

            </div>
        </div>
    </div>
</div>
@endsection