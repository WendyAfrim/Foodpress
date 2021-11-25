$(document).ready(function(){
    // Au clic du bouton btn-trash pour ouvrir la modal
    $('.btn-trash').click(function(){

        var that = $(this);
        var url = that.attr('data-ajax-url');

        var item_id = that.attr('data-item-id');
        // Requête pour ouvrir la modal
        // Target du path indiqué 
        // Récupération du contenu de la route
        $.ajax({
            type: 'POST',
            url: url,
            data: { filename : that.attr('data-ajax-filename')  },
            success: function(result, status, xhr){
          
            openModal(result, item_id);

            $('.btn-close').click(function(){
                closeModal();
            })

            $('.btn-delete').click(function(){
                that = $(this);
                deleteItem(that);
            })

            }, 
            error: function(xhr, status, error)
            {
                $('#message').html(error);
            }
        })

    });

    function openModal(result, item_id) {

        $('#modal').addClass('active');
        $('#overlay').addClass('active');
        $('#modal').html(result);
        
        $('.btn-delete').attr('data-ajax-url', '/admin/ajax/delete/client/' + item_id);
    }

    function closeModal() {
        $('#modal').removeClass('active');
        $('#overlay').removeClass('active');
    }

    function deleteItem(that) {

        url = that.attr('data-ajax-url');
        $.ajax({
            // Requête ajax renvoyant vers l'url indiqué
            type: 'POST',
            url: url,
            success: function(result, status, xhr){
                // alert('Well done');
                location.href = '/admin/clients';
            }, 
            error: function(xhr, status, error)
            {
                $('#message').html(error);
            }
        })
    }
})