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

var vehiclesData; // Variável para armazenar os dados dos veículos

document.getElementById('userSelect').addEventListener('change', function () {
    var userId = this.value;
    document.getElementById('kmAtualInput').value = '';

    if (userId) {
        axios.get(`/admin/getVeiculosForUser/${userId}`)
            .then(function (response) {
                var vehiclesSelect = document.getElementById('vehicleSelect');
                vehiclesSelect.innerHTML = ''; // Limpar as opções anteriores

                vehiclesData = response.data; // Armazenar os dados dos veículos

                vehiclesData.forEach(function (vehicle) {
                    var option = document.createElement('option');
                    option.value = vehicle.id_veiculo;
                    option.textContent = vehicle.modelo;
                    vehiclesSelect.appendChild(option);
                });

                // Habilitar o segundo select após preencher as opções
                vehiclesSelect.disabled = false;

                // Atualizar o campo de "km_atual" com o primeiro veículo por padrão
                document.getElementById('kmAtualInput').value = vehiclesData[0].km_atual;
            })
            .catch(function (error) {
                console.error('Erro ao obter veículos:', error);
            });
    } else {
        // Se nenhum usuário foi selecionado, desabilitar o segundo select
        document.getElementById('vehicleSelect').disabled = true;
        document.getElementById('vehicleSelect').innerHTML =
            '<option value="" disabled selected>Selecione um usuário primeiro</option>';
    }
});

document.getElementById('vehicleSelect').addEventListener('change', function () {
    var selectedVehicleId = this.value;

    // Encontre o veículo selecionado
    var selectedVehicle = vehiclesData.find(function (vehicle) {
        return vehicle.id_veiculo == selectedVehicleId;
    });

    // Atualize o campo de "km_atual"
    document.getElementById('kmAtualInput').value = selectedVehicle.km_atual;
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
