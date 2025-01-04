<?php

namespace App\Http\Controllers;

use App\Services\DepartamentService;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    protected $departamentService;
    public function __construct(DepartamentService $departamentService)
    {
        $this->departamentService = $departamentService;

    }

    public function getAll()
    {
        return $this->departamentService->getAll();

    }

    public function crate(Request $request)
    {
        $data = $request->validate([
            'departament' => 'required|string'
            
        ]);

        return $this->departamentService->create($data);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'departament' => 'required|string'
        ]);
        
        return $this->departamentService->update($id, $data);

    }

    public function delete(int $id)
    {
        return $this->departamentService->delete($id);
        
    }
}
