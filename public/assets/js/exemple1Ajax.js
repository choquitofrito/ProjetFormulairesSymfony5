
console.log(" {{path ('exemple1_traitement' )}}");

envoyerNom.addEventListener("click", function (event) {
    event.preventDefault();

    console.log(document.getElementById("leFormulaire"));

    // on génére la route
    let route = Routing.generate('exemple1_traitement'); // pas de slug, pas de paramètres dans la route

    axios({
        url: route,
        method: 'POST',
        headers: { 'Content-Type': 'multipart/form-data' },
        data: new FormData(document.getElementById("leFormulaire"))
    })
        .then(function (response) {
            // response.data est un objet qui correspond à l'array associatif envoyé dans le controller
            // JsonResponse a transformé l'array en JSON. Axios transforme le JSON en objet JS
            // (et on utilise ici la clé "leMessage")
            document.getElementById("divMessage").innerHTML = response.data.leMessage;
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
});
