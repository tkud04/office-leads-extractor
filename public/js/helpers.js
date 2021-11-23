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
    let url = "api/extractor";
	//create request
	let fd = new FormData();
		 fd.append("xf",t);
	const req = new Request(url,{method: "POST",body: fd});
	//console.log("dt: ",dt);
	 let h = null, results = [], ret = ``;
	
	//fetch request
	return fetch(req)
	   .then(response => {
		   hideElem('#extract-loading'); showElem('#extract-btn');
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
		   console.log("res: ",res);
		   if(res.status === "ok"){
			   h = res.message;
			   
			   if(h.length > 0){
				   let foundOne = false;
				   
				   for(let i = 0; i < h.length; i++){
					   let x = h[i];
					   let hosts = x.h;
					  // console.log("x: ",x);
					    if(hosts.length > 0){
					      if(hosts[0].indexOf("outlook.com") > 0 || hosts[0].indexOf("office.com") > 0){
							foundOne = true;
							results.push(x);
						  }
						}
				   }
				   
				   if(foundOne){
					   for(let i of results){
						   ret += `${i.em}\n`;
					   }
					   $('#ctr').html(` - ${results.length} leads`);
					   showElem('#ctr');
				   }
				   else{
					    ret = `No office365 email addresses found`;
				   }
			   }
			   else{
				   ret = `No email addresses found`;
			   }
			  
		   }
		   else{
			    ret = `Technical error`;
		   }
		   
		    $('#result').html(ret);
			document.querySelector('#result').scrollIntoView();
		   
	   }).catch(error => {
		    alert("Failed to extract: " + error);			
	   });
}

