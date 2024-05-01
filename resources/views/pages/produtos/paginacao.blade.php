@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('produtos.index') }}" method="GET">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="pesquisar" id="" class="form-control"
                                value="{{ $pesquisar ?? '' }}" placeholder="Digite o nome" autofocus>
                            <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
                        </div>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-outline-success" href="#">Inserir produto</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
    <div class="table-responsive small mt-2">
        @if ($findProduto->isEmpty())
            <p>A consulta não obteve registros para serem exibidos</p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($findProduto as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></button>
                                    <a class="btn btn-outline-danger btn-sm" href="{{ route('produtos.delete') }}">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
