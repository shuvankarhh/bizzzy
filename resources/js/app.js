const { default: axios } = require("axios");
const { get } = require("lodash");

require("./bootstrap");
window.bootstrap = require("./bootstrap_v5-0-2/bootstrap.bundle.js");

languages = `<option value="af">Afrikaans</option> <option value="sq">Albanian - shqip</option> <option value="am">Amharic - አማርኛ</option> <option value="ar">Arabic - العربية</option> <option value="an">Aragonese - aragonés</option> <option value="hy">Armenian - հայերեն</option> <option value="ast">Asturian - asturianu</option> <option value="az">Azerbaijani - azərbaycan dili</option> <option value="eu">Basque - euskara</option> <option value="be">Belarusian - беларуская</option> <option value="bn">Bengali - বাংলা</option> <option value="bs">Bosnian - bosanski</option> <option value="br">Breton - brezhoneg</option> <option value="bg">Bulgarian - български</option> <option value="ca">Catalan - català</option> <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option> <option value="zh">Chinese - 中文</option> <option value="co">Corsican</option> <option value="hr">Croatian - hrvatski</option> <option value="cs">Czech - čeština</option> <option value="da">Danish - dansk</option> <option value="nl">Dutch - Nederlands</option> <option value="en">English</option> <option value="eo">Esperanto - esperanto</option> <option value="et">Estonian - eesti</option> <option value="fo">Faroese - føroyskt</option> <option value="fil">Filipino</option> <option value="fi">Finnish - suomi</option> <option value="fr">French - français</option> <option value="gl">Galician - galego</option> <option value="ka">Georgian - ქართული</option> <option value="de">German - Deutsch</option> <option value="el">Greek - Ελληνικά</option> <option value="gn">Guarani</option> <option value="gu">Gujarati - ગુજરાતી</option> <option value="ha">Hausa</option> <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option> <option value="he">Hebrew - עברית</option> <option value="hi">Hindi - हिन्दी</option> <option value="hu">Hungarian - magyar</option> <option value="is">Icelandic - íslenska</option> <option value="id">Indonesian - Indonesia</option> <option value="ia">Interlingua</option> <option value="ga">Irish - Gaeilge</option> <option value="it">Italian - italiano</option> <option value="ja">Japanese - 日本語</option> <option value="kn">Kannada - ಕನ್ನಡ</option> <option value="kk">Kazakh - қазақ тілі</option> <option value="km">Khmer - ខ្មែរ</option> <option value="ko">Korean - 한국어</option> <option value="ku">Kurdish - Kurdî</option> <option value="ky">Kyrgyz - кыргызча</option> <option value="lo">Lao - ລາວ</option> <option value="la">Latin</option> <option value="lv">Latvian - latviešu</option> <option value="ln">Lingala - lingála</option> <option value="lt">Lithuanian - lietuvių</option> <option value="mk">Macedonian - македонски</option> <option value="ms">Malay - Bahasa Melayu</option> <option value="ml">Malayalam - മലയാളം</option> <option value="mt">Maltese - Malti</option> <option value="mr">Marathi - मराठी</option> <option value="mn">Mongolian - монгол</option> <option value="ne">Nepali - नेपाली</option> <option value="no">Norwegian - norsk</option> <option value="nb">Norwegian Bokmål - norsk bokmål</option> <option value="nn">Norwegian Nynorsk - nynorsk</option> <option value="oc">Occitan</option> <option value="or">Oriya - ଓଡ଼ିଆ</option> <option value="om">Oromo - Oromoo</option> <option value="ps">Pashto - پښتو</option> <option value="fa">Persian - فارسی</option> <option value="pl">Polish - polski</option> <option value="pt">Portuguese - português</option> <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option> <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option> <option value="pa">Punjabi - ਪੰਜਾਬੀ</option> <option value="qu">Quechua</option> <option value="ro">Romanian - română</option> <option value="mo">Romanian (Moldova) - română (Moldova)</option> <option value="rm">Romansh - rumantsch</option> <option value="ru">Russian - русский</option> <option value="gd">Scottish Gaelic</option> <option value="sr">Serbian - српски</option> <option value="sh">Serbo-Croatian - Srpskohrvatski</option> <option value="sn">Shona - chiShona</option> <option value="sd">Sindhi</option> <option value="si">Sinhala - සිංහල</option> <option value="sk">Slovak - slovenčina</option> <option value="sl">Slovenian - slovenščina</option> <option value="so">Somali - Soomaali</option> <option value="st">Southern Sotho</option> <option value="es">Spanish - español</option> <option value="su">Sundanese</option> <option value="sw">Swahili - Kiswahili</option> <option value="sv">Swedish - svenska</option> <option value="tg">Tajik - тоҷикӣ</option> <option value="ta">Tamil - தமிழ்</option> <option value="tt">Tatar</option> <option value="te">Telugu - తెలుగు</option> <option value="th">Thai - ไทย</option> <option value="ti">Tigrinya - ትግርኛ</option> <option value="to">Tongan - lea fakatonga</option> <option value="tr">Turkish - Türkçe</option> <option value="tk">Turkmen</option> <option value="tw">Twi</option> <option value="uk">Ukrainian - українська</option> <option value="ur">Urdu - اردو</option> <option value="ug">Uyghur</option> <option value="uz">Uzbek - o‘zbek</option> <option value="vi">Vietnamese - Tiếng Việt</option> <option value="wa">Walloon - wa</option> <option value="cy">Welsh - Cymraeg</option> <option value="fy">Western Frisian</option> <option value="xh">Xhosa</option> <option value="yi">Yiddish</option> <option value="yo">Yoruba - Èdè Yorùbá</option> <option value="zu">Zulu - isiZulu</option>`;
const fa_spinning =
    '<i style="font-size: 1.2em" class="fas fa-circle-notch fa-spin"></i>';

