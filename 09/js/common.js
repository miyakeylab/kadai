/* global $,jQuery,define,document,window,swal,console,localStorage,const */

/**
 * @fileOverview 共通関数ファイル
 *
 * @author y.miyake
 * @version 0.0.1
 * @createDate 05/17/2017
 */

/**
 * ログフラグ
 * @type {boolean}
 */
var logFlg = true;

/**
 * ログ出力
 * @param {string} logdata ログテキスト
 */
function Log(logdata) {
    // ログフラグ
    if (logFlg === true) {
        // 出力
        console.log(logdata);
    }
}
/**
 * ユーザー自動生成
 * @param {number} mem_num 人数
 * @return {object} ユーザーオブジェクト
 */
function CreateDebugUser(mem_num) {
    Log("ユーザー自動生成 " + mem_num.toString());
    // ユーザーオブジェクト生成
    var ob_user = MakeUserObject(mem_num, 0);
    Log(ob_user);
    return ob_user;
}

/**
 * 時刻文字列取得処理
 * @returns {string} YYYY年MM月DD日HH時MM分SS秒
 */
function NowTimeString() {
    var DD = new Date();
    // 西暦
    var Year = DD.getFullYear();
    var Month = ("0" + (DD.getMonth() + 1)).slice(-2);
    var Day = ("0" + DD.getDate()).slice(-2);
    var hour = ("0" + DD.getHours()).slice(-2);
    var Min = ("0" + DD.getMinutes()).slice(-2);
    var Sec = ("0" + DD.getSeconds()).slice(-2);
    str = Year + "年" + Month + "月" + Day + "日" + hour + "時" + Min + "分" + Sec + "秒";
    return str;
}
/**
 * オブジェクト配列データgrep検索処理
 * @param   {object} dataAry オブジェクト配列
 * @param   {string} key     キー
 * @param   {string} value   検索データ
 * @returns {object} grep検索結果オブジェクト
 */
function get_obj_by_key_value(dataAry, key, value) {
    var result = $.grep(dataAry, function (e) {
        return e[key] == value;
    });
    return result;
}


/**
 * ランダム文字列生成
 * @param   {number}   num 文字数
 * @returns {string} 文字列
 */
function random_str(num) {
    var str = "";
    var mojishu = "ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
    var len = mojishu.length;
    // 文字列から乱数で取得し、引数の文字分取得
    for (var i = 0; i < num; i++) {
        var rand = parseInt(Math.random() * len);
        str += mojishu.charAt(rand);
    }
    return str;
}
/**
 * ストレージ保存処理
 * @param {string} key   保存用キー
 * @param {object} value 保存データ
 */
function SaveStrage(key, value) {
    localStorage.setItem(key, value);
}
/**
 * ストレージ全削除
 */
function StrageClear() {
    localStorage.clear();
}