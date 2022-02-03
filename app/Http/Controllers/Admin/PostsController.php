<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => "required|max:255|min:2",
                'content' => "required|max:300|min:1",
                
            ],
            [
                'title.required' => 'Titolo è un campo obbligatorio',
                'title.max' => 'Titolo deve aver massimo 255 caratteri',
                'title.min' => 'Titolo deve aver minimo 2 caratteri',
            
                'content.required' => 'Titolo è un campo obbligatorio',
                'content.max' => 'Titolo deve aver massimo 300 caratteri',
                'content.min' => 'Titolo deve aver minimo 1 caratteri',
            ]
                
            
        );
        $data = $request->all();

        $new_post = new Post();
        $new_post->fill($data);
        $new_post->slug = Post::generateSlug($new_post->title);

        $new_post->save();
        return redirect()->route('admin.posts.show', $new_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post){
            return view('admin.posts.show', compact('post'));
        }
        abort(404, 'Prodotto non presente nel DB');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if($post){
            return view('admin.posts.edit', compact('post'));
        }
        abort(404, 'Prodotto non presente nel DB');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => "required|max:50|min:2",
                'content' => "required|max:300|min:1",
                
            ],
            [
                'title.required' => 'Titolo è un campo obbligatorio',
                'title.max' => 'Titolo deve aver massimo 50 caratteri',
                'title.min' => 'Titolo deve aver minimo 2 caratteri',
            
                'content.required' => 'Contenuto è un campo obbligatorio',
                'content.max' => 'Contenuto deve aver massimo 300 caratteri',
                'content.min' => 'Contenuto deve aver minimo 1 caratteri',
            ]
                
            
        );
        $data = $request->all();

        
        $data['slug'] = Post::generateSlug($data['title'], '-');

        $post->update($data);
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("admin.posts.index")->with("deleted", "Post eliminato");
    }
}
