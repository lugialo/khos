var search = document.getElementById('buscar');

search.addEventListener("keydown", function(event){
if (event.key === "Enter")
{
    searchUser();
}
});

function searchUser()
{
    window.location = 'user.php?search='+search.value;
}