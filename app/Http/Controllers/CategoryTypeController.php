<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\CategoryType;

class CategoryTypeController extends Controller {

    public function index() {

        $categorytypes = CategoryType::paginate(5);

        return view('categorytypes.index')
            ->with('categorytypes', $categorytypes);

    }

    public function create() {

        $categories = Category::all();

        return view('categorytypes.create')
            ->with('categories', $categories);

    }

    public function save(Request $request) {

        $type = new CategoryType;
        $type->category_id = $request->category_id;
        $type->name = $request->name;
        $type->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        $type->save();

        return redirect()->back()->with('info', 'Type Created Successfully!');;

    }

    public function edit($id) {

        $type = CategoryType::where('id', $id)->first();

        return view('categorytypes.edit')
            ->with('type', $type);

    }

    public function update(Request $request) {

        $type = CategoryType::find($request->type_id);
        $type->name = $request->name;
        $type->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        $type->save();

        return redirect()->back()->with('info', 'Type Updated Successfully!');;

    }

    public function delete($id) {

        $type = CategoryType::find($id);

        $type->delete();

        return redirect()->back()->with('error', 'Type Removed Successfully.');

    }

}
