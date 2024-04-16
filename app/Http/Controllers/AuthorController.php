<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use App\Models\SocialMedia;
use App\Models\User;
use App\Models\UserMedia;
use Illuminate\Http\Request;
use App\Traits\Common;
use Throwable;

class AuthorController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        
        $authors=Author::with('userAuthor')->get();

       //return dd($request);
        return view('Admin.user.auther.allAuthor',compact('authors'));
    }

    public function search(Request $request){
        if($request){
            // $search = $request->input('search');
 
     $authors = Author::with('userAuthor')
                     ->when($request, function ($query) use ($request) {
                         $query->whereHas('userAuthor', function ($query) use ($request) {
                             $query->where('firstName', 'like', '%' . $request->name . '%')
                                   ->where('email', 'like', '%' . $request->email . '%')
                                   ->where('active', 'like', '%' . $request->status . '%')
                                   ;
                         });
                     })
                     ->get();
                     return view('Admin.user.auther.allAuthor',compact('authors'));
         } 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    
    {
        $Gender=Gender::getInstances();
        return view('Admin.user.auther.addAuthor',compact('Gender'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
      try{ 
        $user=User::create([
            'firstName'=>$request->firstName,
            'secondName'=>$request->secondName,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'mobile'=>$request->mobile,
            'position'=>$request->position,
            'active'=>$request->has('active') ? 1 : 0,
        ]);
        

       Author::create([
            'image'=>$this->uploadFile($request->image,'admin/images/authors/'),
            'approved'=>1,
            'description'=>$request->shortDescription,
            'bio'=>$request->has('bio') ? 1 : 0,
            'user_id'=>$user->id,
        ]);
        $socialMediaLinks = [
            'linkedin'=>$request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
        ];
    
        foreach ($socialMediaLinks as $platform => $link) {
            if ($link) //check that array not null
             {
                $socialMedia = SocialMedia::where('mediaName', $platform)->first();
                if ($socialMedia) {
                    //  to avoid duplicates
                    UserMedia::create([
       
                        'user_id'=>$user->id,
                        'social_id' => $socialMedia->id,
                        'value' => $link]);
                    };};
                    }
                    return redirect()
                ->route('admin.authors.index')
                ->with(['messages' => ['success' => ['Author created Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.authors.index')
                ->with(['messages' => ['error' => ['Error creating author: ' . $exception->getMessage()]]]);}
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
   
}
