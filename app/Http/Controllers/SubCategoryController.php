<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoryType;

use App\Models\SubCategory;

class SubCategoryController extends Controller {
    
    public function index() {

        $subcategories = SubCategory::paginate(10);

        return view('subcategories.index')
            ->with('subcategories', $subcategories);

    }

    public function create() {

        $categorytypes = CategoryType::all();
        $subcategories = SubCategory::all();

        return view('subcategories.create')
            ->with('categorytypes', $categorytypes)
            ->with('subcategories', $subcategories);

    }

    public function save(Request $request) {

        $subcat = new SubCategory;

        $subcat->type_id = $request->type_id;
        $subcat->parent_id = $request->parent_id;
        $subcat->name = $request->name;
        $subcat->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));;

        $subcat->save();

        return redirect()->back()->with('info', 'Sub Category Created Successfully.');

    }

    public function edit($id) {

        $categorytypes = CategoryType::all();
        $subcategories = SubCategory::all();

        return view('subcategories.edit')
            ->with('categorytypes', $categorytypes)
            ->with('subcategories', $subcategories);

    }

    public function delete($id) {

        $delete = SubCategory::find($id);

        $delete->delete();

        return redirect()->back()->with('info', 'Sub Category Removed Successfully.');

    }

}
