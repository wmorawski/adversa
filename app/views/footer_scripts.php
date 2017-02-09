<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-07
 * Time: 15:17
 */

Site::javascript('jquery-min');
Site::javascript('bootstrap.min');
Site::javascript('jquery.okayNav-min');
Site::javascript('jquery.mixitup.min');
Site::javascript('jquery.inview');
Site::javascript('jquery.counterup.min');
Site::javascript('scroll-top');
Site::javascript('material.min');
Site::javascript('switcher');
Site::javascript('owl.carousel.min');
Site::javascript('wow');
Site::javascript('main');
Site::javascript('jaktutorial');
?>


<script type="text/javascript">
    window.cookieconsent_options = {"message":"Ta strona wykorzystuje cookies, aby zapewnić Ci jak najlepsze doświadczenia związane z naszą stroną.","dismiss":"Mam to!","learnMore":"Więcej info","link":null,"theme":"dark-bottom"};
</script>
<?php Site::javascript('cookieconsent.min'); ?>

<script>
    $("#to_register").click(function(){
        $('#loginBox').modal('hide');
    });
    $("#to_login").click(function(){
        $('#registerBox').modal('hide');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#add_err").css('display', 'none', 'important');
        $("#login").click(function(){
            username=$("#username").val();
            password=$("#password").val();
            $.ajax({
                type: "POST",
                url: "router.php",
                data: {username: username, password: password, login : "login"},

                    success: function(html){
                    $("#response").html(html);
                    if(html=='true')    {
                        $("#add_err").css('display', 'inline', 'important');
                        $("#add_err").html("<div class='alert alert-dismissible alert-success z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-check'></span> Dane poprawne. Logowanie...");
                        $("#login").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> &nbsp; Logowanie ...');
                        setTimeout(' window.location.href = "/"; ',2500);
                    }
                    else    {
                        $("#add_err").css('display', 'inline', 'important');
                        if(html=="username"){
                            $("label[for='username']").html("Login");
                            $("label[for='password']").html("Hasło");
                            $("#add_err").html("<div class='alert alert-dismissible alert-warning z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Taki użytkownik nie istnieje");
                        }else if(html=="password"){
                            $("label[for='username']").html("Login");
                            $("label[for='password']").html("Hasło");
                            $("#add_err").html("<div class='alert alert-dismissible alert-warning z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Niepoprawne hasło");
                        }else if(html=="active"){
                            $("label[for='username']").html("Login");
                            $("label[for='password']").html("Hasło");
                            $("#add_err").html("<div class='alert alert-dismissible alert-warning z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Twoje konto nie jest aktywne!");
                        }else if(html=="blank"){
                            $("#add_err").html("<p class='text-danger text-center'>Wypełnij wszystkie pola!</p>");
                        }else{
                            $("#add_err").html(html);
                        }


                        $("#login").html("Zaloguj");
                    }
                },
                beforeSend:function()
                {
                    $("#add_err").css('display', 'inline', 'important');
                    $("#login").html('<i class="fa fa-spinner fa-pulse fa-fw"></i>Ładowanie...<br />')
                }
            });

            return false;
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#username_r').on('input',function () {
            username_r = $('#username_r').val();
            console.log(username_r);
            $.ajax({
                type: "POST",
                url: "router.php",
                data: {usercheck: username_r, checkUsername: 'true'},
                success: function (html) {
                    $('#check_username').html(html);
                }
            })
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#add_err2").css('display', 'none', 'important');
        $("#register").click(function(){
            username_reg=$("#username_r").val();
            password_reg = $("#password_r").val();
            mailreg = $("#mail").val();
            password_repeatreg = $("#repeat_password").val();
            var n = 4;

            $.ajax({
                type: "POST",
                url: "router.php",
                data: {username: username, password: password_reg, mail: mailreg, password_repeat : password_repeatreg, register: 'true'},
                success: function(html){
                    if(html=='true'){
                        setTimeout(countDown,1000);
                        function countDown(){
                            n--;
                            if(n > 0){
                                setTimeout(countDown,1000);
                            }
                            $("#register").html('<i class="fa fa-check fa-fw"></i> &nbsp; Okno zamknie się za ' + n + "s.");
                        }
                        $("#error").css('display', 'inline', 'important');
                        $("#error").html("<div class='alert alert-dismissible alert-success z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-check'></span> Drużyna została stworzona!");
                        $("#register").removeClass("btn-challenge");
                        $("#register").addClass("btn-success");
                        setTimeout(' window.location.href = "/"; ',4000);
                    }
                    else    {
                        $("#add_err2").css('display', 'inline', 'important');
                        if(html=="name"){
                            $("#add_err2").html("<div class='alert alert-dismissible alert-danger z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Nazwa jest zajęta");
                        }else if(html == "tag"){
                            $("#add_err2").html("<div class='alert alert-dismissible alert-danger z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Tag zajęty");
                        }else if(html == "blank"){
                            $("#add_err2").html("<div class='alert alert-dismissible alert-danger z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Wypełnij wszystkie pola");
                        }else if(html == "too_long"){
                            $("#add_err2").html("<div class='alert alert-dismissible alert-danger z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Tag może mieć maksymalnie 6 znaków");
                        }

                        $("#register").html("Zarejestruj");
                    }
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                },
                beforeSend:function()
                {
                    $("#add_err2").css('display', 'inline', 'important');
                    $("#register").blur();
                    $("#register").html('<i class="fa fa-spinner fa-pulse fa-fw"></i>Ładowanie...')
                }
            });
            return false;
        });
    });
</script>
