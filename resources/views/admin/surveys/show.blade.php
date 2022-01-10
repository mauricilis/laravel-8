<h1>Detalhes de " {{ $survey->name }}"</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Description</h2>
<p>{{ $survey->description }}</p>
<a href="{{ route('surveys.edit', $survey->id) }}">Edit</a>

<form action="{{ route('surveys.destroy', $survey->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Remove</button>
</form>
