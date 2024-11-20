
const fadeOutEffect = (opacity = 1, delay = 20, decrement = 0.01) => {
    const notifications = document.querySelectorAll(".alert");
    
    if (opacity > 0) {
      notifications.forEach(n => n.style.opacity = opacity);
      setTimeout(() => fadeOutEffect(opacity - decrement, delay, decrement), delay);	
    }
    else {
      notifications.forEach(n => n.style.display = "none");
    }
  };

  
const notification = document.querySelector(".alert");

if(localStorage.getItem("showNotification") == null) {
    localStorage["showNotification"] = "none";
}

notification.style.display = localStorage["showNotification"];

setTimeout(() => {
    fadeOutEffect();
    localStorage.setItem("showNotification", "none");
}, 2000);