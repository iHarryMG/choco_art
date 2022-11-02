<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
<LINK href="design/article_content_design.css" type=text/css rel=stylesheet>
<script language="Javascript" type="text/javascript">
var obj = {
	apikey: "76b0031357639549c1ada98784c88c3ccc49ba1a",
	init : function()
	{
		obj.q = document.getElementById('q');
		obj.r = document.getElementById('r');
	},
	// 검색을 요청하는 함수 
 	pingSearch : function(page)
 	{
	    if (obj.q.value)
	    {
	      obj.s = document.createElement('script');
	      obj.s.type ='text/javascript';
	      obj.s.charset ='utf-8';
	      obj.s.src = 'http://apis.daum.net/search/blog?apikey=' + obj.apikey + '&result=5&pageno='+page+'&sort=accu&output=json&callback=obj.pongSearch' +
		  '&q=' + encodeURI(obj.q.value);
	      document.getElementsByTagName('head')[0].appendChild(obj.s);
	    }
 	},
 	// 검색 결과를 뿌리는 함수 
	pongSearch : function(z)
	{
		obj.r.innerHTML = '';
		for (var i = 0; i < z.channel.item.length; i++)
		{
			var li = document.createElement('li');
			var a = document.createElement('a');
			var p = document.createElement('p');
			a.href = z.channel.item[i].link;
			a.target = "_blank";
			a.innerHTML = obj.escapeHtml(z.channel.item[i].title);
			p.innerHTML =  obj.escapeHtml(z.channel.item[i].description);
			
			li.appendChild(a);
			li.appendChild(p);
			obj.r.appendChild(li);
		}
	},
	// HTML태그 안 먹게 하는 함수
	escapeHtml : function(str) 
	{
		str = str.replace(/&/g, "&");
		str = str.replace(/</g, "<");
		str = str.replace(/>/g, ">");	
		str = str.replace("[", "");
		str = str.replace("]", "");
		return str;
	}
};

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

window.onload = function()
{
  var page = getUrlVars()["page"];
  if(!page){
	  page = 1;
  }
  obj.init();
  obj.pingSearch(page);
};

</script>
</head>
<body>
<center>
	<div id="divSearch">
		<input id="q" type="hidden" value="쇼코아르"/>
		<input id="total_articles" type="hidden" value=""/>
	</div>
	<div>
		<table cellpadding=5>
			<tr>
				<td id="r" align=left></td>
			</tr>
			<tr>
				<td id="page_no" align=center>				
				<hr>
<?
				for($i = 1; $i < 18; $i++){
					if(($_REQUEST['page'] == $i)){
						echo ("<a href='$_PHPSELF?page=$i' id='pagenum' >&nbsp[$i]&nbsp</a>");
					}
					else{
						echo ("<a href='$_PHPSELF?page=$i' id='pagenum' >&nbsp $i &nbsp</a>");
					}
				}
				
?>
				</td>
			</tr>
		</table>
	</div>
</center>
</body>
</html>

