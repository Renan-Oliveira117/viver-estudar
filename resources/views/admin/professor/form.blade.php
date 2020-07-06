@extends('adminlte::page')

@section('title', 'Cadastro de Professores')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Cadastrar Professor</h3>
        </div>
        <div class="card-body">
          @if(isset($professor))
              {!! Form::model($professor,['url' => route('admin.professor.update' ,$professor), 'method'=>'put'])!!}
          @else 
              {!! Form::open(['url'=>route('admin.professor.store')])!!}
          @endif
           <div class="row">
             <div class="form-group col-md-4">
                 {!! Form::label('nome', 'Nome')!!}
                 {!! Form::text('nome',null, ['class'=>'form-control','required']) !!}
                 @error('nome') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-4">
                 {!! Form::label('cpf', 'CPF')!!}
                 {!! Form::text('cpf',null, ['class'=>'form-control','required']) !!}
                 @error('cpf') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-4">
                 {!! Form::label('rg', 'RG')!!}
                 {!! Form::text('rg',null, ['class'=>'form-control','required']) !!}
                 @error('rg') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-4">
                  {!! Form::label('telefone', 'Telefone')!!}
                  {!! Form::text('telefone',null, ['class'=>'form-control','required']) !!}
                  @error('telefone') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-4">
                 {!! Form::label('cep', 'CEP')!!}
                 {!! Form::text('cep',null, ['class'=>'form-control','required']) !!}
                 @error('cep') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-4">
                 {!! Form::label('cidade', 'Cidade')!!}
                 {!! Form::text('cidade',null, ['class'=>'form-control','onfocusout'=>'buscaCep()','required']) !!}
                 @error('cidade') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-3">
                 {!! Form::label('estado', 'Estado')!!}
                 {!! Form::text('estado',null, ['class'=>'form-control','required']) !!}
                 @error('estado') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-4">
                  {!! Form::label('bairro', 'Bairro')!!}
                  {!! Form::text('bairro',null, ['class'=>'form-control','required']) !!}
                  @error('bairro') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-5">
                 {!! Form::label('rua', 'Rua')!!}
                 {!! Form::text('rua',null, ['class'=>'form-control','required']) !!}
                 @error('rua') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-2">
                 {!! Form::label('numero', 'N°')!!}
                 {!! Form::text('numero',null, ['class'=>'form-control','required']) !!}
                 @error('numero') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-10">
                 {!! Form::label('complemento', 'Complemento')!!}
                 {!! Form::text('complemento',null, ['class'=>'form-control','required']) !!}
                 @error('complemento') <span class= "text-danger">{{ $message}}</span> @enderror
              </div>
              <div class="form-group col-md-3">
                 {!! Form::label('data_admissao', 'Data Admissão')!!}
                 {!! Form::date('data_admissao',null, ['class'=>'form-control','required']) !!}
                 @error('data_admissao') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-3">
                 {!! Form::label('salario', 'Salário')!!}
                 {!! Form::text('salario',null, ['class'=>'form-control','required']) !!}
                 @error('salario') <span class= "text-danger">{{ $message}}</span> @enderror
             </div>
             <div class="form-group col-md-6">
                 {!! Form::label('formacao', 'Formação')!!}
                 {!! Form::text('formacao',null, ['class'=>'form-control','required']) !!}
                 @error('formacao') <span class= "text-danger">{{ $message}}</span> @enderror
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    function buscaCep()
    {
        let cep = document.getElementById('cep').value;
        let url = 'https://viacep.com.br/ws/'+ cep +'/json/';
        axios.get(url)
        .then(function(response){
            document.getElementById('cidade').value=response.data.localidade
            document.getElementById('rua').value=response.data.logradouro
            document.getElementById('bairro').value=response.data.bairro
            document.getElementById('estado').value=response.data.uf
        })
        .catch(function(error){
            alert('Ops ! CEP não encontrado' )
        })
    }
</script>
@stop