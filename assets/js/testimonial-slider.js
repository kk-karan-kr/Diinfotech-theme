document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-testimonial-controls]').forEach(function (controls) {
        var track = document.getElementById(controls.dataset.testimonialControls);
        if (!track) return;
        var cards = Array.from(track.children);
        if (!cards.length) return;
        var previous = controls.querySelector('[data-testimonial-prev]');
        var next = controls.querySelector('[data-testimonial-next]');
        var status = controls.querySelector('[data-testimonial-status]');
        function update() {
            var bounds = track.getBoundingClientRect();
            var visible = cards.map(function (card, index) {
                var rect = card.getBoundingClientRect();
                return rect.right > bounds.left + 2 && rect.left < bounds.right - 2 ? index + 1 : null;
            }).filter(Boolean);
            controls.hidden = track.scrollWidth <= track.clientWidth + 2;
            previous.disabled = track.scrollLeft <= 2;
            next.disabled = track.scrollLeft >= track.scrollWidth - track.clientWidth - 2;
            if (visible.length) status.textContent = visible[0] + (visible.length > 1 ? '–' + visible[visible.length - 1] : '') + ' / ' + cards.length;
        }
        function move(direction) {
            var gap = parseFloat(getComputedStyle(track).columnGap) || 0;
            track.scrollBy({left: direction * (cards[0].getBoundingClientRect().width + gap), behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'});
        }
        previous.addEventListener('click', function () { move(-1); });
        next.addEventListener('click', function () { move(1); });
        track.addEventListener('keydown', function (event) {
            if (event.target !== track || !['ArrowLeft', 'ArrowRight'].includes(event.key)) return;
            event.preventDefault();
            move(event.key === 'ArrowRight' ? 1 : -1);
        });
        var timer;
        track.addEventListener('scroll', function () { clearTimeout(timer); timer = setTimeout(update, 120); }, {passive: true});
        if ('ResizeObserver' in window) new ResizeObserver(update).observe(track);
        else window.addEventListener('resize', update);
        update();
    });
});
