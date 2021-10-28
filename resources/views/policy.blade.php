@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{ __('Privacy Policy') }}</h1>
            <h2>Rozdział I</h2>
            <ol>
                <li>Punkt 1</li>
                    <p>Opis tego punktu</p>
                <li>Punkt 2</li>
                    <p>Opis tego punktu</p>
                <li>Punkt 3</li>
                    <p>Opis tego punktu</p>
                <li>Punkt 4</li>
            </ol>
            <h2>Rozdział II</h2>
            <ol>
            <li>Punkt 1</li>
                <li>Punkt 2</li>
                <li>Punkt 3</li>
                <li>Punkt 4</li>
            </ol>
            <h2>Rozdział III</h2>
            <ol>
                <li>Punkt 1</li>
                    <p>Opis tego punktu</p>
                <li>Punkt 2</li>
                    <p>Opis tego punktu</p>
                <li>Punkt 3</li>
                    <p>Opis tego punktu</p>
                <li>Punkt 4</li>
            </ol>
        </div>
    </div>
</div>
@endsection