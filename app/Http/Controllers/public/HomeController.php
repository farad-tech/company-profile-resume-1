<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\custom;
use App\Models\HeaderSliders;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = HeaderSliders::all();
        $about  = custom::where('title', 'about')->first();
        $services = Service::limit(6)->get();
        $project_categories = ProjectCategory::get();
        $projects = Project::limit(6)->get();
        $teams = Team::limit(6)->get();
        $blogs = Blog::limit(4)->get();
        $carbon = Carbon::class;

        return response()->view('public.pages.index',
            compact(
                'slides',
                'about',
                'services',
                'project_categories',
                'projects',
                'teams',
                'blogs',
                'carbon',
            ));
    }
}
