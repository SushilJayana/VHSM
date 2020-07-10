(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
	  $('#sidebar').toggleClass('active');
    });	
    
})(jQuery);

function Confirmation(obj, title, confirmMsg, OkLabel, CancelLabel, callback) {

    callback = typeof callback === 'undefined' ? null : callback;

    if (OkLabel == null)
        OkLabel = "Yes";

    if (CancelLabel == null)
        CancelLabel = "No";


    if (!confirmed) {
        $('body').append("<div id='dialog-confirm'><p>" + confirmMsg + "</p>");

        $("#dialog-confirm").dialog({
            title: title,
            resizable: false,
            height: "auto",
            width: "auto",
            open: function () {
                var closeBtn = $('.ui-dialog-titlebar-close');
                closeBtn.html('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
            },
            modal: true,
            buttons: [
                {
                    text: OkLabel,
                    click: function () {
                        $(this).dialog("close");
                        $('#dialog-confirm').remove();
                        confirmed = true;
                        if (obj)
                            obj.click();

                        if (callback) {
                            callback();
                        }
                    }
                },
                {
                    text: CancelLabel,
                    click: function () {
                        $(this).dialog("close");
                        confirmed = false;
                        $('#dialog-confirm').remove();
                    }
                }
            ]

        }).parent().find(".ui-dialog-titlebar-close").click(function () {
            $('#dialog-confirm').remove();
        }).parents().find(".ui-dialog-buttonset>button:first-child").addClass("btn btn-rounded btn-success").parents().find(".ui-dialog-buttonset>button:last-child").addClass("btn btn-rounded btn-danger");
    }

    return confirmed;
}