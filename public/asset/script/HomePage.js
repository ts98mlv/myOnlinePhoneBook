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

    function clearForm(form){
        $(form).find("input").val("");
    }


    /* --------------------------------------------------------------------------------------------------------------
                                            events
     -------------------------------------------------------------------------------------------------------------- */
    showInscription();
    $("#inscription_toogle").click(showInscription);
    $("#connexion_toogle").click(showConnexion);


    /* --------------------------------------------------------------------------------------------------------------
                                        on Inscription Form Submit
    -------------------------------------------------------------------------------------------------------------- */
    $("#inscription > form").submit(function (event){
        event.preventDefault();

        // on récupère l'action
        const action = $(this).attr("action");

        let data = {};
        let formData = new FormData(event.target);

        //requête ajax
        fetch(action, {
            method: 'POST',
            body: formData
        }).then(function (response) {
            if(response.status === 200) {
                $.notify("L'insription a bien été enregistrée !", "success", {autoHideDelay: 10000});
                clearForm(event.target)
            }
            else if(response.status === 403){
                $.notify("L'email a déjà été utilisée !", "error", {autoHideDelay: 10000});
                clearForm(event.target)
            }
            else
                $.notify("Il y a eu un problème, réessayer plus tard ou contacter l'administrateur du site !", "error", {autoHideDelay: 10000})
        })
    })

})
