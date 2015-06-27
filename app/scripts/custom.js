var all_data = $.ajax({url: BASE_URL + 'global_info/all', dataType: 'json', async: false})

        .success(function (result) {
            return result;
        })
        .error(function () {
            console.log('error');
        });


var data = JSON.parse(all_data['responseText']);

function FeesCategoryDropDownEditor(container, options) {
    $('<input data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: false,
                dataTextField: "name",
                dataValueField: "subjectGroup",
                dataSource: subjectgroup
            });
}

function get_fees_name(id) {
    arr = data.fees_category;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (id === arr[idx].value) {
            return arr[idx].text;
        }
    }
}

function PasswordEditor(container, options)
{
    $('<input class="k-textbox" type="password" required data-bind="value:' + options.field + '"/>').appendTo(container);
};
function RoleEditor(container, options) {
    $('<input data-bind="value:' + options.field + '"/>')
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
    $('<input data-bind="value:' + options.field + '"/>')
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

function get_month(id) {
    arr = data.month_info;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(id) === parseInt(arr[idx].value)) {
            return arr[idx].text;
        }
    }
}

function get_std_type_name(id) {
    arr = data.std_type;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (id === arr[idx].value) {
            return arr[idx].text;
        }
    }
}

function fee_type_editor(container, options) {
    $('<input required="required" name="fee_type" validationmessage = "Fees Type is Required" data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: false,
                optionLabel: "---Select---",
                dataTextField: "fee_type_name",
                dataValueField: "fee_type_id",
                dataSource: data.fee_type
            });
}

function get_fee_type(fee_type_id) {
    arr = data.fee_type;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(arr[idx].fee_type_id) === parseInt(fee_type_id)) {
            return arr[idx].fee_type_name;
        }
    }
}

function get_designation(id) {
    arr = data.designation;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(arr[idx].value) === parseInt(id)) {
            return arr[idx].text;
        }
    }
}

function get_ledger_name(id) {
    arr = data.ledger_info;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(arr[idx].value) === parseInt(id)) {
            return arr[idx].text;
        }
    }
}

function get_acc_group_name(id) {
    arr = data.acc_group_info;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(arr[idx].value) === parseInt(id)) {
            return arr[idx].text;
        }
    }
}

function get_class(id) {
    arr = data.class_info;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(arr[idx].id) === parseInt(id)) {
            return arr[idx].name;
        }
    }
}

function get_voucher_type(id) {
    arr = data.voucher_type;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(arr[idx].id) === parseInt(id)) {
            return arr[idx].name;
        }
    }
}

function fees_category_editor(container, options) {
    $('<input data-bind="value:' + options.field + '"/>')
            .appendTo(container)
            .kendoDropDownList({
                autoBind: true,
                optionLabel: "---Select---",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data.fees_category
            });
}

function get_fees_category(id) {
    arr = data.fees_category;
    for (var idx = 0, length = arr.length; idx < length; idx++) {
        if (parseInt(arr[idx].value) === parseInt(id)) {
            return arr[idx].text;
        } else if (0 === parseInt(id)) {
            return "N/A";
        }
    }
}
