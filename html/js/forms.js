$(function () {

    let form = $("#form");
    let password = $("#password");

    $("#registrati").click(function () {
      let passwordConfirm = $("#password-confirm");
      // Crea un elemento di input che verrà usato come campo di output per la password criptata.
      let p = document.createElement("input");
      // Crea un elemento di input che verrà usato come campo di output per la conferma-password criptata.
      let pc = document.createElement("input");

      form.append(p);
      p.name = "p";
      p.type = "hidden"
      p.value= sha512(password.val());
      //p.value = password.val();
      password.val("");

      form.append(pc);
      pc.name = "pc";
      pc.type = "hidden"
      pc.value= sha512(passwordConfirm.val());
      //pc.value = passwordConfirm.val();
      passwordConfirm.val("");
      //submit del form.
      form.submit();
    });

    $("#accedi").click(function () {
      // Crea un elemento di input che verrà usato come campo di output per la password criptata.
      let p = document.createElement("input");

      form.append(p);
      p.name = "p";
      p.type = "hidden"
      p.value= sha512(password.val());
      //p.value = password.val();
      password.val("");
      //submit del form.
      form.submit();
    });

});
