jQuery(document).ready( function( $ ) {

    /**
     * Custom Parallax Library for Buildr
     * 
     * Proper Parallax
     */
    function getTop(elem) {
        var box = elem.getBoundingClientRect();
        var body = document.body;
        var docEl = document.documentElement;
        var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
        var clientTop = docEl.clientTop || body.clientTop || 0;
        var top  = box.top +  scrollTop - clientTop;
        return Math.round(top);
    }
    function parallaxImages() {
        // Set the scroll for each parallax individually
        var plx = document.getElementsByClassName('buildr_parallax');
        for(i=0;i<plx.length;i++){
            var height = plx[i].clientHeight;
            var img = plx[i].getAttribute('data-plx-img');
            var plxImg = document.createElement("div");
            plxImg.className += " plx-img";
            plxImg.style.height = (height+(height/2))+'px';
            plxImg.style.backgroundImage = 'url('+ img +')';
            plx[i].insertBefore(plxImg, plx[i].firstChild);
        }

    }
    window.addEventListener('load', parallaxImages);
    function plxScroll(){
        var scrolled = window.scrollY;
        var win_height_padded = window.innerHeight * 1.25;
        // Set the scroll for each parallax individually
        var plx = document.getElementsByClassName('buildr_parallax');
        for(i=0;i<plx.length;i++){
            var offsetTop = getTop(plx[i]);
            //var orientation = plx[i].getAttribute('data-plx-o');
            if (scrolled + win_height_padded >= offsetTop) {
                var plxImg = plx[i].getElementsByClassName('plx-img')[0];
                if (plxImg) {
                    var plxImgHeight = plxImg.clientHeight;
                    var singleScroll = (scrolled - offsetTop) - plxImgHeight/5;
                    plxImg.style.top = (singleScroll / buildr_local_parallax.intensity_value) + "px";
                }
            }
        }
    }
    window.addEventListener('load', plxScroll);
    window.addEventListener('resize', plxScroll);
    window.addEventListener('scroll', plxScroll);

});