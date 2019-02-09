function writeCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readUnescapedCookie(cookieName) {
    var cookieValue = document.cookie;
    var cookieRegExp = new RegExp("\\b" + cookieName
        + "=([^;]*)");

    cookieValue = cookieRegExp.exec(cookieValue);

    if (cookieValue != null) {
        cookieValue = cookieValue[1];
    }

    return cookieValue;
}

function readCookie(cookieName) {
    cookieValue = readUnescapedCookie(cookieName)

    if (cookieValue != null) {
        cookieValue = unescape(cookieValue);
    }
    return cookieValue;
}

function deleteCookie(cookieName) {
    var expiredDate = new Date();
    expiredDate.setMonth(-1);
    writeCookie(cookieName, "", expiredDate);
}