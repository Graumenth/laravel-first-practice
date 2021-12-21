@extends('layouts.app')
    
@section('content')    
    @if(count($people))
    <ul>
        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach
    @endif
    </ul>
@stop

@section('footer')
@stop