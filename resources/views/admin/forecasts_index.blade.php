@extends("admin.layout")

@section("content")
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Kreiranje novog forecasta</h1>


        <form method="POST" action="{{ route('forecasts.create') }}" class="mb-5">
            {{ csrf_field() }}
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="city_id" class="form-label">Izaberite grad</label>
                    <select name="city_id" id="city_id" class="form-select">
                        @foreach(\App\Models\CitiesModel::all() as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="temperature" class="form-label">Temperatura</label>
                    <input type="text" name="temperature" id="temperature" class="form-control" placeholder="Unesite temperaturu">
                </div>
                <div class="col-md-4">
                    <label for="weather_type" class="form-label">Tip vremena</label>
                    <select name="weather_type" id="weather_type" class="form-select">
                        @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
                            <option>{{ $weather }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="probability" class="form-label">Verovatnoća padavina</label>
                    <input type="text" name="probability" id="probability" class="form-control" placeholder="Unesite verovatnoću padavina">
                </div>
                <div class="col-md-6">
                    <label for="forecast_date" class="form-label">Datum prognoze</label>
                    <input type="date" name="forecast_date" id="forecast_date" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Snimi</button>
        </form>


        <h2 class="mb-4">Pregled gradova i prognoza</h2>

        <div class="row">
            @foreach(\App\Models\CitiesModel::all() as $city)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">{{ $city->name }}</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Datum</th>
                                    <th>Temperatura</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($city->forecasts as $forecast)
                                    @php
                                        $boja = \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
                                        $ikonica = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type);
                                    @endphp
                                    <tr>
                                        <td>{{ $forecast->forecast_date }}</td>
                                        <td style="color:{{ $boja }};">
                                            <i class="fa-solid {{ $ikonica }}"></i> {{ $forecast->temperature }}°C
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


