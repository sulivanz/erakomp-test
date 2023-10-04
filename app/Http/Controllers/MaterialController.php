<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    //

    public function create()
    {
        $title = 'Material';
        $products = Product::query()->latest()->get();

        return view('materials.create', compact([
            'title', 'products'
        ]));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'time_required' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        Material::create($validator->validated());
        return redirect()->route('materials.create')->with('success', 'Data Added Successfully.');
    }
}
