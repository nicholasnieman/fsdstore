//Frameless
function isLetter(s)
{
  return s.match("^[a-zA-Z]+$");    
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}



jQuery(document).ready(function() {
  
  (function ($){
    

/* ============ *  Bundled Product js * ============ */
var discount_txt;
var discount_description;
var basic_stayclean_price;
var total_price;
var installation_price;

$('body').find('.form-right .total_vall .sqft_gls, .doorbuilder .form-right .stay_clean_glass').hide();
$('body').find('#backNav').hide();
$('#kiosk_dummy').find('#selected_opt h3, #selected_opt h6').hide();

discount_txt = $('body').find('#door_txt').attr('data-re_atr');
discount_description = $('body').find('#door_description').attr('data-re_atr');
hide_discount = $('body').find('#door_button_dis').attr('data-re_atr');

var hold_data = [];
var product_config = [];
var glass_sqr_feet;
var glassoffer;

    /* ============ *  Glass SQFT * ============ */
    //$(".attribute-glass_sqft input.measurement").change(function(ev) {
    $("#measuremnet-val").click(function(ev) {
        ev.preventDefault();

        $('#kiosk_dummy').find('.ui-keyboard').hide(0);
        $('body').find('#backNav').show(0);
       // hold_data = [];
        product_config = [];
        //$('body').find('.doorbuilder .col-sm-8 #selected_opt ol.cd-breadcrumb').empty();
        $('body').find('#form_secarea .formLayout form .measurement_values').empty();
        $('body').find('#form_secarea .formLayout form .image_picker_selector').empty();
        $('body').find('#form_secarea .formLayout form .quote_sqft').empty();
        var test_qty;
        var attr_id = $(this).closest('.build-showerdoor').attr('id');
        $('#backNav').attr('current-data-show', attr_id);
        var shownextdiv  = $('body').find('#measuremnet-val').attr('data-rel');
        var currentdiv   = $('body').find('#measuremnet-val').attr('dat-cur-rel');
        var glasformula   = $('body').find('#glass_sqft_formula').text();
        var temp_data = {};
        var re_id = $(this).closest('.build-showerdoor').attr('id');
        temp_data = re_id;

        if ($.inArray('A', hold_data) == -1)
        {
            hold_data.push(temp_data);  
        }
        $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').empty();
        var len = hold_data.length;
        for (var i = 0; i < len; i++) {
            var stepcnt  = i+1;
            var show_keyname  = $('#'+hold_data[i]).find('a').attr('data-show_keyname');
            $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').append('<li><a href="#'+hold_data[i]+'" data-bread="'+hold_data[i]+'"> Step'+stepcnt+'<br/> '+show_keyname+'</a></li>');
        }
        $('#kiosk_dummy').find('#backNav').show();
        $('#kiosk_dummy').find('#selected_opt h3, #selected_opt h6').show();

        $('body').find('#form_secarea .formLayout form .measurement_values').find('.measurmnt_val').remove();
        $('input[type="text"][name="option-qty"]').each(function() {
            msureqtychk = false; 
            var val = $(this).val();
            var measurmnt_val = $(this).attr('data-rel');
            
            
            $('body').find('#form_secarea .formLayout form .measurement_values').append(' <input class="builderinput measurmnt_val" type="hidden" value=" Measurement '+ measurmnt_val +'-' +val+ '" name="builder[]"> ');

            if (val == "" || val == 0) {
                msureqtychk = false;
                test_qty = 1;
            } else {
                msureqtychk = true;
            }

        }).promise().done(function(){
            if(test_qty == 1 ){
                alert('Measurment quantity must be valid!');
                return false;
            }else{
                var abc = ['A','B','C','D','E','F','G','H','I','J','K','L'];
                var res = glasformula;
                var len = abc.length; 
                for (var i = 0; i < len; i++) {
                    var realval = ($('input[data-rel="' + abc[i] + '"]').val())/12;
                    var res = res.replace(abc[i], realval);
                    var res = res.replace(abc[i], realval);
                    var res = res.replace(abc[i], realval);
                    var res = res.replace(abc[i], realval);
                    var res = res.replace(abc[i], realval);
                    var res = res.replace(abc[i], realval);
                    var res = res.replace(abc[i], realval);
                    var res = res.replace(abc[i], realval);
                    var res = res.replace(abc[i], realval);
                    var res = res.replace(abc[i], realval);
                }                 
                glass_sqr_feet = eval(res);
                var priceString = eval(res).toFixed(1);
                $('body').find('#S #starburst h1 .glasssqft-options small').text(priceString);
                $('body').find('#form_secarea .formLayout form .quote_sqft').append('<input class="quote_input" type="hidden" value="' +priceString+ '" name="quote_sqft"> ');
                $('body').find('.form-right .total_vall .sqft_gls').show(0);
                $('body').find('.form-right .total_vall .sqft_gls ul li.galss_sqft_calci .option_head').text( 'Glass (SQFT)' );
                $('body').find('.form-right .total_vall .sqft_gls ul li.galss_sqft_calci .options_price').text(priceString + ' sqft');
                $('body').find('#form_secarea .formLayout form .measurement_values').find('.gls_sqft').remove();
                $('body').find('#form_secarea .formLayout form .measurement_values').append(' <input class="builderinput gls_sqft" type="hidden" value=" Glass (SQFT)- ' +priceString+ '" name="builder[]"> ');                 
                
                glassoffer = priceString * 5.75;
                glassoffer = glassoffer.toFixed(2);

                $('body').find('.doorbuilder .form-right .stay_clean_glass').show(0);
                $('body').find('.coating-price-defined').text( glassoffer);

                $('body').find('#form_secarea .formLayout form .measurement_values').find('.sqftclean').remove();
                $('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput sqftclean" type="hidden" value=" sqftclean- ' +glassoffer+ '" name="builder_0[]"> ');

                $('#'+ currentdiv).fadeOut();
                $('#'+ shownextdiv).fadeIn('slow'); 
            }
        });
    }); 

    /* ============ *  Glass Thickness related to Glass type * ============ */        
    $(".attribute-glass_thickness a").click(function(ev) {
        ev.preventDefault();  
        var glsthickness_val = $(this).text();
        var attr_id = $(this).closest('.build-showerdoor').attr('id');
        var shownextdiv  = $(this).attr('data-rel');
        var currentdiv   = $(this).attr('dat-cur-rel');

        $('.attribute-glass_type').find('.bundle-tild-sect li').hide();
        $('body').find('#glass_thknss_value').text(glsthickness_val);
        $('#backNav').attr('current-data-show', attr_id);
        $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
        $(this).parent('label').addClass('attribute-active');
        var data = {
            'action': 'rebundled_product',
            'data': glsthickness_val
        };
        $.post(ajax_object.ajax_url, data, function(response) {
            var obj = $.parseJSON(response);
            $.each(obj, function(sub_key, sub_value) {
                if(sub_value){
                $('.attribute-glass_type').find('.bundle-tild-sect li a').each(function() {
                    var textvalue = $.trim( $(this).text() );
                        if(textvalue == sub_value){
                            $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                        }
                    });
                }
            });
            $('#'+ currentdiv).fadeOut();
            $('#'+ shownextdiv).fadeIn('slow'); 
        });
    });


    /* ============ *  Glass type related to Hardwrfinish  * ============ */
    $(".attribute-glass_type a").click(function(ev) {
       ev.preventDefault();  
       var glsthckns_val = $('body').find('#glass_thknss_value').text();
       var attr_id = $(this).closest('.build-showerdoor').attr('id');
       var productid = $('body').find('.twoColbg').attr('id');

       $('.attribute-glass_hardwrfinish').find('.bundle-tild-sect li').hide();
       $(this).closest('.build-showerdoor').addClass('deep');
       $('#backNav').attr('current-data-show', attr_id);
       $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
       $(this).parent('label').addClass('attribute-active');

       var shownextdiv  = $(this).attr('data-rel');
       var currentdiv   = $(this).attr('dat-cur-rel');
       var data = {
           'action': 'rebundled_product_hardwrfinish',
           'glsthckns_val': glsthckns_val,
           'productid'    : productid,
       };
       $.post(ajax_object.ajax_url, data, function(responsee) {
            var objj = $.parseJSON(responsee);
             $.each(objj, function(sub_key, sub_value) {
                $('.attribute-glass_hardwrfinish').find('.bundle-tild-sect li a').each(function() {
                    var textvalue = $.trim( $(this).text() );
                    if(textvalue == sub_value){
                        $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                    }
                });
            });
            $('#'+ currentdiv).fadeOut();
            $('#'+ shownextdiv).fadeIn('slow'); 
      });
    });
   
        /* ============ *  Glass Hardwrfinish related to Hinges Style * ============ */
        $(".attribute-glass_hardwrfinish a").click(function(ev) {
            ev.preventDefault();  
            var hardwrfinish_val = $(this).text();
            var glsthckns_val = $('body').find('#glass_thknss_value').text();
            var productid = $('body').find('.twoColbg').attr('id');
            var attr_id = $(this).closest('.build-showerdoor').attr('id');
            var shownextdiv  = $(this).attr('data-rel');
            var currentdiv   = $(this).attr('dat-cur-rel');

            $('body').find('#hardwrfinish_val').text(hardwrfinish_val);
            $('.attribute-glass_hingestyle').find('.bundle-tild-sect li').hide();
            $(this).closest('.build-showerdoor').addClass('deep');
            $('#backNav').attr('current-data-show', attr_id);
            $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
            $(this).parent('label').addClass('attribute-active');
            
            var data = {
                'action': 'rebundled_product_hinge',
                'hardwrfinish_val': hardwrfinish_val,
                'glsthckns_val': glsthckns_val,
                'productid': productid,
            };
            $.post(ajax_object.ajax_url, data, function(responsee) {
                var objj = $.parseJSON(responsee);
                  $.each(objj, function(sub_key, sub_value) {
                    $('.attribute-glass_hingestyle').find('.bundle-tild-sect li a').each(function() {
                        var textvalue = $.trim( $(this).text() );
                        if(textvalue == sub_value){
                            $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                        }
                    });
                });
                $('#'+ currentdiv).fadeOut();
                $('#'+ shownextdiv).fadeIn('slow'); 
            });
        });

        /* ============ *  Pull knob related to Style * ============ */
        $("#knob-attribute-style, #knob-attribute-style_a").click(function(ev) {
            ev.preventDefault();
            var glsthckns_val = $('body').find('#glass_thknss_value').text();
            var hardwrfinish_val = $('body').find('#hardwrfinish_val').text();
            var hinges_val = $('#E').find('p.input_val').text();
            var productid = $('body').find('.twoColbg').attr('id');
            var shownextdiv  = $(this).attr('data-rel');
            var currentdiv   = $(this).attr('dat-cur-rel');
            var attr_id = $(this).closest('.build-showerdoor').attr('id');

            $('.attribute-knob_style').find('.bundle-tild-sect li').hide();
            $('#backNav').attr('current-data-show', attr_id);
            $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
            $(this).parent('label').addClass('attribute-active');
            
            var data = {
                'action'            : 'rebundled_product_knob',
                'glsthckns_val'     : glsthckns_val,
                'hardwrfinish_val'  : hardwrfinish_val,
                'hinges_val'        : hinges_val,
                'productid'         : productid, 
            };
            $.post(ajax_object.ajax_url, data, function(responsee) {
                var objj = $.parseJSON(responsee); 
                $.each(objj, function(sub_key, sub_value) {
                    if(sub_value){
                    $('.attribute-knob_style').find('.bundle-tild-sect li a').each(function() {
                        var textvalue = $.trim( $(this).text() );
                            if(textvalue == sub_value){
                                $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                                $(this).find('img').attr('src', sub_key);
                            }
                        });
                    }
                });
                $('#'+ currentdiv).fadeOut();
                $('#'+ shownextdiv).fadeIn('slow'); 
            });
        });


        /* ============ *  Pulltype handle related to Style * ============ */
        $(".attribute-handle_size a").click(function(ev) {
            ev.preventDefault();  
            var handle_size = $(this).text();
            var hardwrfinish_val = $('body').find('#hardwrfinish_val').text();
            var hinges_val = $('#E').find('p.input_val').text();
            var productid = $('body').find('.twoColbg').attr('id');
            var attr_id = $(this).closest('.build-showerdoor').attr('id');
            var shownextdiv  = $(this).attr('data-rel');
            var currentdiv   = $(this).attr('dat-cur-rel');
            
            $('.attribute-handle_style').find('.bundle-tild-sect li').hide();
            $('#backNav').attr('current-data-show', attr_id);
            $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
            $(this).parent('label').addClass('attribute-active');
            
            var data = {
                'action'            : 'rebundled_product_handle',
                'hardwrfinish_val'  : hardwrfinish_val,
                'hinges_val'        : hinges_val,
                'handle_size'       : handle_size,
                'productid'         : productid,
            };
            $.post(ajax_object.ajax_url, data, function(responsee) {
                var objj = $.parseJSON(responsee);
                $.each(objj, function(sub_key, sub_value) {
                    var subvalue = $.trim(sub_value);
                    if(subvalue){
                    $('.attribute-handle_style').find('.bundle-tild-sect li a').each(function() {
                        var textvalue = $.trim( $(this).text() );
                           if(textvalue == subvalue){
                                $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                                $(this).find('img').attr('src', sub_key);
                            }
                        });
                    }
                });
                $('#'+ currentdiv).fadeOut();
                $('#'+ shownextdiv).fadeIn('slow'); 
            });
        }); 


        /* ============ *  Pull Towelbar related to size * ============ */
        $("#J a").click(function(ev) {
          ev.preventDefault();  
          var combo_handle_size = $(this).text();
          var hardwrfinish_val = $('body').find('#hardwrfinish_val').text();
          var attr_id = $(this).closest('.build-showerdoor').attr('id');
          var productid = $('body').find('.twoColbg').attr('id');
          var shownextdiv  = $(this).attr('data-rel');
          var currentdiv   = $(this).attr('dat-cur-rel');

          $('#backNav').attr('current-data-show', attr_id);
          $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
          $(this).parent('label').addClass('attribute-active');
          $('#K').find('.bundle-tild-sect li').hide();

          var data = {
              'action'              : 'rebundled_combo_towelbar',
              'hardwrfinish_val'    :  hardwrfinish_val,
              'combo_handle_size'   :  combo_handle_size,
              'productid'           :  productid,
          };
          $.post(ajax_object.ajax_url, data, function(responsee) {
              var objj = $.parseJSON(responsee);
              $.each(objj, function(sub_key, sub_value) {
                  if(sub_value){
                  $('#K').find('.bundle-tild-sect li a').each(function() {
                      var textvalue = $.trim( $(this).text() );
                          if(textvalue == sub_value){
                              $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                          }
                      });
                  }
              });
              $('#'+ currentdiv).fadeOut();
              $('#'+ shownextdiv).fadeIn('slow'); 
          });
        });
    

        /* ============ *  Pull Towelbar related to style * ============ */
        $("#K a").click(function(ev) {
            ev.preventDefault();  

            var combo_towelbar_size = $(this).text();
            var hardwrfinish_val = $('body').find('#hardwrfinish_val').text();
            var combo_handle_size = $('body').find('#J').find('p.input_val').text();
            var productid = $('body').find('.twoColbg').attr('id');
            var attr_id = $(this).closest('.build-showerdoor').attr('id');
            var shownextdiv  = $(this).attr('data-rel');
            var currentdiv   = $(this).attr('dat-cur-rel');

            $('.attribute-towelbar_style').find('.bundle-tild-sect li').hide();
            $('#backNav').attr('current-data-show', attr_id);
            $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
            $(this).parent('label').addClass('attribute-active');

            var data = {
                'action'            : 'rebundled_product_towelbarstyle',
                'hardwrfinish_val'  :  hardwrfinish_val,
                'combo_towelbar_size'  :  combo_towelbar_size,
                'combo_handle_size'  :  combo_handle_size,
                'productid'  :  productid,
            };
            $.post(ajax_object.ajax_url, data, function(responsee) {
                var objj = $.parseJSON(responsee);
                $('.attribute-towelbar_style').find('.bundle-tild-sect li').hide();
                $.each(objj, function(sub_key, sub_value) {
                    if(sub_value){
                    $('.attribute-towelbar_style').find('.bundle-tild-sect li a').each(function() {
                        var textvalue = $.trim( $(this).text() );
                            if(textvalue == sub_value){
                                $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                                $(this).find('img').attr('src', sub_key);
                            }
                        });
                    }
                });
                $('#'+ currentdiv).fadeOut();
                $('#'+ shownextdiv).fadeIn('slow'); 
            });
        });
  
        /* ============ *  Towelbar related to size if(YES) * ============ */
        $("a.yes_towelbar_attr").click(function(ev) {
          ev.preventDefault();  
          var hardwrfinish_val = $('body').find('#hardwrfinish_val').text();
          var attr_id = $(this).closest('.build-showerdoor').attr('id');
          var shownextdiv  = $(this).attr('data-rel');
          var currentdiv   = $(this).attr('dat-cur-rel');
          var productid = $('body').find('.twoColbg').attr('id');

          $('#backNav').attr('current-data-show', attr_id);
          $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
          $(this).parent('label').addClass('attribute-active');
          $('#0').find('.bundle-tild-sect li').hide();
          var data = {
              'action'              : 'rebundled_towelbarsize',
              'hardwrfinish_val'    :  hardwrfinish_val,
              'productid'           :  productid,
          };
          $.post(ajax_object.ajax_url, data, function(responsee) {
              var objj = $.parseJSON(responsee);
              $.each(objj, function(sub_key, sub_value) {
                  if(sub_value){
                  $('#0').find('.bundle-tild-sect li a').each(function() {
                      var textvalue = $.trim( $(this).text() );
                          if(textvalue == sub_value){
                              $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                          }
                      });
                  }
              });
              $('#'+ currentdiv).fadeOut();
              $('#'+ shownextdiv).fadeIn('slow'); 
          });
        });

        /* ============ *  Towelbar Sides related to size if(YES) * ============ */
        $("#0 a").click(function(ev) {
          ev.preventDefault();  

          var towelbar_size = $(this).text();
          var hardwrfinish_val = $('body').find('#hardwrfinish_val').text();
          var attr_id = $(this).closest('.build-showerdoor').attr('id');
          var productid = $('body').find('.twoColbg').attr('id');
          var shownextdiv  = $(this).attr('data-rel');
          var currentdiv   = $(this).attr('dat-cur-rel');
          
          $('#backNav').attr('current-data-show', attr_id);
          $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
          $(this).parent('label').addClass('attribute-active');
          $('#P').find('.bundle-tild-sect li').hide();

          var data = {
              'action'              : 'rebundled_towelbarside',
              'hardwrfinish_val'    :  hardwrfinish_val,
              'towelbar_size'       :  towelbar_size,
              'productid'           :  productid,
          };

          $.post(ajax_object.ajax_url, data, function(responsee) {
              var objj = $.parseJSON(responsee);
              $.each(objj, function(sub_key, sub_value) {
                  if(sub_value){
                    $('#P').find('.bundle-tild-sect li a').each(function() {
                      var textvalue = $.trim( $(this).text() );
                        if(textvalue == sub_value){
                          $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                        }
                    });
                  }
              });
              $('#'+ currentdiv).fadeOut();
              $('#'+ shownextdiv).fadeIn('slow'); 
          });
        });


        /* ============ *  Pull Combo Towelbar related to style * ============ */
        $(".attribute-handle-combo-towelbar_side").click(function(ev) {
            ev.preventDefault();  

            var towelbar_size = $('body').find('.attribute-handle-combo-towelbar_size').find('p.input_val').text();
            var towelbar_side = $('body').find('.attribute-handle-combo-towelbar_side').find('p.input_val').text();
            var hardwrfinish_val = $('body').find('#hardwrfinish_val').text();
            var productid = $('body').find('.twoColbg').attr('id');
            var attr_id = $(this).closest('.build-showerdoor').attr('id');
            var shownextdiv  = $(this).attr('data-rel');
            var currentdiv   = $(this).attr('dat-cur-rel');
            
            $('.attribute-handle-combo-towelbar_style').find('.bundle-tild-sect li').hide();
            $('#backNav').attr('current-data-show', attr_id);
            $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
            $(this).parent('label').addClass('attribute-active');

            var data = {
                'action'            : 'rebundled_product_combo',
                'hardwrfinish_val'  :  hardwrfinish_val,
                'towelbar_size'     :  towelbar_size,
                'towelbar_side'     :  towelbar_side,
                'productid'         :  productid,
            };
            $.post(ajax_object.ajax_url, data, function(responsee) {
              var objj = $.parseJSON(responsee);
                $.each(objj, function(sub_key, sub_value) {
                  if(sub_value){
                    $('.attribute-handle-combo-towelbar_style').find('.bundle-tild-sect li a').each(function() {
                      var textvalue = $.trim( $(this).text() );
                      if(textvalue == sub_value){
                          $(this).parent().parent().addClass('active-tild-sect').fadeIn();
                          $(this).find('img').attr('src', sub_key);
                      }
                    });
                  }
                });
                $('#'+ currentdiv).fadeOut();
                $('#'+ shownextdiv).fadeIn('slow'); 
            });
        });

        $(".attribute-glass_pulltype a").click(function(ev) {
            ev.preventDefault();
            $('body').find('.atribut-pull_style p.input_val').text('');
            $('body').find('.atribut-pull_style p.input_val').attr('data-show_keypara','');
        });

        $("#N a").click(function(ev) {
            ev.preventDefault();
            $('body').find('.attribute-glass_combo p.input_val').text('');
            $('body').find('.attribute-glass_combo p.input_val').attr('data-show_keypara','');
        });
        
    /* ============ *  Hide Show * ============ */
        $(".atribut-gls_h a, .atribut-pull_h a ").click(function(ev) {
            var bread_id = $(this).attr('dat-cur-rel');
            if(bread_id == 'B'){
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'C';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'D';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'E';
                });
            }
            if(bread_id == 'C'){
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'D';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'E';
                });
            }
            if(bread_id == 'D'){
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'E';
                });
            }
            if(bread_id == 'G'){
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'H';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'I';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'J';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'K';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'L';
                });
            }

            if(bread_id == 'H'){
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'G';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'I';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'J';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'K';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'L';
                });
            }

            if(bread_id == 'J'){
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'G';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'H';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'I';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'K';
                });
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'L';
                });
            }

            var bread_title = $(this).attr('title').trim();
            if(bread_title == 'No'){
                
                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'O';
                });

                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'P';
                });

                hold_data = jQuery.grep(hold_data, function(value) {
                    return value != 'Q';
                });
            }

            var dataspecid = $(this).attr('data-rel-last');
            if(dataspecid){
                $('#backNav').attr('last-data-show', dataspecid);
            }
            var selected_val  = $(this).text();
            var re_keyname  = $(this).attr('data-re_keyname');
            var show_keyname  = $(this).attr('data-show_keyname');
            /*Check if selected value is door height*/
            if(selected_val == '54" to 59 1/2"'){
              selected_val = '54';
            }

            /*Stack For next and back buttons*/
            var temp_data = {};
            var re_idd = $(this).closest('.build-showerdoor').attr('id');
            temp_data = re_idd;

            var idx = $.inArray(re_idd, hold_data);
            if (idx == -1) {
              hold_data.push(temp_data);
            }
            hold_data = hold_data.sort();
            /*Reset Html of breadcrumb*/
            $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').empty();
            var len = hold_data.length;
            for (var i = 0; i < len; i++) {
                var stepcnt  = i+1;
                var show_keynam  = $('#'+hold_data[i]).find('a').attr('data-show_keyname');
                $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').append('<li><a href="#'+hold_data[i]+'" data-bread="'+hold_data[i]+'"> Step'+stepcnt+'<br/> ' +show_keynam+'</a></li>');
            }
            
            /*Insert selected value in hidden field*/
            var re_id = '#'+ $(this).closest('.build-showerdoor').attr('id');
            $(re_id).find('p').remove();
            $(re_id).append('<p class="input_val" data-re_keyname="'+ re_keyname+'" data-show_keypara="'+ show_keyname +'">' + selected_val + '</p>');
            
            /*Adding Active class*/
            var attr_id = $(this).closest('.build-showerdoor').attr('id');
            $('#backNav').attr('current-data-show', attr_id);
            $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
            $(this).parent('label').addClass('attribute-active');
            
            /*Hide/show of clicked attribute html*/
            var shownextdiv  = $(this).attr('data-rel');
            var currentdiv   = $(this).attr('dat-cur-rel');
            $('#'+ currentdiv).fadeOut();
            $('#'+ shownextdiv).fadeIn('slow');
        });


        $('#selected_opt a').live("click", function(ev){
            ev.preventDefault();
            $('body').find('.doorbuilder .form-right .stay_clean_glass').show(0);
            var element_id = $(this).attr('href');
            var el_data = $(this).attr('data-bread');
            if(el_data == 'A'){
              $('body').find('#backNav').hide(0);
            }else{
                $('body').find('#backNav').show(0);
            }
            $('body').find('.build-showerdoor').fadeOut();
            $(element_id).fadeIn('slow');

            $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').empty();
            hold_data = hold_data.sort();
            var len = hold_data.length;
            for (var i = 0; i < len; i++) {
                /*Remove value from array*/
                if(el_data == hold_data[i]){
                    for (var j = i+1; j <= len; j++) {
                        //hold_data.splice(i+1, 1);
                    }   
                }
                /*Reset Html of breadcrumb*/
                if( hold_data[i] != null ){
                    var stepcnt  = i+1;
                    var show_keyname  = $('#'+hold_data[i]).find('a').attr('data-show_keyname');
                    if(el_data == hold_data[i]){
                        activecls = 'class= "active-bread"';
                    }else{
                        activecls = '';
                    }
                    $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').append('<li><a href="#'+hold_data[i]+'" '+activecls+' data-bread="'+hold_data[i]+'"> Step'+stepcnt+'<br/> '+show_keyname+'</a></li>');
                }
            }

            hold_data = hold_data.sort();
        });

    /* ============ *  Hide Show * ============ */
        $(".atribut-pull_h.maincat a").click(function(ev) {
        ev.preventDefault();
            var attr_id = $(this).closest('.build-showerdoor').attr('id');
            $('#backNav').attr('current-data-show', attr_id);
            $(this).closest('.build-showerdoor').find('label').removeClass('attribute-active');
            $(this).parent('label').addClass('attribute-active');
            $('.atribut-pull_h').find('.build-sub-showerdoors').hide(0);
            var shownextdiv  = $(this).attr('data-rel');
            var currentdiv   = $(this).attr('dat-cur-rel');
            $('#'+ currentdiv).fadeOut();
            $('#'+ shownextdiv).fadeIn('slow'); 
        });

    /* ============ *  Back Sdata-spec-idhow * ============ */
        $("#backNav").click(function(ev) {
            ev.preventDefault();
            var current_show = $(this).attr('current-data-show');
            var arr_lan = hold_data.length;
             if (hold_data.length != 0) {
                var lastEl = hold_data.slice(-1)[0];
                $('body').find('.build-showerdoor').fadeOut();
                if(lastEl == 'A'){
                  $('body').find('#backNav').hide(0);
                }
                $('#' +lastEl).fadeIn('slow');
                hold_data.pop();

                /*Reset Html of breadcrumb*/
                $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').empty();
                var len = hold_data.length;
                for (var i = 0; i < len; i++) {
                    var stepcnt  = i+1;
                    var show_keyname  = $('#'+hold_data[i]).find('a').attr('data-show_keyname');
                    $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').append('<li><a href="#'+hold_data[i]+'" data-bread="'+hold_data[i]+'"> Step'+stepcnt+'<br/> '+show_keyname+'</a></li>');
                }
            }
            
        });

    /* ============ *  Next Show * ============ */
        $("#nextNav").click(function(ev) {
            ev.preventDefault();
        });


    /* ============ *  Hover Glass Installation * ============ */
        $(".attribute-glass_installation a").hover(function(e){
            e.preventDefault();
            var me_productid = $(this).attr('data_installation'); 
            $(".hide-tild-sect").fadeOut();           
            $(".attribute-glass_installation").find('#'+me_productid).fadeIn('slow');
        },function(){
            var tabid = $(this).attr('data_installation');
            $(".attribute-glass_installation").find('#'+tabid).fadeOut();
        });


    /* ============ *  Offer Popup * ============ */
        $(".attribute-glass_type").click(function(ev) {
            ev.preventDefault();

            setTimeout(function(){
                $('.get_modal').bPopup({modalClose: false,opacity: 0.5, positionStyle: 'fixed'});
                 $('body').find('#get_modal').fadeIn();
                 $('.b-modal, __b-popup1__').fadeIn();
            },1000);
        });


        function close_minicart(){                      
          $('.get_modal').attr('class','');
          $('#get_modal').hide(0);
          $('.blanket').fadeOut();
          $('.b-modal, __b-popup1__').fadeOut();
        }

        $('.stay_clean_glass span label').click(function(event) {
            $('.stay_clean_glass span label').removeClass('active-label');
            $(this).addClass('active-label');

          if($(this).text() == 'Yes'){
            $(".form-right .stay_clean_glass center span:first-child label").addClass('active-label');
            $('body').find('#stayclean_option, #option_stayclean').remove();
            $('body').find('#S #starburst h1').find('.offer-options').remove();
            $('body').find('#S #starburst h1').append('<span class="offer-options hide-tild-sect"> Price <small>Yes</small></span>');
            $('body').find('#form_secarea .formLayout form .measurement_values')
            .append(' <input class="builderinput" type="hidden" value=" Stayclean Option- Yes" id="option_stayclean" name="builder[]"> ');

            $('body').find('#form_secarea .formLayout form .measurement_values')
            .append(' <input class="builderinput" type="hidden" value="Yes" name="stayclean_option" id="stayclean_option"> ');

            $('body').find('.form-right .total_vall .sqft_gls .data-stayclean, .form-right .total_vall .sqft_gls .data-stayclean-opt').remove();
            $('body').find('.form-right .total_vall .sqft_gls ul').append('<li class="data-stayclean-opt deepu"><span class="option_head">StayClean</span><span class="options_price">Yes</span></li>');
            $('body').find('.form-right .total_vall .sqft_gls ul').append('<li class="data-stayclean deeputest"><span class="option_head">StayClean Price</span><span class="options_price">' + glassoffer  + '</span></li>');

            close_minicart();
            $('.calci-dist .dist-stayclean-sec').show(0);
          }
          else{
            $(".form-right .stay_clean_glass center span:last-child label").addClass('active-label');
            $('body').find('#S #starburst h1').find('.offer-options').remove();
            $('body').find('#S #starburst h1').append('<span class="offer-options hide-tild-sect"> Price <small>No</small></span>');
            $('body').find('#form_secarea .formLayout form .measurement_values')
            .append(' <input class="builderinput" type="hidden" value=" Stayclean Option- No" id="option_stayclean" name="builder[]"> ');

            $('body').find('#form_secarea .formLayout form .measurement_values')
            .append(' <input class="builderinput" type="hidden" value="No" name="stayclean_option" id="stayclean_option"> ');

            $('body').find('.form-right .total_vall .sqft_gls .data-stayclean, .form-right .total_vall .sqft_gls .data-stayclean-opt').remove();
            $('body').find('.form-right .total_vall .sqft_gls ul').append('<li class="data-stayclean-opt deepu"><span class="option_head">StayClean</span><span class="options_price">No</span></li>');
            $('body').find('.form-right .total_vall .sqft_gls ul').append('<li class="data-stayclean deeputest"><span class="option_head">StayClean Price</span><span class="options_price">' + glassoffer  + '</span></li>');


            $('.calci-dist .dist-stayclean-sec').hide(0);
            close_minicart();
          }
        });

    /* ============ *  Offer Popup * ============ */

    /* ============ *  Return Total Value selected for bundled product * ============ */    



        $(".field-_attribute_tag").click(function(ev) {


            var cattid =  $(this).attr('data-re_attr');
            var productid = $('body').find('.twoColbg').attr('id');
            $('body').find('.form-right .total_vall .price_info_gls ul').empty();
            if(cattid){
                $('.build-showerdoor').find('.input_val').each(function() {
                    var total_area = $.trim($(this).text());
                    var re_keyname  = $(this).attr('data-re_keyname');
                    var show_keyname  = $(this).attr('data-show_keypara');
                    if(show_keyname && total_area){
                        $('body').find('.form-right .total_vall .price_info_gls ul').append('<li data-re_keyname="'+ re_keyname +'" data-re_productid = "'+ productid +'" data-ky_attr = "'+ cattid +'" ><span class="option_head">'+ show_keyname +'</span><span class="options_price">' + total_area  + '</span></li>');                        
                    }
                    
                });
            }
            else{
                $('.build-showerdoor').find('.input_val').each(function() {
                    var total_area = $.trim($(this).text());
                    var re_keyname  = $(this).attr('data-re_keyname');
                    var show_keyname  = $(this).attr('data-show_keypara');
                    if(show_keyname && total_area){
                        $('body').find('.form-right .total_vall .price_info_gls ul').append('<li data-re_keyname="'+ re_keyname +'" data-re_productid = "'+ productid +'"><span class="option_head">'+ show_keyname +'</span><span class="options_price">' + total_area  + '</span></li>');                
                    }
                    
                });
              return false;
            }
            var bundledagain = [];
            
            $('body').find('.form-right .total_vall .price_info_gls ul li').each(function() {
                var temp_bundled = {};
                var total_area = $(this).find(' .options_price').text();
                var re_keyname  = $(this).attr('data-re_keyname');
                var re_productid  = $(this).attr('data-re_productid');
                var re_cattid  = $(this).attr('data-ky_attr');
                temp_bundled.total_area = total_area;
                temp_bundled.re_keyname = re_keyname;
                temp_bundled.re_productid = re_productid;
                temp_bundled.re_cattid = re_cattid;
                bundledagain.push(temp_bundled);
            }).promise().done(function(){

                var bundledagainJson = JSON.stringify(bundledagain);
                var data = {
                    'action': 'rebundled_glass_price',
                    'data': bundledagainJson
                };

               $.post(ajax_object.ajax_url, data, function(response) {

                    var objj = $.parseJSON(response);
                    var temp_config = {};
                    temp_config.objj = objj;
                    product_config.push(temp_config);

                  $.each(objj, function(sub_key, sub_value) {
                    if( sub_key =='glass'){
                        $('body').find('#form_secarea .formLayout form .quote_glass').empty();
                        $('body').find('#S #starburst h1 .glass-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                          if(sub_keyyy == 'sku') {
                            $('body').find('#S #starburst h1').append('<span class="glass-options hide-tild-sect sku">  Glass <small>' + sub_valll + '</small></span>');
                            $('body').find('#form_secarea .formLayout form .quote_glass').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="glass_sku[]"> ');
                          }
                          else if(sub_keyyy == 'price'){
                            $('body').find('#S #starburst h1').append('<span class="glass-options hide-tild-sect price_glass"> Glass Price <small>' + sub_valll + '</small></span>');
                            $('body').find('#form_secarea .formLayout form .quote_glass').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="glass_price[]"> ');
                          }


                        });
                      });
                    }
                    else if( sub_key =='hinge'){
                        $('body').find('#form_secarea .formLayout form .quote_hinge').empty();
                      $('body').find('#S #starburst h1 .hinge-options').text('');
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                                $('body').find('#S #starburst h1').append('<span class="hinge-options hide-tild-sect sku">  hinge <small>' + sub_valll + '</small></span>');
                                $('body').find('#form_secarea .formLayout form .quote_hinge').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="hinge_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                                $('body').find('#S #starburst h1').append('<span class="hinge-options hide-tild-sect price"> Hinge Price <small>' + sub_valll + '</small></span>');
                                $('body').find('#form_secarea .formLayout form .quote_hinge').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="hinge_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='knob'){
                        $('body').find('#form_secarea .formLayout form .quote_knob').empty();
                        $('body').find('#form_secarea .formLayout form .knob').empty();
                      $('body').find('#S #starburst h1 .pull-attribute-options.sku small').empty();
                      $('body').find('#S #starburst h1 .pull-attribute-options.price small').empty();
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                               $('body').find('#S #starburst h1').append('<span class="pull-attribute-options knob-options hide-tild-sect sku">  Knob <small>' + sub_valll + '</small></span>');
                               $('body').find('#form_secarea .formLayout form .quote_knob').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="knob_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                               $('body').find('#S #starburst h1').append('<span class="pull-attribute-options knob-options hide-tild-sect price"> Knob Price <small>' + sub_valll + '</small></span>');
                               $('body').find('#form_secarea .formLayout form .quote_knob').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="knob_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='handle'){
                        $('body').find('#form_secarea .formLayout form .quote_handle').empty();
                      $('body').find('#S #starburst h1 .pull-attribute-options.sku small').empty();
                      $('body').find('#S #starburst h1 .pull-attribute-options.price small').empty();
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                              $('body').find('#S #starburst h1').append('<span class="pull-attribute-options handle-options hide-tild-sect sku">  Handle <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_handle').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="handle_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                              $('body').find('#S #starburst h1').append('<span class="pull-attribute-options handle-options hide-tild-sect price"> Handle Price <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_handle').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="handle_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='handle-towelbar-combo'){
                        $('body').find('#form_secarea .formLayout form .quote_htc').empty();
                      $('body').find('#S #starburst h1 .pull-attribute-options.sku small').empty();
                      $('body').find('#S #starburst h1 .pull-attribute-options.price small').empty();
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                              $('body').find('#S #starburst h1').append('<span class="pull-attribute-options handle-towelbar-options hide-tild-sect sku">  Towelbar <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_htc').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="handle_towelbar_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                              $('body').find('#S #starburst h1').append('<span class="pull-attribute-options handle-towelbar-options hide-tild-sect price"> Towelbar Price <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_htc').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="handle_towelbar_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='towelbar'){
                        $('body').find('#form_secarea .formLayout form .quote_towelbar').empty();
                      $('body').find('#S #starburst h1 .towelbar-options').text('');
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                              $('body').find('#S #starburst h1').append('<span class="towelbar-options hide-tild-sect sku">  Towelbar <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_towelbar').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="towelbar_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                              $('body').find('#S #starburst h1').append('<span class="towelbar-options hide-tild-sect price"> Towelbar Price <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_towelbar').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="towelbar_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='standard-door'){
                        $('body').find('#form_secarea .formLayout form .quote_standarddoor').empty();
                      $('body').find('#S #starburst h1 .standard-door-options').text('');
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                              $('body').find('#S #starburst h1').append('<span class="standard-door-options hide-tild-sect sku">  Standard-door <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_standarddoor').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="standard_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                              $('body').find('#S #starburst h1').append('<span class="standard-door-options hide-tild-sect price"> Standard-door Price <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_standarddoor').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="standard_price[]"> ');
                            }
                        });
                      });
                    }

                  });
               });
               
            });
        });    

    var gls_popup;
    var glasoffer;
    var unique_id;

    /* ============ *  Total Combo Handle Towelbar pull Value selected for bundled product * ============ */    
    $("#R a").click(function(ev) {
        $('body').find('.doorbuilder .form-right .stay_clean_glass').hide(0);
        $('#R').hide(0);
        var productid = $('body').find('.twoColbg').attr('id');
        $('body').find('.form-right .total_vall .price_info_gls ul').empty();
        $('body').find('#S #starburst h1 .installation-attribute-options').text('');

        $('body').find('#appr-disct').addClass('hide-tild-sect');
        $('#starburst .calci-dist .custom-input-group #no-stayclean-dis').addClass('hide-tild-sect');
        $('body').find('#final-stayclean-dis').addClass('hide-tild-sect');

        $('.build-showerdoor').find('.input_val').each(function() {
            var total_area = $.trim($(this).text());
            var re_keyname  = $(this).attr('data-re_keyname');
            var show_keyname  = $(this).attr('data-show_keypara');
            if(show_keyname && total_area){
                $('body').find('.form-right .total_vall .price_info_gls ul').append('<li data-re_keyname="'+ re_keyname +'" data-re_productid = "'+ productid +'" > <span class="option_head">'+ show_keyname +'</span><span class="options_price">' + total_area  + '</span></li>');    
            }
        });

        var bundledagain = [];
        $('body').find('#priceItem').show(0);

        $('body').find('.form-right .total_vall .price_info_gls ul li').each(function() {
            var temp_bundled = {};
            var total_area = $(this).find('.options_price').text();
            var re_keyname  = $(this).attr('data-re_keyname');
            var re_productid  = $(this).attr('data-re_productid');
            temp_bundled.total_area = total_area;
            temp_bundled.re_keyname = re_keyname;
            temp_bundled.re_productid = re_productid;
            bundledagain.push(temp_bundled);
        }).promise().done(function(){
            var bundledagainJson = JSON.stringify(bundledagain);
            var data = {
                'action': 'rebundled_installation_price',
                'data': bundledagainJson
            };
           
            $.post(ajax_object.ajax_url, data, function(response) {
                var objj = $.parseJSON(response);
                var temp_installtn = {};
                temp_installtn.objj = objj;
                product_config.push(temp_installtn);

                $.each(objj, function(sub_key, sub_value) {

                    if(sub_key == 'installation'){
                    $('body').find('#form_secarea .formLayout form .quote_installation').empty();
                    $('body').find('#S #starburst h1 .installation-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) {

                            if(sub_keyy == 'sku'){
                                $('body').find('#S #starburst h1').append('<span class="installation-options hide-tild-sect sku"> Installation SKU <small>' + sub_vall + '</small></span>');
                                $('body').find('#form_secarea .formLayout form .quote_installation').append('<input class="quote_input" type="hidden" value="' +sub_vall+ '" name="installation_sku[]"> ');
                            }
                            else if(sub_keyy == 'price'){
                                $('body').find('#S #starburst h1').append('<span class="installation-options hide-tild-sect installation_price"> Installation Price <small>' + sub_vall + '</small></span>');
                                $('body').find('#form_secarea .formLayout form .quote_installation').append('<input class="quote_input" type="hidden" value="' +sub_vall+ '" name="installation_price[]"> ');
                            }

                        });
                    }

                    if(sub_key == 'clamp'){
                        $('body').find('#form_secarea .formLayout form .quote_clamp').empty();
                        $('body').find('#S #starburst h1 .clamp-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) {
                            $.each(sub_vall, function(sub_keyyy, sub_valll) {

                                if(sub_keyyy == 'sku') {
                                    $('body').find('#S #starburst h1').append('<span class="clamp-options hide-tild-sect sku"> Clamp SKU <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_clamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="clamp_sku[]"> ');
                                }
                                else if(sub_keyyy == 'price'){
                                    $('body').find('#S #starburst h1').append('<span class="clamp-options hide-tild-sect price"> Clamp Price <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_clamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="clamp_price[]"> ');
                                }

                            });
                        });
                    }

                    if(sub_key == 'header'){
                        $('body').find('#form_secarea .formLayout form .quote_header').empty();
                        $('body').find('#S #starburst h1 .header-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) { //alert(sub_vall);
                            $.each(sub_vall, function(sub_keyyy, sub_valll) {

                                if(sub_keyyy == 'sku') {
                                    $('body').find('#S #starburst h1').append('<span class="header-options hide-tild-sect sku"> header SKU <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_header').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="header_sku[]"> ');
                                }
                                else if(sub_keyyy == 'price'){
                                    $('body').find('#S #starburst h1').append('<span class="header-options hide-tild-sect price"> header Price <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_header').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="header_price[]"> ');
                                }

                            });
                        });
                    }

                    if(sub_key == 'basic'){
                        $('body').find('#form_secarea .formLayout form .quote_basic').empty();
                        $('body').find('#S #starburst h1 .basic-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) {
                            $.each(sub_vall, function(sub_keyyy, sub_valll) {

                                if(sub_keyyy == 'sku') {
                                    $('body').find('#S #starburst h1').append('<span class="basic-options hide-tild-sect sku"> basic SKU <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_basic').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="basic_sku[]"> ');
                                }
                                else if(sub_keyyy == 'price'){
                                    $('body').find('#S #starburst h1').append('<span class="basic-options hide-tild-sect price"> basic Price <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_basic').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="basic_price[]"> ');
                                }

                            });
                        });
                    }

                    if(sub_key == 'door-part'){
                        $('body').find('#form_secarea .formLayout form .quote_doorpart').empty();
                        $('body').find('#S #starburst h1 .door-part-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) {
                            $.each(sub_vall, function(sub_keyyy, sub_valll) {

                            if(sub_keyyy == 'sku') {
                                $('body').find('#S #starburst h1').append('<span class="door-part-options hide-tild-sect sku"> Door Part SKU <small>' + sub_valll + '</small></span>');
                                $('body').find('#form_secarea .formLayout form .quote_doorpart').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="door_part_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                                $('body').find('#S #starburst h1').append('<span class="door-part-options hide-tild-sect price"> Door Part Price <small>' + sub_valll + '</small></span>');
                                $('body').find('#form_secarea .formLayout form .quote_doorpart').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="door_part_price[]"> ');
                            }

                            });
                        });
                    }

                    if(sub_key == 'shelf-clamp'){
                        $('body').find('#form_secarea .formLayout form .quote_shelfclamp').empty();
                        $('body').find('#S #starburst h1 .shelf-clamp-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) {
                            $.each(sub_vall, function(sub_keyyy, sub_valll) {

                                if(sub_keyyy == 'sku') {
                                    $('body').find('#S #starburst h1').append('<span class="shelf-clamp-options hide-tild-sect sku"> Shelf Clamp SKU <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_shelfclamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="shelf_clamp_sku[]"> ');
                                }
                                else if(sub_keyyy == 'price'){
                                    $('body').find('#S #starburst h1').append('<span class="shelf-clamp-options hide-tild-sect price"> Shelf Clamp Price <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_shelfclamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="shelf_clamp_price[]"> ');
                                }

                            });
                        });
                    }

                    if(sub_key == 'sleeve-over-clamp'){
                        $('body').find('#form_secarea .formLayout form .quote_sleevoverclamp').empty();
                        $('body').find('#S #starburst h1 .sleeve-over-clamp-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) {
                            $.each(sub_vall, function(sub_keyyy, sub_valll) {
                                if(sub_keyyy == 'sku') {
                                    $('body').find('#S #starburst h1').append('<span class="sleeve-over-clamp-options hide-tild-sect sku"> Sleeve Over Clamp SKU <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_sleevoverclamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="sleevover_clamp_sku[]"> ');
                                }
                                else if(sub_keyyy == 'price'){
                                    $('body').find('#S #starburst h1').append('<span class="sleeve-over-clamp-options hide-tild-sect price"> Sleeve Over Clamp Price <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_sleevoverclamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="sleevover_clamp_price[]"> ');
                                }
                            });
                        });
                    }

                    if(sub_key == 'u-channel'){
                        $('body').find('#form_secarea .formLayout form .quote_uchannel').empty();
                        $('body').find('#S #starburst h1 .u-channel-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) {
                            $.each(sub_vall, function(sub_keyyy, sub_valll) {
                                if(sub_keyyy == 'sku') {
                                    $('body').find('#S #starburst h1').append('<span class="u-channel-options hide-tild-sect sku"> U channel SKU <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .uchannel').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="uchannel_sku[]"> ');
                                }
                                else if(sub_keyyy == 'price'){
                                    $('body').find('#S #starburst h1').append('<span class="u-channel-options hide-tild-sect price"> U channel Price <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .uchannel').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="uchannel_price[]"> ');
                                }
                            });
                        });
                    }
                });

                /*Calculate Total Price*/
                var glassqft        =   $('body').find('#S #starburst h1 span.glasssqft-options small').text();
                glasoffer           =   $('body').find('#S #starburst h1 span.offer-options small').text();
                $('body').find('#S #starburst #form_secarea #sqftinput').val( glassqft ); /*Just Showing values in form*/
                if(glasoffer == 'Yes'){
                   var glassoffer =  (glassqft * 5.75);
                   glassoffer = Math.round(glassoffer);
                   $('body').find('#S #starburst #form_secarea #sqftclean').val( (glassqft * 5.75).toFixed(2) ); /*Just Showing values in form*/
                }
                var glassoption     =   $('body').find('#S #starburst h1 span.price_glass small').text();
                var add = 0; 
                $('body').find('#S #starburst h1 span.price').each(function() {
                    var pricevalue   =  $(this).find('small').text();
                    add += Number(pricevalue);
                });
                var other_price = add;
                
                other_price         =   Math.round(other_price);
                console.log(other_price+'other_price');

                var twlbar_f = $('body').find('#S #starburst h1 .towelbar-options.price small').text();
                var twlbar_opt = $('body').find('#N .input_val').text();
                twlbar_opt = twlbar_opt.trim();
                if(twlbar_opt == 'No' && twlbar_f){
                    other_price = other_price - Number(twlbar_f);
                }
                console.log(twlbar_f + ': ' + twlbar_opt);    
                console.log(other_price+'after other_price');

                
                var glassprice      =   parseFloat(glass_sqr_feet*glassoption);
                console.log(glassprice+'glassprice');
                var glassExtra = glassprice * .13;
                glassprice = glassprice + glassExtra;
                console.log("New Glass Price" + glassprice);

                gls_popup =  Math.round(parseInt(glassoffer));
                

                $('body').find('#S #starburst #form_secarea #priceinput').val( other_price ); /*Just Showing values in form*/
                if(glassoffer){
                    total_price     =   glassprice + parseFloat(other_price);
                }else{
                    if(glassqft && glassoption){
                       total_price  =   glassprice + parseInt(other_price);
                    }else{
                       total_price  =   parseInt(other_price);
                    }
                }
                console.log(total_price+'total_price before_hidden_discount');
                /*Discount Calculate For price*/
                before_dis_price    = total_price;
                if(hide_discount != 0 && hide_discount != null ){
                    var h_discount_price = (total_price * hide_discount)/100;
                    total_price = total_price - h_discount_price;
                }
                console.log(total_price+'total_price before_show_discount');
                if(discount_txt != 0 && discount_txt != null ){
                    $('body').find('#S #starburst #discount-til-sect').show(0);
                    var discount_price  = (total_price * discount_txt)/100;
                    total_price = total_price - discount_price;
                    before_dis_price    = Math.round(before_dis_price);
                    discount_price      = Math.round(discount_price);
                    total_price         = Math.round(total_price);
                    $('body').find('#S #starburst #discount-til-sect span.empty_sect').empty();
                    $('body').find('#S #starburst #discount-til-sect span.total_price').text('$'+before_dis_price);
                    $('body').find('#S #starburst #discount-til-sect span.discounted_amt').text('$'+discount_price);
                    $('body').find('#S #starburst #discount-til-sect span.discount_amt_val').text(' ('+discount_txt+'%  ');
                    $('body').find('#S #starburst #discount-til-sect span.discount_description_val').text(discount_description+')');
                    $('body').find('#S #starburst #discount-til-sect span.final_price').text('$'+total_price);
                    $('body').find('#form_secarea .formLayout form .measurement_values').append('<input class="discount_input" type="hidden" value="$' +before_dis_price+ '" name="before_dis_price"> ');
                    $('body').find('#form_secarea .formLayout form .measurement_values').append('<input class="discount_input" type="hidden" value="$' +discount_price+ '" name="discount_price"> ');
                    $('body').find('#form_secarea .formLayout form .measurement_values').append('<input class="discount_input" type="hidden" value="' +discount_txt+'%" name="discount_txt"> ');
                    $('body').find('#form_secarea .formLayout form .measurement_values').append('<input class="discount_input" type="hidden" value="' +discount_description+ '" name="discount_description"> ');
                    $('body').find('#form_secarea .formLayout form .measurement_values').append('<input class="discount_input" type="hidden" value="$' +total_price+ '" name="final_price"> ');
                }
                console.log(total_price+'total_price with_discount');
                /*Adding DFI price and installation price after discount calculation*/
                if(gls_popup){
                    total_price = total_price + gls_popup;   
                }
                console.log(total_price+'Adding gls_popup'+gls_popup);
                
                installation_price = $('body').find('#S #starburst h1 span.installation_price').find('small').text();
                if(installation_price){
                    installation_price =  Math.round(parseInt(installation_price));
                    total_price = total_price + installation_price; 
                }
                console.log(total_price+'Adding Installation_popup'+installation_price);

                /*End Adding DFI price and installation price after discount calculation*/
                $('body').find('#S #starburst h2 #price_total').text(Math.round(total_price));
                $('body').find('#S #starburst .glasssqft-options').attr('data-key_price',total_price);

                var productid = $('body').find('.twoColbg').attr('id');
                var productconfigJson = JSON.stringify(product_config);

                var data = {
                    'action': 'full_configuration_db',
                    'data': productconfigJson,
                    'pid': productid,
                    'dfi_price': gls_popup,
                    'discount_price': discount_price,
                    'hide_discount_price': h_discount_price,
                    'total_price': total_price,
                    'glassqft': glassqft
                 };
                
                $.post(ajax_object.ajax_url, data, function(dbreturn) {
                    if(dbreturn){
                        unique_id = dbreturn;
                        $('body').find('#quote-return').text(dbreturn);
                    }
                });
                var stayclean_price = jQuery('body').find('.install_easy_wrapper #sqftclean').attr('value');
                /*End of Calculate Total Price*/

                $('body').find('#form_secarea .formLayout form .image_picker_selector').empty();
                $('body').find('.form-right .total_vall .price_info_gls ul li').each(function() {
                    var option_head = $(this).find('.option_head').text();
                    var total_area = $(this).find('.options_price').text();
                    var key_name = $(this).attr('data-re_keyname');
                    if (key_name == 'undefined' ) {}
                    else{
                        $('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" type="hidden" value=" '+ option_head +'-' +total_area+ '" name="builder[]"> ');
                    }
                });

                var productid = $('body').find('.twoColbg').attr('id');
                $('body').find('#form_secarea .formLayout form .image_picker_selector').append('<input class="productid_input" type="hidden" value="'+productid+ '" name="product_id"> ');
                var browserinfo_ = $('body').find('.browserinfo_').text(); 
                var door_name = $('body').find('.form-right .post-tile .entry-title a.previewTitle').attr('title');
                $('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" type="hidden" value="'+door_name+ '" name="door_layout"> ');
                $('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" type="hidden" value=" Door Type - ' +door_name+ '" name="builder_2[]"> ');
                if(browserinfo_){
                    $('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" type="hidden" value=" browser - ' +browserinfo_+ '" name="builder_2[]"> ');    
                }
                
                $('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" type="hidden" value=" Order Status - Saved" name="builder_2[]"> ');
                $('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" id="price-responder" type="hidden" value=" Price - $'+ Math.round(total_price) +'" name="builder_2[]"> ');
                $('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" id="show_price_diff" type="hidden" value="'+ total_price +'" name="show_price_diff"> ');
                var product_img = $(".doorbuilder .form-right .entry").find('img').attr('src');
                $('#form_secarea .formLayout form .image_picker_selector').append('<input class="builderinput" type="hidden" value="'+ product_img +'" name="product_img">');
                basic_stayclean_price = jQuery('body').find('.install_easy_wrapper #sqftclean').attr('value');
                jQuery('body').find('#staycln-dis-total span').text('$'+basic_stayclean_price);
                jQuery('body').find('.calci-dist .dist-tild-sec').show(0);
                jQuery('body').find('.calci-dist-door').hide(0);

                // For Kiosk Product Discount
                var mode_type = getParameterByName('mode');
                if(mode_type == 'kiosk' || mode_type == 'dev_kiosk'){
                    var obj = { 1208: 1, 1228: 2, 1248: 3, 1268: 4, 1288: 5 };
                    var discount_kiosk_pm = getParameterByName('56_temp');
                    if(obj.hasOwnProperty(discount_kiosk_pm)){
                        var discount_kiosk = obj[discount_kiosk_pm];
                        jQuery('body').find('.kioskdist-tilde-sect, .kiosk-dist-door').hide();
                        if(discount_kiosk){
                            var door_price_final    =   jQuery('body').find('#starburst #price_total').text();
                            var instltn_prc         =   installation_price;
                            var remove_ins_door_price = total_price - installation_price;
                            //var remove_ins_door_price = door_price_final - installation_price;
                            jQuery('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" type="hidden" value="$'+remove_ins_door_price +'" name="beforekiosk_discount" id="beforekiosk_discount"> ');
                            if(remove_ins_door_price){
                                jQuery('#kiosk-dis-total').find('span').text('$'+Math.round(remove_ins_door_price));
                                jQuery('#kiosk-disct-per').find('span').text(discount_kiosk+'%');
                                jQuery('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" type="hidden" value="'+ discount_kiosk +'" name="kioskdoor_discount" id="kioskdoor_discount"> ');
                                var discount_door = (remove_ins_door_price * discount_kiosk)/100;
                                remove_ins_door = remove_ins_door_price - discount_door;
                                jQuery('#kiosk-wthout_installtion').find('span').text('$'+Math.round(remove_ins_door));
                                if(instltn_prc < 1){
                                    jQuery('#kiosk-final-price').hide(0);
                                    remove_ins_door = remove_ins_door - instltn_prc;
                                    jQuery('#kiosk-final-price').empty();
                                }else{
                                    remove_ins_door = instltn_prc + remove_ins_door;
                                    jQuery('.kiosk-dist-door .custom-info').append('<p id="kiosk-final-price" class="hide-tild-sect kioskdist-tilde-sect"> Total Door price: <span>$'+Math.round(remove_ins_door)+'</span> (with installation)</p>');
                                }
                                jQuery('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" type="hidden" value="'+ remove_ins_door +'" name="kiosk_total_price" id="kiosk_total_price"> ');
                                jQuery('body').find('.kioskdist-tilde-sect').removeClass('hide-tild-sect');
                                jQuery('body').find('.kioskdist-tilde-sect, .kiosk-dist-door').show();
                                jQuery('body').find('#form_secarea .install_sec #show_price_diff').attr('value',remove_ins_door.toFixed(2));
                                jQuery('body').find('#price-responder').remove();
                                $('body').find('#form_secarea .formLayout form .image_picker_selector').append(' <input class="builderinput" id="price-responder" type="hidden" value=" Price - $'+ Math.round(remove_ins_door) +'" name="builder_2[]"> ');
                            }
                        }
                    }
                }
                    // For Kiosk Product Discount End
            }); //Ajax response end
        });
    });


// For kiosk Product configuration End

/* ============ *  Bundled Product js End * ============ */
        
    jQuery('#bun_submit').on( "click", function() {
        var validate;
       // $('body').addClass('re-loading');
      //  $('.re-order-loader').addClass('active');

        jQuery('#form_secarea .formLayout .input-filed').each(function(){
            if(jQuery(this).attr('value') == '')
                validate = 1;

        });
        if(validate == 1){
            alert('All fields are required!');
           // $('body').removeClass('re-loading');
           // $('.re-order-loader').removeClass('active');
            return false;
        }
        else { 
           // $('body').addClass('re-loading');
           // $('.re-order-loader').addClass('active');
            return true;
        }

    });
       
  }(jQuery));

});// - document ready