@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Podgląd obiektu: rower</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{ $bike->name }}</h2>
                            <p>{{ $bike->description }}</p>
                            <p>Cechy: <span class='small text-primary'>{{ $bike->features }}</span></p>
                            <p><span class='badge bg-primary'>Cena za dzień: <span id="costValue">{{ $bike->cost }}</span> zł</span></p>
                        @if(!is_null($bike->image_path))
                            <div class="row">
                                <div class="col-md-12 justify-content-center">
                                    <img class="img-fluid" src="{{ asset('storage/'.$bike->image_path) }}">
                                </div>
                            </div>
                        @endif
                        </div>
                    </div>   
                    <form id="reserv" method="POST" action="{{ route('reserv.store') }}" class="row g-3">
                        <div class="col-md-12"><h2>Formularz</h2></div>
                        @if(!is_null(Auth::user()))
                        <div class="col-md-6">
                            <label for="name" class="form-label">Imię</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}"  disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="surname" class="form-label">Nazwisko</label>
                            <input type="text" name="surname" class="form-control" id="surname" value="{{ Auth::user()->surname }}"  disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Adres mail</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}"  disabled>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <label for="date_start" class="form-label">Data wypożyczenia</label>
                            <input type="date" class="form-control @error('date_start') is-invalid @enderror" onfocusout="checkData()" name="date_start" id="date_start" value="{{ old('date_start') }}"  required autocomplete="date_start">
                            @error('date_start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="date_return" class="form-label">Data zwrotu</label>
                            <input type="date" class="form-control @error('date_return') is-invalid @enderror" onfocusout="checkData()" name="date_return" id="date_return" value="{{ old('date_return') }}" required autocomplete="date_return">
                            @error('date_return')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            @csrf
                            <input type="hidden" name="bike_id" value="{{ $bike->id }}"/>
                            @if(!is_null(Auth::user()))<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>@endif
                            <button type="submit" class="btn btn-primary" onclick="">
                                Zarezerwuj
                            </button>
                        </div>
                        <div class="col-12">
                            <div id="costTotalField" class="invisible" role="alert">

                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')

const form = document.querySelector("form[id='reserv']");
var resStatus = false;

form.addEventListener("submit", e => {
    e.preventDefault();

    if(resStatus == true){
        e.target.submit();
    }
    else{
        document.getElementById('costTotalField').className = "alert alert-danger";
        document.getElementById("costTotalField").innerHTML = "Popraw dane w formularzu!";
    }
})

function checkData(){
    const msPerDay = 1000*3600*24;
    const dateStart = new Date(document.getElementById("date_start").value);
    const dateReturn = new Date(document.getElementById("date_return").value);
    let today = new Date();
    today = today.setHours(0,0,0,0);

    function writeResponse(style, msg = ""){
        document.getElementById('costTotalField').className = style;
        document.getElementById("costTotalField").innerHTML = msg;
    }

    if(!isNaN(dateStart) && !isNaN(dateReturn)){
        if(dateStart >= today){    
            if(dateStart <= dateReturn){
                let days = (dateReturn - dateStart)/msPerDay+1;
                let cost = (document.getElementById("costValue").innerHTML)*days;
                // add max days condition for reservation
                // set resMax = true to check the condition
                let resMaxDays = 10
                const resMaxCondition = true
                if(days <= resMaxDays || resMaxCondition === false){
                    writeResponse("alert alert-info", "Łączny koszt wypożyczenia wynosi: "+cost+" zł<br>Łączny czas rezerwacji to: "+days+" dni");
                    resStatus = true;
                }
                else{
                    writeResponse("alert alert-danger", "Długość wypożyczenia jest zbyt długa. Maksymalnie można wypożyczyć rower na "+resMaxDays+" dni.");
                    resStatus = false;
                }   
            }
            else{
                writeResponse("alert alert-danger", "Data zwrotu musi być późniejsza od daty wypożyczenia lub taka sama!");
                resStatus = false;
            }
        }
        else{
            writeResponse("alert alert-danger", "Data wypożyczenia musi zaczynać się najwcześniej dzisiejszego dnia!");
            resStatus = false;
        }
    }
    else{
        writeResponse("invisible");
        resStatus = false;
    }
}
@endsection