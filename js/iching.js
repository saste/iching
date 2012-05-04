function init()
{
    getQuestionForm();
}

function getQuestionForm()
{
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            $('#content').html(xhr.responseText);

            // bind 'questionForm'
            $('#questionForm')
            .ajaxForm({
                url: 'getAnswer.php',
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
    xhr.open("GET", "iching-question-form.php", true);
    xhr.send();
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

function isAlphanumeric(str)
{
    var expr_alphanum = /^[a-zA-Z0-9]+$/;
    return expr_alphanum.test(str);
}

function isAlpha(str)
{
    var expr_alpha = /^[a-zA-Z]+$/;
    return expr_alpha.test(str);
}

function isNumeric(str)
{
    var expr_num = /^[0-9]+$/;
    return expr_num.test(str);
}

function checkLogin()
{
    var username = $('#username').val();
    var password = $('#password').val();
    if (username == '' || password == '') {
        alert('Missing username and/or password.');
    } else {
        if (is_alphanumeric(username) && is_alphanumeric(password)) {
            document.forms["formLogin"].submit();
        } else {
            alert('Invalid username or password specified, they can only contain letters or numbers');
            $('#password').style.background='#ff5555';
            $('#username').style.background='#ff5555';
        }
    } 
}