var expr_alphanum = /^[a-zA-Z0-9]+$/;
var expr_alpha = /^[a-zA-Z]+$/;
var expr_num = /^[0-9]+$/;

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
