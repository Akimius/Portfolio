<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;

use Mail;
use App\User;
use App\Mail\ContactMail;
use App\Team;

class DefaultController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $categories = Category::all();
        $teams = Team::all();


        return view('default.index', [
            'projectlist' => $projects,
            'categories' => $categories,
            'teams' => $teams,
        ]);
    }

    public function category($category)
    {
    	$category = Category::where('category', $category)
    		->first();
        $categories = Category::all();
        return view('default.index', [
            'categories' => $categories,
            'projectlist' => $category->projects
        ]);
    }

    public function email(Request $request)
    {
        $data = $request->all();

        $user = User::find(1);

        Mail::to($user)->send(new ContactMail($data));

        // return redirect('/');

        return view('emails.thankyou', [
            'user' => $user,
        ]);
    }
}
