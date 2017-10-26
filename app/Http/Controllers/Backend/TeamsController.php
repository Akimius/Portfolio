<?php

namespace App\Http\Controllers\Backend;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App;
use File;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return view('dashboard.team.team', [
            'teams' => $teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();

        return view('dashboard.team.create', [
            'teams' => $teams
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
            'name' => 'required|max:60',
            'surname' => 'required|max:60',
            'position' => 'required|max:60',
            'facebook' => 'required|max:60',
            'linked' => 'required|max:60',

            'preview' => 'required|mimes:jpeg,png|max:15000'
        ]);

        $file = $request->file('preview');
        $path = public_path('img/myteam');
        $filename = $file->hashName();

        $file->move($path, $filename);

        $data['preview'] = $filename;

        Team::create($data);

        return redirect('/dashboard/team');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('dashboard.team.edit', [
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
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
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = public_path('img\myteam');

        $team = Team::find($id);

        $file = $path . $team->preview;
        
        if(File::isFile($file)){
            File::delete($file);
        }

        $team->delete();

        return redirect('/dashboard/team');
    }
}
