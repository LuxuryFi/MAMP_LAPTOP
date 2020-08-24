function ConfirmDelete() {
    var del = confirm("Are you sure to delete");
    if (del) {
        return true;
    } else {
        return false;
    }
}

function showPass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagechange')
                .attr('src', e.target.result)
                .width(400);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

