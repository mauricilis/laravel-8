<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSurvey;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    public function index()
    {

        $surveys = Survey::orderBy('id', 'DESC')->paginate();
        $surveys = Survey::latest()->paginate();

        return view('admin.surveys.index', compact('surveys'));
    }

    public function create()
    {
        return view('admin.surveys.create');
    }

    public function store(StoreUpdateSurvey $request)
    {
        $data = $request->all();

        if ($request->image->isValid()) {

            $nameFile = Str::of($request->name)->slug('-') . '_' . date('Ymdhis') . '.' . $request->image->getClientOriginalExtension();

            $file = $request->image->storeAs('survays', $nameFile);
            $data['image'] = $file;
        }

        $survey = Survey::create($data);

        return redirect()->route('surveys.index')->with('message', 'Survey has created successfully');;
    }

    public function show($id)
    {
        if (!$survey = Survey::find($id))
            return redirect()->route('surveys.index');

        return view('admin.surveys.show', compact('survey'));
    }


    public function destroy($id)
    {
        if (!$survey = Survey::find($id))
            return redirect()->route('surveys.index');

        if (Storage::exists($survey->image))
            Storage::delete($survey->image);

        $survey->delete();

        return redirect()->route('surveys.index')->with('message', 'Survey has deleted successfully');
    }

    public function edit($id)
    {
        if (!$survey = Survey::find($id))
            return redirect()->route('surveys.index');

        return view('admin.surveys.edit', compact('survey'));
    }

    public function update(StoreUpdateSurvey $request, $id)
    {
        if (!$survey = Survey::find($id))
            return redirect()->route('surveys.index');

        $data = $request->all();

        
        if ($request->image && $request->image->isValid()) {

            if (Storage::exists($survey->image))
                Storage::delete($survey->image);

            $nameFile = Str::of($request->name)->slug('-') . '_' . date('Ymdhis') . '.' . $request->image->getClientOriginalExtension();

            $file = $request->image->storeAs('survays', $nameFile);
            $data['image'] = $file;
        }

        $survey->update($data);

        return redirect()->route('surveys.index')->with('message', 'Survey has updated successfully');
    }

    public function search(Request $request)
    {
        $filters = $request->except("_token");

        $surveys = Survey::where('name', 'LIKE', "%{$request->search}%")->orWhere('description', 'LIKE', "%{$request->search}%")->paginate(1);

        return view('admin.surveys.index', compact('surveys', 'filters'));
    }
}
