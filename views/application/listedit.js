$("#userinfo ul li[name='logoutlink']").click(function(event) {
    testLogin();
});




var oTable2;
var hasnew = false;
var oTable = $('#editabledatatable').dataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": true,
    "bRetrieve": true,
    "bStateSave": false,
    "iDisplayLength": 20,
    "bServerSide": true, //每次数据修改，都请求服务器确认
    "bScrollCollapse": true,
    "sPaginationType": "full_numbers",
    "sServerMethod": "POST",
    "sAjaxSource": "/apps/web/?r=application/getfavortables",
    "aoColumns": [{
        "mData": "week",
        "sTitle": "时间",
        "sortable": true
    }, {
        "mData": "link",
        "sTitle": "网站地址",
        "sortable": false
    }, {
        "mData": "linktitle",
        "sTitle": "网站名",
        "sortable": false
    }, {
        "mData": "id",
        "sTitle": "操作",
        "sortable": false
    }],
    "fnServerParams": function(aoData) {
        aoData.push({
            "name": "hasnew",
            "value": hasnew
        });
        aoData.push({
            "name": "userid",
            "value": localStorage.blog_userid
        });
    },
    "aoColumnDefs": [{
        "aTargets": [0],
        "sTitle": "时间",
        "mData": "week",
        "sortable": true,
        "mRender": function(data, type, full) {
            return dd[Number(data)>0?Number(data):0][1];
        }
    },{
        "aTargets": [3],
        "sTitle": "操作",
        "mData": "id",
        "sortable": false,
        "mRender": function(data, type, full) {
            return '<a href="#" class="btn btn-info btn-xs edit" ' + (data == "new" ? "data-mode='new'" : "") + ' ><i class="fa fa-edit"></i> Edit</a><a href="#" class="btn btn-danger btn-xs delete" data-mydata-id=' + data + '><i class="fa fa-trash-o"></i> Delete</a>';
        }
    }]
});


var dd=[[-1,'请选择'],[1,'周一'],[2,'周二'],[3,'周三'],[4,'周四'],[5,'周五'],[6,'周六'],[7,'周日']];
function parseWeek(data){
	var returns="<select class=\"form-control input-small\">";
	for (var i = 0; i < dd.length; i++) {
		returns+="<option value='"+dd[i][0]+"' "+(Number(data)==i?"selected":"")+">"+dd[i][1]+"</option>";
	}
	returns+="</select>";
	return returns;
}

var edits = {};
var addindex = 0;
oTable.api().on('draw', function(e, settings, json) {
    if (hasnew) {
        $("#editabledatatable tbody tr td:nth-child(4) a.edit[data-mode='new']").click();
    }
});
//Add New Row
$('#editabledatatable_new').click(function(e) {
    hasnew = true;
    e.preventDefault();
    var editslength = getObj_vars_num(edits);
    var aiNew = oTable.fnAddData([{
        "week": "0",
        "link": '',
        "linktitle": '',
        "id": '<a href="#" class="btn btn-success btn-xs save" data-mydata="' + (editslength + 1) + '"><i class="fa fa-edit"></i> Save</a> <a href="#" class="btn btn-warning btn-xs cancel" data-mode=\'new\'><i class="fa fa-times"></i> Cancel</a>'
    }]);
    var nRow = oTable.fnGetNodes(aiNew[0]);
    editRow(oTable, nRow, editslength + 1, true);
    edits[editslength + 1] = nRow;
    // oTable.fnDraw();
});

//Delete an Existing Row
$('#editabledatatable').on("click", 'a.delete', function(e) {
    e.preventDefault();

    if (confirm("Are You Sure To Delete This Row?") == false) {
        return;
    }
    fakedeleteRowData($(this).attr("data-mydata-id"));
    var nRow = $(this).parents('tr')[0];
    oTable.fnDeleteRow(nRow);
    alert("Row Has Been Deleted!");
    oTable.fnDraw();
    oTable2.fnDraw();
});
//Cancel Editing or Adding a Row
$('#editabledatatable').on("click", 'a.cancel', function(e) {
    e.preventDefault();
    if ($(this).attr("data-mode") == "new") {
        hasnew = false;
        var nRow = $(this).parents('tr')[0];
        oTable.fnDeleteRow(nRow);
    } else {
        saveRow(oTable, edits[$(this).attr("data-mydata")]);
        delete edits[$(this).attr("data-mydata")];
    }
});

//Edit A Row
$('#editabledatatable').on("click", 'a.edit', function(e) {
    e.preventDefault();
    var nRow = $(this).parents('tr')[0];
    var editslength = getObj_vars_num(edits);
    if ($(this).attr("data-mode") == "new") {
        editRow(oTable, nRow, editslength + 1, true);
    } else {
        editRow(oTable, nRow, editslength + 1, false);
    }
    edits[editslength + 1] = nRow;
});
//Save an Editing Row
$('#editabledatatable').on("click", 'a.save', function(e) {
    if ($(this).attr("data-mydata-id") == "new") {
        hasnew = false;
    }

    e.preventDefault();
    if (this.innerHTML.indexOf("Save") >= 0) {
        var resource = new Array();
        resource.push($($(edits[$(this).attr("data-mydata")]).children('td')[0]).children('select')[0].value);
        resource.push($($(edits[$(this).attr("data-mydata")]).children('td')[1]).children('input')[0].value);
        resource.push($($(edits[$(this).attr("data-mydata")]).children('td')[2]).children('input')[0].value);
        resource.push($($(edits[$(this).attr("data-mydata")]).children('td')[3]).children('a.save').attr("data-mydata-id"));
        addOrUpdateRowData(resource);
        saveRow(oTable, edits[$(this).attr("data-mydata")]);
        delete edits[$(this).attr("data-mydata")];
        oTable.fnDraw();
    }
});

