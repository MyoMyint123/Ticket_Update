// Add Record
function addRecord() {
    // get values
    var name = $("#name").val();
    name = name.trim();
 
    if (name == "") {
        alert("First name field is required!");
    }
    else {
        // Add record
        $.post("model/category/create.php", {
            name: name,
        }, function (data, status) {
            // close the popup
            $("#add_new_record_modal").modal("hide");
 
            // read records again
            readRecords();
 
            // clear fields from the popup
            $("#name").val("");
        });
    }
}

// READ records
function readRecords() {
    $.get("model/category/read.php", {}, function (data, status) {
        $("#table_content").html(data);
    });
}

function getCategoryDetails(id) {
    // Add User ID to the hidden field
    $("#hidden_category_id").val(id);
    $.post("model/category/details.php", { id: id },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assign existing values to the modal popup fields
            $("#update_name").val(user.name);
        }
    );
    $("#update_category_modal").modal("show");
    // Open modal popup
}

function updateCategoryDetails() {
    // get values
    var name = $("#update_name").val();
    name = name.trim();
 
    if (name == "") {
        alert("Category name field is required!");
    }
    else {
        // get hidden field value
        var id = $("#hidden_category_id").val();
 
        // Update the details by requesting to the server using ajax
        $.post("model/category/update.php", {
                id: id,
                name: name,
            },
            function (data, status) {
                // hide modal popup
                $("#update_category_modal").modal("hide");
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function DeleteCategory(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("model/category/delete.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

$(document).ready(function () {
    // READ records on page load
    readRecords();
});
