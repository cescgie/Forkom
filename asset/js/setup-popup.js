

jQuery(document).ready(function($) {
    document.addEventListener('DOMContentLoaded', function() {
        'use strict';
        var modal = new DPKPOPUP({
            showOverlay: true
        });

        modal.each(function(element) {
            var target = element.getAttribute('display-detail');
            var targetElement = document.querySelector(target);
            var closeBtn = targetElement.querySelector(modal.settings.closeSelector);

            closeBtn.addEventListener('click', function(event) {
                event.preventDefault();
                modal.close(targetElement);
            });

            element.addEventListener('click', function(event) {
                event.preventDefault();
                modal.open(targetElement);
            });
        });
    }, false);
});
