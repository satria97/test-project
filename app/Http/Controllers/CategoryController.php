<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $datatables = datatables()->of($category)->addIndexColumn();
        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        Category::create($request->all());
        return back();
        // if($validator->fails()) {
        //     return response()->json($validator->errors(), 
        //     Response::HTTP_UNPROCESSABLE_ENTITY);
        // }
        // try {
        //     $categories = Category::create($request->all());
        //     $response = [
        //         'message' => 'Category created',
        //         'data' => $categories
        //     ];
        //     return response()->json($response, Response::HTTP_CREATED);
        // } catch (QueryException $e) {
        //     return response()->json([
        //         'message' => "Failed " . $e->errorInfo
        //     ]);
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::findOrFail($id);
        $response = [
            'message' => "Detail Category",
            'data' => $categories
        ];
        return response()->json($response, Response::HTTP_OK);
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
    public function update(Request $request, Category $category, $id)
    {
        $category = Category::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $category->update($request->all());
        return back();
        // if($validator->fails()) {
        //     return response()->json($validator->errors(), 
        //     Response::HTTP_UNPROCESSABLE_ENTITY);
        // }
        // try {
        //     $categories->update($request->all());
        //     $response = [
        //         'message' => 'Category updated',
        //         'data' => $categories
        //     ];
        //     return response()->json($response, Response::HTTP_OK);
        // } catch (QueryException $e) {
        //     return response()->json([
        //         'message' => "Failed " . $e->errorInfo
        //     ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back();
    }
}
