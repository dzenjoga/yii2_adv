$('.like-btn').click(
    function()
    {
        $.ajax(  
            {
                  url: 'ajax/like',
                  type: 'POST',
                  data: { id: $(this).data('id') },
                  dataType: 'json'
            }                          
        ).done(
            function()
            {
                alert('like!');
            }
        );    
    }
);

