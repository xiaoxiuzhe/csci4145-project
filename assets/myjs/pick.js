$('document').ready(function(){
	
	var size = "w_460,h_280,c_scale";
	
	var messageListRef = firebase.database().ref("chefs");
	messageListRef.once('value', function(snapshot) {
		  snapshot.forEach(function(childSnapshot) {
			
			//create a container in the home page that will display chef' info
			var ChefName = childSnapshot.child("ChefName").val();
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
    		
    		var inputTitle = document.createElement("p");                      
    		var t2 = document.createTextNode("Pick him");      
    		inputTitle.appendChild(t2);    
    		
    		var label = document.createElement("label");       
    		var input = document.createElement("input");
    		input.setAttribute("style", "position:relative; top:-3px;");
    		input.setAttribute("type", "radio");
    		input.setAttribute("value", ChefName);
    		input.setAttribute("name", "chef");
    		label.appendChild(input);   
    		label.appendChild(inputTitle);   
    		    		
    		CheifContainer.appendChild(pic);
    		CheifContainer.appendChild(name);
    		CheifContainer.appendChild(label);
    		
    		document.getElementById("pickChef").appendChild(CheifContainer);
    		
		  });
		});
});
