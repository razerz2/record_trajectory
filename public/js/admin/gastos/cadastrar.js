document.getElementById('userSelect').addEventListener('change', function () {
    var userId = this.value;

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

document.getElementById('GastosSelect').addEventListener('change', function () {
    var gastoSelect = document.getElementById('GastosSelect');
    var inputLitros = document.getElementById('inputLitros');
    var labelLitros = document.getElementById('labeltLitros');
  
    if (gastoSelect.value === 'Combustível') {
      labelLitros.style.display = 'block';
      inputLitros.style.display = 'block';
      inputLitros.setAttribute('required');
    
    } else {
      labelLitros.style.display = 'none';
      inputLitros.style.display = 'none';
      inputLitros.value = '0';
      inputLitros.removeAttribute('required');
    }
});
  
function formatarMoeda(input) {
    // Obtém o valor do input removendo possíveis caracteres não numéricos
    let valor = input.value.replace(/\D/g, '');

    // Formata o valor como moeda
    valor = (valor / 100).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

    // Atualiza o valor do input
    input.value = valor;
}

function formatarLitros(input) {
    // Remove todos os caracteres que não são dígitos ou ponto
    input.value = input.value.replace(/[^\d.]/g, '');

    // Remove zeros à esquerda
    input.value = input.value.replace(/^0+(\d)/, '$1');

    // Mantém apenas dois dígitos após o ponto
    input.value = input.value.replace(/(\.\d{2})\d+/g, '$1');
}
