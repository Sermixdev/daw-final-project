let url = window.location.href;
url = url.replace('&id=', '?id=');
let urlObj = new URL(url);
let params = new URLSearchParams(urlObj.search);
let id = params.get('id');

id = Number(id);

let cookieName = 'cookieArray';
let itemCount = document.getElementById('itemCount');

let divBuyButton = document.getElementById('divBuyButton');
if (divBuyButton) {
    divBuyButton.addEventListener('click', () => {
        let cookieArray = getCookieArray(cookieName);
        cookieArray = cookieArray.map(Number);

        cookieArray.push(id);
        setCookieArray(cookieName, cookieArray);
        showItemCount();
    });
}

function getCookieArray(name) {
    let cookieValue = getCookie(name);
    if (cookieValue) {
        return JSON.parse(cookieValue);
    }
    return [];
}

function setCookieArray(name, array) {
    document.cookie = name + '=' + JSON.stringify(array) + '; path=/';
}

function getCookie(name) {
    let cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let cookiePair = cookies[i].split('=');
        if (name === cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}

function showItemCount() {
    itemCount.style.display = 'inline';
    setTimeout(() => {
        itemCount.style.display = 'none';
    }, 1500);
}
