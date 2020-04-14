$(function () {

    var left = $('.bzleft');
    var right = $('.bzright');
    var down = $('.bzdown');
    var up = $('.bzup');
    var bg = $('.bgDiv');
    var leftNav = $('.leftNav');
    var rightNav = $('.rightNav');
    var downNav = $('.downNav');
    var upNav = $('.upNav');

    showNav(left, leftNav, "bzleft");
    showNav(right, rightNav, "bzright");
    showNav(up, upNav, "bzup");
    showNav(down, downNav, "bzdown");

    function showNav(btn, navDiv, direction) {
        btn.on('click', function () {
            bg.css({
                display: "block",
                transition: "opacity .5s"
            });
            if (direction == "bzright") {
                navDiv.css({
                    right: "0px",
                    transition: "right 0.5s"
                });
            } else if (direction == "bzleft") {
                navDiv.css({
                    left: "0px",
                    transition: "left 0.5s"
                });
            } else if (direction == "bzup") {
                navDiv.css({
                    top: "0px",
                    transition: "top 0.5s"
                });
            } else if (direction == "bzdown") {
                navDiv.css({
                    bottom: "0px",
                    transition: "bottom 0.5s"
                });
            }


        });
    }


    bg.on('click', function () {
        hideNav();
    });

    function hideNav() {
        leftNav.css({
            left: "-60%",
            transition: "left .5s"
        });
        rightNav.css({
            right: "-60%",
            transition: "right .5s"
        });
        upNav.css({
            top: "-40%",
            transition: "top .5s"
        });
        downNav.css({
            bottom: "-60%",
            webkitTransition:"bottom .5s",
            oTransition:"bottom .5s",
            mozTransition:"bottom .5s",
            transition: "bottom .5s"
        });
        bg.css({
            display: "none",
            transition: "display 1s"
        });
    }
});

jQuery(document).ready(function($){
	var mainHeader = $('.bzmh'),
		secondaryNavigation = $('.cd-secondary-nav'),
		//this applies only if secondary nav is below intro section
		belowNavHeroContent = $('.sub-nav-hero'),
		headerHeight = mainHeader.height();
	
	//set scrolling variables
	var scrolling = false,
		previousTop = 0,
		currentTop = 0,
		scrollDelta = 10,
		scrollOffset = 150;

	mainHeader.on('click', '.nav-trigger', function(event){
		// open primary navigation on mobile
		event.preventDefault();
		mainHeader.toggleClass('nav-open');
	});

	$(window).on('scroll', function(){
		if( !scrolling ) {
			scrolling = true;
			(!window.requestAnimationFrame)
				? setTimeout(autoHideHeader, 250)
				: requestAnimationFrame(autoHideHeader);
		}
	});

	$(window).on('resize', function(){
		headerHeight = mainHeader.height();
	});

	function autoHideHeader() {
		var currentTop = $(window).scrollTop();

		( belowNavHeroContent.length > 0 ) 
			? checkStickyNavigation(currentTop) // secondary navigation below intro
			: checkSimpleNavigation(currentTop);

	   	previousTop = currentTop;
		scrolling = false;
	}

	function checkSimpleNavigation(currentTop) {
		//there's no secondary nav or secondary nav is below primary nav
	    if (previousTop - currentTop > scrollDelta) {
	    	//if scrolling up...
	    	mainHeader.removeClass('is-hidden 666');
	    } else if( currentTop - previousTop > scrollDelta && currentTop > scrollOffset) {
	    	//if scrolling down...
	    	mainHeader.addClass('is-hidden bggreen');
	    }
	}

	function checkStickyNavigation(currentTop) {
		//secondary nav below intro section - sticky secondary nav
		var secondaryNavOffsetTop = belowNavHeroContent.offset().top - secondaryNavigation.height() - mainHeader.height();
		
		if (previousTop >= currentTop ) {
	    	//if scrolling up... 
	    	if( currentTop < secondaryNavOffsetTop ) {
	    		//secondary nav is not fixed
	    		mainHeader.removeClass('is-hidden 444');
	    		secondaryNavigation.removeClass('fixed slide-up');
	    		belowNavHeroContent.removeClass('secondary-nav-fixed');
	    	} else if( previousTop - currentTop > scrollDelta ) {
	    		//secondary nav is fixed
	    		mainHeader.removeClass('is-hidden 333');
	    		secondaryNavigation.removeClass('slide-up').addClass('fixed'); 
	    		belowNavHeroContent.addClass('secondary-nav-fixed');
	    	}
	    	
	    } else {
	    	//if scrolling down...	
	 	  	if( currentTop > secondaryNavOffsetTop + scrollOffset ) {
	 	  		//hide primary nav
	    		mainHeader.addClass('is-hidden 222');
	    		secondaryNavigation.addClass('fixed slide-up');
	    		belowNavHeroContent.addClass('secondary-nav-fixed');
	    	} else if( currentTop > secondaryNavOffsetTop ) {
	    		//once the secondary nav is fixed, do not hide primary nav if you haven't scrolled more than scrollOffset 
	    		mainHeader.removeClass('is-hidden 111');
	    		secondaryNavigation.addClass('fixed').removeClass('slide-up');
	    		belowNavHeroContent.addClass('secondary-nav-fixed');
	    	}

	    }
	}
});

