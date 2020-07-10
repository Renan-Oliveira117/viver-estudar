<?php
namespace App\Services;

use App\Models\Aluno;
use App\Models\Curso;
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
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }

    public static function getAlunoPorId($id)
    {
        try {
            $aluno = Aluno::findOrFail($id);
            $curso = Curso::all()->pluck('nome', 'id');
            return [
                'status' => true,
                'aluno' => $aluno,
                'curso' => $curso
            ];
        } catch (Exception $erro) {
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }

    public static function update($request, $id)
    {
        {
            try{
                $aluno = Aluno::findOrFail($id);
                $aluno -> update($request);
    
                return [
                    'status' => true,
                    'aluno' => $aluno
                ];
            }catch(Exception $erro){
                return[
                    'status' =>false,
                    'erro' => $erro->getMessage()
                ];
            }
        }
    }

    public static function destroy($id)
    {
        try{
            $aluno = Aluno::findOrFail($id);
             $aluno -> delete();
             return[
                 'status' => true
             ];
         }catch(Exception $erro){
             return[
                 'status' => false,
                 'erro' => $erro->getMessage()
             ];
         }
    }

}