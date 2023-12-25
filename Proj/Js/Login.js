var x= document.getElementById('AdminForm');
var y =document.getElementById('UserForm');
var z =document.getElementById('SelectorForm');
     function showUserForm(){
        z.style.display='none';
        x.style.display='none';
        y.style.display='block';
}
function showAdminForm(){
    z.style.display='none';
    y.style.display='none';
    x.style.display='block';
}