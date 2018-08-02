
function Share(username){
	if(username===undefined){
		username = "Anonymous";
	}
	
	//validate
	if(document.getElementById("Comment").value == ""){
		alert("Please leave your comment, it is important to us.")
		return false;
	}
	var comment = document.getElementById("Comment").value;
	
	const monthNames = ["January", "February", "March", "April", "May", "June",
	                    "July", "August", "September", "October", "November", "December"
	                  ];
	
	var date = new Date();
	var year = date.getFullYear();
	var month = monthNames[date.getMonth()];
	var day = date.getDate()
	
	var ref = firebase.database().ref("comments");
	var newRef = ref.push();
	newRef.set({
	  'name': username,
	  'comment': comment,
	  'year' : year,
	  'month' : month,
	  'day' : day,
	});
	alert("Your comment is important to us. Thank you");

}

$('document').ready(function(){
		
	var ref = firebase.database().ref("comments");
	ref.once('value', function(snapshot) {
		  snapshot.forEach(function(childSnapshot) {
			
			//create a container in the home page that will display chef' info
			var name = childSnapshot.child("name").val();
		    var comment = childSnapshot.child("comment").val();
		    var year = childSnapshot.child("year").val();
		    var month = childSnapshot.child("month").val();
		    var day = childSnapshot.child("day").val();
		    
		    var li = document.createElement("li");
		    li.className = "clearfix";
		    
		    var div = document.createElement("div");
		    div.className = "post-comments";
		    
		    var p1 = document.createElement("p"); 
		    p1.className = "meta";
//		    var text1 = document.createTextNode(month + " " + day + ", " + year + " " + name + " says : ");
		    var text1 = document.createTextNode(month + " " + day + ", " + year + " ");    
		    var a = document.createElement("a"); 
		    var atext = document.createTextNode(name);
		    a.appendChild(atext);  
		    
		    var text2 = document.createTextNode(" says : ");
		    
		    p1.appendChild(text1);  
		    p1.appendChild(a); 
		    p1.appendChild(text2); 
		    
//		    highlight(document.getElementsByClassName('meta'),name); // This will return false if the word was not found...

		    
		    var p3 = document.createElement("p"); 
		    var text3 = document.createTextNode(comment);
		    p3.appendChild(text3);  
		    
		    div.appendChild(p1);  
		    div.appendChild(p3);
		    li.appendChild(div);
		    
    		document.getElementById("commentArea").appendChild(li);
    		
		  });
		});
});

//function highlight(container,what,spanClass) {
//    var content = container.innerHTML,
//        pattern = new RegExp('(>[^<.]*)(' + what + ')([^<.]*)','g'),
//        replaceWith = '$1<span ' + ( spanClass ? 'class="' + spanClass + '"' : '' ) + '">$2</span>$3',
//        highlighted = content.replace(pattern,replaceWith);
//    return (container.innerHTML = highlighted) !== content;
//}