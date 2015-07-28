
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
            var split = function(str){
                return str.split('?');
            };

            var split2D = function(str){
                var arrEntity = split(str);
                for(var i=0; i < arrEntity.length; i++){
                    if(arrEntity[i]){
                        arrEntity[i] = arrEntity[i].split('__');
                    } else{
                        arrEntity.splice(i, 1);
                    }
                }
                return arrEntity;
            };

            var valTab1 = split2D(element.getAttribute('tab-1'));
            var valTab2 = split(element.getAttribute('tab-2'));
            var valTab3 = split(element.getAttribute('tab-3'));

            var htmlTab1 = "<ol>";
            for(var i=0; i<valTab1.length; i++){
                if(valTab1[0][i]){
                    htmlTab1 += "<li>"+ valTab1[0][i] +"</li>";
                }
            } htmlTab1 += "</ol>";

            var htmlTab2 = "<ul>";
            for(var i=0; i<valTab2.length; i++){
                var label = "";
                switch(i){
                    case 0: label = "Website"; break;
                    case 1: label = "Facebook"; break;
                    case 2: label = "Twitter"; break;
                    case 3: label = "Youtube"; break;
                }
                if(valTab2[i] && valTab2[i] != '-'){
                    htmlTab2 += "<li>"+ label +" : "+ "<a href=\""+valTab2[i]+"\">"+valTab2[i]+"</a>" +"</li>";
                }
            } htmlTab2 += "</ul>";

            var htmlTab3 = "<div style=\"text-align: center;\">";
            for(var i=0; i<valTab3.length; i++){
                if(valTab3[i] && valTab3[i] != '-'){
                    htmlTab3 += "<p>"+valTab3[i]+"</p>";
                }
            } htmlTab3 += "</div>";

            document.getElementById("tab-1").innerHTML = htmlTab1;
            document.getElementById("tab-2").innerHTML = htmlTab2;
            document.getElementById("tab-3").innerHTML = htmlTab3;

            event.preventDefault();
            modal.open(targetElement);
        });
    });
}, false);