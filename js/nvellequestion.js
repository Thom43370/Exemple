//AJOUT D'UNE PROPOSITION
$('#propositionAjout').ready(function () {
   
    $('#valideproposition').click(function(){
        var erreur = 0;
        console.log('c\'est pret');
        console.log($('#categorie').val());
        console.log($('#proposition').val().length);
        if ($('#proposition').val().length<2) {
            $('#comproposition').fadeIn();
            $('#proposition').css('border:2px, solid red');
            erreur++;
        }
        if ($('#categorie').val() != 'equipement'){
            if($('input[type=radio][name=type]:checked').length == 0) {
                //erreur++;
                $('#comtype').fadeIn();
            }
        }else{ 
            if ($('#nomitem1').val().length<2){
                $('#comitem').fadeIn();
                erreur++;
            }
        }   
        console.log('erreur='+erreur);
        if(erreur==0){
            var resume = '';
            resume += '<p>' + $('#proposition').attr('name') + ' = ' + $('#proposition').val() + '</p>';
            if($('#categorie').val()!='equipement'){
                resume += '<p> Type = ' + $('input[type=radio][name=type]:checked').attr('value') + '</p>';
            }else{
                for(var j=1; j<=8; j++){
                    if($('#nomitem'+j).val().length>0){
                        resume += '<p>item'+j+' = '+$('#nomitem'+j).val();
                    }
                }
            }
            
            $('#propositionAjout').fadeOut();
            $('#confirmeproposition2').append('<h3>Ta proposition</h3>' + resume);
            $('#confirmeproposition').fadeIn(); 
        }
    });
    $('#annuleAjoutProposition').click(function(){
        $('#propositionAjout').fadeIn();
        $('#confirmeproposition2').html('');
        $('#confirmeproposition').fadeOut();
    });
})


$(document).ready(function(){
    $('#checktous').click(function() {
        // on cherche les checkbox à l'intérieur de l'id  'magazine'
        var magazines = $("#choixquestion").find(':checkbox'); 
        if(this.checked){ // si 'checkAll' est coché
           magazines.prop('checked', true); 
        }else{ // si on décoche 'checkAll'
           magazines.prop('checked', false);
        }          
    }); 
    $('#checkform').click(function() {
        // on cherche les checkbox à l'intérieur de l'id  'magazine'
        var magazines = $("#choixForm").find(':checkbox'); 
        if(this.checked){ // si 'checkAll' est coché
           magazines.prop('checked', true); 
        }else{ // si on décoche 'checkAll'
           magazines.prop('checked', false);
        }          
    }); 
    $('#checklev').click(function() {
        // on cherche les checkbox à l'intérieur de l'id  'magazine'
        var magazines = $("#choixlev").find(':checkbox'); 
        if(this.checked){ // si 'checkAll' est coché
           magazines.prop('checked', true); 
        }else{ // si on décoche 'checkAll'
           magazines.prop('checked', false);
        }          
    });
    $('#checkequi').click(function() {
        // on cherche les checkbox à l'intérieur de l'id  'magazine'
        var magazines = $("#choixequi").find(':checkbox'); 
        if(this.checked){ // si 'checkAll' est coché
           magazines.prop('checked', true); 
        }else{ // si on décoche 'checkAll'
           magazines.prop('checked', false);
        }          
    });
    /*$('#selection').click(function() {
        // on cherche les checkbox à l'intérieur de l'id  'magazine'
        var magazines = $("#choixquestion").find(':checkbox');
            if(magazines.prop('checked')== true){
                var name=magazines.prop('name');
                console.log(name);
                console.log(magazines.val());
                $('#affquest').append(name);
            }
    });*/
    $('#nomquestionnaire').keypress(function(){
        setTimeout(function(){
            var long=$('#nomquestionnaire').val().length;
            if(long>2){
                $('#enregisterquestion').attr('disabled', false);
            }else{
                $('#enregisterquestion').attr('disabled', true);
            }
        },50);
    });
    $('#enregisterquestion').click(function(){
        var question=new Array();
        var compteur_item=1;
        $("input[type='checkbox']:checked").each(function (i){
            if($(this).attr('name')!=null){
                if(compteur_item==4){
                    question[i]="<span class='pl-3 pt-3 pr-3 pb-3 chapeau'>"+$(this).attr('name')+" / "+$(this).val()+"</span><br /><br />";
                    compteur_item=1;
                }else{
                    question[i]="<span class='pl-3 chapeau'>"+$(this).attr('name')+" / "+$(this).val()+" - </span>";
                    compteur_item++;
                }
            }
          });
        $('#ConfirmationQuestionnaire').append(question);
        if(question!=null){
            $('#ConfirmationQuestionnaire').append('<br /><p class="pt-5 mt-5 text-center"><input type="submit" /></p>');
        }
          //alert(question);
        $('#ConfirmationQuestionnaire').fadeIn();
    });
    $('#fermerconfirme').click(function(){
        $('#ConfirmationQuestionnaire').fadeOut();
    });
});


