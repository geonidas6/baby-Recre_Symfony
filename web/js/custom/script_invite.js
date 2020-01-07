$(function(){
    var btn_ajout = $("#ajout_personne");
    var profile = $('#profile option:selected').val()
    var mail_input = $("#mail_input");
    var id = $("#enseigne-info").text();
    var lien = $("#enseigne-info").attr('href');
    
    function soumettre(texte){
        $.ajax({
            url : lien,
            data : 'enseigne='+id+'&invite='+texte+'&Defaultprofile='+profile,
            method : "POST",
            dataType : "json",
            success : function(data){
                $.notify(data.message, "success");
                mail_input.val("");
            },
            error : function(data){
                data=JSON.parse(data.responseText);
                $.notify(data.message, "error");
            }
        });
    }

    btn_ajout.click(function(e){
        var texte = mail_input.val().trim();
        console.log(texte);

            if(texte != ''){
                $.notify("Envoi de l'invitation en cours","information");
                soumettre(texte);
            }else{
                $.notify("Veuillez remplir le champ "+profile,"warning");
            }

    });

});