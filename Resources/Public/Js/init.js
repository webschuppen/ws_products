// Set localisation object
// Todo: move it to outside js
var $locallang = new Object();
$locallang['de'] = new Object();
$locallang['en'] = new Object();
$locallang['de']['comparelist'] = 'Vergleichsliste ansehen';
$locallang['en']['comparelist'] = 'Look at the compare list';
$locallang['de']['noProducts'] = 'Sie haben keine Produkte im Vergleich';
$locallang['en']['noProducts'] = 'You have no products to compare';
$locallang['de']['moreThanThree'] = 'Sie haben bereits 3 Produkte im Vergleich';
$locallang['en']['moreThanThree'] = 'You’ve added 3 products to compare';
$locallang['de']['alreadyInCompare'] = 'Dieses Produkt ist bereits im Vergleich';
$locallang['en']['alreadyInCompare'] = 'You’ve added this product to compare';

// set some base vars
var $currentlangkey = document.getElementsByTagName("HTML")[0].getAttribute("lang");
var $compareContent = '';
var $compareButton = '<div class="wsProducts compareButtonWrapper"><a href="produkte/maschinen/vergleichsseite/?tx_wsproducts_product%5Baction%5D=compare&tx_wsproducts_product%5Bcontroller%5D=Product' + '&L=' + $('body').data('langid') + '" class="wsProducts compareButtonList">' + $locallang[$currentlangkey]['comparelist'] + '</a></div>';
var noProducts = $locallang[$currentlangkey]['noProducts'];
var isAppReversed = new Array();


