/*!
 * jQuery ClassyCountdown
 * vox.SPACE
 *
 * Written by Marius Stanciu - Sergiu <marius@vox.space>
 * Licensed under the MIT license https://vox.SPACE/LICENSE-MIT
 * Version 1.1.0
 *
 */

(function($) {
    $.fn.ClassyCountdown = function(options, callback) {
        var element = $(this);
        var DaysLeft, HoursLeft, MinutesLeft, SecondsLeft;
        var secondsLeft;
        var isFired = false;
        var settings = {
            end: undefined,
            now: $.now(),
            labels: true,
            labelsOptions: {
                lang: {
                    days: 'Days',
                    hours: 'Hours',
                    minutes: 'Minutes',
                    seconds: 'Seconds'
                },
                style: 'font-size: 0.5em;color:#888;text-transform: uppercase;'
            },
            style: {
                element: '',
                labels: false,
                textResponsive: 0.5,
                days: {
                    gauge: {
                        thickness: 0.03,
                        bgColor: "#eee",
                        fgColor: "#b8cd06",
                        lineCap: 'butt'
                    },
                    textCSS: 'color:#343434;'
                },
                hours: {
                    gauge: {
                        thickness: 0.03,
                        bgColor: "#eee",
                        fgColor: "#b8cd06",
                        lineCap: 'butt'
                    },
                    textCSS: 'color:#343434;'
                },
                minutes: {
                    gauge: {
                        thickness: 0.03,
                        bgColor: "#eee",
                        fgColor: "#b8cd06",
                        lineCap: 'butt'
                    },
                    textCSS: 'color:#343434;'
                },
                seconds: {
                    gauge: {
                        thickness: 0.03,
                        bgColor: "#eee",
                        fgColor: "#b8cd06",
                        lineCap: 'butt'
                    },
                    textCSS: 'color:#343434;'
                }
            },
            onEndCallback: function() {
            }
        };
        if (options.theme) {
            settings = $.extend(true, settings, getPreset(options.theme));
        }
        settings = $.extend(true, settings, options);
        prepare();
        doTick();
        setInterval(doTick, 1000);
        doResponsive();
        function prepare() {
            element.append('<div class="ClassyCountdown-wrapper">' +
                    '<div class="ClassyCountdown-days">' +
                        '<input type="text" />' +
                        '<span class="ClassyCountdown-value"><div></div><span></span></span>' +
                    '</div>' +
                    '<div class="ClassyCountdown-hours">' +
                        '<input type="text" />' +
                        '<span class="ClassyCountdown-value"><div></div><span></span></span>' +
                    '</div>' +
                    '<div class="ClassyCountdown-minutes">' +
                        '<input type="text" />' +
                        '<span class="ClassyCountdown-value"><div></div><span></span></span>' +
                    '</div>' +
                    '<div class="ClassyCountdown-seconds">' +
                        '<input type="text" />' +
                        '<span class="ClassyCountdown-value"><div></div><span></span></span>' +
                    '</div>' +
                '</div>');
            element.find('.ClassyCountdown-days input').knob($.extend({
                width: '100%',
                displayInput: false,
                readOnly: true,
                max: 365
            }, settings.style.days.gauge));
            element.find('.ClassyCountdown-hours input').knob($.extend({
                width: '100%',
                displayInput: false,
                readOnly: true,
                max: 24
            }, settings.style.hours.gauge));
            element.find('.ClassyCountdown-minutes input').knob($.extend({
                width: '100%',
                displayInput: false,
                readOnly: true,
                max: 60
            }, settings.style.minutes.gauge));
            element.find('.ClassyCountdown-seconds input').knob($.extend({
                width: '100%',
                displayInput: false,
                readOnly: true,
                max: 60
            }, settings.style.seconds.gauge));
            element.find('.ClassyCountdown-wrapper > div').attr("style", settings.style.element);
            element.find('.ClassyCountdown-days .ClassyCountdown-value').attr('style', settings.style.days.textCSS);
            element.find('.ClassyCountdown-hours .ClassyCountdown-value').attr('style', settings.style.hours.textCSS);
            element.find('.ClassyCountdown-minutes .ClassyCountdown-value').attr('style', settings.style.minutes.textCSS);
            element.find('.ClassyCountdown-seconds .ClassyCountdown-value').attr('style', settings.style.seconds.textCSS);
            element.find('.ClassyCountdown-value').each(function() {
                $(this).css('margin-top', Math.floor(0 - (parseInt($(this).height()) / 2)) + 'px');
            });
            if (settings.labels) {
                element.find(".ClassyCountdown-days .ClassyCountdown-value > span").html(settings.labelsOptions.lang.days);
                element.find(".ClassyCountdown-hours .ClassyCountdown-value > span").html(settings.labelsOptions.lang.hours);
                element.find(".ClassyCountdown-minutes .ClassyCountdown-value > span").html(settings.labelsOptions.lang.minutes);
                element.find(".ClassyCountdown-seconds .ClassyCountdown-value > span").html(settings.labelsOptions.lang.seconds);
                element.find(".ClassyCountdown-value > span").attr("style", settings.labelsOptions.style);
            }
            secondsLeft = (settings.end - settings.now)/1000;
            secondsToDHMS();
        }
        function secondsToDHMS() {
            DaysLeft = Math.floor(secondsLeft / 86400);
            HoursLeft = Math.floor((secondsLeft % 86400) / 3600);
            MinutesLeft = Math.floor(((secondsLeft % 86400) % 3600) / 60);
            SecondsLeft = Math.floor((((secondsLeft % 86400) % 3600) % 60) % 60);
        }
        function doTick() {
            secondsLeft--;
            secondsToDHMS();
            if (secondsLeft <= 0) {
                if (!isFired) {
                    isFired = true;
                    settings.onEndCallback();
                }
                DaysLeft = 0;
                HoursLeft = 0;
                MinutesLeft = 0;
                SecondsLeft = 0;
            }
            element.find('.ClassyCountdown-days input').val(365 - DaysLeft).trigger('change');
            element.find('.ClassyCountdown-hours input').val(24 - HoursLeft).trigger('change');
            element.find('.ClassyCountdown-minutes input').val(60 - MinutesLeft).trigger('change');
            element.find('.ClassyCountdown-seconds input').val(60 - SecondsLeft).trigger('change');
            element.find('.ClassyCountdown-days .ClassyCountdown-value > div').html(DaysLeft);
            element.find('.ClassyCountdown-hours .ClassyCountdown-value > div').html(HoursLeft);
            element.find('.ClassyCountdown-minutes .ClassyCountdown-value > div').html(MinutesLeft);
            element.find('.ClassyCountdown-seconds .ClassyCountdown-value > div').html(SecondsLeft);
        }
        function doResponsive() {
            element.find('.ClassyCountdown-wrapper > div').each(function() {
                $(this).css('height', $(this).width() + 'px');
            });
            if (settings.style.textResponsive) {
                element.find('.ClassyCountdown-value').css('font-size', Math.floor(element.find('> div').eq(0).width() * settings.style.textResponsive / 10) + 'px');
                element.find('.ClassyCountdown-value').each(function() {
                    $(this).css('margin-top', Math.floor(0 - (parseInt($(this).height()) / 2)) + 'px');
                });
            }
            $(window).trigger('resize');
            $(window).resize($.throttle(50, onResize));
        }
        function onResize() {
            element.find('.ClassyCountdown-wrapper > div').each(function() {
                $(this).css('height', $(this).width() + 'px');
            });
            if (settings.style.textResponsive) {
                element.find('.ClassyCountdown-value').css('font-size', Math.floor(element.find('> div').eq(0).width() * settings.style.textResponsive / 10) + 'px');
            }
            element.find('.ClassyCountdown-value').each(function() {
                $(this).css("margin-top", Math.floor(0 - (parseInt($(this).height()) / 2)) + 'px');
            });
            element.find('.ClassyCountdown-days input').trigger('change');
            element.find('.ClassyCountdown-hours input').trigger('change');
            element.find('.ClassyCountdown-minutes input').trigger('change');
            element.find('.ClassyCountdown-seconds input').trigger('change');
        }
        function getPreset(theme) {
            switch (theme) {
                case 'light':
                    return {
                        labels: true,
                        style: {
                            element: '',
                            textResponsive: 0.5,
                            days: {
                                gauge: {
                                    thickness: 0.03,
                                    bgColor: "rgba(255,255,255,.5)",
                                    fgColor: "#fff"
                                },
                                textCSS: 'color: #fff;text-shadow: 1px 1px 1px rgba(0,0,0,.1);'
                            },
                            hours: {
                                gauge: {
                                    thickness: 0.03,
                                    bgColor: "rgba(255,255,255,.5)",
                                    fgColor: "#fff"
                                },
                                textCSS: 'color: #fff;text-shadow: 1px 1px 1px rgba(0,0,0,.1);'
                            },
                            minutes: {
                                gauge: {
                                    thickness: 0.03,
                                    bgColor: "rgba(255,255,255,.5)",
                                    fgColor: "#fff"
                                },
                                textCSS: 'color: #fff;text-shadow: 1px 1px 1px rgba(0,0,0,.1);'
                            },
                            seconds: {
                                gauge: {
                                    thickness: 0.03,
                                    bgColor: "rgba(255,255,255,.5)",
                                    fgColor: "#fff"
                                },
                                textCSS: 'color: #fff;text-shadow: 1px 1px 1px rgba(0,0,0,.1);'
                            }
                        }
                    };
                case 'light-green':
                    return {
                        labels: true,
                        style: {
                            element: '',
                            textResponsive: 0.5,
                            days: {
                                gauge: {
                                    thickness: 0.03,
                                    bgColor: "rgba(255,255,255,.5)",
                                    fgColor: "#b8cd06"
                                },
                                textCSS: 'color: #fff;text-shadow: 1px 1px 1px rgba(0,0,0,.1);'
                            },
                            hours: {
                                gauge: {
                                    thickness: 0.03,
                                    bgColor: "rgba(255,255,255,.5)",
                                    fgColor: "#b8cd06"
                                },
                                textCSS: 'color: #fff;text-shadow: 1px 1px 1px rgba(0,0,0,.1);'
                            },
                            minutes: {
                                gauge: {
                                    thickness: 0.03,
                                    bgColor: "rgba(255,255,255,.5)",
                                    fgColor: "#b8cd06"
                                },
                                textCSS: 'color: #fff;text-shadow: 1px 1px 1px rgba(0,0,0,.1);'
                            },
                            seconds: {
                                gauge: {
                                    thickness: 0.03,
                                    bgColor: "rgba(255,255,255,.5)",
                                    fgColor: "#b8cd06"
                                },
                                textCSS: 'color: #fff;text-shadow: 1px 1px 1px rgba(0,0,0,.1);'
                            }
                        }
                    };
            }
        }
    };
})(jQuery);