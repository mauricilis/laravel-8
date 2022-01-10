<h1>Edit Survey: {{ $survey->name }}</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('surveys.update', $survey->id) }}" method="post">
    @csrf
    @method("PUT")
    <input type="text" name="name" id="name" placeholder="Name" value="{{ $survey->name }}" />
    <textarea name="description" id="description" cols="30" rows="4"
        placeholder="Description (Optional)">{{ $survey->description }}</textarea>
    <button type="submit">Save</button>
</form>
