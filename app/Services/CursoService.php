<?php
namespace App\Services;

use App\Models\Curso;
use App\Models\Professor;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CursoService 
{
    public static function store($request)
    {
        try {
            DB::beginTransaction();

            $curso = Curso::create(Arr::except($request,['professors','imagem_temp']));

            $curso->update([
                'imagem' => self::uploadImagem($curso, $request['imagem_temp'])
            ]);
            DB::commit();
            return [
                'status' => true,
                'curso' => $curso

               
            ];
            
        } catch (Exception $erro) {
            dd($erro->getMessage());
            DB::rollBack();
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
            
    }
    public static function getCursoPorId($id)
    {
        try {
            $curso = Curso::findOrFail($id);
            $professor = Professor::all()->pluck('nome', 'id');
            return [
                'status' => true,
                'curso' => $curso,
                'professor' => $professor
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
        try {
            DB::beginTransaction();
            $curso = Curso::findOrFail($id);
            $curso->update(Arr::except($request, ['professors', 'imagem_temp']));

            if (isset($request['imagem_temp'])) {
                $curso->update([
                    'imagem' => self::uploadImagem($curso, $request['imagem_temp'])
                ]);
            }

            DB::commit();
            return [
                'status' => true,
                'curso' => $curso
            ];
        } catch(Exception $erro) {
            DB::rollBack();
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }public static function destroy($id)
    {
        try {
            $curso = Curso::findOrFail($id);
             $curso->delete();
             return [
                'status' => true
            ];
        } catch(Exception $erro) {
             return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }    

    public static function uploadImagem($curso, $arquivo)
    {
        $imagem =  $curso->id . time() . "." . $arquivo->getClientOriginalExtension();
        $arquivo->move(public_path() . '/imagens/', $imagem);

        return $imagem;
        
    }

    public static function listaCursos()
    {
        return Curso::paginate(4);
    }
}