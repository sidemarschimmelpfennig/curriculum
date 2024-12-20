<?php

namespace App\Http\Controllers;

use App\Events\StatusUpdatedEvent;
use App\Models\Candidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CandidateService;


class CandidateController extends Controller
{
    protected $candidateService;
    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;

    }

    public function curriculumApply(Request $request)
    {
        dd('aaa');
        /*return response()->json($request->all());
        
        try {
            $request->validate([
                'jobID' => 'required',
                'candidateID' => 'required|integer',
                'curriculum' => 'required|file|mimes:pdf,doc,docx'

            ]);
            
            $candidateID = $request->input('candidateID');
            $jobId = $request->input('jobID');
            $file = $request->file('curriculum');
           // $job_x_candidate = $this->candidateService->jobApply($candidateID, $jobId, $file);
        
            return response()->json([
                'message' => 'Aplicação criada com sucesso',
                'jobCandidate' => $job_x_candidate

            ], 200);
    
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível se candidatar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),

            ], 400);
        }*/
    }

    public function downloadFile(Request $request)
    {
        $user = Auth::user();
        //$path = $request->
        //$directory = public_path('uploads/' . $path . '.pdf');

        //return response()->download($directory);

    }

    public function delete(int $id)
    {
        try {
            $this->candidateService->delete($id);
            $candidate = $this->candidateService->findByID($id);

            return response()->json([
                'success' => true,
                'message' => 'Candidato desativado!',
                'candidate' => $candidate
                
            ]);
                
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao desativar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
            ], 400);
        }
    }

    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'full_name' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string',
                'phone' => 'required|string',
                'additional_info' => 'required|string',
            ]);
            return $this->candidateService->create($data);

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao desativar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ], 400);
        }

    }

    public function updateStatus(Request $request, $candidateID)
    {
        $candidate = Candidates::find($candidateID);

        if (!$candidate){
            return response()->json([
                'message' => 'Candidato não encontrado',
            ], 404);
        }

        $newStatus = $request->input('status_id');
        $candidate->status = $newStatus;
        $candidate->save();

        event(new StatusUpdatedEvent($candidate, $newStatus));

        return response()->json([
            'message' => 'Status atualizado com sucesso!',
        ], 200);
    }
}
