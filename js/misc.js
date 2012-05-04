var expr_alphanum = /^[a-zA-Z0-9]+$/;
var expr_alpha = /^[a-zA-Z]+$/;
var expr_num = /^[0-9]+$/;

function init()
{
    // fill initial content
    $('#content').html('');

    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            $('#content').html(xhr.responseText);

            // bind 'questionForm'
            $('#questionForm').ajaxForm({
                url: 'getAnswer.php',
                success: function(data) {
                    $('#content').html(data);
                }
            });
            // attach handler to form's submit event 
            $('#questionForm').submit(function() { 
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

function checkLogin()
{
    nomeUtente=document.getElementById('usr');
    passwordUtente=document.getElementById('psw');
    if (nomeUtente.value=='' || passwordUtente.value=='') {
        alert('Nome utente e/o password mancante.');
    } else {
        if(is_alphanumeric(nomeUtente.value) && is_alphanumeric(passwordUtente.value))
            document.forms["formLogin"].submit();
        else {
            alert('Il nome utente e la password possono contenere solo lettere e numeri.');
            document.getElementById('psw').style.background='#ff5555';
            document.getElementById('usr').style.background='#ff5555';
        }
    }        
}

function isAlphanumeric(stringa)
{
    if (!expr_alphanum.test(stringa))
        return false;
    else
        return true;
}

function isAlpha(stringa)
{
    if (!expr_alpha.test(stringa)) return false;
    else return true;
}

function isNumeric(stringa)
{
    if (!expr_num.test(stringa)) return false;
    else return true;
}
