@extends('layout')

<body>

    @include('banner')
    <div>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
                 {{ session('success') }}
        </div>
    @endif
    <hr>
    <h1 style="display:flex;justify-content: center">Acervo</h1>
    <hr>
    <div style="display: flex; justify-content: flex-start; margin-left: 20px; flex-direction: column"   > 
        <h5>Filtro por título, autor ou gênero:</h5>        
        <input style="max-width: 30%;" id="filtrar" type="text" id="filtrar" placeholder="Filtrar busca...">
    </div>   
    <br>
         

    <table  class="table table-striped">
        <thead >
            <th id="header-id">ID</th>
            <th id="header-titulo">Título</th>
            <th id="header-autor">Autor</th>
            <th id="header-genero">Gênero</th>
            <th id="header-sinopse">Sinopse</th>
            <th id="header-data">Data Lançamento</th>
            <th id="header-acoes"></th>
            <th style="width: 0px">Ações</th>
        </thead>

        <tbody id="results">
            @foreach ($livros as $livro)
            <tr>
                <td>{{$livro->id}}</td>
                <td>{{$livro->titulo}}</td>
                <td>{{$livro->autor}}</td>
                <td>{{$livro->genero}}</td>
                <td>{{$livro->sinopse}}</td>
                <td>{{$livro->data}}</td>
                <td>
                    <a style=" float: right; background-color: rgb(178, 119, 19);border: none" class="btn btn-primary" href="{{route('editar.livro', $livro->id)}}">Editar</a>
                </td>
                <td>
                    <form action="{{route('excluir.livro', $livro->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="float: right;border:none" type="submit" onclick="return confirm('Tem certeza que deseja remover esse registro ?')" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
                
        </tbody>
    </table>

    </div>
    <script src="{{asset('js/filtrar.js')}}"></script>
    <script src="{{asset('js/ordenar.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</body>