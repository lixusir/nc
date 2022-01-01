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
	this.btn2=$(".loginBox a:nth-of-type(2)")[0];
	this.btn3=$(".zhuce")[0];
	this.yanzhengma=$(".loginBox a:nth-of-type(1)")[0];
	this.check1=$(".loginBox input:nth-of-type(4)")[0];
	this.img1=$(".loginBox img:nth-of-type(1)")[0];
	this.img2=$(".loginBox img:nth-of-type(2)")[0];
	this.check2=$(".loginBox input:nth-of-type(5)")[0];
	this.flag1=false;
	this.flag2=false;
}
login.prototype={
	init:function(){
		var that=this;
		that.close();
		that.btns();
		that.btns2();
		that.btns3();
		// that.clock();
		that.check1btn();
		that.check2btn();
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
            that.btn.style.background="url("+PUBLIC+"/gold/img/login/dlan2.png)";
            that.btn.style.backgroundSize="cover";
       	},false);
       	that.btn.addEventListener("touchend",function(e){
            e.preventDefault();
            that.btn.style.background="url("+PUBLIC+"/gold/img/login/dlan.png)";
            that.btn.style.backgroundSize="cover";
            that.shade.style.display="block"
            $(".alertBox").addClass("bounceInLeft")
            $(".alertBox img").addClass("rubberBand")
            setTimeout(function(){
        		$(".alertBox").removeClass("bounceInLeft");
    		}, 1000);

            var tel=$.trim($(".loginBox input:nth-of-type(1)").val());
            var pwd=$.trim($(".loginBox input:nth-of-type(2)").val());
            var verCode=$.trim($(".loginBox input:nth-of-type(3)").val());

            var rememberTel = 0;
            var rememberPwd = 0;

            if($(".loginBox input:nth-of-type(5)").is(':checked')){
                rememberPwd = 1;
            }

            if($(".loginBox input:nth-of-type(4)").is(':checked')){
                rememberTel = 1;
			}else{

                if(rememberTel != 1){
                    $(".alertBox p").html("选择记住密码前必须先选择记住账号！")
                    return false
                }

            }

            if(tel == ''){
                $(".alertBox p").html("请输入手机号！")
				return false
            }

            if(pwd == ''){
                $(".alertBox p").html("请输入登录密码！")
                return false
            }

            if(verCode == ''){
                $(".alertBox p").html("请输入验证码！")
                return false
            }

            $.ajax({

                type: "POST",
                url:APP+"?m=login&a=login",
                data:{tel:tel,pwd:pwd,verCode:99,rememberTel:rememberTel,rememberPwd:rememberPwd},
                dataType:"json",
                beforeSend:function(){
                    $(".alertBox p").html('')
                },
                success: function(msg){

                    datas=eval(msg)

                    $(".alertBox p").html(datas.reMsg)

                    if(datas.reTips == 'Success'){
                        setTimeout(function(){
                            window.location.href=APP+"?m=index"
                        },1000);

                    }

                },

			})


            //else if继续验证
       	},false);
	},
	// clock:function(){
	// 	var that=this;
	// 	that.yanzhengma.addEventListener("touchstart",function(e){
     //        e.preventDefault();
     //   	},false);
     //   	that.yanzhengma.addEventListener("touchend",function(e){
     //        e.preventDefault();
     //        alert("发送验证码")
     //   	},false);
	// },
	btns2:function(){
		var that=this;
		that.btn2.addEventListener("touchstart",function(e){
            e.preventDefault();
            that.btn2.style.background="url("+PUBLIC+"/gold/img/login/wjmm2.png)";
            that.btn2.style.backgroundSize="cover";
       	},false);
       	that.btn2.addEventListener("touchend",function(e){
            e.preventDefault();
            that.btn2.style.background="url("+PUBLIC+"/gold/img/login/wjmm.png)";
            that.btn2.style.backgroundSize="cover";
            // window.location.href="forget_password.html";
            window.location.href=APP+"?m=user&a=forget";
       	},false);
	},
	btns3:function(){
		var that=this;
		that.btn3.addEventListener("touchstart",function(e){
            e.preventDefault();
            that.btn3.style.background="url("+PUBLIC+"/gold/img/login/4.png)";
            that.btn3.style.backgroundSize="cover";
       	},false);
       	that.btn3.addEventListener("touchend",function(e){
            e.preventDefault();
            that.btn3.style.background="url("+PUBLIC+"/gold/img/login/3.png)";
            that.btn3.style.backgroundSize="cover";
            //window.location.href="zhuce.html";
            window.location.href=APP+"?m=reg";
       	},false);
	},
	check1btn:function(){
		var that=this;
		that.check1.addEventListener("touchstart",function(e){
            e.preventDefault();
       	},false);
       	that.check1.addEventListener("touchend",function(e){
            e.preventDefault();
            if(that.flag1){
            	that.img1.style.display="block";
            	that.flag1=false;
            }else{
            	that.img1.style.display="none";
            	that.flag1=true;
            }
       	},false);
	},
	check2btn:function(){
		var that=this;
		that.check2.addEventListener("touchstart",function(e){
            e.preventDefault();
       	},false);
       	that.check2.addEventListener("touchend",function(e){
            e.preventDefault();
            if(that.flag2){
            	that.img2.style.display="block";
            	that.flag2=false;
            }else{
            	that.img2.style.display="none";
            	that.flag2=true;
            }
       	},false);
	}
};

var loginHtml=new login();
loginHtml.init();
/*
 * 
 */
})