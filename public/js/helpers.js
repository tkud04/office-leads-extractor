let  editMode = "", to = [], cc = [], bcc = [], mmsg = ``, attachments = [],
 sigs = [], sig = ``, sigQuill = null;

const showElem = (name) => {
	let names = [];
	
	if(Array.isArray(name)){
	  names = name;
	}
	else{
		names.push(name);
	}
	
	for(let i = 0; i < names.length; i++){
		$(names[i]).fadeIn();
	}
}

const hideElem = (name) => {
	let names = [];
	
	if(Array.isArray(name)){
	  names = name;
	}
	else{
		names.push(name);
	}
	
	for(let i = 0; i < names.length; i++){
		$(names[i]).hide();
	}
}

const extract = (t) => {
    let url = "api/extract";
	//create request
	let fd = new FormData();
		 fd.append("xf",t);
	const req = new Request(url,{method: "POST",body: fd});
	//console.log("dt: ",dt);
	
	
	//fetch request
	return fetch(req)
	   .then(response => {
		   if(response.status === 200){
			   //console.log(response);
			   
			   return response.json();
		   }
		   else{
			   return {status: "error:", message: "Network error"};
		   }
	   })
	   .catch(error => {
		    alert("Failed first to extract: " + error);			
	   })
	   .then(res => {
		   $('#result').html(res);
		   
	   }).catch(error => {
		    alert("Failed to extract: " + error);			
	   });
}

