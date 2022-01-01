$(function(){
//自适应移动端比例
function rem(size){
    var clientW=document.documentElement.clientWidth;
    var bili=clientW/size;
    var fontSize=bili*100;
    document.getElementsByTagName("html")[0].style.fontSize=fontSize+"px"
}
rem(750);
/********************************/

function login(){
	this.shade=$(".shade")[0];
	this.btnClose=$(".alertsubmit")[0];
	this.btn=$(".submit")[0];
	this.btn3=$(".zhuce")[0];
	this.yanzhengma=$("#yanCode")[0];
}
login.prototype={
	init:function(){
		var that=this;
		that.close();
		that.btns();
		that.btns3();
		that.clock();
	},
	close:function(){
		var that=this;
		that.btnClose.addEventListener("touchstart",function(e){
            e.preventDefault();
            that.btnClose.style.background="url("+PUBLIC+"/gold/img/forget_password/qd2.png)";
            that.btnClose.style.backgroundSize="cover";
       	},false);
       	that.btnClose.addEventListener("touchend",function(e){
            e.preventDefault();
            that.btnClose.style.background="url("+PUBLIC+"/gold/img/forget_password/qd.png)";
            that.btnClose.style.backgroundSize="cover";
            $(".alertBox").addClass("bounceOutRight");
            setTimeout(function(){
        		$(".alertBox").removeClass("bounceOutRight");
        		that.shade.style.display="none";
    		}, 500);
       	},false);
	},
	btns:function(){
		var that=this;
		that.btn.addEventListener("touchstart",function(e){
            e.preventDefault();
            that.btn.style.background="url("+PUBLIC+"/gold/img/zhuce/16.png)";
            that.btn.style.backgroundSize="cover";
       	},false);
       	that.btn.addEventListener("touchend",function(e){
            e.preventDefault();
            that.btn.style.background="url("+PUBLIC+"/gold/img/zhuce/15.png)";
            that.btn.style.backgroundSize="cover";
            that.shade.style.display="block"
            $(".alertBox").addClass("bounceInLeft")
            $(".alertBox img").addClass("rubberBand")
            setTimeout(function(){
        		$(".alertBox").removeClass("bounceInLeft");
    		}, 1000);
			var tel=$.trim($(".loginBox input:nth-of-type(1)").val());
			var realName=$.trim($(".loginBox input:nth-of-type(2)").val());
			var idCard=$.trim($(".loginBox input:nth-of-type(3)").val());
			var pwd=$.trim($(".loginBox input:nth-of-type(4)").val());
			var rePwd=$.trim($(".loginBox input:nth-of-type(5)").val());
			var reNum=$.trim($(".loginBox input:nth-of-type(6)").val());
			var verCode=$.trim($(".loginBox input:nth-of-type(7)").val());
			var msgCode=$.trim($(".loginBox input:nth-of-type(8)").val());

           
            //var telRet =  /(13|14|15|18)[0-9]{9}/;
            var telRet=/(^1[3|4|5|7|8][0-9]{9}$)/;
            var idCardRet =  /\d{17}[\d|x]|\d{15}/;

			if(tel == ''){
                $(".alertBox p").html("请输入手机号2！")
                return false
			}else{

                if(!telRet.test(tel)){
                    $(".alertBox p").html("请输入正确的手机号！")
                    return false
                }

			}

            if(realName == ''){
                $(".alertBox p").html("请输入真实姓名！")
                return false
			}

            if(idCard == ''){
                //$(".alertBox p").html("请输入证件号码！")
                //return false
            }else{

                //if(!idCardRet.test(idCard)){
                    //$(".alertBox p").html("请输入正确的证件号码！")
                    //return false
                //}

            }

            if(pwd == ''){
                $(".alertBox p").html("请输入密码！")
                return false
			}

            if(rePwd == ''){
                $(".alertBox p").html("请输入确认密码！")
                return false
            }

            if(pwd != rePwd){
                $(".alertBox p").html("两次输入的密码必须相同！")
                return false
            }

            // if(reNum == ''){
            //     $(".alertBox p").html("请输入推荐码！")
            //     return false
            // }

            if(verCode == ''){
                $(".alertBox p").html("请输入验证码！")
                return false
            }

            if(msgCode == ''){
                $(".alertBox p").html("请输入短信验证码！")
				return false;
            }




            $.ajax({
                type: "POST",
                url:APP+"?m=reg&a=reg",
                data:{tel:tel,realName:realName,idCard:idCard,pwd:pwd,reNum:reNum,verCode:verCode,msgCode:msgCode},
                dataType:"json",
                beforeSend:function(){
                    $(".alertBox p").html()
                },
                success: function(msg){

                  var  datas=eval(msg);
                  
//                    alert(datas.info);
                    $(".alertBox p").html(datas.reMsg)

                    if(datas.reTips == 'Success'){
                        setTimeout(function(){
                            window.location.href=APP+"?m=login"
                        },1000);

					}

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
//                    alert(XMLHttpRequest.status);
//                    alert(XMLHttpRequest.readyState);
//                    alert(textStatus);
                },

            })




            //else if继续验证
       	},false);
	},
	clock:function(){
		var that=this;
		that.yanzhengma.addEventListener("touchstart",function(e){
            e.preventDefault();
       	},false);
       	that.yanzhengma.addEventListener("touchend",function(e){
            e.preventDefault();
            		
			var tel=$.trim($(".loginBox input:nth-of-type(1)").val());		
		    var run = $("#run").val();
		// alert(run)	
		
		// if(run == 0)
		// {
			// return false;
		// }
		if(!(/^1[3|4|5|7|8]\d{9}$/.test(tel)))
		{
			alert("请输入正确手机号码!");
			return false;
		}else{	
			time_run();			
			$.ajax({
				url:APP+"?m=reg&a=ycode",
				type:'post',
				dateType:'json',
				data:{tel:tel,'type':1},
				success:function(data){	
					var datas = eval("("+data+")");	
					
           console.log(datas);
					if(datas.code == 1){
						alert("短信发送成功！");
						return false;
					}else{
						alert(datas.msg);
						return false;
					}
				},
				error:function(){
					alert('网络错误');
				}
				
			})
		
		}			
       	},false);
	},
	btns3:function(){
		var that=this;
		that.btn3.addEventListener("touchstart",function(e){
            e.preventDefault();
            that.btn3.style.background="url("+PUBLIC+"/gold/img/forget_password/9.png)";
            that.btn3.style.backgroundSize="cover";
       	},false);
       	that.btn3.addEventListener("touchend",function(e){
            e.preventDefault();
            that.btn3.style.background="url("+PUBLIC+"/gold/img/forget_password/8.png)";
            that.btn3.style.backgroundSize="cover";
            window.history.go(-1);
       	},false);
	}
};

var loginHtml=new login();
loginHtml.init();
/*
 * 
 */
})

function time_run()
{
var numClock=60
	 var t=setInterval(function(){
			numClock--;
			if(numClock<=0){
				clearInterval(t)
				$("#yanCode").text("获取");
				$("#run").val('1');
				return false
			}
		$("#yanCode").text(numClock+" s");
		$("#run").val('0');
		},1000)
		
	
}