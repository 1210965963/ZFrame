function open_app_link(title, href) {
    if ($('#j_app_tab').tabs('exists', title)) {
        $('#j_app_tab').tabs('select', title);
    } else {
        var content = '<iframe scrolling="no" frameborder="0" src="'+href+'" style="width:100%; height:100%;"></iframe>'; 
        $('#j_app_tab').tabs('add',{
            title: title,
            content:content,
            closable:true,
            iconCls:'icon-default'
        });
    }
}
