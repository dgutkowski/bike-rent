@extends('layouts.app')
@section('subtitle',' - Edycja')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit :resource')}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bikes.update', $bike->id) }}" class="row g-3" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label for="name" class="form-label">Nazwa </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $bike->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-12">
                            <label for="description" class="form-label">Opis</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="3" maxlenght="500" name="description" id="description" autofocus>{{ $bike->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-9">
                            <label for="features" class="form-label">Cechy</label>
                            <input type="text" class="form-control @error('features') is-invalid @enderror" name="features" id="features" value="{{ $bike->features }}" autocomplete="features">
                            @error('features')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-3">
                            <label for="cost" class="form-label">Dzienny koszt (pln)</label>
                            <input type="number" class="form-control @error('cost') is-invalid @enderror" step="0.5" min="0" name="cost" id="cost" value="{{ $bike->cost }}" required>
                            @error('cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="category_id" class="form-label">Kategoria</label>
                            <select class="form-select @error('bike_category') is-invalid @enderror" name="category_id" id="category_id">
                                <option value="">Brak kategorii</option>
                                @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    @if(!is_null($category->id) && ($category->id == $bike->category_id))
                                     selected
                                    @endif
                                >{{ $category->name }}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <!--
                        <div class="col-md-12">
                            <label for="image_path" class="form-label">Adres obrazka</label>
                            <input type="text" class="form-control @error('image_path') is-invalid @enderror" name="image_path" id="image_path" value="{{ $bike->image_path }}" autofocus>
                            @error('image_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        -->
                        <div class="col-md-12">
                            <label for="image" class="form-label">Wgraj obraz</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" alt="Zdjęcie roweru">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                Zapisz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
