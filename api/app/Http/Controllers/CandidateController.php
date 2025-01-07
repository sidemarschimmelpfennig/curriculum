<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CandidateService;

class CandidateController extends Controller
{
    protected $candidateService;
    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;

    }

    public function getAllActive()
    {
        return $this->candidateService->getAll();
        
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'cpf' => 'required',
            'email' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string',
            'additional_info' => 'required|string',
            'gender' => 'required|string',
            'curriculum' => 'required|file',

        ]);
            
        return $this->candidateService->create($data);
        
    }

    public function apply(Request $request)
    {
        $data = $request->validate([
            'jobID' => 'required|integer',
            'candidateID' => 'required|string'

        ]);

        return $this->candidateService->apply($data['jobID'], $data['candidateID']);
    }

    public function toCheckEmail(Request $request)
    {
       return $this->candidateService->toCheckEmail($request['email']);

    }

    public function toCheckCPF(Request $request)
    {
       return $this->candidateService->toCheckCPF($request['cpf']);

    }

    public function candidateFindByID(int $id)
    {        
        return $this->candidateService->candidateFindByID($id);

    }
    
    public function findByID(int $id)
    {
        return $this->candidateService->findByID($id);
    }
    
    public function findByJob(int $id)
    {
        return $this->candidateService->findByJob($id);

    }

    public function delete(int $id)
    {
        return $this->candidateService->delete($id);
         
    }

    public function updateStatus(Request $request, int $candidateID)
    {
        /*return response()->json([
            'id' => $candidateID,
            'status' => $request->input('status_curriculum')
        ]);*/
        return $this->candidateService->updateStatus($candidateID, $request->input('status_curriculum'));

    }

    public function downloadFile(int $id)
    {
        return $this->candidateService->downloadFile($id);
           
    }
    
}
