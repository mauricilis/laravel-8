@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf
<input type="text" name="name" id="name" placeholder="Name" value="{{ $survey->name ?? old('name') }}" />
<input type="file" name="image" id="image" />
<textarea name="description" id="description" cols="30" rows="4"
    placeholder="Description (Optional)">{{ $survey->description ?? old('description') }}</textarea>
<button type="submit">Save</button>
