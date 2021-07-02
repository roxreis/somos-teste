@extends('templates.header')

@section('titulo')
Tarefas
@endsection

@section('conteudo')
<section class="d-flex justify-content-center mt-5 mb-5" >
    <div class="card border border-secondary bg-light" style="width: 30vw;">
      @foreach($tasks as $task)
        <a href="/detail-task/{{$task->id}}"  class="text-decoration-none text-reset">
          <div class="card-header bg-dark text-white">
            Categoria: {{$task->category}}
          </div>
          <div class="card-body">
            <h5 class="card-title">Descrição: {{$task->description}}</h5>
            <p class="card-text">Responsavel: {{$task->user->name}}</p>
            <a href="#" type="sbmit" class="btn btn-danger mt-2">Excluir</a>
          </div>
        </a>
      @endforeach
    </div>

@endsection



</section>