
    var dropZone = document.getElementById('drop_zone');
	//x,y为drop_zone的位置，b为状态机，count为手机振机摇摆次数
	var x=0,y=0,b=0,count=0;
	var getVideo;
	
	function clockFun(){
		var clock=document.getElementById("clock");
		var time=new Date();
		clock.innerHTML=time.getHours()+' : '+ time.getMinutes()+' : '+ time.getSeconds();
		window.setTimeout("clockFun()",1000);
		}
	clockFun();


      function handleFileDragEnter(e) {
        e.stopPropagation();
        e.preventDefault();
        this.classList.add('hovering');
      }

      function handleFileDragLeave(e) {
        e.stopPropagation();
        e.preventDefault();
        this.classList.remove('hovering');
      }

      function handleFileDragOver(e) {
        e.stopPropagation();
        e.preventDefault();
        e.dataTransfer.dropEffect = 'copy';
      }

      function handleFileDrop(e) {
        e.stopPropagation();
        e.preventDefault();
        this.classList.remove('hovering');

        var files = e.dataTransfer.files;
 
        var f = files[0];
          
        var xmlhttp;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("guide_text").innerHTML=xmlhttp.responseText;
			document.getElementById("output_text").innerHTML="上传成功 ^_^ 手机扫描即可预览，若正在预览，刷新即可更新。";
			shake();
			}
		  }
		xmlhttp.open("post","subDo.php",true);
		var fd = new FormData(); 
        fd.append('file', f);
		xmlhttp.send(fd);
		count=0;
		
      }

      dropZone.addEventListener('dragenter', handleFileDragEnter, false);
      dropZone.addEventListener('dragleave', handleFileDragLeave, false);
      dropZone.addEventListener('dragover', handleFileDragOver, false);
      dropZone.addEventListener('drop', handleFileDrop, false);
	  
	  
	  function provision(){
		  document.getElementById("output_text").innerHTML="本应用为免费应用，大家可放心使用。同时本项目将开源供学习交流使用，代码托管在github";
		  document.getElementById("guide_text").innerHTML="将需预览的效果图文件拖拽到这里";
		  }
		  
	  function about(){
		  document.getElementById("guide_text").innerHTML="<video id='myVideo' src='pro_img/mov_bbb.mp4' onmouseover='mplay()' onmouseout='mstop()' loop='loop'></video>";
		  
		  var output_text= document.getElementById("output_text")
		  output_text.innerHTML="<p>我是钟买能，广东机电职业技术学院12级学生</p><p>QQ:<a href='http://wpa.qq.com/msgrd?v=3&uin=635725959&site=qq&menu=yes' target='_blank'> 635725959</a></p><p>微博：<a href='http://weibo.com/u/2162115292'  target='_blank'>钟买能同学</a></p><p>邮箱：635725959@qq.com</p><p>宗旨：做更多好玩、好用的应用给大家</p>"
		  getVideo=document.getElementById("myVideo");
		  getVideo.style.position="absolute";
		  getVideo.style.width=675+"px";
		  getVideo.style.top=0;
		  getVideo.style.left=-235+"px";
		  }
	  
	function mplay(){
		getVideo.play();
		}
	function mstop(){
		getVideo.pause();
		}

	function shake(){
		
		var drop_zone=document.getElementById("drop_zone");
		drop_zone.style.top=y+"px";
		drop_zone.style.left=x+"px";
		if(x==0){
			b=1;
			}else if(x==10){
				b=0
				}
		if(b==1){
			x+=1;
			y+=1;
			count++;
			}else{
				y-=1;
				x-=1;
				count++;
				}
			if(count>200){
				return;
				}
		setTimeout("shake()",1);
		}

	