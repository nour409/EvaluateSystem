var i=0;
document.addEventListener("keydown", function(e) {
  var x=0;

    if (e.key === "Enter" ) {
    
      toggleFullScreen();

    }
    else if (e.key) {  
    //  alert("YOU must enter full screen you are cheating now :) press ENTER now to back full screen");
     // toggleFullScreen();
    }
      
  }, false);
  
  (function () {
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen();
  }else{
  
  }
})();
function togg(){
  document.getElementById('qu').style.visibility='visible';
  
  document.documentElement.requestFullscreen();
  document.getElementById('but').style.visibility='hidden';
}
  function toggleFullScreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
       
    }
  
  }
  var x=0;
  var fullornot="";
  document.onfullscreenchange = function(){
    x++;
    if(x%2==0){
     fullornot="notfull";
    }else{
     fullornot="full";
    }
    setCookie("fullscreen", fullornot, 1)
    document.getElementById('x').innerHTML = x; 
     if (!document.fullscreenElement) {
        document.getElementById('qu').style.visibility='hidden';
      alert("YOU must enter full screen you are cheating now :) press ENTER now to back full screen");
      document.getElementById('but').style.visibility='visible';
      toggleFullScreen();
  }
  
  };
  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
 
    /*
    <script>

// Creating a cookie after the document is ready
$(document).ready(function () {
	createCookie("gfg", "GeeksforGeeks", "10");
});

// Function to create the cookie
function createCookie(name, value, days) {
	var expires;
	
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
	}
	else {
		expires = "";
	}
	
	document.cookie = escape(name) + "=" +
		escape(value) + expires + "; path=/";
}
</script>
*/