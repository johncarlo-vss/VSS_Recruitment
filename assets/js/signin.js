"use strict";

//From the interns, function used to sign in the user.
const login = (pass, uname) => {
  fetch("../process/ajax.php?action=login", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: JSON.stringify({
      username: uname,
      password: pass
    })
  }).then(response => {
    response.text().then(resp => {
      if(resp == 1) {
        window.location.href = "./index.php";
      }else if(resp == 2) {
        //To be analyzed.
      }else {
        document.querySelector(".auth-description").style.color = "#CD6155";
        document.querySelector(".auth-description").innerHTML = "Sign in failed.";
      }
    });
  });
}