/******************************************************************************************************************************************************************************************************/
/****LES TITRES********LES TITRES********LES TITRES********LES TITRES********LES TITRES********LES TITRES********LES TITRES********LES TITRES********LES TITRES********LES TITRES********LES TITRES****/
/******************************************************************************************************************************************************************************************************/

$('#AffichTitres').ready(function() {
    /* Affichage des select et selection du titre + efface le titre utilisé */
    $('.titreselect').each(function() {
            Recharge();
            $(this).change(function() {
                if ($(this).val() != '') {
                    var nom = $(this).val();
                    var lettre = $(this).attr('alt');
                    //console.log(nom);
                    $('.optiontitre' + nom).fadeOut();
                    var textetitre = $('.optiontitre' + nom).attr('alt');
                    $('#affichetitre2' + lettre).append(textetitre);
                    $('#' + lettre).attr('alt', nom);
                    //console.log('le alt de modif=' + $('#' + nom).attr('alt'));
                    $('#affichetitre' + lettre).css('display', 'block');
                    $('#titre-' + lettre).fadeOut();
                    $('#lesquestions' + lettre).fadeIn();
                    Rechargequestion(lettre, nom);
                    //console.log(textetitre);

                }
            })
        })
        /**+ de titres affichés */
    $('#Afficheplusdetitres').click(function() {
            var debut = $('#Afficheplusdetitres').attr('alt');
            var fin = parseInt(debut) + parseInt(10);
            for (var i = debut; i <= fin; i++) {
                $('#ligne' + i).css('display', 'block');
            }
            $('#Afficheplusdetitres').attr('alt', fin)
        })
        /**Affiche Formulaire et réinitialise le formulaire*/
    $('#Ajouteruntitre').click(function() {
        $('#AfficheFormulaireAjoutTitre2').html('<p> <em> le nouveau titre: </em><input type="text" id="nouveautitre" /></p>');
        $('#AfficheFormulaireAjoutTitre').css('display', 'block');
        $('#ChoixTitre').css('display', 'none');
    })

    /**Annule l'ajout d'un titre */
    $('#AnnuleAjoutTitre').click(function() {
        $('#AfficheFormulaireAjoutTitre').css('display', 'none');
        $('#ChoixTitre').css('display', 'block');
        Recharge();
    })

    /*Modifier la selection et réapparition du titre dans la liste déroulante */
    $('.modif').each(function() {
        $(this).click(function() {
            var lettre = $(this).attr('id');
            var id = $(this).attr('alt');
            // console.log('le name de id ' + lettre + ' est=' + id);
            $('.optiontitre' + id).fadeIn();
            $('#affichetitre' + lettre).fadeOut();
            $('#affichetitre2' + lettre).html('');
            $('#titre-' + lettre).fadeIn();
        })
    })



    /* AJOUTER titre validé */
    $('#ConfirmeAjoutTitre').click(function() {
        //console.log($('#nouveautitre').val());
        if ($('#nouveautitre').val() != '') {
            //$('#ajoutregle').fadeOut();
            $.post('php/ajouterTitre.php', {
                    titre: $('#nouveautitre').val()
                })
                .done(function(dataref) {
                    //console.log('ajout ok');
                    $('#AfficheFormulaireAjoutTitre2').html(dataref);
                    Recharge();
                    $('#AfficheFormulaireAjoutTitre').css('display', 'none');
                    $('#ChoixTitre').css('display', 'block');
                })
                .fail(function() {
                    $('#AfficheFormulaireAjoutTitre2').html('ca remerde!!!!');
                });
        } else {
            $('#AfficheFormulaireAjoutTitre2').html('un pb de contenu');
        }
    });

    /**Recharge les selects */
    function Recharge() {
        $.getJSON("php/SelectTitre.php", function(data) {
            var select = $(".titreselect");
            select.html('');
            select.append('<option value="">Fais ton choix</option>');
            $.each(data, function(index, array) {
                var long = array.length;
                for (var i = 0; i <= long - 1; i++) {
                    //console.log(i);
                    select.append('<option class="optiontitre' + array[i].id + '" value="' + array[i].id + '" alt="' + array[i].titre + '">' + array[i].titre + '</option>');
                }
            });

        });
    }



    /******************************************************************************************************************************************************************************************************/
    /******** LES QUESTIONS ****************** LES QUESTIONS ****************** LES QUESTIONS ****************** LES QUESTIONS ****************** LES QUESTIONS ****************** LES QUESTIONS **********/
    /******************************************************************************************************************************************************************************************************/

    function Rechargequestion(lettre, id) {
        $.getJSON("php/SelectQuestion.php?id=" + id, function(data) {
            var select = $(".questionselect" + lettre);
            select.html('');
            select.append('<option value="">Fais ton choix</option>');
            $.each(data, function(index, array) {
                var long = array.length;
                //console.log(array);
                if (long > 0) {
                    for (var i = 0; i <= long; i++) {
                        if (array[i] != "udefined") {
                            //console.log(i);
                            select.append('<option class="optionquest' + array[i].id + '" value="' + array[i].id + '" alt="' + array[i].question + '">' + array[i].question + ' - ' + array[i].verif + '</option>');
                        }
                    }
                }

            });
        });
    }

    /**La selection de la question et disparition de la liste deroulante de cette question */
    $('.questionsel').each(function() {
        $(this).change(function() {
            var id = $(this).val();
            var nom = $(this).attr('alt');
            var lettre = $(this).attr('title');
            var textequestion = $('.optionquest' + id).attr('alt');
            //console.log('lettre: ' + lettre + ' id: ' + id + '- nom: ' + nom + '- texte: ' + textequestion);
            $('#affichequestion2' + nom).prepend(textequestion);
            $('.optionquest' + id).fadeOut();
            $('#affichequestion' + nom).fadeIn();
            $('#' + nom).attr('alt', id);
            $('#question-' + nom).fadeOut();
        })
    })


    /**DESELECTION QUESTION */
    $('.modifquest').each(function() {
        $(this).click(function() {
            var nom = $(this).attr('id');
            var id = $(this).attr('alt');
            //console.log(id + nom);
            $('.optionquest' + id).fadeIn();
            $('#affichequestion' + nom).fadeOut();
            $('#affichequestion2' + nom).html('');
            $('#question-' + nom).fadeIn();
        })
    })

    /**Affchage du formumlaire d'ajout de question */
    $('.ajquest').each(function() {
        $(this).click(function() {
            var lettre = $(this).attr('alt');
            var idtitr = $('#' + lettre).attr('alt');
            $('#AfficheFormquestion' + lettre).fadeIn();
            $('#AfficheFormquestion2' + lettre).html('');
            $('#AfficheFormquestion2' + lettre).append('<input type="hidden" id="idtitre" value="' + idtitr + '"/><p class="text-center">Nouvelle question: <input type="text" id="nouveauquestion" size="80" /></p> <p class = "mt-5 mb3" > Le type de Vérification: </p><p><input type="radio" value="V.L" name="verif" /> V.L - <input type="radio" value="VF.L" id="verif" name="verif" /> VF.L - <input type="radio" value="VF.E" id="verif" name="verif" /> VF.E - <input type="radio" value="VFE.L" id="verif" name="verif" /> VFE.L </p><p> ou </p><p><input type="radio" value="V" id="verif" name="verif" /> V - <input type="radio" value="VF" id="verif" name="verif" /> V.F -<input type="radio" value="VFE" id="verif" name="verif" /> VF.E </p>');
        })
    })

    /**.affplusquest pour plus de questions a Aff */
    /** .ajquest afficher la div pour Ajout question*/
    /** .formajoutquest nom de la div de form ajout*/
    /** .validationquest validation form ajout question*/


    /**Ajout d'une question a la bdd */
    $('.validationquest').each(function() {
        $(this).click(function() {
            var lettre = $(this).attr('alt');
            var verif=$('input[type=radio][name=verif]:checked').val();
            console.log($('#nouveauquestion').val()+ $('#idtitre').val()+$('#verif').val());
            if ($('#nouveauquestion').val() != '' && $('#idtitre').val() != '' && $('#verif').val() != '') {
                //$('#ajoutregle').fadeOut();
                $.post('php/ajouterQuestion.php', {
                        idtitre: $('#idtitre').val(),
                        question: $('#nouveauquestion').val(),
                        verif: $('#verif').val()
                    })
                    .done(function(dataref) {
                        console.log('ajout ok');
                        Rechargequestion(lettre, $('#idtitre').val());
                        $('#AfficheFormquestion2' + lettre).html(dataref);

                        $('#AfficheFormquestion' + lettre).css('display', 'none');
                        //$('#ChoixTitre').css('display', 'block');
                    })
                    .fail(function() {
                        $('#AfficheFormquestion2' + lettre).html('ca remerde!!!!');
                    });
            } else {
                $('#AfficheFormquestion2' + lettre).html('la question n\'est pas renseignée');
            }
        })
    })
    $('#ValidationFormulaire').click(function() {
        if ($('#nom').val() == '' || $('#nom').val() == ' ') {
            $('#nom').css('border', '3px solid red');
        } else {
            $('#ContenuForm').append('<h3 class="text-center">' + $('#nom').val() + '</h3>');

            $('.affichetititreContenu').each(function() {
                if ($(this).text() != '') {
                    var titre = $(this).text();
                    var lettre = $(this).attr('alt');
                    console.log(titre + lettre);
                    titre = '<br/><br /><p><strong>Titre ' + lettre + ' : ' + titre + '</strong></p>';
                    var question = '';
                    $('.questionContenu' + lettre).each(function() {
                        if ($(this).text() != '') {
                            var quest = $(this).text();
                            var nom = $(this).attr('alt');
                            question += '<p>' + nom + '/ ' + quest + '</p>';
                            //console.log(nom + '/ ' + question[nom] + ' ' + lettre);
                        }
                    })
                    //console.log(titre + question);
                    $('#ContenuForm').append(titre + question);
                }
            })
            $('#ConfirmationFormulaire').fadeIn();

            $('#ChoixTitre').css('display', 'none');
        }
    })

    $('.affplusquest').each(function() {
        $(this).click(function() {
            var lettre = $(this).attr('alt');
            for (var i = 16; i <= 30; i++) {
                $('#lign' + lettre + i).css('display', 'block');
            }
        })
    })

    $('.annuleform').each(function() {
        $(this).click(function() {
            var lettre = $(this).attr('alt');
            $('#AfficheFormquestion' + lettre).fadeOut();
        })
    })

    $('#Correction').click(function() {
        $('#ConfirmationFormulaire').fadeOut();
        $('#ContenuForm').html('');
        $('#ChoixTitre').css('display', 'block');
    })
    $('.annuleform').each(function() {
        $(this).click(function() {
            var id = $(this).attr('id');
            $('#' + id).fadeOut();
            //$('#AfficheFormquestion2' + lettre).append('<input type="hidden" id="idtitre" value="' + idtitr + '"/><p class="text-center">Nouvelle question: <input type="text" id="nouveauquestion" /></p>');
        })
    })
});