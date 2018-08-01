$('document').ready(function(){
	
	var size = "w_460,h_280,c_scale";
	
	var messageListRef = firebase.database().ref("chefs");
	messageListRef.once('value', function(snapshot) {
		  snapshot.forEach(function(childSnapshot) {
			
			//create a container in the home page that will display chef' info
			var ChefName = childSnapshot.child("ChefName").val();
		    var Description = childSnapshot.child("Description").val();
		    var img = childSnapshot.child("img").val();
		    
		    var CheifContainer = document.createElement("div");
		    CheifContainer.className = "span4";
		    
		    var pic = document.createElement("img");
    		//resize img
    		var array = img.split('/'); 
    		array.splice(-2, 0, size);
    		var output = array.join('/');
    		pic.src = output;
		    pic.className = "circle";
    		
    		var name = document.createElement("h2");                      
    		var t1 = document.createTextNode(ChefName);      
    		name.appendChild(t1);                                        
    		
    		var description = document.createElement("P");                     
    		var t2 = document.createTextNode(Description);    
    		description.appendChild(t2);                                         
    		
    		var nav = document.createElement("P");    
    		var a = document.createElement('a');
    		var linkText = document.createTextNode("reserve »");
    		a.className = "page-scroll";
    		a.href = "#Reserve";
    		a.appendChild(linkText);
    		nav.appendChild(a);
    		
    		var deleteBtn = document.createElement("button");  
    		var t3 = document.createTextNode("Delete");       // Create a text node
    		deleteBtn.appendChild(t3);  
    		deleteBtn.onclick = function(){
    			
    			var pieces =  img.split("/");
    			var img_id = pieces[pieces.length-1].split(".")[0];
    			
    			var formData = new FormData();
    			formData.append('img_id', img_id);
    			
    			var xhr = new XMLHttpRequest();
    			
    		    xhr.open('DELETE', "http://localhost:8888", true);
    		    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    		    xhr.setRequestHeader('Content-Type','multipart/form-data; boundary=----7dd322351017c');
    		    xhr.send(img_id);

    		    xhr.onreadystatechange = function(e) {
    		        if (xhr.readyState == 4 && xhr.status == 200) {
	        				var key = childSnapshot.key;
	        				var ref = firebase.database().ref("chefs");
	        				ref.child(key).remove();
	        				location.reload();
    		            }
    		        };
    		        
    			};
    		deleteBtn.className = "btn btn-default";
    		
    		CheifContainer.appendChild(pic);
    		CheifContainer.appendChild(name);
    		CheifContainer.appendChild(description);
    		CheifContainer.appendChild(nav);
    		CheifContainer.appendChild(deleteBtn);
    		
    		document.getElementById("display").appendChild(CheifContainer);
    		
    		load_js();
		  });
		});
});


function load_js()
{
   var head= document.getElementsByTagName('head')[0];
   var script= document.createElement('script');
   script.src= 'assets/js/scrolling-nav.js';
   head.appendChild(script);
}