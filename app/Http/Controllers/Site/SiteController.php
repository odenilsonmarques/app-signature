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

    // criando metodo para acessar os detalhes de cada plano através de uma sessoa, caso o plano exista
    public function createSessionPlan(Plan $plan, $urlPlan)
    {
         // captuando o plano, cujo a url é representada por $urlPlan. Se não existir uma url definida em um dos planos o usuario vai ser direcionado para home
        if(!$plan = $plan->where('url',$urlPlan)->first()){
            return redirect()->route('site.home');
        }

        //se existir é criada uma session para recuperar os detalhes dele
        session()->put('plan', $plan);
        return redirect()->route('signatures.checkout');
       
        
    }
}
