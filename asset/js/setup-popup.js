
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
            var tab1 = element.getAttribute('tab-1');
            var tab2 = element.getAttribute('tab-2');
            var tab3 = element.getAttribute('tab-3');

            $("#tab-1").append("<p>"+tab1+"</p>");
            $("#tab-2").append("<p>"+tab2+"</p>");
            $("#tab-3").append("<p>"+tab3+"</p>");

            event.preventDefault();
            modal.open(targetElement);
        });
    });
}, false);