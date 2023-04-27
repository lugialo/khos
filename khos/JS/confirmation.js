function confirmation()
{
    var x = confirm("Tem certeza de que deseja deletar o usuário selecionado?");
    if (x==true)
    {
        return true;
    }else
    {
        return false;
    }
}