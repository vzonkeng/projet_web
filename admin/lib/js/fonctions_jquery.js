
    $(document).ready(function(){


        $(".deleteproduit").click( function(){
            var idproduit = $(this).attr("id");
            var parametre = '&id='+idproduit;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'text',
                url: './lib/php/ajax/ajaxSupprimerProduit.php',
                success: function (data) {
                    console.log(data);
                    location.reload();
                }
            });
        });


        $(".deleteutilisateur").click( function(){
            var idutlisateur = $(this).attr("id");
            var parametre = '&id='+idutlisateur;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'text',
                url: './lib/php/ajax/ajaxSpprimerClient.php',
                success: function (data) {
                    console.log(data);
                    location.reload();
                }
            });
        });


        $('#submit_id').remove();

        $('span[id]').click(function(){
            //text() : récupérer le contenu quand ce n'est pas un champ de formulaire
            //val() : contenu d'un champ de formulaire
            //récupération du contenu d'origine
            var valeur1 = $.trim($(this).text());
            //récupération des attributs name et id de la zone cliquée
            var ident = $(this).attr("id"); //valeur de l'id
            var name = $(this).attr("name"); //champ à modifier
            //alert("ident  = "+ident+" et name = "+name);
            $(this).blur(function(){
                var valeur2 = $.trim($(this).text());
                //alert("valeur 1 : "+valeur1+ " valeur2 : "+valeur2);
                if(valeur1 != valeur2){
                    //écriture des paramètres de l'URL
                    var parametre = 'champ='+name+'&id='+ident+'&nouveau='+valeur2;
                    //alert(parametre);
                    $.ajax({
                        type: 'GET',
                        data: parametre,
                        dataType: 'text',
                        url: './lib/php/ajax/ajaxUpdateProduit.php',
                        success: function(data){
                            console.log(data);
                        }
                    });
                }
            });
        });








        $('#id').blur(function(){
            //on relève la valeur entrée dans l'input
            var id = $(this).val(); //val() : uniquement pour les inputs
            //alert("id : "+id);
            var parametre = "idproduit="+id;
            $.ajax({
                type: 'GET',
                data: parametre, //ce qui est envoyé à ajaxProduitDetail
                datatype: 'json',
                url: './lib/php/ajax/ajaxDetailProduit.php',
                success: function(data) { //data : ce qui est reçu de ajaxProduitDetail
                    console.log(data);
                    $('#idproduit').html("<br><b>"+data[0].nomproduit+"</b><br>"+data[0].reference);
                    $('#image_produit').html('<img src="admin/image/'+data[0].photo+'" alt="illustration">');
                }
            });
        });



        $('#choix_produit').change(function () {
            // recuperer la valeur de l'attribut name'
            var attribut = $(this).attr('name');
            //valeur de cette attribut
            var id = $(this).val();
            var parametre = "idproduit=" + id;
            $.ajax({
                type: 'GET',
                data: parametre, //ce qui est envoyé à ajaxProduitDetail
                datatype: 'json',
                url: './admin/lib/php/ajax/ajaxDetailProduit.php',
                success: function (data) { //data : ce qui est reçu de ajaxProduitDetail
                    console.log(data);
                    $('#id_produit').html("<br><b>" + data[0].nomproduit + "</b><br>" + data[0].reference);
                    $('#image_produit').html('<img src="admin/image/' + data[0].photo + '" alt="Illustration">');
                }
            })
        });

        $('#editer_ajouter').text('Mettre à jour ou Nouveau ');

