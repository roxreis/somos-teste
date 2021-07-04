@extends('templates.header')

@section('titulo')
Nova Tarefa
@endsection

@section('conteudo')
<section class="mt-5 d-flex flex-column align-items-center"> 
  @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <h3 class="text-center ">NOVA TAREFA</h3>
  <form action="/save-task" method="POST" class="col-4 mt-2 border border-secondary p-3 bg-light">
    @csrf
    <div class="form-group">
      <label for="description">Descrição</label>
      <input type="text" name="description" class="form-control" >
    </div>
    <div class="form-group">
      <label for="user_id">Responsável</label>
        <select name="user_id" class="form-control" >
          @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
      <label for="category">Escolha a categoria</label>
      <select multiple class="form-control" name="category">
        @if(!$categories)
          <option >Sem Categoria cadastrada</option>
        @else
          @foreach ($categories as $category)
            <option value="{{$category->name}}">{{$category->name}}</option>
          @endforeach
        @endif
      </select>
    </div>
    <button type="submit" class="btn btn-success">Criar</button>
  </form>
  <form action="/save-category" method="POST" class="col-4 mt-2 border border-secondary p-3 bg-light">
    @csrf
    <div class="form-group">
      <label>Cadastrar nova categoria</label>
      <input type="text" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Criar</button>
  </form>
</section>




@endsection