<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use File;

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
            'gambar' => 'required|mimes:jpg,png|max:2048',
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
            ->with('success', 'Data produk berhasil ditambahkan !.');
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


    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'desk' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'gambar' => 'required|mimes:jpg,png|max:2048',
        ]);

        $gambarName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $gambarName);

        $data = new Post();
        $datas  = $data::find($id);
        $datas->nama = $request->get('nama');
        $datas->deskripsi = $request->get('desk');
        $datas->harga = $request->get('harga');
        $datas->jumlah = $request->get('jumlah');
        $datas->path_img = $gambarName;

        $datas->save();



        return redirect()->route('posts.index')
            ->with('success', 'Produk berhasil di update');
    }

    public function update2(Request $request, Post $post)
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
        $gambarName = $datas->path_img;
        File::delete(public_path('images/' . $gambarName));

        return redirect()->route('posts.index')
            ->with('success', 'Produk berhasil di hapus');
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