// Fotter down arrow rotate
toggleFoooterIcon = (e) => {
    let child = e.querySelector(".fas");
    console.log(child);
    child.classList.toggle("active");
};
// --------------

// Question One

questionSelect = (val, link) => {
    location.href = link;
};

first_working_experience = (link) => {
    location.href = link;
};

// Helper Functions

removeValidation = () => {
    Array.from(document.querySelectorAll(".is-invalid")).forEach(function (el) {
        el.classList.remove("is-invalid");
    });
};

showValidation = (obj) => {
    for (const property in obj.errors) {
        let field = document.getElementById(property);
        if (field.tagName === "SELECT") {
            field.classList.add("is-invalid");
            let ts_element = document.querySelector(".ts-wrapper");
            ts_element.classList.add("is-invalid");
        } else {
            field.classList.add("is-invalid");
        }
        document.getElementById(`${property}_invalid`).innerHTML =
            obj.errors[property];
    }
};

let modal_form_close = (id, modal) => {
    document.getElementById(`${modal}_close_button`).click();
    document.getElementById(id).reset();
};

// -------------

// Adding Work Experience and Appeding HTML
add_work_experience = () => {
    event.preventDefault();

    removeValidation();

    let form = document.getElementById("work_experience_form");
    let formData = new FormData(form);

    axios
    .post(APP_URL + "/user/create/add-work-experience", formData)
    .then(function (response) {
        modal_form_close("work_experience_form", "work_modal");
        let company =
            response.data.company === null ? "" : response.data.company;
        let html = `<div class="col-md-6 mb-2">
                    <div class="added-exp">
                        <p class="m-0 font-weight-bold">${response.data.title}</p>
                        <p class="m-0">${company}</p>
                    </div>
                </div>`;
        document.getElementById("added_exp").innerHTML += html;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};
// ---------------------

// Adding Education and Appeding HTML

add_education = () => {
    event.preventDefault();

    removeValidation();

    let form = document.getElementById("education_form");
    let formData = new FormData(form);

    axios
    .post(APP_URL + "/user/create/add-education", formData)
    .then(function (response) {
        location.href = "";
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};
// -----------------

// Inserting Language

add_language = () => {
    document.getElementById("error").innerHTML = "";
    let form = document.getElementById("language_form");
    let formData = new FormData(form);

    axios
    .post(APP_URL + "/user/create/language", formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            document.getElementById("error").innerHTML =
                "Please fill all inputs!";
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

remove_additional_selected_language = (number, id) => {
    axios
    .delete(APP_URL + "/user/create/language/" + id)
    .then(function (response) {
        var el = document.getElementById(`addition_num_${number}`);
        el.remove();
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            document.getElementById("error").innerHTML =
                error.response.data.error;
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

// -----------------------

// Qusetion Ten - add Bio

add_bio = () => {
    removeValidation();

    let form = document.getElementById("bio_form");
    let formData = new FormData(form);

    axios
    .post(APP_URL + "/user/create/freelancer-bio", formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

// -------------

// Category

add_category = () => {
    removeValidation();

    let form = document.getElementById("category_form");
    let formData = new FormData(form);

    axios
    .post(APP_URL + "/user/create/category", formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

// -----------

// Hourly Rate

add_hourly_rate = () => {
    removeValidation();

    let form = document.getElementById("hourly_rate_form");
    let formData = new FormData(form);

    axios
    .post(APP_URL + "/user/create/hourly_rate", formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

// ----------

// Upload Image

upload_profile_image = (image) => {
    let image_input = document.getElementById("base64image");
    let formData = new FormData();
    formData.append("image", image_input.value);

    axios
    .post(APP_URL + "/user/create/uplaod_image", formData)
    .then(function (response) {
        // location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

add_profile_information = () => {
    removeValidation();

    let form = document.getElementById("profile_information_form");
    let formData = new FormData(form);

    axios
    .post(APP_URL + "/user/create/question-thirteen", formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

// -----------

resend_email_verification = (ele, email) => {
    let temp = ele.innerHTML;
    ele.innerHTML = fa_spinning;

    let formData = new FormData();
    formData.append("email", email);

    axios
    .post(APP_URL + "/user/resend_verification", formData)
    .then(function (response) {
        // location.href = response.data;
        ele.innerHTML = temp;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            // showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
        ele.innerHTML = temp;
    });
};

// Add Freelancer title

add_title = () => {
    removeValidation();

    let form = document.getElementById("title_form");
    let formData = new FormData(form);

    axios
    .post(APP_URL + "/user/create/question-five", formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

// --------------

// Show Full Text

show_full_text = (e, idx = "") => {
    document.getElementById(`show_text${idx}`).innerHTML = document.getElementById(`full_text${idx}`).innerHTML;
    e.style.display = "none";
};

// --------------

// Add Portfolio

let form = document.getElementById("add_protfolio_form");
if (form) {
    form.addEventListener("submit", () => {
        event.preventDefault();

        let formData = new FormData(form);

        axios
        .post(`${APP_URL}/user_portfolio`, formData)
        .then(function (response) {
            console.log(response);
            location.href = response.data;
        })
        .catch(function (error) {
            console.log(error);
            if (typeof error.response !== "undefined") {
                // This is for error from laravel
                showValidation(error.response.data);
            } else {
                // Other JS related error
                console.log(error);
            }
        });
    });
}

// --------------

// Add Job

add_job = (e) => {
    event.preventDefault();

    removeValidation();

    let formData = new FormData(e);

    axios
    .post(APP_URL + "/job", formData)
    .then(function (response) {
        console.log(response);
        e.reset();
        tags_select.clear();
        categories_select.clear();
        languages_select.clear();
        location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            //  This is for error from laravel
            console.log(error.response.data);
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

// --------------

// Add Direct Job

add_direct_job = (e) => {
    event.preventDefault();

    removeValidation();

    let formData = new FormData(e);

    axios
    .post(APP_URL + "/f/dj", formData)
    .then(function (response) {
        console.log(response);
        // e.reset();
        // tags_select.clear();
        // categories_select.clear();
        // languages_select.clear();
        // location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            //  This is for error from laravel
            console.log(error.response.data);
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
};

// --------------

// Job Proposal
let job_proposal = document.getElementById("job_proposal_form");
if (job_proposal) {
    job_proposal.addEventListener("submit", (e) => {
        e.preventDefault();
        console.log(e.target);
        // return;

        removeValidation();

        let formData = new FormData(e.target);

        axios
        .post(APP_URL + "/job-apply", formData)
        .then(function (response) {
            console.log(response);
            // e.reset();
            // tags_select.clear();
            // categories_select.clear();
            // languages_select.clear();
            location.href = response.data;
        })
        .catch(function (error) {
            if (typeof error.response !== "undefined") {
                //  This is for error from laravel
                console.log(error.response.data);
                showValidation(error.response.data);
            } else {
                // Other JS related error
                console.log(error);
            }
        });
    });
}

// --------------


// Accepting Job Offers --------
let accept_button = document.getElementById("offer_accept_button");
if(accept_button){
    let contract = document.getElementById('contract').value;
    accept_button.addEventListener('click', () => {
        axios
        .post(APP_URL + `/job-offers/${contract}`, {
            type: 'accept'
        })
        .then(function (response) {
            console.log(response.data);
            location.href = response.data;
        })
        .catch(function (error) {
            accept_button.style.backgroundColor = '#dc3545';
            setTimeout(() => {
                accept_button.style.backgroundColor = '#1266f1';
            }, 1000);
        });
    });
}
// -----------------------------

// Declining Job Offers --------
let decline_button = document.getElementById("offer_decline_button");
if(decline_button){
    let contract = document.getElementById('contract').value;
    decline_button.addEventListener('click', () => {
        axios
        .post(APP_URL + `/job-offers/${contract}`, {
            type: 'decline'
        })
        .then(function (response) {
            console.log(response.data);
            location.href = response.data;
        })
        .catch(function (error) {
            decline_button.style.backgroundColor = '#dc3545';
            setTimeout(() => {
                accept_button.style.backgroundColor = '#1266f1';
            }, 1000);
        });
    });
}
// -----------------------------

// Add/Update Skill from profile----

let button = document.getElementById("profile_skill_modal");
if(button){
    button.addEventListener('click', () => {
        axios
        .get(APP_URL + '/skill/create')
        .then(function (response) {
            console.log(response.data.user_skills);
            let select = new TomSelect('#skills',{
                plugins: ['remove_button'],
                valueField: 'id',
                searchField: 'title',
                options: response.data.skills,
                render: {
                    option: function(data, escape) {
                        return '<div>' +
                                '<span>' + escape(data.title) + '</span>' +
                            '</div>';
                    },
                    item: function(data, escape) {
                        return '<div title="' + escape(data.desc) + '">' + escape(data.title) + '</div>';
                    }
                }
            }); 
            select.setValue(JSON.parse(response.data.user_skills));
        })
        .catch(function (error) {

        });
    });
}

let profile_skill_form = document.getElementById("profile_skill_form");
if(profile_skill_form){
    profile_skill_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(profile_skill_form);
        for (var value of formData.keys()) {
            console.log(value);
        }
        formData.append('_method', 'PATCH');
        axios
        .post(APP_URL + '/skill', formData)
        .then(function (response) {
            console.log(response);
            location.reload();
            // e.reset();
            // tags_select.clear();
            // categories_select.clear();
            // languages_select.clear();
            // location.href = response.data;
        })
        .catch(function (error) {
            if (typeof error.response !== "undefined") {
                //  This is for error from laravel
                console.log(error.response.data);
                showValidation(error.response.data);
            } else {
                // Other JS related error
                console.log(error);
            }
        });
    });
}

// ---------------------------------

// Get Permissions of role

// let permission_role = document.getElementById('permission_role');
// if(permission_role){
//     permission_role.addEventListener('click', (e) => {
//         console.log(e.target.dataset.id);
//         axios
//         .get(APP_URL + `/admin/permission-role/${e.target.dataset.id}/${e.target.dataset.guard}`)
//         .then(function (response) {
//             console.log(response);
//             document.getElementById('permissions_body').innerHTML = response.data;
//             // location.reload();
//             // e.reset();
//             // tags_select.clear();
//             // categories_select.clear();
//             // languages_select.clear();
//             // location.href = response.data;
//         })
//         .catch(function (error) {

//         });
//     })
// }

get_permission = (e) => {
    axios
    .get(APP_URL + `/admin/permission-role/${e.dataset.id}/${e.dataset.guard}`)
    .then(function (response) {
        console.log(response);
        document.getElementById('role').value = e.dataset.id;
        document.getElementById('permissions_body').innerHTML = response.data;
        // location.reload();
        // e.reset();
        // tags_select.clear();
        // categories_select.clear();
        // languages_select.clear();
        // location.href = response.data;
    })
    .catch(function (error) {

    });
}

let permission_role_form = document.getElementById('permission_role_form');
if(permission_role_form){
    permission_role_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(permission_role_form);
        axios
        .post(APP_URL + '/admin/permission-role', formData)
        .then(function (response) {
            console.log(response);
            location.reload();
            // e.reset();
            // tags_select.clear();
            // categories_select.clear();
            // languages_select.clear();
            // location.href = response.data;
        })
        .catch(function (error) {
            if (typeof error.response !== "undefined") {
                //  This is for error from laravel
                console.log(error.response.data);
                showValidation(error.response.data);
            } else {
                // Other JS related error
                console.log(error);
            }
        });
    });
}

// Change account type

change_type = (type) => {
    axios
    .post(APP_URL + `/change-account/${type}`)
    .then(function (response) {
        console.log(response);
        // location.reload();
        // e.reset();
        // tags_select.clear();
        // categories_select.clear();
        // languages_select.clear();
        location.href = response.data;
    })
    .catch(function (error) {
        if (typeof error.response !== "undefined") {
            //  This is for error from laravel
            console.log(error.response.data);
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
}

//Freelancer toggle visibility!
let visibility = document.getElementById('visibility');
if(visibility){
    visibility.addEventListener('change', () => {

        axios
        .post(APP_URL + '/visibility',{
            'visibility': document.getElementById('visibility').value
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            //
        });
    })
}

//Freelancer toggle preferance!
let preference = document.getElementById('preference');
if(preference){
    preference.addEventListener('change', () => {

        axios
        .post(APP_URL + '/preference',{
            'preference': document.getElementById('preference').value
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            //
        });
    })
}

//Freelancer change experience level
function change_level(event) {
    let loaderList = document.getElementById('loader').classList;
    let successList = document.getElementById('success').classList;
    loaderList.remove('loader-hidden');
    axios
    .post(APP_URL + '/experience',{
        'experience': event.target.value
    })
    .then(function (response) {
        loaderList.add('loader-hidden');
        successList.remove('loader-hidden');
        setTimeout(()=>{
            successList.add('loader-hidden');
        }, 200);
        console.log('ended');
    })
    .catch(function (error) {
        //
    });
}
document.querySelectorAll("input[name='experience_level']").forEach((input) => {
    input.addEventListener('change', change_level);
});