// just to be sure there is jQuery in $
(function($) {
    $(document).ready(function() {
        var $productarea = $('.filterList').html();
        var slider = $( "<div id='slider'></div>" ).insertAfter($('.wsProducts.productFilterSelect')).slider();
        slider.slider('disable');

        $('.compareTool').tooltipster({
            interactive: true
        });

        var $compareCookie = ws_products_getCookie('compare');
        if($compareCookie != '') {
            var $compareArray = $.parseJSON($compareCookie);

            $.each($compareArray, function($key, $val) {
                $.ajax({
                    url: 'home/?tx_wsproducts_product[product]=' + $val + '&tx_wsproducts_product[action]=ajaxcompare&tx_wsproducts_product[controller]=Product&type=1666' + '&L=' + $('body').data('langid'),
                    async: false,
                    success: function (response) {
                        var $product = $.parseJSON(response);
                        $compareContent += ws_products_createCompareItem($product['uid'], $product['productName'], $product['productPreviewImage']);
                    }
                });
            });

            if($compareArray.length <= 0) {
                $('.compareTool').tooltipster('enable');
                $('.compareTool').tooltipster('content', noProducts);
                $('.compareTool').children('.compareItemsCount').remove();
            } else {
                $('.compareTool').tooltipster('enable');
                $('.compareTool').tooltipster('content', $($compareContent + $compareButton));
            }

            ws_products_countCompare($compareArray);
        } else {
            $('.compareTool').tooltipster('enable');
            $('.compareTool').tooltipster('content', noProducts);
            $('.compareTool').children('.compareItemsCount').remove();
        }


        if(typeof $filterArrayJson != 'undefined' && $filterArrayJson.length > 0) {

            var $filterObj = $.parseJSON($filterArrayJson);
            ws_products_createFilter($filterObj);
        }

        $('.addCompare').each(function() {
            $(this).on('click', function (e) {
                ws_products_addCompare($(this).attr('data-product'), $(this).attr('href'));
                e.preventDefault();
                return false;
            });
        });

        $('.productDetailInfoIconsItemOpen').each(function() {
            ws_products_openInfoTab($(this));
        });

        $('#resetFilter').click(function() {
            var $productSortArray = new Array();
            var reinit = false;
            $('.filterList').html($productarea);
            if($('.wsProducts.productFilterIcon.activeApplication').length > 0) {
                reinit = true
            }
            $('.wsProducts.filterListItem').each(function() {
                $('.wsProducts.productFilterIcon').removeClass('activeApplication');
                if(reinit) {
                    $('.wsProducts.productFilterSlider').html('<select class="wsProducts productFilterSelect" disabled="disabled"><option>&nbsp;</option></select>');
                }
            });
            $filterArray = $.parseJSON(ws_products_getCookie('filter'));
            delete $filterArray[$selectedCategory];
            if($.isEmptyObject($filterArray)) {
                ws_products_setCookie('filter', '');

                ws_products_setCookie('filterEmailRequest', '');
            } else {
                ws_products_setCookie('filter', JSON.stringify($filterArray));

                ws_products_setCookie('filterEmailRequest', '');
                ws_products_setCookie('filterEmailRequest', JSON.stringify($filterArray));
            }

            $('.wsProducts.productFilterIcon2').removeClass('showFilter');
            $('.wsProducts.productFilterIcon2').each(function() {
                $(this).removeClass('activeApplication');
                $(this).off('click');
            });

            var slider = $("<div id='slider'></div>").insertAfter($('.wsProducts.productFilterSelect'));
            slider.slider();
            slider.slider('disable');

            $('.lableChooseKapa ol li .ws_showall').addClass('filter_inactive');
            $('.lableChooseKapa ol li .ws_showFiltered').addClass('filter_inactive');
        });
    });

    $(window).load(function() {
        $('.wsProducts.productDetailDetailsImageSlider').ws_productsImages();
        $('.wsProducts.productDetailAccessoryPreviewImage').each(function() {
            var $that = $(this);
            $that.parent().children('.wsProducts.productDetailAccessoryName.ws_subMenuTeaserCaption').css('max-width', $that.children('a').outerWidth());
            $that.parent().css('max-width', $that.children('img').innerWidth());
        });
        //$(window).trigger('resize');
        $('.wsProducts.productDetailDetailsImageSlider > *').css({'position': 'relative', 'opacity': 1});
        $('.wsProducts.productDetailAccessorySlider').css({'opacity': 1});
    });

    $(window).scroll(function() {
        if($('.deleteAllButton').length > 0) {
            var $scrollHeight = $(window).scrollTop();
            var $deleteIconTop = $('.row.header .wsProducts.compareRemoveCompare').offset().top - 20;
            var $h2Top = $('.row.header h2').offset().top;
            var $deleteAllTop = $('.deleteAllButton').offset().top - 20;
            var $printTop = $('.printListButton').offset().top - 20;

            if ($scrollHeight >= $h2Top) {
                $('.compareFixedHeader').show();
            } else if ($scrollHeight < $h2Top) {
                $('.compareFixedHeader').hide();
            }

            if ($scrollHeight >= $deleteIconTop) {
                $('.regularContentArea.contentCompareFixedHeader .compareRemoveCompare').show();
            } else if ($scrollHeight < $deleteIconTop) {
                $('.regularContentArea.contentCompareFixedHeader .compareRemoveCompare').hide();
            }

            if ($scrollHeight >= $deleteAllTop) {
                $('.compareFixedHeaderDeleteAll').css('display', 'inline-block');
            } else if ($scrollHeight < $deleteAllTop) {
                $('.compareFixedHeaderDeleteAll').hide();
            }

            if ($scrollHeight >= $printTop) {
                $('.compareFixedHeaderPrint').css('display', 'inline-block');
            } else if ($scrollHeight < $printTop) {
                $('.compareFixedHeaderPrint').hide();
            }
        }
    });

})(jQuery);

// function to set cookies
function ws_products_setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + ";path=/";
}

// function to read/get cookies
function ws_products_getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

// function to compare arrays
function ws_products_arrayCompare(a1, a2) {
    if (a1.length != a2.length) return false;
    var length = a2.length;
    for (var i = 0; i < length; i++) {
        if (a1[i] !== a2[i]) return false;
    }
    return true;
}

// function to check if an value is in an array
function ws_products_inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(typeof haystack[i] == 'object') {
            if(ws_products_arrayCompare(haystack[i], needle)) return true;
        } else {
            if(haystack[i] == needle) return true;
        }
    }
    return false;
}


// creates all functions for product filter
function ws_products_createFilter(filterObj) {

    var $ = jQuery;
    var $prevFilter = false;

    // reset  cookie used for email request form every time
    ws_products_setCookie('filterEmailRequest', '');
    
    if(ws_products_getCookie('filter') != '') {
        $prevFilter = $.parseJSON(ws_products_getCookie('filter'));
        if($prevFilter.hasOwnProperty(parseInt($selectedCategory))) {
            $.each($prevFilter[parseInt($selectedCategory)], function ($key, $value) {
                if ($key !== 'active' && $prevFilter[parseInt($selectedCategory)]['active'] && $key !== 'Length') {
                    ws_products_getNewLinks($key);
                    ws_products_createSlider($('#filter-' + parseInt($key)), filterObj, $value, $prevFilter[parseInt($selectedCategory)]['Length']);
                }
            });
        }
    }

    $('.wsProducts.productFilterIcon').each(function() {
        $(this).click(function() {
            ws_products_getNewLinks($(this).attr('data-appid'));
            ws_products_createSlider($(this), filterObj, false, false);
        });
    });
}

