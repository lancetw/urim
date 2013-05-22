/**
 * jQuery.browser.mobile (http://detectmobilebrowser.com/)
 *
 * jQuery.browser.mobile will be true if the browser is a mobile device
 *
 **/
(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);
var isiPad = navigator.userAgent.match(/iPad/i) != null;

/* Optimized PLACEHOLDER for iOS6 - Mooki ( http://mooki83.tistory.com ) */
$(document).ready(function(){
    $(window).bind("orientationchange.fm_optimizeInput", fm_optimizeInput);
});

function fm_optimizeInput(){
    $("input[placeholder],textarea[placeholder]").each(function(){
        var tmpText = $(this).attr("placeholder");
        if ( tmpText != "" ) {
            $(this).attr("placeholder", "").attr("placeholder", tmpText);
        }
    })
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(function() {

	if (jQuery.browser.mobile) {
		$('code a').click(function(e) {
			e.preventDefault();
			var showmsg = noty({
				text: $(this).attr('title'),
				type: 'warning',
				layout: 'bottom',
				timeout: 1500,
				modal: true
			});
		});
	} else {
		$('code a').tooltip({
			'placement': 'left'
		}).click(function(e) {
			e.preventDefault();
            $(this).tooltip('toggle');
	    });
	}

    if (!jQuery.browser.mobile && !isiPad) {
    	$('.the-message a').clickover({
    		html: true,
            placement: 'bottom',
    		content: function() {
    			var ref = $(this).attr('data-ref');
                var refid = '#pop-content-' + ref;
    			return $(refid).html();
    		},
            onShown: function() {
                var ref = this.options.ref;
                var refid = '#pop-content-' + ref;
                window.location = refid;
            },
    		template: '<div class="popover visible-desktop"><div class="arrow"></div><div class="popover-inner"><div class="popover-content"><p></p></div></div></div>'
            //<h3 class="popover-title"></h3>
            //Need to have this click check since the tooltip will not close on mobile
        });
    }

    $('#transTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    if (!jQuery.browser.mobile && !isiPad) {
		$('#sidebar.nano').nanoScroller();
	}

    $('[rel="clickover"]').clickover({
        html: true,
        height: 'auto',
        placement: 'left',
        content: function() {
            var ref = $(this).attr('data-ref');
            return $('.' + ref).html();
        },
    });

    $('[rel="fhl-note"]').live('click', function(e) {
        var fhl_note_id = $(this).attr('data-ref');
        var type = '';
        if ( fhl_note_id.charAt(0) == 'H' ) {
            type = 'hebrew';
        }
        if ( fhl_note_id.charAt(0) == 'G' ) {
            type = 'greek';
        }
        var content = '<div class="ver">字典由信望愛 CBOL 提供</div><div class="title ' + type + '">' + $('#pop-content-' + fhl_note_id + ' .title').html() + '</div><div class="strongs">' + $('#pop-content-' + fhl_note_id + ' .strongs').html() + '</div>' + $('#fhl-note-' + fhl_note_id).html();
        var showmsg = noty({
            text: content,
            type: 'warning',
            layout: 'bottomCenter',
            modal: false,
            callback: {
                onShow: function() {},
                afterShow: function() {},
                onClose: function() {},
                afterClose: function() {
                    var pop_content_id = '#pop-content-' + fhl_note_id;
                    window.location = pop_content_id;
                }
            },
        });
    });

    $('#panel-nav').mmenu({
        slidingSubmenus: true,
        addCounters: false,
        closeOnClick: true,
        position: 'left'
    });

    var strongs = getParameterByName('strongs');
    $(".the-message a[data-ref='" + strongs + "']").addClass('highlight');

    $('#strongsform input').keypress(function(event){
        if (event.keyCode == 13) {
            $('#strongsform').attr('action', '/urim/search/' + $('#strongsform input').val());
            window.location = $('#strongsform').attr('action') +'?'+ $('#strongsform input').val();
        }
    });


});