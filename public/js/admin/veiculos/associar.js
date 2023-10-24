document.getElementById('userSelect').addEventListener('change', function () {
    var userId = this.value;

    if (userId) {
        axios.get(`/admin/getVeiculosNotAssociados/${userId}`)
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

$(function() {
    $('#sua-tabela').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});

function deletar_modal(id, nome) {
    document.getElementById('id_registro').value = id;
    document.getElementById('info-name').innerText = nome;
};

function acionarSubmit() {
    var id = document.getElementById('id_registro').value;
    document.getElementById('form' + id).submit();
}