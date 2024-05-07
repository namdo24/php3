<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = \request()->keyword;

        // $data = DB::table('categories')
        //     ->when(!empty($keyword), function (Builder $query) use ($keyword) {
        //         /*$query->where('id', 'like', "%$keyword%")
        //             ->orWhere('name', 'like', "%$keyword%")
        //             ->orWhere('created_at', 'like', "%$keyword%")
        //             ->orWhere('updated_at', 'like', "%$keyword%");*/

        //         // $query->whereAll(['id', 'name', 'created_at', 'updated_at'], 'like', "%$keyword%");
        //         $query->whereAny(['id', 'name'], 'like', "%$keyword%");
        //     })
        //     ->latest('id')->paginate(5);
        $data = Category::query()
        ->when(!empty($keyword), function (\Illuminate\Database\Eloquent\Builder $query) use ($keyword) {
            $query->whereAny(['id', 'name', 'created_at', 'updated_at'], 'like', "%$keyword%");
        })
        ->latest('id')->paginate(5);
        //$data = DB::table('categories')->orderByDesc('id')->paginate(5); //lay 5 ban ghi
        
        return view('categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=[
            '_token'=>$request->_token,
            'name'=>$request->name,
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('categories')->insert($data);
        // Category::query()->create($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
     {
        // $category=DB::table('categories')->where('id',$id)->first(); 2 casch nhuw nhau
        // $category = DB::table('categories')->find($id);
        // dd($categories);
        $category = Category::query()->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $category = Category::query()->findOrFail($id);

        $category = Category::query()->findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $category = DB::table('categories')->findOr($id,function(){
        //     abort(404);
        // });
        // $data=[
        //     'name'=>$request->name,
        //     'created_at'=>now(),
        // ];
        // DB::table('categories')->where('id',$category->id)->update($data);
        $category = Category::query()->findOrFail($id);
        $category->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB::table('categories')->delete($id);
        Category::destroy($id);
        return redirect()->route('categories.index');
    }
}
