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
        hold_data = [];
        product_config = [];
        $('body').find('.doorbuilder .col-sm-8 #selected_opt ol.cd-breadcrumb').empty();
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
        hold_data.push(temp_data);
        var len = hold_data.length;
        for (var i = 0; i < len; i++) {
            var show_keyname  = $('#'+hold_data[i]).find('a').attr('data-show_keyname');
            $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').append('<li><a href="#'+hold_data[i]+'" data-bread="'+hold_data[i]+'">'+show_keyname+'</a></li>');
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
                    //glass square footage
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
                var priceString = eval(res).toFixed(1);//sq feet
                console.log("PRICE? "+priceString);
                $('body').find('.form-right .total_vall .sqft_gls').html('<ul><li><span class="option_head"></span><span class="options_price"></span></li></ul>');
                $('body').find('#attribute-option-14 #starburst h1 .glasssqft-options small').text(priceString);
                $('body').find('#form_secarea .formLayout form .quote_sqft').append('<input class="quote_input" type="hidden" value="' +priceString+ '" name="quote_sqft"> ');
                $('body').find('.form-right .total_vall .sqft_gls').show(0);
                $('body').find('.form-right .total_vall .sqft_gls ul li .option_head').text( 'Glass (SQFT)' );
                $('body').find('.form-right .total_vall .sqft_gls ul li .options_price').text(priceString + ' sqft');
                $('body').find('#form_secarea .formLayout form .measurement_values').find('.gls_sqft').remove();
                $('body').find('#form_secarea .formLayout form .measurement_values').append(' <input class="builderinput gls_sqft" type="hidden" value=" Glass (SQFT)- ' +priceString+ '" name="builder[]"> ');
                
                glassoffer = priceString * 5.75; // price for stayClean
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
            var hinges_val = $('#attribute-option-5').find('p.input_val').text();
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
                                $(this).find('img').attr('src', sub_key); // Swaps finish style image into builder
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
            var hinges_val = $('#attribute-option-5').find('p.input_val').text();
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
                                var s = sub_key;
                                var n = s.search("framelessshowerdoors.com");
                                if(n > 0){s = s.replace('http://', 'https://')}
                                $(this).find('img').attr('src', s);
                            }
                        });
                    }
                });
                $('#'+ currentdiv).fadeOut();
                $('#'+ shownextdiv).fadeIn('slow'); 
            });
        }); 


        /* ============ *  Pull Towelbar related to size * ============ */
        $("#attribute-option-10 a").click(function(ev) {
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
          $('#attribute-option-11').find('.bundle-tild-sect li').hide();

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
                  $('#attribute-option-11').find('.bundle-tild-sect li a').each(function() {
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
        $("#attribute-option-11 a").click(function(ev) {
            ev.preventDefault();  

            var combo_towelbar_size = $(this).text();
            var hardwrfinish_val = $('body').find('#hardwrfinish_val').text();
            var combo_handle_size = $('body').find('#attribute-option-10').find('p.input_val').text();
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
          $('#attribute-option-13b').find('.bundle-tild-sect li').hide();
          var data = {
              'action'              : 'rebundled_towelbarsize',
              'hardwrfinish_val'    :  hardwrfinish_val,
              'productid'           :  productid,
          };
          $.post(ajax_object.ajax_url, data, function(responsee) {
              var objj = $.parseJSON(responsee);
              $.each(objj, function(sub_key, sub_value) {
                  if(sub_value){
                  $('#attribute-option-13b').find('.bundle-tild-sect li a').each(function() {
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
        $("#attribute-option-13b a").click(function(ev) {
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
          $('#attribute-option-13c').find('.bundle-tild-sect li').hide();

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
                    $('#attribute-option-13c').find('.bundle-tild-sect li a').each(function() {
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

        $("#attribute-option-13a a").click(function(ev) {
            ev.preventDefault();
            $('body').find('.towelbar-options').html('');
            $('body').find('.attribute-glass_combo p.input_val').text('');
            $('body').find('.attribute-glass_combo p.input_val').attr('data-show_keypara','');
        });
        
    /* ============ *  Hide Show * ============ */
        $(".atribut-gls_h a, .atribut-pull_h a ").click(function(ev) {
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

            /*Reset Html of breadcrumb*/
            $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').empty();
            var len = hold_data.length;
            for (var i = 0; i < len; i++) {
                var show_keyname  = $('#'+hold_data[i]).find('a').attr('data-show_keyname');
                $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').append('<li><a href="#'+hold_data[i]+'" data-bread="'+hold_data[i]+'">'+show_keyname+'</a></li>');
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

            if(el_data == 'attribute-option-1'){
              $('body').find('#backNav').hide(0);
            }

            $('body').find('.build-showerdoor').fadeOut();
            $(element_id).fadeIn('slow');

            $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').empty();

            var len = hold_data.length; 
            for (var i = 0; i < len; i++) {
                /*Remove value from array*/
                if(el_data == hold_data[i]){
                    for (var j = i+1; j <= len; j++) {
                        hold_data.splice(i+1, 1);
                    }   
                }
                /*Reset Html of breadcrumb*/
                if( hold_data[i] != null ){
                    var show_keyname  = $('#'+hold_data[i]).find('a').attr('data-show_keyname');
                    $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').append('<li><a href="#'+hold_data[i]+'" data-bread="'+hold_data[i]+'">'+show_keyname+'</a></li>');
                }
            }
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
                if(lastEl == 'attribute-option-1'){
                  $('body').find('#backNav').hide(0);
                }
                $('#' +lastEl).fadeIn('slow');
                hold_data.pop();

                /*Reset Html of breadcrumb*/
                $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').empty();
                var len = hold_data.length;
                for (var i = 0; i < len; i++) {
                    var show_keyname  = $('#'+hold_data[i]).find('a').attr('data-show_keyname');
                    $('body').find('.doorbuilder .col-sm-8 #selected_opt ol').append('<li><a href="#'+hold_data[i]+'" data-bread="'+hold_data[i]+'">'+show_keyname+'</a></li>');
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
            $('body').find('#attribute-option-14 #starburst h1').find('.offer-options').remove();
            $('body').find('#attribute-option-14 #starburst h1').append('<span class="offer-options hide-tild-sect"> Price <small>Yes</small></span>');
            $('body').find('#form_secarea .formLayout form .measurement_values')
            .append(' <input class="builderinput" type="hidden" value=" Stayclean Option- Yes" id="option_stayclean" name="builder[]"> ');

            $('body').find('#form_secarea .formLayout form .measurement_values')
            .append(' <input class="builderinput" type="hidden" value="Yes" name="stayclean_option" id="stayclean_option"> ');

            $('body').find('.form-right .total_vall .sqft_gls .data-stayclean, .form-right .total_vall .sqft_gls .data-stayclean-opt').remove();
            $('body').find('.form-right .total_vall .sqft_gls ul').append('<li class="data-stayclean-opt"><span class="option_head">StayClean</span><span class="options_price">Yes</span></li>');

            var isFL = jQuery("#isFL").val();
            if(isFL != 'y'){
                $('body').find('.form-right .total_vall .sqft_gls ul').append('<li class="data-stayclean"><span class="option_head">StayClean Price</span><span class="options_price">' + glassoffer  + '</span></li>');
            }

            close_minicart();
            $('.calci-dist .dist-stayclean-sec').show(0);
          }
          else{
            $(".form-right .stay_clean_glass center span:last-child label").addClass('active-label');
            $('body').find('#attribute-option-14 #starburst h1').find('.offer-options').remove();
            $('body').find('#attribute-option-14 #starburst h1').append('<span class="offer-options hide-tild-sect"> Price <small>No</small></span>');
            $('body').find('#form_secarea .formLayout form .measurement_values')
            .append(' <input class="builderinput" type="hidden" value=" Stayclean Option- No" id="option_stayclean" name="builder[]"> ');

            $('body').find('#form_secarea .formLayout form .measurement_values')
            .append(' <input class="builderinput" type="hidden" value="No" name="stayclean_option" id="stayclean_option"> ');

            $('body').find('.form-right .total_vall .sqft_gls .data-stayclean, .form-right .total_vall .sqft_gls .data-stayclean-opt').remove();
            $('body').find('.form-right .total_vall .sqft_gls ul').append('<li class="data-stayclean-opt"><span class="option_head">StayClean</span><span class="options_price">No</span></li>');
            $('body').find('.form-right .total_vall .sqft_gls ul').append('<li class="data-stayclean"><span class="option_head">StayClean Price</span><span class="options_price">' + glassoffer  + '</span></li>');


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
                      console.log("sub_key : " + sub_key);
                    if( sub_key =='glass'){
                        $('body').find('#form_secarea .formLayout form .quote_glass').empty();
                        $('body').find('#attribute-option-14 #starburst h1 .glass-options').text('');
                        $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                          if(sub_keyyy == 'sku') {
                            $('body').find('#attribute-option-14 #starburst h1').append('<span class="glass-options hide-tild-sect sku">  Glass <small>' + sub_valll + '</small></span>');
                            $('body').find('#form_secarea .formLayout form .quote_glass').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="glass_sku[]"> ');
                          }
                          else if(sub_keyyy == 'price'){
                            $('body').find('#attribute-option-14 #starburst h1').append('<span class="glass-options hide-tild-sect price_glass"> Glass Price <small>' + sub_valll + '</small></span>');
                            $('body').find('#form_secarea .formLayout form .quote_glass').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="glass_price[]"> ');
                          }


                        });
                      });
                    }
                    else if( sub_key =='hinge'){
                        $('body').find('#form_secarea .formLayout form .quote_hinge').empty();
                      $('body').find('#attribute-option-14 #starburst h1 .hinge-options').text('');
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                                $('body').find('#attribute-option-14 #starburst h1').append('<span class="hinge-options hide-tild-sect sku">  hinge <small>' + sub_valll + '</small></span>');
                                $('body').find('#form_secarea .formLayout form .quote_hinge').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="hinge_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                                $('body').find('#attribute-option-14 #starburst h1').append('<span class="hinge-options hide-tild-sect price"> Hinge Price <small>' + sub_valll + '</small></span>');
                                $('body').find('#form_secarea .formLayout form .quote_hinge').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="hinge_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='knob'){
                        $('body').find('#form_secarea .formLayout form .quote_knob').empty();
                        $('body').find('#form_secarea .formLayout form .knob').empty();
                      $('body').find('#attribute-option-14 #starburst h1 .pull-attribute-options.sku small').empty();
                      $('body').find('#attribute-option-14 #starburst h1 .pull-attribute-options.price small').empty();
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                               $('body').find('#attribute-option-14 #starburst h1').append('<span class="pull-attribute-options knob-options hide-tild-sect sku">  Knob <small>' + sub_valll + '</small></span>');
                               $('body').find('#form_secarea .formLayout form .quote_knob').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="knob_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                               $('body').find('#attribute-option-14 #starburst h1').append('<span class="pull-attribute-options knob-options hide-tild-sect price"> Knob Price <small>' + sub_valll + '</small></span>');
                               $('body').find('#form_secarea .formLayout form .quote_knob').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="knob_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='handle'){
                        $('body').find('#form_secarea .formLayout form .quote_handle').empty();
                      $('body').find('#attribute-option-14 #starburst h1 .pull-attribute-options.sku small').empty();
                      $('body').find('#attribute-option-14 #starburst h1 .pull-attribute-options.price small').empty();
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                              $('body').find('#attribute-option-14 #starburst h1').append('<span class="pull-attribute-options handle-options hide-tild-sect sku">  Handle <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_handle').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="handle_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                              $('body').find('#attribute-option-14 #starburst h1').append('<span class="pull-attribute-options handle-options hide-tild-sect price"> Handle Price <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_handle').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="handle_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='handle-towelbar-combo'){
                        $('body').find('#form_secarea .formLayout form .quote_htc').empty();
                      $('body').find('#attribute-option-14 #starburst h1 .pull-attribute-options.sku small').empty();
                      $('body').find('#attribute-option-14 #starburst h1 .pull-attribute-options.price small').empty();
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                              $('body').find('#attribute-option-14 #starburst h1').append('<span class="pull-attribute-options handle-towelbar-options hide-tild-sect sku">  Towelbar <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_htc').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="handle_towelbar_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                              $('body').find('#attribute-option-14 #starburst h1').append('<span class="pull-attribute-options handle-towelbar-options hide-tild-sect price"> Towelbar Price <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_htc').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="handle_towelbar_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='towelbar'){
                        $('body').find('#form_secarea .formLayout form .quote_towelbar').empty();
                      $('body').find('#attribute-option-14 #starburst h1 .towelbar-options').text('');
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                              $('body').find('#attribute-option-14 #starburst h1').append('<span class="towelbar-options hide-tild-sect sku">  Towelbar <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_towelbar').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="towelbar_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                              $('body').find('#attribute-option-14 #starburst h1').append('<span class="towelbar-options hide-tild-sect price"> Towelbar Price <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_towelbar').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="towelbar_price[]"> ');
                            }
                        });
                      });
                    }

                    else if( sub_key =='standard-door'){
                        $('body').find('#form_secarea .formLayout form .quote_standarddoor').empty();
                      $('body').find('#attribute-option-14 #starburst h1 .standard-door-options').text('');
                      $.each(sub_value, function(sub_keyy, sub_vall) {
                        $.each(sub_vall, function(sub_keyyy, sub_valll) {
                            if(sub_keyyy == 'sku') {
                              $('body').find('#attribute-option-14 #starburst h1').append('<span class="standard-door-options hide-tild-sect sku">  Standard-door <small>' + sub_valll + '</small></span>');
                              $('body').find('#form_secarea .formLayout form .quote_standarddoor').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="standard_sku[]"> ');
                            }
                            else if(sub_keyyy == 'price'){
                              $('body').find('#attribute-option-14 #starburst h1').append('<span class="standard-door-options hide-tild-sect price"> Standard-door Price <small>' + sub_valll + '</small></span>');
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
        $("#attribute-option-13e a").click(function(ev) {
            $('body').find('.doorbuilder .form-right .stay_clean_glass').hide(0);
            $('#attribute-option-13e').hide(0);
            var productid = $('body').find('.twoColbg').attr('id');
            $('body').find('.form-right .total_vall .price_info_gls ul').empty();
            $('body').find('#attribute-option-14 #starburst h1 .installation-attribute-options').text('');

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
                        $('body').find('#attribute-option-14 #starburst h1 .installation-options').text('');
                            $.each(sub_value, function(sub_keyy, sub_vall) {

                                if(sub_keyy == 'sku'){
                                    $('body').find('#attribute-option-14 #starburst h1').append('<span class="installation-options hide-tild-sect sku"> Installation SKU <small>' + sub_vall + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_installation').append('<input class="quote_input" type="hidden" value="' +sub_vall+ '" name="installation_sku[]"> ');
                                }
                                else if(sub_keyy == 'price'){
                                    $('body').find('#attribute-option-14 #starburst h1').append('<span class="installation-options hide-tild-sect installation_price"> Installation Price <small>' + sub_vall + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_installation').append('<input class="quote_input" type="hidden" value="' +sub_vall+ '" name="installation_price[]"> ');
                                }

                            });
                        }

                        if(sub_key == 'clamp'){
                            $('body').find('#form_secarea .formLayout form .quote_clamp').empty();
                            $('body').find('#attribute-option-14 #starburst h1 .clamp-options').text('');
                            $.each(sub_value, function(sub_keyy, sub_vall) {
                                $.each(sub_vall, function(sub_keyyy, sub_valll) {

                                    if(sub_keyyy == 'sku') {
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="clamp-options hide-tild-sect sku"> Clamp SKU <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_clamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="clamp_sku[]"> ');
                                    }
                                    else if(sub_keyyy == 'price'){
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="clamp-options hide-tild-sect price"> Clamp Price <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_clamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="clamp_price[]"> ');
                                    }

                                });
                            });
                        }

                        if(sub_key == 'header'){
                            $('body').find('#form_secarea .formLayout form .quote_header').empty();
                            $('body').find('#attribute-option-14 #starburst h1 .header-options').text('');
                            $.each(sub_value, function(sub_keyy, sub_vall) { //alert(sub_vall);
                                $.each(sub_vall, function(sub_keyyy, sub_valll) {

                                    if(sub_keyyy == 'sku') {
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="header-options hide-tild-sect sku"> header SKU <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_header').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="header_sku[]"> ');
                                    }
                                    else if(sub_keyyy == 'price'){
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="header-options hide-tild-sect price"> header Price <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_header').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="header_price[]"> ');
                                    }

                                });
                            });
                        }

                        if(sub_key == 'basic'){
                            $('body').find('#form_secarea .formLayout form .quote_basic').empty();
                            $('body').find('#attribute-option-14 #starburst h1 .basic-options').text('');
                            $.each(sub_value, function(sub_keyy, sub_vall) {
                                $.each(sub_vall, function(sub_keyyy, sub_valll) {

                                    if(sub_keyyy == 'sku') {
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="basic-options hide-tild-sect sku"> basic SKU <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_basic').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="basic_sku[]"> ');
                                    }
                                    else if(sub_keyyy == 'price'){
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="basic-options hide-tild-sect price"> basic Price <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_basic').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="basic_price[]"> ');
                                    }

                                });
                            });
                        }

                        if(sub_key == 'door-part'){
                            $('body').find('#form_secarea .formLayout form .quote_doorpart').empty();
                            $('body').find('#attribute-option-14 #starburst h1 .door-part-options').text('');
                            $.each(sub_value, function(sub_keyy, sub_vall) {
                                $.each(sub_vall, function(sub_keyyy, sub_valll) {

                                if(sub_keyyy == 'sku') {
                                    $('body').find('#attribute-option-14 #starburst h1').append('<span class="door-part-options hide-tild-sect sku"> Door Part SKU <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_doorpart').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="door_part_sku[]"> ');
                                }
                                else if(sub_keyyy == 'price'){
                                    $('body').find('#attribute-option-14 #starburst h1').append('<span class="door-part-options hide-tild-sect price"> Door Part Price <small>' + sub_valll + '</small></span>');
                                    $('body').find('#form_secarea .formLayout form .quote_doorpart').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="door_part_price[]"> ');
                                }

                                });
                            });
                        }

                        if(sub_key == 'shelf-clamp'){
                            $('body').find('#form_secarea .formLayout form .quote_shelfclamp').empty();
                            $('body').find('#attribute-option-14 #starburst h1 .shelf-clamp-options').text('');
                            $.each(sub_value, function(sub_keyy, sub_vall) {
                                $.each(sub_vall, function(sub_keyyy, sub_valll) {

                                    if(sub_keyyy == 'sku') {
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="shelf-clamp-options hide-tild-sect sku"> Shelf Clamp SKU <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_shelfclamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="shelf_clamp_sku[]"> ');
                                    }
                                    else if(sub_keyyy == 'price'){
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="shelf-clamp-options hide-tild-sect price"> Shelf Clamp Price <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_shelfclamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="shelf_clamp_price[]"> ');
                                    }

                                });
                            });
                        }

                        if(sub_key == 'sleeve-over-clamp'){
                            $('body').find('#form_secarea .formLayout form .quote_sleevoverclamp').empty();
                            $('body').find('#attribute-option-14 #starburst h1 .sleeve-over-clamp-options').text('');
                            $.each(sub_value, function(sub_keyy, sub_vall) {
                                $.each(sub_vall, function(sub_keyyy, sub_valll) {
                                    if(sub_keyyy == 'sku') {
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="sleeve-over-clamp-options hide-tild-sect sku"> Sleeve Over Clamp SKU <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_sleevoverclamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="sleevover_clamp_sku[]"> ');
                                    }
                                    else if(sub_keyyy == 'price'){
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="sleeve-over-clamp-options hide-tild-sect price"> Sleeve Over Clamp Price <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .quote_sleevoverclamp').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="sleevover_clamp_price[]"> ');
                                    }
                                });
                            });
                        }

                        if(sub_key == 'u-channel'){
                            $('body').find('#form_secarea .formLayout form .quote_uchannel').empty();
                            $('body').find('#attribute-option-14 #starburst h1 .u-channel-options').text('');
                            $.each(sub_value, function(sub_keyy, sub_vall) {
                                $.each(sub_vall, function(sub_keyyy, sub_valll) {
                                    if(sub_keyyy == 'sku') {
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="u-channel-options hide-tild-sect sku"> U channel SKU <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .uchannel').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="uchannel_sku[]"> ');
                                    }
                                    else if(sub_keyyy == 'price'){
                                        $('body').find('#attribute-option-14 #starburst h1').append('<span class="u-channel-options hide-tild-sect price"> U channel Price <small>' + sub_valll + '</small></span>');
                                        $('body').find('#form_secarea .formLayout form .uchannel').append('<input class="quote_input" type="hidden" value="' +sub_valll+ '" name="uchannel_price[]"> ');
                                    }
                                });
                            });
                        }
                    });

                    /*Calculate Total Price*/
                    var glassqft        =   $('body').find('#attribute-option-14 #starburst h1 span.glasssqft-options small').text();
                    glasoffer           =   $('body').find('#attribute-option-14 #starburst h1 span.offer-options small').text();
                    $('body').find('#attribute-option-14 #starburst #form_secarea #sqftinput').val( glassqft ); /*Just Showing values in form*/
                    console.log("Is there Stayclean? " + glasoffer + " Sqft: " + glassqft);
                    if(glasoffer == 'Yes' || glasoffer == 'YesYes'){
                        console.log("Yay Stayclean!");
                       var glassoffer =  (glassqft * 5.75);
                       glassoffer = Math.round(glassoffer);
                       $('body').find('#attribute-option-14 #starburst #form_secarea #sqftclean').val( (glassqft * 5.75).toFixed(2) ); /*Just Showing values in form*/
                    }
                    var glassoption     =   $('body').find('#attribute-option-14 #starburst h1 span.price_glass small').text();
                    var add = 0;
                    var used = [];
                    $('body').find('#attribute-option-14 #starburst h1 span.price').each(function() {
                        var pricevalue   =  $(this).find('small').text();
                        var aid = $(this).find('small').parent().attr("class");
                        //var i = used.indexOf(aid);
                        var i = -1;
                        console.log("Index in array? " + i);
                        if(i < 0){
                            add += Number(pricevalue);
                            used.push(aid);
                        }
                        console.log("Other Costs: " + pricevalue + " || Name: " + aid);
                    });
                    var other_price = add;
                    
                    other_price         =   Math.round(other_price);
                    console.log("Other Price: " + other_price);
                    console.log("Square feet: " + glass_sqr_feet);
                    console.log("Glass Option: " + glassoption);
                    var glassprice      =   parseFloat(glass_sqr_feet) * parseFloat(glassoption);
                    console.log(glassprice+' glassprice');
                    var glassExtra = glassprice * .13;
                    glassprice = glassprice + glassExtra;
                    console.log("New Glass Price" + glassprice);

                    console.log("GLASS OFFER: " + glassoffer);
                    gls_popup =  Math.round(parseInt(glassoffer));
                    console.log("GLASS Popup: " + gls_popup);

                    $('body').find('#attribute-option-14 #starburst #form_secarea #priceinput').val( other_price ); /*Just Showing values in form*/
                    if(glassoffer){
                        total_price     =   glassprice + parseFloat(other_price);
                        console.log("Glass Offer Total: " + glassprice + " + " + parseFloat(other_price) + " = " + total_price);
                    }else{
                        if(glassqft && glassoption){
                           total_price  =   glassprice + parseInt(other_price);
                            console.log("Glass sqft Offer Total: " + glassprice + " + " + parseFloat(other_price) + " = " + total_price);
                        }else{
                           total_price  =   parseInt(other_price);
                            console.log("Glass No Offer Total: " + parseFloat(other_price) + " = " + total_price);
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
                        $('body').find('#attribute-option-14 #starburst #discount-til-sect').show(0);
                        var discount_price  = (total_price * discount_txt)/100;
                        total_price = total_price - discount_price;
                        before_dis_price    = Math.round(before_dis_price);
                        discount_price      = Math.round(discount_price);
                        total_price         = Math.round(total_price);
                        $('body').find('#attribute-option-14 #starburst #discount-til-sect span.empty_sect').empty();
                        $('body').find('#attribute-option-14 #starburst #discount-til-sect span.total_price').text('$'+before_dis_price);
                        $('body').find('#attribute-option-14 #starburst #discount-til-sect span.discounted_amt').text('$'+discount_price);
                        $('body').find('#attribute-option-14 #starburst #discount-til-sect span.discount_amt_val').text(' ('+discount_txt+'%  ');
                        $('body').find('#attribute-option-14 #starburst #discount-til-sect span.discount_description_val').text(discount_description+')');
                        $('body').find('#attribute-option-14 #starburst #discount-til-sect span.final_price').text('$'+total_price);
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
                    console.log(total_price+' Adding gls_popup '+gls_popup);

                    installation_price = $('body').find('#attribute-option-14 #starburst h1 span.installation_price').find('small').text();
                    if(installation_price){
                        installation_price =  Math.round(parseInt(installation_price));
                        total_price = total_price + installation_price;
                    }
                    console.log(total_price+' Adding Installation_popup '+installation_price);

                    var fd_discount = total_price * .05;
                    var fd_price = total_price - fd_discount;

                    /*End Adding DFI price and installation price after discount calculation*/
                    $('body').find('#attribute-option-14 #starburst h2 #fd_total').text(Math.round(fd_price));
                    $('body').find('#attribute-option-14 #starburst h2 #price_total').text(Math.round(total_price));
                    $('body').find('#attribute-option-14 #starburst .glasssqft-options').attr('data-key_price',total_price);

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
                    if(mode_type == 'kiosk'){
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

    // For Internal Builder Product configuration
    var mode_type = getParameterByName('mode');
    if(mode_type == 'builder'){
        var door_price;
        var core_door_price;
        var allprice_add;
        var stayclean_price;

        jQuery('.discount_section_attr').on( "click", function() {
            var rell = jQuery(this).attr('rel');
            jQuery('body').find('.'+rell).slideToggle();
        });

        jQuery('#calculate-discount-door').on( "click", function() {

            var discount_stprice    =   '';
            var discount_door       =   '';
            var additional_chrg     =   '';
            
            discount_stprice        =   jQuery('#dfi_disocunt_txt').attr('value');
            discount_door           =   jQuery('#door_disocunt_txt').attr('value');
            additional_chrg         =   jQuery('#door_additional_txt').attr('value');

            $('#additional_sectt').attr('value', additional_chrg);
            console.log('additional_chrg: '+additional_chrg);
            console.log('stayclean: '+glasoffer);


            if(discount_stprice){
                stayclean_price = basic_stayclean_price;
                jQuery('body').find('#staycln-dis-total').removeClass('hide-tild-sect');
                jQuery('body').find('#staycln-dis-total span').text('$'+stayclean_price); //Stayclean Price
                jQuery('body').find('#form_secarea .formLayout form .stayclean_discount_attr').empty();
                var total_price = jQuery('body').find('#starburst #price_total').text();

                if(stayclean_price && discount_stprice != 0 && discount_stprice < 70){

                    jQuery('body').find('#form_secarea .formLayout form .stayclean_discount_attr').append(' <input class="builderinput" type="hidden" value="$'+stayclean_price +'" name="stayclean_before_discount" id="stayclean_before_discount"> ');
                    jQuery('body').find('#appr-disct').removeClass('hide-tild-sect');
                    jQuery('body').find('#appr-disct span').text();
                    jQuery('body').find('#appr-disct span').text(discount_stprice+'%'); //StayClean Discount
                    jQuery('body').find('#form_secarea .formLayout form .stayclean_discount_attr').append(' <input class="builderinput" type="hidden" value="'+ discount_stprice +'" name="stayclean_discount_per" id="stayclean_discount_per"> ');
                    var discount_stprice = (stayclean_price * discount_stprice)/100;
                    stayclean_price = stayclean_price - discount_stprice;
                    jQuery('body').find('#final-stayclean-dis').removeClass('hide-tild-sect');
                    jQuery('body').find('#final-stayclean-dis span').text('$'+stayclean_price.toFixed(2));
                    jQuery('body').find('#form_secarea .formLayout form .stayclean_discount_attr').append(' <input class="builderinput" type="hidden" value="$'+stayclean_price.toFixed(2) +'" name="stayclean_discount_total" id="stayclean_discount_total"> ');
                    jQuery('body').find('.install_easy_wrapper .install_sec #sqftclean').attr('value',stayclean_price.toFixed(2));
                }
                
            }

            if(discount_door){
                var door_price_final    =   jQuery('body').find('#starburst #price_total').text();
                var stayclean_price_core=   basic_stayclean_price;
                var instltn_prc         =   installation_price;
                var remove_stayclean    = door_price_final - stayclean_price_core;
                var remove_installation = remove_stayclean - instltn_prc;
                core_door_price = remove_installation;
                door_price = remove_installation;
                //console.log('core_dp : '+ door_price);

                console.log('core_dp: '+ door_price);
                if(additional_chrg != ''){
                    door_price = door_price + parseFloat(additional_chrg);
                }
                console.log('core_dp wth additional: '+ door_price);

                jQuery('body').find('#door-dis-total').removeClass('hide-tild-sect');
                jQuery('body').find('#door-dis-total span').text('$'+door_price); //Stayclean Price
                jQuery('body').find('#form_secarea .formLayout form .door_discount_attr').empty();
                jQuery('body').find('#form_secarea .formLayout form .door_discount_attr').append(' <input class="builderinput" type="hidden" value="$'+door_price +'" name="door_before_discount" id="door_before_discount"> ');
                if(door_price && discount_door != 0 && discount_door < 70){
                    
                    jQuery('body').find('#door-disct').removeClass('hide-tild-sect');
                    jQuery('body').find('#door-disct span').text();
                    jQuery('body').find('#door-disct span').text(discount_door+'%'); //StayClean Discount
                    jQuery('body').find('#form_secarea .formLayout form .door_discount_attr').append(' <input class="builderinput" type="hidden" value="'+ discount_door +'" name="door_discount_per" id="door_discount_per"> ');
                    
                    var discount_door = (door_price * discount_door)/100;
                    door_price = door_price - discount_door;
                    jQuery('body').find('#final-door-dis').removeClass('hide-tild-sect');
                    
                    
                    jQuery('body').find('#final-door-dis span').text('$'+door_price.toFixed(2));
                    jQuery('body').find('#form_secarea .formLayout form .door_discount_attr').append(' <input class="builderinput" type="hidden" value="'+ door_price +'" name="door_discount_total" id="door_discount_total"> ');
                }
            }
            else{
                var door_price_final    =   jQuery('body').find('#starburst #price_total').text();;
                var stayclean_price_core=   basic_stayclean_price;
                var instltn_prc         =   installation_price;
                var remove_stayclean    = door_price_final - stayclean_price_core;
                var remove_installation = remove_stayclean - instltn_prc;
                core_door_price = remove_installation;
                door_price = remove_installation;
            }

            if(discount_stprice == '' && discount_door == ''){
                var door_price_final    =   jQuery('body').find('#starburst #price_total').text();;
                var stayclean_price_core=   basic_stayclean_price;
                var instltn_prc         =   installation_price;
                var remove_stayclean    = door_price_final - stayclean_price_core;
                var remove_installation = remove_stayclean - instltn_prc;
                core_door_price = remove_installation;
                door_price = remove_installation;
                //console.log('core_dp1 : '+ door_price);
                if(additional_chrg != ''){
                    door_price = door_price + parseFloat(additional_chrg);
                    jQuery('body').find('#form_secarea .formLayout form .door_discount_attr').append(' <input class="builderinput" type="hidden" value="$'+door_price +'" name="door_before_discount" id="door_before_discount"> ');
                }
                //console.log('core_dp1 wth additional: '+ door_price);
            }


            jQuery('body').find('.calci-dist-door').show(0);
            if(stayclean_price && glasoffer == 'Yes'){

                if(discount_door == ''){
                    if(additional_chrg != ''){
                        door_price = door_price + parseFloat(additional_chrg);
                        jQuery('body').find('#form_secarea .formLayout form .door_discount_attr').append(' <input class="builderinput" type="hidden" value="$'+door_price +'" name="door_before_discount" id="door_before_discount"> ');
                    }
                }

                allprice_add = parseFloat(stayclean_price) + parseFloat(installation_price) + parseFloat(door_price);
               
                jQuery('body').find('.install_easy_wrapper .install_sec #show_price_diff').attr('value',allprice_add.toFixed(2));
                jQuery('body').find('#discount-total-price center span').text('$'+allprice_add.toFixed(2));
            }else{           
                if(parseFloat(basic_stayclean_price) && glasoffer == 'Yes'){
                    allprice_add = parseFloat(basic_stayclean_price) + parseFloat(installation_price) + parseFloat(door_price);
                    jQuery('body').find('.install_easy_wrapper .install_sec #show_price_diff').attr('value',allprice_add.toFixed(2));    
                }
                else{
                    allprice_add = parseFloat(installation_price) + parseFloat(door_price);
                    jQuery('body').find('.install_easy_wrapper .install_sec #show_price_diff').attr('value',allprice_add.toFixed(2));
                }
                jQuery('body').find('#discount-total-price center span').text('$'+allprice_add.toFixed(2));
            }
        });

        $('#download_pdf_crm').on( "click", function() {
            var sp;
            if(stayclean_price){
                sp = stayclean_price;
            }else if(basic_stayclean_price){
                sp = basic_stayclean_price;   
            }
            builder0 = [];
            buildr = [];
            builder2 = [];

            jQuery('input[name=builder_0\\[\\]]').each(function(index, element) {
                builder0.push(this.value);
            });

            jQuery('input[name=builder\\[\\]]').each(function(index, element) {
                buildr.push(this.value);
            });

            jQuery('input[name=builder_2\\[\\]]').each(function(index, element) {
                builder2.push(this.value);
            });

            var outsidesal = '';
            outsidesal = jQuery('body').find('input[name="for_outsidesales"]:checked').val();
            //console.log(outsidesal);
            if(outsidesal == 'outsidesale'){
                outside_sales = '1'; 
            }
            else if(outsidesal == 'texassale'){
                outside_sales = '2'; 
            }
            else{
                outside_sales = '0'; 
            }
            //console.log(outsidesal + ': ' +outside_sales);

            var productid = $('body').find('.twoColbg').attr('id');
            var door_layout = $('body').find('.entry-title a').text();
            var first_name_sales = $('body').find('.install_sec #first_name_sales').attr('value');
            var last_name_sales = $('body').find('.install_sec #last_name_sales').attr('value');
            var sales_email = $('body').find('.install_sec #sales_email').attr('value');
            var phone_number_sales = $('body').find('.install_sec #phone_number_sales').attr('value');
            var first_name = $('body').find('.install_sec #first_name').attr('value');
            var last_name = $('body').find('.install_sec #last_name').attr('value');
            var email = $('body').find('.install_sec #email').attr('value');
            var phone = $('body').find('.install_sec #phone').attr('value');
            var comments = $('body').find('.install_sec #message').val();
            
            var sales_shipping = $('body').find('.install_sec #sales_shipping').attr('value');
            if(!sales_shipping || sales_shipping == ''){sales_shipping = '0'; }
            
            var sales_crating = $('body').find('.install_sec #sales_crating').attr('value');
            if(!sales_crating || sales_crating == ''){sales_crating = '0'; }
            
            var door_discount_total  = $('body').find(".install_sec #door_discount_total").attr('value');
            var door_discount_per  = $('body').find(".install_sec #door_discount_per").attr('value');
            var door_before_discount  = $('body').find(".install_sec #door_before_discount").attr('value');
            var stayclean_discount_total  = $('body').find(".install_sec #stayclean_discount_total").val();
            var stayclean_discount_per  = $('body').find(".install_sec #stayclean_discount_per").val();
            var stayclean_before_discount  = $('body').find(".install_sec #stayclean_before_discount").val();
            var stayclean_option  = $('body').find(".install_sec #stayclean_option").val();
            var product_img  = $('body').find(".form-right .entry img").attr('src');
            var custom_hardware1_label  = $('body').find(".install_sec #custom_hardware1_label").attr('value');
            var custom_hardware2_label  = $('body').find(".install_sec #custom_hardware2_label").attr('value');
            var custom_hardware3_label  = $('body').find(".install_sec #custom_hardware3_label").attr('value');
            var custom_hardware4_label  = $('body').find(".install_sec #custom_hardware4_label").attr('value');

            var custom_hardware1_val  = $('body').find(".install_sec #custom_hardware1_val").attr('value');
            if(!custom_hardware1_val || custom_hardware1_val == ''){custom_hardware1_val = '0'; }
            
            var custom_hardware2_val  = $('body').find(".install_sec #custom_hardware2_val").attr('value');
            if(!custom_hardware2_val || custom_hardware2_val == ''){custom_hardware2_val = '0'; }
            
            var custom_hardware3_val  = $('body').find(".install_sec #custom_hardware3_val").attr('value');
            if(!custom_hardware3_val || custom_hardware3_val == ''){custom_hardware3_val = '0'; }
            
            var custom_hardware4_val  = $('body').find(".install_sec #custom_hardware4_val").attr('value');
            if(!custom_hardware4_val || custom_hardware4_val == ''){custom_hardware4_val = '0'; }

            var additional_charge  = $('body').find("#additional_sectt").attr('value');
            if(!additional_charge || additional_charge == ''){additional_charge = '0'; }
           
            console.log('alladd: '+allprice_add);
            var core_door_final;
            if(allprice_add){
                core_door_final = allprice_add;
            }
            else{
                var total_price = jQuery('body').find('#starburst #price_total').text();
                core_door_final = total_price;
            }
            console.log('core_door_final: '+core_door_final);
            
            var builder0Json    =   JSON.stringify(builder0);
            var builderJson     =   JSON.stringify(buildr);
            var builder2Json    =   JSON.stringify(builder2);
            var data = {
                'action'                      : 'update_db_price',
                'unique_id'                   : unique_id,
                'builder0'                    : builder0Json,
                'buildr'                      : builderJson,
                'builder2'                    : builder2Json,
                'pid'                         : productid,
                'door_layout'                 : door_layout,
                'first_name'                  : first_name,
                'last_name'                   : last_name,
                'email'                       : email,
                'comments'                    : comments,
                'product_img'                 : product_img,
                'first_name_sales'            : first_name_sales,
                'last_name_sales'             : last_name_sales,
                'sales_email'                 : sales_email,
                'phone_number_sales'          : phone_number_sales,
                'sales_shipping'              : sales_shipping,
                'sqftclean'                   : basic_stayclean_price,
                'installation_price'          : installation_price,
                'show_price_diff'             : core_door_final,
                'stayclean_option'            : stayclean_option,
                'stayclean_before_discount'   : stayclean_before_discount,
                'stayclean_discount_per'      : stayclean_discount_per,
                'stayclean_discount_total'    : stayclean_discount_total,
                'sales_crating'               : sales_crating,
                'door_before_discount'        : door_before_discount,
                'door_discount_per'           : door_discount_per,
                'door_discount_total'         : door_discount_total,
                'custom_hardware1_label'      : custom_hardware1_label,
                'custom_hardware2_label'      : custom_hardware2_label,
                'custom_hardware3_label'      : custom_hardware3_label,
                'custom_hardware4_label'      : custom_hardware4_label,
                'custom_hardware1_val'        : custom_hardware1_val,
                'custom_hardware2_val'        : custom_hardware2_val,
                'custom_hardware3_val'        : custom_hardware3_val,
                'custom_hardware4_val'        : custom_hardware4_val,
                'outside_sales'               : outside_sales,
                'additional_charge'           : additional_charge
            }
            $.post(ajax_object.ajax_url, data, function(dbreturn) {
                if(dbreturn.indexOf('successs') != -1){
                    var res = dbreturn.split('#');
                    window.open('https://www.framelessshowerdoors.com/no-crm-download-pdf/?quote_id='+res[1]);

                }else{
                    alert('There is something went wrong, Please try again after sometime.');
                }

            });
        });   
    }

    // For Internal Builder Product configuration End

    // For kiosk Product configuration End

    /* ============ *  Bundled Product js End * ============ */
            
        jQuery('#bun_submit').on( "click", function() {
            jQuery('#bun_submit').attr('value', 'Processing...');
            jQuery('.install_sec #bun_submit').css({"background": "#000000", "color": "#ffffff", "text-shadow": "0 0 0 #e1e2ed"});

            var validate;
            var e;
            var s;
            jQuery('#form_secarea .formLayout .input-filed').each(function(){
                var n = jQuery(this).attr('name');
                var v = jQuery(this).attr('required');

                console.log("Name: "+n+" Value:"+v);

                if(v){
                    if(jQuery(this).attr('value') == ''){validate = 1;s=1;}
                    if(n == 'email'){
                        e = jQuery(this).attr('value');
                        console.log("Email address: "+e);
                        if(!checkemail(e)){
                            validate=1;
                            e = 'fail';
                        }
                        console.log("E Value: "+e);
                    } else if(n == 'state'){
                        var state = jQuery(this).val();
                        var st = '';
                        console.log("STATE LENGTH: "+state.length+" STATE VALUE: "+state);
                        if(state.length < 1){
                            validate = 1;
                            st = "state";
                        }
                        console.log("Validating State: "+validate+" st: "+st);
                    }
                }

            });
            if(validate == 1){

                if(e=="fail") {
                    alert('Please provide a valid email address!!');
                }else if(st == "state") {
                    alert('Please select a state!');
                }else if(s == 1) {
                    alert('Contact information is required!');
                }else{
                        alert('Contact information is required!');
                }
                jQuery('#bun_submit').attr('value', 'Get Your Quote');
                jQuery('#bun_submit').css({"background": "#ededed", "color": "#035d62", "text-shadow": "0 1px 0 #e1e2ed"});
                return false;
            }
            else {
                console.log("----------------------------------------------- PASSED!! --------------------------------------------------------");
                return true;
            }

        });

      }(jQuery));

        jQuery("[data-re_keyname=hardware_finish]").on( "click", function() {
            console.log('Hardware Selected');
            var title = jQuery(this).attr("title");
            olexis_finish(title);
        });

    });// - document ready

 function olexis_finish(title){

    console.log("Title=".title);
     var finishImg = "";
     var hockeyImg = "";
     switch(title){
         case "Chrome":
             //finishImg = "https://www.framelessshowerdoors.com/wp-content/uploads/2017/03/chrome-knob-ListingPage.png";
             finishImg = "/wp-content/uploads/2017/04/Chrome-LadderPull-ListingPage.png";
             hockeyImg = "/wp-content/uploads/2017/04/SEBCirChrome.png";
             break;
         case "Brushed Nickel":
             //finishImg = "https://www.framelessshowerdoors.com/wp-content/uploads/2017/03/BrushNickel-knob-ListingPage.png";
             finishImg = "/wp-content/uploads/2017/04/BrushNickel-LadderPull-ListingPage.png";
             hockeyImg = "/wp-content/uploads/2017/04/SEBCirBRN.png";
             break;
         case "Oil Rubbed Bronze":
             //finishImg = "https://www.framelessshowerdoors.com/wp-content/uploads/2017/03/ORB-knob-ListingPage.png";
             finishImg = "/wp-content/uploads/2017/04/ORB-LadderPull-ListingPage.png";
             hockeyImg = "/wp-content/uploads/2017/04/SEBCirORB.png";
             break;
         default:
             //finishImg = "https://www.framelessshowerdoors.com/wp-content/uploads/2017/03/chrome-knob-ListingPage.png";
             finishImg = "/wp-content/uploads/2017/04/Chrome-LadderPull-ListingPage.png";
             hockeyImg = "/wp-content/uploads/2017/04/SEBCirChrome.png";
     }
     jQuery("#olexis_ladder_pull").attr("src",finishImg);
     jQuery("#sebastian_free_knob").attr("src",hockeyImg);

 }
