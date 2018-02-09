jQuery(document).ready(function(){(function($){jQuery('#kiosk_dummy').find('.custom_left_tab_menu ul li:first-child a').addClass('active');var mndFileds=new Array('First Name','Last Name','Email','Phone');var fldLangVal=new Array('First Name','Last Name','Email','Phone');var name='';var email='';function checkMandatory2(){for(i=0;i<mndFileds.length;i++){var fieldObj=document.forms['WebToLeads1429722000001420012'][mndFileds[i]];if(fieldObj){if(((fieldObj.value).replace(/^\s+|\s+$/g,'')).length==0){if(fieldObj.type=='file')
{alert('Please select a file to upload');fieldObj.focus();return false;}
alert(fldLangVal[i]+' cannot be empty');fieldObj.focus();return false;}else if(fieldObj.nodeName=='SELECT'){if(fieldObj.options[fieldObj.selectedIndex].value=='-None-'){alert(fldLangVal[i]+' cannot be none');fieldObj.focus();return false;}}else if(fieldObj.type=='checkbox'){if(fieldObj.checked==false){alert('Please accept  '+fldLangVal[i]);fieldObj.focus();return false;}}
try{if(fieldObj.name=='Last Name'){name=fieldObj.value;}}catch(e){}}}
return validateFileUpload();}
function validateFileUpload(){var uploadedFiles=document.getElementById('theFile');var totalFileSize=0;if(uploadedFiles.files.length>3){alert('You can upload a maximum of 3 files at a time.');return false;}
if('files'in uploadedFiles){if(uploadedFiles.files.length!=0){for(var i=0;i<uploadedFiles.files.length;i++){var file=uploadedFiles.files[i];if('size'in file){totalFileSize=totalFileSize+file.size;}}
if(totalFileSize>20971520){alert('Total File(s) size should not exceed 20 MB.');return false;}}}}
function getParameterByName(name,url){if(!url)url=window.location.href;name=name.replace(/[\[\]]/g,"\\$&");var regex=new RegExp("[?&]"+name+"(=([^&#]*)|&|#|$)"),results=regex.exec(url);if(!results)return null;if(!results[2])return'';return decodeURIComponent(results[2].replace(/\+/g," "));}
var catidd=getParameterByName('catidd');jQuery('.rbs_gallery_button a').each(function(){var test=jQuery(this).attr('data-filter');var res=test.split(".");if(catidd==res[1]){jQuery(this).addClass('active').attr('id',res[1]);jQuery('#'+res[1]).trigger('click')}});if(jQuery('body').hasClass('woocommerce-cart')){jQuery('.woocommerce .cart_item').each(function(){jQuery(this).find('.product-thumbnail img').removeAttr('srcset');});}
jQuery('.my_li').on("click",function(){var li_id=jQuery(this).attr('id');jQuery('.common_class').css('display','none');jQuery('.'+li_id).css('display','block');jQuery('.my_li').removeClass("activeSlide");jQuery('#'+li_id).addClass("activeSlide");});jQuery('.custom_right_tab_content .tab-content:first-child').addClass('active');jQuery('.custom_left_tab_menu a').click(function(event){event.preventDefault();jQuery('.custom_left_tab_menu a').removeClass('active');jQuery(this).addClass('active');var rel_at=jQuery(this).attr('rel');jQuery('.tab-content').removeClass('active');jQuery('body .custom_right_tab_content').find("#"+rel_at).addClass('active');});jQuery('.custom_left_tab_menu a').hover(function(event){event.preventDefault();jQuery('.custom_left_tab_menu a').removeClass('active');jQuery(this).addClass('active');var rel_at=jQuery(this).attr('rel');jQuery('.tab-content').removeClass('active');jQuery('body .custom_right_tab_content').find("#"+rel_at).addClass('active');});jQuery(".doorWidget img").each(function(){var current=jQuery(this).attr("src");var newimg=current.replace(".jpg",".gif");jQuery(this).mouseover(function(){jQuery(this).attr("src",newimg);});jQuery(this).mouseout(function(){jQuery(this).attr("src",current);});});jQuery(".tab-content img").each(function(){var current2=jQuery(this).attr("src");var current_animated=jQuery(this).attr("data-animated");if(current_animated){var newimg2=current2.replace(".jpg",".gif");jQuery(this).mouseover(function(){jQuery(this).attr("src",newimg2);});jQuery(this).mouseout(function(){jQuery(this).attr("src",current2);});}});jQuery("#menu-toggle").click(function(){jQuery("#header-main-menu #main-menu").slideToggle();});jQuery('#header-main-menu #main-menu .menu-item-has-children').append('<i class="fa fa-chevron-down" aria-hidden="true"></i>');jQuery('.fa.fa-chevron-down').click(function(){jQuery(this).parent().find('.sub-menu').slideToggle();});var title=jQuery('.woocommerce .page_header_inner h2').text();jQuery('.woocommerce .container .breadcrumbs').find('.skt-breadcrumbs-separator').append(title);jQuery('.b4afterWrap .shop-now.btn-sm').click(function(){jQuery(this).next().find('.owl-wrapper .owl-item:first-child .item .fancy-img').trigger("click");});jQuery('#ofGalLaunch').click(function(){jQuery(this).next().find('.fancyimg').trigger("click");});jQuery('.page-template-gallery-page').find('#main-header').removeClass('active-style');jQuery(".page-template-gallery-page  #b4QJ ul li a").click(function(){jQuery(this).parents().find('#main-header').addClass('active-style');});jQuery("#home-slider").owlCarousel({paginationNumbers:false,responsiveClass:true,stopOnHover:false,navigation:true,pagination:true,smartSpeed:65000,goToFirstSpeed:13500,singleItem:true,slideSpeed:1200,paginationSpeed:1000,rewindSpeed:1000,autoPlay:13000,items:1,loop:true});jQuery("#testimonial-slider").owlCarousel({autoPlay:3000,autoPlay:true,responsive:true,stopOnHover:true,navigation:false,pagination:false,paginationSpeed:1000,goToFirstSpeed:2000,singleItem:true,autoHeight:true,transitionStyle:"fade"});jQuery("#custom-shower-slider").owlCarousel({autoPlay:true,responsive:true,stopOnHover:true,navigation:false,pagination:false,paginationSpeed:500,singleItem:true,autoHeight:true,transitionStyle:"fade",loop:true});jQuery("#tst-list").owlCarousel({autoPlay:3000,autoPlay:true,responsive:true,stopOnHover:true,navigation:false,pagination:false,paginationSpeed:1000,goToFirstSpeed:2000,singleItem:true,autoHeight:true,transitionStyle:"fade"});jQuery(".b4as").owlCarousel({autoPlay:false,stopOnHover:false,navigation:true,pagination:false,paginationSpeed:1000,goToFirstSpeed:500,autoHeight:true,transitionStyle:"fade",items:3,responsiveClass:true,responsive:{0:{items:1},990:{items:2},1024:{items:3}}});jQuery("#designtips").owlCarousel({autoPlay:false,responsive:true,stopOnHover:false,navigation:false,pagination:true,paginationNumbers:true,slideSpeed:200,paginationSpeed:2000,singleItem:true,items:1,loop:false,touchDrag:true});jQuery('body').find('#home-slider .item').each(function(){var datahash=jQuery(this).attr('data-hash');jQuery(this).parents().find('.owl-controls  .owl-page:nth-child('+datahash+') span').text(datahash);});if(!!$("#faq-list").length)
{$('#faq-list li').each(function(index){var curVal=$(this).find('div.faq-a').height();var isOpen=false;$(this).find('div.faq-q').click(function(){if(!isOpen){$(this).next('div.faq-a').animate({'height':curVal+30});$(this).next('div.faq-a').find('span').text('Collapse [-]');isOpen=true;}else{$(this).next('div.faq-a').animate({'height':92});$(this).next('div.faq-a').find('span').text('Expand [+]');isOpen=false;}});$(this).find('div.faq-a').click(function(){if(!isOpen){$(this).animate({'height':curVal+30});$(this).find('span').text('Collapse [-]');isOpen=true;}else{$(this).animate({'height':92});$(this).find('span').text('Expand [+]');isOpen=false;}});$(this).find('div.faq-a').animate({'height':92});});}
jQuery(".owl-item").mouseenter(function(){jQuery(this).children(".item").children("a").children(".before").css("display","none");jQuery(this).children(".item").children("a").children(".after").css("display","block");});jQuery(".owl-item").mouseleave(function(){jQuery(this).children(".item").children("a").children(".after").css("display","none");jQuery(this).children(".item").children("a").children(".before").css("display","block");});jQuery(".prev").click(function(){jQuery("#dtpager").children(".activeSlide").removeClass("activeSlide").prev("a").addClass("activeSlide");var id=jQuery('#dtpager .activeSlide').attr('id');jQuery('.common_class').css('display','none');jQuery('.'+id).css('display','block');});jQuery(".next").click(function(){jQuery("#dtpager").children(".activeSlide").removeClass("activeSlide").next("a").addClass("activeSlide");var id=jQuery('#dtpager .activeSlide').attr('id');jQuery('.common_class').css('display','none');jQuery('.'+id).css('display','block');});jQuery('.inner-header-search-icon  #main-menu .search-tild-sect a').append('<i class="fa fa-search"></i>');jQuery('.search-tild-sect a').click(function(event){event.preventDefault();jQuery('#search-form').bPopup({closeClass:'b-close'});});jQuery('#btn_send_msg').click(function(event){event.preventDefault();jQuery('#send-msg').bPopup({closeClass:'b-close'});});jQuery('#locddc').click(function(){jQuery('#locdd').slideToggle();});jQuery(".scrollbar").niceScroll({cursorcolor:"#157c81",cursoropacitymin:0.3,background:"#bbb",cursorborder:"0",autohidemode:false,cursorminheight:30});if(jQuery('body').hasClass('.page-template-hardware-finishes')){xssOffset=100;yssOffset=20;}
xssOffset=350;yssOffset=10;if(jQuery(window).width()>768){jQuery(".atribut-preety-effect ul li a, .install_easy_wrapper .fl a").hover(function(e){this.t=this.title;jQuery(this).removeAttr('title');var c=(this.t!="")?"<br/>"+this.t:"";jQuery("body").append("<p id='screenshot'><img src='"+this.rel+"' alt='url preview' /></p>");jQuery("#screenshot").css("top",(e.pageY-xssOffset)+"px").css("left",(e.pageX+yssOffset)+"px").fadeIn("fast");},function(){this.title=this.t;jQuery("#screenshot").remove();});jQuery(".attribute-preety ul li a").mousemove(function(e){jQuery("#screenshot").css("top",(e.pageY-xssOffset)+"px").css("left",(e.pageX+yssOffset)+"px");});}
$("#download_pdf").click(function(ev){ev.preventDefault();alert('hi');var pdf='pdf_send';var data={'action':'internal_pdf','pdf':pdf,};$.post(ajax_object.ajax_url,data,function(responsee){var objj=$.parseJSON(responsee);$.each(objj,function(sub_key,sub_value){$('.attribute-glass_hardwrfinish').find('.bundle-tild-sect li a').each(function(){var textvalue=$.trim($(this).text());if(textvalue==sub_value){$(this).parent().parent().addClass('active-tild-sect').fadeIn();}});});$('#'+currentdiv).fadeOut();$('#'+shownextdiv).fadeIn('slow');});});}(jQuery));});jQuery(window).load(function(){(function($){jQuery(".fancyimg").fancybox({showNavArrows:true,helpers:{overlay:{speedOut:0}}});jQuery(".fancy-img").fancybox({showNavArrows:true,helpers:{overlay:{speedOut:0}}});jQuery(".glass-fancy-box").fancybox({showNavArrows:true,helpers:{overlay:{speedOut:0}}});$('body.tax-product_cat .category-products .product-image').each(function(){var this_height=$(this).height();var shop_thumb=$(this).find('img');var image_height=shop_thumb.height();if(shop_thumb.length&&(this_height>image_height)){var final_height=(this_height-image_height)/2;$(this).find('img').css('margin-top',final_height);}});jQuery('#nmpd1 tr td button').on("click",function(){var msrmntval=jQuery('#nmpd1 tr td .nmpd-display').val();console.log(msrmntval);if(msrmntval){setTimeout(function(){jQuery('body').find('.numpad-sect_1').attr('value',msrmntval);},200);}else{setTimeout(function(){jQuery('body').find('.numpad-sect_1').attr('value','');},200);}});jQuery('#nmpd2 tr td button').on("click",function(){var msrmntval=jQuery('#nmpd2 tr td .nmpd-display').val();if(msrmntval){setTimeout(function(){jQuery('body').find('.numpad-sect_2').attr('value',msrmntval);},200);}else{setTimeout(function(){jQuery('body').find('.numpad-sect_2').attr('value','');},200);}});jQuery('#nmpd3 tr td button').on("click",function(){var msrmntval=jQuery('#nmpd3 tr td .nmpd-display').val();if(msrmntval){setTimeout(function(){jQuery('body').find('.numpad-sect_3').attr('value',msrmntval);},200);}else{setTimeout(function(){jQuery('body').find('.numpad-sect_3').attr('value','');},200);}});}(jQuery));});jQuery(document).ready(function(){var mndFileds=new Array('Last Name');var fldLangVal=new Array('Last Name');var name='';var email='';function checkMandatory(){for(i=0;i<mndFileds.length;i++){var fieldObj=document.forms['WebToLeads1429722000002041873'][mndFileds[i]];if(fieldObj){if(((fieldObj.value).replace(/^\s+|\s+$/g,'')).length==0){if(fieldObj.type=='file')
{alert('Please select a file to upload');fieldObj.focus();return false;}
alert(fldLangVal[i]+' cannot be empty');fieldObj.focus();return false;}else if(fieldObj.nodeName=='SELECT'){if(fieldObj.options[fieldObj.selectedIndex].value=='-None-'){alert(fldLangVal[i]+' cannot be none');fieldObj.focus();return false;}}else if(fieldObj.type=='checkbox'){if(fieldObj.checked==false){alert('Please accept  '+fldLangVal[i]);fieldObj.focus();return false;}}
try{if(fieldObj.name=='Last Name'){name=fieldObj.value;}}catch(e){}}}}});
;/* jquery.nicescroll 3.6.0 InuYaksa*2014 MIT http://nicescroll.areaaperta.com */(function(f) {
    "function" === typeof define && define.amd ? define(["jquery"], f) : f(jQuery)
})(function(f) {
    var y = !1,
        D = !1,
        N = 0,
        O = 2E3,
        x = 0,
        H = ["webkit", "ms", "moz", "o"],
        s = window.requestAnimationFrame || !1,
        t = window.cancelAnimationFrame || !1;
    if (!s)
        for (var P in H) {
            var E = H[P];
            s || (s = window[E + "RequestAnimationFrame"]);
            t || (t = window[E + "CancelAnimationFrame"] || window[E + "CancelRequestAnimationFrame"])
        }
    var v = window.MutationObserver || window.WebKitMutationObserver || !1,
        I = {
            zindex: "auto",
            cursoropacitymin: 1,
            cursoropacitymax: 1,
            cursorcolor: "#424242",
            cursorwidth: "5px",
            cursorborder: "1px solid #fff",
            cursorborderradius: "5px",
            scrollspeed: 60,
            mousescrollstep: 24,
            touchbehavior: !1,
            hwacceleration: !0,
            usetransition: !0,
            boxzoom: !1,
            dblclickzoom: !0,
            gesturezoom: !0,
            grabcursorenabled: !0,
            autohidemode: !0,
            background: "",
            iframeautoresize: !0,
            cursorminheight: 32,
            preservenativescrolling: !0,
            railoffset: !1,
            railhoffset: !1,
            bouncescroll: !0,
            spacebarenabled: !0,
            railpadding: {
                top: 0,
                right: 0,
                left: 0,
                bottom: 0
            },
            disableoutline: !0,
            horizrailenabled: !0,
            railalign: "right",
            railvalign: "bottom",
            enabletranslate3d: !0,
            enablemousewheel: !0,
            enablekeyboard: !0,
            smoothscroll: !0,
            sensitiverail: !0,
            enablemouselockapi: !0,
            cursorfixedheight: !1,
            directionlockdeadzone: 6,
            hidecursordelay: 400,
            nativeparentscrolling: !0,
            enablescrollonselection: !0,
            overflowx: !0,
            overflowy: !0,
            cursordragspeed: .3,
            rtlmode: "auto",
            cursordragontouch: !1,
            oneaxismousemode: "auto",
            scriptpath: function() {
                var f = document.getElementsByTagName("script"),
                    f = f[f.length - 1].src.split("?")[0];
                return 0 < f.split("/").length ? f.split("/").slice(0, -1).join("/") +
                    "/" : ""
            }(),
            preventmultitouchscrolling: !0
        },
        F = !1,
        Q = function() {
            if (F) return F;
            var f = document.createElement("DIV"),
                c = f.style,
                h = navigator.userAgent,
                m = navigator.platform,
                d = {
                    haspointerlock: "pointerLockElement" in document || "webkitPointerLockElement" in document || "mozPointerLockElement" in document
                };
            d.isopera = "opera" in window;
            d.isopera12 = d.isopera && "getUserMedia" in navigator;
            d.isoperamini = "[object OperaMini]" === Object.prototype.toString.call(window.operamini);
            d.isie = "all" in document && "attachEvent" in f && !d.isopera;
            d.isieold = d.isie && !("msInterpolationMode" in c);
            d.isie7 = d.isie && !d.isieold && (!("documentMode" in document) || 7 == document.documentMode);
            d.isie8 = d.isie && "documentMode" in document && 8 == document.documentMode;
            d.isie9 = d.isie && "performance" in window && 9 <= document.documentMode;
            d.isie10 = d.isie && "performance" in window && 10 == document.documentMode;
            d.isie11 = "msRequestFullscreen" in f && 11 <= document.documentMode;
            d.isie9mobile = /iemobile.9/i.test(h);
            d.isie9mobile && (d.isie9 = !1);
            d.isie7mobile = !d.isie9mobile && d.isie7 && /iemobile/i.test(h);
            d.ismozilla = "MozAppearance" in c;
            d.iswebkit = "WebkitAppearance" in c;
            d.ischrome = "chrome" in window;
            d.ischrome22 = d.ischrome && d.haspointerlock;
            d.ischrome26 = d.ischrome && "transition" in c;
            d.cantouch = "ontouchstart" in document.documentElement || "ontouchstart" in window;
            d.hasmstouch = window.MSPointerEvent || !1;
            d.hasw3ctouch = window.PointerEvent || !1;
            d.ismac = /^mac$/i.test(m);
            d.isios = d.cantouch && /iphone|ipad|ipod/i.test(m);
            d.isios4 = d.isios && !("seal" in Object);
            d.isios7 = d.isios && "webkitHidden" in document;
            d.isandroid = /android/i.test(h);
            d.haseventlistener = "addEventListener" in f;
            d.trstyle = !1;
            d.hastransform = !1;
            d.hastranslate3d = !1;
            d.transitionstyle = !1;
            d.hastransition = !1;
            d.transitionend = !1;
            m = ["transform", "msTransform", "webkitTransform", "MozTransform", "OTransform"];
            for (h = 0; h < m.length; h++)
                if ("undefined" != typeof c[m[h]]) {
                    d.trstyle = m[h];
                    break
                }
            d.hastransform = !!d.trstyle;
            d.hastransform && (c[d.trstyle] = "translate3d(1px,2px,3px)", d.hastranslate3d = /translate3d/.test(c[d.trstyle]));
            d.transitionstyle = !1;
            d.prefixstyle = "";
            d.transitionend = !1;
            for (var m =
                    "transition webkitTransition msTransition MozTransition OTransition OTransition KhtmlTransition".split(" "), n = " -webkit- -ms- -moz- -o- -o -khtml-".split(" "), p = "transitionend webkitTransitionEnd msTransitionEnd transitionend otransitionend oTransitionEnd KhtmlTransitionEnd".split(" "), h = 0; h < m.length; h++)
                if (m[h] in c) {
                    d.transitionstyle = m[h];
                    d.prefixstyle = n[h];
                    d.transitionend = p[h];
                    break
                }
            d.ischrome26 && (d.prefixstyle = n[1]);
            d.hastransition = d.transitionstyle;
            a: {
                h = ["-webkit-grab", "-moz-grab", "grab"];
                if (d.ischrome &&
                    !d.ischrome22 || d.isie) h = [];
                for (m = 0; m < h.length; m++)
                    if (n = h[m], c.cursor = n, c.cursor == n) {
                        c = n;
                        break a
                    }
                c = "url(//mail.google.com/mail/images/2/openhand.cur),n-resize"
            }
            d.cursorgrabvalue = c;
            d.hasmousecapture = "setCapture" in f;
            d.hasMutationObserver = !1 !== v;
            return F = d
        },
        R = function(k, c) {
            function h() {
                var b = a.doc.css(e.trstyle);
                return b && "matrix" == b.substr(0, 6) ? b.replace(/^.*\((.*)\)$/g, "$1").replace(/px/g, "").split(/, +/) : !1
            }

            function m() {
                var b = a.win;
                if ("zIndex" in b) return b.zIndex();
                for (; 0 < b.length && 9 != b[0].nodeType;) {
                    var g =
                        b.css("zIndex");
                    if (!isNaN(g) && 0 != g) return parseInt(g);
                    b = b.parent()
                }
                return !1
            }

            function d(b, g, q) {
                g = b.css(g);
                b = parseFloat(g);
                return isNaN(b) ? (b = w[g] || 0, q = 3 == b ? q ? a.win.outerHeight() - a.win.innerHeight() : a.win.outerWidth() - a.win.innerWidth() : 1, a.isie8 && b && (b += 1), q ? b : 0) : b
            }

            function n(b, g, q, c) {
                a._bind(b, g, function(a) {
                    a = a ? a : window.event;
                    var c = {
                        original: a,
                        target: a.target || a.srcElement,
                        type: "wheel",
                        deltaMode: "MozMousePixelScroll" == a.type ? 0 : 1,
                        deltaX: 0,
                        deltaZ: 0,
                        preventDefault: function() {
                            a.preventDefault ? a.preventDefault() :
                                a.returnValue = !1;
                            return !1
                        },
                        stopImmediatePropagation: function() {
                            a.stopImmediatePropagation ? a.stopImmediatePropagation() : a.cancelBubble = !0
                        }
                    };
                    "mousewheel" == g ? (c.deltaY = -.025 * a.wheelDelta, a.wheelDeltaX && (c.deltaX = -.025 * a.wheelDeltaX)) : c.deltaY = a.detail;
                    return q.call(b, c)
                }, c)
            }

            function p(b, g, c) {
                var d, e;
                0 == b.deltaMode ? (d = -Math.floor(a.opt.mousescrollstep / 54 * b.deltaX), e = -Math.floor(a.opt.mousescrollstep / 54 * b.deltaY)) : 1 == b.deltaMode && (d = -Math.floor(b.deltaX * a.opt.mousescrollstep), e = -Math.floor(b.deltaY * a.opt.mousescrollstep));
                g && a.opt.oneaxismousemode && 0 == d && e && (d = e, e = 0, c && (0 > d ? a.getScrollLeft() >= a.page.maxw : 0 >= a.getScrollLeft()) && (e = d, d = 0));
                d && (a.scrollmom && a.scrollmom.stop(), a.lastdeltax += d, a.debounced("mousewheelx", function() {
                    var b = a.lastdeltax;
                    a.lastdeltax = 0;
                    a.rail.drag || a.doScrollLeftBy(b)
                }, 15));
                if (e) {
                    if (a.opt.nativeparentscrolling && c && !a.ispage && !a.zoomactive)
                        if (0 > e) {
                            if (a.getScrollTop() >= a.page.maxh) return !0
                        } else if (0 >= a.getScrollTop()) return !0;
                    a.scrollmom && a.scrollmom.stop();
                    a.lastdeltay += e;
                    a.debounced("mousewheely",
                        function() {
                            var b = a.lastdeltay;
                            a.lastdeltay = 0;
                            a.rail.drag || a.doScrollBy(b)
                        }, 15)
                }
                b.stopImmediatePropagation();
                return b.preventDefault()
            }
            var a = this;
            this.version = "3.6.0";
            this.name = "nicescroll";
            this.me = c;
            this.opt = {
                doc: f("body"),
                win: !1
            };
            f.extend(this.opt, I);
            this.opt.snapbackspeed = 80;
            if (k)
                for (var G in a.opt) "undefined" != typeof k[G] && (a.opt[G] = k[G]);
            this.iddoc = (this.doc = a.opt.doc) && this.doc[0] ? this.doc[0].id || "" : "";
            this.ispage = /^BODY|HTML/.test(a.opt.win ? a.opt.win[0].nodeName : this.doc[0].nodeName);
            this.haswrapper = !1 !== a.opt.win;
            this.win = a.opt.win || (this.ispage ? f(window) : this.doc);
            this.docscroll = this.ispage && !this.haswrapper ? f(window) : this.win;
            this.body = f("body");
            this.iframe = this.isfixed = this.viewport = !1;
            this.isiframe = "IFRAME" == this.doc[0].nodeName && "IFRAME" == this.win[0].nodeName;
            this.istextarea = "TEXTAREA" == this.win[0].nodeName;
            this.forcescreen = !1;
            this.canshowonmouseevent = "scroll" != a.opt.autohidemode;
            this.page = this.view = this.onzoomout = this.onzoomin = this.onscrollcancel = this.onscrollend = this.onscrollstart = this.onclick =
                this.ongesturezoom = this.onkeypress = this.onmousewheel = this.onmousemove = this.onmouseup = this.onmousedown = !1;
            this.scroll = {
                x: 0,
                y: 0
            };
            this.scrollratio = {
                x: 0,
                y: 0
            };
            this.cursorheight = 20;
            this.scrollvaluemax = 0;
            this.isrtlmode = "auto" == this.opt.rtlmode ? "rtl" == (this.win[0] == window ? this.body : this.win).css("direction") : !0 === this.opt.rtlmode;
            this.observerbody = this.observerremover = this.observer = this.scrollmom = this.scrollrunning = !1;
            do this.id = "ascrail" + O++; while (document.getElementById(this.id));
            this.hasmousefocus = this.hasfocus =
                this.zoomactive = this.zoom = this.selectiondrag = this.cursorfreezed = this.cursor = this.rail = !1;
            this.visibility = !0;
            this.hidden = this.locked = this.railslocked = !1;
            this.cursoractive = !0;
            this.wheelprevented = !1;
            this.overflowx = a.opt.overflowx;
            this.overflowy = a.opt.overflowy;
            this.nativescrollingarea = !1;
            this.checkarea = 0;
            this.events = [];
            this.saved = {};
            this.delaylist = {};
            this.synclist = {};
            this.lastdeltay = this.lastdeltax = 0;
            this.detected = Q();
            var e = f.extend({}, this.detected);
            this.ishwscroll = (this.canhwscroll = e.hastransform &&
                a.opt.hwacceleration) && a.haswrapper;
            this.hasreversehr = this.isrtlmode && !e.iswebkit;
            this.istouchcapable = !1;
            !e.cantouch || e.isios || e.isandroid || !e.iswebkit && !e.ismozilla || (this.istouchcapable = !0, e.cantouch = !1);
            a.opt.enablemouselockapi || (e.hasmousecapture = !1, e.haspointerlock = !1);
            this.debounced = function(b, g, c) {
                var d = a.delaylist[b];
                a.delaylist[b] = g;
                d || setTimeout(function() {
                    var g = a.delaylist[b];
                    a.delaylist[b] = !1;
                    g.call(a)
                }, c)
            };
            var r = !1;
            this.synched = function(b, g) {
                a.synclist[b] = g;
                (function() {
                    r || (s(function() {
                        r = !1;
                        for (var b in a.synclist) {
                            var g = a.synclist[b];
                            g && g.call(a);
                            a.synclist[b] = !1
                        }
                    }), r = !0)
                })();
                return b
            };
            this.unsynched = function(b) {
                a.synclist[b] && (a.synclist[b] = !1)
            };
            this.css = function(b, g) {
                for (var c in g) a.saved.css.push([b, c, b.css(c)]), b.css(c, g[c])
            };
            this.scrollTop = function(b) {
                return "undefined" == typeof b ? a.getScrollTop() : a.setScrollTop(b)
            };
            this.scrollLeft = function(b) {
                return "undefined" == typeof b ? a.getScrollLeft() : a.setScrollLeft(b)
            };
            var A = function(a, g, c, d, e, f, h) {
                this.st = a;
                this.ed = g;
                this.spd = c;
                this.p1 =
                    d || 0;
                this.p2 = e || 1;
                this.p3 = f || 0;
                this.p4 = h || 1;
                this.ts = (new Date).getTime();
                this.df = this.ed - this.st
            };
            A.prototype = {
                B2: function(a) {
                    return 3 * a * a * (1 - a)
                },
                B3: function(a) {
                    return 3 * a * (1 - a) * (1 - a)
                },
                B4: function(a) {
                    return (1 - a) * (1 - a) * (1 - a)
                },
                getNow: function() {
                    var a = 1 - ((new Date).getTime() - this.ts) / this.spd,
                        g = this.B2(a) + this.B3(a) + this.B4(a);
                    return 0 > a ? this.ed : this.st + Math.round(this.df * g)
                },
                update: function(a, g) {
                    this.st = this.getNow();
                    this.ed = a;
                    this.spd = g;
                    this.ts = (new Date).getTime();
                    this.df = this.ed - this.st;
                    return this
                }
            };
            if (this.ishwscroll) {
                this.doc.translate = {
                    x: 0,
                    y: 0,
                    tx: "0px",
                    ty: "0px"
                };
                e.hastranslate3d && e.isios && this.doc.css("-webkit-backface-visibility", "hidden");
                this.getScrollTop = function(b) {
                    if (!b) {
                        if (b = h()) return 16 == b.length ? -b[13] : -b[5];
                        if (a.timerscroll && a.timerscroll.bz) return a.timerscroll.bz.getNow()
                    }
                    return a.doc.translate.y
                };
                this.getScrollLeft = function(b) {
                    if (!b) {
                        if (b = h()) return 16 == b.length ? -b[12] : -b[4];
                        if (a.timerscroll && a.timerscroll.bh) return a.timerscroll.bh.getNow()
                    }
                    return a.doc.translate.x
                };
                this.notifyScrollEvent =
                    function(a) {
                        var g = document.createEvent("UIEvents");
                        g.initUIEvent("scroll", !1, !0, window, 1);
                        g.niceevent = !0;
                        a.dispatchEvent(g)
                    };
                var K = this.isrtlmode ? 1 : -1;
                e.hastranslate3d && a.opt.enabletranslate3d ? (this.setScrollTop = function(b, g) {
                    a.doc.translate.y = b;
                    a.doc.translate.ty = -1 * b + "px";
                    a.doc.css(e.trstyle, "translate3d(" + a.doc.translate.tx + "," + a.doc.translate.ty + ",0px)");
                    g || a.notifyScrollEvent(a.win[0])
                }, this.setScrollLeft = function(b, g) {
                    a.doc.translate.x = b;
                    a.doc.translate.tx = b * K + "px";
                    a.doc.css(e.trstyle, "translate3d(" +
                        a.doc.translate.tx + "," + a.doc.translate.ty + ",0px)");
                    g || a.notifyScrollEvent(a.win[0])
                }) : (this.setScrollTop = function(b, g) {
                    a.doc.translate.y = b;
                    a.doc.translate.ty = -1 * b + "px";
                    a.doc.css(e.trstyle, "translate(" + a.doc.translate.tx + "," + a.doc.translate.ty + ")");
                    g || a.notifyScrollEvent(a.win[0])
                }, this.setScrollLeft = function(b, g) {
                    a.doc.translate.x = b;
                    a.doc.translate.tx = b * K + "px";
                    a.doc.css(e.trstyle, "translate(" + a.doc.translate.tx + "," + a.doc.translate.ty + ")");
                    g || a.notifyScrollEvent(a.win[0])
                })
            } else this.getScrollTop =
                function() {
                    return a.docscroll.scrollTop()
                }, this.setScrollTop = function(b) {
                    return a.docscroll.scrollTop(b)
                }, this.getScrollLeft = function() {
                    return a.detected.ismozilla && a.isrtlmode ? Math.abs(a.docscroll.scrollLeft()) : a.docscroll.scrollLeft()
                }, this.setScrollLeft = function(b) {
                    return a.docscroll.scrollLeft(a.detected.ismozilla && a.isrtlmode ? -b : b)
                };
            this.getTarget = function(a) {
                return a ? a.target ? a.target : a.srcElement ? a.srcElement : !1 : !1
            };
            this.hasParent = function(a, g) {
                if (!a) return !1;
                for (var c = a.target || a.srcElement ||
                        a || !1; c && c.id != g;) c = c.parentNode || !1;
                return !1 !== c
            };
            var w = {
                thin: 1,
                medium: 3,
                thick: 5
            };
            this.getDocumentScrollOffset = function() {
                return {
                    top: window.pageYOffset || document.documentElement.scrollTop,
                    left: window.pageXOffset || document.documentElement.scrollLeft
                }
            };
            this.getOffset = function() {
                if (a.isfixed) {
                    var b = a.win.offset(),
                        g = a.getDocumentScrollOffset();
                    b.top -= g.top;
                    b.left -= g.left;
                    return b
                }
                b = a.win.offset();
                if (!a.viewport) return b;
                g = a.viewport.offset();
                return {
                    top: b.top - g.top,
                    left: b.left - g.left
                }
            };
            this.updateScrollBar =
                function(b) {
                    if (a.ishwscroll) a.rail.css({
                        height: a.win.innerHeight() - (a.opt.railpadding.top + a.opt.railpadding.bottom)
                    }), a.railh && a.railh.css({
                        width: a.win.innerWidth() - (a.opt.railpadding.left + a.opt.railpadding.right)
                    });
                    else {
                        var g = a.getOffset(),
                            c = g.top,
                            e = g.left - (a.opt.railpadding.left + a.opt.railpadding.right),
                            c = c + d(a.win, "border-top-width", !0),
                            e = e + (a.rail.align ? a.win.outerWidth() - d(a.win, "border-right-width") - a.rail.width : d(a.win, "border-left-width")),
                            f = a.opt.railoffset;
                        f && (f.top && (c += f.top), a.rail.align &&
                            f.left && (e += f.left));
                        a.railslocked || a.rail.css({
                            top: c,
                            left: e,
                            height: (b ? b.h : a.win.innerHeight()) - (a.opt.railpadding.top + a.opt.railpadding.bottom)
                        });
                        a.zoom && a.zoom.css({
                            top: c + 1,
                            left: 1 == a.rail.align ? e - 20 : e + a.rail.width + 4
                        });
                        if (a.railh && !a.railslocked) {
                            c = g.top;
                            e = g.left;
                            if (f = a.opt.railhoffset) f.top && (c += f.top), f.left && (e += f.left);
                            b = a.railh.align ? c + d(a.win, "border-top-width", !0) + a.win.innerHeight() - a.railh.height : c + d(a.win, "border-top-width", !0);
                            e += d(a.win, "border-left-width");
                            a.railh.css({
                                top: b - (a.opt.railpadding.top +
                                    a.opt.railpadding.bottom),
                                left: e,
                                width: a.railh.width
                            })
                        }
                    }
                };
            this.doRailClick = function(b, g, c) {
                var e;
                a.railslocked || (a.cancelEvent(b), g ? (g = c ? a.doScrollLeft : a.doScrollTop, e = c ? (b.pageX - a.railh.offset().left - a.cursorwidth / 2) * a.scrollratio.x : (b.pageY - a.rail.offset().top - a.cursorheight / 2) * a.scrollratio.y, g(e)) : (g = c ? a.doScrollLeftBy : a.doScrollBy, e = c ? a.scroll.x : a.scroll.y, b = c ? b.pageX - a.railh.offset().left : b.pageY - a.rail.offset().top, c = c ? a.view.w : a.view.h, g(e >= b ? c : -c)))
            };
            a.hasanimationframe = s;
            a.hascancelanimationframe =
                t;
            a.hasanimationframe ? a.hascancelanimationframe || (t = function() {
                a.cancelAnimationFrame = !0
            }) : (s = function(a) {
                return setTimeout(a, 15 - Math.floor(+new Date / 1E3) % 16)
            }, t = clearInterval);
            this.init = function() {
                a.saved.css = [];
                if (e.isie7mobile || e.isoperamini) return !0;
                e.hasmstouch && a.css(a.ispage ? f("html") : a.win, {
                    "-ms-touch-action": "none"
                });
                a.zindex = "auto";
                a.zindex = a.ispage || "auto" != a.opt.zindex ? a.opt.zindex : m() || "auto";
                !a.ispage && "auto" != a.zindex && a.zindex > x && (x = a.zindex);
                a.isie && 0 == a.zindex && "auto" == a.opt.zindex &&
                    (a.zindex = "auto");
                if (!a.ispage || !e.cantouch && !e.isieold && !e.isie9mobile) {
                    var b = a.docscroll;
                    a.ispage && (b = a.haswrapper ? a.win : a.doc);
                    e.isie9mobile || a.css(b, {
                        "overflow-y": "hidden"
                    });
                    a.ispage && e.isie7 && ("BODY" == a.doc[0].nodeName ? a.css(f("html"), {
                        "overflow-y": "hidden"
                    }) : "HTML" == a.doc[0].nodeName && a.css(f("body"), {
                        "overflow-y": "hidden"
                    }));
                    !e.isios || a.ispage || a.haswrapper || a.css(f("body"), {
                        "-webkit-overflow-scrolling": "touch"
                    });
                    var g = f(document.createElement("div"));
                    g.css({
                        position: "relative",
                        top: 0,
                        "float": "right",
                        width: a.opt.cursorwidth,
                        height: "0px",
                        "background-color": a.opt.cursorcolor,
                        border: a.opt.cursorborder,
                        "background-clip": "padding-box",
                        "-webkit-border-radius": a.opt.cursorborderradius,
                        "-moz-border-radius": a.opt.cursorborderradius,
                        "border-radius": a.opt.cursorborderradius
                    });
                    g.hborder = parseFloat(g.outerHeight() - g.innerHeight());
                    g.addClass("nicescroll-cursors");
                    a.cursor = g;
                    var c = f(document.createElement("div"));
                    c.attr("id", a.id);
                    c.addClass("nicescroll-rails nicescroll-rails-vr");
                    var d, h, k = ["left", "right",
                            "top", "bottom"
                        ],
                        J;
                    for (J in k) h = k[J], (d = a.opt.railpadding[h]) ? c.css("padding-" + h, d + "px") : a.opt.railpadding[h] = 0;
                    c.append(g);
                    c.width = Math.max(parseFloat(a.opt.cursorwidth), g.outerWidth());
                    c.css({
                        width: c.width + "px",
                        zIndex: a.zindex,
                        background: a.opt.background,
                        cursor: "default"
                    });
                    c.visibility = !0;
                    c.scrollable = !0;
                    c.align = "left" == a.opt.railalign ? 0 : 1;
                    a.rail = c;
                    g = a.rail.drag = !1;
                    !a.opt.boxzoom || a.ispage || e.isieold || (g = document.createElement("div"), a.bind(g, "click", a.doZoom), a.bind(g, "mouseenter", function() {
                        a.zoom.css("opacity",
                            a.opt.cursoropacitymax)
                    }), a.bind(g, "mouseleave", function() {
                        a.zoom.css("opacity", a.opt.cursoropacitymin)
                    }), a.zoom = f(g), a.zoom.css({
                        cursor: "pointer",
                        "z-index": a.zindex,
                        backgroundImage: "url(" + a.opt.scriptpath + "zoomico.png)",
                        height: 18,
                        width: 18,
                        backgroundPosition: "0px 0px"
                    }), a.opt.dblclickzoom && a.bind(a.win, "dblclick", a.doZoom), e.cantouch && a.opt.gesturezoom && (a.ongesturezoom = function(b) {
                        1.5 < b.scale && a.doZoomIn(b);.8 > b.scale && a.doZoomOut(b);
                        return a.cancelEvent(b)
                    }, a.bind(a.win, "gestureend", a.ongesturezoom)));
                    a.railh = !1;
                    var l;
                    a.opt.horizrailenabled && (a.css(b, {
                            "overflow-x": "hidden"
                        }), g = f(document.createElement("div")), g.css({
                            position: "absolute",
                            top: 0,
                            height: a.opt.cursorwidth,
                            width: "0px",
                            "background-color": a.opt.cursorcolor,
                            border: a.opt.cursorborder,
                            "background-clip": "padding-box",
                            "-webkit-border-radius": a.opt.cursorborderradius,
                            "-moz-border-radius": a.opt.cursorborderradius,
                            "border-radius": a.opt.cursorborderradius
                        }), e.isieold && g.css({
                            overflow: "hidden"
                        }), g.wborder = parseFloat(g.outerWidth() - g.innerWidth()),
                        g.addClass("nicescroll-cursors"), a.cursorh = g, l = f(document.createElement("div")), l.attr("id", a.id + "-hr"), l.addClass("nicescroll-rails nicescroll-rails-hr"), l.height = Math.max(parseFloat(a.opt.cursorwidth), g.outerHeight()), l.css({
                            height: l.height + "px",
                            zIndex: a.zindex,
                            background: a.opt.background
                        }), l.append(g), l.visibility = !0, l.scrollable = !0, l.align = "top" == a.opt.railvalign ? 0 : 1, a.railh = l, a.railh.drag = !1);
                    a.ispage ? (c.css({
                            position: "fixed",
                            top: "0px",
                            height: "100%"
                        }), c.align ? c.css({
                            right: "0px"
                        }) : c.css({
                            left: "0px"
                        }),
                        a.body.append(c), a.railh && (l.css({
                            position: "fixed",
                            left: "0px",
                            width: "100%"
                        }), l.align ? l.css({
                            bottom: "0px"
                        }) : l.css({
                            top: "0px"
                        }), a.body.append(l))) : (a.ishwscroll ? ("static" == a.win.css("position") && a.css(a.win, {
                        position: "relative"
                    }), b = "HTML" == a.win[0].nodeName ? a.body : a.win, f(b).scrollTop(0).scrollLeft(0), a.zoom && (a.zoom.css({
                        position: "absolute",
                        top: 1,
                        right: 0,
                        "margin-right": c.width + 4
                    }), b.append(a.zoom)), c.css({
                        position: "absolute",
                        top: 0
                    }), c.align ? c.css({
                        right: 0
                    }) : c.css({
                        left: 0
                    }), b.append(c), l && (l.css({
                        position: "absolute",
                        left: 0,
                        bottom: 0
                    }), l.align ? l.css({
                        bottom: 0
                    }) : l.css({
                        top: 0
                    }), b.append(l))) : (a.isfixed = "fixed" == a.win.css("position"), b = a.isfixed ? "fixed" : "absolute", a.isfixed || (a.viewport = a.getViewport(a.win[0])), a.viewport && (a.body = a.viewport, 0 == /fixed|absolute/.test(a.viewport.css("position")) && a.css(a.viewport, {
                        position: "relative"
                    })), c.css({
                        position: b
                    }), a.zoom && a.zoom.css({
                        position: b
                    }), a.updateScrollBar(), a.body.append(c), a.zoom && a.body.append(a.zoom), a.railh && (l.css({
                        position: b
                    }), a.body.append(l))), e.isios && a.css(a.win, {
                        "-webkit-tap-highlight-color": "rgba(0,0,0,0)",
                        "-webkit-touch-callout": "none"
                    }), e.isie && a.opt.disableoutline && a.win.attr("hideFocus", "true"), e.iswebkit && a.opt.disableoutline && a.win.css({
                        outline: "none"
                    }));
                    !1 === a.opt.autohidemode ? (a.autohidedom = !1, a.rail.css({
                        opacity: a.opt.cursoropacitymax
                    }), a.railh && a.railh.css({
                        opacity: a.opt.cursoropacitymax
                    })) : !0 === a.opt.autohidemode || "leave" === a.opt.autohidemode ? (a.autohidedom = f().add(a.rail), e.isie8 && (a.autohidedom = a.autohidedom.add(a.cursor)), a.railh && (a.autohidedom =
                        a.autohidedom.add(a.railh)), a.railh && e.isie8 && (a.autohidedom = a.autohidedom.add(a.cursorh))) : "scroll" == a.opt.autohidemode ? (a.autohidedom = f().add(a.rail), a.railh && (a.autohidedom = a.autohidedom.add(a.railh))) : "cursor" == a.opt.autohidemode ? (a.autohidedom = f().add(a.cursor), a.railh && (a.autohidedom = a.autohidedom.add(a.cursorh))) : "hidden" == a.opt.autohidemode && (a.autohidedom = !1, a.hide(), a.railslocked = !1);
                    if (e.isie9mobile) a.scrollmom = new L(a), a.onmangotouch = function() {
                        var b = a.getScrollTop(),
                            c = a.getScrollLeft();
                        if (b == a.scrollmom.lastscrolly && c == a.scrollmom.lastscrollx) return !0;
                        var g = b - a.mangotouch.sy,
                            e = c - a.mangotouch.sx;
                        if (0 != Math.round(Math.sqrt(Math.pow(e, 2) + Math.pow(g, 2)))) {
                            var d = 0 > g ? -1 : 1,
                                f = 0 > e ? -1 : 1,
                                q = +new Date;
                            a.mangotouch.lazy && clearTimeout(a.mangotouch.lazy);
                            80 < q - a.mangotouch.tm || a.mangotouch.dry != d || a.mangotouch.drx != f ? (a.scrollmom.stop(), a.scrollmom.reset(c, b), a.mangotouch.sy = b, a.mangotouch.ly = b, a.mangotouch.sx = c, a.mangotouch.lx = c, a.mangotouch.dry = d, a.mangotouch.drx = f, a.mangotouch.tm = q) : (a.scrollmom.stop(),
                                a.scrollmom.update(a.mangotouch.sx - e, a.mangotouch.sy - g), a.mangotouch.tm = q, g = Math.max(Math.abs(a.mangotouch.ly - b), Math.abs(a.mangotouch.lx - c)), a.mangotouch.ly = b, a.mangotouch.lx = c, 2 < g && (a.mangotouch.lazy = setTimeout(function() {
                                    a.mangotouch.lazy = !1;
                                    a.mangotouch.dry = 0;
                                    a.mangotouch.drx = 0;
                                    a.mangotouch.tm = 0;
                                    a.scrollmom.doMomentum(30)
                                }, 100)))
                        }
                    }, c = a.getScrollTop(), l = a.getScrollLeft(), a.mangotouch = {
                        sy: c,
                        ly: c,
                        dry: 0,
                        sx: l,
                        lx: l,
                        drx: 0,
                        lazy: !1,
                        tm: 0
                    }, a.bind(a.docscroll, "scroll", a.onmangotouch);
                    else {
                        if (e.cantouch ||
                            a.istouchcapable || a.opt.touchbehavior || e.hasmstouch) {
                            a.scrollmom = new L(a);
                            a.ontouchstart = function(b) {
                                if (b.pointerType && 2 != b.pointerType && "touch" != b.pointerType) return !1;
                                a.hasmoving = !1;
                                if (!a.railslocked) {
                                    var c;
                                    if (e.hasmstouch)
                                        for (c = b.target ? b.target : !1; c;) {
                                            var g = f(c).getNiceScroll();
                                            if (0 < g.length && g[0].me == a.me) break;
                                            if (0 < g.length) return !1;
                                            if ("DIV" == c.nodeName && c.id == a.id) break;
                                            c = c.parentNode ? c.parentNode : !1
                                        }
                                    a.cancelScroll();
                                    if ((c = a.getTarget(b)) && /INPUT/i.test(c.nodeName) && /range/i.test(c.type)) return a.stopPropagation(b);
                                    !("clientX" in b) && "changedTouches" in b && (b.clientX = b.changedTouches[0].clientX, b.clientY = b.changedTouches[0].clientY);
                                    a.forcescreen && (g = b, b = {
                                        original: b.original ? b.original : b
                                    }, b.clientX = g.screenX, b.clientY = g.screenY);
                                    a.rail.drag = {
                                        x: b.clientX,
                                        y: b.clientY,
                                        sx: a.scroll.x,
                                        sy: a.scroll.y,
                                        st: a.getScrollTop(),
                                        sl: a.getScrollLeft(),
                                        pt: 2,
                                        dl: !1
                                    };
                                    if (a.ispage || !a.opt.directionlockdeadzone) a.rail.drag.dl = "f";
                                    else {
                                        var g = f(window).width(),
                                            d = f(window).height(),
                                            q = Math.max(document.body.scrollWidth, document.documentElement.scrollWidth),
                                            h = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight),
                                            d = Math.max(0, h - d),
                                            g = Math.max(0, q - g);
                                        a.rail.drag.ck = !a.rail.scrollable && a.railh.scrollable ? 0 < d ? "v" : !1 : a.rail.scrollable && !a.railh.scrollable ? 0 < g ? "h" : !1 : !1;
                                        a.rail.drag.ck || (a.rail.drag.dl = "f")
                                    }
                                    a.opt.touchbehavior && a.isiframe && e.isie && (g = a.win.position(), a.rail.drag.x += g.left, a.rail.drag.y += g.top);
                                    a.hasmoving = !1;
                                    a.lastmouseup = !1;
                                    a.scrollmom.reset(b.clientX, b.clientY);
                                    if (!e.cantouch && !this.istouchcapable && !b.pointerType) {
                                        if (!c ||
                                            !/INPUT|SELECT|TEXTAREA/i.test(c.nodeName)) return !a.ispage && e.hasmousecapture && c.setCapture(), a.opt.touchbehavior ? (c.onclick && !c._onclick && (c._onclick = c.onclick, c.onclick = function(b) {
                                            if (a.hasmoving) return !1;
                                            c._onclick.call(this, b)
                                        }), a.cancelEvent(b)) : a.stopPropagation(b);
                                        /SUBMIT|CANCEL|BUTTON/i.test(f(c).attr("type")) && (pc = {
                                            tg: c,
                                            click: !1
                                        }, a.preventclick = pc)
                                    }
                                }
                            };
                            a.ontouchend = function(b) {
                                if (!a.rail.drag) return !0;
                                if (2 == a.rail.drag.pt) {
                                    if (b.pointerType && 2 != b.pointerType && "touch" != b.pointerType) return !1;
                                    a.scrollmom.doMomentum();
                                    a.rail.drag = !1;
                                    if (a.hasmoving && (a.lastmouseup = !0, a.hideCursor(), e.hasmousecapture && document.releaseCapture(), !e.cantouch)) return a.cancelEvent(b)
                                } else if (1 == a.rail.drag.pt) return a.onmouseup(b)
                            };
                            var n = a.opt.touchbehavior && a.isiframe && !e.hasmousecapture;
                            a.ontouchmove = function(b, c) {
                                if (!a.rail.drag || b.targetTouches && a.opt.preventmultitouchscrolling && 1 < b.targetTouches.length || b.pointerType && 2 != b.pointerType && "touch" != b.pointerType) return !1;
                                if (2 == a.rail.drag.pt) {
                                    if (e.cantouch &&
                                        e.isios && "undefined" == typeof b.original) return !0;
                                    a.hasmoving = !0;
                                    a.preventclick && !a.preventclick.click && (a.preventclick.click = a.preventclick.tg.onclick || !1, a.preventclick.tg.onclick = a.onpreventclick);
                                    b = f.extend({
                                        original: b
                                    }, b);
                                    "changedTouches" in b && (b.clientX = b.changedTouches[0].clientX, b.clientY = b.changedTouches[0].clientY);
                                    if (a.forcescreen) {
                                        var g = b;
                                        b = {
                                            original: b.original ? b.original : b
                                        };
                                        b.clientX = g.screenX;
                                        b.clientY = g.screenY
                                    }
                                    var d, g = d = 0;
                                    n && !c && (d = a.win.position(), g = -d.left, d = -d.top);
                                    var q = b.clientY +
                                        d;
                                    d = q - a.rail.drag.y;
                                    var h = b.clientX + g,
                                        u = h - a.rail.drag.x,
                                        k = a.rail.drag.st - d;
                                    a.ishwscroll && a.opt.bouncescroll ? 0 > k ? k = Math.round(k / 2) : k > a.page.maxh && (k = a.page.maxh + Math.round((k - a.page.maxh) / 2)) : (0 > k && (q = k = 0), k > a.page.maxh && (k = a.page.maxh, q = 0));
                                    var l;
                                    a.railh && a.railh.scrollable && (l = a.isrtlmode ? u - a.rail.drag.sl : a.rail.drag.sl - u, a.ishwscroll && a.opt.bouncescroll ? 0 > l ? l = Math.round(l / 2) : l > a.page.maxw && (l = a.page.maxw + Math.round((l - a.page.maxw) / 2)) : (0 > l && (h = l = 0), l > a.page.maxw && (l = a.page.maxw, h = 0)));
                                    g = !1;
                                    if (a.rail.drag.dl) g = !0, "v" == a.rail.drag.dl ? l = a.rail.drag.sl : "h" == a.rail.drag.dl && (k = a.rail.drag.st);
                                    else {
                                        d = Math.abs(d);
                                        var u = Math.abs(u),
                                            z = a.opt.directionlockdeadzone;
                                        if ("v" == a.rail.drag.ck) {
                                            if (d > z && u <= .3 * d) return a.rail.drag = !1, !0;
                                            u > z && (a.rail.drag.dl = "f", f("body").scrollTop(f("body").scrollTop()))
                                        } else if ("h" == a.rail.drag.ck) {
                                            if (u > z && d <= .3 * u) return a.rail.drag = !1, !0;
                                            d > z && (a.rail.drag.dl = "f", f("body").scrollLeft(f("body").scrollLeft()))
                                        }
                                    }
                                    a.synched("touchmove", function() {
                                        a.rail.drag && 2 == a.rail.drag.pt && (a.prepareTransition &&
                                            a.prepareTransition(0), a.rail.scrollable && a.setScrollTop(k), a.scrollmom.update(h, q), a.railh && a.railh.scrollable ? (a.setScrollLeft(l), a.showCursor(k, l)) : a.showCursor(k), e.isie10 && document.selection.clear())
                                    });
                                    e.ischrome && a.istouchcapable && (g = !1);
                                    if (g) return a.cancelEvent(b)
                                } else if (1 == a.rail.drag.pt) return a.onmousemove(b)
                            }
                        }
                        a.onmousedown = function(b, c) {
                            if (!a.rail.drag || 1 == a.rail.drag.pt) {
                                if (a.railslocked) return a.cancelEvent(b);
                                a.cancelScroll();
                                a.rail.drag = {
                                    x: b.clientX,
                                    y: b.clientY,
                                    sx: a.scroll.x,
                                    sy: a.scroll.y,
                                    pt: 1,
                                    hr: !!c
                                };
                                var g = a.getTarget(b);
                                !a.ispage && e.hasmousecapture && g.setCapture();
                                a.isiframe && !e.hasmousecapture && (a.saved.csspointerevents = a.doc.css("pointer-events"), a.css(a.doc, {
                                    "pointer-events": "none"
                                }));
                                a.hasmoving = !1;
                                return a.cancelEvent(b)
                            }
                        };
                        a.onmouseup = function(b) {
                            if (a.rail.drag) {
                                if (1 != a.rail.drag.pt) return !0;
                                e.hasmousecapture && document.releaseCapture();
                                a.isiframe && !e.hasmousecapture && a.doc.css("pointer-events", a.saved.csspointerevents);
                                a.rail.drag = !1;
                                a.hasmoving && a.triggerScrollEnd();
                                return a.cancelEvent(b)
                            }
                        };
                        a.onmousemove = function(b) {
                            if (a.rail.drag && 1 == a.rail.drag.pt) {
                                if (e.ischrome && 0 == b.which) return a.onmouseup(b);
                                a.cursorfreezed = !0;
                                a.hasmoving = !0;
                                if (a.rail.drag.hr) {
                                    a.scroll.x = a.rail.drag.sx + (b.clientX - a.rail.drag.x);
                                    0 > a.scroll.x && (a.scroll.x = 0);
                                    var c = a.scrollvaluemaxw;
                                    a.scroll.x > c && (a.scroll.x = c)
                                } else a.scroll.y = a.rail.drag.sy + (b.clientY - a.rail.drag.y), 0 > a.scroll.y && (a.scroll.y = 0), c = a.scrollvaluemax, a.scroll.y > c && (a.scroll.y = c);
                                a.synched("mousemove", function() {
                                    a.rail.drag && 1 == a.rail.drag.pt && (a.showCursor(),
                                        a.rail.drag.hr ? a.hasreversehr ? a.doScrollLeft(a.scrollvaluemaxw - Math.round(a.scroll.x * a.scrollratio.x), a.opt.cursordragspeed) : a.doScrollLeft(Math.round(a.scroll.x * a.scrollratio.x), a.opt.cursordragspeed) : a.doScrollTop(Math.round(a.scroll.y * a.scrollratio.y), a.opt.cursordragspeed))
                                });
                                return a.cancelEvent(b)
                            }
                        };
                        if (e.cantouch || a.opt.touchbehavior) a.onpreventclick = function(b) {
                            if (a.preventclick) return a.preventclick.tg.onclick = a.preventclick.click, a.preventclick = !1, a.cancelEvent(b)
                        }, a.bind(a.win, "mousedown",
                            a.ontouchstart), a.onclick = e.isios ? !1 : function(b) {
                            return a.lastmouseup ? (a.lastmouseup = !1, a.cancelEvent(b)) : !0
                        }, a.opt.grabcursorenabled && e.cursorgrabvalue && (a.css(a.ispage ? a.doc : a.win, {
                            cursor: e.cursorgrabvalue
                        }), a.css(a.rail, {
                            cursor: e.cursorgrabvalue
                        }));
                        else {
                            var p = function(b) {
                                if (a.selectiondrag) {
                                    if (b) {
                                        var c = a.win.outerHeight();
                                        b = b.pageY - a.selectiondrag.top;
                                        0 < b && b < c && (b = 0);
                                        b >= c && (b -= c);
                                        a.selectiondrag.df = b
                                    }
                                    0 != a.selectiondrag.df && (a.doScrollBy(2 * -Math.floor(a.selectiondrag.df / 6)), a.debounced("doselectionscroll",
                                        function() {
                                            p()
                                        }, 50))
                                }
                            };
                            a.hasTextSelected = "getSelection" in document ? function() {
                                return 0 < document.getSelection().rangeCount
                            } : "selection" in document ? function() {
                                return "None" != document.selection.type
                            } : function() {
                                return !1
                            };
                            a.onselectionstart = function(b) {
                                a.ispage || (a.selectiondrag = a.win.offset())
                            };
                            a.onselectionend = function(b) {
                                a.selectiondrag = !1
                            };
                            a.onselectiondrag = function(b) {
                                a.selectiondrag && a.hasTextSelected() && a.debounced("selectionscroll", function() {
                                    p(b)
                                }, 250)
                            }
                        }
                        e.hasw3ctouch ? (a.css(a.rail, {
                                "touch-action": "none"
                            }),
                            a.css(a.cursor, {
                                "touch-action": "none"
                            }), a.bind(a.win, "pointerdown", a.ontouchstart), a.bind(document, "pointerup", a.ontouchend), a.bind(document, "pointermove", a.ontouchmove)) : e.hasmstouch ? (a.css(a.rail, {
                            "-ms-touch-action": "none"
                        }), a.css(a.cursor, {
                            "-ms-touch-action": "none"
                        }), a.bind(a.win, "MSPointerDown", a.ontouchstart), a.bind(document, "MSPointerUp", a.ontouchend), a.bind(document, "MSPointerMove", a.ontouchmove), a.bind(a.cursor, "MSGestureHold", function(a) {
                            a.preventDefault()
                        }), a.bind(a.cursor, "contextmenu",
                            function(a) {
                                a.preventDefault()
                            })) : this.istouchcapable && (a.bind(a.win, "touchstart", a.ontouchstart), a.bind(document, "touchend", a.ontouchend), a.bind(document, "touchcancel", a.ontouchend), a.bind(document, "touchmove", a.ontouchmove));
                        if (a.opt.cursordragontouch || !e.cantouch && !a.opt.touchbehavior) a.rail.css({
                                cursor: "default"
                            }), a.railh && a.railh.css({
                                cursor: "default"
                            }), a.jqbind(a.rail, "mouseenter", function() {
                                if (!a.ispage && !a.win.is(":visible")) return !1;
                                a.canshowonmouseevent && a.showCursor();
                                a.rail.active = !0
                            }),
                            a.jqbind(a.rail, "mouseleave", function() {
                                a.rail.active = !1;
                                a.rail.drag || a.hideCursor()
                            }), a.opt.sensitiverail && (a.bind(a.rail, "click", function(b) {
                                a.doRailClick(b, !1, !1)
                            }), a.bind(a.rail, "dblclick", function(b) {
                                a.doRailClick(b, !0, !1)
                            }), a.bind(a.cursor, "click", function(b) {
                                a.cancelEvent(b)
                            }), a.bind(a.cursor, "dblclick", function(b) {
                                a.cancelEvent(b)
                            })), a.railh && (a.jqbind(a.railh, "mouseenter", function() {
                                if (!a.ispage && !a.win.is(":visible")) return !1;
                                a.canshowonmouseevent && a.showCursor();
                                a.rail.active = !0
                            }), a.jqbind(a.railh,
                                "mouseleave",
                                function() {
                                    a.rail.active = !1;
                                    a.rail.drag || a.hideCursor()
                                }), a.opt.sensitiverail && (a.bind(a.railh, "click", function(b) {
                                a.doRailClick(b, !1, !0)
                            }), a.bind(a.railh, "dblclick", function(b) {
                                a.doRailClick(b, !0, !0)
                            }), a.bind(a.cursorh, "click", function(b) {
                                a.cancelEvent(b)
                            }), a.bind(a.cursorh, "dblclick", function(b) {
                                a.cancelEvent(b)
                            })));
                        e.cantouch || a.opt.touchbehavior ? (a.bind(e.hasmousecapture ? a.win : document, "mouseup", a.ontouchend), a.bind(document, "mousemove", a.ontouchmove), a.onclick && a.bind(document, "click",
                            a.onclick), a.opt.cursordragontouch && (a.bind(a.cursor, "mousedown", a.onmousedown), a.bind(a.cursor, "mouseup", a.onmouseup), a.cursorh && a.bind(a.cursorh, "mousedown", function(b) {
                            a.onmousedown(b, !0)
                        }), a.cursorh && a.bind(a.cursorh, "mouseup", a.onmouseup))) : (a.bind(e.hasmousecapture ? a.win : document, "mouseup", a.onmouseup), a.bind(document, "mousemove", a.onmousemove), a.onclick && a.bind(document, "click", a.onclick), a.bind(a.cursor, "mousedown", a.onmousedown), a.bind(a.cursor, "mouseup", a.onmouseup), a.railh && (a.bind(a.cursorh,
                            "mousedown",
                            function(b) {
                                a.onmousedown(b, !0)
                            }), a.bind(a.cursorh, "mouseup", a.onmouseup)), !a.ispage && a.opt.enablescrollonselection && (a.bind(a.win[0], "mousedown", a.onselectionstart), a.bind(document, "mouseup", a.onselectionend), a.bind(a.cursor, "mouseup", a.onselectionend), a.cursorh && a.bind(a.cursorh, "mouseup", a.onselectionend), a.bind(document, "mousemove", a.onselectiondrag)), a.zoom && (a.jqbind(a.zoom, "mouseenter", function() {
                            a.canshowonmouseevent && a.showCursor();
                            a.rail.active = !0
                        }), a.jqbind(a.zoom, "mouseleave",
                            function() {
                                a.rail.active = !1;
                                a.rail.drag || a.hideCursor()
                            })));
                        a.opt.enablemousewheel && (a.isiframe || a.bind(e.isie && a.ispage ? document : a.win, "mousewheel", a.onmousewheel), a.bind(a.rail, "mousewheel", a.onmousewheel), a.railh && a.bind(a.railh, "mousewheel", a.onmousewheelhr));
                        a.ispage || e.cantouch || /HTML|^BODY/.test(a.win[0].nodeName) || (a.win.attr("tabindex") || a.win.attr({
                            tabindex: N++
                        }), a.jqbind(a.win, "focus", function(b) {
                            y = a.getTarget(b).id || !0;
                            a.hasfocus = !0;
                            a.canshowonmouseevent && a.noticeCursor()
                        }), a.jqbind(a.win,
                            "blur",
                            function(b) {
                                y = !1;
                                a.hasfocus = !1
                            }), a.jqbind(a.win, "mouseenter", function(b) {
                            D = a.getTarget(b).id || !0;
                            a.hasmousefocus = !0;
                            a.canshowonmouseevent && a.noticeCursor()
                        }), a.jqbind(a.win, "mouseleave", function() {
                            D = !1;
                            a.hasmousefocus = !1;
                            a.rail.drag || a.hideCursor()
                        }))
                    }
                    a.onkeypress = function(b) {
                        if (a.railslocked && 0 == a.page.maxh) return !0;
                        b = b ? b : window.e;
                        var c = a.getTarget(b);
                        if (c && /INPUT|TEXTAREA|SELECT|OPTION/.test(c.nodeName) && (!c.getAttribute("type") && !c.type || !/submit|button|cancel/i.tp) || f(c).attr("contenteditable")) return !0;
                        if (a.hasfocus || a.hasmousefocus && !y || a.ispage && !y && !D) {
                            c = b.keyCode;
                            if (a.railslocked && 27 != c) return a.cancelEvent(b);
                            var g = b.ctrlKey || !1,
                                d = b.shiftKey || !1,
                                e = !1;
                            switch (c) {
                                case 38:
                                case 63233:
                                    a.doScrollBy(72);
                                    e = !0;
                                    break;
                                case 40:
                                case 63235:
                                    a.doScrollBy(-72);
                                    e = !0;
                                    break;
                                case 37:
                                case 63232:
                                    a.railh && (g ? a.doScrollLeft(0) : a.doScrollLeftBy(72), e = !0);
                                    break;
                                case 39:
                                case 63234:
                                    a.railh && (g ? a.doScrollLeft(a.page.maxw) : a.doScrollLeftBy(-72), e = !0);
                                    break;
                                case 33:
                                case 63276:
                                    a.doScrollBy(a.view.h);
                                    e = !0;
                                    break;
                                case 34:
                                case 63277:
                                    a.doScrollBy(-a.view.h);
                                    e = !0;
                                    break;
                                case 36:
                                case 63273:
                                    a.railh && g ? a.doScrollPos(0, 0) : a.doScrollTo(0);
                                    e = !0;
                                    break;
                                case 35:
                                case 63275:
                                    a.railh && g ? a.doScrollPos(a.page.maxw, a.page.maxh) : a.doScrollTo(a.page.maxh);
                                    e = !0;
                                    break;
                                case 32:
                                    a.opt.spacebarenabled && (d ? a.doScrollBy(a.view.h) : a.doScrollBy(-a.view.h), e = !0);
                                    break;
                                case 27:
                                    a.zoomactive && (a.doZoom(), e = !0)
                            }
                            if (e) return a.cancelEvent(b)
                        }
                    };
                    a.opt.enablekeyboard && a.bind(document, e.isopera && !e.isopera12 ? "keypress" : "keydown", a.onkeypress);
                    a.bind(document, "keydown", function(b) {
                        b.ctrlKey &&
                            (a.wheelprevented = !0)
                    });
                    a.bind(document, "keyup", function(b) {
                        b.ctrlKey || (a.wheelprevented = !1)
                    });
                    a.bind(window, "blur", function(b) {
                        a.wheelprevented = !1
                    });
                    a.bind(window, "resize", a.lazyResize);
                    a.bind(window, "orientationchange", a.lazyResize);
                    a.bind(window, "load", a.lazyResize);
                    if (e.ischrome && !a.ispage && !a.haswrapper) {
                        var r = a.win.attr("style"),
                            c = parseFloat(a.win.css("width")) + 1;
                        a.win.css("width", c);
                        a.synched("chromefix", function() {
                            a.win.attr("style", r)
                        })
                    }
                    a.onAttributeChange = function(b) {
                        a.lazyResize(a.isieold ?
                            250 : 30)
                    };
                    !1 !== v && (a.observerbody = new v(function(b) {
                        b.forEach(function(b) {
                            if ("attributes" == b.type) return f("body").hasClass("modal-open") ? a.hide() : a.show()
                        });
                        if (document.body.scrollHeight != a.page.maxh) return a.lazyResize(30)
                    }), a.observerbody.observe(document.body, {
                        childList: !0,
                        subtree: !0,
                        characterData: !1,
                        attributes: !0,
                        attributeFilter: ["class"]
                    }));
                    a.ispage || a.haswrapper || (!1 !== v ? (a.observer = new v(function(b) {
                        b.forEach(a.onAttributeChange)
                    }), a.observer.observe(a.win[0], {
                        childList: !0,
                        characterData: !1,
                        attributes: !0,
                        subtree: !1
                    }), a.observerremover = new v(function(b) {
                        b.forEach(function(b) {
                            if (0 < b.removedNodes.length)
                                for (var c in b.removedNodes)
                                    if (a && b.removedNodes[c] == a.win[0]) return a.remove()
                        })
                    }), a.observerremover.observe(a.win[0].parentNode, {
                        childList: !0,
                        characterData: !1,
                        attributes: !1,
                        subtree: !1
                    })) : (a.bind(a.win, e.isie && !e.isie9 ? "propertychange" : "DOMAttrModified", a.onAttributeChange), e.isie9 && a.win[0].attachEvent("onpropertychange", a.onAttributeChange), a.bind(a.win, "DOMNodeRemoved", function(b) {
                        b.target ==
                            a.win[0] && a.remove()
                    })));
                    !a.ispage && a.opt.boxzoom && a.bind(window, "resize", a.resizeZoom);
                    a.istextarea && a.bind(a.win, "mouseup", a.lazyResize);
                    a.lazyResize(30)
                }
                if ("IFRAME" == this.doc[0].nodeName) {
                    var M = function() {
                        a.iframexd = !1;
                        var b;
                        try {
                            b = "contentDocument" in this ? this.contentDocument : this.contentWindow.document
                        } catch (c) {
                            a.iframexd = !0, b = !1
                        }
                        if (a.iframexd) return "console" in window && console.log("NiceScroll error: policy restriced iframe"), !0;
                        a.forcescreen = !0;
                        a.isiframe && (a.iframe = {
                            doc: f(b),
                            html: a.doc.contents().find("html")[0],
                            body: a.doc.contents().find("body")[0]
                        }, a.getContentSize = function() {
                            return {
                                w: Math.max(a.iframe.html.scrollWidth, a.iframe.body.scrollWidth),
                                h: Math.max(a.iframe.html.scrollHeight, a.iframe.body.scrollHeight)
                            }
                        }, a.docscroll = f(a.iframe.body));
                        if (!e.isios && a.opt.iframeautoresize && !a.isiframe) {
                            a.win.scrollTop(0);
                            a.doc.height("");
                            var g = Math.max(b.getElementsByTagName("html")[0].scrollHeight, b.body.scrollHeight);
                            a.doc.height(g)
                        }
                        a.lazyResize(30);
                        e.isie7 && a.css(f(a.iframe.html), {
                            "overflow-y": "hidden"
                        });
                        a.css(f(a.iframe.body), {
                            "overflow-y": "hidden"
                        });
                        e.isios && a.haswrapper && a.css(f(b.body), {
                            "-webkit-transform": "translate3d(0,0,0)"
                        });
                        "contentWindow" in this ? a.bind(this.contentWindow, "scroll", a.onscroll) : a.bind(b, "scroll", a.onscroll);
                        a.opt.enablemousewheel && a.bind(b, "mousewheel", a.onmousewheel);
                        a.opt.enablekeyboard && a.bind(b, e.isopera ? "keypress" : "keydown", a.onkeypress);
                        if (e.cantouch || a.opt.touchbehavior) a.bind(b, "mousedown", a.ontouchstart), a.bind(b, "mousemove", function(b) {
                                return a.ontouchmove(b, !0)
                            }), a.opt.grabcursorenabled &&
                            e.cursorgrabvalue && a.css(f(b.body), {
                                cursor: e.cursorgrabvalue
                            });
                        a.bind(b, "mouseup", a.ontouchend);
                        a.zoom && (a.opt.dblclickzoom && a.bind(b, "dblclick", a.doZoom), a.ongesturezoom && a.bind(b, "gestureend", a.ongesturezoom))
                    };
                    this.doc[0].readyState && "complete" == this.doc[0].readyState && setTimeout(function() {
                        M.call(a.doc[0], !1)
                    }, 500);
                    a.bind(this.doc, "load", M)
                }
            };
            this.showCursor = function(b, c) {
                a.cursortimeout && (clearTimeout(a.cursortimeout), a.cursortimeout = 0);
                if (a.rail) {
                    a.autohidedom && (a.autohidedom.stop().css({
                            opacity: a.opt.cursoropacitymax
                        }),
                        a.cursoractive = !0);
                    a.rail.drag && 1 == a.rail.drag.pt || ("undefined" != typeof b && !1 !== b && (a.scroll.y = Math.round(1 * b / a.scrollratio.y)), "undefined" != typeof c && (a.scroll.x = Math.round(1 * c / a.scrollratio.x)));
                    a.cursor.css({
                        height: a.cursorheight,
                        top: a.scroll.y
                    });
                    if (a.cursorh) {
                        var d = a.hasreversehr ? a.scrollvaluemaxw - a.scroll.x : a.scroll.x;
                        !a.rail.align && a.rail.visibility ? a.cursorh.css({
                            width: a.cursorwidth,
                            left: d + a.rail.width
                        }) : a.cursorh.css({
                            width: a.cursorwidth,
                            left: d
                        });
                        a.cursoractive = !0
                    }
                    a.zoom && a.zoom.stop().css({
                        opacity: a.opt.cursoropacitymax
                    })
                }
            };
            this.hideCursor = function(b) {
                a.cursortimeout || !a.rail || !a.autohidedom || a.hasmousefocus && "leave" == a.opt.autohidemode || (a.cursortimeout = setTimeout(function() {
                    a.rail.active && a.showonmouseevent || (a.autohidedom.stop().animate({
                        opacity: a.opt.cursoropacitymin
                    }), a.zoom && a.zoom.stop().animate({
                        opacity: a.opt.cursoropacitymin
                    }), a.cursoractive = !1);
                    a.cursortimeout = 0
                }, b || a.opt.hidecursordelay))
            };
            this.noticeCursor = function(b, c, d) {
                a.showCursor(c, d);
                a.rail.active || a.hideCursor(b)
            };
            this.getContentSize = a.ispage ? function() {
                return {
                    w: Math.max(document.body.scrollWidth,
                        document.documentElement.scrollWidth),
                    h: Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
                }
            } : a.haswrapper ? function() {
                return {
                    w: a.doc.outerWidth() + parseInt(a.win.css("paddingLeft")) + parseInt(a.win.css("paddingRight")),
                    h: a.doc.outerHeight() + parseInt(a.win.css("paddingTop")) + parseInt(a.win.css("paddingBottom"))
                }
            } : function() {
                return {
                    w: a.docscroll[0].scrollWidth,
                    h: a.docscroll[0].scrollHeight
                }
            };
            this.onResize = function(b, c) {
                if (!a || !a.win) return !1;
                if (!a.haswrapper && !a.ispage) {
                    if ("none" ==
                        a.win.css("display")) return a.visibility && a.hideRail().hideRailHr(), !1;
                    a.hidden || a.visibility || a.showRail().showRailHr()
                }
                var d = a.page.maxh,
                    e = a.page.maxw,
                    f = a.view.h,
                    h = a.view.w;
                a.view = {
                    w: a.ispage ? a.win.width() : parseInt(a.win[0].clientWidth),
                    h: a.ispage ? a.win.height() : parseInt(a.win[0].clientHeight)
                };
                a.page = c ? c : a.getContentSize();
                a.page.maxh = Math.max(0, a.page.h - a.view.h);
                a.page.maxw = Math.max(0, a.page.w - a.view.w);
                if (a.page.maxh == d && a.page.maxw == e && a.view.w == h && a.view.h == f) {
                    if (a.ispage) return a;
                    d = a.win.offset();
                    if (a.lastposition && (e = a.lastposition, e.top == d.top && e.left == d.left)) return a;
                    a.lastposition = d
                }
                0 == a.page.maxh ? (a.hideRail(), a.scrollvaluemax = 0, a.scroll.y = 0, a.scrollratio.y = 0, a.cursorheight = 0, a.setScrollTop(0), a.rail.scrollable = !1) : (a.page.maxh -= a.opt.railpadding.top + a.opt.railpadding.bottom, a.rail.scrollable = !0);
                0 == a.page.maxw ? (a.hideRailHr(), a.scrollvaluemaxw = 0, a.scroll.x = 0, a.scrollratio.x = 0, a.cursorwidth = 0, a.setScrollLeft(0), a.railh.scrollable = !1) : (a.page.maxw -= a.opt.railpadding.left + a.opt.railpadding.right,
                    a.railh.scrollable = !0);
                a.railslocked = a.locked || 0 == a.page.maxh && 0 == a.page.maxw;
                if (a.railslocked) return a.ispage || a.updateScrollBar(a.view), !1;
                a.hidden || a.visibility ? a.hidden || a.railh.visibility || a.showRailHr() : a.showRail().showRailHr();
                a.istextarea && a.win.css("resize") && "none" != a.win.css("resize") && (a.view.h -= 20);
                a.cursorheight = Math.min(a.view.h, Math.round(a.view.h / a.page.h * a.view.h));
                a.cursorheight = a.opt.cursorfixedheight ? a.opt.cursorfixedheight : Math.max(a.opt.cursorminheight, a.cursorheight);
                a.cursorwidth =
                    Math.min(a.view.w, Math.round(a.view.w / a.page.w * a.view.w));
                a.cursorwidth = a.opt.cursorfixedheight ? a.opt.cursorfixedheight : Math.max(a.opt.cursorminheight, a.cursorwidth);
                a.scrollvaluemax = a.view.h - a.cursorheight - a.cursor.hborder - (a.opt.railpadding.top + a.opt.railpadding.bottom);
                a.railh && (a.railh.width = 0 < a.page.maxh ? a.view.w - a.rail.width : a.view.w, a.scrollvaluemaxw = a.railh.width - a.cursorwidth - a.cursorh.wborder - (a.opt.railpadding.left + a.opt.railpadding.right));
                a.ispage || a.updateScrollBar(a.view);
                a.scrollratio = {
                    x: a.page.maxw / a.scrollvaluemaxw,
                    y: a.page.maxh / a.scrollvaluemax
                };
                a.getScrollTop() > a.page.maxh ? a.doScrollTop(a.page.maxh) : (a.scroll.y = Math.round(a.getScrollTop() * (1 / a.scrollratio.y)), a.scroll.x = Math.round(a.getScrollLeft() * (1 / a.scrollratio.x)), a.cursoractive && a.noticeCursor());
                a.scroll.y && 0 == a.getScrollTop() && a.doScrollTo(Math.floor(a.scroll.y * a.scrollratio.y));
                return a
            };
            this.resize = a.onResize;
            this.lazyResize = function(b) {
                b = isNaN(b) ? 30 : b;
                a.debounced("resize", a.resize, b);
                return a
            };
            this.jqbind = function(b,
                c, d) {
                a.events.push({
                    e: b,
                    n: c,
                    f: d,
                    q: !0
                });
                f(b).bind(c, d)
            };
            this.bind = function(b, c, d, f) {
                var h = "jquery" in b ? b[0] : b;
                "mousewheel" == c ? window.addEventListener || "onwheel" in document ? a._bind(h, "wheel", d, f || !1) : (b = "undefined" != typeof document.onmousewheel ? "mousewheel" : "DOMMouseScroll", n(h, b, d, f || !1), "DOMMouseScroll" == b && n(h, "MozMousePixelScroll", d, f || !1)) : h.addEventListener ? (e.cantouch && /mouseup|mousedown|mousemove/.test(c) && a._bind(h, "mousedown" == c ? "touchstart" : "mouseup" == c ? "touchend" : "touchmove", function(a) {
                    if (a.touches) {
                        if (2 >
                            a.touches.length) {
                            var b = a.touches.length ? a.touches[0] : a;
                            b.original = a;
                            d.call(this, b)
                        }
                    } else a.changedTouches && (b = a.changedTouches[0], b.original = a, d.call(this, b))
                }, f || !1), a._bind(h, c, d, f || !1), e.cantouch && "mouseup" == c && a._bind(h, "touchcancel", d, f || !1)) : a._bind(h, c, function(b) {
                    (b = b || window.event || !1) && b.srcElement && (b.target = b.srcElement);
                    "pageY" in b || (b.pageX = b.clientX + document.documentElement.scrollLeft, b.pageY = b.clientY + document.documentElement.scrollTop);
                    return !1 === d.call(h, b) || !1 === f ? a.cancelEvent(b) :
                        !0
                })
            };
            e.haseventlistener ? (this._bind = function(b, c, d, e) {
                a.events.push({
                    e: b,
                    n: c,
                    f: d,
                    b: e,
                    q: !1
                });
                b.addEventListener(c, d, e || !1)
            }, this.cancelEvent = function(a) {
                if (!a) return !1;
                a = a.original ? a.original : a;
                a.preventDefault();
                a.stopPropagation();
                a.preventManipulation && a.preventManipulation();
                return !1
            }, this.stopPropagation = function(a) {
                if (!a) return !1;
                a = a.original ? a.original : a;
                a.stopPropagation();
                return !1
            }, this._unbind = function(a, c, d, e) {
                a.removeEventListener(c, d, e)
            }) : (this._bind = function(b, c, d, e) {
                a.events.push({
                    e: b,
                    n: c,
                    f: d,
                    b: e,
                    q: !1
                });
                b.attachEvent ? b.attachEvent("on" + c, d) : b["on" + c] = d
            }, this.cancelEvent = function(a) {
                a = window.event || !1;
                if (!a) return !1;
                a.cancelBubble = !0;
                a.cancel = !0;
                return a.returnValue = !1
            }, this.stopPropagation = function(a) {
                a = window.event || !1;
                if (!a) return !1;
                a.cancelBubble = !0;
                return !1
            }, this._unbind = function(a, c, d, e) {
                a.detachEvent ? a.detachEvent("on" + c, d) : a["on" + c] = !1
            });
            this.unbindAll = function() {
                for (var b = 0; b < a.events.length; b++) {
                    var c = a.events[b];
                    c.q ? c.e.unbind(c.n, c.f) : a._unbind(c.e, c.n, c.f, c.b)
                }
            };
            this.showRail =
                function() {
                    0 == a.page.maxh || !a.ispage && "none" == a.win.css("display") || (a.visibility = !0, a.rail.visibility = !0, a.rail.css("display", "block"));
                    return a
                };
            this.showRailHr = function() {
                if (!a.railh) return a;
                0 == a.page.maxw || !a.ispage && "none" == a.win.css("display") || (a.railh.visibility = !0, a.railh.css("display", "block"));
                return a
            };
            this.hideRail = function() {
                a.visibility = !1;
                a.rail.visibility = !1;
                a.rail.css("display", "none");
                return a
            };
            this.hideRailHr = function() {
                if (!a.railh) return a;
                a.railh.visibility = !1;
                a.railh.css("display",
                    "none");
                return a
            };
            this.show = function() {
                a.hidden = !1;
                a.railslocked = !1;
                return a.showRail().showRailHr()
            };
            this.hide = function() {
                a.hidden = !0;
                a.railslocked = !0;
                return a.hideRail().hideRailHr()
            };
            this.toggle = function() {
                return a.hidden ? a.show() : a.hide()
            };
            this.remove = function() {
                a.stop();
                a.cursortimeout && clearTimeout(a.cursortimeout);
                a.doZoomOut();
                a.unbindAll();
                e.isie9 && a.win[0].detachEvent("onpropertychange", a.onAttributeChange);
                !1 !== a.observer && a.observer.disconnect();
                !1 !== a.observerremover && a.observerremover.disconnect();
                !1 !== a.observerbody && a.observerbody.disconnect();
                a.events = null;
                a.cursor && a.cursor.remove();
                a.cursorh && a.cursorh.remove();
                a.rail && a.rail.remove();
                a.railh && a.railh.remove();
                a.zoom && a.zoom.remove();
                for (var b = 0; b < a.saved.css.length; b++) {
                    var c = a.saved.css[b];
                    c[0].css(c[1], "undefined" == typeof c[2] ? "" : c[2])
                }
                a.saved = !1;
                a.me.data("__nicescroll", "");
                var d = f.nicescroll;
                d.each(function(b) {
                    if (this && this.id === a.id) {
                        delete d[b];
                        for (var c = ++b; c < d.length; c++, b++) d[b] = d[c];
                        d.length--;
                        d.length && delete d[d.length]
                    }
                });
                for (var h in a) a[h] = null, delete a[h];
                a = null
            };
            this.scrollstart = function(b) {
                this.onscrollstart = b;
                return a
            };
            this.scrollend = function(b) {
                this.onscrollend = b;
                return a
            };
            this.scrollcancel = function(b) {
                this.onscrollcancel = b;
                return a
            };
            this.zoomin = function(b) {
                this.onzoomin = b;
                return a
            };
            this.zoomout = function(b) {
                this.onzoomout = b;
                return a
            };
            this.isScrollable = function(a) {
                a = a.target ? a.target : a;
                if ("OPTION" == a.nodeName) return !0;
                for (; a && 1 == a.nodeType && !/^BODY|HTML/.test(a.nodeName);) {
                    var c = f(a),
                        c = c.css("overflowY") || c.css("overflowX") ||
                        c.css("overflow") || "";
                    if (/scroll|auto/.test(c)) return a.clientHeight != a.scrollHeight;
                    a = a.parentNode ? a.parentNode : !1
                }
                return !1
            };
            this.getViewport = function(a) {
                for (a = a && a.parentNode ? a.parentNode : !1; a && 1 == a.nodeType && !/^BODY|HTML/.test(a.nodeName);) {
                    var c = f(a);
                    if (/fixed|absolute/.test(c.css("position"))) return c;
                    var d = c.css("overflowY") || c.css("overflowX") || c.css("overflow") || "";
                    if (/scroll|auto/.test(d) && a.clientHeight != a.scrollHeight || 0 < c.getNiceScroll().length) return c;
                    a = a.parentNode ? a.parentNode : !1
                }
                return !1
            };
            this.triggerScrollEnd = function() {
                if (a.onscrollend) {
                    var b = a.getScrollLeft(),
                        c = a.getScrollTop();
                    a.onscrollend.call(a, {
                        type: "scrollend",
                        current: {
                            x: b,
                            y: c
                        },
                        end: {
                            x: b,
                            y: c
                        }
                    })
                }
            };
            this.onmousewheel = function(b) {
                if (!a.wheelprevented) {
                    if (a.railslocked) return a.debounced("checkunlock", a.resize, 250), !0;
                    if (a.rail.drag) return a.cancelEvent(b);
                    "auto" == a.opt.oneaxismousemode && 0 != b.deltaX && (a.opt.oneaxismousemode = !1);
                    if (a.opt.oneaxismousemode && 0 == b.deltaX && !a.rail.scrollable) return a.railh && a.railh.scrollable ? a.onmousewheelhr(b) :
                        !0;
                    var c = +new Date,
                        d = !1;
                    a.opt.preservenativescrolling && a.checkarea + 600 < c && (a.nativescrollingarea = a.isScrollable(b), d = !0);
                    a.checkarea = c;
                    if (a.nativescrollingarea) return !0;
                    if (b = p(b, !1, d)) a.checkarea = 0;
                    return b
                }
            };
            this.onmousewheelhr = function(b) {
                if (!a.wheelprevented) {
                    if (a.railslocked || !a.railh.scrollable) return !0;
                    if (a.rail.drag) return a.cancelEvent(b);
                    var c = +new Date,
                        d = !1;
                    a.opt.preservenativescrolling && a.checkarea + 600 < c && (a.nativescrollingarea = a.isScrollable(b), d = !0);
                    a.checkarea = c;
                    return a.nativescrollingarea ?
                        !0 : a.railslocked ? a.cancelEvent(b) : p(b, !0, d)
                }
            };
            this.stop = function() {
                a.cancelScroll();
                a.scrollmon && a.scrollmon.stop();
                a.cursorfreezed = !1;
                a.scroll.y = Math.round(a.getScrollTop() * (1 / a.scrollratio.y));
                a.noticeCursor();
                return a
            };
            this.getTransitionSpeed = function(b) {
                var c = Math.round(10 * a.opt.scrollspeed);
                b = Math.min(c, Math.round(b / 20 * a.opt.scrollspeed));
                return 20 < b ? b : 0
            };
            a.opt.smoothscroll ? a.ishwscroll && e.hastransition && a.opt.usetransition && a.opt.smoothscroll ? (this.prepareTransition = function(b, c) {
                var d = c ? 20 <
                    b ? b : 0 : a.getTransitionSpeed(b),
                    f = d ? e.prefixstyle + "transform " + d + "ms ease-out" : "";
                a.lasttransitionstyle && a.lasttransitionstyle == f || (a.lasttransitionstyle = f, a.doc.css(e.transitionstyle, f));
                return d
            }, this.doScrollLeft = function(b, c) {
                var d = a.scrollrunning ? a.newscrolly : a.getScrollTop();
                a.doScrollPos(b, d, c)
            }, this.doScrollTop = function(b, c) {
                var d = a.scrollrunning ? a.newscrollx : a.getScrollLeft();
                a.doScrollPos(d, b, c)
            }, this.doScrollPos = function(b, c, d) {
                var f = a.getScrollTop(),
                    h = a.getScrollLeft();
                (0 > (a.newscrolly -
                    f) * (c - f) || 0 > (a.newscrollx - h) * (b - h)) && a.cancelScroll();
                0 == a.opt.bouncescroll && (0 > c ? c = 0 : c > a.page.maxh && (c = a.page.maxh), 0 > b ? b = 0 : b > a.page.maxw && (b = a.page.maxw));
                if (a.scrollrunning && b == a.newscrollx && c == a.newscrolly) return !1;
                a.newscrolly = c;
                a.newscrollx = b;
                a.newscrollspeed = d || !1;
                if (a.timer) return !1;
                a.timer = setTimeout(function() {
                    var d = a.getScrollTop(),
                        f = a.getScrollLeft(),
                        h, k;
                    h = b - f;
                    k = c - d;
                    h = Math.round(Math.sqrt(Math.pow(h, 2) + Math.pow(k, 2)));
                    h = a.newscrollspeed && 1 < a.newscrollspeed ? a.newscrollspeed : a.getTransitionSpeed(h);
                    a.newscrollspeed && 1 >= a.newscrollspeed && (h *= a.newscrollspeed);
                    a.prepareTransition(h, !0);
                    a.timerscroll && a.timerscroll.tm && clearInterval(a.timerscroll.tm);
                    0 < h && (!a.scrollrunning && a.onscrollstart && a.onscrollstart.call(a, {
                        type: "scrollstart",
                        current: {
                            x: f,
                            y: d
                        },
                        request: {
                            x: b,
                            y: c
                        },
                        end: {
                            x: a.newscrollx,
                            y: a.newscrolly
                        },
                        speed: h
                    }), e.transitionend ? a.scrollendtrapped || (a.scrollendtrapped = !0, a.bind(a.doc, e.transitionend, a.onScrollTransitionEnd, !1)) : (a.scrollendtrapped && clearTimeout(a.scrollendtrapped), a.scrollendtrapped =
                        setTimeout(a.onScrollTransitionEnd, h)), a.timerscroll = {
                        bz: new A(d, a.newscrolly, h, 0, 0, .58, 1),
                        bh: new A(f, a.newscrollx, h, 0, 0, .58, 1)
                    }, a.cursorfreezed || (a.timerscroll.tm = setInterval(function() {
                        a.showCursor(a.getScrollTop(), a.getScrollLeft())
                    }, 60)));
                    a.synched("doScroll-set", function() {
                        a.timer = 0;
                        a.scrollendtrapped && (a.scrollrunning = !0);
                        a.setScrollTop(a.newscrolly);
                        a.setScrollLeft(a.newscrollx);
                        if (!a.scrollendtrapped) a.onScrollTransitionEnd()
                    })
                }, 50)
            }, this.cancelScroll = function() {
                if (!a.scrollendtrapped) return !0;
                var b = a.getScrollTop(),
                    c = a.getScrollLeft();
                a.scrollrunning = !1;
                e.transitionend || clearTimeout(e.transitionend);
                a.scrollendtrapped = !1;
                a._unbind(a.doc[0], e.transitionend, a.onScrollTransitionEnd);
                a.prepareTransition(0);
                a.setScrollTop(b);
                a.railh && a.setScrollLeft(c);
                a.timerscroll && a.timerscroll.tm && clearInterval(a.timerscroll.tm);
                a.timerscroll = !1;
                a.cursorfreezed = !1;
                a.showCursor(b, c);
                return a
            }, this.onScrollTransitionEnd = function() {
                a.scrollendtrapped && a._unbind(a.doc[0], e.transitionend, a.onScrollTransitionEnd);
                a.scrollendtrapped = !1;
                a.prepareTransition(0);
                a.timerscroll && a.timerscroll.tm && clearInterval(a.timerscroll.tm);
                a.timerscroll = !1;
                var b = a.getScrollTop(),
                    c = a.getScrollLeft();
                a.setScrollTop(b);
                a.railh && a.setScrollLeft(c);
                a.noticeCursor(!1, b, c);
                a.cursorfreezed = !1;
                0 > b ? b = 0 : b > a.page.maxh && (b = a.page.maxh);
                0 > c ? c = 0 : c > a.page.maxw && (c = a.page.maxw);
                if (b != a.newscrolly || c != a.newscrollx) return a.doScrollPos(c, b, a.opt.snapbackspeed);
                a.onscrollend && a.scrollrunning && a.triggerScrollEnd();
                a.scrollrunning = !1
            }) : (this.doScrollLeft =
                function(b, c) {
                    var d = a.scrollrunning ? a.newscrolly : a.getScrollTop();
                    a.doScrollPos(b, d, c)
                }, this.doScrollTop = function(b, c) {
                    var d = a.scrollrunning ? a.newscrollx : a.getScrollLeft();
                    a.doScrollPos(d, b, c)
                }, this.doScrollPos = function(b, c, d) {
                    function e() {
                        if (a.cancelAnimationFrame) return !0;
                        a.scrollrunning = !0;
                        if (n = 1 - n) return a.timer = s(e) || 1;
                        var b = 0,
                            c, d, g = d = a.getScrollTop();
                        if (a.dst.ay) {
                            g = a.bzscroll ? a.dst.py + a.bzscroll.getNow() * a.dst.ay : a.newscrolly;
                            c = g - d;
                            if (0 > c && g < a.newscrolly || 0 < c && g > a.newscrolly) g = a.newscrolly;
                            a.setScrollTop(g);
                            g == a.newscrolly && (b = 1)
                        } else b = 1;
                        d = c = a.getScrollLeft();
                        if (a.dst.ax) {
                            d = a.bzscroll ? a.dst.px + a.bzscroll.getNow() * a.dst.ax : a.newscrollx;
                            c = d - c;
                            if (0 > c && d < a.newscrollx || 0 < c && d > a.newscrollx) d = a.newscrollx;
                            a.setScrollLeft(d);
                            d == a.newscrollx && (b += 1)
                        } else b += 1;
                        2 == b ? (a.timer = 0, a.cursorfreezed = !1, a.bzscroll = !1, a.scrollrunning = !1, 0 > g ? g = 0 : g > a.page.maxh && (g = a.page.maxh), 0 > d ? d = 0 : d > a.page.maxw && (d = a.page.maxw), d != a.newscrollx || g != a.newscrolly ? a.doScrollPos(d, g) : a.onscrollend && a.triggerScrollEnd()) :
                            a.timer = s(e) || 1
                    }
                    c = "undefined" == typeof c || !1 === c ? a.getScrollTop(!0) : c;
                    if (a.timer && a.newscrolly == c && a.newscrollx == b) return !0;
                    a.timer && t(a.timer);
                    a.timer = 0;
                    var f = a.getScrollTop(),
                        h = a.getScrollLeft();
                    (0 > (a.newscrolly - f) * (c - f) || 0 > (a.newscrollx - h) * (b - h)) && a.cancelScroll();
                    a.newscrolly = c;
                    a.newscrollx = b;
                    a.bouncescroll && a.rail.visibility || (0 > a.newscrolly ? a.newscrolly = 0 : a.newscrolly > a.page.maxh && (a.newscrolly = a.page.maxh));
                    a.bouncescroll && a.railh.visibility || (0 > a.newscrollx ? a.newscrollx = 0 : a.newscrollx > a.page.maxw &&
                        (a.newscrollx = a.page.maxw));
                    a.dst = {};
                    a.dst.x = b - h;
                    a.dst.y = c - f;
                    a.dst.px = h;
                    a.dst.py = f;
                    var k = Math.round(Math.sqrt(Math.pow(a.dst.x, 2) + Math.pow(a.dst.y, 2)));
                    a.dst.ax = a.dst.x / k;
                    a.dst.ay = a.dst.y / k;
                    var l = 0,
                        m = k;
                    0 == a.dst.x ? (l = f, m = c, a.dst.ay = 1, a.dst.py = 0) : 0 == a.dst.y && (l = h, m = b, a.dst.ax = 1, a.dst.px = 0);
                    k = a.getTransitionSpeed(k);
                    d && 1 >= d && (k *= d);
                    a.bzscroll = 0 < k ? a.bzscroll ? a.bzscroll.update(m, k) : new A(l, m, k, 0, 1, 0, 1) : !1;
                    if (!a.timer) {
                        (f == a.page.maxh && c >= a.page.maxh || h == a.page.maxw && b >= a.page.maxw) && a.checkContentSize();
                        var n = 1;
                        a.cancelAnimationFrame = !1;
                        a.timer = 1;
                        a.onscrollstart && !a.scrollrunning && a.onscrollstart.call(a, {
                            type: "scrollstart",
                            current: {
                                x: h,
                                y: f
                            },
                            request: {
                                x: b,
                                y: c
                            },
                            end: {
                                x: a.newscrollx,
                                y: a.newscrolly
                            },
                            speed: k
                        });
                        e();
                        (f == a.page.maxh && c >= f || h == a.page.maxw && b >= h) && a.checkContentSize();
                        a.noticeCursor()
                    }
                }, this.cancelScroll = function() {
                    a.timer && t(a.timer);
                    a.timer = 0;
                    a.bzscroll = !1;
                    a.scrollrunning = !1;
                    return a
                }) : (this.doScrollLeft = function(b, c) {
                var d = a.getScrollTop();
                a.doScrollPos(b, d, c)
            }, this.doScrollTop = function(b,
                c) {
                var d = a.getScrollLeft();
                a.doScrollPos(d, b, c)
            }, this.doScrollPos = function(b, c, d) {
                var e = b > a.page.maxw ? a.page.maxw : b;
                0 > e && (e = 0);
                var f = c > a.page.maxh ? a.page.maxh : c;
                0 > f && (f = 0);
                a.synched("scroll", function() {
                    a.setScrollTop(f);
                    a.setScrollLeft(e)
                })
            }, this.cancelScroll = function() {});
            this.doScrollBy = function(b, c) {
                var d = 0,
                    d = c ? Math.floor((a.scroll.y - b) * a.scrollratio.y) : (a.timer ? a.newscrolly : a.getScrollTop(!0)) - b;
                if (a.bouncescroll) {
                    var e = Math.round(a.view.h / 2);
                    d < -e ? d = -e : d > a.page.maxh + e && (d = a.page.maxh + e)
                }
                a.cursorfreezed = !1;
                e = a.getScrollTop(!0);
                if (0 > d && 0 >= e) return a.noticeCursor();
                if (d > a.page.maxh && e >= a.page.maxh) return a.checkContentSize(), a.noticeCursor();
                a.doScrollTop(d)
            };
            this.doScrollLeftBy = function(b, c) {
                var d = 0,
                    d = c ? Math.floor((a.scroll.x - b) * a.scrollratio.x) : (a.timer ? a.newscrollx : a.getScrollLeft(!0)) - b;
                if (a.bouncescroll) {
                    var e = Math.round(a.view.w / 2);
                    d < -e ? d = -e : d > a.page.maxw + e && (d = a.page.maxw + e)
                }
                a.cursorfreezed = !1;
                e = a.getScrollLeft(!0);
                if (0 > d && 0 >= e || d > a.page.maxw && e >= a.page.maxw) return a.noticeCursor();
                a.doScrollLeft(d)
            };
            this.doScrollTo = function(b, c) {
                c && Math.round(b * a.scrollratio.y);
                a.cursorfreezed = !1;
                a.doScrollTop(b)
            };
            this.checkContentSize = function() {
                var b = a.getContentSize();
                b.h == a.page.h && b.w == a.page.w || a.resize(!1, b)
            };
            a.onscroll = function(b) {
                a.rail.drag || a.cursorfreezed || a.synched("scroll", function() {
                    a.scroll.y = Math.round(a.getScrollTop() * (1 / a.scrollratio.y));
                    a.railh && (a.scroll.x = Math.round(a.getScrollLeft() * (1 / a.scrollratio.x)));
                    a.noticeCursor()
                })
            };
            a.bind(a.docscroll, "scroll", a.onscroll);
            this.doZoomIn = function(b) {
                if (!a.zoomactive) {
                    a.zoomactive = !0;
                    a.zoomrestore = {
                        style: {}
                    };
                    var c = "position top left zIndex backgroundColor marginTop marginBottom marginLeft marginRight".split(" "),
                        d = a.win[0].style,
                        h;
                    for (h in c) {
                        var k = c[h];
                        a.zoomrestore.style[k] = "undefined" != typeof d[k] ? d[k] : ""
                    }
                    a.zoomrestore.style.width = a.win.css("width");
                    a.zoomrestore.style.height = a.win.css("height");
                    a.zoomrestore.padding = {
                        w: a.win.outerWidth() - a.win.width(),
                        h: a.win.outerHeight() - a.win.height()
                    };
                    e.isios4 && (a.zoomrestore.scrollTop = f(window).scrollTop(), f(window).scrollTop(0));
                    a.win.css({
                        position: e.isios4 ? "absolute" : "fixed",
                        top: 0,
                        left: 0,
                        "z-index": x + 100,
                        margin: "0px"
                    });
                    c = a.win.css("backgroundColor");
                    ("" == c || /transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(c)) && a.win.css("backgroundColor", "#fff");
                    a.rail.css({
                        "z-index": x + 101
                    });
                    a.zoom.css({
                        "z-index": x + 102
                    });
                    a.zoom.css("backgroundPosition", "0px -18px");
                    a.resizeZoom();
                    a.onzoomin && a.onzoomin.call(a);
                    return a.cancelEvent(b)
                }
            };
            this.doZoomOut = function(b) {
                if (a.zoomactive) return a.zoomactive = !1, a.win.css("margin", ""), a.win.css(a.zoomrestore.style),
                    e.isios4 && f(window).scrollTop(a.zoomrestore.scrollTop), a.rail.css({
                        "z-index": a.zindex
                    }), a.zoom.css({
                        "z-index": a.zindex
                    }), a.zoomrestore = !1, a.zoom.css("backgroundPosition", "0px 0px"), a.onResize(), a.onzoomout && a.onzoomout.call(a), a.cancelEvent(b)
            };
            this.doZoom = function(b) {
                return a.zoomactive ? a.doZoomOut(b) : a.doZoomIn(b)
            };
            this.resizeZoom = function() {
                if (a.zoomactive) {
                    var b = a.getScrollTop();
                    a.win.css({
                        width: f(window).width() - a.zoomrestore.padding.w + "px",
                        height: f(window).height() - a.zoomrestore.padding.h + "px"
                    });
                    a.onResize();
                    a.setScrollTop(Math.min(a.page.maxh, b))
                }
            };
            this.init();
            f.nicescroll.push(this)
        },
        L = function(f) {
            var c = this;
            this.nc = f;
            this.steptime = this.lasttime = this.speedy = this.speedx = this.lasty = this.lastx = 0;
            this.snapy = this.snapx = !1;
            this.demuly = this.demulx = 0;
            this.lastscrolly = this.lastscrollx = -1;
            this.timer = this.chky = this.chkx = 0;
            this.time = function() {
                return +new Date
            };
            this.reset = function(f, k) {
                c.stop();
                var d = c.time();
                c.steptime = 0;
                c.lasttime = d;
                c.speedx = 0;
                c.speedy = 0;
                c.lastx = f;
                c.lasty = k;
                c.lastscrollx = -1;
                c.lastscrolly = -1
            };
            this.update = function(f, k) {
                var d = c.time();
                c.steptime = d - c.lasttime;
                c.lasttime = d;
                var d = k - c.lasty,
                    n = f - c.lastx,
                    p = c.nc.getScrollTop(),
                    a = c.nc.getScrollLeft(),
                    p = p + d,
                    a = a + n;
                c.snapx = 0 > a || a > c.nc.page.maxw;
                c.snapy = 0 > p || p > c.nc.page.maxh;
                c.speedx = n;
                c.speedy = d;
                c.lastx = f;
                c.lasty = k
            };
            this.stop = function() {
                c.nc.unsynched("domomentum2d");
                c.timer && clearTimeout(c.timer);
                c.timer = 0;
                c.lastscrollx = -1;
                c.lastscrolly = -1
            };
            this.doSnapy = function(f, k) {
                var d = !1;
                0 > k ? (k = 0, d = !0) : k > c.nc.page.maxh && (k = c.nc.page.maxh, d = !0);
                0 > f ? (f = 0, d = !0) : f > c.nc.page.maxw && (f = c.nc.page.maxw, d = !0);
                d ? c.nc.doScrollPos(f, k, c.nc.opt.snapbackspeed) : c.nc.triggerScrollEnd()
            };
            this.doMomentum = function(f) {
                var k = c.time(),
                    d = f ? k + f : c.lasttime;
                f = c.nc.getScrollLeft();
                var n = c.nc.getScrollTop(),
                    p = c.nc.page.maxh,
                    a = c.nc.page.maxw;
                c.speedx = 0 < a ? Math.min(60, c.speedx) : 0;
                c.speedy = 0 < p ? Math.min(60, c.speedy) : 0;
                d = d && 60 >= k - d;
                if (0 > n || n > p || 0 > f || f > a) d = !1;
                f = c.speedx && d ? c.speedx : !1;
                if (c.speedy && d && c.speedy || f) {
                    var s = Math.max(16, c.steptime);
                    50 < s && (f = s / 50, c.speedx *= f, c.speedy *= f, s =
                        50);
                    c.demulxy = 0;
                    c.lastscrollx = c.nc.getScrollLeft();
                    c.chkx = c.lastscrollx;
                    c.lastscrolly = c.nc.getScrollTop();
                    c.chky = c.lastscrolly;
                    var e = c.lastscrollx,
                        r = c.lastscrolly,
                        t = function() {
                            var d = 600 < c.time() - k ? .04 : .02;
                            c.speedx && (e = Math.floor(c.lastscrollx - c.speedx * (1 - c.demulxy)), c.lastscrollx = e, 0 > e || e > a) && (d = .1);
                            c.speedy && (r = Math.floor(c.lastscrolly - c.speedy * (1 - c.demulxy)), c.lastscrolly = r, 0 > r || r > p) && (d = .1);
                            c.demulxy = Math.min(1, c.demulxy + d);
                            c.nc.synched("domomentum2d", function() {
                                c.speedx && (c.nc.getScrollLeft() !=
                                    c.chkx && c.stop(), c.chkx = e, c.nc.setScrollLeft(e));
                                c.speedy && (c.nc.getScrollTop() != c.chky && c.stop(), c.chky = r, c.nc.setScrollTop(r));
                                c.timer || (c.nc.hideCursor(), c.doSnapy(e, r))
                            });
                            1 > c.demulxy ? c.timer = setTimeout(t, s) : (c.stop(), c.nc.hideCursor(), c.doSnapy(e, r))
                        };
                    t()
                } else c.doSnapy(c.nc.getScrollLeft(), c.nc.getScrollTop())
            }
        },
        w = f.fn.scrollTop;
    f.cssHooks.pageYOffset = {
        get: function(k, c, h) {
            return (c = f.data(k, "__nicescroll") || !1) && c.ishwscroll ? c.getScrollTop() : w.call(k)
        },
        set: function(k, c) {
            var h = f.data(k, "__nicescroll") ||
                !1;
            h && h.ishwscroll ? h.setScrollTop(parseInt(c)) : w.call(k, c);
            return this
        }
    };
    f.fn.scrollTop = function(k) {
        if ("undefined" == typeof k) {
            var c = this[0] ? f.data(this[0], "__nicescroll") || !1 : !1;
            return c && c.ishwscroll ? c.getScrollTop() : w.call(this)
        }
        return this.each(function() {
            var c = f.data(this, "__nicescroll") || !1;
            c && c.ishwscroll ? c.setScrollTop(parseInt(k)) : w.call(f(this), k)
        })
    };
    var B = f.fn.scrollLeft;
    f.cssHooks.pageXOffset = {
        get: function(k, c, h) {
            return (c = f.data(k, "__nicescroll") || !1) && c.ishwscroll ? c.getScrollLeft() : B.call(k)
        },
        set: function(k, c) {
            var h = f.data(k, "__nicescroll") || !1;
            h && h.ishwscroll ? h.setScrollLeft(parseInt(c)) : B.call(k, c);
            return this
        }
    };
    f.fn.scrollLeft = function(k) {
        if ("undefined" == typeof k) {
            var c = this[0] ? f.data(this[0], "__nicescroll") || !1 : !1;
            return c && c.ishwscroll ? c.getScrollLeft() : B.call(this)
        }
        return this.each(function() {
            var c = f.data(this, "__nicescroll") || !1;
            c && c.ishwscroll ? c.setScrollLeft(parseInt(k)) : B.call(f(this), k)
        })
    };
    var C = function(k) {
        var c = this;
        this.length = 0;
        this.name = "nicescrollarray";
        this.each = function(d) {
            for (var f =
                    0, h = 0; f < c.length; f++) d.call(c[f], h++);
            return c
        };
        this.push = function(d) {
            c[c.length] = d;
            c.length++
        };
        this.eq = function(d) {
            return c[d]
        };
        if (k)
            for (var h = 0; h < k.length; h++) {
                var m = f.data(k[h], "__nicescroll") || !1;
                m && (this[this.length] = m, this.length++)
            }
        return this
    };
    (function(f, c, h) {
        for (var m = 0; m < c.length; m++) h(f, c[m])
    })(C.prototype, "show hide toggle onResize resize remove stop doScrollPos".split(" "), function(f, c) {
        f[c] = function() {
            var f = arguments;
            return this.each(function() {
                this[c].apply(this, f)
            })
        }
    });
    f.fn.getNiceScroll =
        function(k) {
            return "undefined" == typeof k ? new C(this) : this[k] && f.data(this[k], "__nicescroll") || !1
        };
    f.extend(f.expr[":"], {
        nicescroll: function(k) {
            return f.data(k, "__nicescroll") ? !0 : !1
        }
    });
    f.fn.niceScroll = function(k, c) {
        "undefined" != typeof c || "object" != typeof k || "jquery" in k || (c = k, k = !1);
        c = f.extend({}, c);
        var h = new C;
        "undefined" == typeof c && (c = {});
        k && (c.doc = f(k), c.win = f(this));
        var m = !("doc" in c);
        m || "win" in c || (c.win = f(this));
        this.each(function() {
            var d = f(this).data("__nicescroll") || !1;
            d || (c.doc = m ? f(this) : c.doc,
                d = new R(c, f(this)), f(this).data("__nicescroll", d));
            h.push(d)
        });
        return 1 == h.length ? h[0] : h
    };
    window.NiceScroll = {
        getjQuery: function() {
            return f
        }
    };
    f.nicescroll || (f.nicescroll = new C, f.nicescroll.options = I)
});
;/*================================================================================
 * @name: bPopup - if you can't get it up, use bPopup
 * @author: (c)Bjoern Klinggaard (twitter@bklinggaard)
 * @demo: http://dinbror.dk/bpopup
 * @version: 0.11.0.min
 ================================================================================*/
 (function(c){c.fn.bPopup=function(A,E){function L(){a.contentContainer=c(a.contentContainer||b);switch(a.content){case "iframe":var d=c('<iframe class="b-iframe" '+a.iframeAttr+"></iframe>");d.appendTo(a.contentContainer);t=b.outerHeight(!0);u=b.outerWidth(!0);B();d.attr("src",a.loadUrl);l(a.loadCallback);break;case "image":B();c("<img />").load(function(){l(a.loadCallback);F(c(this))}).attr("src",a.loadUrl).hide().appendTo(a.contentContainer);break;default:B(),c('<div class="b-ajax-wrapper"></div>').load(a.loadUrl,a.loadData,function(d,b,e){l(a.loadCallback,b);F(c(this))}).hide().appendTo(a.contentContainer)}}function B(){a.modal&&c('<div class="b-modal '+e+'"></div>').css({backgroundColor:a.modalColor,position:"fixed",top:0,right:0,bottom:0,left:0,opacity:0,zIndex:a.zIndex+v}).appendTo(a.appendTo).fadeTo(a.speed,a.opacity);C();b.data("bPopup",a).data("id",e).css({left:"slideIn"==a.transition||"slideBack"==a.transition?"slideBack"==a.transition?f.scrollLeft()+w:-1*(x+u):m(!(!a.follow[0]&&n||g)),position:a.positionStyle||"absolute",top:"slideDown"==a.transition||"slideUp"==a.transition?"slideUp"==a.transition?f.scrollTop()+y:z+-1*t:p(!(!a.follow[1]&&q||g)),"z-index":a.zIndex+v+1}).each(function(){a.appending&&c(this).appendTo(a.appendTo)});G(!0)}function r(){a.modal&&c(".b-modal."+b.data("id")).fadeTo(a.speed,0,function(){c(this).remove()});a.scrollBar||c("html").css("overflow","auto");c(".b-modal."+e).unbind("click");f.unbind("keydown."+e);k.unbind("."+e).data("bPopup",0<k.data("bPopup")-1?k.data("bPopup")-1:null);b.undelegate(".bClose, ."+a.closeClass,"click."+e,r).data("bPopup",null);clearTimeout(H);G();return!1}function I(d){y=k.height();w=k.width();h=D();if(h.x||h.y)clearTimeout(J),J=setTimeout(function(){C();d=d||a.followSpeed;var e={};h.x&&(e.left=a.follow[0]?m(!0):"auto");h.y&&(e.top=a.follow[1]?p(!0):"auto");b.dequeue().each(function(){g?c(this).css({left:x,top:z}):c(this).animate(e,d,a.followEasing)})},50)}function F(d){var c=d.width(),e=d.height(),f={};a.contentContainer.css({height:e,width:c});e>=b.height()&&(f.height=b.height());c>=b.width()&&(f.width=b.width());t=b.outerHeight(!0);u=b.outerWidth(!0);C();a.contentContainer.css({height:"auto",width:"auto"});f.left=m(!(!a.follow[0]&&n||g));f.top=p(!(!a.follow[1]&&q||g));b.animate(f,250,function(){d.show();h=D()})}function M(){k.data("bPopup",v);b.delegate(".bClose, ."+a.closeClass,"click."+e,r);a.modalClose&&c(".b-modal."+e).css("cursor","pointer").bind("click",r);N||!a.follow[0]&&!a.follow[1]||k.bind("scroll."+e,function(){if(h.x||h.y){var d={};h.x&&(d.left=a.follow[0]?m(!g):"auto");h.y&&(d.top=a.follow[1]?p(!g):"auto");b.dequeue().animate(d,a.followSpeed,a.followEasing)}}).bind("resize."+e,function(){I()});a.escClose&&f.bind("keydown."+e,function(a){27==a.which&&r()})}function G(d){function c(e){b.css({display:"block",opacity:1}).animate(e,a.speed,a.easing,function(){K(d)})}switch(d?a.transition:a.transitionClose||a.transition){case "slideIn":c({left:d?m(!(!a.follow[0]&&n||g)):f.scrollLeft()-(u||b.outerWidth(!0))-200});break;case "slideBack":c({left:d?m(!(!a.follow[0]&&n||g)):f.scrollLeft()+w+200});break;case "slideDown":c({top:d?p(!(!a.follow[1]&&q||g)):f.scrollTop()-(t||b.outerHeight(!0))-200});break;case "slideUp":c({top:d?p(!(!a.follow[1]&&q||g)):f.scrollTop()+y+200});break;default:b.stop().fadeTo(a.speed,d?1:0,function(){K(d)})}}function K(d){d?(M(),l(E),a.autoClose&&(H=setTimeout(r,a.autoClose))):(b.hide(),l(a.onClose),a.loadUrl&&(a.contentContainer.empty(),b.css({height:"auto",width:"auto"})))}function m(a){return a?x+f.scrollLeft():x}function p(a){return a?z+f.scrollTop():z}function l(a,e){c.isFunction(a)&&a.call(b,e)}function C(){z=q?a.position[1]:Math.max(0,(y-b.outerHeight(!0))/2-a.amsl);x=n?a.position[0]:(w-b.outerWidth(!0))/2;h=D()}function D(){return{x:w>b.outerWidth(!0),y:y>b.outerHeight(!0)}}c.isFunction(A)&&(E=A,A=null);var a=c.extend({},c.fn.bPopup.defaults,A);a.scrollBar||c("html").css("overflow","hidden");var b=this,f=c(document),k=c(window),y=k.height(),w=k.width(),N=/OS 6(_\d)+/i.test(navigator.userAgent),v=0,e,h,q,n,g,z,x,t,u,J,H;b.close=function(){r()};b.reposition=function(a){I(a)};return b.each(function(){c(this).data("bPopup")||(l(a.onOpen),v=(k.data("bPopup")||0)+1,e="__b-popup"+v+"__",q="auto"!==a.position[1],n="auto"!==a.position[0],g="fixed"===a.positionStyle,t=b.outerHeight(!0),u=b.outerWidth(!0),a.loadUrl?L():B())})};c.fn.bPopup.defaults={amsl:50,appending:!0,appendTo:"body",autoClose:!1,closeClass:"b-close",content:"ajax",contentContainer:!1,easing:"swing",escClose:!0,follow:[!0,!0],followEasing:"swing",followSpeed:500,iframeAttr:'scrolling="no" frameborder="0"',loadCallback:!1,loadData:!1,loadUrl:!1,modal:!0,modalClose:!0,modalColor:"#000",onClose:!1,onOpen:!1,opacity:.7,position:["auto","auto"],positionStyle:"absolute",scrollBar:!0,speed:250,transition:"fadeIn",transitionClose:!1,zIndex:9997}})(jQuery);
