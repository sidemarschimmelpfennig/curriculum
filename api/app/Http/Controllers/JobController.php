<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    Support\Facades\Auth
    
};

use App\{
    Http\Controllers\Controller,
    Http\Requests\JobRequest,
    Http\Requests\SendRequest,

    Services\JobService

};

class JobController extends Controller
{
    private $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function getAll()
    {
        try {
            $jobs = $this->jobService->getAll();
            if(count($jobs) <= 0 )
            {
                return response()->json([
                    'message' => 'Sem vagas abertas'
                ]);    

            } 
            
            return response()->json([
                'message' => 'Todas as vagas',
                'jobs' => $jobs
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
            ], 400);
        }
    }

    public function findByDepartament(string $param)
    {
        try {
            return response()->json($this->jobService->findByDepartament($param));
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine()
                
            ], 400);
        }
    }

    public function findByCategories(string $param)
    {
        try {
            return response()->json($this->jobService->findByDepartament($param));
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),

            ], 400);
        }
    }

    public function findByStatus(string $param)
    {
        try {
            return response()->json($this->jobService->findByStatus($param));
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),

            ], 400);
        }
    }

    public function create(Request $request)
    //public function create(JobRequest $request) // <- Se não houver um campo necessário, vai retornar 404
    { 
        try {
            $validatedData = $request->validate([
                'name' => 'string',
                'description' => 'string',
                'departament_id' => 'integer',
                'departament_categories_id' => 'integer',
                'status_id' => 'integer',
                'skills_id' => 'integer',
                'mobilities_id' => 'integer',
            ]);
           
            //$validatedData = $request->validated();

            //$job = $this->jobService->createJob($request->all());
            $job = $this->jobService->createJob($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Vaga criada com sucesso!',
                'request' => $request->all(),
                'vagas' => $job,
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível criar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                
            ], 400);
        }
        
    }
    
    public function deleteDepartament(int $id)
    {
        try {
            $this->jobService->deleteDepartament($id);

            $departament = $this->jobService->findDepartament($id);

            return response()->json([
                'message' => 'Departamento alterado',
                'departament' => $departament,
                'id' => $id
            
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine()
                
            ], 400);
        }
    }
 
    public function updateStatus(int $id, Request $request)
    {
        try {
            $result = $this->jobService->updateStatus($id, $request['value']);
            return response()->json([
                'message' => 'Alteração realizada com sucesso!',
                'resultado' => $result,
                
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Alteração negada!',
                'th' => $th,
                
            ], 400);
        }
    } // <- Aleteração de status ou demais campos da vaga criada

    public function apply(Request $request)
    //public function apply(SendRequest $request)
    {
        // return response()->json([
        //     'dados' => $request->all(),
        //     'file' =>$request->file('curriculum')->getClientOriginalName()
        
        // ]);
        try {
            $request->validate([
                'jobID' => 'required',
                //'candidate_id' => 'required|integer',
                'curriculum' => 'required|file|mimes:pdf,doc,docx'

            ]);
            //$userID = Auth::user()->id;
            $userID = 1;
            $job_id = $request->input('jobID');
            $file = $request->file('curriculum');
            $job_x_candidate = $this->jobService->apply($userID, $job_id, $file);
        
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
        }
    }

    public function createDepartament(JobRequest  $request)
    { 
        try {
            $validatedData = $request->validated();

            $departament = $this->jobService->createDepartament($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Departamento criado com sucesso!',
                'departament' => $departament

            ], 201);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível criar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),

            ], 400);
        }    
    } // Criar novos departamnos se necessário

    public function createDepartamentCategory(JobRequest $request)
    { 
        try {
            $validatedData = $request->validated();

            $departament_categorie = $this->jobService->createDepartamentCategory($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Categoria criada com sucesso!',
                'departament_categorie' => $departament_categorie
                
            ], 201);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível criar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),

            ], 400);
        }    
    } // Criar novas categoria de departamentos se necessário

    public function createStatus(JobRequest $request)
    { 
        try {
            $validatedData = $request->validated();

            $status = $this->jobService->createStatus($validatedData);

            return response()->json([
                'message' => 'Status criado com sucesso!',
                'status' => $status
                
            ], 201);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível criar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),

            ], 400);
        }    
    } // Criar novos status se necessário

    public function createSkills(JobRequest  $request)
    { 
        try {
            $validatedData = $request->validated();

            $skills = $this->jobService->createSkills($validatedData);

            return response()->json([
                'message' => 'Status criado com sucesso!',
                'skills' => $skills
                
            ], 201);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível criar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),

            ], 400);
        }    
    } // Criar novos status se necessário

    public function createMobilities(JobRequest  $request)
    { 
        try {
            $validatedData = $request->validated();
            
            $mobilities = $this->jobService->createMobilities($validatedData);

            return response()->json([
                'message' => 'Status criado com sucesso!',
                'mobilities' => $mobilities
                
            ], 201);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível criar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),

            ], 400);
        }    
    } // Criar novos status se necessários
}