document.addEventListener('DOMContentLoaded', function () {
	const menuToggle = document.querySelector('.menu-toggle');
	const siteNavigation = document.querySelector('.site-nav');
	const submenuParents = siteNavigation
		? siteNavigation.querySelectorAll('.menu-item-has-children')
		: [];
	const mobileBreakpoint = window.matchMedia('(max-width: 1200px)');

	if (!menuToggle || !siteNavigation) {
		return;
	}

	function setMenuOpen(isOpen) {
		menuToggle.setAttribute('aria-expanded', String(isOpen));
		menuToggle.setAttribute('aria-label', isOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi');
		siteNavigation.classList.toggle('is-open', isOpen);
	}

	function closeSubmenus() {
		submenuParents.forEach(function (parent) {
			parent.classList.remove('is-submenu-open');
			const button = parent.querySelector(':scope > .submenu-toggle');
			if (button) {
				button.setAttribute('aria-expanded', 'false');
				const parentLink = parent.querySelector(':scope > a');
				if (parentLink) {
					button.setAttribute('aria-label', 'Buka submenu ' + parentLink.textContent.trim());
				}
			}
		});
	}

	function closeSubtree(parent) {
		const branches = [parent].concat(Array.from(parent.querySelectorAll('.menu-item-has-children')));
		branches.forEach(function (branch) {
			branch.classList.remove('is-submenu-open');
			const branchButton = branch.querySelector(':scope > .submenu-toggle');
			if (branchButton) {
				branchButton.setAttribute('aria-expanded', 'false');
				const branchLink = branch.querySelector(':scope > a');
				if (branchLink) {
					branchButton.setAttribute('aria-label', 'Buka submenu ' + branchLink.textContent.trim());
				}
			}
		});
	}

	function prepareSubmenus() {
		submenuParents.forEach(function (parent, index) {
			const submenu = parent.querySelector(':scope > .sub-menu');
			const parentLink = parent.querySelector(':scope > a');

			if (!submenu || !parentLink) {
				return;
			}

			if (!submenu.id) {
				submenu.id = 'primary-submenu-' + (index + 1);
			}

			let button = parent.querySelector(':scope > .submenu-toggle');
			if (!button) {
				button = document.createElement('button');
				button.type = 'button';
				button.className = 'submenu-toggle';
				button.setAttribute('aria-expanded', 'false');
				button.setAttribute('aria-controls', submenu.id);
				button.setAttribute('aria-label', 'Buka submenu ' + parentLink.textContent.trim());
				button.innerHTML = '<span aria-hidden="true"></span>';
				parentLink.insertAdjacentElement('afterend', button);

				button.addEventListener('click', function () {
					const wasOpen = parent.classList.contains('is-submenu-open');
					if (!wasOpen) {
						Array.from(parent.parentElement.children).forEach(function (sibling) {
							if (sibling !== parent && sibling.classList.contains('menu-item-has-children')) {
								closeSubtree(sibling);
							}
						});
					}

					if (wasOpen) {
						closeSubtree(parent);
					} else {
						parent.classList.add('is-submenu-open');
						button.setAttribute('aria-expanded', 'true');
						button.setAttribute('aria-label', 'Tutup submenu ' + parentLink.textContent.trim());
					}
				});
			}

			parent.classList.remove('is-submenu-open');
			button.setAttribute('aria-expanded', 'false');
		});
	}

	menuToggle.addEventListener('click', function () {
		const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
		setMenuOpen(!isExpanded);

		if (isExpanded) {
			closeSubmenus();
		}
	});

	siteNavigation.addEventListener('click', function (event) {
		if (!(event.target instanceof Element) || !event.target.closest('a')) {
			return;
		}

		setMenuOpen(false);
		closeSubmenus();
	});

	document.addEventListener('keydown', function (event) {
		if (event.key !== 'Escape') {
			return;
		}

		const openSubmenus = Array.from(submenuParents).filter(function (parent) {
			return parent.classList.contains('is-submenu-open');
		});

		if (openSubmenus.length) {
			const lastOpen = openSubmenus[openSubmenus.length - 1];
			closeSubtree(lastOpen);
			const button = lastOpen.querySelector(':scope > .submenu-toggle');
			if (button) {
				button.setAttribute('aria-expanded', 'false');
				button.focus();
			}
			return;
		}

		if (menuToggle.getAttribute('aria-expanded') === 'true') {
			setMenuOpen(false);
			menuToggle.focus();
		}
	});

	document.addEventListener('click', function (event) {
		if (
			menuToggle.getAttribute('aria-expanded') === 'true' &&
			event.target instanceof Node &&
			!siteNavigation.contains(event.target) &&
			!menuToggle.contains(event.target)
		) {
			setMenuOpen(false);
			closeSubmenus();
		}
	});

	function updateNavigationMode() {
		prepareSubmenus();
		if (!mobileBreakpoint.matches) {
			setMenuOpen(false);
		}
	}

	if (mobileBreakpoint.addEventListener) {
		mobileBreakpoint.addEventListener('change', updateNavigationMode);
	} else {
		mobileBreakpoint.addListener(updateNavigationMode);
	}

	prepareSubmenus();
});
