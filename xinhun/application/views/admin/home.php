<?php $this->load->view("admin/public_header");?>
	<script type="text/javascript" src='/js/outlook2.js'> </script>
    <script type="text/javascript">
	 var _menus = {"menus":[
						{"menuid":"1","icon":"icon-sys","menuname":"ϵͳ����",
							"menus":[{"menuname":"�˵�����","icon":"icon-nav","url":"http://www.16sucai.com"},
									{"menuname":"�����û�","icon":"icon-add","url":"/admin/user/add"},
									{"menuname":"�û�����","icon":"icon-users","url":"demo2.html"},
									{"menuname":"��ɫ����","icon":"icon-role","url":"demo2.html"},
									{"menuname":"Ȩ������","icon":"icon-set","url":"demo.html"},
									{"menuname":"ϵͳ��־","icon":"icon-log","url":"demo.html"}
								]
						},{"menuid":"8","icon":"icon-sys","menuname":"Ա������",
							"menus":[{"menuname":"Ա���б�","icon":"icon-nav","url":"demo.html"},
									{"menuname":"��Ƶ���","icon":"icon-nav","url":"demo1.html"}
								]
						},{"menuid":"56","icon":"icon-sys","menuname":"���Ź���",
							"menus":[{"menuname":"���Ӳ���","icon":"icon-nav","url":"demo1.html"},
									{"menuname":"�����б�","icon":"icon-nav","url":"demo2.html"}
								]
						},{"menuid":"28","icon":"icon-sys","menuname":"�������",
							"menus":[{"menuname":"��֧����","icon":"icon-nav","url":"demo.html"},
									{"menuname":"����ͳ��","icon":"icon-nav","url":"demo1.html"},
									{"menuname":"����֧��","icon":"icon-nav","url":"demo.html"}
								]
						},{"menuid":"39","icon":"icon-sys","menuname":"�̳ǹ���",
							"menus":[{"menuname":"��Ʒ��","icon":"icon-nav","url":"/shop/productcatagory.aspx"},
									{"menuname":"��Ʒ�б�","icon":"icon-nav","url":"/shop/product.aspx"},
									{"menuname":"��Ʒ����","icon":"icon-nav","url":"/shop/orders.aspx"}
								]
						}
				]};
        //���õ�¼����
        function openPwd() {
            $('#w').window({
                title: '�޸�����',
                width: 300,
                modal: true,
                shadow: true,
                closed: true,
                height: 160,
                resizable:false
            });
        }
        //�رյ�¼����
        function close() {
            $('#w').window('close');
        }

        

        //�޸�����
        function serverLogin() {
            var $newpass = $('#txtNewPass');
            var $rePass = $('#txtRePass');

            if ($newpass.val() == '') {
                msgShow('ϵͳ��ʾ', '���������룡', 'warning');
                return false;
            }
            if ($rePass.val() == '') {
                msgShow('ϵͳ��ʾ', '����һ���������룡', 'warning');
                return false;
            }

            if ($newpass.val() != $rePass.val()) {
                msgShow('ϵͳ��ʾ', '�������벻һ��������������', 'warning');
                return false;
            }

            $.post('/ajax/editpassword.ashx?newpass=' + $newpass.val(), function(msg) {
                msgShow('ϵͳ��ʾ', '��ϲ�������޸ĳɹ���<br>����������Ϊ��' + msg, 'info');
                $newpass.val('');
                $rePass.val('');
                close();
            })
            
        }

        $(function() {

            openPwd();
            //
            $('#editpass').click(function() {
                $('#w').window('open');
            });

            $('#btnEp').click(function() {
                serverLogin();
            })

           

            $('#loginOut').click(function() {
                $.messager.confirm('ϵͳ��ʾ', '��ȷ��Ҫ�˳����ε�¼��?', function(r) {

                    if (r) {
                        location.href = '/admin/user/logout';
                    }
                });

            })
			
			
			
        });
		
		

    </script>
<noscript>
<div style=" position:absolute; z-index:100000; height:2046px;top:0px;left:0px; width:100%; background:white; text-align:center;">
    <img src="images/noscript.gif" alt='��Ǹ���뿪���ű�֧�֣�' />
</div></noscript>
    <div region="north" split="true" border="false" style="overflow: hidden; height: 30px;
        background: url(images/layout-browser-hd-bg.gif) #7f99be repeat-x center 50%;
        line-height: 20px;color: #fff; font-family: Verdana, ΢���ź�,����">
        <span style="float:right; padding-right:20px;" class="head"><a href="#" id="editpass">�޸�����</a> <a href="#" id="loginOut">��ȫ�˳�</a></span>
        <span style="padding-left:10px; font-size: 16px; "><img src="images/blocks.gif" width="20" height="20" align="absmiddle" /> 16�ز���  www.16sucai.com</span>
    </div>
    <div region="south" split="true" style="height: 30px; background: #D2E0F2; ">
        <div class="footer">By ������ Email:bjhxl@59ibox.cn</div>
    </div>
    <div region="west" split="true" title="�����˵�" style="width:180px;" id="west">
<div class="easyui-accordion" fit="true" border="false">
		<!--  �������� -->
				
			</div>

    </div>
    <div id="mainPanle" region="center" style="background: #eee; overflow-y:hidden">
        <div id="tabs" class="easyui-tabs"  fit="true" border="false" >
			<div title="��ӭʹ��" style="padding:20px;overflow:hidden;" id="home">
				
			<h1>Welcome to jQuery UI!</h1>

			</div>
		</div>
    </div>
    
    
    <!--�޸����봰��-->
    <div id="w" class="easyui-window" title="�޸�����" collapsible="false" minimizable="false"
        maximizable="false" icon="icon-save"  style="width: 300px; height: 150px; padding: 5px;
        background: #fafafa;">
        <div class="easyui-layout" fit="true">
            <div region="center" border="false" style="padding: 10px; background: #fff; border: 1px solid #ccc;">
                <table cellpadding=3>
                    <tr>
                        <td>�����룺</td>
                        <td><input id="txtNewPass" type="Password" class="txt01" /></td>
                    </tr>
                    <tr>
                        <td>ȷ�����룺</td>
                        <td><input id="txtRePass" type="Password" class="txt01" /></td>
                    </tr>
                </table>
            </div>
            <div region="south" border="false" style="text-align: right; height: 30px; line-height: 30px;">
                <a id="btnEp" class="easyui-linkbutton" icon="icon-ok" href="javascript:void(0)" >
                    ȷ��</a> <a class="easyui-linkbutton" icon="icon-cancel" href="javascript:void(0)"
                        onclick="closeLogin()">ȡ��</a>
            </div>
        </div>
    </div>

	<div id="mm" class="easyui-menu" style="width:150px;">
		<div id="mm-tabclose">�ر�</div>
		<div id="mm-tabcloseall">ȫ���ر�</div>
		<div id="mm-tabcloseother">����֮��ȫ���ر�</div>
		<div class="menu-sep"></div>
		<div id="mm-tabcloseright">��ǰҳ�Ҳ�ȫ���ر�</div>
		<div id="mm-tabcloseleft">��ǰҳ���ȫ���ر�</div>
		<div class="menu-sep"></div>
		<div id="mm-exit">�˳�</div>
	</div>


</body>
</html>