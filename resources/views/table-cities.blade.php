@extends("layout")

@section("naslovStranice")
    Cities Table
@endsection

@section("sadrzajStranice")
    <div class="container mt-4">
        <h2 class="mb-4">Cities and Temperatures</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>City</th>
                <th>Temperature</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cities as $singleCity)
                <tr>
                    <td>{{ $singleCity->city }}</td>
                    <td>{{ $singleCity->temperature }}</td>
                    <td>
                        <a href="/admin/cities/{{$singleCity->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/admin/cities/{{$singleCity->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
