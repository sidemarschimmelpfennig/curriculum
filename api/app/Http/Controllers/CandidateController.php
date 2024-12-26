<?php

namespace App\Http\Controllers;

use App\Events\StatusUpdatedEvent;
use App\Models\Candidates;
use Illuminate\Http\Request;
use App\Services\CandidateService;

class CandidateController extends Controller
{
    protected $candidateService;
    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;

    }

    public function delete(int $id)
    {
        try {
            $this->candidateService->delete($id);
            $candidate = $this->candidateService->findByID($id);

            return response()->json($candidate);
                
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
                'phone' => 'required|string',
                'additional_info' => 'required|string',
                'curriculum' => 'required|file',
                'jobID' => 'required|integer'

            ]);
            //return response()->json($request->all());
            $file = $request->file('curriculum');
            $candidate = $this->candidateService->create($data);
            $apply = $this->candidateService->applyCreate($candidate->id, $file, $data['jobID']);

            return response()->json($apply);
            
            //return response()->json();

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao criar candidato',
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

    public function findbyID(int $id)
    {        
        return response()->json($this->candidateService->findByID($id));

    }

    public function findByJob(int $id)
    {
        try {
            $candidate = $this->candidateService->findByJob($id);
            if($candidate)
            {
                return response()->json($candidate);

            } else {
                return response()->json('Não tem candidatos aplicados para essa vaga');
            }
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao criar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ], 400);
        }
    }

    public function downloadFile(int $id)
    {
        $directory = $this->candidateService->downloadFile($id);
        return response()->download($directory);

    }
}
