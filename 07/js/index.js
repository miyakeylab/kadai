

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
    $("#sqlbtn_9").on("click", function() {
        $("#sqltext_9").val("SELECT * FROM gs_07_book_table AS a LEFT JOIN gs_07_book_rental_table AS b ON a.book_id = b.book_key_id;");
    });
    $("#sqlcpybtn_9").on("click", function() {
        var text = document.getElementById("sqltext_9");
        text.select();
        document.execCommand("copy");
    });
    
    $("#sqlbtn_10").on("click", function() {
        $("#sqltext_10").val("SELECT * FROM gs_07_book_table AS a RIGHT JOIN gs_07_book_rental_table AS b ON a.book_id = b.book_key_id;");
    });
    $("#sqlcpybtn_10").on("click", function() {
        var text = document.getElementById("sqltext_10");
        text.select();
        document.execCommand("copy");
    });
    $("#sqlbtn_11").on("click", function() {
        $("#sqltext_11").val("SELECT SUM(user_age) FROM gs_07_user_table;");
    });
    $("#sqlcpybtn_11").on("click", function() {
        var text = document.getElementById("sqltext_11");
        text.select();
        document.execCommand("copy");
    });
    $("#sqlbtn_12").on("click", function() {
        $("#sqltext_12").val("SELECT AVG(user_age) FROM gs_07_user_table;");
    });
    $("#sqlcpybtn_12").on("click", function() {
        var text = document.getElementById("sqltext_12");
        text.select();
        document.execCommand("copy");
    });
    $("#sqlbtn_13").on("click", function() {
        $("#sqltext_13").val("SELECT TRUNCATE(AVG(user_age),0) FROM gs_07_user_table;");
    });
    $("#sqlcpybtn_13").on("click", function() {
        var text = document.getElementById("sqltext_13");
        text.select();
        document.execCommand("copy");
    });
    
    $("#sqlbtn_14").on("click", function() {
        $("#sqltext_14").val("SELECT * FROM gs_07_user_table WHERE user_age < (SELECT TRUNCATE(AVG(user_age),0) FROM gs_07_user_table);");
    });
    $("#sqlcpybtn_14").on("click", function() {
        var text = document.getElementById("sqltext_14");
        text.select();
        document.execCommand("copy");
    });
    
    $("#sqlbtn_15").on("click", function() {
        $("#sqltext_15").val("SELECT * FROM gs_07_user_table ORDER BY time DESC;");
    });

    $("#sqlcpybtn_15").on("click", function() {
        var text = document.getElementById("sqltext_15");
        text.select();
        document.execCommand("copy");
    });
});