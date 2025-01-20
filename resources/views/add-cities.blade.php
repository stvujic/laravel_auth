@extends("layout")

@section("naslovStranice")
    Add Cities page
@endsection

@section("sadrzajStranice")

    <form method="POST" action="/admin/send-city">
        {{csrf_field()}}
        <input name="city" type="text" placeholder="Unesite ime grada">
        <input name="temperature" type="number" placeholder="Unesite temperaturu">
        <button>Save</button>
    </form>

@endsection




