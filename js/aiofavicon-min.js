jQuery(document).ready(function(){removeWarning();loadFavicons();bindEventTriggers();bindChangeHandlers()});(function(a){removeWarning=function(){a("#javascriptWarning").hide()}})(jQuery);(function(a){loadFavicons=function(){a.each(Aiofavicon,function(c,d){var e='<img src="'+d+'" />';var b="#"+c+"-favicon";a(b).empty().html(e).fadeIn()})}})(jQuery);(function(a){bindEventTriggers=function(){var b=a("form#aio-favicon-settings-update");var c=b.find('input[type="button"]');c.removeAttr("disabled");console.debug("added hook to button inputs");c.click(function(){a(this).siblings('input[type="file"]').trigger("click");console.debug("fired hook on button input %s",a(this).attr("id"))})}})(jQuery);(function(a){bindChangeHandlers=function(){var c=a("form#aio-favicon-settings-update");var b=c.find('input[type="file"]');console.debug("added hook to file inputs");b.change(function(){a(this).siblings('input[type="text"]').val(a(this).val());console.debug("fired hook on file input %s",a(this).attr("id"))});b.click(function(){console.debug("click on file input %s",a(this).attr("id"))})}})(jQuery);