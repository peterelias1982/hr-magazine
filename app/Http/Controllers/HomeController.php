<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::query()
        ->whereDate('fromDate', '>=', Carbon::now()->format('Y-m-d'))
        ->orWhereDate('toDate', '>=', Carbon::now()->format('Y-m-d'))
        ->orderBy('fromDate', 'asc')->get();

        $news = Article::where('approved', 1)
        // ->whereHas('articleCategory', function ($query) {
        //     $query->where('subCategory', 'Industry News');
        // })
        ->latest()
        ->get();

        $recommends = Article::where('approved', 1)
            ->where('recommended', 1)
            ->latest()
            ->get();

            $professionalsSpotlights = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Professional Spotlights');
            })
            ->latest()
            ->get();

            $articles = Article::where('approved',1)
            ->latest()
            ->take(4)
            ->get();

            $perspectives = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Global HR Perspectives');
            })
            ->latest()
            ->take(1)
            ->get();


       
       
       
        return view('publicPages.home',compact('events','news','recommends','professionalsSpotlights','articles','perspectives'));
    }

    public function contactUs(){
        return view('publicPages.contactUs');
    }

    public function storeContact(Request $request){

        $messages= [
            'firstName'=>'please enter your first name',
            'secondName'=>'please enter your second name',
            'email'=>'please enter your email',
            'phone'=>'please enter your phone number',
            'message'=>'should be text',
        ];
    
            $data = $request->validate([
                'firstName'=>'required|string|max:50',
                'secondName'=>'required|string|max:50',
                'email'=>'required|string',
                'phone'=>'required|string',
                'message'=>'required',
    
               ],$messages);
    
               Contact::create($data);
            // return dd($request);

            return redirect()->route('afterContactUs');
          
    
        //    return back()->with('success','Email sent successfully');
        // return view('publicPages.aboutUs');
    }
}
