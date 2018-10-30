function sendForm(user, pwd) {
    /* Definición de variables eliminando 
       los espacios de los bordes. */
    user = user.trim();
    pwd = pwd.trim();

    /* Test para comprobar que realmente el formulario
       envía los campos al JS.
       alert(user);
       alert(pwd); */

   if (user == "" || pwd == "") {
       alert("Los campos Usuario y Contraseña son obligatorios.");
       return false;
   }else{
        return true;

   }
}
