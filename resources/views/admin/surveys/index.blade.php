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

<form action="{{route('surveys.search')}}" method="post">
    @csrf
    <input type="text" name="search" id="search" placeholder="Search for..." />
    <button type="submit">Search</button>
</form>

<table class="table" width="100%" border="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($surveys as $survey)
            <tr>
                <th>{{ $survey->id }}</th>
                <th>{{ $survey->name }}</th>
                <th>{{ $survey->description }}</th>
                <th><a href="{{ route('surveys.show', $survey->id) }}">SHOW</a></th>
                <th><a href="{{ route('surveys.edit', $survey->id) }}">EDIT</a></th>
                <th><a href="{{ route('surveys.destroy', $survey->id) }}">DELETE</a></th>
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