;/*! fancyBox v2.1.5 fancyapps.com | fancyapps.com/fancybox/#license */
(function(s,H,f,w){var K=f("html"),q=f(s),p=f(H),b=f.fancybox=function(){b.open.apply(this,arguments)},J=navigator.userAgent.match(/msie/i),C=null,t=H.createTouch!==w,u=function(a){return a&&a.hasOwnProperty&&a instanceof f},r=function(a){return a&&"string"===f.type(a)},F=function(a){return r(a)&&0<a.indexOf("%")},m=function(a,d){var e=parseInt(a,10)||0;d&&F(a)&&(e*=b.getViewport()[d]/100);return Math.ceil(e)},x=function(a,b){return m(a,b)+"px"};f.extend(b,{version:"2.1.5",defaults:{padding:15,margin:20,width:800,height:600,minWidth:100,minHeight:100,maxWidth:9999,maxHeight:9999,pixelRatio:1,autoSize:!0,autoHeight:!1,autoWidth:!1,autoResize:!0,autoCenter:!t,fitToView:!0,aspectRatio:!1,topRatio:0.5,leftRatio:0.5,scrolling:"auto",wrapCSS:"",arrows:!0,closeBtn:!0,closeClick:!1,nextClick:!1,mouseWheel:!0,autoPlay:!1,playSpeed:3E3,preload:3,modal:!1,loop:!0,ajax:{dataType:"html",headers:{"X-fancyBox":!0}},iframe:{scrolling:"auto",preload:!0},swf:{wmode:"transparent",allowfullscreen:"true",allowscriptaccess:"always"},keys:{next:{13:"left",34:"up",39:"left",40:"up"},prev:{8:"right",33:"down",37:"right",38:"down"},close:[27],play:[32],toggle:[70]},direction:{next:"left",prev:"right"},scrollOutside:!0,index:0,type:null,href:null,content:null,title:null,tpl:{wrap:'<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',image:'<img class="fancybox-image" src="{href}" alt="" />',iframe:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen'+
(J?' allowtransparency="true"':"")+"></iframe>",error:'<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',closeBtn:'<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',next:'<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',prev:'<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'},openEffect:"fade",openSpeed:250,openEasing:"swing",openOpacity:!0,openMethod:"zoomIn",closeEffect:"fade",closeSpeed:250,closeEasing:"swing",closeOpacity:!0,closeMethod:"zoomOut",nextEffect:"elastic",nextSpeed:250,nextEasing:"swing",nextMethod:"changeIn",prevEffect:"elastic",prevSpeed:250,prevEasing:"swing",prevMethod:"changeOut",helpers:{overlay:!0,title:!0},onCancel:f.noop,beforeLoad:f.noop,afterLoad:f.noop,beforeShow:f.noop,afterShow:f.noop,beforeChange:f.noop,beforeClose:f.noop,afterClose:f.noop},group:{},opts:{},previous:null,coming:null,current:null,isActive:!1,isOpen:!1,isOpened:!1,wrap:null,skin:null,outer:null,inner:null,player:{timer:null,isActive:!1},ajaxLoad:null,imgPreload:null,transitions:{},helpers:{},open:function(a,d){if(a&&(f.isPlainObject(d)||(d={}),!1!==b.close(!0)))return f.isArray(a)||(a=u(a)?f(a).get():[a]),f.each(a,function(e,c){var l={},g,h,k,n,m;"object"===f.type(c)&&(c.nodeType&&(c=f(c)),u(c)?(l={href:c.data("fancybox-href")||c.attr("href"),title:f("<div/>").text(c.data("fancybox-title")||c.attr("title")).html(),isDom:!0,element:c},f.metadata&&f.extend(!0,l,c.metadata())):l=c);g=d.href||l.href||(r(c)?c:null);h=d.title!==w?d.title:l.title||"";n=(k=d.content||l.content)?"html":d.type||l.type;!n&&l.isDom&&(n=c.data("fancybox-type"),n||(n=(n=c.prop("class").match(/fancybox\.(\w+)/))?n[1]:null));r(g)&&(n||(b.isImage(g)?n="image":b.isSWF(g)?n="swf":"#"===g.charAt(0)?n="inline":r(c)&&(n="html",k=c)),"ajax"===n&&(m=g.split(/\s+/,2),g=m.shift(),m=m.shift()));k||("inline"===n?g?k=f(r(g)?g.replace(/.*(?=#[^\s]+$)/,""):g):l.isDom&&(k=c):"html"===n?k=g:n||g||!l.isDom||(n="inline",k=c));f.extend(l,{href:g,type:n,content:k,title:h,selector:m});a[e]=l}),b.opts=f.extend(!0,{},b.defaults,d),d.keys!==w&&(b.opts.keys=d.keys?f.extend({},b.defaults.keys,d.keys):!1),b.group=a,b._start(b.opts.index)},cancel:function(){var a=b.coming;a&&!1===b.trigger("onCancel")||(b.hideLoading(),a&&(b.ajaxLoad&&b.ajaxLoad.abort(),b.ajaxLoad=null,b.imgPreload&&(b.imgPreload.onload=b.imgPreload.onerror=null),a.wrap&&a.wrap.stop(!0,!0).trigger("onReset").remove(),b.coming=null,b.current||b._afterZoomOut(a)))},close:function(a){b.cancel();!1!==b.trigger("beforeClose")&&(b.unbindEvents(),b.isActive&&(b.isOpen&&!0!==a?(b.isOpen=b.isOpened=!1,b.isClosing=!0,f(".fancybox-item, .fancybox-nav").remove(),b.wrap.stop(!0,!0).removeClass("fancybox-opened"),b.transitions[b.current.closeMethod]()):(f(".fancybox-wrap").stop(!0).trigger("onReset").remove(),b._afterZoomOut())))},play:function(a){var d=function(){clearTimeout(b.player.timer)},e=function(){d();b.current&&b.player.isActive&&(b.player.timer=setTimeout(b.next,b.current.playSpeed))},c=function(){d();p.unbind(".player");b.player.isActive=!1;b.trigger("onPlayEnd")};!0===a||!b.player.isActive&&!1!==a?b.current&&(b.current.loop||b.current.index<b.group.length-1)&&(b.player.isActive=!0,p.bind({"onCancel.player beforeClose.player":c,"onUpdate.player":e,"beforeLoad.player":d}),e(),b.trigger("onPlayStart")):c()},next:function(a){var d=b.current;d&&(r(a)||(a=d.direction.next),b.jumpto(d.index+1,a,"next"))},prev:function(a){var d=b.current;d&&(r(a)||(a=d.direction.prev),b.jumpto(d.index-1,a,"prev"))},jumpto:function(a,d,e){var c=b.current;c&&(a=m(a),b.direction=d||c.direction[a>=c.index?"next":"prev"],b.router=e||"jumpto",c.loop&&(0>a&&(a=c.group.length+a%c.group.length),a%=c.group.length),c.group[a]!==w&&(b.cancel(),b._start(a)))},reposition:function(a,d){var e=b.current,c=e?e.wrap:null,l;c&&(l=b._getPosition(d),a&&"scroll"===a.type?(delete l.position,c.stop(!0,!0).animate(l,200)):(c.css(l),e.pos=f.extend({},e.dim,l)))},update:function(a){var d=a&&a.originalEvent&&a.originalEvent.type,e=!d||"orientationchange"===d;e&&(clearTimeout(C),C=null);b.isOpen&&!C&&(C=setTimeout(function(){var c=b.current;c&&!b.isClosing&&(b.wrap.removeClass("fancybox-tmp"),(e||"load"===d||"resize"===d&&c.autoResize)&&b._setDimension(),"scroll"===d&&c.canShrink||b.reposition(a),b.trigger("onUpdate"),C=null)},e&&!t?0:300))},toggle:function(a){b.isOpen&&(b.current.fitToView="boolean"===f.type(a)?a:!b.current.fitToView,t&&(b.wrap.removeAttr("style").addClass("fancybox-tmp"),b.trigger("onUpdate")),b.update())},hideLoading:function(){p.unbind(".loading");f("#fancybox-loading").remove()},showLoading:function(){var a,d;b.hideLoading();a=f('<div id="fancybox-loading"><div></div></div>').click(b.cancel).appendTo("body");p.bind("keydown.loading",function(a){27===(a.which||a.keyCode)&&(a.preventDefault(),b.cancel())});b.defaults.fixed||(d=b.getViewport(),a.css({position:"absolute",top:0.5*d.h+d.y,left:0.5*d.w+d.x}));b.trigger("onLoading")},getViewport:function(){var a=b.current&&b.current.locked||!1,d={x:q.scrollLeft(),y:q.scrollTop()};a&&a.length?(d.w=a[0].clientWidth,d.h=a[0].clientHeight):(d.w=t&&s.innerWidth?s.innerWidth:q.width(),d.h=t&&s.innerHeight?s.innerHeight:q.height());return d},unbindEvents:function(){b.wrap&&u(b.wrap)&&b.wrap.unbind(".fb");p.unbind(".fb");q.unbind(".fb")},bindEvents:function(){var a=b.current,d;a&&(q.bind("orientationchange.fb"+(t?"":" resize.fb")+(a.autoCenter&&!a.locked?" scroll.fb":""),b.update),(d=a.keys)&&p.bind("keydown.fb",function(e){var c=e.which||e.keyCode,l=e.target||e.srcElement;if(27===c&&b.coming)return!1;e.ctrlKey||e.altKey||e.shiftKey||e.metaKey||l&&(l.type||f(l).is("[contenteditable]"))||f.each(d,function(d,l){if(1<a.group.length&&l[c]!==w)return b[d](l[c]),e.preventDefault(),!1;if(-1<f.inArray(c,l))return b[d](),e.preventDefault(),!1})}),f.fn.mousewheel&&a.mouseWheel&&b.wrap.bind("mousewheel.fb",function(d,c,l,g){for(var h=f(d.target||null),k=!1;h.length&&!(k||h.is(".fancybox-skin")||h.is(".fancybox-wrap"));)k=h[0]&&!(h[0].style.overflow&&"hidden"===h[0].style.overflow)&&(h[0].clientWidth&&h[0].scrollWidth>h[0].clientWidth||h[0].clientHeight&&h[0].scrollHeight>h[0].clientHeight),h=f(h).parent();0!==c&&!k&&1<b.group.length&&!a.canShrink&&(0<g||0<l?b.prev(0<g?"down":"left"):(0>g||0>l)&&b.next(0>g?"up":"right"),d.preventDefault())}))},trigger:function(a,d){var e,c=d||b.coming||b.current;if(c){f.isFunction(c[a])&&(e=c[a].apply(c,Array.prototype.slice.call(arguments,1)));if(!1===e)return!1;c.helpers&&f.each(c.helpers,function(d,e){if(e&&b.helpers[d]&&f.isFunction(b.helpers[d][a]))b.helpers[d][a](f.extend(!0,{},b.helpers[d].defaults,e),c)})}p.trigger(a)},isImage:function(a){return r(a)&&a.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)},isSWF:function(a){return r(a)&&a.match(/\.(swf)((\?|#).*)?$/i)},_start:function(a){var d={},e,c;a=m(a);e=b.group[a]||null;if(!e)return!1;d=f.extend(!0,{},b.opts,e);e=d.margin;c=d.padding;"number"===f.type(e)&&(d.margin=[e,e,e,e]);"number"===f.type(c)&&(d.padding=[c,c,c,c]);d.modal&&f.extend(!0,d,{closeBtn:!1,closeClick:!1,nextClick:!1,arrows:!1,mouseWheel:!1,keys:null,helpers:{overlay:{closeClick:!1}}});d.autoSize&&(d.autoWidth=d.autoHeight=!0);"auto"===d.width&&(d.autoWidth=!0);"auto"===d.height&&(d.autoHeight=!0);d.group=b.group;d.index=a;b.coming=d;if(!1===b.trigger("beforeLoad"))b.coming=null;else{c=d.type;e=d.href;if(!c)return b.coming=null,b.current&&b.router&&"jumpto"!==b.router?(b.current.index=a,b[b.router](b.direction)):!1;b.isActive=!0;if("image"===c||"swf"===c)d.autoHeight=d.autoWidth=!1,d.scrolling="visible";"image"===c&&(d.aspectRatio=!0);"iframe"===c&&t&&(d.scrolling="scroll");d.wrap=f(d.tpl.wrap).addClass("fancybox-"+(t?"mobile":"desktop")+" fancybox-type-"+c+" fancybox-tmp "+d.wrapCSS).appendTo(d.parent||"body");f.extend(d,{skin:f(".fancybox-skin",d.wrap),outer:f(".fancybox-outer",d.wrap),inner:f(".fancybox-inner",d.wrap)});f.each(["Top","Right","Bottom","Left"],function(a,b){d.skin.css("padding"+b,x(d.padding[a]))});b.trigger("onReady");if("inline"===c||"html"===c){if(!d.content||!d.content.length)return b._error("content")}else if(!e)return b._error("href");"image"===c?b._loadImage():"ajax"===c?b._loadAjax():"iframe"===c?b._loadIframe():b._afterLoad()}},_error:function(a){f.extend(b.coming,{type:"html",autoWidth:!0,autoHeight:!0,minWidth:0,minHeight:0,scrolling:"no",hasError:a,content:b.coming.tpl.error});b._afterLoad()},_loadImage:function(){var a=b.imgPreload=new Image;a.onload=function(){this.onload=this.onerror=null;b.coming.width=this.width/b.opts.pixelRatio;b.coming.height=this.height/b.opts.pixelRatio;b._afterLoad()};a.onerror=function(){this.onload=this.onerror=null;b._error("image")};a.src=b.coming.href;!0!==a.complete&&b.showLoading()},_loadAjax:function(){var a=b.coming;b.showLoading();b.ajaxLoad=f.ajax(f.extend({},a.ajax,{url:a.href,error:function(a,e){b.coming&&"abort"!==e?b._error("ajax",a):b.hideLoading()},success:function(d,e){"success"===e&&(a.content=d,b._afterLoad())}}))},_loadIframe:function(){var a=b.coming,d=f(a.tpl.iframe.replace(/\{rnd\}/g,(new Date).getTime())).attr("scrolling",t?"auto":a.iframe.scrolling).attr("src",a.href);f(a.wrap).bind("onReset",function(){try{f(this).find("iframe").hide().attr("src","//about:blank").end().empty()}catch(a){}});a.iframe.preload&&(b.showLoading(),d.one("load",function(){f(this).data("ready",1);t||f(this).bind("load.fb",b.update);f(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show();b._afterLoad()}));a.content=d.appendTo(a.inner);a.iframe.preload||b._afterLoad()},_preloadImages:function(){var a=b.group,d=b.current,e=a.length,c=d.preload?Math.min(d.preload,e-1):0,f,g;for(g=1;g<=c;g+=1)f=a[(d.index+g)%e],"image"===f.type&&f.href&&((new Image).src=f.href)},_afterLoad:function(){var a=b.coming,d=b.current,e,c,l,g,h;b.hideLoading();if(a&&!1!==b.isActive)if(!1===b.trigger("afterLoad",a,d))a.wrap.stop(!0).trigger("onReset").remove(),b.coming=null;else{d&&(b.trigger("beforeChange",d),d.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove());b.unbindEvents();e=a.content;c=a.type;l=a.scrolling;f.extend(b,{wrap:a.wrap,skin:a.skin,outer:a.outer,inner:a.inner,current:a,previous:d});g=a.href;switch(c){case"inline":case"ajax":case"html":a.selector?e=f("<div>").html(e).find(a.selector):u(e)&&(e.data("fancybox-placeholder")||e.data("fancybox-placeholder",f('<div class="fancybox-placeholder"></div>').insertAfter(e).hide()),e=e.show().detach(),a.wrap.bind("onReset",function(){f(this).find(e).length&&e.hide().replaceAll(e.data("fancybox-placeholder")).data("fancybox-placeholder",!1)}));break;case"image":e=a.tpl.image.replace(/\{href\}/g,g);break;case"swf":e='<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="'+g+'"></param>',h="",f.each(a.swf,function(a,b){e+='<param name="'+a+'" value="'+b+'"></param>';h+=" "+a+'="'+b+'"'}),e+='<embed src="'+g+'" type="application/x-shockwave-flash" width="100%" height="100%"'+h+"></embed></object>"}u(e)&&e.parent().is(a.inner)||a.inner.append(e);b.trigger("beforeShow");a.inner.css("overflow","yes"===l?"scroll":"no"===l?"hidden":l);b._setDimension();b.reposition();b.isOpen=!1;b.coming=null;b.bindEvents();if(!b.isOpened)f(".fancybox-wrap").not(a.wrap).stop(!0).trigger("onReset").remove();else if(d.prevMethod)b.transitions[d.prevMethod]();b.transitions[b.isOpened?a.nextMethod:a.openMethod]();b._preloadImages()}},_setDimension:function(){var a=b.getViewport(),d=0,e=!1,c=!1,e=b.wrap,l=b.skin,g=b.inner,h=b.current,c=h.width,k=h.height,n=h.minWidth,v=h.minHeight,p=h.maxWidth,q=h.maxHeight,t=h.scrolling,r=h.scrollOutside?h.scrollbarWidth:0,y=h.margin,z=m(y[1]+y[3]),s=m(y[0]+y[2]),w,A,u,D,B,G,C,E,I;e.add(l).add(g).width("auto").height("auto").removeClass("fancybox-tmp");y=m(l.outerWidth(!0)-l.width());w=m(l.outerHeight(!0)-l.height());A=z+y;u=s+w;D=F(c)?(a.w-A)*m(c)/100:c;B=F(k)?(a.h-u)*m(k)/100:k;if("iframe"===h.type){if(I=h.content,h.autoHeight&&1===I.data("ready"))try{I[0].contentWindow.document.location&&(g.width(D).height(9999),G=I.contents().find("body"),r&&G.css("overflow-x","hidden"),B=G.outerHeight(!0))}catch(H){}}else if(h.autoWidth||h.autoHeight)g.addClass("fancybox-tmp"),h.autoWidth||g.width(D),h.autoHeight||g.height(B),h.autoWidth&&(D=g.width()),h.autoHeight&&(B=g.height()),g.removeClass("fancybox-tmp");c=m(D);k=m(B);E=D/B;n=m(F(n)?m(n,"w")-A:n);p=m(F(p)?m(p,"w")-A:p);v=m(F(v)?m(v,"h")-u:v);q=m(F(q)?m(q,"h")-u:q);G=p;C=q;h.fitToView&&(p=Math.min(a.w-A,p),q=Math.min(a.h-u,q));A=a.w-z;s=a.h-s;h.aspectRatio?(c>p&&(c=p,k=m(c/E)),k>q&&(k=q,c=m(k*E)),c<n&&(c=n,k=m(c/E)),k<v&&(k=v,c=m(k*E))):(c=Math.max(n,Math.min(c,p)),h.autoHeight&&"iframe"!==h.type&&(g.width(c),k=g.height()),k=Math.max(v,Math.min(k,q)));if(h.fitToView)if(g.width(c).height(k),e.width(c+y),a=e.width(),z=e.height(),h.aspectRatio)for(;(a>A||z>s)&&c>n&&k>v&&!(19<d++);)k=Math.max(v,Math.min(q,k-10)),c=m(k*E),c<n&&(c=n,k=m(c/E)),c>p&&(c=p,k=m(c/E)),g.width(c).height(k),e.width(c+y),a=e.width(),z=e.height();else c=Math.max(n,Math.min(c,c-(a-A))),k=Math.max(v,Math.min(k,k-(z-s)));r&&"auto"===t&&k<B&&c+y+r<A&&(c+=r);g.width(c).height(k);e.width(c+y);a=e.width();z=e.height();e=(a>A||z>s)&&c>n&&k>v;c=h.aspectRatio?c<G&&k<C&&c<D&&k<B:(c<G||k<C)&&(c<D||k<B);f.extend(h,{dim:{width:x(a),height:x(z)},origWidth:D,origHeight:B,canShrink:e,canExpand:c,wPadding:y,hPadding:w,wrapSpace:z-l.outerHeight(!0),skinSpace:l.height()-k});!I&&h.autoHeight&&k>v&&k<q&&!c&&g.height("auto")},_getPosition:function(a){var d=b.current,e=b.getViewport(),c=d.margin,f=b.wrap.width()+c[1]+c[3],g=b.wrap.height()+c[0]+c[2],c={position:"absolute",top:c[0],left:c[3]};d.autoCenter&&d.fixed&&!a&&g<=e.h&&f<=e.w?c.position="fixed":d.locked||(c.top+=e.y,c.left+=e.x);c.top=x(Math.max(c.top,c.top+(e.h-g)*d.topRatio));c.left=x(Math.max(c.left,c.left+(e.w-f)*d.leftRatio));return c},_afterZoomIn:function(){var a=b.current;a&&((b.isOpen=b.isOpened=!0,b.wrap.css("overflow","visible").addClass("fancybox-opened"),b.update(),(a.closeClick||a.nextClick&&1<b.group.length)&&b.inner.css("cursor","pointer").bind("click.fb",function(d){f(d.target).is("a")||f(d.target).parent().is("a")||(d.preventDefault(),b[a.closeClick?"close":"next"]())}),a.closeBtn&&f(a.tpl.closeBtn).appendTo(b.skin).bind("click.fb",function(a){a.preventDefault();b.close()}),a.arrows&&1<b.group.length&&((a.loop||0<a.index)&&f(a.tpl.prev).appendTo(b.outer).bind("click.fb",b.prev),(a.loop||a.index<b.group.length-1)&&f(a.tpl.next).appendTo(b.outer).bind("click.fb",b.next)),b.trigger("afterShow"),a.loop||a.index!==a.group.length-1)?b.opts.autoPlay&&!b.player.isActive&&(b.opts.autoPlay=!1,b.play(!0)):b.play(!1))},_afterZoomOut:function(a){a=a||b.current;f(".fancybox-wrap").trigger("onReset").remove();f.extend(b,{group:{},opts:{},router:!1,current:null,isActive:!1,isOpened:!1,isOpen:!1,isClosing:!1,wrap:null,skin:null,outer:null,inner:null});b.trigger("afterClose",a)}});b.transitions={getOrigPosition:function(){var a=b.current,d=a.element,e=a.orig,c={},f=50,g=50,h=a.hPadding,k=a.wPadding,n=b.getViewport();!e&&a.isDom&&d.is(":visible")&&(e=d.find("img:first"),e.length||(e=d));u(e)?(c=e.offset(),e.is("img")&&(f=e.outerWidth(),g=e.outerHeight())):(c.top=n.y+(n.h-g)*a.topRatio,c.left=n.x+(n.w-f)*a.leftRatio);if("fixed"===b.wrap.css("position")||a.locked)c.top-=n.y,c.left-=n.x;return c={top:x(c.top-h*a.topRatio),left:x(c.left-k*a.leftRatio),width:x(f+k),height:x(g+h)}},step:function(a,d){var e,c,f=d.prop;c=b.current;var g=c.wrapSpace,h=c.skinSpace;if("width"===f||"height"===f)e=d.end===d.start?1:(a-d.start)/(d.end-d.start),b.isClosing&&(e=1-e),c="width"===f?c.wPadding:c.hPadding,c=a-c,b.skin[f](m("width"===f?c:c-g*e)),b.inner[f](m("width"===f?c:c-g*e-h*e))},zoomIn:function(){var a=b.current,d=a.pos,e=a.openEffect,c="elastic"===e,l=f.extend({opacity:1},d);delete l.position;c?(d=this.getOrigPosition(),a.openOpacity&&(d.opacity=0.1)):"fade"===e&&(d.opacity=0.1);b.wrap.css(d).animate(l,{duration:"none"===e?0:a.openSpeed,easing:a.openEasing,step:c?this.step:null,complete:b._afterZoomIn})},zoomOut:function(){var a=b.current,d=a.closeEffect,e="elastic"===d,c={opacity:0.1};e&&(c=this.getOrigPosition(),a.closeOpacity&&(c.opacity=0.1));b.wrap.animate(c,{duration:"none"===d?0:a.closeSpeed,easing:a.closeEasing,step:e?this.step:null,complete:b._afterZoomOut})},changeIn:function(){var a=b.current,d=a.nextEffect,e=a.pos,c={opacity:1},f=b.direction,g;e.opacity=0.1;"elastic"===d&&(g="down"===f||"up"===f?"top":"left","down"===f||"right"===f?(e[g]=x(m(e[g])-200),c[g]="+=200px"):(e[g]=x(m(e[g])+200),c[g]="-=200px"));"none"===d?b._afterZoomIn():b.wrap.css(e).animate(c,{duration:a.nextSpeed,easing:a.nextEasing,complete:b._afterZoomIn})},changeOut:function(){var a=b.previous,d=a.prevEffect,e={opacity:0.1},c=b.direction;"elastic"===d&&(e["down"===c||"up"===c?"top":"left"]=("up"===c||"left"===c?"-":"+")+"=200px");a.wrap.animate(e,{duration:"none"===d?0:a.prevSpeed,easing:a.prevEasing,complete:function(){f(this).trigger("onReset").remove()}})}};b.helpers.overlay={defaults:{closeClick:!0,speedOut:200,showEarly:!0,css:{},locked:!t,fixed:!0},overlay:null,fixed:!1,el:f("html"),create:function(a){var d;a=f.extend({},this.defaults,a);this.overlay&&this.close();d=b.coming?b.coming.parent:a.parent;this.overlay=f('<div class="fancybox-overlay"></div>').appendTo(d&&d.lenth?d:"body");this.fixed=!1;a.fixed&&b.defaults.fixed&&(this.overlay.addClass("fancybox-overlay-fixed"),this.fixed=!0)},open:function(a){var d=this;a=f.extend({},this.defaults,a);this.overlay?this.overlay.unbind(".overlay").width("auto").height("auto"):this.create(a);this.fixed||(q.bind("resize.overlay",f.proxy(this.update,this)),this.update());a.closeClick&&this.overlay.bind("click.overlay",function(a){if(f(a.target).hasClass("fancybox-overlay"))return b.isActive?b.close():d.close(),!1});this.overlay.css(a.css).show()},close:function(){q.unbind("resize.overlay");this.el.hasClass("fancybox-lock")&&(f(".fancybox-margin").removeClass("fancybox-margin"),this.el.removeClass("fancybox-lock"),q.scrollTop(this.scrollV).scrollLeft(this.scrollH));f(".fancybox-overlay").remove().hide();f.extend(this,{overlay:null,fixed:!1})},update:function(){var a="100%",b;this.overlay.width(a).height("100%");J?(b=Math.max(H.documentElement.offsetWidth,H.body.offsetWidth),p.width()>b&&(a=p.width())):p.width()>q.width()&&(a=p.width());this.overlay.width(a).height(p.height())},onReady:function(a,b){var e=this.overlay;f(".fancybox-overlay").stop(!0,!0);e||this.create(a);a.locked&&this.fixed&&b.fixed&&(b.locked=this.overlay.append(b.wrap),b.fixed=!1);!0===a.showEarly&&this.beforeShow.apply(this,arguments)},beforeShow:function(a,b){b.locked&&!this.el.hasClass("fancybox-lock")&&(!1!==this.fixPosition&&f("*").filter(function(){return"fixed"===f(this).css("position")&&!f(this).hasClass("fancybox-overlay")&&!f(this).hasClass("fancybox-wrap")}).addClass("fancybox-margin"),this.el.addClass("fancybox-margin"),this.scrollV=q.scrollTop(),this.scrollH=q.scrollLeft(),this.el.addClass("fancybox-lock"),q.scrollTop(this.scrollV).scrollLeft(this.scrollH));this.open(a)},onUpdate:function(){this.fixed||this.update()},afterClose:function(a){this.overlay&&!b.coming&&this.overlay.fadeOut(a.speedOut,f.proxy(this.close,this))}};b.helpers.title={defaults:{type:"float",position:"bottom"},beforeShow:function(a){var d=b.current,e=d.title,c=a.type;f.isFunction(e)&&(e=e.call(d.element,d));if(r(e)&&""!==f.trim(e)){d=f('<div class="fancybox-title fancybox-title-'+c+'-wrap">'+e+"</div>");switch(c){case"inside":c=b.skin;break;case"outside":c=b.wrap;break;case"over":c=b.inner;break;default:c=b.skin,d.appendTo("body"),J&&d.width(d.width()),d.wrapInner('<span class="child"></span>'),b.current.margin[2]+=Math.abs(m(d.css("margin-bottom")))}d["top"===a.position?"prependTo":"appendTo"](c)}}};f.fn.fancybox=function(a){var d,e=f(this),c=this.selector||"",l=function(g){var h=f(this).blur(),k=d,l,m;g.ctrlKey||g.altKey||g.shiftKey||g.metaKey||h.is(".fancybox-wrap")||(l=a.groupAttr||"data-fancybox-group",m=h.attr(l),m||(l="rel",m=h.get(0)[l]),m&&""!==m&&"nofollow"!==m&&(h=c.length?f(c):e,h=h.filter("["+l+'="'+m+'"]'),k=h.index(this)),a.index=k,!1!==b.open(h,a)&&g.preventDefault())};a=a||{};d=a.index||0;c&&!1!==a.live?p.undelegate(c,"click.fb-start").delegate(c+":not('.fancybox-item, .fancybox-nav')","click.fb-start",l):e.unbind("click.fb-start").bind("click.fb-start",l);this.filter("[data-fancybox-start=1]").trigger("click");return this};p.ready(function(){var a,d;f.scrollbarWidth===w&&(f.scrollbarWidth=function(){var a=f('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),b=a.children(),b=b.innerWidth()-b.height(99).innerWidth();a.remove();return b});f.support.fixedPosition===w&&(f.support.fixedPosition=function(){var a=f('<div style="position:fixed;top:20px;"></div>').appendTo("body"),b=20===a[0].offsetTop||15===a[0].offsetTop;a.remove();return b}());f.extend(b.defaults,{scrollbarWidth:f.scrollbarWidth(),fixed:f.support.fixedPosition,parent:f("body")});a=f(s).width();K.addClass("fancybox-lock-test");d=f(s).width();K.removeClass("fancybox-lock-test");f("<style type='text/css'>.fancybox-margin{margin-right:"+(d-a)+"px;}</style>").appendTo("head")})})(window,document,jQuery);;
/*!
 * Buttons helper for fancyBox
 * version: 1.0.5 (Mon, 15 Oct 2012)
 * @requires fancyBox v2.0 or later
 *
 * Usage:
 *     $(".fancybox").fancybox({
 *         helpers : {
 *             buttons: {
 *                 position : 'top'
 *             }
 *         }
 *     });
 *
 */
;(function($){var F=$.fancybox;F.helpers.buttons={defaults:{skipSingle:false,position:'top',tpl:'<div id="fancybox-buttons"><ul><li><a class="btnPrev" title="Previous" href="javascript:;"></a></li><li><a class="btnPlay" title="Start slideshow" href="javascript:;"></a></li><li><a class="btnNext" title="Next" href="javascript:;"></a></li><li><a class="btnToggle" title="Toggle size" href="javascript:;"></a></li><li><a class="btnClose" title="Close" href="javascript:;"></a></li></ul></div>'},list:null,buttons:null,beforeLoad:function(opts,obj){if(opts.skipSingle&&obj.group.length<2){obj.helpers.buttons=false;obj.closeBtn=true;return;}
obj.margin[opts.position==='bottom'?2:0]+=30;},onPlayStart:function(){if(this.buttons){this.buttons.play.attr('title','Pause slideshow').addClass('btnPlayOn');}},onPlayEnd:function(){if(this.buttons){this.buttons.play.attr('title','Start slideshow').removeClass('btnPlayOn');}},afterShow:function(opts,obj){var buttons=this.buttons;if(!buttons){this.list=$(opts.tpl).addClass(opts.position).appendTo('body');buttons={prev:this.list.find('.btnPrev').click(F.prev),next:this.list.find('.btnNext').click(F.next),play:this.list.find('.btnPlay').click(F.play),toggle:this.list.find('.btnToggle').click(F.toggle),close:this.list.find('.btnClose').click(F.close)}}
if(obj.index>0||obj.loop){buttons.prev.removeClass('btnDisabled');}else{buttons.prev.addClass('btnDisabled');}
if(obj.loop||obj.index<obj.group.length-1){buttons.next.removeClass('btnDisabled');buttons.play.removeClass('btnDisabled');}else{buttons.next.addClass('btnDisabled');buttons.play.addClass('btnDisabled');}
this.buttons=buttons;this.onUpdate(opts,obj);},onUpdate:function(opts,obj){var toggle;if(!this.buttons){return;}
toggle=this.buttons.toggle.removeClass('btnDisabled btnToggleOn');if(obj.canShrink){toggle.addClass('btnToggleOn');}else if(!obj.canExpand){toggle.addClass('btnDisabled');}},beforeClose:function(){if(this.list){this.list.remove();}
this.list=null;this.buttons=null;}};}(jQuery));;
/*!
 * Media helper for fancyBox
 * version: 1.0.6 (Fri, 14 Jun 2013)
 * @requires fancyBox v2.0 or later
 *
 * Usage:
 *     $(".fancybox").fancybox({
 *         helpers : {
 *             media: true
 *         }
 *     });
 *
 * Set custom URL parameters:
 *     $(".fancybox").fancybox({
 *         helpers : {
 *             media: {
 *                 youtube : {
 *                     params : {
 *                         autoplay : 0
 *                     }
 *                 }
 *             }
 *         }
 *     });
 *
 * Or:
 *     $(".fancybox").fancybox({,
 *         helpers : {
 *             media: true
 *         },
 *         youtube : {
 *             autoplay: 0
 *         }
 *     });
 *
 *  Supports:
 *
 *      Youtube
 *          http://www.youtube.com/watch?v=opj24KnzrWo
 *          http://www.youtube.com/embed/opj24KnzrWo
 *          http://youtu.be/opj24KnzrWo
 *   http://www.youtube-nocookie.com/embed/opj24KnzrWo
 *      Vimeo
 *          http://vimeo.com/40648169
 *          http://vimeo.com/channels/staffpicks/38843628
 *          http://vimeo.com/groups/surrealism/videos/36516384
 *          http://player.vimeo.com/video/45074303
 *      Metacafe
 *          http://www.metacafe.com/watch/7635964/dr_seuss_the_lorax_movie_trailer/
 *          http://www.metacafe.com/watch/7635964/
 *      Dailymotion
 *          http://www.dailymotion.com/video/xoytqh_dr-seuss-the-lorax-premiere_people
 *      Twitvid
 *          http://twitvid.com/QY7MD
 *      Twitpic
 *          http://twitpic.com/7p93st
 *      Instagram
 *          http://instagr.am/p/IejkuUGxQn/
 *          http://instagram.com/p/IejkuUGxQn/
 *      Google maps
 *          http://maps.google.com/maps?q=Eiffel+Tower,+Avenue+Gustave+Eiffel,+Paris,+France&t=h&z=17
 *          http://maps.google.com/?ll=48.857995,2.294297&spn=0.007666,0.021136&t=m&z=16
 *          http://maps.google.com/?ll=48.859463,2.292626&spn=0.000965,0.002642&t=m&z=19&layer=c&cbll=48.859524,2.292532&panoid=YJ0lq28OOy3VT2IqIuVY0g&cbp=12,151.58,,0,-15.56
 */
;(function($){"use strict";var F=$.fancybox,format=function(url,rez,params){params=params||'';if($.type(params)==="object"){params=$.param(params,true);}
$.each(rez,function(key,value){url=url.replace('$'+key,value||'');});if(params.length){url+=(url.indexOf('?')>0?'&':'?')+params;}
return url;};F.helpers.media={defaults:{youtube:{matcher:/(youtube\.com|youtu\.be|youtube-nocookie\.com)\/(watch\?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*)).*/i,params:{autoplay:1,autohide:1,fs:1,rel:0,hd:1,wmode:'opaque',enablejsapi:1,ps:'docs',controls:1},type:'iframe',url:'//www.youtube.com/embed/$3'},vimeo:{matcher:/(?:vimeo(?:pro)?.com)\/(?:[^\d]+)?(\d+)(?:.*)/,params:{autoplay:1,hd:1,show_title:1,show_byline:1,show_portrait:0,fullscreen:1},type:'iframe',url:'//player.vimeo.com/video/$1'},metacafe:{matcher:/metacafe.com\/(?:watch|fplayer)\/([\w\-]{1,10})/,params:{autoPlay:'yes'},type:'swf',url:function(rez,params,obj){obj.swf.flashVars='playerVars='+$.param(params,true);return'//www.metacafe.com/fplayer/'+rez[1]+'/.swf';}},dailymotion:{matcher:/dailymotion.com\/video\/(.*)\/?(.*)/,params:{additionalInfos:0,autoStart:1},type:'swf',url:'//www.dailymotion.com/swf/video/$1'},twitvid:{matcher:/twitvid\.com\/([a-zA-Z0-9_\-\?\=]+)/i,params:{autoplay:0},type:'iframe',url:'//www.twitvid.com/embed.php?guid=$1'},twitpic:{matcher:/twitpic\.com\/(?!(?:place|photos|events)\/)([a-zA-Z0-9\?\=\-]+)/i,type:'image',url:'//twitpic.com/show/full/$1/'},instagram:{matcher:/(instagr\.am|instagram\.com)\/p\/([a-zA-Z0-9_\-]+)\/?/i,type:'image',url:'//$1/p/$2/media/?size=l'},google_maps:{matcher:/maps\.google\.([a-z]{2,3}(\.[a-z]{2})?)\/(\?ll=|maps\?)(.*)/i,type:'iframe',url:function(rez){return'//maps.google.'+rez[1]+'/'+rez[3]+''+rez[4]+'&output='+(rez[4].indexOf('layer=c')>0?'svembed':'embed');}}},beforeLoad:function(opts,obj){var url=obj.href||'',type=false,what,item,rez,params;for(what in opts){if(opts.hasOwnProperty(what)){item=opts[what];rez=url.match(item.matcher);if(rez){type=item.type;params=$.extend(true,{},item.params,obj[what]||($.isPlainObject(opts[what])?opts[what].params:null));url=$.type(item.url)==="function"?item.url.call(this,rez,params,obj):format(item.url,rez,params);break;}}}
if(type){obj.href=url;obj.type=type;obj.autoHeight=false;}}};}(jQuery));;
/*!
 * Thumbnail helper for fancyBox
 * version: 1.0.7 (Mon, 01 Oct 2012)
 * @requires fancyBox v2.0 or later
 *
 * Usage:
 *     $(".fancybox").fancybox({
 *         helpers : {
 *             thumbs: {
 *                 width  : 50,
 *                 height : 50
 *             }
 *         }
 *     });
 *
 */
;(function($){var F=$.fancybox;F.helpers.thumbs={defaults:{width:50,height:50,position:'bottom',source:function(item){var href;if(item.element){href=$(item.element).find('img').attr('src');}
if(!href&&item.type==='image'&&item.href){href=item.href;}
return href;}},wrap:null,list:null,width:0,init:function(opts,obj){var that=this,list,thumbWidth=opts.width,thumbHeight=opts.height,thumbSource=opts.source;list='';for(var n=0;n<obj.group.length;n++){list+='<li><a style="width:'+thumbWidth+'px;height:'+thumbHeight+'px;" href="javascript:jQuery.fancybox.jumpto('+n+');"></a></li>';}
this.wrap=$('<div id="fancybox-thumbs"></div>').addClass(opts.position).appendTo('body');this.list=$('<ul>'+list+'</ul>').appendTo(this.wrap);$.each(obj.group,function(i){var el=obj.group[i],href=thumbSource(el);if(!href){return;}
$("<img />").load(function(){var width=this.width,height=this.height,widthRatio,heightRatio,parent;if(!that.list||!width||!height){return;}
widthRatio=width/thumbWidth;heightRatio=height/thumbHeight;parent=that.list.children().eq(i).find('a');if(widthRatio>=1&&heightRatio>=1){if(widthRatio>heightRatio){width=Math.floor(width/heightRatio);height=thumbHeight;}else{width=thumbWidth;height=Math.floor(height/widthRatio);}}
$(this).css({width:width,height:height,top:Math.floor(thumbHeight/2-height/2),left:Math.floor(thumbWidth/2-width/2)});parent.width(thumbWidth).height(thumbHeight);$(this).hide().appendTo(parent).fadeIn(300);}).attr('src',href).attr('title',el.title);});this.width=this.list.children().eq(0).outerWidth(true);this.list.width(this.width*(obj.group.length+1)).css('left',Math.floor($(window).width()*0.5-(obj.index*this.width+this.width*0.5)));},beforeLoad:function(opts,obj){if(obj.group.length<2){obj.helpers.thumbs=false;return;}
obj.margin[opts.position==='top'?0:2]+=((opts.height)+15);},afterShow:function(opts,obj){if(this.list){this.onUpdate(opts,obj);}else{this.init(opts,obj);}
this.list.children().removeClass('active').eq(obj.index).addClass('active');},onUpdate:function(opts,obj){if(this.list){this.list.stop(true).animate({'left':Math.floor($(window).width()*0.5-(obj.index*this.width+this.width*0.5))},150);}},beforeClose:function(){if(this.wrap){this.wrap.remove();}
this.wrap=null;this.list=null;this.width=0;}}}(jQuery));;
/*! Copyright (c) 2013 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.1.3
 *
 * Requires: 1.2.2+
 */
;(function(c){"function"===typeof define&&define.amd?define(["jquery"],c):"object"===typeof exports?module.exports=c:c(jQuery)})(function(c){function l(b){var a=b||window.event,h=[].slice.call(arguments,1),d=0,e=0,f=0,g=0,g=0;b=c.event.fix(a);b.type="mousewheel";a.wheelDelta&&(d=a.wheelDelta);a.detail&&(d=-1*a.detail);a.deltaY&&(d=f=-1*a.deltaY);a.deltaX&&(e=a.deltaX,d=-1*e);void 0!==a.wheelDeltaY&&(f=a.wheelDeltaY);void 0!==a.wheelDeltaX&&(e=-1*a.wheelDeltaX);g=Math.abs(d);if(!m||g<m)m=g;g=Math.max(Math.abs(f),Math.abs(e));if(!k||g<k)k=g;a=0<d?"floor":"ceil";d=Math[a](d/m);e=Math[a](e/k);f=Math[a](f/k);try{b.originalEvent.hasOwnProperty("wheelDelta")}catch(l){f=d}h.unshift(b,d,e,f);return(c.event.dispatch||c.event.handle).apply(this,h)}var n=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||9<=document.documentMode?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],m,k;if(c.event.fixHooks)for(var p=n.length;p;)c.event.fixHooks[n[--p]]=c.event.mouseHooks;c.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var b=h.length;b;)this.addEventListener(h[--b],l,!1);else this.onmousewheel=l},teardown:function(){if(this.removeEventListener)for(var b=h.length;b;)this.removeEventListener(h[--b],l,!1);else this.onmousewheel=null}};c.fn.extend({mousewheel:function(b){return b?this.bind("mousewheel",b):this.trigger("mousewheel")},unmousewheel:function(b){return this.unbind("mousewheel",b)}})});;if(typeof Object.create!=="function"){Object.create=function(obj){function F(){};F.prototype=obj;return new F();};}
(function($,window,document,undefined){var Carousel={init:function(options,el){var base=this;base.$elem=$(el);base.options=$.extend({},$.fn.owlCarousel.options,base.$elem.data(),options);base.userOptions=options;base.loadContent();},loadContent:function(){var base=this;if(typeof base.options.beforeInit==="function"){base.options.beforeInit.apply(this,[base.$elem]);}
if(typeof base.options.jsonPath==="string"){var url=base.options.jsonPath;function getData(data){if(typeof base.options.jsonSuccess==="function"){base.options.jsonSuccess.apply(this,[data]);}else{var content="";for(var i in data["owl"]){content+=data["owl"][i]["item"];}
base.$elem.html(content);}
base.logIn();}
$.getJSON(url,getData);}else{base.logIn();}},logIn:function(action){var base=this;base.$elem.data("owl-originalStyles",base.$elem.attr("style")).data("owl-originalClasses",base.$elem.attr("class"));base.$elem.css({opacity:0});base.orignalItems=base.options.items;base.checkBrowser();base.wrapperWidth=0;base.checkVisible;base.setVars();},setVars:function(){var base=this;if(base.$elem.children().length===0){return false}
base.baseClass();base.eventTypes();base.$userItems=base.$elem.children();base.itemsAmount=base.$userItems.length;base.wrapItems();base.$owlItems=base.$elem.find(".owl-item");base.$owlWrapper=base.$elem.find(".owl-wrapper");base.playDirection="next";base.prevItem=0;base.prevArr=[0];base.currentItem=0;base.customEvents();base.onStartup();},onStartup:function(){var base=this;base.updateItems();base.calculateAll();base.buildControls();base.updateControls();base.response();base.moveEvents();base.stopOnHover();base.owlStatus();if(base.options.transitionStyle!==false){base.transitionTypes(base.options.transitionStyle);}
if(base.options.autoPlay===true){base.options.autoPlay=5000;}
base.play();base.$elem.find(".owl-wrapper").css("display","block")
if(!base.$elem.is(":visible")){base.watchVisibility();}else{base.$elem.css("opacity",1);}
base.onstartup=false;base.eachMoveUpdate();if(typeof base.options.afterInit==="function"){base.options.afterInit.apply(this,[base.$elem]);}},eachMoveUpdate:function(){var base=this;if(base.options.lazyLoad===true){base.lazyLoad();}
if(base.options.autoHeight===true){base.autoHeight();}
base.onVisibleItems();if(typeof base.options.afterAction==="function"){base.options.afterAction.apply(this,[base.$elem]);}},updateVars:function(){var base=this;if(typeof base.options.beforeUpdate==="function"){base.options.beforeUpdate.apply(this,[base.$elem]);}
base.watchVisibility();base.updateItems();base.calculateAll();base.updatePosition();base.updateControls();base.eachMoveUpdate();if(typeof base.options.afterUpdate==="function"){base.options.afterUpdate.apply(this,[base.$elem]);}},reload:function(elements){var base=this;setTimeout(function(){base.updateVars();},0)},watchVisibility:function(){var base=this;if(base.$elem.is(":visible")===false){base.$elem.css({opacity:0});clearInterval(base.autoPlayInterval);clearInterval(base.checkVisible);}else{return false;}
base.checkVisible=setInterval(function(){if(base.$elem.is(":visible")){base.reload();base.$elem.animate({opacity:1},200);clearInterval(base.checkVisible);}},500);},wrapItems:function(){var base=this;base.$userItems.wrapAll("<div class=\"owl-wrapper\">").wrap("<div class=\"owl-item\"></div>");base.$elem.find(".owl-wrapper").wrap("<div class=\"owl-wrapper-outer\">");base.wrapperOuter=base.$elem.find(".owl-wrapper-outer");base.$elem.css("display","block");},baseClass:function(){var base=this;var hasBaseClass=base.$elem.hasClass(base.options.baseClass);var hasThemeClass=base.$elem.hasClass(base.options.theme);if(!hasBaseClass){base.$elem.addClass(base.options.baseClass);}
if(!hasThemeClass){base.$elem.addClass(base.options.theme);}},updateItems:function(){var base=this;if(base.options.responsive===false){return false;}
if(base.options.singleItem===true){base.options.items=base.orignalItems=1;base.options.itemsCustom=false;base.options.itemsDesktop=false;base.options.itemsDesktopSmall=false;base.options.itemsTablet=false;base.options.itemsTabletSmall=false;base.options.itemsMobile=false;return false;}
var width=$(base.options.responsiveBaseWidth).width();if(width>(base.options.itemsDesktop[0]||base.orignalItems)){base.options.items=base.orignalItems;}
if(typeof(base.options.itemsCustom)!=='undefined'&&base.options.itemsCustom!==false){base.options.itemsCustom.sort(function(a,b){return a[0]-b[0];});for(var i in base.options.itemsCustom){if(typeof(base.options.itemsCustom[i])!=='undefined'&&base.options.itemsCustom[i][0]<=width){base.options.items=base.options.itemsCustom[i][1];}}}else{if(width<=base.options.itemsDesktop[0]&&base.options.itemsDesktop!==false){base.options.items=base.options.itemsDesktop[1];}
if(width<=base.options.itemsDesktopSmall[0]&&base.options.itemsDesktopSmall!==false){base.options.items=base.options.itemsDesktopSmall[1];}
if(width<=base.options.itemsTablet[0]&&base.options.itemsTablet!==false){base.options.items=base.options.itemsTablet[1];}
if(width<=base.options.itemsTabletSmall[0]&&base.options.itemsTabletSmall!==false){base.options.items=base.options.itemsTabletSmall[1];}
if(width<=base.options.itemsMobile[0]&&base.options.itemsMobile!==false){base.options.items=base.options.itemsMobile[1];}}
if(base.options.items>base.itemsAmount&&base.options.itemsScaleUp===true){base.options.items=base.itemsAmount;}},response:function(){var base=this,smallDelay;if(base.options.responsive!==true){return false}
var lastWindowWidth=$(window).width();base.resizer=function(){if($(window).width()!==lastWindowWidth){if(base.options.autoPlay!==false){clearInterval(base.autoPlayInterval);}
clearTimeout(smallDelay);smallDelay=setTimeout(function(){lastWindowWidth=$(window).width();base.updateVars();},base.options.responsiveRefreshRate);}}
$(window).resize(base.resizer)},updatePosition:function(){var base=this;base.jumpTo(base.currentItem);if(base.options.autoPlay!==false){base.checkAp();}},appendItemsSizes:function(){var base=this;var roundPages=0;var lastItem=base.itemsAmount-base.options.items;base.$owlItems.each(function(index){var $this=$(this);$this.css({"width":base.itemWidth}).data("owl-item",Number(index));if(index%base.options.items===0||index===lastItem){if(!(index>lastItem)){roundPages+=1;}}
$this.data("owl-roundPages",roundPages)});},appendWrapperSizes:function(){var base=this;var width=0;var width=base.$owlItems.length*base.itemWidth;base.$owlWrapper.css({"width":width*2,"left":0});base.appendItemsSizes();},calculateAll:function(){var base=this;base.calculateWidth();base.appendWrapperSizes();base.loops();base.max();},calculateWidth:function(){var base=this;base.itemWidth=Math.round(base.$elem.width()/base.options.items)},max:function(){var base=this;var maximum=((base.itemsAmount*base.itemWidth)-base.options.items*base.itemWidth)*-1;if(base.options.items>base.itemsAmount){base.maximumItem=0;maximum=0
base.maximumPixels=0;}else{base.maximumItem=base.itemsAmount-base.options.items;base.maximumPixels=maximum;}
return maximum;},min:function(){return 0;},loops:function(){var base=this;base.positionsInArray=[0];base.pagesInArray=[];var prev=0;var elWidth=0;for(var i=0;i<base.itemsAmount;i++){elWidth+=base.itemWidth;base.positionsInArray.push(-elWidth);if(base.options.scrollPerPage===true){var item=$(base.$owlItems[i]);var roundPageNum=item.data("owl-roundPages");if(roundPageNum!==prev){base.pagesInArray[prev]=base.positionsInArray[i];prev=roundPageNum;}}}},buildControls:function(){var base=this;if(base.options.navigation===true||base.options.pagination===true){base.owlControls=$("<div class=\"owl-controls\"/>").toggleClass("clickable",!base.browser.isTouch).appendTo(base.$elem);}
if(base.options.pagination===true){base.buildPagination();}
if(base.options.navigation===true){base.buildButtons();}},buildButtons:function(){var base=this;var buttonsWrapper=$("<div class=\"owl-buttons\"/>")
base.owlControls.append(buttonsWrapper);base.buttonPrev=$("<div/>",{"class":"owl-prev","html":base.options.navigationText[0]||""});base.buttonNext=$("<div/>",{"class":"owl-next","html":base.options.navigationText[1]||""});buttonsWrapper.append(base.buttonPrev).append(base.buttonNext);buttonsWrapper.on("touchstart.owlControls mousedown.owlControls","div[class^=\"owl\"]",function(event){event.preventDefault();})
buttonsWrapper.on("touchend.owlControls mouseup.owlControls","div[class^=\"owl\"]",function(event){event.preventDefault();if($(this).hasClass("owl-next")){base.next();}else{base.prev();}})},buildPagination:function(){var base=this;base.paginationWrapper=$("<div class=\"owl-pagination\"/>");base.owlControls.append(base.paginationWrapper);base.paginationWrapper.on("touchend.owlControls mouseup.owlControls",".owl-page",function(event){event.preventDefault();if(Number($(this).data("owl-page"))!==base.currentItem){base.goTo(Number($(this).data("owl-page")),true);}});},updatePagination:function(){var base=this;if(base.options.pagination===false){return false;}
base.paginationWrapper.html("");var counter=0;var lastPage=base.itemsAmount-base.itemsAmount%base.options.items;for(var i=0;i<base.itemsAmount;i++){if(i%base.options.items===0){counter+=1;if(lastPage===i){var lastItem=base.itemsAmount-base.options.items;}
var paginationButton=$("<div/>",{"class":"owl-page"});var paginationButtonInner=$("<span></span>",{"text":base.options.paginationNumbers===true?counter:"","class":base.options.paginationNumbers===true?"owl-numbers":""});paginationButton.append(paginationButtonInner);paginationButton.data("owl-page",lastPage===i?lastItem:i);paginationButton.data("owl-roundPages",counter);base.paginationWrapper.append(paginationButton);}}
base.checkPagination();},checkPagination:function(){var base=this;if(base.options.pagination===false){return false;}
base.paginationWrapper.find(".owl-page").each(function(i,v){if($(this).data("owl-roundPages")===$(base.$owlItems[base.currentItem]).data("owl-roundPages")){base.paginationWrapper.find(".owl-page").removeClass("active");$(this).addClass("active");}});},checkNavigation:function(){var base=this;if(base.options.navigation===false){return false;}
if(base.options.rewindNav===false){if(base.currentItem===0&&base.maximumItem===0){base.buttonPrev.addClass("disabled");base.buttonNext.addClass("disabled");}else if(base.currentItem===0&&base.maximumItem!==0){base.buttonPrev.addClass("disabled");base.buttonNext.removeClass("disabled");}else if(base.currentItem===base.maximumItem){base.buttonPrev.removeClass("disabled");base.buttonNext.addClass("disabled");}else if(base.currentItem!==0&&base.currentItem!==base.maximumItem){base.buttonPrev.removeClass("disabled");base.buttonNext.removeClass("disabled");}}},updateControls:function(){var base=this;base.updatePagination();base.checkNavigation();if(base.owlControls){if(base.options.items>=base.itemsAmount){base.owlControls.hide();}else{base.owlControls.show();}}},destroyControls:function(){var base=this;if(base.owlControls){base.owlControls.remove();}},next:function(speed){var base=this;if(base.isTransition){return false;}
base.currentItem+=base.options.scrollPerPage===true?base.options.items:1;if(base.currentItem>base.maximumItem+(base.options.scrollPerPage==true?(base.options.items-1):0)){if(base.options.rewindNav===true){base.currentItem=0;speed="rewind";}else{base.currentItem=base.maximumItem;return false;}}
base.goTo(base.currentItem,speed);},prev:function(speed){var base=this;if(base.isTransition){return false;}
if(base.options.scrollPerPage===true&&base.currentItem>0&&base.currentItem<base.options.items){base.currentItem=0}else{base.currentItem-=base.options.scrollPerPage===true?base.options.items:1;}
if(base.currentItem<0){if(base.options.rewindNav===true){base.currentItem=base.maximumItem;speed="rewind"}else{base.currentItem=0;return false;}}
base.goTo(base.currentItem,speed);},goTo:function(position,speed,drag){var base=this;if(base.isTransition){return false;}
if(typeof base.options.beforeMove==="function"){base.options.beforeMove.apply(this,[base.$elem]);}
if(position>=base.maximumItem){position=base.maximumItem;}
else if(position<=0){position=0;}
base.currentItem=base.owl.currentItem=position;if(base.options.transitionStyle!==false&&drag!=="drag"&&base.options.items===1&&base.browser.support3d===true){base.swapSpeed(0)
if(base.browser.support3d===true){base.transition3d(base.positionsInArray[position]);}else{base.css2slide(base.positionsInArray[position],1);}
base.afterGo();base.singleItemTransition();return false;}
var goToPixel=base.positionsInArray[position];if(base.browser.support3d===true){base.isCss3Finish=false;if(speed===true){base.swapSpeed("paginationSpeed");setTimeout(function(){base.isCss3Finish=true;},base.options.paginationSpeed);}else if(speed==="rewind"){base.swapSpeed(base.options.rewindSpeed);setTimeout(function(){base.isCss3Finish=true;},base.options.rewindSpeed);}else{base.swapSpeed("slideSpeed");setTimeout(function(){base.isCss3Finish=true;},base.options.slideSpeed);}
base.transition3d(goToPixel);}else{if(speed===true){base.css2slide(goToPixel,base.options.paginationSpeed);}else if(speed==="rewind"){base.css2slide(goToPixel,base.options.rewindSpeed);}else{base.css2slide(goToPixel,base.options.slideSpeed);}}
base.afterGo();},jumpTo:function(position){var base=this;if(typeof base.options.beforeMove==="function"){base.options.beforeMove.apply(this,[base.$elem]);}
if(position>=base.maximumItem||position===-1){position=base.maximumItem;}
else if(position<=0){position=0;}
base.swapSpeed(0)
if(base.browser.support3d===true){base.transition3d(base.positionsInArray[position]);}else{base.css2slide(base.positionsInArray[position],1);}
base.currentItem=base.owl.currentItem=position;base.afterGo();},afterGo:function(){var base=this;base.prevArr.push(base.currentItem);base.prevItem=base.owl.prevItem=base.prevArr[base.prevArr.length-2];base.prevArr.shift(0)
if(base.prevItem!==base.currentItem){base.checkPagination();base.checkNavigation();base.eachMoveUpdate();if(base.options.autoPlay!==false){base.checkAp();}}
if(typeof base.options.afterMove==="function"&&base.prevItem!==base.currentItem){base.options.afterMove.apply(this,[base.$elem]);}},stop:function(){var base=this;base.apStatus="stop";clearInterval(base.autoPlayInterval);},checkAp:function(){var base=this;if(base.apStatus!=="stop"){base.play();}},play:function(){var base=this;base.apStatus="play";if(base.options.autoPlay===false){return false;}
clearInterval(base.autoPlayInterval);base.autoPlayInterval=setInterval(function(){base.next(true);},base.options.autoPlay);},swapSpeed:function(action){var base=this;if(action==="slideSpeed"){base.$owlWrapper.css(base.addCssSpeed(base.options.slideSpeed));}else if(action==="paginationSpeed"){base.$owlWrapper.css(base.addCssSpeed(base.options.paginationSpeed));}else if(typeof action!=="string"){base.$owlWrapper.css(base.addCssSpeed(action));}},addCssSpeed:function(speed){var base=this;return{"-webkit-transition":"all "+speed+"ms ease","-moz-transition":"all "+speed+"ms ease","-o-transition":"all "+speed+"ms ease","transition":"all "+speed+"ms ease"};},removeTransition:function(){return{"-webkit-transition":"","-moz-transition":"","-o-transition":"","transition":""};},doTranslate:function(pixels){return{"-webkit-transform":"translate3d("+pixels+"px, 0px, 0px)","-moz-transform":"translate3d("+pixels+"px, 0px, 0px)","-o-transform":"translate3d("+pixels+"px, 0px, 0px)","-ms-transform":"translate3d("+pixels+"px, 0px, 0px)","transform":"translate3d("+pixels+"px, 0px,0px)"};},transition3d:function(value){var base=this;base.$owlWrapper.css(base.doTranslate(value));},css2move:function(value){var base=this;base.$owlWrapper.css({"left":value})},css2slide:function(value,speed){var base=this;base.isCssFinish=false;base.$owlWrapper.stop(true,true).animate({"left":value},{duration:speed||base.options.slideSpeed,complete:function(){base.isCssFinish=true;}});},checkBrowser:function(){var base=this;var translate3D="translate3d(0px, 0px, 0px)",tempElem=document.createElement("div");tempElem.style.cssText="  -moz-transform:"+translate3D+"; -ms-transform:"+translate3D+"; -o-transform:"+translate3D+"; -webkit-transform:"+translate3D+"; transform:"+translate3D;var regex=/translate3d\(0px, 0px, 0px\)/g,asSupport=tempElem.style.cssText.match(regex),support3d=(asSupport!==null&&asSupport.length===1);var isTouch="ontouchstart"in window||navigator.msMaxTouchPoints;base.browser={"support3d":support3d,"isTouch":isTouch}},moveEvents:function(){var base=this;if(base.options.mouseDrag!==false||base.options.touchDrag!==false){base.gestures();base.disabledEvents();}},eventTypes:function(){var base=this;var types=["s","e","x"];base.ev_types={};if(base.options.mouseDrag===true&&base.options.touchDrag===true){types=["touchstart.owl mousedown.owl","touchmove.owl mousemove.owl","touchend.owl touchcancel.owl mouseup.owl"];}else if(base.options.mouseDrag===false&&base.options.touchDrag===true){types=["touchstart.owl","touchmove.owl","touchend.owl touchcancel.owl"];}else if(base.options.mouseDrag===true&&base.options.touchDrag===false){types=["mousedown.owl","mousemove.owl","mouseup.owl"];}
base.ev_types["start"]=types[0];base.ev_types["move"]=types[1];base.ev_types["end"]=types[2];},disabledEvents:function(){var base=this;base.$elem.on("dragstart.owl",function(event){event.preventDefault();});base.$elem.on("mousedown.disableTextSelect",function(e){return $(e.target).is('input, textarea, select, option');});},gestures:function(){var base=this;var locals={offsetX:0,offsetY:0,baseElWidth:0,relativePos:0,position:null,minSwipe:null,maxSwipe:null,sliding:null,dargging:null,targetElement:null}
base.isCssFinish=true;function getTouches(event){if(event.touches){return{x:event.touches[0].pageX,y:event.touches[0].pageY}}else{if(event.pageX!==undefined){return{x:event.pageX,y:event.pageY}}else{return{x:event.clientX,y:event.clientY}}}}
function swapEvents(type){if(type==="on"){$(document).on(base.ev_types["move"],dragMove);$(document).on(base.ev_types["end"],dragEnd);}else if(type==="off"){$(document).off(base.ev_types["move"]);$(document).off(base.ev_types["end"]);}}
function dragStart(event){var event=event.originalEvent||event||window.event;if(event.which===3){return false;}
if(base.itemsAmount<=base.options.items){return;}
if(base.isCssFinish===false&&!base.options.dragBeforeAnimFinish){return false;}
if(base.isCss3Finish===false&&!base.options.dragBeforeAnimFinish){return false;}
if(base.options.autoPlay!==false){clearInterval(base.autoPlayInterval);}
if(base.browser.isTouch!==true&&!base.$owlWrapper.hasClass("grabbing")){base.$owlWrapper.addClass("grabbing")}
base.newPosX=0;base.newRelativeX=0;$(this).css(base.removeTransition());var position=$(this).position();locals.relativePos=position.left;locals.offsetX=getTouches(event).x-position.left;locals.offsetY=getTouches(event).y-position.top;swapEvents("on");locals.sliding=false;locals.targetElement=event.target||event.srcElement;}
function dragMove(event){var event=event.originalEvent||event||window.event;base.newPosX=getTouches(event).x-locals.offsetX;base.newPosY=getTouches(event).y-locals.offsetY;base.newRelativeX=base.newPosX-locals.relativePos;if(typeof base.options.startDragging==="function"&&locals.dragging!==true&&base.newRelativeX!==0){locals.dragging=true;base.options.startDragging.apply(base,[base.$elem]);}
if(base.newRelativeX>8||base.newRelativeX<-8&&base.browser.isTouch===true){event.preventDefault?event.preventDefault():event.returnValue=false;locals.sliding=true;}
if((base.newPosY>10||base.newPosY<-10)&&locals.sliding===false){$(document).off("touchmove.owl");}
var minSwipe=function(){return base.newRelativeX/5;}
var maxSwipe=function(){return base.maximumPixels+base.newRelativeX/5;}
base.newPosX=Math.max(Math.min(base.newPosX,minSwipe()),maxSwipe());if(base.browser.support3d===true){base.transition3d(base.newPosX);}else{base.css2move(base.newPosX);}}
function dragEnd(event){var event=event.originalEvent||event||window.event;event.target=event.target||event.srcElement;locals.dragging=false;if(base.browser.isTouch!==true){base.$owlWrapper.removeClass("grabbing");}
if(base.newRelativeX<0){base.dragDirection=base.owl.dragDirection="left"}else{base.dragDirection=base.owl.dragDirection="right"}
if(base.newRelativeX!==0){var newPosition=base.getNewPosition();base.goTo(newPosition,false,"drag");if(locals.targetElement===event.target&&base.browser.isTouch!==true){$(event.target).on("click.disable",function(ev){ev.stopImmediatePropagation();ev.stopPropagation();ev.preventDefault();$(event.target).off("click.disable");});var handlers=$._data(event.target,"events")["click"];var owlStopEvent=handlers.pop();handlers.splice(0,0,owlStopEvent);}}
swapEvents("off");}
base.$elem.on(base.ev_types["start"],".owl-wrapper",dragStart);},getNewPosition:function(){var base=this,newPosition;newPosition=base.closestItem();if(newPosition>base.maximumItem){base.currentItem=base.maximumItem;newPosition=base.maximumItem;}else if(base.newPosX>=0){newPosition=0;base.currentItem=0;}
return newPosition;},closestItem:function(){var base=this,array=base.options.scrollPerPage===true?base.pagesInArray:base.positionsInArray,goal=base.newPosX,closest=null;$.each(array,function(i,v){if(goal-(base.itemWidth/20)>array[i+1]&&goal-(base.itemWidth/20)<v&&base.moveDirection()==="left"){closest=v;if(base.options.scrollPerPage===true){base.currentItem=$.inArray(closest,base.positionsInArray);}else{base.currentItem=i;}}
else if(goal+(base.itemWidth/20)<v&&goal+(base.itemWidth/20)>(array[i+1]||array[i]-base.itemWidth)&&base.moveDirection()==="right"){if(base.options.scrollPerPage===true){closest=array[i+1]||array[array.length-1];base.currentItem=$.inArray(closest,base.positionsInArray);}else{closest=array[i+1];base.currentItem=i+1;}}});return base.currentItem;},moveDirection:function(){var base=this,direction;if(base.newRelativeX<0){direction="right"
base.playDirection="next"}else{direction="left"
base.playDirection="prev"}
return direction},customEvents:function(){var base=this;base.$elem.on("owl.next",function(){base.next();});base.$elem.on("owl.prev",function(){base.prev();});base.$elem.on("owl.play",function(event,speed){base.options.autoPlay=speed;base.play();base.hoverStatus="play";});base.$elem.on("owl.stop",function(){base.stop();base.hoverStatus="stop";});base.$elem.on("owl.goTo",function(event,item){base.goTo(item)});base.$elem.on("owl.jumpTo",function(event,item){base.jumpTo(item)});},stopOnHover:function(){var base=this;if(base.options.stopOnHover===true&&base.browser.isTouch!==true&&base.options.autoPlay!==false){base.$elem.on("mouseover",function(){base.stop();});base.$elem.on("mouseout",function(){if(base.hoverStatus!=="stop"){base.play();}});}},lazyLoad:function(){var base=this;if(base.options.lazyLoad===false){return false;}
for(var i=0;i<base.itemsAmount;i++){var $item=$(base.$owlItems[i]);if($item.data("owl-loaded")==="loaded"){continue;}
var itemNumber=$item.data("owl-item"),$lazyImg=$item.find(".lazyOwl"),follow;if(typeof $lazyImg.data("src")!=="string"){$item.data("owl-loaded","loaded");continue;}
if($item.data("owl-loaded")===undefined){$lazyImg.hide();$item.addClass("loading").data("owl-loaded","checked");}
if(base.options.lazyFollow===true){follow=itemNumber>=base.currentItem;}else{follow=true;}
if(follow&&itemNumber<base.currentItem+base.options.items&&$lazyImg.length){base.lazyPreload($item,$lazyImg);}}},lazyPreload:function($item,$lazyImg){var base=this,iterations=0;if($lazyImg.prop("tagName")==="DIV"){$lazyImg.css("background-image","url("+$lazyImg.data("src")+")");var isBackgroundImg=true;}else{$lazyImg[0].src=$lazyImg.data("src");}
checkLazyImage();function checkLazyImage(){iterations+=1;if(base.completeImg($lazyImg.get(0))||isBackgroundImg===true){showImage();}else if(iterations<=100){setTimeout(checkLazyImage,100);}else{showImage();}}
function showImage(){$item.data("owl-loaded","loaded").removeClass("loading");$lazyImg.removeAttr("data-src");base.options.lazyEffect==="fade"?$lazyImg.fadeIn(400):$lazyImg.show();if(typeof base.options.afterLazyLoad==="function"){base.options.afterLazyLoad.apply(this,[base.$elem]);}}},autoHeight:function(){var base=this;var $currentimg=$(base.$owlItems[base.currentItem]).find("img");if($currentimg.get(0)!==undefined){var iterations=0;checkImage();}else{addHeight();}
function checkImage(){iterations+=1;if(base.completeImg($currentimg.get(0))){addHeight();}else if(iterations<=100){setTimeout(checkImage,100);}else{base.wrapperOuter.css("height","");}}
function addHeight(){var $currentItem=$(base.$owlItems[base.currentItem]).height();base.wrapperOuter.css("height",$currentItem+"px");if(!base.wrapperOuter.hasClass("autoHeight")){setTimeout(function(){base.wrapperOuter.addClass("autoHeight");},0);}}},completeImg:function(img){if(!img.complete){return false;}
if(typeof img.naturalWidth!=="undefined"&&img.naturalWidth==0){return false;}
return true;},onVisibleItems:function(){var base=this;if(base.options.addClassActive===true){base.$owlItems.removeClass("active");}
base.visibleItems=[];for(var i=base.currentItem;i<base.currentItem+base.options.items;i++){base.visibleItems.push(i);if(base.options.addClassActive===true){$(base.$owlItems[i]).addClass("active");}}
base.owl.visibleItems=base.visibleItems;},transitionTypes:function(className){var base=this;base.outClass="owl-"+className+"-out";base.inClass="owl-"+className+"-in";},singleItemTransition:function(){var base=this;base.isTransition=true;var outClass=base.outClass,inClass=base.inClass,$currentItem=base.$owlItems.eq(base.currentItem),$prevItem=base.$owlItems.eq(base.prevItem),prevPos=Math.abs(base.positionsInArray[base.currentItem])+base.positionsInArray[base.prevItem],origin=Math.abs(base.positionsInArray[base.currentItem])+base.itemWidth/2;base.$owlWrapper.addClass('owl-origin').css({"-webkit-transform-origin":origin+"px","-moz-perspective-origin":origin+"px","perspective-origin":origin+"px"});function transStyles(prevPos,zindex){return{"position":"relative","left":prevPos+"px"};}
var animEnd='webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend';$prevItem.css(transStyles(prevPos,10)).addClass(outClass).on(animEnd,function(){base.endPrev=true;$prevItem.off(animEnd);base.clearTransStyle($prevItem,outClass);});$currentItem.addClass(inClass).on(animEnd,function(){base.endCurrent=true;$currentItem.off(animEnd);base.clearTransStyle($currentItem,inClass);});},clearTransStyle:function(item,classToRemove){var base=this;item.css({"position":"","left":""}).removeClass(classToRemove);if(base.endPrev&&base.endCurrent){base.$owlWrapper.removeClass('owl-origin');base.endPrev=false;base.endCurrent=false;base.isTransition=false;}},owlStatus:function(){var base=this;base.owl={"userOptions":base.userOptions,"baseElement":base.$elem,"userItems":base.$userItems,"owlItems":base.$owlItems,"currentItem":base.currentItem,"prevItem":base.prevItem,"visibleItems":base.visibleItems,"isTouch":base.browser.isTouch,"browser":base.browser,"dragDirection":base.dragDirection}},clearEvents:function(){var base=this;base.$elem.off(".owl owl mousedown.disableTextSelect");$(document).off(".owl owl");$(window).off("resize",base.resizer);},unWrap:function(){var base=this;if(base.$elem.children().length!==0){base.$owlWrapper.unwrap();base.$userItems.unwrap().unwrap();if(base.owlControls){base.owlControls.remove();}}
base.clearEvents();base.$elem.attr("style",base.$elem.data("owl-originalStyles")||"").attr("class",base.$elem.data("owl-originalClasses"));},destroy:function(){var base=this;base.stop();clearInterval(base.checkVisible);base.unWrap();base.$elem.removeData();},reinit:function(newOptions){var base=this;var options=$.extend({},base.userOptions,newOptions);base.unWrap();base.init(options,base.$elem);},addItem:function(htmlString,targetPosition){var base=this,position;if(!htmlString){return false}
if(base.$elem.children().length===0){base.$elem.append(htmlString);base.setVars();return false;}
base.unWrap();if(targetPosition===undefined||targetPosition===-1){position=-1;}else{position=targetPosition;}
if(position>=base.$userItems.length||position===-1){base.$userItems.eq(-1).after(htmlString)}else{base.$userItems.eq(position).before(htmlString)}
base.setVars();},removeItem:function(targetPosition){var base=this,position;if(base.$elem.children().length===0){return false}
if(targetPosition===undefined||targetPosition===-1){position=-1;}else{position=targetPosition;}
base.unWrap();base.$userItems.eq(position).remove();base.setVars();}};$.fn.owlCarousel=function(options){return this.each(function(){if($(this).data("owl-init")===true){return false;}
$(this).data("owl-init",true);var carousel=Object.create(Carousel);carousel.init(options,this);$.data(this,"owlCarousel",carousel);});};$.fn.owlCarousel.options={items:5,itemsCustom:false,itemsDesktop:[1199,4],itemsDesktopSmall:[979,3],itemsTablet:[768,2],itemsTabletSmall:false,itemsMobile:[479,1],singleItem:false,itemsScaleUp:false,slideSpeed:0,paginationSpeed:0,rewindSpeed:0,autoPlay:false,stopOnHover:false,navigation:false,navigationText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],rewindNav:true,scrollPerPage:false,pagination:true,paginationNumbers:false,responsive:true,responsiveRefreshRate:200,responsiveBaseWidth:window,baseClass:"owl-carousel",theme:"owl-theme",lazyLoad:false,lazyFollow:true,lazyEffect:"fade",autoHeight:false,jsonPath:false,jsonSuccess:false,dragBeforeAnimFinish:true,mouseDrag:true,touchDrag:true,addClassActive:false,transitionStyle:false,beforeUpdate:false,afterUpdate:false,beforeInit:false,afterInit:false,beforeMove:false,afterMove:false,afterAction:false,startDragging:false,afterLazyLoad:false};})(jQuery,window,document);;
/*! Idle Timer - v1.1.0 - 2016-03-21
* https://github.com/thorst/jquery-idletimer
* Copyright (c) 2016 Paul Irish; Licensed MIT */
(function($){$.idleTimer=function(firstParam,elem){var opts;if(typeof firstParam==="object"){opts=firstParam;firstParam=null;}else if(typeof firstParam==="number"){opts={timeout:firstParam};firstParam=null;}
elem=elem||document;opts=$.extend({idle:false,timeout:30000,events:"mousemove keydown wheel DOMMouseScroll mousewheel mousedown touchstart touchmove MSPointerDown MSPointerMove"},opts);var jqElem=$(elem),obj=jqElem.data("idleTimerObj")||{},toggleIdleState=function(e){var obj=$.data(elem,"idleTimerObj")||{};obj.idle=!obj.idle;obj.olddate=+new Date();var event=$.Event((obj.idle?"idle":"active")+".idleTimer");$(elem).trigger(event,[elem,$.extend({},obj),e]);},handleEvent=function(e){var obj=$.data(elem,"idleTimerObj")||{};if(e.type==="storage"&&e.originalEvent.key!==obj.timerSyncId){return;}
if(obj.remaining!=null){return;}
if(e.type==="mousemove"){if(e.pageX===obj.pageX&&e.pageY===obj.pageY){return;}
if(typeof e.pageX==="undefined"&&typeof e.pageY==="undefined"){return;}
var elapsed=(+new Date())-obj.olddate;if(elapsed<200){return;}}
clearTimeout(obj.tId);if(obj.idle){toggleIdleState(e);}
obj.lastActive=+new Date();obj.pageX=e.pageX;obj.pageY=e.pageY;if(e.type!=="storage"&&obj.timerSyncId){if(typeof(localStorage)!=="undefined"){localStorage.setItem(obj.timerSyncId,obj.lastActive);}}
obj.tId=setTimeout(toggleIdleState,obj.timeout);},reset=function(){var obj=$.data(elem,"idleTimerObj")||{};obj.idle=obj.idleBackup;obj.olddate=+new Date();obj.lastActive=obj.olddate;obj.remaining=null;clearTimeout(obj.tId);if(!obj.idle){obj.tId=setTimeout(toggleIdleState,obj.timeout);}},pause=function(){var obj=$.data(elem,"idleTimerObj")||{};if(obj.remaining!=null){return;}
obj.remaining=obj.timeout-((+new Date())-obj.olddate);clearTimeout(obj.tId);},resume=function(){var obj=$.data(elem,"idleTimerObj")||{};if(obj.remaining==null){return;}
if(!obj.idle){obj.tId=setTimeout(toggleIdleState,obj.remaining);}
obj.remaining=null;},destroy=function(){var obj=$.data(elem,"idleTimerObj")||{};clearTimeout(obj.tId);jqElem.removeData("idleTimerObj");jqElem.off("._idleTimer");},remainingtime=function(){var obj=$.data(elem,"idleTimerObj")||{};if(obj.idle){return 0;}
if(obj.remaining!=null){return obj.remaining;}
var remaining=obj.timeout-((+new Date())-obj.lastActive);if(remaining<0){remaining=0;}
return remaining;};if(firstParam===null&&typeof obj.idle!=="undefined"){reset();return jqElem;}else if(firstParam===null){}else if(firstParam!==null&&typeof obj.idle==="undefined"){return false;}else if(firstParam==="destroy"){destroy();return jqElem;}else if(firstParam==="pause"){pause();return jqElem;}else if(firstParam==="resume"){resume();return jqElem;}else if(firstParam==="reset"){reset();return jqElem;}else if(firstParam==="getRemainingTime"){return remainingtime();}else if(firstParam==="getElapsedTime"){return(+new Date())-obj.olddate;}else if(firstParam==="getLastActiveTime"){return obj.lastActive;}else if(firstParam==="isIdle"){return obj.idle;}
jqElem.on($.trim((opts.events+" ").split(" ").join("._idleTimer ")),function(e){handleEvent(e);});if(opts.timerSyncId){$(window).bind("storage",handleEvent);}
obj=$.extend({},{olddate:+new Date(),lastActive:+new Date(),idle:opts.idle,idleBackup:opts.idle,timeout:opts.timeout,remaining:null,timerSyncId:opts.timerSyncId,tId:null,pageX:null,pageY:null});if(!obj.idle){obj.tId=setTimeout(toggleIdleState,obj.timeout);}
$.data(elem,"idleTimerObj",obj);return jqElem;};$.fn.idleTimer=function(firstParam){if(this[0]){return $.idleTimer(firstParam,this[0]);}
return this;};})(jQuery);;;window.Modernizr=function(a,b,c){function C(a){j.cssText=a}function D(a,b){return C(n.join(a+";")+(b||""))}function E(a,b){return typeof a===b}function F(a,b){return!!~(""+a).indexOf(b)}function G(a,b){for(var d in a){var e=a[d];if(!F(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function H(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:E(f,"function")?f.bind(d||b):f}return!1}function I(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+p.join(d+" ")+d).split(" ");return E(b,"string")||E(b,"undefined")?G(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),H(e,b,c))}function J(){e.input=function(c){for(var d=0,e=c.length;d<e;d++)u[c[d]]=c[d]in k;return u.list&&(u.list=!!b.createElement("datalist")&&!!a.HTMLDataListElement),u}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)k.setAttribute("type",f=a[d]),e=k.type!=="text",e&&(k.value=l,k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&k.style.WebkitAppearance!==c?(g.appendChild(k),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(k,null).WebkitAppearance!=="textfield"&&k.offsetHeight!==0,g.removeChild(k)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=k.checkValidity&&k.checkValidity()===!1:e=k.value!=l)),t[a[d]]=!!e;return t}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.8.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k=b.createElement("input"),l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={svg:"http://www.w3.org/2000/svg"},s={},t={},u={},v=[],w=v.slice,x,y=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},z=function(){function d(d,e){e=e||b.createElement(a[d]||"div"),d="on"+d;var f=d in e;return f||(e.setAttribute||(e=b.createElement("div")),e.setAttribute&&e.removeAttribute&&(e.setAttribute(d,""),f=E(e[d],"function"),E(e[d],"undefined")||(e[d]=c),e.removeAttribute(d))),e=null,f}var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return d}(),A={}.hasOwnProperty,B;!E(A,"undefined")&&!E(A.call,"undefined")?B=function(a,b){return A.call(a,b)}:B=function(a,b){return b in a&&E(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=w.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(w.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(w.call(arguments)))};return e}),s.flexbox=function(){return I("flexWrap")},s.canvas=function(){var a=b.createElement("canvas");return!!a.getContext&&!!a.getContext("2d")},s.canvastext=function(){return!!e.canvas&&!!E(b.createElement("canvas").getContext("2d").fillText,"function")},s.webgl=function(){return!!a.WebGLRenderingContext},s.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:y(["@media (",n.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},s.geolocation=function(){return"geolocation"in navigator},s.postmessage=function(){return!!a.postMessage},s.websqldatabase=function(){return!!a.openDatabase},s.indexedDB=function(){return!!I("indexedDB",a)},s.hashchange=function(){return z("hashchange",a)&&(b.documentMode===c||b.documentMode>7)},s.history=function(){return!!a.history&&!!history.pushState},s.draganddrop=function(){var a=b.createElement("div");return"draggable"in a||"ondragstart"in a&&"ondrop"in a},s.websockets=function(){return"WebSocket"in a||"MozWebSocket"in a},s.rgba=function(){return C("background-color:rgba(150,255,150,.5)"),F(j.backgroundColor,"rgba")},s.hsla=function(){return C("background-color:hsla(120,40%,100%,.5)"),F(j.backgroundColor,"rgba")||F(j.backgroundColor,"hsla")},s.multiplebgs=function(){return C("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(j.background)},s.backgroundsize=function(){return I("backgroundSize")},s.borderimage=function(){return I("borderImage")},s.borderradius=function(){return I("borderRadius")},s.boxshadow=function(){return I("boxShadow")},s.textshadow=function(){return b.createElement("div").style.textShadow===""},s.opacity=function(){return D("opacity:.55"),/^0.55$/.test(j.opacity)},s.cssanimations=function(){return I("animationName")},s.csscolumns=function(){return I("columnCount")},s.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return C((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),F(j.backgroundImage,"gradient")},s.cssreflections=function(){return I("boxReflect")},s.csstransforms=function(){return!!I("transform")},s.csstransforms3d=function(){var a=!!I("perspective");return a&&"webkitPerspective"in g.style&&y("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},s.csstransitions=function(){return I("transition")},s.fontface=function(){var a;return y('@font-face {font-family:"font";src:url("https://")}',function(c,d){var e=b.getElementById("smodernizr"),f=e.sheet||e.styleSheet,g=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"";a=/src/i.test(g)&&g.indexOf(d.split(" ")[0])===0}),a},s.generatedcontent=function(){var a;return y(["#",h,"{font:0/0 a}#",h,':after{content:"',l,'";visibility:hidden;font:3px/1 a}'].join(""),function(b){a=b.offsetHeight>=3}),a},s.video=function(){var a=b.createElement("video"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),c.h264=a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),c.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,"")}catch(d){}return c},s.audio=function(){var a=b.createElement("audio"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),c.mp3=a.canPlayType("audio/mpeg;").replace(/^no$/,""),c.wav=a.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),c.m4a=(a.canPlayType("audio/x-m4a;")||a.canPlayType("audio/aac;")).replace(/^no$/,"")}catch(d){}return c},s.localstorage=function(){try{return localStorage.setItem(h,h),localStorage.removeItem(h),!0}catch(a){return!1}},s.sessionstorage=function(){try{return sessionStorage.setItem(h,h),sessionStorage.removeItem(h),!0}catch(a){return!1}},s.webworkers=function(){return!!a.Worker},s.applicationcache=function(){return!!a.applicationCache},s.svg=function(){return!!b.createElementNS&&!!b.createElementNS(r.svg,"svg").createSVGRect},s.inlinesvg=function(){var a=b.createElement("div");return a.innerHTML="<svg/>",(a.firstChild&&a.firstChild.namespaceURI)==r.svg},s.smil=function(){return!!b.createElementNS&&/SVGAnimate/.test(m.call(b.createElementNS(r.svg,"animate")))},s.svgclippaths=function(){return!!b.createElementNS&&/SVGClipPath/.test(m.call(b.createElementNS(r.svg,"clipPath")))};for(var K in s)B(s,K)&&(x=K.toLowerCase(),e[x]=s[K](),v.push((e[x]?"":"no-")+x));return e.input||J(),e.addTest=function(a,b){if(typeof a=="object")for(var d in a)B(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},C(""),i=k=null,function(a,b){function l(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function m(){var a=s.elements;return typeof a=="string"?a.split(" "):a}function n(a){var b=j[a[h]];return b||(b={},i++,a[h]=i,j[i]=b),b}function o(a,c,d){c||(c=b);if(k)return c.createElement(a);d||(d=n(c));var g;return d.cache[a]?g=d.cache[a].cloneNode():f.test(a)?g=(d.cache[a]=d.createElem(a)).cloneNode():g=d.createElem(a),g.canHaveChildren&&!e.test(a)&&!g.tagUrn?d.frag.appendChild(g):g}function p(a,c){a||(a=b);if(k)return a.createDocumentFragment();c=c||n(a);var d=c.frag.cloneNode(),e=0,f=m(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function q(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return s.shivMethods?o(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(s,b.frag)}function r(a){a||(a=b);var c=n(a);return s.shivCSS&&!g&&!c.hasCSS&&(c.hasCSS=!!l(a,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),k||q(a,c),a}var c="3.7.0",d=a.html5||{},e=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g,h="_html5shiv",i=0,j={},k;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",g="hidden"in a,k=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){g=!0,k=!0}})();var s={elements:d.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:c,shivCSS:d.shivCSS!==!1,supportsUnknownElements:k,shivMethods:d.shivMethods!==!1,type:"default",shivDocument:r,createElement:o,createDocumentFragment:p};a.html5=s,r(b)}(this,b),e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.hasEvent=z,e.testProp=function(a){return G([a])},e.testAllProps=I,e.testStyles=y,e.prefixed=function(a,b,c){return b?I(a,b,c):I(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+v.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};