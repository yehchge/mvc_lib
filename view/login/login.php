
<form action="login/submit" method="post" id="loginForm">
    <label>Email</label> <input type="text" name="email" />
    <label>Password</label> <input type="password" name="password" />
    <label></label> <input type="submit" value="Login" />
</form>

<p>Login: admin@admin.com</p>
<p>Password: admin</p>

<script>
$(function() {

    $("#loginForm").submit(function(e) {
        e.preventDefault();
        
        var url = $(this).attr('action');
        var postData = $(this).serialize();
        
        $.post(url, postData, function(o) {
            if (o.success == 1) {
                window.location.href = 'dashboard'
            } else {
                $("#status").html(o.errorMessage);
            }
        });
    });

});
</script>