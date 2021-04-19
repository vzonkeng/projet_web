
    $(document).ready(function(){


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











        $("#flip").click(function(){
            $("#panel").slideToggle("slow");
        });

        $('h4').click(function() {
            $(this).css({
                'font-size' : '130%',
                'color' : '#F00'

            });
        });

    });

