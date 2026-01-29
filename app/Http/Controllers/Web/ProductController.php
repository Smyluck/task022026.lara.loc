<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the products with optional category filter.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {

        try {
            $title = ($request->route()->getName() != 'admin.products.index') ? 'Список товаров' : 'Управление товарами';

            $request->validate([
                'category' => 'nullable|exists:categories,id',
            ]);

            $products = Product::with('category')
                ->when($request->input('category'), function ($query, $categoryId) {
                    $query->where('category_id', $categoryId);
                })
                ->paginate(10)
                ->withQueryString();

            if ($products->isEmpty()) {
                return Inertia::render('Products/Index', [
                    'title' => 'Список товаров',
                    'filters' => $request->only(['category']),
                ])->with('flash', [
                    'warning' => 'Товары не найдены.',
                ]);
            }

            return Inertia::render('Products/Index', [
                'title' => $title,
                'products' => $products,
                'filters' => $request->only(['category']),
            ])->with('flash', [
                'success' => session('success'),
                'warning' => session('warning'),
                'error' => session('error'),
            ]
            );

        } catch (Exception $e) {

            $title = ($request->route()->getName() != 'admin.products.index') ? 'Список товаров' : 'Управление товарами';

            return Inertia::render('Products/Index', [
                'title' => $title,
                'error' => [
                    'message' => 'Ошибка сервера',
                    'details' => config('app.debug') ? $e->getMessage() : null,
                ],
            ])->with('flash', [
                'error' => 'Ошибка сервера: '.$e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified product
     *
     * @return \Inertia\Response
     */
    public function show(Product $product)
    {
        return Inertia::render('Products/Show', ['product' => $product->load('category')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Products/Edit', ['title' => 'Создание товара']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', ['product' => $product, 'title' => 'Редактирование товара '.$product->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return back()
                ->with('success', 'Товар '.$product->id.' успешно удалён!');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Ошибка при удалении товара: '.$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $validated = $request->validated();
            $product->update($validated);

            return Redirect::route('admin.products.index')
                ->with('success', 'Товар '.$product->id.' обновлен');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $validated = $request->validated();
            $product = Product::create($validated);

            return Redirect::route('admin.products.index')
                ->with('success', 'Товар '.$product->id.' создан');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
