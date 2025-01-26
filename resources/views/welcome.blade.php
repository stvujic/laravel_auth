@extends("layouts.layout")

@section("content")
    <!-- Prikaz omiljenih gradova -->
    <div class="container my-4">
        <h2 class="text-primary text-center mb-4">Omiljeni Gradovi</h2>
        @if($userFavourites->isEmpty())
            <p class="text-center text-muted">Nemate omiljenih gradova trenutno.</p>
        @else
            <ul class="list-group">
                @foreach($userFavourites as $userFavourite)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fas fa-city me-2 text-primary"></i>
                            {{ $userFavourite->city->name }}
                        </span>
                        <span class="badge bg-primary rounded-pill">
                            {{ $userFavourite->city->todaysForecast->temperature }}°C
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Sekcija za pretragu -->
    <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
        <div class="text-center">
            <!-- Ikonica za pretragu -->
            <div class="mb-4">
                <i class="fas fa-search fa-3x text-primary"></i>
            </div>

            <!-- Forma za pretragu -->
            <form method="GET" action="{{ route('forecast.search') }}" class="w-100" style="max-width: 400px;">
                @if(Session::has("error"))
                    <p class="text-danger fw-bold">
                        {{ Session::get("error") }}
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
