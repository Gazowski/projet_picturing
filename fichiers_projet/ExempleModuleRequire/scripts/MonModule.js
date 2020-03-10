define(['MonModule'], function () {
  // Le code de mon module ici

	var obj = {};
	var uneVariablePrivee = 12;
	obj.attributPublic = 20;
	obj.methodePublique = function() {
				methodePrivee();
				return "uneVariablePrivee : "+uneVariablePrivee+
					"\n"+ "obj.attributPublic : "+obj.attributPublic; 
									 };

	function methodePrivee(){
		console.log("je suis une méthode privée......");
	}
	return obj;
});