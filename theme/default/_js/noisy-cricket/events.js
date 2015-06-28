/*
 *        name: setEvents
 *        desc: Stage all events.
 * paramaeters: none
 *     returns: none
 *
 */
function setEvents() {
    setSubmitEvents();
    setNotificationEvents();
    setClickEvents();
 }

/*
 *        name: setSubmitEvents
 *        desc: Stage all non-standard submit events actions.
 * paramaeters: none
 *     returns: none
 *
 */
function setSubmitEvents() {

    $('body').delegate('form.new_submit', 'submit', function(event){
        event.preventDefault();

        var values = bindData($(this));
        if (!values) {
            alert('NENHUM VALOR!');
            // ERROR - No values to submit
        }

        var action = $(this).attr('action');
        if (action == null || action == "") {
            alert('ACTION VAZIO OU NULO!');
            // ERROR - Every form needs an action
        }

        // Make this block better
        /**********************************************************************/
        var method = $(this).attr('method');
        if ((method == null || action == "")) {
            method = "POST"; // Default method will be 'POST'
        }

        method = method.toUpperCase();
        if (method != 'POST' && method != 'GET') {
            alert('METHOD NÃO É POST NEM GET!');
            // ERROR - Method should be a POST or a GET
        }
        /**********************************************************************/

        var goodToGo = true;
        if ($(this).hasClass("needs-confirmation")) {
            var message = "Pressione OK caso realmente queira realizar esse envio.";
            if ($(this).attr("data-confirm-msg") != "") message = $(this).attr("data-confirm-msg");
            if (!confirm(message)) goodToGo = false;
        }

        if (goodToGo) genericSubmit(action, method, values);
    });

    $('body').delegate('a.post', 'click', function(event){
        event.preventDefault();

        var href = $(this).attr('href');
        var id = $(this).attr('id');

        var values = {};
        values['id'] = id;

        genericSubmit(href, 'POST', values);
    });
}

function setNotificationEvents() {
    $('body').delegate('#close_btn', 'click', function(event) {
        event.preventDefault();

        closeNotification();
    });
}

function setClickEvents(){
    $('body').delegate('.lightbox-open', 'click', function(event) {
        event.preventDefault();
        openLightbox($(this).attr("href"));
    });

    $('body').delegate('#lightbox #close', 'click', function(event) {
        event.preventDefault();
        closeLightbox();
    });

    $('body').delegate('#lightbox_overlay', 'click', function(event) {
        event.preventDefault();
        closeLightbox();
    });

    $('body').delegate('.cancel', 'click', function(event) {
        event.preventDefault();
        history.back();
    });
 }
