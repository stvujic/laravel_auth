<form method="POST" action="{{route("forecasts.create")}}">
    {{csrf_field()}}
    <select name="city_id">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>

    <input type="text" name="temperature" placeholder="Unesite temperaturu">

    <select name="weather_type">
        @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
            <option>{{$weather}}</option>
        @endforeach
    </select>

    <input type="text" name="probability" placeholder="Unesite verovatnocu padavina">
    <input type="date" name="forecast_date">
    <button>Snimi</button>
</form>

@foreach(\App\Models\CitiesModel::all() as $city)
    <p>{{$city -> name}}</p>
    <ul>
        @foreach($city->forecasts as $forecast)
            <li>{{$forecast->forecast_date}} - {{$forecast->temperature}}</li>
        @endforeach
    </ul>
@endforeach
