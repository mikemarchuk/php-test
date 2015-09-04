/**
 * Support function for dump value
 *
 * @param value
 */
var dump = function(value) {
    console.log(value);
}

/**
 * Load apartments list by AJAX and fill select
 */
var apartmentLoad = function() {
    var apartmentSelect = $("#inputApartment");

    $.ajax({
        type:       'POST',
        url:        '/apartment',
        dataType:   'json',
        success:    function(apartments){
            $.each(apartments, function(id, apartment) {
                apartmentSelect.append(getOption(apartment.id, apartment.name + ", " + apartment.address));
            });

        }
    });
}

/**
 * Build option element for select element
 *
 * @param value
 * @param text
 * @returns {*|jQuery|HTMLElement}
 */
var getOption = function(value, text) {
    return $('<option/>', {
        'value' : value,
        'text'  : text
    });
}

/**
 * Build message box
 *
 * @param type
 * @param text
 * @returns {*|jQuery|HTMLElement}
 */
var getMessage = function(type, text) {
    return $('<div />', {
        'class' :   'alert alert-' + type,
        'role'  :   'alert',
        'text'  :   text
    });
}

/**
 * Load users list by AJAX and fill select
 */
var userLoad = function() {
    var userSelect = $("#inputUser");

    $.ajax({
        type:       'POST',
        url:        '/user',
        dataType:   'json',
        success:    function(users){
            userSelect.append(getOption(0, "..."));
            $.each(users, function(id, user) {
                userSelect.append(getOption(user.id, user.name));
            });

        }
    });
}

/**
 * Build table row with all element in array
 *
 * @param array
 * @returns {*|jQuery|HTMLElement}
 */
var getTableRow = function(array) {
    var tr = $('<tr />');
    var td = $('<td />');
    $.each(array, function(id, value) {
        tr.append(td.clone().append(value));
    });
    return tr;
}