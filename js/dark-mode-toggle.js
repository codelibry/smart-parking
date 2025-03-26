jQuery(function ($) {
  // constants
  const DARK_MODE = "dark";
  const LIGHT_MODE = "light";

  class ModeToggler {
    constructor() {
      this.query();
      this.getInitialMode();
      this.events();
      this.update();
    }

    query() {
      this.button = $(".js-toggle-mode");
      this.html = $("html");
    }

    getInitialMode() {
      this.currentMode = this.getSystemMode();

      if (this.html.attr("data-mode")) {
        this.currentMode = this.html.attr("data-mode");
      }

      this.saveCookie();
    }

    events() {
      this.button.click(this.toggleMode.bind(this));
    }

    toggleMode(e) {
      e.preventDefault();

      this.currentMode === LIGHT_MODE
        ? this.setDarkMode()
        : this.setLightMode();

      this.saveCookie();
    }

    setLightMode() {
      this.currentMode = LIGHT_MODE;
      this.update();
    }

    setDarkMode() {
      this.currentMode = DARK_MODE;
      this.update();
    }

    update() {
      this.html.attr("data-mode", this.currentMode);
    }

    saveCookie() {
      document.cookie =
        "mode=" + this.currentMode + "; path=/; max-age=31536000"; // Set cookie for 1 year
    }

    getSystemMode() {
      if (
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
      ) {
        return DARK_MODE;
      } else if (
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: light)").matches
      ) {
        return LIGHT_MODE;
      } else {
        return LIGHT_MODE;
      }
    }
  }

  new ModeToggler();
});
