$("#subbtn").click(function(event) {
    if($("input[name='pwdcheck']").val()==""||$("input[name='pwd']").val()==""||$("input[name='username']").val()==""){
        alert("所有选项不能为空");
    }else if ($("input[name='pwdcheck']").val()!=$("input[name='pwd']").val()) {
        alert("两次密码不一致请重试");
    } else if($("#usernamealert").hasClass('glyphicon-remove')){
        alert("用户名不可用");
    }else {
        $.post('/apps/web/?r=user/adduser', {
            username: $("input[name='username']").val(),
            pwd: $("input[name='pwd']").val()
        }, function(data, textStatus, xhr) {
            if(data.success){
               if(confirm(data.desc)){
                    window.location.href="/apps/web/?r=site/login";
                }else{
                    alert("goodbye");
                } 
            }else{
                alert(data.desc);
            }
        }, "json");
    }
});

$("[name='username']").bind("keyup focus",function(event) {
    $.post("/apps/web/?r=user/testusernameexist",{"username":$(this).val()},function(data){
        if(data.success&data.usable){
            $("#usernamealert").attr("class","glyphicon glyphicon-ok");
            $("#usernamealert").css("color","green");
        }else{
            $("#usernamealert").attr("class","glyphicon glyphicon-remove");
            $("#usernamealert").css("color","red");
            // alert(data.desc);
        }
    },"json");
});
$("[name='pwdcheck']").bind("keyup focus",function(event) {
    if($(this).val()==$("input[name='pwd']").val()){
        $(this).css("border-color","green");
    }else{
        $(this).css("border-color","red");
    }
});
