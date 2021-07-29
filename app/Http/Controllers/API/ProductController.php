<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = ProductResource::collection(Product::all());
        return $this->sendResponse($products, 'Все продукты');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->validated());
        return  $this->sendResponse(new ProductResource($product), 'Успешно создан продукт.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        $product = new ProductResource($product);
        if (is_null($product)){
            return $this->sendError('Продукт не найден.','Продукт не найден в базе.',);
        }
        return $this->sendResponse($product,'Успешный вывод продукта' );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductStoreRequest $request, Product $product)
    {
        $product->update($request->validated());
        return  $this->sendResponse(new ProductResource($product),'Данные обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->sendResponse($product->toArray(),'Данные удалены');
    }
}
