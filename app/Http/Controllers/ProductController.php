<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Return a JSON listing of the resource.
     *
     * @return JsonResponse
     */
    public function indexAPI(): JsonResponse
    {
        $products = Product::orderBy('position')->with('category')->orderBy('id')->get();

        $toJson = [
            "head" => [ 'total' => 4 ],
            "list" => $products,
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
        $categories = Category::orderBy('position')->orderBy('id')->get();

        return view('products.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $product = Product::create($request->validated());

        if ($product->exists) {
            session()->flash('flash.banner', __('Product was create successfully!'));
            session()->flash('flash.bannerStyle', 'success');
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        $categories = Category::orderBy('position')->orderBy('id')->get();

        return view('products.edit', compact('product'))->with(compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        if ($product->update($request->validated()) == 1) {
            session()->flash('flash.banner', __('Product was update successfully!'));
            session()->flash('flash.bannerStyle', 'success');
        }

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        if($product->delete()) {
            session()->flash('flash.banner', __('Product was delete successfully!'));
            session()->flash('flash.bannerStyle', 'success');
        }

        return redirect()->route('products.index');
    }
}
