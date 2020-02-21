import { class_mapping } from './class_mapping'

document.addEventListener("DOMContentLoaded", function() {

	// pour chaque data-component dans le DOM, instancie la classe JS nommée comme valeur de l'attribut
    let components = document.querySelectorAll('[data-component]');

	for (let i = 0, l = components.length; i < l; i++) {
		
		let componentDataSet = components[i].dataset.component;
		let componentElement = components[i];


		for (let key of Object.keys(class_mapping)) {
			
			//console.log(`${key}`);
			let classInMap = `${key}`;
			//console.log(classInMap);

			if (componentDataSet == classInMap) new class_mapping[componentDataSet](componentElement);
		}
	}
});

