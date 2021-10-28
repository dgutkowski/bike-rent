@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{ __('FAQ') }}</h1>
            @foreach($faqs as $faq)
                <div class="card mb-3">
                    <div class="card-header">{{ $faq->question }}</div>
                    <div class="card-body">
                        {{ $faq->answer }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection