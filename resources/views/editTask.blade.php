@extends('templates.header')

@section('titulo')
Editar Tarefa
@endsection

@section('conteudo')
<section class="mt-5 d-flex flex-column align-items-center"> 
  @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <h3 class="text-center ">EDITAR TAREFA</h3>
  <form action="/update-task" method="POST" class="col-4 mt-2 border border-secondary p-3 bg-light">
    @csrf
    <div class="form-group">
      <label for="description">Descrição</label>
      <input value="{{$task->description}}"type="text" name="description" class="form-control" >
    </div>
    <div class="form-group">
      <label for="user_id">Responsável</label>
        <select name="user_id" class="form-control" >
            <option selected disabled>{{$task->user->name}}</option>
        </select>
    </div>
    <div class="form-group">
      <label for="category">Escolha a categoria</label>
      <select multiple class="form-control" name="category">
        @foreach ($categories as $category)
          <option value="{{$category->name}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <input type="hidden" name="id" value="{{$task->id}}">
    <button type="submit" class="btn btn-success">Editar</button>
  </form>
</section>

@endsection