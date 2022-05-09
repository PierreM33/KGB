let toggle = document.querySelector('.toggle');
let body = document.querySelector('body');

toggle.addEventListener('click', function () {
    body.classList.toggle('open');
})




/*----------- PARTIE SELECT ------------
const selectionTable = function () {

    let select = document.querySelector('select');
    select.addEventListener("change", function () {


        let variable = select.options[this.selectedIndex].value;

        //Vérification du retour du bouton
        console.log(variable);

        return variable;

    });


}
//RECUPERE LE BOUTON SELECT
const buttonSelect = document.getElementById('select');

//Execute la fonction "selectionTable" au clique
buttonSelect.addEventListener('click', selectionTable);

/*-----------
ajax call php post ou voir fetch() JS */
/*
-------
*/