$(document).ready(function() {
    $('#stylelist b').on('click',function(){
		$(this).addClass('cover').siblings().removeClass("cover");
		var css = $(this).attr('data-id');
		$('#css_extstyle').attr('href', css ? css + '/style.css' : './template/banzhuan_xmbbs/style/t1/style.css');
		setcookie('extstyle', css, 86400 * 30);
	});
});

function showbirthday(){
	var el = document.getElementById('birthday');
	var birthday = el.value;
	el.length=0;
	el.options.add(new Option('Day', ''));
	for(var i=0;i<28;i++){
		el.options.add(new Option(i+1, i+1));
	}
	if($('birthmonth').value!="2"){
		el.options.add(new Option(29, 29));
		el.options.add(new Option(30, 30));
		switch(document.getElementById('birthmonth').value){
			case "1":
			case "3":
			case "5":
			case "7":
			case "8":
			case "10":
			case "12":{
				el.options.add(new Option(31, 31));
			}
		}
	} else if($('birthyear').value!="") {
		var nbirthyear=document.getElementById('birthyear').value;
		if(nbirthyear%400==0 || (nbirthyear%4==0 && nbirthyear%100!=0)) el.options.add(new Option(29, 29));
	}
	el.value = birthday;
}
function showdistrict(container, elems, totallevel, changelevel, containertype) {
    var getdid = function(elem) {
        var op = elem.options[elem.selectedIndex];
        return op['did'] || op.getAttribute('did') || '0';
    };
    var pid = changelevel >= 1 && elems[0] && $(elems[0]) ? getdid(document.getElementById(elems[0])) : 0;
    var cid = changelevel >= 2 && elems[1] && $(elems[1]) ? getdid(document.getElementById(elems[1])) : 0;
    var did = changelevel >= 3 && elems[2] && $(elems[2]) ? getdid(document.getElementById(elems[2])) : 0;
    var coid = changelevel >= 4 && elems[3] && $(elems[3]) ? getdid(document.getElementById(elems[3])) : 0;
    var url = 'home.php?mod=misc&ac=ajax&op=district&container=' + container + '&containertype=' + containertype + '&province=' + elems[0] + '&city=' + elems[1] + '&district=' + elems[2] + '&community=' + elems[3] + '&pid=' + pid + '&cid=' + cid + '&did=' + did + '&coid=' + coid + '&level=' + totallevel + '&handlekey=' + container + '&inajax=1' + (!changelevel ? '&showdefault=1': '');
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'xml'
    }).success(function(s) {
        var rehtml = s.lastChild.firstChild.nodeValue;
        rehtml = rehtml.replace('<select name="' + elems[0] + '"', '<div class="cl"><span class="z" style="font-size:12px;margin-right:5px;margin-top:4px;display:none;"><span class="' + elems[0] + '_text"></span></span><select name="' + elems[0] + '"');
        rehtml = rehtml.replace('<select name="' + elems[1] + '"', '<div class="cl"><span class="z" style="font-size:12px;margin-right:5px;margin-top:4px;display:none;"><span class="' + elems[1] + '_text"></span></span><select name="' + elems[1] + '"');
        rehtml = rehtml.replace('<select name="' + elems[2] + '"', '<div class="cl"><span class="z" style="font-size:12px;margin-right:5px;margin-top:4px;display:none;"><span class="' + elems[2] + '_text"></span></span></span><select name="' + elems[2] + '"');
        rehtml = rehtml.replace('<select name="' + elems[3] + '"', '<div class="cl"><span class="z" style="font-size:12px;margin-right:5px;margin-top:4px;display:none;"><span class="' + elems[3] + '_text"></span></span><select name="' + elems[3] + '"');
        rehtml = rehtml.replace(/&nbsp;/g, '');
        /* &nbsp; */
        rehtml = rehtml.replace(/<\/select>/g, '</select></div>');
        $('#' + container).html(rehtml);
        $('.' + elems[0] + '_text').text($('#' + elems[0]).find('option:selected').text());
        $('.' + elems[1] + '_text').text($('#' + elems[1]).find('option:selected').text());
        $('.' + elems[2] + '_text').text($('#' + elems[2]).find('option:selected').text());
        $('.' + elems[3] + '_text').text($('#' + elems[3]).find('option:selected').text());
    });
}


