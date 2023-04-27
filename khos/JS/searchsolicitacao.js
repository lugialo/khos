var search = document.getElementById('buscar');

search.addEventListener("keydown", function
(event){
if (event.key === "Enter")
{
    searchSolicitacao();
}    
});

function searchSolicitacao()
{
    window.location = 'soli.php?search='+search.value;
}