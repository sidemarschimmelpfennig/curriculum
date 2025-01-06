<?php

namespace App\Http\Controllers;

use App\Services\DepartamentCategoryService;
use Illuminate\Http\Request;

class DepartamentCategoryController extends Controller
{
    protected $departamentCategoryService;
    public function __construct(DepartamentCategoryService $departamentCategoryService)
    {
        $this->departamentCategoryService = $departamentCategoryService;

    }

    public function getAll()
    {
        return $this->departamentCategoryService->getAll();
    }

    public function crate(Request $request)
    {
        $data = $request->validate([
            'departament_category' => 'required|string'
            
        ]);

        return $this->departamentCategoryService->create($data);
        
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'departament_category' => 'required|string'
        ]);

        return $this->departamentCategoryService->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->departamentCategoryService->delete($id);

    }
}
