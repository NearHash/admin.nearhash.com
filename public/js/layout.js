const menu = document.querySelector(".menu");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector(".main");
const body = document.querySelector(".body");

menu.addEventListener("click", () => {
    if (window.screen.width > 992) {
        if (menu.classList.contains("clicked")) {
            sidebar.classList.remove("sidebar-change-1");
            main.classList.remove("main-change-1");
            menu.classList.remove("clicked");
        } else {
            sidebar.classList.add("sidebar-change-1");
            main.classList.add("main-change-1");
            menu.classList.add("clicked");
        }
    } else {
        sidebar.classList.add("sidebar-change-2");
        menu.classList.add("clicked");
    }
});

body.addEventListener("click", () => {
    if (window.screen.width < 992) {
        sidebar.classList.remove("sidebar-change-2");
        menu.classList.remove("clicked");
    }
});


// sidebar inner data 

let dropTags = document.getElementsByClassName('dropNav')
console.log(dropTags)


let dropTagAction = (dropId) => {
    let dropIdTag = document.getElementById(`${dropId}`)

    if (dropIdTag.classList.contains('open-drop')){
        dropIdTag.classList.remove('open-drop')
    }else {
        for(let i = 0; i < dropTags.length ; i++) {
            dropTags[i].classList.remove('open-drop')
        }
        setTimeout(()=>{
            dropIdTag.classList.add('open-drop')
        }, 200)
    }
}