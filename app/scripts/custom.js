var all_data = $.ajax({url: BASE_URL + 'global_info/all', dataType: 'json', async: false})

        .success(function (result) {
            return result;
        })
        .error(function () {
            console.log('error');
        });


var data = JSON.parse(all_data['responseText']);


function PasswordEditor(container, options)
{
    $('<input class="k-textbox" type="password" required data-bind="value:' + options.field + '"/>').appendTo(container);
};

function RoleEditor(container, options) {
    $('<input required="required" name="Role" data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: true,
                optionLabel: "-Select Role-",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data.role
            });

}
function GetRole(id) {
    arr = data.role;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(id) === parseInt(arr[idx].value)) {
            return arr[idx].text;
        }
    }
}
function NavigationEditor(container, options) {
    $('<input  data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: true,
                optionLabel: "-Select Navigation-",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data.navigation
            });

}
function GetNavigation(id) {
    arr = data.navigation;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(id) === parseInt(arr[idx].value)) {
            return arr[idx].text;
        }
    }
}
function UsersEditor(container, options) {
    $('<input data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: true,
                optionLabel: "-Select User-",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data.users
            });

}

function GetUsers(id) {
    arr = data.users;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(id) === parseInt(arr[idx].value)) {
            return arr[idx].text;
        }
    }
}

