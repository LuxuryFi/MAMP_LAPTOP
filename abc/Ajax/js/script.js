// js/main.js
// do đã tích hợp j

$(document).ready(function(){
    $('#save').click(function(){
        let name = $('#name').val();
        let description = $('#description').val();
        console.log(name);
        console.log(description);

        //gọi ajax
        var obj_ajax = {
            url: 'insert.php',
            method: 'post',
            data: {
                name: name,
                description: description
            },
            // Nơi lưu trữ kq trả về từ url
            success: function(data){
                console.log(data);
            }
        }
        $.ajax(obj_ajax);
    });
});