$("#subbtn").click(function(event) {
    if ($("input[name='host']").val() == "" ||
        $("input[name='username']").val() == "" ||
        $("input[name='dbname']").val() == "") {
        alert("host、username、dbname为必选项");
    } else {
        $.post('/apps/web/?r=file/updatedbconfig', {
            host: $("input[name='host']").val(),
            username: $("input[name='username']").val(),
            pwd: $("input[name='pwd']").val(),
            dbname: $("input[name='dbname']").val()
        }, function(data, textStatus, xhr) {
            if(data.success){
                if(confirm(data.desc)){
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
