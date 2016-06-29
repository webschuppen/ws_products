
function createRightSliderElement($app2, $prevSelectedSize, $valueFilterArea, $that, $myLength, $allPossible) {
    var $slideCount = 1;
    var $ = jQuery;
    var $filterDom = '';
    var $filterDomBottom = '';
    var $filterArray = new Object();
    var $selectedSize = 0;
    var $highestValue = '';
    var $lowestValue = '';

    $.each($app2, function ($key, $val) {
        if ($key !== 'data') {
            if ($slideCount == 1) {
                $lowestValue = $key;
            }

            $highestValue = $key;
            if (!$prevSelectedSize) {
                $valueFilterArea.append('<option value="' + $slideCount + '">' + $key + '</option>');
                if ($slideCount === 1) {
                    $selectedSize = $key;

                    $.each($allPossible, function ($mKey, $mVal) {
                        fadeInProducts($('#product-' + $mVal));
                    });
                }
            } else {
                if ($key == $prevSelectedSize) {
                    $valueFilterArea.append('<option selected="selected" value="' + $slideCount + '">' + $key + '</option>');
                    $selectedSize = $key;

                    /** only needed if first filter is selected automatically **/
                    $.each($app2[$selectedSize], function ($mKey, $mVal) {
                        fadeInProducts($('#product-' + $mVal));
                    });
                } else {
                    $valueFilterArea.append('<option value="' + $slideCount + '">' + $key + '</option>');
                }
            }
            $slideCount++;

            // set the filter cookie
            if (ws_products_getCookie('filter') != '') {
                $filterArray = $.parseJSON(ws_products_getCookie('filter'));
            }
            $filterArray[$selectedCategory] = new Object();
            $filterArray[$selectedCategory][$that.attr('data-appid')] = $selectedSize;
            $filterArray[$selectedCategory]['active'] = true;
            if($myLength !== null) {
                $filterArray[$selectedCategory]['Length'] = $myLength;
            }
            ws_products_setCookie('filter', JSON.stringify($filterArray), 10);

            ws_products_setCookie('filterEmailRequest', '');
            ws_products_setCookie('filterEmailRequest', JSON.stringify($filterArray), 10);
        }
    });

    // create the select box
    $valueFilterArea.html('<select class="ws_products productFilterSelect">' + $valueFilterArea.html() + '</select>');
    var $select = $valueFilterArea.children('.productFilterSelect');

    // create the slider and add behaviour on change
    if ($selectedCategory != 5) {
        var slider = $("<div id='slider'></div>").insertAfter($select).slider({
            min: 1,
            max: parseInt($select.children('option:last-child').attr('value')),
            range: false,
            step: $select.length,
            value: $select[0].selectedIndex + 1,
            slide: function (event, ui) {
                $select[0].selectedIndex = ui.value - 1;
                $selectedSize = $select[0][$select[0].selectedIndex].innerHTML;
                $('.filterListItem').hide();

                //changing the order
                var $itemSortArray = new Array();

                $.each($app2[$selectedSize], function ($key, $val) {
                    if (parseInt($val) >= 0) {
                        $itemSortArray.push($('#product-' + $val));
                    }
                });

                $itemSortArray.forEach(fadeInProducts);

                $('.nippleValue').each(function () {
                    if ($(this).html() == $selectedSize) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });

                // adding a nice div to top and one to bottom of slider which shows the actually selected size
                if ($filterDom.length > 0) {
                    $filterDom.stop(true);
                    $filterDom.show();
                    $filterDom.html($selectedSize);
                    $filterDomBottom.html('<span class="wsProducts filterBottomLine"></span><br>' + $selectedSize);
                } else {
                    slider.children('.ui-slider-handle').prepend('<div class="wsProducts filterValueTop">' + $selectedSize + '</div>');
                    $filterDom = $('.wsProducts.filterValueTop');
                    $filterDom.css({
                        'left': ($filterDom.outerWidth() / 2 - slider.children('.ui-slider-handle').innerWidth() / 2 ) * (-1)
                    });
                    $filterDomBottom.html('<span class="wsProducts filterBottomLine"></span><br>' + $selectedSize);
                }
                $filterDom.animate({'opacity': 1}, 1000).fadeOut(500);

                // set the filter cookie
                //$filterArray[$that.attr('data-appid')] = $selectedSize;
                if (ws_products_getCookie('filter') != '') {
                    $filterArray = $.parseJSON(ws_products_getCookie('filter'));
                }
                $filterArray[$selectedCategory] = new Object();
                $filterArray[$selectedCategory][$that.attr('data-appid')] = $selectedSize;
                $filterArray[$selectedCategory]['active'] = true;
                if($myLength !== null) {
                    $filterArray[$selectedCategory]['Length'] = $myLength;
                }
                ws_products_setCookie('filter', JSON.stringify($filterArray), 10);

                ws_products_setCookie('filterEmailRequest', '');
                ws_products_setCookie('filterEmailRequest', JSON.stringify($filterArray), 10);
            }
        });

        if(!$prevSelectedSize) {
            slider.slider("option", "disabled", true);
            $('.lableChooseKapa ol li .ws_showFiltered').removeClass('filter_inactive');
        } else {
          $('.lableChooseKapa ol li .ws_showall').removeClass('filter_inactive');
        }

        $('.lableChooseKapa ol li .ws_showall').off('click');
        $('.lableChooseKapa ol li .ws_showall').on('click', function(e) {
            if(!$(this).hasClass('filter_inactive')) {
                $(this).addClass('filter_inactive');
                $('.lableChooseKapa ol li .ws_showFiltered').removeClass('filter_inactive');
                slider.slider("option", "disabled", true);
                $.each($allPossible, function ($mKey, $mVal) {
                    fadeInProducts($('#product-' + $mVal));
                });
                e.preventDefault();
                return false;
            }
        });

        $('.lableChooseKapa ol li .ws_showFiltered').off('click');
        $('.lableChooseKapa ol li .ws_showFiltered').on('click', function(e) {
            if(!$(this).hasClass('filter_inactive')) {
                $(this).addClass('filter_inactive');
                $('.lableChooseKapa ol li .ws_showall').removeClass('filter_inactive');
                slider.slider("option", "disabled", false);
                $select[0].selectedIndex = slider.slider('value').innerHTML - 1;
                $selectedSize = $select[0][$select[0].selectedIndex].innerHTML;

                //console.log($app2[$selectedSize]);

                var $itemSortArray = new Array();
                $('.filterListItem').hide();
                $.each($app2[$selectedSize], function ($key, $val) {

                    if (parseInt($val) >= 0) {
                        fadeInProducts($('#product-' + $val));
                    }
                });

                e.preventDefault();
                return false;
            }
        });

        for ($i = 0; $i < $slideCount - 1; $i++) {
            if ($i == 0) {
                if ($lowestValue === $selectedSize) {
                    slider.append('<div class="nipple" style="position:absolute;left:' + (100 / ($slideCount - 2) * $i - 0.3) + '%;">I<span style="position: absolute; display: none;" class="nippleValue">' + $lowestValue + '</span></div>')
                } else {
                    slider.append('<div class="nipple" style="position:absolute;left:' + (100 / ($slideCount - 2) * $i - 0.3) + '%;">I<span style="position: absolute;" class="nippleValue">' + $lowestValue + '</span></div>')
                }
            } else if ($i == $slideCount - 2) {
                slider.append('<div class="nipple" style="position:absolute;left:' + (100 / ($slideCount - 2) * $i - 0.3) + '%;">I<span style="position: absolute" class="nippleValue">' + $highestValue + '</span></div>')
            } else {
                slider.append('<div class="nipple" style="position:absolute;left:' + (100 / ($slideCount - 2) * $i - 0.3) + '%;">I</div>')
            }
        }

        $('.nippleValue').each(function () {
            $(this).css('left', ($(this).outerWidth(true) - $(this).parent().innerWidth()) / 2 * (-1));
        });

        slider.children('.ui-slider-handle').append('<div class="wsProducts filterValueBottom"><span class="wsProducts filterBottomLine"></span><br>' + $selectedSize + '</div>');
        $filterDomBottom = $('.wsProducts.filterValueBottom');
        $filterDomBottom.css({
            'left': ($filterDomBottom.outerWidth() / 2 - slider.children('.ui-slider-handle').innerWidth() / 2 ) * (-1)
        });

        // behaviour on select change (change the bar, too)
        $select.change(function () {
            slider.slider("value", this.selectedIndex + 1);
            $selectedSize = $select[0][this.selectedIndex].innerHTML;
            $('.filterListItem').stop().fadeOut(500);
            $.each($app2[$selectedSize], function ($key, $val) {
                $('#product-' + $val).stop().fadeIn(500);
            });

            // set the filter cookie
            if (ws_products_getCookie('filter') != '') {
                $filterArray = $.parseJSON(ws_products_getCookie('filter'));
            }
            $filterArray[$selectedCategory] = new Object();
            $filterArray[$selectedCategory][$that.attr('data-appid')] = $selectedSize;
            $filterArray[$selectedCategory]['active'] = true;
            if($myLength !== null) {
                $filterArray[$selectedCategory]['Length'] = $myLength;
            }

            ws_products_setCookie('filter', JSON.stringify($filterArray), 10);

            ws_products_setCookie('filterEmailRequest', '');
            ws_products_setCookie('filterEmailRequest', JSON.stringify($filterArray), 10);
        });
    }
};
