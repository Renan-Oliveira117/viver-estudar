<?php
namespace App\Services;

use App\Models\Aluno;
use Exception;

class AlunoService
{
    public static function store($request)
    {
        try{
            $aluno = Aluno::create($request);
            return [
                'status' => true,
                'aluno' => $aluno
            ];
        }catch(Exception $erro){
            dd($erro->getMessage());
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }
}