/*
 *        name: bindForm
 *        desc: It binds form's inputs into an array.
 * paramaeters: form : jQuery Object
 *     returns: JS array (the key is the property name, the value is the value)
 *
 */
function bindData(form) {
    var accepted_types = [
        "checkbox",
        "date", 
        "datetime", 
        "datetime-local", 
        "email", 
        "hidden", 
        "month", 
        "number", 
        "password", 
        "range", 
        "search", 
        "tel", 
        "text", 
        "time", 
        "url", 
        "week"
    ];

    var values = {};

    form.children().each(function() {
        var name = $(this).attr('name');
        if (name == null || name == "") {
            // error
        }

        if ($(this).is('input')) { // if it's an input
            if (accepted_types.indexOf($(this).attr('type')) > -1) {
                values[name] = $(this).val();
            }

        } else if($(this).is('select')) { // if it's a select

            $(this).children().each(function(){
                if ($(this).is(':selected') && $(this).is('option')) { // if it's the selected option
                    values[name] = $(this).attr('value');
                }
            });

        } else if($(this).is('textarea')) { // it it's a textarea
            values[name] = $(this).html();
        }
    });

    if (values != null) {
        return values;
    }

    return false;
}
