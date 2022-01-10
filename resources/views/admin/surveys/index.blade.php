@extends('admin.layouts.app')
@section('title','Surveys List')
    
@section('content')
    <h1>Surveys</h1>
    <a href="{{ route('surveys.create') }}">New Survey</a>
    <br />

    @if (session('message'))
        <div>
            <ul>
                <li>{{ session('message') }}</li>
            </ul>
        </div>
    @endif

    <form action="{{ route('surveys.search') }}" method="post">
        @csrf
        <input type="text" name="search" id="search" placeholder="Search for..." />
        <button type="submit">Search</button>
    </form>

    <table class="table" width="100%" border="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thumb</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surveys as $survey)
                <tr>
                    <td>{{ $survey->id }}</td>
                    <td><img src="{{ url("storage/{$survey->image}") }}" alt="{{ $survey->name }}" width="100"></td>
                    <td>{{ $survey->name }}</td>
                    <td>{{ $survey->description }}</td>
                    <td><a href="{{ route('surveys.show', $survey->id) }}">SHOW</a></td>
                    <td><a href="{{ route('surveys.edit', $survey->id) }}">EDIT</a></td>
                    <td><a href="{{ route('surveys.destroy', $survey->id) }}">DELETE</a></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    @if (isset($filters))
                        {{ $surveys->appends($filters)->links() }}
                    @else
                        {{ $surveys->links() }}
                    @endif
                </td>
            </tr>
        </tfoot>
    </table>

@endsection
