fnction check(){
	var obj={'name':'pradip', 'age':20, 'city':'kathmandu'}
var myjson=JSON.stringify(obj)
localStorage.setItem("testJSON", myjson)
}








// function check()
// {
// 	var xhr=new XMLHttpRequest();
// 	console.log(xhr);
// 	xhr.open("GET", 'https://jsonplaceholder.typicode.com/posts', true)
// 	xhr.responseType="json"
	
// 	xhr.onload=function(){
// 		a=document.getElementById('p')
// 		var x=xhr.response
// 		 for(var i=0;i<x.length;i++)
// 		 {
// 		 	a.innerHTML+=x[i].title
// 		 }


		
// 	}


// 	xhr.send();
// }