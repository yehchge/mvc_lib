
<form action="login/submit" method="post" id="loginForm">
    <label>Email</label> <input type="text" name="email" />
    <label>Password</label> <input type="password" name="password" />
    <label></label> <input type="submit" value="Login" />
</form>

<script>
$(function() {

    $("#loginForm").submit(function(e) {
        e.preventDefault();
        
        var url = $(this).attr('action');
        var postData = $(this).serialize();
        
        $.post(url, postData, function(o) {
        
        });
    });

});
</script>