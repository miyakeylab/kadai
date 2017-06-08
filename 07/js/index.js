

$(function() {

    $("#sqlbtn_1").on("click", function() {
        $("#sqltext_1").val("SELECT * FROM gs_07_user_table");
    });
    $("#sqlcpybtn_1").on("click", function() {
        var text = document.getElementById("sqltext_1");
        text.select();
        document.execCommand("copy");
    });

    $("#sqlbtn_2").on("click", function() {
        $("#sqltext_2").val("SELECT user_name FROM gs_07_user_table WHERE id IN (SELECT user_id FROM gs_07_black_list_table)");
    });
    $("#sqlcpybtn_2").on("click", function() {
        var text = document.getElementById("sqltext_2");
        text.select();
        document.execCommand("copy");
    });

    $("#sqlbtn_3").on("click", function() {
        $("#sqltext_3").val("INSERT INTO gs_07_book_okini_table(user_id,book_id,add_time) VALUES('***', 'b***', sysdate());");
    });
    $("#sqlcpybtn_3").on("click", function() {
        var text = document.getElementById("sqltext_3");
        text.select();
        document.execCommand("copy");
    });

    $("#sqlbtn_4").on("click", function() {
        $("#sqltext_4").val("DELETE FROM gs_07_book_okini_table WHERE user_id = '***';");
    });
    $("#sqlcpybtn_4").on("click", function() {
        var text = document.getElementById("sqltext_4");
        text.select();
        document.execCommand("copy");
    });

    $("#sqlbtn_5").on("click", function() {
        $("#sqltext_5").val("DELETE FROM gs_07_book_okini_table;");
    });
    $("#sqlcpybtn_5").on("click", function() {
        var text = document.getElementById("sqltext_5");
        text.select();
        document.execCommand("copy");
    });
    $("#sqlbtn_6").on("click", function() {
        $("#sqltext_6").val("SELECT * FROM gs_07_book_okini_table INNER JOIN gs_07_user_table ON (gs_07_book_okini_table.user_id = gs_07_user_table.id);");
    });
    $("#sqlcpybtn_6").on("click", function() {
        var text = document.getElementById("sqltext_6");
        text.select();
        document.execCommand("copy");
    });

    $("#sqlbtn_7").on("click", function() {
        $("#sqltext_7").val("SELECT * FROM gs_07_book_rental_table WHERE rental_end_date < CURDATE() AND rental_flg = '1';");
    });
    $("#sqlcpybtn_7").on("click", function() {
        var text = document.getElementById("sqltext_7");
        text.select();
        document.execCommand("copy");
    });

    $("#sqlbtn_8").on("click", function() {
        $("#sqltext_8").val("SELECT book_id,COUNT(book_id) FROM gs_07_book_zaiko_table GROUP BY book_id;");
    });
    $("#sqlcpybtn_8").on("click", function() {
        var text = document.getElementById("sqltext_8");
        text.select();
        document.execCommand("copy");
    });

});