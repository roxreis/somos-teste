@extends('templates.header')

@section('titulo')
Minha Tarefa
@endsection

@section('conteudo')
  <section class="mt-5">
   
    <div class="  card text-center">
      <div class="card-header">
        Categoria: {{$task->category}}
      </div>
      <div class="card-body">
        <h5 class="card-title">Descrição: {{$task->description}}</h5>
        <p class="card-text">Responsavel: {{$task->user->name}}</p>
        <a href="/edit-task/{{$task->id}}" class="btn btn-primary">Editar</a>
        <a href="/" class="btn btn-secondary">Voltar</a>
      </div>
      <div class="card-footer text-muted">
        criado em: {{ \Carbon\Carbon::parse($task->created_at)->format('d/m/Y - H:i:s')}}
      </div>
    </div>
   
  </section>
@endsection