// function to receive new links on application change
function ws_products_getNewLinks($application) {
    var $ = jQuery;
    $('.filterListItem').addClass('ajaxCall');
    $('.filterListItem').each(function() {
        var $that = $(this);
        $.ajax({
            url: '?id=' + $pageUid + '&type=1666&tx_wsproducts_product[action]=ajaxlink&tx_wsproducts_product[application]=' + $application + '&tx_wsproducts_product[product]=' + $that.attr('data-productid') + '&L=' + $('body').data('langid'),
            success: function (response) {
                console.log(response);
                $prodUrl = response.substring(response.indexOf('href=') + 6, response.indexOf('">'));
                $that.find('a').each(function() {
                    // set new links and exclude addCompare
                    if (!$(this).hasClass('addCompare')) {
                        $(this).attr('href', $prodUrl.replace(/&amp;/g, '&'));
                    }
                });
                $($that).removeClass('ajaxCall');
            }
        });

    });
}

// create the value slider for product search
function ws_products_createSlider(applicationClick, filterObj, $prevSelectedSize, $length) {
    var $ = jQuery;
    var $valueFilterArea = $('.productFilterSlider');
    var $slideCount = 1;
    var $that = applicationClick;
    var $thirdCrit = false;

    $('.lableChooseKapa ol li .ws_showall').addClass('filter_inactive');
    $('.lableChooseKapa ol li .ws_showFiltered').addClass('filter_inactive');

    // hide all products for beginning
    $('.filterListItem').hide();
    $('.wsProducts.productFilterIcon2').removeClass('activeApplication');

    //set active filter
    $('.wsProducts.productFilterIcon').each(function() {
        $(this).removeClass('activeApplication');
    });
    $that.addClass('activeApplication');

    var $app = filterObj[$that.attr('data-appid')];
    if(!$prevSelectedSize) {
        delete $app.data;
    }

    // duplicate the app array for better workflows
    var $app2 = $app;

    // just if ther is a slider value
    if(filterObj['SectionLength'] !== null) {
        $thirdCrit = true;
        $('.wsProducts.productFilterIcon2').addClass('showFilter');
        if($('.wsProducts.productFilterIcon.activeApplication').length > 0) {
            $('.wsProducts.productFilterSlider').html('<select class="wsProducts productFilterSelect" disabled="disabled"><option>&nbsp;</option></select>');
            var slider = $("<div id='slider'></div>").insertAfter($('.wsProducts.productFilterSelect'));
            slider.slider();
            slider.slider('disable');
        }
    }
    
    // do this procedure just one time for each app
    if (typeof isAppReversed[$that.attr('data-appid')] === 'undefined') {
        // reverse sorting to display products in right order
        $.each($app2, function($key, $val) {
            // if key is an integer
            if (parseInt($key) > 0) {
                $app2[$key].reverse();
            }
        });
        isAppReversed[$that.attr('data-appid')] = true;
    }

    // special case if there is a third criteria
    if($thirdCrit) {
        findApplicationProducts($app2);

        $('.wsProducts.productFilterIcon2').each(function() {
            $(this).off('click');
            $(this).click(function() {
                var $myLength = $(this).attr('data-appid');
                $slideCount = 1;
                $app2 = new Object();
                var allPossible = new Array();

                $('.filterListItem').hide();

                $('.wsProducts.productFilterIcon2').each(function() {
                    $(this).removeClass('activeApplication');
                });
                $(this).addClass('activeApplication');

                $.each(filterObj['SectionLength'][$(this).attr('data-appid')], function($lengthKey, $lengthVal) {
                    if($app.hasOwnProperty($lengthKey)) {

                        if (!$app2.hasOwnProperty($lengthKey)) {
                            $app2[$lengthKey] = new Array();
                        }

                        for (index = 0; index < $lengthVal.length; index++) {
                            if ($app[$lengthKey].indexOf($lengthVal[index]) >= 0) {
                                $app2[$lengthKey].push($lengthVal[index]);
                                if(allPossible.indexOf($lengthVal[index]) < 0) {
                                    allPossible.push($lengthVal[index]);
                                }
                            }
                        }

                        if ($app2[$lengthKey].length <= 0) {
                            delete $app2[$lengthKey];
                        }

                        $valueFilterArea.html('');
                        console.log(allPossible);
                    }
                });
                createRightSliderElement($app2, $prevSelectedSize, $valueFilterArea, $that, $myLength, allPossible);
            });

            if($(this).attr('data-appid') == $length) {
                $(this).trigger('click');
                $length = -1000;
            }
        });

    } else {
        findApplicationProducts($app2);

        $valueFilterArea.html('');
        var allPossible = new Array();
        allPossible = $app2;

        createRightSliderElement($app2, $prevSelectedSize, $valueFilterArea, $that, null, allPossible);
    }
}

