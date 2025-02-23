<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Suppliers::get();
        return view('suppliers.index', compact('suppliers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'required',
            'contact'           => 'required',
            'email'              => 'required|unique:suppliers',
            'address'              => 'required',
        ],[

            'tin.required'     => 'Suppliers Name Required',
            'name.required'     => 'Suppliers Name Required',
            'contact.required'     => 'Suppliers Contact Required',
            'email.required'     => 'Suppliers Email Required',
            'address.required'     => 'Suppliers Address Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        Suppliers::create([
            'tin'     => $request->input('tin'),
            'name'     => $request->input('name'),
            'contact'     => $request->input('contact'),
            'email'     => $request->input('email'),
            'address'     => $request->input('address'),
        ]);

        Session::flash('message', 'Suppliers Created Successfully');
        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $suppliers = Suppliers::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'contact' => 'required',
            'email'   => 'required|email|unique:suppliers,email,' . $suppliers->id,
            'address' => 'required',
        ], [
            'name.required'    => 'Suppliers Name Required',
            'contact.required' => 'Suppliers Contact Required',
            'email.required'   => 'Suppliers Email Required',
            'email.email'      => 'Invalid Email Format',
            'email.unique'     => 'Email already exists',
            'address.required' => 'Suppliers Address Required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $suppliers->update([
            'tin'     => $request->input('tin'),
            'name'     => $request->input('name'),
            'contact'     => $request->input('contact'),
            'email'     => $request->input('email'),
            'address'     => $request->input('address'),
        ]);

        Session::flash('message', 'Suppliers Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
    }
}
