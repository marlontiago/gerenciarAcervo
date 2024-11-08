@extends('layout')

<body>

    @include('banner')
    
    <hr>
    <h4 style="margin-left: 30%; color: black">Insira os dados do livro abaixo para cadastrar no acervo</h4>
    <hr>
    <br>


    @if(session('success'))
        <div class="alert alert-success" role="alert">
                 {{ session('success') }}
        </div>
     @endif

        <form action="{{route('salvar.livro')}}" method="POST">
            @csrf
        <div class="form-criar" style="justify-content: center; display: flex; flex-direction: column; align-items: center">
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" style="width: 450px" required> <br>
            @error('titulo')
                <div class="text-danger">{{$message}}</div>
            @enderror  
            <label for="titulo">Autor</label>              
            <input type="text" id="autor" name="autor" style="width: 450px" required><br>
            @error('titulo')
                <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="genero">Gênero</label>
            <input type="text" id="genero" name="genero" style="width: 450px" required><br>
            @error('titulo')
                <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="sinopse">Sinopse</label>
            <input type="text" id="sinopse" name="sinopse" style="width: 450px; max-height: 200px"><br>
            <label for="data">Data de lançamento</label>
            <input type="date" id="data" name="data"><br>
            <div>
            <br><button style="background-color: rgb(178, 119 , 19);border:none" type="submit">Salvar</button>
            <button style="background-color: rgb(178, 119, 19); border:none" onclick="window.location.href='{{route('index')}}'">Voltar</button>
            </div>
        </form>
    </div>

</body>