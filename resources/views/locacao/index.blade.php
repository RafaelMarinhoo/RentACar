@extends('layouts.app')

@section('title', 'Locacoes')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><br />
@endif
<table>
<td><a href="{{ route('cliente.index') }}" class="btn btn-primary" role="button">Back</a></td>
</table>
<table class="table table-striped">
  <thead>
    <tr>
      <td>Id</td>
      <td>Data da Locacao</td>
      <td>Data da Entrega</td>
      <td>Valor</td>
      <td colspan="2">Action</td>
    </tr>
  </thead>
  <tbody>
    @foreach($locacao as $locacao)
    <tr>
      <td>{{$locacao->id}}</td>
      <td>{{$locacao->dataLocacao}}</td>
      <td>{{$locacao->dataEntrega}}</td>
      <td>{{$locacao->valor}}</td>
      <td><a href="{{ route('cliente.locacao.edit', [$locacao->cliente_id, $locacao->id]) }}" class="btn btn-primary" role="button">Edit</a></td>
      <td>
        <form action="{{ route('cliente.locacao.destroy', [$locacao->cliente_id, $locacao->id])}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{ route('cliente.locacao.create', $locacao->cliente_id) }}" class="btn btn-primary" role="button">Add Rent</a>
@endsection