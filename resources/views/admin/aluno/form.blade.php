@extends('adminlte::page')

@section('title', 'Matricula do Aluno')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Matrícula do Aluno</h3>
        </div>
        <div class="card-body">
          @if(isset($aluno))
              {!! Form::model($aluno,['url' => route('admin.aluno.update' ,$aluno), 'method'=>'put'])!!}
          @else 
              {!! Form::open(['url'=>route('admin.aluno.store')])!!}
          @endif
           <div class="row">
             <div class="form-group col-md-4">
                 {!! Form::label('nome', 'Nome')!!}
                 {!! Form::text('nome',null, ['class'=>'form-control','required']) !!}
                 @error('nome') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-3">
                 {!! Form::label('cpf', 'CPF')!!}
                 {!! Form::text('cpf',null, ['class'=>'form-control','required']) !!}
                 @error('cpf') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-3">
                 {!! Form::label('rg', 'RG')!!}
                 {!! Form::text('rg',null, ['class'=>'form-control','required']) !!}
                 @error('rg') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-2">
                  {!! Form::label('telefone', 'Telefone')!!}
                  {!! Form::text('telefone',null, ['class'=>'form-control','required']) !!}
                  @error('telefone') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-6">
                 {!! Form::label('email', 'E-mail')!!}
                 {!! Form::text('email',null, ['class'=>'form-control','required']) !!}
                 @error('email') <span class= "text-danger">{{ $message}}</span> @enderror
           </div>
              <div class="form-group col-md-3">
                 {!! Form::label('data_nascimento', 'Data Nascimento')!!}
                 {!! Form::date('data_nascimento',null, ['class'=>'form-control','required']) !!}
                 @error('data_nascimento') <span class= "text-danger">{{ $message}}</span> @enderror
              </div>
              <div class="form-group col-md-3">
                 {!! Form::label('curso_id', 'Curso') !!}
                 {!! Form::select('curso_id', $curso, null, ['class' => 'form-control']) !!}
                 @error('curso_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
           </div>
            <hr>
             {!! Form::submit('Matricular', ['class' => 'btn btn-primary']) !!}
             {!! Form::close() !!}
       </div>
    </div>
@stop

@section('css')
 
@stop

@section('js')

@stop