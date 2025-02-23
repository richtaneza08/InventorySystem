<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::get();
        $categories = Categories::pluck('name', 'id');
        return view('products.index', compact('products', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'image'                      => 'nullable|mimes:png,jpg,jpeg,webp',
            'name'                      => 'required',
            'categories_id'              => 'required',
        ],[
            'name.required'             => 'Product Name Required',
            'categories_id.required'     => 'Please Select Category',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/products', $filename);
        }

        Products::create([
            'image'             => $filename,
            'name'              => $request->input('name'),
            'categories_id'     => $request->input('categories_id'),
        ]);

        Session::flash('message', 'Product Created Successfully');
        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $products = Products::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'image'                      => 'nullable|mimes:png,jpg,jpeg,webp',
            'name'                      => 'required',
            'categories_id'              => 'required',
        ],[
            'name.required'             => 'Product Name Required',
            'categories_id.required'     => 'Please Select Category',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $filename = $products->image;

        if ($request->hasFile('image')) {
            // Delete the old file if it exists
            $oldFilePath = public_path('assets/products/' . $products->image);
            if (file_exists($oldFilePath) && $products->image) {
                unlink($oldFilePath);
            }

            // Store the new file
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/products'), $filename);
        }

        $products->update([
            'image'             => $filename,
            'name'              => $request->input('name'),
            'categories_id'     => $request->input('categories_id'),
        ]);

        Session::flash('message', 'Product Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
    }
}
