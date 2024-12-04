<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CurriculumService;


class CurriculumController extends Controller
{
    private $curriculumService;
    public function __construct(CurriculumService $curriculumService)
    {
        $this->curriculumService = $curriculumService;

    }

    public function send(Request $request)
    {
        $result = $this->curriculumService->send($request->file('file'), $request->all());
        return response()->json([
            'result' => $result 

        ]);
        
    }


    public function show(string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        
    }
}
