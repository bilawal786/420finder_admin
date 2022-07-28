<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Strain;

use App\Models\Genetic;

use App\Models\StrainPost;

use Image;

class PostsController extends Controller {
    
    public function strains() {

        $strains = Strain::all();

        return view('posts.strains.index')
            ->with('strains', $strains);

    }

    public function addstrain() {

        return view('posts.strains.create');

    }

    public function savestrain(Request $request) {

        $strain = new Strain;

        $strain->name = $request->name;

        $strain->save();

        return redirect()->back()->with('info', 'Strain Created Successfully.');

    }

    public function editstrain($id) {

        $strain = Strain::where('id', $id)->first();

        return view('posts.strains.edit')
            ->with('strain', $strain);

    }

    public function updatestrain(Request $request) {

        $strain = Strain::find($request->strain_id);

        $strain->name = $request->name;

        $strain->save();

        return redirect()->back()->with('info', 'Strain Updated Successfully.');

    }

    public function deletestrain($id) {

        $strain = Strain::find($id);

        $strain->delete();

        return redirect()->back()->with('info', 'Strain Removed Successfully.');

    }

    public function genetic() {

        $genetics = Genetic::all();

        return view('posts.genetics.index')
            ->with('genetics', $genetics);

    }

    public function creategenetic() {

        return view('posts.genetics.create');

    }

    public function savegenetic(Request $request) {

        $genetic = new Genetic;

        $genetic->name = $request->name;

        $genetic->save();

        return redirect()->back()->with('info', 'Genetic Created Successfully.');

    }

    public function editgenetic($id) {

        $genetic = Genetic::find($id);

        return view('posts.genetics.edit')
            ->with('genetic', $genetic);

    }

    public function updategenetic(Request $request) {

        $genetic = Genetic::find($request->genetic_id);

        $genetic->name = $request->name;

        $genetic->save();

        return redirect()->back()->with('info', 'Genetic Updated Successfully.');

    }

    public function deletegenetic($id) {

        $genetic = Genetic::find($id);

        $genetic->delete();

        return redirect()->back()->with('info', 'Genetic Removed Successfully.');

    }

    public function allposts() {

        $posts = StrainPost::all();

        return view('posts.index')
            ->with('posts', $posts);

    }

    public function createstrainpost() {

        $strains = Strain::all();

        $genetics = Genetic::all();

        return view('posts.create')
            ->with('strains', $strains)
            ->with('genetics', $genetics);

    }

    public function savestrainpost(Request $request) {

        $post = new StrainPost;

        $post->genetic_id = $request->genetic_id;

        $post->strain_id = $request->strain_id;


        $file = $request->file('image');
        $filename = time() . '.' . $file->GetClientOriginalExtension();
        $file_img = Image::make($file);
        $file_img->resize(320,140)->save(public_path('images/posts/' . $filename));
        $post->image = asset("images/posts/" . $filename);


        $post->description = $request->description;

        $post->save();

        return redirect()->back()->with('info', 'Post Created Successfully.');

    }

    public function editstrainpost($id) {

        $post = StrainPost::where('id', $id)->first();

        return view('posts.edit')
            ->with('post', $post);

    }

    public function updatestrainpost(Request $request) {

        $post = StrainPost::find($request->post_id);

        if ($request->hasFile('image')) {
                
            $file = $request->file('image');
            $filename = time() . '.' . $file->GetClientOriginalExtension();
            $file_img = Image::make($file);
            $file_img->resize(320,140)->save(public_path('images/posts/' . $filename));
            $post->image = asset("images/posts/" . $filename);

        }

        $post->description = $request->description;

        $post->save();

        return redirect()->back()->with('info', 'Post Updated Successfully.');

    }

}
