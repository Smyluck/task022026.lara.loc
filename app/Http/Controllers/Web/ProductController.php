<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

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

            $request->validate([
                'category' => 'nullable|exists:categories,id',
            ]);

            $categories = Category::select('id', 'name')->get();

            $products = Product::with('category')
                ->when($request->input('category'), function ($query, $categoryId) {
                    $query->where('category_id', $categoryId);
                })
                ->paginate(10)
                ->withQueryString();

            if ($products->isEmpty()) {
                return Inertia::render('Welcome', [
                    'title' => 'Список товаров',
                    'categories' => $categories,
                    'filters' => $request->only(['category']),
                ])->with('flash', [
                    'warning' => 'Товары не найдены.',
                ]);
            }

            return Inertia::render('Welcome', [
                'title' => 'Список товаров',
                'products' => $products,
                'categories' => $categories,
                'filters' => $request->only(['category']),
            ]);
        } catch (Exception $e) {

            return Inertia::render('Welcome', [
                'title' => 'Список товаров',
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
}