//blur : perte de focus
        $('#description').blur(function(){
            var ref = $(this).val();
            if(ref != ''){
                var parametre="ref="+ref;
                $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: 'json',
                    url: './lib/php/ajax/ajaxDescriptionByproduit.php',
                    success: function(data){
                        console.log(data);
                        $('#denomination').val(data[0].nomproduit);
                        if($('#denomination').val()!='') {
                            $('#editer_ajouter').text('Mettre à jour');
                            $('#action').attr('value','editer');
                            $('#idproduit').attr('value',data[0].idproduit);
                        } else {
                            $('#editer_ajouter').text('Insérer');
                            $('#action').attr('value','inserer');
                        }
                        $('#reference').val(data[0].reference);
                        $('#prix').val(data[0].prix);
                        $('#stock').val(data[0].stock);
                        $('#categorie').val(data[0].idcategorie);
                        $('#photo').val(data[0].photo);
                    }
                });
                $('#description').click(function(){
                    $('#description').val('');
                    $('#denomination').val('');
                })
            }
        });





        $('#editer').click(function (){

            var id = $.trim($('#idproduit').val());
            var nom = $.trim($('#nomproduit').val());
            var description = $.trim($('#description').val());
            var reference = $.trim($('#reference').val());
            var prix = $.trim($('#prix').val());
            var stock = $.trim($('#stock').val());
            var id_categorie = $.trim($('#idcategorie').val());

            var parametre = 'idproduit='+id+'&nom='+encodeURIComponent(nomproduit)+'&description='+encodeURIComponent(description)+'&prix='+encodeURIComponent(prix)+'&stock='+stock+'&id_categorie='+id_categorie;

            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url:'./lib/php/ajax/ajaxUpdateProduit.php',
                success: function (data){
                    console.log(data);
                }
            });
            setTimeout(function(){location.reload()}, 100);
        });











        $("#flip").click(function(){
            $("#panel").slideToggle("slow");
        });

        $('h4').click(function() {
            $(this).css({
                'font-size' : '130%',
                'color' : '#F00'

            });
        });





//blur : perte de focus
        $('#reference').blur(function(){
            var ref = $(this).val();
            if(ref != ''){
                var parametre="ref="+ref;
                $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: 'json',
                    url: './admin/lib/php/ajax/ajaxDescriptionUtilisateur.php',
                    success: function(data){
                        console.log(data);
                        $('#nom').val(data[0].nom);
                        if($('#nom').val()!='') {
                            $('#editer_ajouter').text('Mettre à jour');
                            $('#action').attr('value','editer');
                            $('#idutlisateur').attr('value',data[0].idutlisateur);
                        } else {
                            $('#editer_ajouter').text('Insérer');
                            $('#action').attr('value','inserer');
                        }
                        $('#prenom').val(data[0].prenom);
                        $('#localite').val(data[0].localite);
                        $('#pseudo').val(data[0].pseudo);
                        $('#mdp').val(data[0].mdp);
                        $('#date_naissance').val(data[0].date_naissance);

                    }
                });
                $('#reference').click(function(){
                    $('#reference').val('');
                    $('#nom').val('');
                })
            }
        });




        $(".info_produit").click(function () {
            var id = $(this).data('id');//get the id of the selected button
            var parametre = "id="+id;
            var retour = $.ajax ({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: "./admin/lib/php/ajax/ajaxInfoProduit.php",
                success: function(data) {
                    console.log(data);
                    $('.modal-title').html("<b>"+data[0].nomproduit+"</b>");
                    prix = "<br>Seulement "+data[0].prix+" euros pièce !";
                    $('.modal-body').html("Parmi nos "+data[0].reference+": <b>"+data[0].description+"</b><br>Plus que "+data[0].stock+" disponibles"+prix);
                },
                fail: function(){
                    console.log("fail");
                }
            });




        });


        $('#clic_panier').click(function () {
            //un effet blink sur le panier lorsque cliqué
            $(this).fadeOut(200).fadeIn(200);
            //on relève la quantité sélectionnée dans la liste déroulante
            var cb = $('#quantite option:selected').val();
            //on récupère l'id du produit
             var id = $(".info_produit").data('id');
            //ajax : on place dans un panier (au moins temporaire)
            //...

        });


    });