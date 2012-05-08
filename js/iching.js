var userIsLoggedIn = false;
var userId;

function isAlphanumeric(str)
{
    var expr_alphanum = /^[a-zA-Z0-9]+$/;
    return expr_alphanum.test(str);
}

$(document).ready(function() {
    var opts = {
        url: 'check-login.php',
        type: "post",
        beforeSubmit: function(formData) {
            // validate fields
            var username = $('#username').val();
            var password = $('#password').val();
            
            if (username == '' || password == '') {
                alert('Missing username and/or password.');
                return false;
            }

            if (!isAlphanumeric(username) || !isAlphanumeric(password)) {
                alert('Invalid username or password specified, ' + 
                      'they can only contain letters or numbers');
                // $('#password').style.background='#ff5555';
                // $('#username').style.background='#ff5555';
                return false;
            }
            
            return true;
        },                
        success: function(data) {
            var res;
            // response is a json containing all the data
            eval("res = " + data + ";");
            if (res.id) {
                userIsLogged = true;
                userId = res.id;
                $('#userId').val(userId);
                $('#loginbar').html("Welcome " + res.nickname + "!");
            } else {
                alert("User with specified nickname and password does not exist!");
            }
        }
    };

    $('#loginForm').submit(function() {
        $(this).ajaxSubmit(opts); 
        // return false to prevent normal browser submit and page navigation 
        return false; 
    });
});

function getQuestionForm()
{
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            $('#content').html(xhr.responseText);

            // bind 'questionForm'
            $('#questionForm')
            .ajaxForm({
                url: 'get-answer.php',
                success: function(data) {
                    $('#content').html(data);
                }
            })
            // attach handler to form's submit event 
            .submit(function() { 
                // submit the form 
                $(this).ajaxSubmit(); 
                // return false to prevent normal browser submit and page navigation 
                return false; 
            });
        }
    }
    xhr.open("GET", "get-question-form.php", true);
    xhr.send();
}

function init()
{
    var map = {
        "about":        "about",
        "how-it-works": "how it works",
        "my-view":      "my view",
        "new-question": "question",
        "profile":      "profile",
        "references":   "references",
        "resources":    "resources",
    };

    $("#main-nav").append($('ul#navitems li').clone()
                          .each(function(i) {$(this).find("span").text(map[$(this).attr("name")])}));
    getQuestionForm();
}

function getPageContent(page)
{
    xhr = new XMLHttpRequest();
    url = page + ".html";

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            $('#content').html(xhr.responseText);
        }
    }
    xhr.open("GET", url, true);
    xhr.send();
    return false;
}

function submitQuestion()
{
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            $('#content').html(xhr.responseText);
        }
    }
    xhr.open("GET", "iching-question-form.php", true);
    xhr.send();
}
