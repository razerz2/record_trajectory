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