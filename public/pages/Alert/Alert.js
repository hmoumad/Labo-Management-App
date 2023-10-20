function ShowAlert(Msg,color,brdcolor)
{
    alertShow=document.getElementById("alertShow");
    alertShow.style.display="block";
    alertShow.style.backgroundColor=color;
    alertShow.style.borderColor=brdcolor;
    alertShow.innerHTML+=Msg;
    setTimeout(function(){
        // a.style.animation="show 10s reverse forwards"
        // a.classList.add("hide")
        alertShow.style.display="none";
    }, 8000);
}