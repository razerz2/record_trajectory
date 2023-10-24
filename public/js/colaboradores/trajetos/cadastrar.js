function toggleCheckbox(checkboxId) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach((checkbox) => {

        if (checkbox.id !== 'ch' + checkboxId) {
            checkbox.checked = false;
        }
    });
}

function uncheckAllCheckboxes() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
}

let indice = 1;

function copiarSegundaColuna() {
    const checkboxes = document.querySelectorAll('#tabelaOrigem input[type="checkbox"]:checked');

    checkboxes.forEach(checkbox => {
        const origemRow = checkbox.closest('tr');
        const segundaColunaOrigemTexto = origemRow.cells[1].innerText;

        // Obter o valor da input tipo "number" oculta
        const segundaColunaOrigemInput = origemRow.cells[1].querySelector('input[type="number"]');
        const segundaColunaOrigemValor = segundaColunaOrigemInput ? segundaColunaOrigemInput.value : '';

        const destinoRow = document.createElement('tr');

        // Adicionar índice
        const indiceCell = document.createElement('td');
        indiceCell.innerText = indice;
        destinoRow.appendChild(indiceCell);

        // Adicionar conteúdo da segunda coluna (texto)
        const segundaColunaDestinoTexto = document.createElement('td');
        segundaColunaDestinoTexto.innerText = segundaColunaOrigemTexto;

        // Adicionar input do tipo "number" (oculta) com o nome desejado e o valor
        const segundaColunaDestinoInput = document.createElement('input');
        segundaColunaDestinoInput.type = 'hidden';
        segundaColunaDestinoInput.name = 'itens_locais[]';
        segundaColunaDestinoInput.value = segundaColunaOrigemValor; // Definir o valor

        // Adicionar ambos à segunda coluna na tabela de destino
        segundaColunaDestinoTexto.appendChild(segundaColunaDestinoInput);
        destinoRow.appendChild(segundaColunaDestinoTexto);

        // Adicionar botão de exclusão
        const button = document.createElement('button');
        button.innerText = 'Excluir';
        button.className = 'btn btn-danger';
        button.onclick = function () {
            destinoRow.remove();
            ajustarIndices();
        };

        const buttonCell = document.createElement('td');
        buttonCell.appendChild(button);
        destinoRow.appendChild(buttonCell);

        document.getElementById('tabelaDestino').appendChild(destinoRow);
        indice++;
    });

    uncheckAllCheckboxes();

}

function ajustarIndices() {
    const rows = document.querySelectorAll('#tabelaDestino tr');
    let i = 1;

    rows.forEach(row => {
        const indexCell = row.querySelector('td:first-child');
        if (indexCell) {
            indexCell.innerText = i;
            i++;
        }
    });

    indice = i;
}

document.getElementById("vehicleSelect").addEventListener("change", function() {
    var vehicleId = this.value;
    document.getElementById("kmAtualInput").value = "";
    
    // Realize uma chamada AJAX com Axios para buscar o valor do campo "km_atual" do veículo no servidor.
    // Substitua a URL pela rota ou endpoint correto em seu aplicativo Laravel.
    axios.get('/colaboradores/getKMAtual/'+vehicleId)
        .then(function(response) {
            var kmAtual = response.data.km_atual;
            document.getElementById("kmAtualInput").value = kmAtual;
        })
        .catch(function(error) {
            console.error(error);
        });
});

$(function () {
    $('#tabelaOrigem').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
