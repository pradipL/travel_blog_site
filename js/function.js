function like(name)
{
	console.log("hello worlds");
	xhr=new XMLHttpRequest();
	xhr.open("POST","js/like.php", true);
	
	xhr.onload=()=>{
		if(xhr.status===200)
		{
			console.log("OK");
		}
		else
		{
			console.log("problem");
		}
	}
		
		// const data={name:"paradip"};
		
		console.log(name);
		// const mydata=JSON.stringify(data);



		
		

		
			
		xhr.send();
	}

	