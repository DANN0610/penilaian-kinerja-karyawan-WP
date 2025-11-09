// scripts.js
history.pushState(null, "", location.href);
window.onpopstate = function() {
    history.pushState(null, "", location.href);
};
