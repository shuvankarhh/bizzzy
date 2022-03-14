require('./bootstrap');

new TomSelect("#language", { create: false });
let select = new TomSelect('#proficiency',{
	valueField: 'id',
	searchField: 'title',
    onChange: function(values) {
		return this.blur();
	},
	options: [
		{id: 1, title: 'Basic', desc: 'I write clearly in this language'},
		{id: 2, title: 'Conversational', desc: 'I write and speak clearly in this language'},
		{id: 3, title: 'Fluent', desc: 'I write and speak this language to a high level'},
		{id: 4, title: 'Native or Bilingual', desc: 'I write and speak this language perfectly'},
	],
	render: {
		option: function(data, escape) {
			return '<div>' +
					'<span class="title">' + escape(data.title) + '</span>' +
					'<span class="desc">' + escape(data.desc) + '</span>' +
				'</div>';
		},
		item: function(data, escape) {
			return '<div title="' + escape(data.desc) + '">' + escape(data.title) + '</div>';
		}
	}
}); 

toggleFoooterIcon = (e) => {
    let child = e.querySelector('.fas');
    console.log(child)
    child.classList.toggle('active');
}

// Question One

questionSelect = (val, link) => {
    // alert(val);
    location.href=link
}

first_working_experience = (link) => {
    location.href=link
}

let removeValidation = () => {
    Array.from(document.querySelectorAll('.is-invalid')).forEach(function(el) { 
        el.classList.remove('is-invalid');
    });
}

let showValidation = (obj) => {
    for(const property in obj.errors){
        let field = document.getElementById(property);
        field.classList.add('is-invalid');
        document.getElementById(`${property}_invalid`).innerHTML = obj.errors[property];
    }

}

let modal_form_close = (id, modal) => {
    document.getElementById(`${modal}_close_button`).click();
    document.getElementById(id).reset();
}

add_work_experience = () => {
    event.preventDefault();

    removeValidation();

    let form = document.getElementById('work_experience_form');
    let formData = new FormData(form);

    axios.post(APP_URL + '/user/create/add-work-experience', formData)
    .then(function (response) {
        modal_form_close('work_experience_form', 'work_modal');
        let company = (response.data.company === null) ? '' : response.data.company;
        let html = `<div class="col-md-6 mb-2">
                        <div class="added-exp">
                            <p class="m-0 font-weight-bold">${response.data.title}</p>
                            <p class="m-0">${company}</p>
                        </div>
                    </div>`;
        document.getElementById('added_exp').innerHTML += html;
        console.log(response);
    })
    .catch(function (error) {
        showValidation(error.response.data);
    });
    
};

add_education = () => {
    event.preventDefault();

    removeValidation();

    let form = document.getElementById('education_form');
    let formData = new FormData(form);

    axios.post(APP_URL + '/user/create/add-education', formData)
    .then(function (response) {
        console.log(response);
        modal_form_close('education_form', 'education_modal');
        let html = `<div class="col-md-6 mb-2">
                        <div class="added-exp">
                            <p class="m-0 font-weight-bold">${response.data.institute_name}</p>
                            <p class="m-0">${response.data.degree}</p>
                        </div>
                    </div>`;
        document.getElementById('added_exp').innerHTML += html;
    })
    .catch(function (error) {
        console.log(error);
        // showValidation(error.response.data);
    });
    
};
// }