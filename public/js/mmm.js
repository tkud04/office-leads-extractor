
	let  toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment'];
	let xx = ['#spam-btn','#trash-btn','#unread-btn','#move-btn'];
   
	
$(document).ready(function() {
    "use strict";
	//xtrctr
	$('#extract-btn').click(e => {
		e.preventDefault();
		let paragraph = "";
			const regex = /(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/;
//nst found = paragraph.match(regex);
let rr = [], found;

		let  text = $('#xf').val();
		
		if(text == ""){
			Swal.fire({
			 icon: 'error',
             title: "All fields are required"
           });
		}
		
		else{
   paragraph = text;
while (found = regex.exec(paragraph)){

     //-- store in array the found match email
     rr.push(found[0]);

    //-- remove the found email and continue search if there are still emails
    paragraph = paragraph.replace(found[0],"")
}
			$('#result').html(JSON.stringify(rr));
			// extract(text);
		}
		
			
	});
	
    
  
	
	
});
