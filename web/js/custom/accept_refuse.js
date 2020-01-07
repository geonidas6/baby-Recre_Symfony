
$(function() {
    var lien_accept = $("#accept-request").attr('href');
    var lien_refuse = $("#refuse-request").attr('href');

        function handleAccept(that){
           var id= that.closest('tr').attr('id');
            $.notify("Requête en cours",'information');
            $.ajax({
                url : lien_accept,
                data : 'message='+id,
                method : "POST",
                dataType : "json",
                success : function(data){
                    $.notify(data.message, "success");
                   // location.reload();
                    that.closest('tr').fadeOut();
                },
                error : function(data){
                    data=JSON.parse(data.responseText);
                    $.notify(data.message, "error");
                }
            });
        }

        function handleRefuse(that){
            var id= that.closest('tr').attr('id');
            $.notify("Requête en cours",'information');
            $.ajax({
                url : lien_refuse,
                data : 'message='+id,
                method : "POST",
                dataType : "json",
                success : function(data){
                    $.notify(data.message, "success");
                   // location.reload();
                    that.closest('tr').fadeOut();
                },
                error : function(data){
                    data=JSON.parse(data.responseText);
                    $.notify(data.message, "error");
                }
            });
        }

        $('.refuse-request').click(function (e) {
            e.preventDefault();
            handleRefuse($(this));
        });

        $('.accept-request').click(function (e) {
            e.preventDefault();
            handleAccept($(this));
        });
    }
);
