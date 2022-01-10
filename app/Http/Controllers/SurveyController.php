<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSurvey;
use App\Models\Survey;
use Illuminate\Http\Request;

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

        $survey = Survey::create($request->all());

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

        $survey->update($request->all());

        return redirect()->route('surveys.index')->with('message', 'Survey has updated successfully');
    }

    public function search(Request $request)
    {
        $filters = $request->except("_token");

        $surveys = Survey::where('name', 'LIKE', "%{$request->search}%")->orWhere('description', 'LIKE', "%{$request->search}%")->paginate(1);

        return view('admin.surveys.index', compact('surveys','filters'));
    }
}
