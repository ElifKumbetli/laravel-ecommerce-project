<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;



class CategoryController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/categories";
    }


    /**
     * Display a listing of the resource.

     */
    public function index(): View
    {
        $categories = Category::all();
        return view("backend.categories.index", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("backend.categories.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = new Category();
        $data = $this->prepare($request, $category->getFillable());
        $category->fill($data);
        $category->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view("backend.categories.update_form", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $data = $this->prepare($request, $category->getFillable());
        $category->fill($data);
        $category->save();

        return Redirect::to($this->returnUrl);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();
        return response()->json(["message" => "Done", "id" => $category->category_id]);
    }
}
