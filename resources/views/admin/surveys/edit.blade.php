@extends('admin.layouts.app')
@section('title','Edit Survey')
    
@section('content')
<h1>Edit Survey: {{ $survey->name }}</h1>

<form action="{{ route('surveys.update', $survey->id) }}" method="post" enctype="multipart/form-data">
    @method("PUT")
    @include('admin.surveys._partials.form')
</form>

@endsection
