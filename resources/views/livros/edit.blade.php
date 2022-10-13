@extends('layout.app')
@section('title','Alteração Livro {{$livro->nome}}')
@section('content')
    <h1>Alteração livro {{$livro->nome}}</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    {{Form::open(['route' => ['livros.update',$livro->id], 'method' => 'PUT'])}}
    
        {{Form::label('titulo', 'Título')}}
        {{Form::text('titulo',$livro->titulo,['class'=>'form-control','required','placeholder'=>'Título do livro'])}}

        {{Form::label('descricao', 'Descrição')}}
        {{Form::text('descricao',$livro->descricao,['class'=>'form-control','required','placeholder'=>'Descrição'])}}

        {{Form::label('autor', 'Autor')}}
        {{Form::text('autor',$livro->autor,['class'=>'form-control','required','placeholder'=>'Nome do(a) autor(a)'])}}

        {{Form::label('editora', 'Editora')}}
        {{Form::text('editora',$livro->editora,['class'=>'form-control','required','placeholder'=>'Nome da editora'])}}

        {{Form::label('ano', 'Ano')}}
        {{Form::text('ano',$livro->ano,['class'=>'form-control','required','placeholder'=>'Ano do lançamento'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('livros')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection