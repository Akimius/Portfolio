<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App;
use File;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();



        return view('dashboard.category', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.category.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'category' => 'required|max:60',
            'description' => 'required',
            'preview' => 'required|mimes:jpeg,png|max:15000'
        ]);

        $file = $request->file('preview');
        $path = public_path('img/category');
        $filename = $file->hashName();

        $file->move($path, $filename);

        $data['preview'] = $filename;

        Category::create($data);

        return redirect('/dashboard/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->validate($request, [
            'category' => 'required|max:60',
            'description' => 'required',
            'preview' => 'mimes:jpeg,png|max:15000'
        ]);

        $file = $request->file('preview');

        $category = Category::find($id);

        if(!empty($file)){
            $this->validate($request, [
                'preview' => 'mimes:jpeg,png|max:15000'
            ]);

            $path = public_path('img/category/');
            $filename = $file->hashName();

            $oldfile = $path . $category->preview;

            if(File::isFile($oldfile)){
                File::delete($oldfile);
            }

            $file->move($path, $filename);

            $data['preview'] = $filename;
        }


        $category->update($data);

        return redirect('/dashboard/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = public_path('img\category');

        $category = Category::find($id);

        $file = $path . $category->preview;



        if(File::isFile($file)){
            File::delete($file);
        }

        $category->delete();

        return redirect('/dashboard/categories');
    }
}
