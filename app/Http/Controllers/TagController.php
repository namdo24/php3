<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use App\Models\tag;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    public function index()
    {
        $data = tag::query()->get();
        return view('tags.index', compact('data'));
    }
    public function create()
    {
        return view('tags.create');
    }
    public function store(Request $request)
    {

        $data = $request->except(['image']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = Storage::put('tags', $file);
        }
        tag::query()->create($data);
        return redirect()->route('tags.index');
    }
    public function destroy($id){
        $tag=tag::query()->findOrFail($id);
        $tag->delete();
        if($tag->image && Storage::exists($tag->image)){
            Storage::delete($tag->image);
        }
        return redirect()->route('tags.index');
    }
}
