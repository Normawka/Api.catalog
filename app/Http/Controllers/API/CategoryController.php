<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories = CategoryResource::collection(Category::all());
        return $this->sendResponse($categories,"Категории");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->validated());

        return $this->sendResponse(new CategoryResource($category),'Успешно создана категория');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        $category = new CategoryResource($category);
        if (is_null($category)){
            return $this->sendError('Категория не найдена.');
        }
      return $this->sendResponse($category,'Успешный вывод категории' );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryStoreRequest $request, Category $category)
    {
      $category->update($request->validated());

      return $this->sendResponse(new CategoryResource($category),'Категория обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->sendResponse($category->toArray(),'Данные удалены');
    }
}
