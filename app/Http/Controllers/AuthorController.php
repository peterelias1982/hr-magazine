<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use App\Models\SocialMedia;
use App\Models\User;
use App\Models\UserMedia;
use Illuminate\Http\Request;
use App\Trait\Authors;

class AuthorController extends Controller
{
    use Authors;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors=Author::with(['user'=> function ($query) {$query->select('firstName','secondName','email','mobile','active', 'id');}]);
        return view('Admin.user.auther.allAuthor',compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.user.auther.addAuthor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=User::create([
            'firstName'=>$request->fname,
            'secondName'=>$request->sname,
            'mobile'=>$request->mobile,
            'position'=>$request->position,
            'active'=>$request->has('active') ? 1 : 0,
        ]);
        

       Author::create([
            'image'=>$this->uploadImage($request->image,'public/admin/images/authors/'),
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
                    };
                    };
                    }
            
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
    public function test(){
        $mediaID=SocialMedia::get()->id;
        return dd( $mediaID);
    }
}
