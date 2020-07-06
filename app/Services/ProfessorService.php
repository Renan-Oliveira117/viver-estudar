<?php
namespace App\Services;

use App\Models\Professor;
use Exception;

class ProfessorService
{
    public static function store($request)
    {
        try{
            $professor = Professor::create($request);
            return [
                'status' => true,
                'professor' => $professor
            ];
        }catch(Exception $erro){
            dd($erro->getMessage());
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }

    public static function getAlunoPorId($id)
    {
        try{
            $professor = Professor::findOrFail($id);
            return[
                'status' => true,
                'professor' => $professor
            ];
        }catch(Exception $erro){
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
                $professor = Professor::findOrFail($id);
                $professor -> update($request);
    
                return [
                    'status' => true,
                    'professor' => $professor
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
            $professor = Professor::findOrFail($id);
             $professor -> delete();
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