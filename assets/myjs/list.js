$('document').ready(function(){
	
	var size = "w_460,h_280,c_scale";
	
	var ref = firebase.database().ref("chefs");
	ref.once('value', function(snapshot) {
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
    		
    		CheifContainer.appendChild(pic);
    		CheifContainer.appendChild(name);
    		CheifContainer.appendChild(description);
    		CheifContainer.appendChild(nav);
    		
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