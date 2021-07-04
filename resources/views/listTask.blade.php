@extends('templates.header')

@section('titulo')
Tarefas
@endsection

@section('conteudo')

  <section class=" mt-5 mb-5" >
  <h5 class="text-center">TAREFAS</h5>
      @foreach($tasks as $task)
        <div class="card border border-secondary bg-light mb-3" >
            <a href="/detail-task/{{$task->id}}"  class="text-decoration-none text-reset">
              <div class="card-header bg-dark text-white">
                Categoria: {{$task->category}}
              </div>
              <div class="card-body">
                <h5 class="card-title">Descrição: {{$task->description}}</h5>
                <p class="card-text">Responsavel: {{$task->user->name}}</p>
                <div class="d-flex justify-content-end ">
                  <form action="/done-task" onsubmit="return ConfirmDone()" class="mr-2"  method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$task->id}}">
                    <input type="hidden" name="category" value="{{$task->category}}">
                    <input type="hidden" name="description" value="{{$task->description}}">
                    <input type="hidden" name="name" value="{{$task->user->name}}">
                    <input type="hidden" name="done" value="1">
                    <button  type="submit" class="btn btn-primary mt-2">Feito</button>
                  </form>
                  <form action="/delete-task/{{$task->id}}" onsubmit="return ConfirmDelete()" class=" " method="POST">
                    @csrf
                    <button id="Excluir"  type="submit" class="btn btn-danger mt-2">Excluir</button>
                  </form>
                </div>
              </div>
            </a>
        </div>
      @endforeach
  </section>
  <hr>

  <section class="mb-5" style="margin-top: 100px;" >
  <h5 class="text-success text-center">TAREFAS CONCLUÍDAS</h5>
      @foreach($doneTasks as $doneTask)
        <div class="card border border-secondary   mb-3" >
            <div class="card-header bg-light text-dark">
              <s>Categoria: {{$doneTask->category}}</s>
            </div>
            <div class="card-body">
              <h5 class="card-title">Descrição: <s>{{$doneTask->description}}</s></h5>
              <p class="card-text">Responsavel: <s>{{$doneTask->user->name}}</s></p>
              <div class="d-flex justify-content-end ">
                <form action="/delete-task/{{$doneTask->id}}" onsubmit="return ConfirmDelete()" method="POST">
                  @csrf
                  <button id="Excluir"  type="submit" class="btn btn-danger mt-2">Excluir</button>
                </form>
              </div>
            </div>
        </div>
      @endforeach
  </section>
  <script type="text/javascript">
    function ConfirmDelete() {
      if (confirm("Delete Task?")) {
        return true;
      } else{
        return false;
      }
    }

    function ConfirmDone() {
      if (confirm("Confirm Done?")) {
        return true;
      } else{
        return false;
      }
    }
 </script>
@endsection



