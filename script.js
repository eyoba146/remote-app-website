window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("scrolled", window.scrollY > 780);
  });
  function signup() {
    document.getElementById("hidden").style.display = "none";
    document.getElementById("hidden2").style.display = "flex";
    document.getElementById("hero").style.filter = "blur(10px)";
  }
  function loginn() {
    document.getElementById("hidden2").style.display = "none";
    document.getElementById("hidden").style.display = "flex";
    document.getElementById("hero").style.filter = "blur(10px)";
  }
 function blur() {
  document.getElementById("hero").style.filter = "blur(14px)";
  alert("the name f th");
 }