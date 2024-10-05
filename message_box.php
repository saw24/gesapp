<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalMessageBody">
                <!-- Message content will be inserted here -->
            </div>
            <div class="modal-footer">
                <button id="btn_fermerMessageBox" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    function afficherMessage(paramMessage, paramTypeMessage) {
        var modalBody = $('#modalMessageBody');
        var modalTitle = $('#messageModalLabel');
        var btn_fermerMessageBox = $('#btn_fermerMessageBox');

        // Set the message content
        modalBody.text(paramMessage);

        // Set the modal title and style based on the message type
        switch (paramTypeMessage) {
            case 'Info':
                modalTitle.text('Information');
                modalBody.css('color', 'blue');
                break;
            case 'Alerte':
                modalTitle.text('Alerte');
                modalBody.css('color', 'red');
                btn_fermerMessageBox.css('background-color', 'red');

                break;
            case 'Succès':
                modalTitle.text('Succès');
                modalBody.css('color', 'green');
                break;
            default:
                modalTitle.text('Message');
                modalBody.css('color', 'black');
        }

        // Show the modal
        $('#messageModal').modal('show');
    }

    /*// Example usage
    $(document).ready(function() {
        // Call the function with example parameters
        afficherMessage('Ceci est un message d\'information.', 'Info');
    });*/
</script>