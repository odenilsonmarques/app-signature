<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(Plan $plan)
    {
        // pegando os planos e suas features
        $plans = $plan->with('features')->get();
        // dd($plans);
        return view('site.home',compact('plans'));
    }
}
