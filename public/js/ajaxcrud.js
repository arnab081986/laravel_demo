$( document ).ready(function() {
    $(document).on('submit', 'form#frm_create', function (event) {
        event.preventDefault();
        var form = $(this);
        var data = new FormData($(this)[0]);
        var url = form.attr("action");
        console.log(data);
        /* $.ajax({
            type: form.attr('method'),
            url: url,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.is-invalid').removeClass('is-invalid');
                if (data.fail) {
                    for (control in data.errors) {
                        $('#' + control).addClass('is-invalid');
                        $('#error-' + control).html(data.errors[control]);
                    }
                } else {
                    ajaxLoad(data.redirect_url);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("Error: " + errorThrown);
            }
        }); */


        $.ajax({
            url: "http://query.yahooapis.com/v1/public/yql",
         
            // The name of the callback parameter, as specified by the YQL service
            jsonp: "callback",
         
            // Tell jQuery we're expecting JSONP
            dataType: "jsonp",
         
            // Tell YQL what we want and that we want JSON
            data: {
                q: "select title,abstract,url from search.news where query=\"cat\"",
                format: "json"
            },
         
            // Work with the response
            success: function( response ) {
                console.log( response ); // server response
            }
        });
        return false;
    });
});
