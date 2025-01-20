@foreach($prognoza as $grad)
<p>Trenutno je {{$grad->temperature}} stepena u gradu {{$grad->city}}</p>

@endforeach
