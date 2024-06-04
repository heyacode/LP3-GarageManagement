$(document).ready(function() {
    // Afficher la fenêtre modale pour ajouter un client
    $('#add-client-modal').on('click', function() {
        $('#add-client-form').modal('show');
    });

    // Afficher la fenêtre modale pour éditer un client
    $('.edit-client').on('click', function() {
        var clientId = $(this).data('id');
        $.get('/clients/' + clientId + '/edit', function(data) {
            $('#edit-client-form').html(data);
            $('#edit-client-modal').modal('show');
        });
    });

    // Supprimer le client
    $('.delete-client').on('click', function() {
        var clientId = $(this).data('id');
        if (confirm('Êtes-vous sûr de vouloir supprimer ce client ?')) {
            $.ajax({
                type: 'DELETE',
                url: '/clients/' + clientId,
                success: function(response) {
                    alert(response.success);
                    location.reload();
                }
            });
        }
    });
});
