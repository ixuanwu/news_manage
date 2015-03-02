 $(function() {  
        setInterval("GetTime()", 1000);  
    });  
  
    function GetTime() {  
        var mon, day, now, hour, min, ampm, time, str, tz, end, beg, sec;  
        /*  
        mon = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug",  
                "Sep", "Oct", "Nov", "Dec");  
        */  
        mon = new Array("1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月",  
                "9月", "10月", "11月", "12月");  
        /*  
        day = new Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");  
        */  
        day = new Array("周日", "周一", "周二", "周三", "周四", "周五", "周六");  
        now = new Date();  
        hour = now.getHours();  
        min = now.getMinutes();  
        sec = now.getSeconds();  
        if (hour < 10) {  
            hour = "0" + hour;  
        }  
        if (min < 10) {  
            min = "0" + min;  
        }  
        if (sec < 10) {  
            sec = "0" + sec;  
        }  
		 $("#Timer").html(  
                "<nobr>" + mon[now.getMonth()] + now.getDate()+"日 "
                         + hour + ":" + min +" "+day[now.getDay()] +"</nobr>");  
  
    }  // JavaScript Document