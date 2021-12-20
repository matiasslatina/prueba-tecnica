const modal = document.getElementById("myModal");
const divModal=document.getElementById('modalContent');
const divTableContent=document.getElementById('divTableContent');
const span = document.getElementsByClassName("close")[0];

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function deleteUser(userId){
    if(confirm('Realmente deseas eliminar este usuario?')){
        let data=new FormData();
        let url='/users/destroy';
        data.append('userId',userId);
        let request=new Request(url,{
            method: 'POST',
            body: data,
            headers: new Headers()
        })
        fetch(request)
            .then(response=>response.text())
            .then(responseText=>{
                    console.log(responseText);
                    if(responseText==='USER_DESTROY'){
                        document.getElementById(userId+'TrTable').style.display = "none";
                    }else{
                        alert('El usuario no pudo ser eliminado.')
                    }
                }
                )        
    }    
}

function editUserModal(userId){
    let data=new FormData();
    let url='/users/show';
    divModal.innerHTML=null;
    data.append('userId',userId);
    let request=new Request(url,{
        method: 'POST',
        body: data,
        headers: new Headers()
    })
    fetch(request)
        .then(response=>response.text())
        .then(responseText=>divModal.innerHTML=responseText)
    modal.style.display = "block";
}

function newUserModal(){
    let url='/users/new';
    divModal.innerHTML=null;
    let request=new Request(url,{
        method: 'POST',
        headers: new Headers()
    })
    fetch(request)
        .then(response=>response.text())
        .then(responseText=>divModal.innerHTML=responseText)
    modal.style.display = "block";
}

function updateUser(){
    if(document.getElementById('pass')){
        let pass=document.getElementById('pass').value;
        let passRepeat=document.getElementById('repeat_pass').value;
        if(pass!==passRepeat){
            alert('las claves no son coincidentes!')
            return;
        }
    }
    let form=document.getElementById('userForm');
    let url=form.action;
    let data=new FormData(form);
    let request=new Request(url,{
        method: 'POST',
        body: data,
        headers: new Headers()
    })
    fetch(request)
        .then(response=>response.text())
        .then(responseText=>{
            if(responseText==='USER_EXIST'){
                alert("El correo que intentas cargar ya se encuentra ocupado! intenta nuevamente.");
            }else{
                divTableContent.innerHTML=responseText;
                filterTableUsers();
                modal.style.display = "none";
                divModal.innerHTML=null;
            }            
            })
        
}

function filterTableUsers(){
	let input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        var tds = tr[i].getElementsByTagName("td");
        var flag = false;
        for(var j = 0; j < tds.length; j++){
            td = tds[j];
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                flag = true;
            } 
        }
        if(flag){
            tr[i].style.display = "";
        }
        else {
            tr[i].style.display = "none";
        }
    }

}