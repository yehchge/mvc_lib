<p>
    Everyone always wants a login system. Well here you have a very simple
    example. There is jQuery in this view file (login/login.php) which posts
    the form.
</p>

<fieldset>
    <form action="login/submit" method="post" id="loginForm">
        <label>Email</label> <input type="text" name="email" value="admin@admin.com" /><br />
        <label>Password</label> <input type="password" name="password" /><br />
        <label>&nbsp;</label> <input type="submit" value="Login" />
    </form>
</fieldset>

<br />

<p>The Password is: admin</p>

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
                var status = '';
                for (var key in o.errorMessage) {
                    if (o.errorMessage.hasOwnProperty(key)) {
                        status += key + ' ' + o.errorMessage[key] + '<br />';
                    }
                    
                }
                
                $("#status").html(status).show();
                
            }
        });
    });

});
</script>