/* Stik Up menu script */
(function($){
	$.fn.tmStickUp=function(options){ 
		
		var getOptions = {
			correctionSelector: $('.correctionSelector')
		}
		$.extend(getOptions, options); 

		var
			_this = $(this)
		,	_window = $(window)
		,	_document = $(document)
		,	thisOffsetTop = 0
		,	thisOuterHeight = 0
		,	thisMarginTop = 0
		,	thisPaddingTop = 0
		,	documentScroll = 0
		,	pseudoBlock
		,	lastScrollValue = 0
		,	scrollDir = ''
		,	tmpScrolled
		;

		init();
		function init(){
			thisOffsetTop = parseInt(_this.offset().top);
			thisMarginTop = parseInt(_this.css("margin-top"));
			thisOuterHeight = parseInt(_this.outerHeight(true));

			$('<div class="pseudoStickyBlock"></div>').insertAfter(_this);
			pseudoBlock = $('.pseudoStickyBlock');
			pseudoBlock.css({"position":"relative", "display":"block"});
			addEventsFunction();
		}//end init

		function addEventsFunction(){
			_document.on('scroll', function() {
				tmpScrolled = $(this).scrollTop();
					if (tmpScrolled > lastScrollValue){
						scrollDir = 'down';
					} else {
						scrollDir = 'up';
					}
				lastScrollValue = tmpScrolled;

				correctionValue = getOptions.correctionSelector.outerHeight(true);
				documentScroll = parseInt(_window.scrollTop());

				if(thisOffsetTop - correctionValue < documentScroll){
					_this.addClass('isStuck');
					_this.css({position:"fixed", top:correctionValue});
					pseudoBlock.css({"height":thisOuterHeight});
				}else{
					_this.removeClass('isStuck');
					_this.css({position:"relative", top:0});
					pseudoBlock.css({"height":0});
				}
			}).trigger('scroll');
		}
	}//end tmStickUp function

				 $(function() {
						$('#fcarousel').carouFredSel({
						  responsive: true,
						  width: '100%',
						  scroll: 1,
						  auto: false,
						  prev: '#prev2',
						  next: '#next2',
						  items: {
						  width: 222,
						  height: 290,
						  	visible: {
						  	min: 2,
						  	max: 6
						  	}
						  },
						  swipe: {
						    onTouch: true,
						    items: 3
						  }
						});
					});
})(jQuery)




$(document).ready( function() {
    if ($(window).width() > 768) {
     $('#dropMenu .level3').addClass('desktop');
	 $('.dropdown.col-9 .levels .level2 > li').eq(4).addClass('last');
	 $('.dropdown.col-9 .levels .level2 > li').eq(9).addClass('last');
	 $('.dropdown.col-8 .levels .level2 > li').eq(3).addClass('last');
	 $('.dropdown.col-8 .levels .level2 > li').eq(7).addClass('last');
	 $('.dropdown.col-7 .levels .level2 > li').eq(3).addClass('last');
	 $('.dropdown.col-7 .levels .level2 > li').eq(7).addClass('last');
	 $('.dropdown.col-6 .levels .level2 > li').eq(2).addClass('last');
	 $('.dropdown.col-6 .levels .level2 > li').eq(5).addClass('last');
	 $('.dropdown.col-6 .levels .level2 > li').eq(8).addClass('last');
	 $('.dropdown.col-5 .levels .level2 > li').eq(1).addClass('last');
	 $('.dropdown.col-5 .levels .level2 > li').eq(3).addClass('last');
	 $('.dropdown.col-5 .levels .level2 > li').eq(5).addClass('last');
	 $('.dropdown.col-5 .levels .level2 > li').eq(7).addClass('last');
	 $('.dropdown.col-5 .levels .level2 > li').eq(9).addClass('last');
	 $('.dropdown.col-5 .levels .level2 > li').eq(11).addClass('last');
	 $('.dropdown.col-4 .levels .level2 > li').eq(1).addClass('last');
	 $('.dropdown.col-4 .levels .level2 > li').eq(3).addClass('last');
	 $('.dropdown.col-4 .levels .level2 > li').eq(5).addClass('last');
	 $('.dropdown.col-4 .levels .level2 > li').eq(7).addClass('last');
	 $('.dropdown.col-4 .levels .level2 > li').eq(9).addClass('last');
	 $('.dropdown.col-4 .levels .level2 > li').eq(11).addClass('last');
	 $( ".last" ).after( "<div class='clearfix'></div>" );
    }
    else {
     $('#dropMenu .level1').removeClass('desktop');
     $('#dropMenu .level1').addClass('mobile');
	 $('.dropdown.col-9 .firstcolumn .levels .level2 > li').eq(1).addClass('last');
	 $('.dropdown.col-9 .firstcolumn .levels .level2 > li').eq(3).addClass('last');
	 $('.dropdown.col-9 .firstcolumn .levels .level2 > li').eq(5).addClass('last');
	 $('.dropdown.col-9 .firstcolumn .levels .level2 > li').eq(7).addClass('last');
	 $( ".last" ).after( "<div class='clearfix'></div>" );
    }
  });

