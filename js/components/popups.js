jQuery(function($){
	class Popups {
		constructor() {
			this.state();
			this.query();
			this.events();
		}

		state() {
			this.currentPopupId = null;
		}

		query() {
			this.popups = $(".js-popup");
			this.openPopupButtons = $("[href^='#popup-']");
			this.closePopupButtons = $(".js-popup-close");
		}

		events() {
			this.openPopupButtons.click(this.openPopup.bind(this));
			this.closePopupButtons.click(this.closePopup.bind(this));
      this.popups.click(function(e) {
        const dialogDimensions = this.getBoundingClientRect();
        if (
          e.clientX < dialogDimensions.left ||
          e.clientX > dialogDimensions.right ||
          e.clientY < dialogDimensions.top ||
          e.clientY > dialogDimensions.bottom
        ) {
          this.close();
        }
      });
		}

		openPopup(event) {
      event.preventDefault();
			const $button = $(event.target);
			const popupId = $button.attr("href").replace("#popup-", "");
			this.currentPopupId = popupId;
			this.update();
		}

		closePopup() {
			this.currentPopupId = null;
			this.update();
		}

		update() {
			this.currentPopupId ? this.showCurrentPopup() : this.hideAllPopups();
		}

		showCurrentPopup() {
      const activePopup = document.querySelector(`.js-popup[id="popup-${this.currentPopupId}"]`);
			activePopup.showModal();
		}

		hideAllPopups() {
			this.popups.each((i, el) => {
				el.close();
			});
		}
	}

	new Popups();
});
