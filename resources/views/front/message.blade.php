@extends('layouts.front')

@section('content')
   <chat :messages="{{ $messages }}" :auth="{{ auth()->user() }}" :project="{{ $project }}"></chat>
@stop
