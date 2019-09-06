@extends('layouts.app')

@section('content')
	<datos-component
	 	:user="{{ auth()->user() }}"
	 	csrf-token="{{ csrf_token() }}"/>
@endsection
