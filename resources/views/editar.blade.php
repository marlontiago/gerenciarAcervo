@extends('layout')
@include('cabecalho')

<body>

    


    <div>
        <form action="{{route('atualizar.livro', $livro->id)}}" method="POST">
            @csrf
            @method('PUT')

            <h4 style="text-align: center;color: black">Insira os dados abaixo para alteração</h4>
            <div style="display:flex; justify-content: center; align-items: center; flex-direction: column">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" value="{{$livro->titulo}} " required><br>
                <label for="titulo">Autor</label>
                <input type="text" name="autor" id="autor" value="{{$livro->autor}} " required><br>
                <label for="titulo">Gênero</label>
                <input type="text" name="genero" id="genero" value="{{$livro->genero}} " required><br>
                <label for="titulo">Sinopse</label>
                <input type="text" name="sinopse" id="sinopse" value="{{$livro->sinopse}}"><br>
                <label for="titulo">Data</label>
                <input type="text" type="date" name="data" id="data" value="{{$livro->data}}"><br>

                <button style="margin-top: 10px;background-color: rgb(178, 119, 19);border: none;color: aliceblue;width: 200px" type="submit" type="button" class="btn btn-outline-primary">Salvar Alterações</button>
            </div>
        </form>
    </div>
</body>
