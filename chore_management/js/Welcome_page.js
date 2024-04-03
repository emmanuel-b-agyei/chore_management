function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

function navigateToPage(page) {
  window.location.href = page;
}

function signOut() {
  window.location.href = 'Login_Page.html'
}