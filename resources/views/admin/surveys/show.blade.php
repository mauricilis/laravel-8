@extends('admin.layouts.app')
@section('title','Survey Detalais')
    
@section('content')
<h1>Detalhes de " {{ $survey->name }}"</h1>

<h2>Description</h2>
<p>{{ $survey->description }}</p>
<a href="{{ route('surveys.edit', $survey->id) }}">Edit</a>

<form action="{{ route('surveys.destroy', $survey->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Remove</button>
</form>
@endsection