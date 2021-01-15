const dropDownButton = document.querySelectorAll('.w-dropdown');

if (dropDownButton.length > 0) {

	dropDownButton.forEach(
		button => {
			button.addEventListener('click', openSubmenu);
		}
	)

	function openSubmenu () {
		const subMenu = this.querySelector('.w-dropdown-list');
		const toggle = this.querySelector('.dropdown-toggle');

		if (window.matchMedia("(min-width: 980px)").matches) {
			toggle.classList.add('w--open');
			subMenu.style.display = "block";

			this.addEventListener('mouseleave', () => {
				toggle.classList.remove('w--open');
				subMenu.style.display = "none";
			})
		}
	}

	/*
	 * media max-width 980
	 */
	const mobileButton = document.querySelector('.menu-button');
	const topNav = document.querySelector('.wrap-top-menu nav');
	const topNavContentH = topNav.scrollHeight;

	topNav.style.minHeight = 0;

	mobileButton.addEventListener( 'click', toggleMobileMenu );

	function toggleMobileMenu () {
		if (topNav.style.minHeight === '0px') {
			for (let i = 0; i < topNavContentH; i++) {
				topNav.style.minHeight = `${i}px`;
			}
			mobileButton.classList.add('color-text-warning');
		} else {
			for (let i = topNavContentH; i >= 0; i--) {
				topNav.style.minHeight = `${i}px`;
			}
			mobileButton.classList.remove('color-text-warning');
		}
	}

	/*
	 * дропдаун мобила
	 */
	//clientHeight
	if (window.matchMedia("(max-width: 980px)").matches) {
		const dropDownButton = topNav.querySelector('.w-dropdown');
		const dropDownToggle = dropDownButton.querySelector('.dropdown-toggle');
		const subMenu = topNav.querySelector('.w-dropdown-list');
		const subMenuH = subMenu.scrollHeight;
		const subMenuLinks = subMenu.querySelectorAll('a');
		const subMenuLinksH = '';

		dropDownButton.addEventListener('click', () => {
			const isOpen = dropDownToggle.classList.contains('w--open');

			if (isOpen) {
				for (let i = topNavContentH + subMenuH; i >= topNavContentH; i--) {
					topNav.style.minHeight = `${i}px`;
					subMenu.style.height = `${i - topNavContentH + subMenuH}px`;
					dropDownToggle.classList.remove('w--open');
				}
			} else {
				for (let i = topNavContentH; i < topNavContentH + subMenuH; i++) {
					topNav.style.minHeight = `${i}px`;
					subMenu.style.height = `${i - topNavContentH}px`;
					dropDownToggle.classList.add('w--open');
				}
			}
		});


	}
}
