jQuery(document).ready(function ($) {

    new WOW({
        callback: function ( box ) {
            if ( !$(box).hasClass('textillate') ) { return; }
            $(box).text( 
                $.trim( $(box).text() )
            ).textillate({
                in: {
                    // set the effect name
                    effect: 'flipInY',

                    // set the delay factor applied to each consecutive character
                    delayScale: 1.75,

                    // set the delay between each character
                    delay: 30,

                    // randomize the character sequence
                    shuffle: false,

                }
            });
        }
    }).init();
    
    $("html").easeScroll({
        
//        frameRate: 60,
        animationTime: 1750,
        stepSize: 120,
//        pulseAlgorithm: 1,
//        pulseScale: 8,
//        pulseNormalize: 1,
//        accelerationDelta: 20,
//        accelerationMax: 1,
//        keyboardSupport: true,
        arrowScroll: 100,
//        touchpadSupport: true,
//        fixedBackground: true
        
    });
    
    /*
    
    var x, i, j, selElmnt, a, b, c;
    x = document.getElementsByClassName("woocommerce-ordering");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function (e) {
                var i, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function (e) {
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    
    document.addEventListener("click", closeAllSelect);
    
    */

    
});