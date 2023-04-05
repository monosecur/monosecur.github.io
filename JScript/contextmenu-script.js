window.addEventListener("contextmenu", function(event){
 //   event.preventDefault();
 //   let x = event.offsetX + "px";
 //   let y = event.offsetY + "px";
 //   let contextmenu = document.querySelector("#contextmenu");
 //   contextmenu.style.top = y;
 //   contextmenu.style.left = x;
 //   contextmenu.classList.add("active");
  });

  let button = document.querySelector('.button');
  button.addEventListener('mouseup', (e) => {
    let log = document.querySelector('#log');
    switch (e.button) {
      case 2:
            let x = e.offsetX + "px";
           let y = e.offsetY + "px";
           let contextmenu = document.querySelector("#contextmenu");
           contextmenu.style.top = y;
           contextmenu.style.left = x;
           contextmenu.classList.add("active");
        break;
    }
  });

  window.addEventListener("click",function(event){
    let contextmenu = document.querySelector("#contextmenu");
    contextmenu.classList.remove("active");
  });

  let modify = document.querySelector('#modify');
  
  modify.addEventListener('auxclick', (e) => {
    if (e.which == 2) {
        e.preventDefault();
        e.innerHTML = "YOU CLICKED ME!";
    }
  });

  



