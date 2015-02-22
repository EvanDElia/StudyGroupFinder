function Group(criteria, name, numMembers, memberLimit, professor, classCode){
	this.name = name;
	this.subject = criteria;
	this.numMembers = numMembers;
	this.memberLimit =  memberLimit;
	this.professor = professor;
	this.classCode = classCode;
	
	//Setters and Getters
	this.getName = function(){return this.name;};
	this.getSubject = function(){return this.subject;};
	this.getNumMembers = function(){return this.numMembers;};
	this.getMemberLimit = function(){return this.memberLimit;};
	this.getProfessor = function(){return this.professor;};
	this.getClassCode = function(){return this.classCode;};
	
	this.setName = function(n){this.name = n + "";};
	this.setSubject = function(c){this.subeject = c + "";};
	this.setNumMembers = function(n){if (typeof n =="number")this.numMembers = n;};
	this.setMemberLimit = function(n){if (typeof n == "number")this.memberLimit = n;};
	this.setProfessor = function(p){this.professor = p + "";};
	this.setClassCode = function(c){if (typeof c == "number") this.classCode = c;};
	
	//Begin More methods
	this.createNewMeeting = function(){
		
	};
};

function displayAllGroups(){
	for (var i = 0; i < allGroups.length; i++){
		var temp = allGroups[i];
		addRow(temp.getSubject(), temp.getName(), temp.getProfessor(), temp.getClassCode(), temp.getNumMembers() + " / " + temp.getMemberLimit(), "yes");
	}
};

function createNewGroup(){
	var subject = document.getElementById("element_2").value;
	console.log(subject);
	var name = document.getElementById("element_1").value;
	console.log(name);
	var professor = document.getElementById("element_5").value;
	console.log(professor);
	var classCode = document.getElementById("element_6").value;
	console.log(classCode);
	var numMembers = document.getElementById("element_4").value;
	console.log(numMembers);
	var newGroup = new Group(subject, name, 1, numMembers, professor, classCode);
};

function addRow(a,b,c,d,e,f){
         if (!document.getElementsByTagName) return;
         tabBody=document.getElementsByTagName("tbody").item(0);
         row=document.createElement("tr");
         cell1 = document.createElement("td");
         cell2 = document.createElement("td");
         cell3 = document.createElement("td");
         cell4 = document.createElement("td");
         cell5 = document.createElement("td");
         cell6 = document.createElement("td");
         textnode1=document.createTextNode(a);
         textnode2=document.createTextNode(b);
         textnode3=document.createTextNode(c);
         textnode4=document.createTextNode(d);
         textnode5=document.createTextNode(e);
         textnode6=document.createTextNode(f);
         cell1.appendChild(textnode1);
         cell2.appendChild(textnode2);
		 cell3.appendChild(textnode3);
		 cell4.appendChild(textnode4);
		 cell5.appendChild(textnode5);
		 cell6.appendChild(textnode6);
         row.appendChild(cell1);
         row.appendChild(cell2);
         row.appendChild(cell3);
         row.appendChild(cell4);
         row.appendChild(cell5);
         row.appendChild(cell6);
         tabBody.appendChild(row);
};
