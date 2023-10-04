<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Product;
use App\Models\ProductMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductMaterialController extends Controller
{
    //

    public function create()
    {
        $title = 'Produk Material';
        $products = Product::query()->latest()->get();
        $materials = Material::query()->latest()->get();

        return view('products.materials.create', compact([
            'title', 'materials', 'products'
        ]));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric',
            'material_id' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->route('product.materials')
                ->withErrors($validator)
                ->withInput();
        }

        ProductMaterial::create($validator->validated());
        return redirect()->route('product.materials')->with('success', 'Data Added Successfully.');
    }

    public function plan()
    {
        $title = 'Produk Plan';

        return view('products.plan', compact([
            'title'
        ]));
    }

    public function calculatePlan(Request $request)
    {
        $data = ProductMaterial::with(['product', 'material'])->get();
        $productAmount = $request->data;
        $result = [];
        $productionTime = 0;
        $index = 0;
        foreach ($data as $key => $value) {
            $index += 1;
            $result[$key]['index'] = $index;
            $result[$key]['product_name'] = $value->product->name;
            $result[$key]['material_name'] = $value->material->name;
            $result[$key]['material_required'] = $value->qty * $productAmount;
            $productionTime += ($value->qty * $productAmount) * $value->material->time_required;
            $result[$key]['time_required'] = ($value->qty * $productAmount) * $value->material->time_required;
            $result[$key]['cogs'] = $value->material->price;
        }
        return response()->json([
            'success' => true,
            'data' => $result,
            'production_time' => $productionTime
        ]);
    }
}
