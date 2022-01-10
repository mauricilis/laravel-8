<h1>Create New Survey</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('surveys.store') }}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" />
    <textarea name="description" id="description" cols="30" rows="4"
        placeholder="Description (Optional)">{{ old('description') }}</textarea>
    <button type="submit">Save</button>
</form>
