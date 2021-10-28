@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Podgląd obiektu: rower</div>

                <div class="card-body">

                        <div class="col-md-12">
                            <label for="name" class="form-label">Nazwa </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $bike->name }}" disabled>
                        </div>
                        
                        <div class="col-md-12">
                            <label for="description" class="form-label">Opis</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="3" maxlenght="500" name="description" id="description" disabled>{{ $bike->description }}</textarea>
                        </div>
                        
                        <div class="col-md-9">
                            <label for="features" class="form-label">Cechy</label>
                            <input type="text" class="form-control @error('features') is-invalid @enderror" name="features" id="features" value="{{ $bike->features }}" disabled>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="cost" class="form-label">Dzienny koszt (pln)</label>
                            <input type="number" class="form-control @error('cost') is-invalid @enderror" step="0.5" min="0" name="cost" id="cost" value="{{ $bike->cost }}" disabled>
                        </div>

                        <div class="col-md-12">
                            <label for="image_url" class="form-label">Adres obrazka</label>
                            <input type="text" class="form-control @error('image_url') is-invalid @enderror" name="image_url" id="image_url" value="{{ $bike->image_url }}" disabled>
                        </div>
                        @if(!is_null($bike->image_path))
                        <div class="col-md-12 justify-content-center">
                            <img class="img-fluid" src="{{ asset('storage/'.$bike->image_path) }}">
                        </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
