/* script qui se lance sur la home page */
$(document).ready(()=> {
    /* --------------------------------------------------------------------------------------------------------------
                                            fonctions
     -------------------------------------------------------------------------------------------------------------- */
    function showConnexion(){
        $("#inscription_toogle").removeClass("active");
        $("#connexion_toogle").addClass('active');
        $("#inscription").hide();
        $("#connexion").show();
    }

    function showInscription(){
        $("#connexion_toogle").removeClass("active");
        $("#inscription_toogle").addClass('active');
        $("#inscription").show();
        $("#connexion").hide();
    }




    /* --------------------------------------------------------------------------------------------------------------
                                            events
     -------------------------------------------------------------------------------------------------------------- */
    showInscription();
    $("#inscription_toogle").click(showInscription);
    $("#connexion_toogle").click(showConnexion);
})
