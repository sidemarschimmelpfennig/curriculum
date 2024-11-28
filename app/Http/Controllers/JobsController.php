<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\JobsRepository;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    
    public function __construct(private JobsRepository $repository)
    {
        
    }

    public function all()
    {
        return response()->json($this->repository->all());
        
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
    public function show(string $id)
    {
        //
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
