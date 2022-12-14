const menu = document.querySelector(".menu");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector(".main");
const body = document.querySelector(".body");
const logoContainerTag = document.querySelector('.logo-container');

menu.addEventListener("click", () => {
    if (window.screen.width > 992) {
        if (menu.classList.contains("clicked")) {
            sidebar.classList.remove("sidebar-change-1");
            logoContainerTag.classList.remove("sidebar-change-1");
            main.classList.remove("main-change-1");
            menu.classList.remove("clicked");
        } else {
            sidebar.classList.add("sidebar-change-1");
            logoContainerTag.classList.add("sidebar-change-1");
            main.classList.add("main-change-1");
            menu.classList.add("clicked");
        }
    } else {
        sidebar.classList.add("sidebar-change-2");
        logoContainerTag.classList.add("sidebar-change-2");
        menu.classList.add("clicked");
    }
});

body.addEventListener("click", () => {
    if (window.screen.width < 992) {
        sidebar.classList.remove("sidebar-change-2");
        logoContainerTag.classList.remove("sidebar-change-2");
        menu.classList.remove("clicked");
    }
});


// sidebar inner data 

let dropTags = document.getElementsByClassName('dropNav')
let asideIconTags = document.getElementsByClassName('aside-icon')

let dropTagAction = (dropId) => {
    let dropIdTag = document.getElementById(`${dropId}`)
    let asideIconTag = document.getElementById(`${dropId}`+'-icon')

    if (dropIdTag.classList.contains('open-drop')){
        asideIconTag.classList.remove('aside-icon-action')
        dropIdTag.classList.remove('open-drop')
    }else {
        for(let i = 0; i < dropTags.length ; i++) {
            dropTags[i].classList.remove('open-drop')
            asideIconTags[i].classList.remove('aside-icon-action')
        }
        setTimeout(()=>{
            dropIdTag.classList.add('open-drop')
            asideIconTag.classList.add('aside-icon-action')
        }, 100)
    }
}
