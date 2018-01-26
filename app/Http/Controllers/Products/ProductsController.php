<?php

namespace App\Http\Controllers\Products;

use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\VariationAttribute;

class ProductsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function createProduct(Request $request) {
        $data = [
            'user' => Auth::user(),
            'variation_attributes' => VariationAttribute::with('options')->get()
        ];
        return view('products/createProduct', $data);
    }

    public function editProduct($id) {
        $fetchedProduct = Product::where('id', $id)->first();

        return view('products/editProduct', ['user' => Auth::user(), 'fetchedProduct' => $fetchedProduct]);
    }

    public function showProducts() {
        $products = Product::select('id', 'title')->get();

        return view('products/products', ['user' => Auth::user(), 'products' => $products]);
    }

    public function submitProduct(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required',
        ]);

        $product = new Product();
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->save();

        return redirect('products')->with('success', 'Product created successfully');
    }

    public function updateProduct(Request $request, $id) {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required',
        ]);

        $product = Product::where('id', $id)->first();

        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->save();

        // Refetch the product to get the updated data
        $fetchedProduct = Product::where('id', $id)->first();

        return view('products/editProduct', ['user' => Auth::user(), 'fetchedProduct' => $fetchedProduct]);
    }

}
