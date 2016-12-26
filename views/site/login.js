$("#subbtn").click(function(event) {
    if (
        $("input[name='username']").val() == "" ||
        $("input[name='pwd']").val() == "") {
        alert("username、password为必选项");
    } else {
        $.post('/apps/web/?r=user/login', {
            username: $("input[name='username']").val(),
            pwd: $("input[name='pwd']").val()
        }, function(data, textStatus, xhr) {
            if(data.success){
                if(confirm(data.desc)){
                    localStorage.blog_username=data.username;
                    localStorage.blog_logined=true;
                    localStorage.blog_userid=data.userid;
                    window.location.href="/apps/web/?r=site/index";
                }else{
                    alert("goodbye");
                }
            }else{
                alert(data.desc);
            }
        }, "json");
    }
});