// function to make products visible by application
function findApplicationProducts($application) {
    var $ = jQuery;
    delete $application.data;

    $.each($application, function ($key, $val) {
        $.each($val, function($skey, $device) {
            $('#product-' + $device).show();
        });
    });
}

// function to fade in a product
function fadeInProducts(element, index, array) {
    element.prependTo(element.parent());
    element.show();
}

// adds a product to the compare tool
var $compareTool = $('.compareTool');
function ws_products_addCompare(productId, ajaxUrl) {
    var $ = jQuery;
    var $compareCookie = ws_products_getCookie('compare');
    var $compareArray = new Array();

    if ($compareCookie != '') {
        $compareArray = $.parseJSON($compareCookie);
    }

    // just if this product is not already in
    if (!ws_products_inArray(productId, $compareArray)) {
        // just if there are less then 3 already in
        if($compareArray.length < 3) {
            $compareArray.push(productId);
            ws_products_setCookie('compare', JSON.stringify($compareArray), 10);
            $.ajax({
                url: ajaxUrl + '?type=1666' + '&L=' + $('body').data('langid'),
                success: function (response) {
                    var $product = $.parseJSON(response);
                    var $newContent = ws_products_createCompareItem($product['uid'], $product['productName'], $product['productPreviewImage']);
                    $compareContent += $newContent;
                    $compareTool.tooltipster('content', $($newContent));
                    $('.compareTool').tooltipster('enable');
                    $compareTool.tooltipster('show');
                    $('.tooltipster-base').css('position', 'fixed');
                    window.setTimeout("$compareTool.tooltipster('hide')", 1500);
                    window.setTimeout("$compareTool.tooltipster('content', $($compareContent + $compareButton))", 2000);
                }
            });
        } else {
            // if there are already 3 in compare tool throw error message
            var $errorMessage = '<span class="compareAllreadyError">' + $locallang[$currentlangkey]['moreThanThree'] + '</span>';
            $compareTool.tooltipster('content', $($errorMessage));
            $('.compareTool').tooltipster('enable');
            $compareTool.tooltipster('show');
            $('.tooltipster-base').css('position', 'fixed');
            window.setTimeout("$compareTool.tooltipster('hide')", 1500);
            window.setTimeout("$compareTool.tooltipster('content', $($compareContent + $compareButton))", 2000);
        }
        ws_products_countCompare($compareArray);
    } else {
        // if this product is already in throw error message
        var $errorMessage = '<span class="compareCountError">' + $locallang[$currentlangkey]['alreadyInCompare'] + '</span>';
        $compareTool.tooltipster('content', $($errorMessage));
        $('.compareTool').tooltipster('enable');
        $compareTool.tooltipster('show');
        $('.tooltipster-base').css('position', 'fixed');
        window.setTimeout("$compareTool.tooltipster('hide')", 1500);
        window.setTimeout("$compareTool.tooltipster('content', $($compareContent + $compareButton))", 2000);
    }
}

