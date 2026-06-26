/**
 * Vanduong theme — front-end interactions.
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var menu = document.getElementById('mobile-menu');
		var panel = document.getElementById('mobile-menu-panel');
		var overlay = document.getElementById('mobile-menu-overlay');
		var openBtn = document.getElementById('mobile-menu-btn');
		var closeBtn = document.getElementById('mobile-menu-close');

		if (!menu || !panel || !overlay) {
			return;
		}

		function openMenu() {
			menu.classList.remove('invisible', 'pointer-events-none');
			document.body.style.overflow = 'hidden';
			requestAnimationFrame(function () {
				overlay.classList.remove('opacity-0');
				panel.classList.remove('-translate-y-full');
			});
		}

		function closeMenu() {
			overlay.classList.add('opacity-0');
			panel.classList.add('-translate-y-full');
			document.body.style.overflow = '';
			setTimeout(function () {
				menu.classList.add('invisible', 'pointer-events-none');
			}, 300);
		}

		if (openBtn) openBtn.addEventListener('click', openMenu);
		if (closeBtn) closeBtn.addEventListener('click', closeMenu);
		overlay.addEventListener('click', closeMenu);

		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') closeMenu();
		});
	});
})();
