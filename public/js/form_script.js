$(window).on('load', function() {
    $('.preloader').fadeOut().end().delay(400).fadeOut('slow');
});

//var btn = document.getElementById("theme-button");
var link = document.getElementById("theme-link");

//btn.addEventListener("click", function () { ChangeTheme(); });

function ChangeTheme()
{
    let lightTheme = "../css/forms.css";
    let darkTheme = "../css/forms_dark.css";

    var currTheme = link.getAttribute("href");
    var theme = "";

    if(currTheme == lightTheme)
    {
        currTheme = darkTheme;
        theme = "dark";
    }
    else
    {
        currTheme = lightTheme;
        theme = "light";
    }

    link.setAttribute("href", currTheme);

    Save(theme);
}
function Save(theme)
{
    var Request = new XMLHttpRequest();
    Request.open("GET", "../css/themes.php?theme=" + theme, true);
    Request.send();
}
