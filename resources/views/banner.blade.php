<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div  class="banner">  

    <form method="GET" action="{{ route('index') }}">
      @csrf
      <button style="display: felx; float: left; margin-right: 10px; background-color: rgb(178, 119, 19);border: none;margin-left:10px" type="submit" class="bi bi-house bi-2">Home</button>
      
    </form>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button style="display: felx; float: right; margin-right: 10px; background-color: rgb(178, 119, 19);border:none" type="submit" class="bi bi-box-arrow-left">Logout</button>
      
    </form>


    <h2 style="display:flex; justify-content: center; padding: 20px;">Acervo Digital</h2>
    
</div>

<div style="height: 100px;">
    <ul class="nav justify-content-center" style="padding: 20px; font-size: 25px; justify-content: center">
        <li class="nav-item">
          <a style="color: black" class="nav-link active" aria-current="page" href="{{route('criar.index')}}">Cadastrar</a>
        </li>
        <li class="nav-item">
          <a style="color: black" class="nav-link" href="{{route('listar.index')}}">Acervo</a>
        </li>                      
    </ul>

</div>