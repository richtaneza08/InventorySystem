<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class UnitsController extends Controller
{
    public function index()
    {
        $units = Units::get();
        return view('units.index', compact('units'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'required',
        ],[

            'name.required'     => 'Unit Name Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        Units::create([
            'name'     => $request->input('name'),
        ]);

        Session::flash('message', 'Unit Created Successfully');
        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $units = Units::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'              => 'required',
        ],[

            'name.required'     => 'Unit Name Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $units->update([
            'name'     => $request->input('name'),
        ]);

        Session::flash('message', 'Unit Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
    }
}
