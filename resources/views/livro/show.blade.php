@extends('layout.app')
@section('title','Contato - {{$livro->titulo}}')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Livro - {{$livro->titulo}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$livro->id}}</h3>
                <p class="text">Descrição: {{$livro->descricao}}</p>
                Autor: {{$livro->autor}}<br/>
                Aditora: {{$livro->editora}}<br/>
                Ano: {{$livro->ano}}</p>
        </div>
        <div class="card-footer">
            {{Form::open(['route' => ['livros.destroy',$livro->id],'method' => 'DELETE'])}}
            <a href="{{url('livros/'.$livro->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
            <a href="{{url('livros/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
@endsection