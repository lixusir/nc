//    面对对象处理数据
var chart={
    //获取画布
    mychart:echarts.init(document.getElementById('chart')),
    //配置option信息
    option:{
        //背景颜色
        backgroundColor:'#EFEFF4',
	 	  grid:{
			top:'15px;',
				left:'50px',
				right:'15px;',
				bottom:'30px'
		},
        //提示框设置
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: true,
                lineStyle: {
                    color: '#04B5A3',
                    width: 0,
                    opacity: 1
                }
            }
        },
        //数据轴设置
        xAxis: {
            type: 'category',
            data: [],
            boundaryGap:true,
            axisLine: { lineStyle: { color: '#8392A5' } }
        },
        //坐标轴设置
        yAxis: {
            scale: true,
            boundaryGap:["10%","10%"],
            axisLine: { lineStyle: { color: '#8392A5' } },
            splitLine: { show: false }
        },
        //图表类型设置
        series:{
            type:'line',
            data:[],
            itemStyle: {
                normal: {
                    color: '#04B5A3',
                    color0: '#0CF49B',
                    borderColor: '#04B5A3',
                    borderColor0: '#0CF49B'
                }
            }
        },
        //缩放设置
       /* dataZoom: [
            {
                type: 'slider',
                show: true,
                xAxisIndex: [0],
                start: 0,
                end: 100
            },
            {
                type: 'inside',
                xAxisIndex: [0],
                start: 0,
                end: 100
            }
        ]*/
    },
    //配置图表信息
    deploy:{
        //导航配置
        nav:{
            //导航容器的id 默认为chartNav
            navId:"chartNav",
            data:[
                {
                    //导航名称
                    title:"分时线",
                    //数据间隔 单位秒
                    interval:2,
                    //导航对应的图标 无为false
                    icon:"",
                    //对应的class名称
                    class:"active",
                    //图标的类型0为折线图,1为kline线图  candlestick
                    type:0,
                    //显示数据的条数 不存在的话为无穷大 0为不显示,-1为无穷大
                    num:10
                }
            ]
        },
        //获取数据请求类型
        btype:"post",
        //请求数据地址
        bUrl:"",
        //请求时候需要发送的数据
        data:null
    },
    //保存数据
    oldData:null,
    //中间处理保存的数据
    newData:[],
    //最终用到页面上的数据
    inData:[],
	time:new Date().getTime(),
    //配置导航的函数
    nav:function(){
        var str="";
        for(var i=0;i<this.deploy.nav.data.length;i++){
            str+='<a href="javascript:void(0);" class="'+this.deploy.nav.data[i].class+'">'+this.deploy.nav.data[i].icon+this.deploy.nav.data[i].title+'</a>'
        }
        $("#"+this.deploy.nav.navId).empty().append(str);
    },
    //请求数据的函数
    getData:function(){
        var tthis=this;
        $.ajax({
            url:this.deploy.bUrl,
            type:this.deploy.btype,
            data:this.deploy.data,
            dataType:"json",
            success:function(data){
                tthis.oldData=data;
		
            },error:function(){
                console.log('没有获取到数据');
            }
        })
    },
    //处理数据的函数
    setData:function(num,interval){
        //返回的数据
        var dd={};
        //遍历导航数据
        //第一个下标
		//console.log(this.oldData);
        var index=this.setTime(this.oldData[0].date*1000,interval,0);
        //思路：oen 先找到第一个时间戳 循环数据 第一个时间戳一次递增间隔时间  找到第一个数据时间小于递归时间戳的数据存进新的数据
		dd[cun]=[];
        for(var i=0,cun=index,a=0,b=0,z=0;cun<this.time;i++){
			//console.log(cun);
            z++;
            if(num==0){
                break;
            }
            if(b>num&&num!=-1){
                break;
            }
			//console.log(i);
			if(this.oldData[i]==null){
				dd[cun]=dd[cun - (interval * 1000)];
				cun=cun+(interval*1000);
				continue;
			}
            if((this.oldData[i].date*1000)<=cun){
				
				//console.log(dd[cun],cun);
                dd[cun].push(this.oldData[i].price);
            }else{
                a++;
                //判断不是连续为空的
                if(dd[cun]==""&&a!=z){
                    if(interval<=86400) {
                        dd[cun] = dd[cun - (interval * 1000)];
                    }else if(interval=="month"){

                    }
                }
                //如果是连续的空的话
                if(dd[cun]==undefined&&a==z){
                    //delete dd[cun];
                }
                //cun增加之前判断是否为空如果为空
                if(interval<86400){
                    cun=cun+(interval*1000);
                }else if(interval=='month'){

                }
                dd[cun]=[];
                i=i-1;
            }
        }
        return dd;
    },
    //遍历导航处理数据
    setNav:function(){
        for(var i=0;i<this.deploy.nav.data.length;i++){
            var dd={};
            dd.data=this.setData(this.deploy.nav.data[i].num,this.deploy.nav.data[i].interval);
            dd.type=this.deploy.nav.data[i].type;
            dd.num=this.deploy.nav.data[i].num;
            dd.interval=this.deploy.nav.data[i].interval;
            this.newData.push(dd);
        }
    },
    //把数据处理为最终可用的数据
    disposeData:function(){
        //循环最新处理过的数据
        var tthis=this;
        this.newData.forEach(function(item,index){
            var dd={};
            dd.time=[];
            dd.data=[];
            var index=0,index2=0;
            for(var key in item.data){
                if(item.num==0){
                    break;
                }
                index++;
                if(item.data[key]==""){
                    index2++;
                }
                if(item.data[key]==""&&index==index2){
                    continue;
                }
                dd.time.push(tthis.setTime(key,item.interval,1));
                if(item.type==0){
                    dd.data.push(item.data[key][item.data[key].length-1]);
                }else {
                    var data = [];
                    data.push(item.data[key][item.data[key].length - 1]);
                    data.push(item.data[key][0]);
                    data.push(Math.min.apply(null, item.data[key]));
                    data.push(Math.max.apply(null, item.data[key]));
                    dd.data.push(data);
                }
            }
            tthis.inData.push(dd);
        })
    },
    //给不同的按钮绑定不同的数据
    bindClick:function(){
        var tthis=this;
        $("#"+this.deploy.nav.navId+" a").bind("click",function(){
            $("#"+tthis.deploy.nav.navId+" a").removeClass("active");
            $(this).addClass("active");
            tthis.option.xAxis.data=tthis.inData[$(this).index()].time;
            tthis.option.series.data=tthis.inData[$(this).index()].data;
            if(tthis.newData[$(this).index()].type==0){
                tthis.option.series.type='line';
                tthis.option.tooltip.formatter=function(data){
                    return "时间:"+data[0].name+"<br>"+
                        "价格"+data[0].data;
                }
            }else{
                tthis.option.series.type='candlestick';
                tthis.option.tooltip.formatter=function(data){

                    return "时间:"+data[0].name+"<br>"+
                        "今开"+data[0].data[0]+"<br>"+
                        "昨收"+data[0].data[1]+"<br>"+
                        "最低"+data[0].data[2]+"<br>"+
                        "最高"+data[0].data[2]+"<br>";
                }
            }
            tthis.mychart.setOption(tthis.option);
        })
    },
    //获取第一个时间戳的函数
    setTime:function(data,interval,type){

        var time=new Date(parseInt(data));
        var arr=[];
        arr[0]=time.getFullYear();
        arr[1]=time.getMonth()+1;
        arr[2]=time.getDate();
        arr[3]=time.getHours().toString().length==1?"0"+time.getHours():time.getHours();
        arr[4]=time.getMinutes().toString().length==1?"0"+time.getMinutes():time.getMinutes();
        arr[5]=time.getSeconds().toString().length==1?"0"+time.getSeconds():time.getSeconds();
        var str1="";
        var str2="";
        if(interval<60){
            str1=arr[0]+"-"+arr[1]+"-"+arr[2]+" "+arr[3]+":"+arr[4]+":00";
            str2=arr[3]+":"+arr[4]+":"+arr[5];
        }else if(interval<3600){
            str1=arr[0]+"-"+arr[1]+"-"+arr[2]+" "+arr[3]+":"+arr[4]+":00";
            str2=arr[3]+":"+arr[4];
        }else if(interval<86400){
            str1=arr[0]+"-"+arr[1]+"-"+arr[2]+" "+arr[3]+":00:00";
            str2=arr[3]+":"+arr[4];
        }else{
            //str1=arr[0]+"-"+arr[1]+"-"+arr[2]+" 00:00:00";
            //str2=arr[0]+"-"+arr[1]+"-"+arr[2];
			  str1=arr[0]+"-"+arr[1]+"-"+arr[2]+" "+"00:00:00";
            str2=arr[3]+":"+arr[4];
        }
        if(type==0){
            return new Date(str1.replace(/-/g, "/")).getTime();
        }else{
            return str2;
        }
    },
    //开始执行函数
    start:function(){
        //配置导航信息
        this.nav();
        //获取数据
        //this.getData();
        //处理导航数据
        this.setNav();
        //处理最终的数据`
        this.disposeData();
        //绑定点击函数
        this.bindClick();
        //加载默认图表
        //获取默认图表下标
        var index=$("#"+this.deploy.nav.navId+" a.active").index();
        this.option.xAxis.data=this.inData[index].time;
        this.option.series.data=this.inData[index].data;
        if(this.newData[index].type==0){
            this.option.series.type='line';
            this.option.tooltip.formatter=function(data){
                return "时间:"+data[0].name+"<br>"+
                    "价格"+data[0].data;
            }
        }else{
            this.option.series.type='candlestick';
            this.option.tooltip.formatter=function(data){

                return "时间:"+data[0].name+"<br>"+
                    "今开"+data[0].data[0]+"<br>"+
                    "昨收"+data[0].data[1]+"<br>"+
                    "最低"+data[0].data[2]+"<br>"+
                    "最高"+data[0].data[2]+"<br>";
            }
        }
        this.mychart.setOption(this.option);
    }
}