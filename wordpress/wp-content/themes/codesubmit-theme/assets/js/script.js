class Mobile {
    constructor(mobileMenu, menuNav, close ){
        this.mobileMenu = document.querySelector(mobileMenu);
        this.menuNav = document.querySelector(menuNav);
        this.close = document.querySelector(close);
        this.activeClass = "active";
        this.activeButton = "active_button";

        this.handleClick = this.handleClick.bind(this);
    }

    handleClick() {
        this.close.classList.toggle(this.activeButton);
        this.mobileMenu.classList.toggle("close");
        this.menuNav.classList.toggle(this.activeClass);
    }

    addClickEvent() {
        this.mobileMenu.addEventListener("click", this.handleClick);
        this.close.addEventListener("click", this.handleClick);
    }

    init() {
        if(this.mobileMenu) {
            this.addClickEvent();
        }
        return this;
    }
}


const mobileNavbar = new Mobile(
    ".mobile_menu",
    ".menu",
    ".close"
);

mobileNavbar.init();