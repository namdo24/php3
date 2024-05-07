<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Category::query()->latest('id')->paginate();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Category::query()->create($request->all());

        return response()->json([], 204);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {

            $category = Category::query()->findOrFail($id);
            return response()->json($category);

        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return response()->json('ERRO SERVER',500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $category = Category::query()->findOrFail($id);

         $category->update($request->all());

//         $category->refresh();

         return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Category::destroy($id);

        return response()->json([],204);
    }
}