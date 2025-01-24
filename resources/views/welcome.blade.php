@extends("layouts.layout")

@section("content")

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">

            <div class="mb-4">
                <i class="fas fa-search fa-3x text-primary"></i>
            </div>

            <form method="GET" action="{{ route('forecast.search') }}" class="w-100" style="max-width: 400px;">

                @if(\Illuminate\Support\Facades\Session::has("error"))
                    <p class="text-danger fw-bold">
                        {{ \Illuminate\Support\Facades\Session::get("error") }}
                    </p>
                @endif
                <div class="mb-3">
                    <input type="text" name="city" class="form-control form-control-lg" placeholder="Unesite ime grada">
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">Pronađi</button>
            </form>
        </div>
    </div>

@endsection
