@extends('admin.layouts.app')
@section('title','New Survey')
    
@section('content')
<h1>Create New Survey</h1>

<form action="{{ route('surveys.store') }}" method="post" enctype="multipart/form-data">
    @include('admin.surveys._partials.form')
</form>

@endsection