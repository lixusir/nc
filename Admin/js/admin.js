$(function () {
    //清理缓存
    $("#cleanCache").click(function () {
        $.ajax({
            type: 'POST',
            async: false,
            url: cleanCacheURL,
            dataType: "json",
            success: function (data) {
                if (data == '1') {
                    layer.alert('缓存清除成功', {icon: 6}, function (index) {
                        layer.close(index);
                    });
                }
            },
            error: function (data) {
                layer.alert('清除失败', {icon: 5}, function (index) {
                    layer.close(index);
                });
            }
        });
    });
});  