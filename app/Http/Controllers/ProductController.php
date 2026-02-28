<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\TaskService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   protected $taskService;

   public function __construct(TaskService $taskService)
   {
      $this->taskService = $taskService; 
   }

    public function index(ProductService $productService)
    {
       $newProduct = [
          'id' => 4, 
          'name' => 'Carrot', 
          'category' => 'vegetable'
       ];
       $productService->insert($newProduct);

        $this->taskService->add('Add to cart');
        $this->taskService->add('Checkout');

        $data =[
            'products' => $productService->listProducts(),
            'tasks' => $this->taskService->getAllTasks()
         ];

         return view('products.index', $data);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductService $productService, string $id)
     {
        $product = collect($productService->listProducts())->filter(function($item) use ($id){
            return $item['id'] == $id;
         })->first();
         return $product;
    }

    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