function editRow(oTable, nRow, editsid, isnew) {
    var aData = oTable.fnGetData(nRow);
    var jqTds = $('>td', nRow);
    
    jqTds[0].innerHTML = parseWeek(aData.week);
    jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.link + '">';
    jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData.linktitle + '">';
    jqTds[3].innerHTML = '<a href="#" class="btn btn-success btn-xs save" data-mydata="' + editsid + '" ' + (isnew ? "data-mode='new'" : "") + ' data-mydata-id=' + (isnew ? "'new'" : "'" + aData.id + "'") + '><i class="fa fa-save"></i> Save</a> <a href="#" class="btn btn-warning btn-xs cancel" data-mydata="' + editsid + '" ' + (isnew ? "data-mode='new'" : "") + ' ><i class="fa fa-times"></i> Cancel</a>';
}

function saveRow(oTable, nRow) {
    var jqInputs = $('input,select', nRow);
    oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
    oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
    oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
    oTable.fnUpdate('new or else', nRow, 3, false);
    oTable.fnDraw();
}

function cancelEditRow(oTable, nRow) {
    var jqInputs = $('input,select', nRow);
    oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
    oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
    oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
    oTable.fnUpdate('<a href="#" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>', nRow, 3, false);
    oTable.fnDraw();
}

function addOrUpdateRowData(data) {
    $.post("/apps/web/?r=application/addorupdatefavorlist", {
        "resource": data,
        "userid": localStorage.blog_userid
    }, function(datas) {

    }, "json");
}

function fakedeleteRowData(data) {
    $.post("/apps/web/?r=application/deletefakefavorlist", {
        "id": data
    }, function(datas) {

    }, "json");
}



//-----------------------------------------回收站---------------------------------------------------------------------

oTable2 = $('#trashdatatable').dataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": true,
    "bRetrieve": true,
    "bStateSave": false,
    "iDisplayLength": 20,
    "bServerSide": true, //每次数据修改，都请求服务器确认
    "bScrollCollapse": true,
    "sPaginationType": "full_numbers",
    "sServerMethod": "POST",
    "sAjaxSource": "/apps/web/?r=application/gettrashfavorlist",
    "aoColumns": [{
        "mData": "week",
        "sTitle": "时间",
        "sortable": true
    }, {
        "mData": "link",
        "sTitle": "网站地址",
        "sortable": false
    }, {
        "mData": "linktitle",
        "sTitle": "网站名",
        "sortable": false
    }, {
        "mData": "id",
        "sTitle": "操作",
        "sortable": false
    }],
    "fnServerParams": function(aoData) {
        aoData.push({
            "name": "hasnew",
            "value": hasnew
        });
        aoData.push({
            "name": "userid",
            "value": localStorage.blog_userid
        });
    },
    "aoColumnDefs": [{
        "aTargets": [0],
        "sTitle": "时间",
        "mData": "week",
        "sortable": true,
        "mRender": function(data, type, full) {
            return dd[Number(data)][1];
        }
    },{
        "aTargets": [3],
        "sTitle": "操作",
        "mData": "id",
        "sortable": false,
        "mRender": function(data, type, full) {
            return '<a href="#" class="btn btn-info btn-xs reducte" data-mydata-id=' + data + '><i class="fa fa-edit"></i> Reducte</a><a href="#" class="btn btn-danger btn-xs delete" data-mydata-id=' + data + '><i class="fa fa-trash-o"></i> Delete</a>';
        }
    }]
});

$('#trashdatatable').on("click", 'a.reducte', function(e) {
    e.preventDefault();
    updateRowDataOfReducte($(this).attr("data-mydata-id"));
    var nRow = $(this).parents('tr')[0];
    oTable2.fnDeleteRow(nRow);
    oTable2.fnDraw();
    oTable.fnDraw();
});
$('#trashdatatable').on("click", 'a.delete', function(e) {
    e.preventDefault();

    if (confirm("Are You Sure To Delete This Row?") == false) {
        return;
    }
    deleteRowData($(this).attr("data-mydata-id"));
    var nRow = $(this).parents('tr')[0];
    oTable2.fnDeleteRow(nRow);
    alert("Row Has Been Deleted!");
    oTable2.fnDraw();
});

function deleteRowData(data) {
    $.post("/apps/web/?r=application/deletefavorlist", {
        "id": data
    }, function(datas) {

    }, "json");
}

function updateRowDataOfReducte(data) {
    $.post("/apps/web/?r=application/updatefavorlistofreducte", {
        "id": data
    }, function(datas) {

    }, "json");
}
