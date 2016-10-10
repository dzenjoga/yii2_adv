$(".like-btn").click(
    function()
    {
        $.ajax(  
            {
                  url: "{$like_url}",
                  type: "POST",
                  data: { id: $(this).data("id") },
                  dataType: "json"
            }       
                    
        ).done(
            function()
            {
                alert('like!');
            }
        );    
    }
);

