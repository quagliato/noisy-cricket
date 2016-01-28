/*
 *        name: genericSubmit
 *        desc: It submits info to the server
 * paramaeters: action : sting, method : string, values : array, success : function, fail : function, always : function
 *     returns: none
 *
 */
 function genericSubmit(action, method, values) {
    closeNotification();
    var success = function(data){
        var result = JSON.parse(data);

        var error = false;

        result.forEach(function(entry){
            var originalAction = entry['Action'];
            var action = originalAction.toLowerCase();

            if (action == 'error') error = true;

            switch (action){
                case 'message':
                case 'error':
                    openNotification(action, entry[originalAction]);
                    break;
                case 'alert':
                    alert(entry[originalAction]);
                    break;
                case 'redir':
                    window.location.href = rootURL + entry[originalAction];
                    break;
            } // switch end\
        }); // iteration end

        if (error) {
            $(this).find('input').each(function(){
                $(this).removeAttr("disabled");
            });
        }

        closeProcessing();
    } // success end

    var fail = function() {
        alert('Seu submit falhou!');
    }

    var always = function() {
        alert('Seu form...');
    }

    var result = null;

    method = method.toUpperCase();
    switch (method) {
        case 'POST':
            result = $.post(action, values, success);
            break;
        case 'GET':
            result = $.post(action, values, success);
            break;
    } // switch end
 }
