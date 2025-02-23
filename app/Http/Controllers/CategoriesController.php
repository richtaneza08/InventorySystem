<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Categories::get();
        return view('categories.index', compact('categories'));
    }


    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'required',
        ],[

            'name.required'     => 'Category Name Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        Categories::create([
            'name'     => $request->input('name'),
        ]);

        Session::flash('message', 'Category Created Successfully');
        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $categories = Categories::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'              => 'required',
        ],[

            'name.required'     => 'Category Name Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $categories->update([
            'name'     => $request->input('name'),
        ]);

        Session::flash('message', 'Category Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
    }
}
