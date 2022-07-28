<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use Image;

class CategoryController extends Controller {
    
    public function index() {

        $categories = Category::paginate(10);

        return view('categories.index')
            ->with('categories', $categories);

    }

    public function create() {

        return view('categories.create');

    }

    public function store(Request $request) {

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg',

        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        $avatar = $request->file('image');
        $filename = time() . '.' . $avatar->GetClientOriginalExtension();

        $avatar_img = Image::make($avatar);
        $avatar_img->resize(497,373)->save(public_path('images/categories/' . $filename));

        $category->image = asset("images/categories/" . $filename);

        $category->save();

        return redirect()->back()->with('info', 'Category Created Successfully!');;

    }

    public function edit($id) {

        $category = Category::where('id', $id)->first();

        return view('categories.edit')
            ->with('category', $category);

    }

    public function update(Request $request) {

        $category = Category::find($request->id);

        // validation
        if (isset($request->image)) {
                
            request()->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            ]);

            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->GetClientOriginalExtension();

            $avatar_img = Image::make($avatar);
            $avatar_img->resize(497,373)->save(public_path('images/categories/' . $filename));

            $category->image = asset("images/categories/" . $filename);



        }

        $category->name = $request->name;
        $category->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        $category->save();

        return redirect()->back()->with('info', 'Category Updated Successfully!');

    }

    public function destroy($id) {

        $category = Category::find($id);

        $category->delete();

        return redirect()->back()->with('info', 'Category Removed Successfully.');

    }

}
