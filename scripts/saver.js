$('#saveform').submit(function(e) {

    e.preventDefault();
    var branca = 'a';
    var auxi= document.getElementById("branca");
    //var auxi2= auxi.options[auxi.selectedIndex].value;
    var text= auxi.options[auxi.selectedIndex].text;
    document.cookie= "push="+ 1;
    document.cookie= "assignatura="+document.getElementById("assig").value;
    document.cookie= "branca="+text;

    document.cookie= "descripcio="+document.getElementById("descripcio").value;

    const data = window.localStorage.getItem("calevent_local_values");
    document.cookie= "data="+ data.toString();


    //const param ={
    //    headers :{"content-type":"application/json; charset=UTF-8"},
    //    body:data,
    //    bodyUsed:true,
    //    method:"POST"
    //};
    //fetch(url,param)
    //    .then(data=>{return data})
    //    .then(res=>{console.log(res)})
    //    .catch(error=>{console.log(error)});

    //document.getElementById('saveform').action= './index.php?action=schedule_created'

    //window.location.refresh();
    window.location.href= "./index.php?action=create_schedule";
});