@extends("layouts.layout")

@section("content")

    <div class="d-flex flex-column align-items-center vh-100">
        <h1 class="text-primary mb-4">Pronađeni Gradovi</h1>

        <div class="w-100" style="max-width: 600px;">

            @if(\Illuminate\Support\Facades\Session::has('error'))
                <p class="text-danger fw-bold">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
                <a class="btn btn-primary mb-3" href="/login">Ulogujte se</a>
            @endif

            @foreach($cities as $city)
                @php $icon=\App\Http\ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type) @endphp
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-city fa-2x text-primary me-3"></i>

                        <div class="d-flex align-items-center flex-grow-1">
                            <h5 class="mb-0">
                                <a href="{{ route('forecast.permalink', ['city' => $city->name]) }}" class="text-primary text-decoration-none">
                                    {{ $city->name }}
                                </a>
                            </h5>
                            @if(in_array($city->id,$userFavourites))
                                <a href="{{route("city.unfavourite", ['city'=>$city->id])}}" class="btn btn-outline-danger btn-sm ms-2">
                                    <i class="fa-solid fa-heart"></i></i>
                                </a>
                            @else
                                <a href="{{route("city.favourite", ['city'=>$city->id])}}" class="btn btn-outline-danger btn-sm ms-2">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            @endif

                        </div>

                        <i class="fa-solid {{ $icon }} fa-2x text-primary ms-3"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
