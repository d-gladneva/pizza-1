<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);

        return view('categories.index', compact('categories'));
    }

    /**
     * Return a JSON listing of the resource.
     *
     * @return JsonResponse
     */
    public function indexAPI(): JsonResponse
    {
        $categories = Category::orderBy('position')->orderBy('id')->get();

        $toJson = [
            "head" => [ 'total' => 4 ],
            "list" => $categories,
        ];

        return response()->json($toJson, 200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = Category::create($request->validated());

        if ($category->exists) {
            session()->flash('flash.banner', __('Category was create successfully!'));
            session()->flash('flash.bannerStyle', 'success');
        }
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest  $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        if ($category->update($request->validated()) == 1) {
            session()->flash('flash.banner', __('Category was update successfully!'));
            session()->flash('flash.bannerStyle', 'success');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category->delete()) {
            session()->flash('flash.banner', __('Category was delete successfully!'));
            session()->flash('flash.bannerStyle', 'success');
        }

        return redirect()->route('categories.index');
    }
}
