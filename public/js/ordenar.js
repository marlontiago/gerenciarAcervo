// Função para ordenar os dados na tabela
function sortTable(columnIndex) {
    const table = document.getElementById('results'); // Tabela onde os dados estão
    const rows = Array.from(table.rows); // Cria o array para iterar com o sort()

    // Ordenar as linhas da tabela com base no conteúdo da coluna
    rows.sort((rowA, rowB) => {
        const cellA = rowA.cells[columnIndex].textContent.trim();
        const cellB = rowB.cells[columnIndex].textContent.trim();

        if (cellA < cellB) return -1;
        if (cellA > cellB) return 1;
        return 0;
    });

    // Reaplicar as linhas ordenadas na tabela
    rows.forEach(row => table.appendChild(row));
}

// Adicionar eventos de clique aos cabeçalhos da tabela
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('header-titulo').addEventListener('click', () => sortTable(1));
    document.getElementById('header-autor').addEventListener('click', () => sortTable(2));
    document.getElementById('header-genero').addEventListener('click', () => sortTable(3));
    document.getElementById('header-sinopse').addEventListener('click', () => sortTable(4));
    document.getElementById('header-data').addEventListener('click', () => sortTable(5));
});
