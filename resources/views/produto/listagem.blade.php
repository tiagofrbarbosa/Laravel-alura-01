@extends('layout.principal')

@section('conteudo')
		@if(old('nome'))
		  <div class="alert alert-success">
		    <strong>Sucesso!</strong> 
		      O produto {{ old('nome') }} foi adicionado.
		  </div>
		@endif
		@if(empty($produtos))

		<div class="alert alert-danger">
			nenhum produto encontrado.
		</div>

		@else

		<h1>Listagem de produtos</h1>
		<table class="table table-hover table-striped">
				@foreach($produtos as $p)
			<tr class="{{$p->quantidade <= 1 ? 'danger' : ''}}">
				<td>{{ $p->nome }}</td>
				<td>{{ $p->valor }}</td>
				<td>{{ $p->descricao }}</td>
				<td>{{ $p->quantidade }}</td>
				<td>{{ $p->tamanho }}</td>
				<td>{{ $p->categoria->nome}}</td>
				<td><a href="/produtos/mostra/{{ $p->id }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></td>
				<td><a href="/produtos/remove/{{ $p->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			</tr>
			
					@endforeach
		</table>
		@endif
		@if($p->quantidade <= 1)
			<h4>
			<span class="label label-danger pull-right">
				Um ou menos itens no estoque
			</span>
			</h4>
			@endif
		
@stop
		