// removes a product from compare tool
function ws_products_removeCompare(productId) {
    var $ = jQuery;
    var $compareCookie = ws_products_getCookie('compare');
    var $compareArray = new Array();
    $compareContent = '';

    if($compareCookie != '') {
        $compareArray = $.parseJSON($compareCookie);
    }

    $('#productHeader-' + productId).fadeOut(500).remove();
    $('#productFixedHeader-' + productId).animate({'width':0},500, function() {
        $(this).remove();
    });
    $('#productAttributes-' + productId).animate({'width':0},500, function() {
        $(this).remove();
    });

    // just if it is realy in the compare array
    if(ws_products_inArray(productId, $compareArray)) {
        var $index = $compareArray.indexOf(String(productId));
        if($index > -1) {
            $compareArray.splice($index, 1);
        }

        if($compareArray.length > 0) {
            $.each($compareArray, function ($key, $val) {
                $.ajax({
                    url: 'home/?tx_wsproducts_product[product]=' + $val + '&tx_wsproducts_product[action]=ajaxcompare&tx_wsproducts_product[controller]=Product&type=1666' + '&L=' + $('body').data('langid'),
                    async: false,
                    success: function (response) {
                        var $product = $.parseJSON(response);
                        $compareContent += ws_products_createCompareItem($product['uid'], $product['productName'], $product['productPreviewImage']);
                    }
                });
            });
        }

        ws_products_countCompare($compareArray);

        if($compareArray.length <= 0) {
            ws_products_setCookie('compare', '');
            $('.compareTool').tooltipster('content', noProducts);
            $('.compareTool').children('.compareItemsCount').remove();
        } else {
            ws_products_setCookie('compare', JSON.stringify($compareArray), 10);
            $('.compareTool').tooltipster('enable');
            $('.compareTool').tooltipster('content', $($compareContent + $compareButton));
        }
    }
}

// function to remove all products from compare array
function ws_products_removeAllCompare() {
    var $ = jQuery;
    $('.previewImage').each(function() {
        ws_products_removeCompare($(this).attr('data-product'));
    });
}

// function to create compare items everytime the same way
function ws_products_createCompareItem(uid, productName, productPreviewImage) {
    return '<div class="wsProducts compareAddItem">' +
        '<a href="produkte/maschinen/details/?tx_wsproducts_product[product]=' + parseInt(uid) + '&tx_wsproducts_product[action]=show&tx_wsproducts_product[controller]=Product">' +
        '   <span class="wsProducts compareProductName">' + productName + '</span><br>' +
        '   <img src="' + productPreviewImage + '" />' +
        '   <a class="wsProducts compareRemoveItem productsSprite" onClick="ws_products_removeCompare(' + uid + ')">X</a>' +
        '</div>';
}

// function to set count icon to compare tool
function ws_products_countCompare(items) {
    var $ = jQuery;
    var $numberOfItems = items.length;
    $('.compareTool').children('.compareItemsCount').remove();
    $('.compareTool').prepend('<span class="wsProducts compareItemsCount">' + $numberOfItems + '</span>');
}


// info buttons
function ws_products_openInfoTab(icon) {
    var $ = jQuery;
    var $infoTab = icon.next('.productDetailInfoIconsItemContent');
    var $width = 720;
    var $setRight = false;

    icon.hover(function() {
        icon.css('z-index', 9999);
        $infoTab.css({
            'position': 'absolute',
            'left': ($width - icon.parent().innerWidth()) / 2 * (-1),
        });
        $infoTab.stop().fadeIn(300);
        window.setTimeout('infoTabCheck(".productDetailInfoIconsItemContent")', 3);
    }, function() {
        $infoTab.stop().fadeOut(300);
        icon.css('z-index', '1');
    });

    icon.swipe({
       tap: function() {
           if(!icon.hasClass('open')) {
               icon.addClass('open');
               icon.css('z-index', 9999);
               $infoTab.css({
                   'position': 'absolute',
                   'left': ($width - icon.parent().innerWidth()) / 2 * (-1),
               });
               $infoTab.stop().fadeIn(300);
               window.setTimeout('infoTabCheck(".productDetailInfoIconsItemContent")', 3);
           } else {
               $infoTab.stop().fadeOut(300);
               icon.css('z-index', '1');
               icon.removeClass('open');
           }
       }
    });

}

// positional settings of info icons
function infoTabCheck($infoTab) {
    $($infoTab).each(function() {
        if($(window).innerWidth() < $(this).offset().left + $(this).outerWidth(true)) {
            $(this).css('left', $(window).innerWidth() -$(this).prev('.productDetailInfoIconsItemOpen').offset().left - $(this).outerWidth(true));
        }
        
        // set info text over i icon if text leaves window screen to bottom
        $(this).removeClass('topPosition');
        if ($(window).innerHeight() + $(window).scrollTop() < $(this).offset().top + $(this).outerHeight(true)) {
            $(this).addClass('topPosition');
        }
    });
}
