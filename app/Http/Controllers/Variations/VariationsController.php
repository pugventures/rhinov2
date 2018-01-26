<?php

namespace App\Http\Controllers\Variations;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Controller;
use App\Models\VariationAttribute;
use Illuminate\Support\Facades\Auth;

class VariationsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function createAttribute(Request $request) {
        return view('variations/createAttribute', ['user' => Auth::user()]);
    }

    public function deleteAttribute(Request $request, $id) {
        VariationAttribute::where('id', $id)->delete();

        return redirect('variations/attributes')->with('success', 'Variation attribute deleted successfully');
    }
    
    public function editAttribute(Request $request, $id) {
        $fetchedAttribute = VariationAttribute::where('id', $id)->first();

        return view('variations/editAttribute', ['user' => Auth::user(), 'fetchedAttribute' => $fetchedAttribute]);
    }

    public function showAttributes() {
        $attributes = VariationAttribute::select('id', 'title')->get();

        return view('variations/attributes', ['user' => Auth::user(), 'attributes' => $attributes]);
    }

    public function submitAttribute(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string'
        ]);

        $attribute = new VariationAttribute();
        $attribute->title = $request->get('title');
        $attribute->save();

        return redirect('variations/attributes')->with('success', 'Variation attribute created successfully');
    }

    public function updateAttribute(Request $request, $id) {
        $attribute = VariationAttribute::where('id', $id)->first();
        
        // TODO: Add validation
        $attribute->title = $request->get('title');
        $attribute->save();

        // Refetch the attribute to get the updated data
        $fetchedAttribute = VariationAttribute::where('id', $id)->first();

        return redirect('variations/attributes')->with('success', 'Variation attribute updated successfully');
    }

}
