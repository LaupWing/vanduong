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

		initProductCarousels();
	});

	/**
	 * Products carousel — scroll-snap track with reveal, progress thumb and prev/next.
	 */
	function initProductCarousels() {
		document.querySelectorAll('.vanduong-products-carousel').forEach(function (carousel) {
			var track     = carousel.querySelector('.vanduong-products-track');
			var indicator = carousel.querySelector('.vanduong-products-indicator');
			var thumb     = carousel.querySelector('.vanduong-products-thumb');
			var prevBtn   = carousel.querySelector('.vanduong-products-prev');
			var nextBtn   = carousel.querySelector('.vanduong-products-next');
			var nav       = carousel.querySelector('.vanduong-products-nav');

			if (!track) return;

			var index = 0;

			// Per-card reveal via IntersectionObserver.
			var revealObs = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry, i) {
					if (entry.isIntersecting) {
						setTimeout(function () { entry.target.classList.add('is-in'); }, i * 80);
						revealObs.unobserve(entry.target);
					}
				});
			}, { threshold: 0.15 });
			carousel.querySelectorAll('.vanduong-product-reveal').forEach(function (card) {
				revealObs.observe(card);
			});

			function maxScroll() {
				return Math.max(0, track.scrollWidth - track.clientWidth);
			}

			function updateFromScroll() {
				var max     = maxScroll();
				var eps     = 2;
				var atStart = track.scrollLeft <= eps;
				var atEnd   = track.scrollLeft >= max - eps;

				if (indicator && thumb) {
					var iW = indicator.clientWidth;
					var tW = track.clientWidth;
					var cW = track.scrollWidth;
					if (iW && tW && cW) {
						var thumbW = Math.max(28, Math.round(iW * (tW / cW)));
						var maxX   = Math.max(0, iW - thumbW);
						var ratio  = max ? Math.max(0, Math.min(1, track.scrollLeft / max)) : 0;
						thumb.style.width     = thumbW + 'px';
						thumb.style.transform = 'translateX(' + Math.round(maxX * ratio) + 'px)';
					}
				}

				if (prevBtn) prevBtn.disabled = atStart;
				if (nextBtn) nextBtn.disabled = atEnd;

				var children = Array.prototype.slice.call(track.children);
				if (children.length) {
					var viewLeft = track.scrollLeft;
					var best = 0, bestDist = Infinity;
					children.forEach(function (child, i) {
						var dist = Math.abs(child.offsetLeft - viewLeft);
						if (dist < bestDist) { bestDist = dist; best = i; }
					});
					index = best;
				}
			}

			function goToIndex(i) {
				var children = Array.prototype.slice.call(track.children);
				if (!children.length) return;
				var idx    = Math.max(0, Math.min(children.length - 1, i));
				var target = Math.min(maxScroll(), children[idx].offsetLeft);
				track.scrollTo({ left: target, behavior: 'smooth' });
				requestAnimationFrame(updateFromScroll);
			}

			function recalc() {
				var showUi = maxScroll() > 2;
				if (nav) {
					nav.style.opacity       = showUi ? '1' : '0';
					nav.style.pointerEvents = showUi ? 'auto' : 'none';
				}
				updateFromScroll();
				requestAnimationFrame(updateFromScroll);
			}

			track.addEventListener('scroll', updateFromScroll, { passive: true });
			window.addEventListener('resize', recalc, { passive: true });

			if (prevBtn) prevBtn.addEventListener('click', function () { goToIndex(index - 1); });
			if (nextBtn) nextBtn.addEventListener('click', function () { goToIndex(index + 1); });

			recalc();
		});
	}
})();
