$(document).ready(function () {
    // Au clic du bouton btn-trash pour ouvrir la modal
    $('.btn-trash').click(function () {
        var that = $(this);
        var ajax_url = that.attr('data-ajax-url');

        var item_id = that.attr('data-item-id');
        // Requête pour ouvrir la modal
        // Target du path indiqué 
        // Récupération du contenu de la route
        $.ajax({
            type: 'POST',
            url: ajax_url,
            data: { filename: that.attr('data-ajax-filename') },
            success: function (result, status, xhr) {
                console.log(result);
                openModal(result, item_id);

                $('.btn-close').click(function () {
                    closeModal();
                })

                $('.btn-delete').click(function () {
                    that = $(this);
                    deleteItem(that);
                })

            },
            error: function (xhr, status, error) {
                $('#message').html(error);
            }
        })

    });

    function deleteItem(that) {

        ajax_url = that.attr('data-ajax-url');
        redirection_url = that.attr('data-url');

        $.ajax({
            // Requête ajax appelant la fonction delete() de l'AjaxController
            type: 'POST',
            url: ajax_url,
            data: { entity: that.attr('data-ajax-class') },
            success: function (result, status, xhr) {

                location.href = redirection_url;
            },
            error: function (xhr, status, error) {
                $('#message').html(error);
            }
        })
    }

    function openModal(result, item_id) {

        $('#modal').addClass('active');
        $('#overlay').addClass('active');
        $('#modal').html(result);

        $('.btn-delete').attr('data-ajax-url', '/admin/ajax/delete/' + item_id);
    }

    function closeModal() {
        $('#modal').removeClass('active');
        $('#overlay').removeClass('active');
    }

})