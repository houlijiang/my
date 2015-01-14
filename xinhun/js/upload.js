(function($){
    $.fn.upload = function(options) { //定义插件的名称，这里为userCp
    	 var dft = {
                 url: "/admin.php/upload/do_upload",
                 img:'/images/nopic.gif'
         };
		var ops = $.extend(dft,options);
		if(ops.img==''){
			ops.img = "/images/nopic.gif";
		}
		var me = $(this);
		$(this).addClass('fileInput');
		$(this).wrap("<div class='fileInput'></div>");
		$(this).parent().append("<img src='"+ops.img+"' />").append("<input value='"+ops.img+"' type='hidden' name='"+me.attr('name')+"'>");
		me.attr('name','');
        $(this).change(function(){
		    	var fd = new FormData();
				fd.append("upload", 1);
				fd.append("upfile", $(this).get(0).files[0]);
				$.ajax({
					url: ops.url,
					type: "POST",
					processData: false,
					contentType: false,
					data: fd,
					dataType:"json",
					success: function(d) {
						var v = d.result.file_name;
						me.parent().find('img').attr('src',v);
						me.parent().find('input').eq(1).val(v);
						
						$("#background,#progressBar").hide();
					}
				});
         });
    }
})(jQuery);