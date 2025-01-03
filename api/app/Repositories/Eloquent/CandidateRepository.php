<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\CandidateInterface;
use App\Services\{
    JobService,
    StatusService
};

use App\Models\{
    Candidates,
    CandidatesVagas

};

use App\Events\StatusUpdatedEvent;
use Illuminate\Support\Facades\Hash;

class CandidateRepository implements CandidateInterface
{
    protected $jobService;
    protected $statusService;

    public function __construct(       
        JobService $jobService,
        StatusService $statusService
    )
    {
        $this->jobService = $jobService;
        $this->statusService = $statusService;

    }

    public function getAllActive(int $active)
    {
        return Candidates::where('active', $active)->get();

    }

    public function getAll()
    {

    }

    public function countCandidate(int $jobID)
    {
        return CandidatesVagas::where('job_id', $jobID)->distinct('candidate_id')->count();
    }

    public function archiveFile(int $id, object $file)
    {
        $directory = public_path('uploads'); // Vai pegar o diretório
        $extension = $file->getClientOriginalExtension();

        if(!is_dir($directory)){ 
            mkdir($directory, 0755, true);

        }

        $candidate = $this->candidateFindByID($id);
        $newName = "$candidate->id" . "_" . "$candidate->full_name" . ".$extension";

        while (file_exists("$directory/$newName")) {
            //.$newName
            $newName = 'Candidato ' . $candidate->full_name . ', já cadastrado' . "." . $extension; // Adiciona o contador ao nome do arquivo

        }
    
        // Move o arquivo para o diretório com o novo nome
        //$path = $file->move($directory, $candidate->id . "_" . $candidate->full_name . "." . $extension); // Qualquer coisa só voltar para a lógica antiga
        $path = $file->move($directory, $newName);
    
        return $path; // Retorna o caminho do arquivo
    }

    public function hasApplied(int $jobID, int $candidateID)
    {
        return CandidatesVagas::where('candidate_id', $candidateID)
                                ->where('job_id', $jobID)
                                ->exists();
    }

    public function apply(int $jobID, int $candidateID)
    {    
        if($this->hasApplied($jobID, $candidateID))
        {  
            return false;
            
        }

        $job = $this->jobService->findID($jobID);
        $candidate = $this->candidateFindByID($candidateID);
        
        return CandidatesVagas::create([
            'job_id' => $job->id,
            'job' => $job->name,
            'candidate_id' => $candidate->id,
            'candidate_name' =>  $candidate->full_name,
            'phone' => $candidate->phone,
            'email' => $candidate->email,
            'curriculum' => $candidate->curriculum
             
        ]);
    }

    public function create(array $data)
    {
       $candidate = Candidates::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'full_name' => $data['full_name'],
            'phone' => $data['phone'],
            'additional_info' => $data['additional_info'],

        ]);
        $file = $this->archiveFile($candidate->id, $data['curriculum']);
        $candidate->update([
            'curriculum' => $file

        ]);

        return $candidate;
       
    }

    public function toCheck($credentials)
    {
        $query = Candidates::where('email', $credentials)->first();

        if($query != null)
        {
            return true;

        } else {
            return false;

        }
    }
    
    public function findByCandidateID(int $id)
    {
        return CandidatesVagas::where('candidate_id', $id)->first();
        
    }

    public function findByID(int $id)
    {
        return CandidatesVagas::where('id', $id)->first();
        
    }

    public function candidateFindByID(int $id)
    {
        
        return Candidates::where('id', $id)->first();
        
    }

    public function findByJob(int $id)
    {
        return CandidatesVagas::where('job_id', $id)->get();
        
    }

    public function findByEmail(string $param)
    {
        return Candidates::where('email', $param)->first();
        
    }

    public function downloadFile(int $id)
    {
        try {
            $candidateJob = CandidatesVagas::where('candidate_id', $id)->first();
            return $candidateJob->curriculum;
            
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao criar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ], 400);
        }
        
        
    }

    public function update(int $id, array $data)
    {
        return Candidates::where('id', $id)->update($data);

    }
    
    public function updateStatus(int $candidateID, string $status)
    {
        try {
            $candidate = CandidatesVagas::where('id', $candidateID)->first();

            event(new StatusUpdatedEvent($candidate, $status));
            
            return $candidate->update([
                'status_curriculum' => $status
            
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao alterar status do candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ], 400);
        }
        
    }

    public function delete(int $id) {
        return Candidates::where('id', $id)->update([
            'active' => false
        ]);
    }
    
}
