test <br>

@foreach($values as $value)
{{$value->id}}, {{$value->text}}, {{$value->created_at}} <br>
@endforeach