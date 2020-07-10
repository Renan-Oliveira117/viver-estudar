@extends('adminlte::page')

@section('title', 'Cadastro de Curso')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Cadastrar Curso</h3>
        </div>
        <div class="card-body">
          @if(isset($curso))
              {!! Form::model($curso,['url' => route('admin.curso.update' ,$curso),'files'=>'true', 'method'=>'put'])!!}
          @else 
              {!! Form::open(['url'=>route('admin.curso.store'),'files'=>'true'])!!}
          @endif
           <div class="row">
             <div class="form-group col-md-10">
                 {!! Form::label('nome', 'Nome')!!}
                 {!! Form::text('nome',null, ['class'=>'form-control','required']) !!}
                 @error('nome') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-2">
                 {!! Form::label('carga_horaria', 'Carga Horária')!!}
                 {!! Form::text('carga_horaria',null, ['class'=>'form-control','required']) !!}
                 @error('carga_horaria') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-12">
                 {!! Form::label('descricao', 'Descrição')!!}
                 {!! Form::textArea('descricao',null, ['class'=>'form-control','required']) !!}
                 @error('descricao') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group">
                 {!! Form::label('professor_id', 'Professor') !!}
                 {!! Form::select('professor_id', $professor, null, ['class' => 'form-control']) !!}
                 @error('professor_id') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
             <div class="form-group col-md-6">
                 {!! Form::label('imagem_temp', 'Imagem') !!}
                 {!! Form::file('imagem_temp', ['class' => 'form-control']) !!}
                 @error('imagem_temp') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
           </div>
            <hr>
             {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
             {!! Form::close() !!}
       </div>
    </div>
@stop

@section('css')
 
@stop

@section('js')
  
@stop