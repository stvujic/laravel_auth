@extends("layouts.layout")

@section("content")

    <div class="d-flex flex-column align-items-center vh-100">

        <h1 class="text-primary mb-4">Pronađeni Gradovi</h1>

        <div class="w-100" style="max-width: 600px;">
            @foreach($cities as $city)
                @php $icon=\App\Http\ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type) @endphp
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex align-items-center">

                        <i class="fas fa-city fa-2x text-primary me-3"></i>

                        <h5 class="mb-0 flex-grow-1">
                            <a href="{{ route('forecast.permalink', ['city' => $city->name]) }}" class="text-primary text-decoration-none">
                                {{ $city->name }}
                            </a>
                        </h5>

                        <i class="fa-solid {{ $icon }} fa-2x text-primary ms-auto"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
