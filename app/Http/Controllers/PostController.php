<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Author;
use App\Tag;
use App\Mail\PostCreated;
use App\Mail\TagsUsed;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        $authors = Author::all();
        return view('post.create', compact('authors', 'tags'));
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
        

        $author_id = $data['author_id'];
        if(!Author::find($author_id)) {
            dd('check');
        }

        $finalArrayTags = $data['tags'];
        $allTags = Tag::all();
        foreach ($allTags as $tag) {
            if(stripos($data['body'], $tag->name) !== false){
                $finalArrayTags[] = $tag->id;
            }
        }

        $post = new Post();
        $post->fill($data);
        $post->save();

        $post->tags()->attach($finalArrayTags);

        $storedPost = Post::orderBy('id', 'desc')->first();        

        $tagsMail = new TagsUsed($storedPost->tags);
        Mail::to('mail@example.tk')->send(($tagsMail));


        $mailableObject = new PostCreated($storedPost);
        Mail::to('mail@example.tk')->send($mailableObject);

        return redirect()->route('posts.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
