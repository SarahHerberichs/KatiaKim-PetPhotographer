let offlineButton = document.querySelector("#offlineButton");

let statusOffline = document.querySelector("#statusOffline");

window.addEventListener("load", (event) => {
  statusOffline.innerText = "You're Now Offline";
  statusOffline.style.color = "red";
});
