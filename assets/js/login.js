$(document).ready(function(){
    const name = $("#name"),
    last_name = $("#lastName"),
    last_name_m = $("#lastNameM"),
    gender = $("#gender"),
    address = $("#address");
    email = $("#email"),
    password = $("#password"),
    email_l = $("#email_l"),
    password_l = $("#password_l");

    valid_form();

    $("#btn-register").click(function(){
       $.post("/settings/login.php", {
            name: name.val(),
            lastName: last_name.val(),
            lastNameM: last_name_m.val(),
            email: email.val(),
            gender: gender.val(),
            password: password.val(),
            address: address.val(),
            type: "register",
        }, function(r) {
            let response = JSON.parse(r);
            if(response.login){
                $('#registerModal').modal('hide')
                ohSnap('Registro exitoso. Ahora inicie sesion', {color: 'green', duration:'2000',icon:'fas fa-check-circle'});
            }else {
                ohSnap(response .problem, {color: 'red', duration:'2000',icon:'fas fa-exclamation-circle'});
            }
        })
    });

    $("#btn-login").click(function(){
        $.post("/settings/login.php", {
             email: email_l.val(),
             password: password_l.val(),
             type: "login"
         }, function(r) {
             let response = JSON.parse(r);
             if(response.login){
                 window.location.reload();
             }else {
                 ohSnap(response .problem, {color: 'red', duration:'2000',icon:'fas fa-exclamation-circle'});
             }
         })
    });

    $("#btn-logout").click(function(){
        $.post("/settings/login.php", {
            type: "logout",
        }, function(r) {
            let response = JSON.parse(r);
            if(response.login){
                localStorage.removeItem('car');
                localStorage.removeItem('total');
                window.location.reload();
            }else {
                ohSnap("Error al cerrar sesión", {color: 'red', duration:'2000',icon:'fas fa-exclamation-circle'});
            }
        })
    });
});

function valid_form(){
    
}