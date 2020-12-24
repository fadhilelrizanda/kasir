<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function manajemen()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.manajemen', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'desk' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'gambar' => 'required',
        ]);

        $gambarName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $gambarName);

        $data = new Post();
        $data->nama = $request->get('nama');
        $data->deskripsi = $request->get('desk');
        $data->harga = $request->get('harga');
        $data->jumlah = $request->get('jumlah');
        $data->path_img = $gambarName;

        $data->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $data = new Post();
        $post  = $data::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $data = new Post();
        $datas  = $data::find($id);
        $datas->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }

    public function downloadFiles($id)
    {
        $file = new Post();
        $filepdf  = $file::find($id);
        $filepath = public_path('images/') . $filepdf->path;
        // return Storage::download($filepath);
        return response()->download($filepath);
    }
}
