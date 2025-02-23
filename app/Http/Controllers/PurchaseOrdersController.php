<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class PurchaseOrdersController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function getProducts($categoryId)
    {
        $products = Products::where('categories_id', $categoryId)->pluck('name', 'id');
        return response()->json($products);
    }


    public function create()
    {
        $suppliers = Suppliers::pluck('name', 'id');
        $categories = Categories::pluck('name', 'id');
        $products = Products::pluck('name', 'id');
        return view('orders.create', compact('suppliers', 'categories', 'products'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
