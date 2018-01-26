<?php

namespace App\Http\Controllers\Variations;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Controller;
use App\Models\VariationAttribute;
use App\Models\VariationOption;
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

    public function createOption(Request $request) {
        $attributes = VariationAttribute::select('id', 'title')->orderBy('title')->get();

        return view('variations/createOption', ['user' => Auth::user(), 'attributes' => $attributes]);
    }

    public function deleteAttribute(Request $request, $id) {
        VariationAttribute::where('id', $id)->delete();

        return redirect('variations/attributes')->with('success', 'Variation attribute deleted successfully');
    }
    
    public function deleteOption(Request $request, $id) {
        VariationOption::where('id', $id)->delete();

        return redirect('variations/options')->with('success', 'Variation option deleted successfully');
    }

    public function editAttribute(Request $request, $id) {
        $fetchedAttribute = VariationAttribute::where('id', $id)->first();

        return view('variations/editAttribute', ['user' => Auth::user(), 'fetchedAttribute' => $fetchedAttribute]);
    }

    public function editOption(Request $request, $id) {
        $data = [
            'user' => Auth::user(),
            'fetchedOption' => VariationOption::where('id', $id)->first(),
            'attributes' => VariationAttribute::select('id', 'title')->get()
        ];

        return view('variations/editOption', $data);
    }

    public function showAttributes() {
        $attributes = VariationAttribute::select('id', 'title')->get();

        return view('variations/attributes', ['user' => Auth::user(), 'attributes' => $attributes]);
    }

    public function showOptions() {
        $options = VariationOption::with('attribute')->select('id', 'variation_attribute_id', 'title', 'swatch')->get();
        return view('variations/options', ['user' => Auth::user(), 'options' => $options]);
    }

    public function submitAttribute(Request $request) {
        $this->_validateAttribute($request);

        $attribute = new VariationAttribute();
        $attribute->title = $request->get('title');
        $attribute->save();

        return redirect('variations/attributes')->with('success', 'Variation attribute created successfully');
    }

    public function submitOption(Request $request) {
        $this->_validateOption($request);

        $option = new VariationOption();
        $option->variation_attribute_id = $request->get('parent_attribute');
        $option->title = $request->get('title');
        $option->swatch = $request->get('swatch');
        $option->save();

        return redirect('variations/options')->with('success', 'Variation option created successfully');
    }

    public function updateAttribute(Request $request, $id) {
        $this->_validateAttribute($request);
        
        $attribute = VariationAttribute::where('id', $id)->first();
        $attribute->title = $request->get('title');
        $attribute->save();

        return redirect('variations/attributes')->with('success', 'Variation attribute updated successfully');
    }

    public function updateOption(Request $request, $id) {
        $this->_validateOption($request);
        
        $option = VariationOption::where('id', $id)->first();
        $option->variation_attribute_id = $request->get('parent_attribute');
        $option->title = $request->get('title');
        $option->swatch = $request->get('swatch');
        $option->save();

        return redirect('variations/options')->with('success', 'Variation option updated successfully');
    }

    private function _validateAttribute($request) {
        $request->validate([
            'title' => 'required|string'
        ]);
    }
    
    private function _validateOption($request) {
        $request->validate([
            'parent_attribute' => 'required|integer',
            'title' => 'required|string',
            'swatch' => 'required|string'
        ]);
    }

}
