document.getElementById('filtrar').addEventListener('keyup', function(){
    let query = this.value;
    
    fetch(`/gerenciarLivros/public/filtrar?query=${query}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
                
        let tbody = document.getElementById('results');
        tbody.innerHTML = '';

        data.forEach(item => {

            

            let row = `                  
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.titulo}</td>
                        <td>${item.autor}</td>
                        <td>${item.genero}</td>
                        <td>${item.sinopse}</td>
                        <td>${item.data}</td>
                        <td>
                        <a class="btn btn-primary" href="{{route('editar.livro', $livro->id)}}">Editar</a>
                        </td>
                        <td>
                        <form action="{{route('excluir.livro', $livro->id)}}" method="POST">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja remover esse registro ?')" class="btn btn-danger">Excluir</button>
                        </form>
                        </td>

                    </tr>`;
                tbody.innerHTML += row;   
        });
    }).catch(error => console.error('Erro na requisição', error));
    
});