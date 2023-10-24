$(function() {
    $("#sua-tabela").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#sua-tabela2').DataTable({
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