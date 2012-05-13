var userIsLoggedIn = false;
var userId;
var currentQuestion;

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
            eval('res = ' + data + ';');
            if (res.id) {
                userIsLoggedIn = true;
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

    getPageContent('question-form');

    $('#questionForm').submit(function() {
        $(this).ajaxSubmit({
            url: 'get-answer.php',
            method: "post",
            success: function(data) {
                $('#content').html(data);
            }
        });
        return false; 
    });
});

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

function getRandomQuestion()
{
    $.ajax({
        url: "get-random-question.php",
        success: function(data) {
            $('#questionTextArea').html(data);
        }
    });
}

function getQuestionForm()
{
    $.ajax({
        url: "question-form.html",
        success: function(data) {
            $('#content').html(data);

            var formOpts = {
                url: 'answer.html',
                success: function(data) {
                    $('#content').html(data);
                    fillAnswerPage();
                }
            };
            $('#questionForm').submit(function() { 
                currentQuestion = $("#questionTextArea").val();
                $(this).ajaxSubmit(formOpts); 
                return false; 
            });
        }
    });
}

function getProfilePage()
{
    $.ajax({
        url: "profile.html",
        success: function(data) {
            $('#content').html(data);
            getProfileInfo();
        }
    });
}

function getProfileInfo()
{
    if (!userIsLoggedIn) {
        $("#profileContent").html("<b>User is not logged in!</b>");
        return;
    }

    $.ajax({
        url: "get-profile-info.php",
        data: {
            "userid": userId
        },
        success: function(data) {
            var res;
            eval('res = ' + data + ';');
            $("#nickname").html(res.user.nickname);
            $("#creationDate").html(res.user.creation_date);

            $.each(res.questions, function(i, e) {
                $("table#questions")
                    .append($("<tr>" +
                              "<td>" + e.question_date + "</td>" +
                              "<td>" + e.question      + "</td>" +
                              "<td>" + e.hexagram_id   + "</td>" +
                              "</tr>"));
            });
        }
    });
}

function fillAnswerPage()
{
    $("#question").html(currentQuestion);

    // request data from PHP -> get-answer.php
    $.ajax({
        url: "get-answer.php",
        data: {
            question: currentQuestion,
            userId: userId,
        },
        success: function(data) {
            //process the result, use it to fill the form
            var res;
            eval('res = ' + data + ';');
            $("#question").html(currentQuestion);
            $("#questionDate").html(res.questionDate);
            $("#hexagramId").html(res.hexagramId);

            var checkval = "checked";
            // fill translationSelector with the available translations
            $.each(res.translations, function(i, e) {
                $("form#translationSelector")
                    .append($(document.createElement('input'))
                            .attr({type: "radio", name: "translation", value: e, checked: checkval}))
                    .append(e);
                checkval = false;
            });

            // register callbacks on the radio buttons
            $('form#translationSelector input').change(function() {
                fillHexagramText();
            });
            fillHexagramText();
        }
    });
}

function fillHexagramText()
{
    $.ajax({
        url: "get-hexagram-text.php",
        data: {
            "hexagramId": $("#hexagramId").html(),
            "translation": $("form#translationSelector input:checked").val(),
        },
        success: function(data) {
            $('#hexagramExplanation').html(data);
        }
    });
}

function getPageContent(page)
{
    $.ajax({
        url: page + ".html",
        success: function(data) {
            $('#content').html(data);
            return false;
        }
    });
}

function submitQuestion()
{
    $.ajax({
        url: "iching-question-form.php",
        success: function(data) {
            $('#content').html(data);
        }
    });
}
