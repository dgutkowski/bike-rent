@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('Signed in as').": ". Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection