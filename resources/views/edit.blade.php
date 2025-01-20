@extends("layout")

@section("naslovStranice")
    Edit Cities page
@endsection

@section("sadrzajStranice")

    <form method="POST" action="/admin/cities/{{$city->id}}/save">
        {{csrf_field()}}
        <input value="{{$city->city}}" name="city" type="text" placeholder="Unesite ime grada">
        <input value="{{$city->temperature}}" name="temperature" type="number" placeholder="Unesite temperaturu">
        <button>Update</button>
    </form>

@endsection





