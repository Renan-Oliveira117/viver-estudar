@extends('layouts.master')

@section ('conteudo')

    <div class="row mt-2">
        @foreach($cursos as $c)
            <div class="col-md-4">
            <div class="card mt-4">
                    <img src="{{asset('/imagens/' . $c->imagem)}}" class="card-img-top" alt="...">
                    <div class=" card-body">
                        <h5 class="card-title text-primary">{{$c->nome}}</h5>
                        <h5 class="card-title text-primary">Descrição</h5>
                        <h5>{{$c->descricao}}</h5>

                        <a class="btn btn-primary" href="{{ route('login') }}">Matricular</a>
                        {!! Form::hidden('curso','$c->id') !!}
                        {!!Form::close() !!}
                    </div>
                </div>
            </div>

        @endforeach
    </div>
   <div class="row mt-2">
     <div class="col-md-12">
         {{$cursos->links()}}
      </div>
   </div>
@endsection