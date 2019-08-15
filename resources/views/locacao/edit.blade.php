@extends('locacao.layout')

@section('title', 'Edit Order')

@section('content')
<div class="card">
  <div class="card-header">
    Edit Rent
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form method="post" action="{{ route('cliente.locacao.update', [$locacao->cliente_id, $locacao])}}">
      <div class="form-group">
        @csrf
        @method('PATCH')
        <label for="data">Data da Locacao:</label>
        <input type="text" class="form-control" id="dataLocacao" name="dataLocacao" value="{{ $locacao->dataLocacao }}" />
      </div>
      <div class="form-group">
        <label for="data">Data da Entrega:</label>
        <input type="text" class="form-control" id="dataEntrega" name="dataEntrega" value="{{ $pedido->dataEntrega }}" />
      </div>
      <div class="form-group">
        <label for="data">Valor:</label>
        <input type="text" class="form-control" id="valor" name="valor" value="{{ $pedido->valor }}" />
      </div>
      <button type="submit" class="btn btn-primary">Update Rent</button>
    </form>
  </div>
</div>
@endsection