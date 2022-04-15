<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Education;

class EducationsController extends Controller
{
    public function list()
    {
        return view('educations.list', [
            'educations' => Education::all()
        ]);
    }

    public function addForm()
    {
        return view('educations.add', [
            'educations' => Education::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'college_name' => 'required',
            'major' => 'nullable',
            'GPA' => 'nullable',
            'start_year' => 'nullable',
            'end_year' => 'nullable',
        ]);

        $education = new Education();
        $education->college_name = $attributes['college_name'];
        $education->major = $attributes['major'];
        $education->GPA = $attributes['GPA'];
        $education->start_year = $attributes['start_year'];
        $education->end_year = $attributes['end_year'];

        $education->save();

        return redirect('/console/educations/list')
            ->with('message', 'Education has been added!');
    }

    public function editForm(Education $education)
    {
        return view('educations.edit', [
            'education' => $education,
        ]);
    }

    public function edit(Education $education)
    {

        $attributes = request()->validate([
            'college_name' => 'required',
            'major' => 'nullable',
            'GPA' => 'nullable',
            'start_year' => 'nullable',
            'end_year' => 'nullable',
        ]);

        $education->college_name = $attributes['college_name'];
        $education->major = $attributes['major'];
        $education->GPA = $attributes['GPA'];
        $education->start_year = $attributes['start_year'];
        $education->end_year = $attributes['end_year'];
        $education->save();

        return redirect('/console/educations/list')
            ->with('message', 'Education has been edited!');
    }

    public function delete(Education $education)
    {
        $education->delete();
        
        return redirect('/console/educations/list')
            ->with('message', 'Education has been deleted!');        
    }

}
