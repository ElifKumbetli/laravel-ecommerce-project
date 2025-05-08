<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/products";
    }


    /**
     * Display a listing of the resource.

     */
    public function index(): View
    {
        $products = Product::all()->where('is_active', true);
        return view("backend.products.index", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view("backend.products.insert_form", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $product = new Product();
        $data = $this->prepare($request, $product->getFillable());
        $product->fill($data);
        $product->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $categories = Category::all();
        return view("backend.products.update_form", ["product" => $product, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $data = $this->prepare($request, $product->getFillable());
        $product->fill($data);
        $product->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json(["message" => "Done", "id" => $product->product_id]);
    }
}
