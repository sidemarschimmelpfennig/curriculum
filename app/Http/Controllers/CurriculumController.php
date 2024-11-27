<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repostitoy\CurriculumRepostitoy;

class CurriculumController extends Controller
{

    public function __construct(protected CurriculumRepostitoy $repostity) 
    {
         
    }

    public function testAPI(){
        $test = $this->repostity->testAPI();
        return response()->json([
            'message' => $test

        ]);
    }

    public function index()
    {
        $this->repostity->getAll();
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
    public function show(CurriculumCotroller $curriculumCotroller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CurriculumCotroller $curriculumCotroller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CurriculumCotroller $curriculumCotroller)
    {
        //
    }
}
