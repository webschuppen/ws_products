/*!
 * ws_productsImages v1.0.0 beta // 2015.05.22 // jQuery v1.9.1+
 *
 * Copyright 2015 webschuppen GmbH
 * http://www.webschuppen.com
 *
 * If you want to use this code within your project, please contact
 * us with an eMail to technik@webschuppen.com
 *
 * Todo: more comments have to be added
 */

(function($) {
    $.fn.ws_productsImages = function(params) {
        //set the default variables and combining user settings with defaults in options
        var $defaults = {
            imageContainer: '.productDetailDetailsImage',   //container class for slides
            captionSpeed: 300,                              //caption scroll up/down speed
            previewImageWidth: 98,
            previewImageHeight: 68,
            scrollSpeed: 1000, 							    //scroll speed multiplier
            imageFadeInTime: 500,
            debug: false                                    //debug on(true)/off(false)
        };
        var $options = $.extend({}, $defaults, params);

        var $container = this;
        var $tempCount = 0;
        var $previewSize = 0;

        //preparing the DOM
        $container.html('<div class="wsProducts productImagePreviewBig"></div><div class="wsProducts productImagePreviewSmall" style="width: 100%; overflow: hidden;">' + $container.html() + '</div>')
        var $previewBigContainer = $container.find('.wsProducts.productImagePreviewBig');
        var $previewSmallContainer = $container.find('.wsProducts.productImagePreviewSmall');

        $previewSmallContainer.prepend('<div class="ws_productsImageBackward" style="position:absolute;left:0;">&nbsp;</div>');
        $previewSmallContainer.append('<div class="ws_productsImageForward" style="position:absolute;right:0">&nbsp;</div>');

        var $backward = $previewSmallContainer.find('.ws_productsImageBackward');
        var $forward = $previewSmallContainer.find('.ws_productsImageForward');

        $tempCount = 0;
        $container.find($options.imageContainer).each(function() {

            $previewBigContainer.append('<div class="wsProducts previewImageBigContainer"><a class="lightbox" style="display:block" href="' + $(this).children('img').attr('src') + '"  data-fancybox-group="prodImage">' + $(this).html() + '</a><div class="wsProducts imageCaption">' + $(this).children('img').attr('data-title') + '<div class="imageDesc">' + $(this).children('img').attr('data-caption') + '</div></div></div>');

            var $imageThis = $(this).find('img').attr('src');
            $(this).find('img').remove();

            $(this).css({
                'width': $options.previewImageWidth,
                'height': $options.previewImageHeight,
                'float': 'left',
                'overflow': 'hidden',
                'background-image': 'url(' + $imageThis + ')',
                'background-size': 'cover',
                'background-position': 'center',
                'cursor': 'pointer'
            });
            $(this).addClass('previewImage');
            if($tempCount === 0) {
                $(this).addClass('activeImage');
            }
            $(this).attr('data-slide', $tempCount);
            $tempCount++;

            $(this).click(function() {
                var $that = $(this);
                $previewBigContainer.find('.previewImageBigContainer').each(function() {
                    if($that.attr('data-slide') === $(this).attr('data-slide')) {
                        $(this).css({
                            'z-index' : 13,
                            'display': 'none'
                        });

                        $(this).fadeIn($options.imageFadeInTime, function() {
                            $temp = $(this);
                            $previewBigContainer.find('.previewImageBigContainer').each(function() {
                                if($(this) != $temp) {
                                    $(this).css('z-index', 10);
                                }
                            });
                            $(this).css('z-index', 12);
                        });
                    }
                });
                $that.siblings().each(function() {
                    $(this).removeClass('activeImage');
                });
                $that.addClass('activeImage');
            });

            $(this).swipe({
                tap: function() {
                    var $that = $(this);
                    $previewBigContainer.find('.previewImageBigContainer').each(function () {
                        if ($that.attr('data-slide') === $(this).attr('data-slide')) {
                            $(this).css({
                                'z-index': 12,
                                'display': 'none'
                            });

                            if($prevImage != false) {
                                $prevImage.css('z-index', 11);
                            }

                            $(this).fadeIn($options.imageFadeInTime, function() {
                                $temp = $(this);
                                $previewBigContainer.find('.previewImageBigContainer').each(function() {
                                    if($(this) != $temp && $(this) != $prevImage) {
                                        $(this).css('z-index', 10);
                                    }
                                });
                                $(this).css('z-index', 12);
                                $prevImage = $(this);
                            });
                        }
                    });
                    $that.siblings().each(function () {
                        $(this).removeClass('activeImage');
                    });
                    $that.addClass('activeImage');
                }
            });
        });

        $previewBigContainer.find('.wsProducts.previewImageBigContainer').each(function() {
            $(this).find('.wsProducts.imageCaption').css('position', 'absolute');

            $(this).hover(function() {
                $(this).find('.wsProducts.imageCaption').stop(true).animate({
                    'margin-top': $(this).find('.wsProducts.imageCaption').innerHeight() * (-1)
                }, 300, function () {
                    $(this).addClass('open');
                });
            }, function() {
                $(this).find('.wsProducts.imageCaption').stop(true).animate({
                    'margin-top': 0
                }, 300, function() {
                    $(this).removeClass('open');
                });
            });
        });

        var $slideableContainer = $previewSmallContainer.find('.productDetailDetailsImages');

        $previewSmallContainer.find('.previewImage').each(function() {
            $previewSize = $previewSize + $(this).outerWidth(true);
        });

        $slideableContainer.css({
            width: $previewSize
        });

        //check if the buttons have to be shown or not
        if ($container.innerWidth() < $slideableContainer.outerWidth(true)) {
            $forward.show();
        } else {
            $forward.hide();
        }
        if ($slideableContainer.css('margin-left') < 0) {
            $backward.show();
        } else {
            $backward.hide();
        }

        $(window).resize(function () {
            // hide useless arrow if images smaller as .productImagePreviewSmall
            if ($('.productImagePreviewSmall').width() > $('.productDetailDetailsImages').width()) {
                $('.ws_productsImageBackward, .ws_productsImageForward').hide();
            } else {
                if (parseInt($('.productDetailDetailsImages').css('margin-left')) === 0) {
                    $('.ws_productsImageForward').show();
                } else {
                    $('.ws_productsImageBackward').show();
                }
            }
        
            /*$speed = ($allElementsWidth + $containerInner.css('margin-left')) / 10 * ($options.scrollSpeed / 100);*/
            $movement = 0;
            if ($previewSize > $container.innerWidth()) {
                $movement = ($previewSize - $container.innerWidth()) * (-1);
            }
            if ($previewSize + parseInt($slideableContainer.css('margin-left')) > $container.innerWidth()) {
                $forward.show();
            }
            if ($previewSize - $container.innerWidth() <= 0) {
                $slideableContainer.css({
                    'margin-left': 0
                });
                $forward.show();
                $backward.hide();
            }
            if ($container.innerWidth() - parseInt($slideableContainer.css('margin-left')) > 0) {
                $slideableContainer.css({
                    'margin-left': ($previewSize - $container.innerWidth()) * (-1)
                });
            }
            if ($container.innerWidth() <=  $slideableContainer.outerWidth(true) + $previewSize) {
                $forward.show();
            } else {
                $forward.hide();
            }
            if ($slideableContainer.css('margin-left') < 0) {
                $backward.show();
            } else {
                $backward.hide();
            }
        });

        var $scrollMaxWidth = ($previewSize - $container.innerWidth()) * (-1);
        var $speed = ($previewSize + parseInt($slideableContainer.css('margin-left'))) / 10 * ($options.scrollSpeed / 100);

        //setting animations to button hovers
        $forward.hover(function () {
            $backward.fadeIn(300);
            $slideableContainer.animate({
                'margin-left': $scrollMaxWidth
            }, $speed, function () {					//TODO: getting more position based speed
                $forward.fadeOut(300);
            });
        }, function () {
            $slideableContainer.stop();
        });
        $forward.swipe({
            tap: function (event, target) {
                $backward.fadeIn(300);
                $slideableContainer.animate({
                    'margin-left': $scrollMaxWidth
                }, $speed, function () {					//TODO: getting more position based speed
                    $forward.fadeOut(300);
                });
            }
        });
        $backward.swipe({
            tap: function (event, target) {
                $forward.fadeIn(300);
                $slideableContainer.animate({
                    'margin-left': 0
                }, $speed, function () {					//TODO: getting more position based speed
                    $backward.fadeOut(300);
                });
            }
        });
        $backward.hover(function () {
            $forward.fadeIn(300);
            $slideableContainer.animate({
                'margin-left': 0
            }, $speed, function () {					//TODO: getting more position based speed
                $backward.fadeOut(300);
            });
        }, function () {
            $slideableContainer.stop();
        });

        if($scrollMaxWidth < 0) {
            var $position = parseInt($slideableContainer.css('margin-left'));
            $slideableContainer.swipe({
                swipeStatus:function(event, phase, direction, distance, duration, fingers) {
                    if(parseInt($slideableContainer.css('margin-left')) <= 0 && parseInt($slideableContainer.css('margin-left')) >= $scrollMaxWidth) {
                        if (direction == 'right') {
                            if($position + distance <= 0) {
                                $slideableContainer.css('margin-left', ($position + distance));
                                //$forward.show();
                            } else {
                                $slideableContainer.css('margin-left', 0);
                                //$backward.fadeOut();
                            }
                        }
                        if (direction == 'left') {
                            if($position - distance >= $scrollMaxWidth) {
                                $slideableContainer.css('margin-left', ($position - distance));
                                //$backward.show();
                            } else {
                                $slideableContainer.css('margin-left', $scrollMaxWidth);
                                //$forward.fadeOut();
                            }
                        }

                        if(phase == 'cancel' || phase == 'end') {
                            $position = parseInt($slideableContainer.css('margin-left'));
                        }
                    }
                },
                excludedElements: "button, input, select, textarea, .noSwipe"
            });
        }

        $tempCount = 0;
        $previewBigContainer.find('.previewImageBigContainer').each(function() {
            var $that = $(this);
            var $image = $(this).children('img');
            $(this).css({
                'width': '100%',
                'height': '100%',
                'overflow': 'hidden',
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'z-index': 10
            });
            if($image.outerHeight() > $image.outerWidth()) {
                $image.css({
                    'width': 'auto',
                    'height': '100%'
                });
                $image.css({
                    'margin-left': ($that.innerWidth() - $image.outerWidth()) / 2,
                });
            } else {
                $image.css({
                    'width': '100%',
                    'height': 'auto'
                });
                $image.css({
                    'margin-top': ($that.innerHeight() - $image.outerHeight()) / 2,
                });
            }
            $(this).attr('data-slide', $tempCount);
            if($tempCount === 0) {
                $(this).css('z-index', 11);
            }
            $tempCount++;
        });
        // call window resize
        $(window).trigger('resize');
        
        // show first image in productImagePreviewSmall
        $('.productDetailDetailsImages').css('margin-left', '');
        
        // hide useless arrow if images smaller as .productImagePreviewSmall
        if ($('.productImagePreviewSmall').width() > $('.productDetailDetailsImages').width()) {
            $('.ws_productsImageBackward, .ws_productsImageForward').hide();
        } else {
            if (parseInt($('.productDetailDetailsImages').css('margin-left')) === 0) {
                $('.ws_productsImageForward').show();
            } else {
                $('.ws_productsImageBackward').show();
            }
        }
    }
})(jQuery);