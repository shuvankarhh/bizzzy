const { default: axios } = require("axios");
const { get } = require("lodash");

require("./bootstrap");
window.bootstrap = require("./bootstrap_v5-0-2/bootstrap.bundle.js");

languages = `<option value="af">Afrikaans</option> <option value="sq">Albanian - shqip</option> <option value="am">Amharic - አማርኛ</option> <option value="ar">Arabic - العربية</option> <option value="an">Aragonese - aragonés</option> <option value="hy">Armenian - հայերեն</option> <option value="ast">Asturian - asturianu</option> <option value="az">Azerbaijani - azərbaycan dili</option> <option value="eu">Basque - euskara</option> <option value="be">Belarusian - беларуская</option> <option value="bn">Bengali - বাংলা</option> <option value="bs">Bosnian - bosanski</option> <option value="br">Breton - brezhoneg</option> <option value="bg">Bulgarian - български</option> <option value="ca">Catalan - català</option> <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option> <option value="zh">Chinese - 中文</option> <option value="co">Corsican</option> <option value="hr">Croatian - hrvatski</option> <option value="cs">Czech - čeština</option> <option value="da">Danish - dansk</option> <option value="nl">Dutch - Nederlands</option> <option value="en">English</option> <option value="eo">Esperanto - esperanto</option> <option value="et">Estonian - eesti</option> <option value="fo">Faroese - føroyskt</option> <option value="fil">Filipino</option> <option value="fi">Finnish - suomi</option> <option value="fr">French - français</option> <option value="gl">Galician - galego</option> <option value="ka">Georgian - ქართული</option> <option value="de">German - Deutsch</option> <option value="el">Greek - Ελληνικά</option> <option value="gn">Guarani</option> <option value="gu">Gujarati - ગુજરાતી</option> <option value="ha">Hausa</option> <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option> <option value="he">Hebrew - עברית</option> <option value="hi">Hindi - हिन्दी</option> <option value="hu">Hungarian - magyar</option> <option value="is">Icelandic - íslenska</option> <option value="id">Indonesian - Indonesia</option> <option value="ia">Interlingua</option> <option value="ga">Irish - Gaeilge</option> <option value="it">Italian - italiano</option> <option value="ja">Japanese - 日本語</option> <option value="kn">Kannada - ಕನ್ನಡ</option> <option value="kk">Kazakh - қазақ тілі</option> <option value="km">Khmer - ខ្មែរ</option> <option value="ko">Korean - 한국어</option> <option value="ku">Kurdish - Kurdî</option> <option value="ky">Kyrgyz - кыргызча</option> <option value="lo">Lao - ລາວ</option> <option value="la">Latin</option> <option value="lv">Latvian - latviešu</option> <option value="ln">Lingala - lingála</option> <option value="lt">Lithuanian - lietuvių</option> <option value="mk">Macedonian - македонски</option> <option value="ms">Malay - Bahasa Melayu</option> <option value="ml">Malayalam - മലയാളം</option> <option value="mt">Maltese - Malti</option> <option value="mr">Marathi - मराठी</option> <option value="mn">Mongolian - монгол</option> <option value="ne">Nepali - नेपाली</option> <option value="no">Norwegian - norsk</option> <option value="nb">Norwegian Bokmål - norsk bokmål</option> <option value="nn">Norwegian Nynorsk - nynorsk</option> <option value="oc">Occitan</option> <option value="or">Oriya - ଓଡ଼ିଆ</option> <option value="om">Oromo - Oromoo</option> <option value="ps">Pashto - پښتو</option> <option value="fa">Persian - فارسی</option> <option value="pl">Polish - polski</option> <option value="pt">Portuguese - português</option> <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option> <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option> <option value="pa">Punjabi - ਪੰਜਾਬੀ</option> <option value="qu">Quechua</option> <option value="ro">Romanian - română</option> <option value="mo">Romanian (Moldova) - română (Moldova)</option> <option value="rm">Romansh - rumantsch</option> <option value="ru">Russian - русский</option> <option value="gd">Scottish Gaelic</option> <option value="sr">Serbian - српски</option> <option value="sh">Serbo-Croatian - Srpskohrvatski</option> <option value="sn">Shona - chiShona</option> <option value="sd">Sindhi</option> <option value="si">Sinhala - සිංහල</option> <option value="sk">Slovak - slovenčina</option> <option value="sl">Slovenian - slovenščina</option> <option value="so">Somali - Soomaali</option> <option value="st">Southern Sotho</option> <option value="es">Spanish - español</option> <option value="su">Sundanese</option> <option value="sw">Swahili - Kiswahili</option> <option value="sv">Swedish - svenska</option> <option value="tg">Tajik - тоҷикӣ</option> <option value="ta">Tamil - தமிழ்</option> <option value="tt">Tatar</option> <option value="te">Telugu - తెలుగు</option> <option value="th">Thai - ไทย</option> <option value="ti">Tigrinya - ትግርኛ</option> <option value="to">Tongan - lea fakatonga</option> <option value="tr">Turkish - Türkçe</option> <option value="tk">Turkmen</option> <option value="tw">Twi</option> <option value="uk">Ukrainian - українська</option> <option value="ur">Urdu - اردو</option> <option value="ug">Uyghur</option> <option value="uz">Uzbek - o‘zbek</option> <option value="vi">Vietnamese - Tiếng Việt</option> <option value="wa">Walloon - wa</option> <option value="cy">Welsh - Cymraeg</option> <option value="fy">Western Frisian</option> <option value="xh">Xhosa</option> <option value="yi">Yiddish</option> <option value="yo">Yoruba - Èdè Yorùbá</option> <option value="zu">Zulu - isiZulu</option>`;
const fa_spinning = '<i style="font-size: 1.2em" class="fas fa-circle-notch fa-spin"></i>';

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
    Array.from(document.querySelectorAll(".is-invalid")).forEach(function(el) {
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
        .then(function(response) {
            location.href = "";
            // modal_form_close("work_experience_form", "work_modal");
            // let company =
            //     response.data.company === null ? "" : response.data.company;
            // let html = `<div class="col-md-6 mb-2">
            //         <div class="added-exp">
            //             <p class="m-0 font-weight-bold">${response.data.title}</p>
            //             <p class="m-0">${company}</p>
            //         </div>
            //     </div>`;
            // document.getElementById("added_exp").innerHTML += html;
        })
        .catch(function(error) {
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
        .then(function(response) {
            location.href = "";
        })
        .catch(function(error) {
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

let education_edit = document.querySelectorAll('.education-edit');

let get_education = (e) => {
    axios
    .get(APP_URL + `/education/${e.currentTarget.dataset.education}/edit`)
    .then(function(response) {
        document.getElementById('edit_education_body').innerHTML = response.data;
        new TomSelect("#edit_year_start", { create: false }); 
        new TomSelect("#edit_year_end", { create: false });
    })
    .catch(function(error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
}

let edit_education_form = document.getElementById('edit_education_form');
if(edit_education_form){
    edit_education_form.addEventListener('submit', (e) => {
        e.preventDefault();

        let edit_education = document.getElementById('edit_education').value;
        let formData = new FormData(edit_education_form);
        formData.append('_method', 'patch');
    
        axios
        .post(APP_URL + `/education/${edit_education}`, formData)
        .then(function(response) {
            location.reload();
        })
        .catch(function(error) {
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

education_edit.forEach((element, idx) =>{
    element.addEventListener('click', get_education);
});

// Inserting Language

add_language = () => {
    document.getElementById("error").innerHTML = "";
    let form = document.getElementById("language_form");
    let formData = new FormData(form);

    axios
        .post(APP_URL + "/user/create/language", formData)
        .then(function(response) {
            location.href = response.data;
        })
        .catch(function(error) {
            if (typeof error.response !== "undefined") {
                // This is for error from laravel
                document.getElementById("error").innerHTML = "Please fill all inputs!";
            } else {
                // Other JS related error
                console.log(error);
            }
        });
};

remove_additional_selected_language = (number, id) => {
    axios
        .delete(APP_URL + "/user/create/language/" + id)
        .then(function(response) {
            var el = document.getElementById(`addition_num_${number}`);
            el.remove();
        })
        .catch(function(error) {
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
        .then(function(response) {
            location.href = response.data;
        })
        .catch(function(error) {
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
        .then(function(response) {
            location.href = response.data;
        })
        .catch(function(error) {
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
        .then(function(response) {
            location.href = response.data;
        })
        .catch(function(error) {
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

// =========== Job Feedback details ==========
get_feedback = (e) => {
        axios
            .get(APP_URL + `/f/job-feedback/${e.dataset.contract}`)
            .then(function(response) {
                document.getElementById('job_feedback_body').innerHTML = response.data;
                console.log(response);
                // location.href = response.data;
            })
            .catch(function(error) {
                if (typeof error.response !== "undefined") {
                    // This is for error from laravel
                    showValidation(error.response.data);
                } else {
                    // Other JS related error
                    console.log(error);
                }
            });
    }
    // ===========================================

// Upload Image

upload_profile_image = (image) => {
    let image_input = document.getElementById("base64image");
    let formData = new FormData();
    formData.append("image", image_input.value);

    axios
        .post(APP_URL + "/user/create/uplaod_image", formData)
        .then(function(response) {
            // location.href = response.data;
        })
        .catch(function(error) {
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
        .then(function(response) {
            location.href = response.data;
        })
        .catch(function(error) {
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
        .then(function(response) {
            // location.href = response.data;
            ele.innerHTML = temp;
        })
        .catch(function(error) {
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
        .then(function(response) {
            location.href = response.data;
        })
        .catch(function(error) {
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

// ====== Edit Freelancer title & description =====

let edit_title = document.querySelector('#edit_title_form');
if (edit_title) {
    edit_title.addEventListener('submit', (e) => {
        e.preventDefault();

        let formData = new FormData(edit_title);
        formData.append('_method', 'PATCH');
        axios
            .post(APP_URL + "/f/edit-title", formData)
            .then(function(response) {
                location.reload();
            })
            .catch(function(error) {
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

// ================================================

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
            .then(function(response) {
                console.log(response);
                location.href = response.data;
            })
            .catch(function(error) {
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
        .then(function(response) {
            console.log(response);
            e.reset();
            tags_select.clear();
            categories_select.clear();
            languages_select.clear();
            location.href = response.data;
        })
        .catch(function(error) {
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

// Save Job

saveJob = (e) => {
    axios
        .post(APP_URL + "/f/save-job/store", {
            job: e.target.dataset.job
        })
        .then(function(response) {
            console.log(response.data);
            location.reload();
        })
        .catch(function(error) {

        });
}

// Remove saved jobs

removeSavedJobs = (e) => {
    axios
        .post(APP_URL + `/f/save-job/${e.target.dataset.job}`, {
            _method: 'DELETE'
        })
        .then(function(response) {
            console.log(response.data);
            location.reload();
        })
        .catch(function(error) {

        });
}

// Add Direct Job

add_direct_job = (e) => {
    event.preventDefault();

    removeValidation();

    let formData = new FormData(e);

    axios
        .post(APP_URL + "/f/dj", formData)
        .then(function(response) {
            console.log(response);
            // e.reset();
            // tags_select.clear();
            // categories_select.clear();
            // languages_select.clear();
            // location.href = response.data;
        })
        .catch(function(error) {
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

        removeValidation();

        let formData = new FormData(e.target);

        axios
        .post(APP_URL + "/job-apply", formData)
        .then(function(response) {
            location.href = response.data;
        })
        .catch(function(error) {
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
if (accept_button) {
    let contract = document.getElementById('contract').value;
    accept_button.addEventListener('click', () => {
        axios
            .post(APP_URL + `/job-offers/${contract}`, {
                type: 'accept'
            })
            .then(function(response) {
                console.log(response.data);
                location.href = response.data;
            })
            .catch(function(error) {
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
if (decline_button) {
    let contract = document.getElementById('contract').value;
    decline_button.addEventListener('click', () => {
        axios
            .post(APP_URL + `/job-offers/${contract}`, {
                type: 'decline'
            })
            .then(function(response) {
                console.log(response.data);
                location.href = response.data;
            })
            .catch(function(error) {
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
if (button) {
    button.addEventListener('click', () => {
        axios
            .get(APP_URL + '/skill/create')
            .then(function(response) {
                //console.log(response.data.user_skills);
                let select = new TomSelect('#skills', {
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
            .catch(function(error) {

            });
    });
}

let profile_skill_form = document.getElementById("profile_skill_form");
if (profile_skill_form) {
    profile_skill_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(profile_skill_form);
        for (var value of formData.keys()) {
            console.log(value);
        }
        formData.append('_method', 'PATCH');
        axios
            .post(APP_URL + '/skill', formData)
            .then(function(response) {
                //console.log(response);
                location.reload();
                // e.reset();
                // tags_select.clear();
                // categories_select.clear();
                // languages_select.clear();
                // location.href = response.data;
            })
            .catch(function(error) {
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
        .then(function(response) {
            //console.log(response);
            document.getElementById('role').value = e.dataset.id;
            document.getElementById('permissions_body').innerHTML = response.data;
            // location.reload();
            // e.reset();
            // tags_select.clear();
            // categories_select.clear();
            // languages_select.clear();
            // location.href = response.data;
        })
        .catch(function(error) {

        });
}

let permission_role_form = document.getElementById('permission_role_form');
if (permission_role_form) {
    permission_role_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(permission_role_form);
        axios
            .post(APP_URL + '/admin/permission-role', formData)
            .then(function(response) {
                //console.log(response);
                location.reload();
                // e.reset();
                // tags_select.clear();
                // categories_select.clear();
                // languages_select.clear();
                // location.href = response.data;
            })
            .catch(function(error) {
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

// edit user
loadsingleuser = (id) => {
        axios
            .get(APP_URL + `/admin/user/${id}/edit`)
            .then(function(response) {
                //console.log(response);
                document.getElementById('name').value = response.data.name;
                document.getElementById('user_name').value = response.data.user_name;
                document.getElementById('acting_status').value = response.data.acting_status;
                document.getElementById('user_id').value = response.data.id;
                var path_img = response.data.photo;
                $('.photo').attr("src", `${APP_URL}/storage/${path_img}`);


            })
            .catch(function(error) {

            });
    }
    //update user
let user_update_form = document.getElementById('user_update_form');
if (user_update_form) {
    user_update_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(user_update_form);
        let id = document.getElementById('user_id');
        axios
            .post(APP_URL + `/admin/user/${id.value}`, formData)
            .then(function(response) {
                // console.log(response);
                location.reload();

            })
            .catch(function(error) {
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


// load staff
loadsinglestaff = (id) => {
    axios
        .get(APP_URL + `/admin/staff/${id}/edit`)
        .then(function(response) {
            //console.log(response);
            document.getElementById('name').value = response.data.name;
            document.getElementById('user_name').value = response.data.user_name;
            document.getElementById('acting_status').value = response.data.acting_status;
            document.getElementById('user_id').value = response.data.id;
            var path_img = response.data.photo;
            $('.photo').attr("src", `${APP_URL}/storage/${path_img}`);


        })
        .catch(function(error) {

        });
}

//update staff
let staff_update_form = document.getElementById('staff_update_form');
if (staff_update_form) {
    staff_update_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(staff_update_form);
        let id = document.getElementById('user_id');
        axios
            .post(APP_URL + `/admin/staff/${id.value}`, formData)
            .then(function(response) {
                // console.log(response);
                location.reload();

            })
            .catch(function(error) {
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
//add staff
let staff_add_form = document.getElementById('staff_add_form');
if (staff_add_form) {
    staff_add_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(staff_add_form);
        axios
            .post(APP_URL + '/admin/staff/store', formData)
            .then(function(response) {
                //console.log(response);
                staff_add_form.reset();
                location.reload();

            })
            .catch(function(error) {
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

// load roles
loadroles = () => {
    axios
        .get(APP_URL + '/admin/staff/role')
        .then(function(response) {
            //console.log(response.data);
            let c = document.getElementById('role');
            c.innerHTML = '';
            var option = document.createElement("option");
            option.text = 'Select Role';
            c.appendChild(option);
            response.data.forEach(element => {
                option = document.createElement("option");
                option.text = element['name'];
                option.value = element['id'];
                c.appendChild(option);
            });


        })
        .catch(function(error) {

        });
}


// load job
loadsinglejob = (id) => {
    axios
        .get(APP_URL + `/admin/job/${id}/edit`)
        .then(function(response) {
            console.log(response);
            document.getElementById('job_id').value = response.data.id;
            document.getElementById('name').value = response.data.name;
            document.getElementById('description').value = response.data.description;
            //job job_visibility
            if (response.data.job_visibility == 'Private') {
                document.getElementById('job_visibility').value = '1';
            } else if (response.data.job_visibility == 'Public') {
                document.getElementById('job_visibility').value = '2';
            } else if (response.data.job_visibility == 'This App Users Only') {
                document.getElementById('job_visibility').value = '3';
            }

            //project time
            if (response.data.project_time == 'Less than 1 Month') {
                document.getElementById('project_time').value = '1';
            } else if (response.data.project_time == '1 to 3 Months') {
                document.getElementById('project_time').value = '2';
            } else if (response.data.project_time == '3 to 6 Months') {
                document.getElementById('project_time').value = '3';
            } else if (response.data.project_time == 'More than 6 months') {
                document.getElementById('project_time').value = '4';
            }

            //job project_type
            if (response.data.project_type == 'One-time project') {
                document.getElementById('project_type').value = '1';
            } else if (response.data.project_type == 'Ongoing project') {
                document.getElementById('project_type').value = '2';
            }

            //job experience_level
            if (response.data.experience_level == 'Entry') {
                document.getElementById('experience_level').value = '1';
            } else if (response.data.experience_level == 'Intermediate') {
                document.getElementById('experience_level').value = '2';
            } else if (response.data.experience_level == 'Expert') {
                document.getElementById('experience_level').value = '3';
            }

            //job price_type 
            document.getElementById('price_type').value = response.data.price_type;
            document.getElementById('price').value = response.data.price;

        })
        .catch(function(error) {

        });
}

//update job
let job_update_form = document.getElementById('job_update_form');
if (job_update_form) {
    job_update_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(job_update_form);
        let id = document.getElementById('job_id');
        axios
            .post(APP_URL + `/admin/job/${id.value}`, formData)
            .then(function(response) {
                //console.log(response);
                location.reload();

            })
            .catch(function(error) {
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

/// load skill
loadsingleskill = (id) => {
    axios
        .get(APP_URL + `/admin/skill/${id}/edit`)
        .then(function(response) {
            //console.log(response);
            document.getElementById('name').value = response.data.name;
            document.getElementById('acting_status').value = response.data.acting_status;
            document.getElementById('skill_id').value = response.data.id;

        })
        .catch(function(error) {

        });
}

//update skill
let skill_update_form = document.getElementById('skill_update_form');
if (skill_update_form) {
    skill_update_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(skill_update_form);
        let id = document.getElementById('skill_id');
        axios
            .post(APP_URL + `/admin/skill/${id.value}`, formData)
            .then(function(response) {
                //console.log(response);
                location.reload();

            })
            .catch(function(error) {
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
        .then(function(response) {
            console.log(response);
            // location.reload();
            // e.reset();
            // tags_select.clear();
            // categories_select.clear();
            // languages_select.clear();
            location.href = response.data;
        })
        .catch(function(error) {
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
if (visibility) {
    visibility.addEventListener('change', () => {

        axios
            .post(APP_URL + '/visibility', {
                'visibility': document.getElementById('visibility').value
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                //
            });
    })
}

//Freelancer toggle preferance!
let preference = document.getElementById('preference');
if (preference) {
    preference.addEventListener('change', () => {

        axios
            .post(APP_URL + '/preference', {
                'preference': document.getElementById('preference').value
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
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
        .post(APP_URL + '/experience', {
            'experience': event.target.value
        })
        .then(function(response) {
            loaderList.add('loader-hidden');
            successList.remove('loader-hidden');
            setTimeout(() => {
                successList.add('loader-hidden');
            }, 200);
            console.log('ended');
        })
        .catch(function(error) {
            //
        });
}
document.querySelectorAll("input[name='experience_level']").forEach((input) => {
    input.addEventListener('change', change_level);
});

// Recruiter End Contract
let endContract = document.getElementById('recruiter_end_contract_form');
if (endContract) {
    endContract.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(endContract);
        axios
            .post(APP_URL + `/r/end-contract`, formData)
            .then(function(response) {
                location.href = response.data;
            })
            .catch(function(error) {
                document.getElementById('error').classList.remove('d-none');
            });
    });
}

// Recruiter remove contract

let remove_job_form = document.getElementById('remove_job_form');
if(remove_job_form){
    remove_job_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let job = remove_job_form.dataset.job;
        axios
        .post(APP_URL + `/recruiter-job/${job}`, {
            _method: 'delete'
        })
        .then(function(response) {
            // location.href = response.data;
            location.reload();
            console.log(response)
        })
        .catch(function(error) {
            document.getElementById('error').classList.remove('d-none');
        });
    });
}

// Freelancer End Contract
let freelancerEndContract = document.getElementById('freelancer_end_contract_form');
if (freelancerEndContract) {
    freelancerEndContract.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(freelancerEndContract);
        axios
            .post(APP_URL + `/f/end-contract`, formData)
            .then(function(response) {
                location.href = response.data;
            })
            .catch(function(error) {
                document.getElementById('error').classList.remove('d-none');
            });
    });
}


// load category
loadsinglecategory = (id) => {
    axios
        .get(APP_URL + `/admin/category/${id}/edit`)
        .then(function(response) {
            //console.log(response);
            document.getElementById('name').value = response.data.name;
            document.getElementById('category_id').value = response.data.id;


        })
        .catch(function(error) {

        });
}

//update main Category
let main_category_update_form = document.getElementById('main_category_update_form');
if (main_category_update_form) {
    main_category_update_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(main_category_update_form);
        let id = document.getElementById('category_id');
        axios
            .post(APP_URL + `/admin/category/${id.value}`, formData)
            .then(function(response) {
                //console.log(response);
                location.reload();

            })
            .catch(function(error) {
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

// load subcategory
loadsubcategory = (id) => {
    axios
        .get(APP_URL + `/admin/category/${id}/sub-catogory`)
        .then(function(response) {
            console.log(response);
            let tableRef = document.getElementById('subcategory_table');
            var options = { year: 'numeric', month: 'long', day: 'numeric' };

            tableRef.innerHTML = "";
            var header = tableRef.createTHead();
            var row = header.insertRow(0);
            // Insert a cell in the row at index 0
            let header1 = row.insertCell(0);
            let header2 = row.insertCell(1);
            let header3 = row.insertCell(2);
            header1.innerHTML = '<b>Name</b>';
            header2.innerHTML = '<b>Addded On</b>';
            header3.innerHTML = '<b>Actions</b>';
            response.data.forEach(function(element, index) {

                // Insert a row at the end of the table
                let newRow = tableRef.insertRow(-1);

                // Insert a cell in the row at index 0
                let newCell1 = newRow.insertCell(0);
                let newCell2 = newRow.insertCell(1);
                let newCell3 = newRow.insertCell(2);

                newCell1.innerHTML = element.name;
                var date = new Date(element.created_at);
                //console.log(date);
                newCell2.innerHTML = date.toLocaleDateString("en-US", options);
                newCell3.innerHTML = `

                <button data-dismiss="modal" data-toggle="modal"
                    data-target=".bs-example-modal-lg"
                    class="btn btn-info btn-xs" id="closemodal"
                    onclick="loadsinglecategory(${element.id})"><i
                        class="fa fa-pencil"></i> Edit
                </button>
                <button id="delete_button" class="btn btn-danger btn-xs"
                    onclick="categorydelete(${element.id})">
                    <i class="fa fa-trash-o"></i>
                    Delete
                </button>`;
            });
            // document.getElementById('name').value = response.data.name;
            // document.getElementById('category_id').value = response.data.id;

        })
        .catch(function(error) {

        });
}

// ===== Verification form ======
let profile_verification = document.getElementById('verification_form');
if (profile_verification) {
    profile_verification.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(profile_verification);
        axios
            .post(APP_URL + `/f/profile-verification`, formData)
            .then(function(response) {
                location.reload();
            })
            .catch(function(error) {
                document.getElementById('error').classList.remove('d-none');
            });
    });
}

// Recruiter Company Edit
let edit_company_button = document.getElementById('edit_company_button');
if(edit_company_button){
    edit_company_button.addEventListener('click', () => {
        let show_company = document.getElementById('show_company');
        let edit_company = document.getElementById('edit_company');
        show_company.classList.toggle('d-none');
        edit_company.classList.toggle('d-none');
    });
}

let edit_company_form = document.getElementById('edit_company_form');
if(edit_company_form){
    edit_company_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(edit_company_form);
        formData.append('_method', 'patch');
        axios
        .post(APP_URL + `/r/profile/edit`, formData)
        .then(function(response) {
            // console.log(response);
            location.reload();
        })
        .catch(function(error) {
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

// load job contract
loadprofile = (id) => {
    axios
        .get(APP_URL + `/admin/user/${id}/profile`)
        .then(function(response) {
            //console.log(response);
            document.getElementById('professional_title').value = response.data.professional_title;
            document.getElementById('description').value = response.data.description;
            document.getElementById('availability_badge').value = response.data.availability_badge;
            document.getElementById('average_rating').value = response.data.average_rating;
            document.getElementById('experience_level').value = response.data.experience_level;
            document.getElementById('hours_per_week').value = response.data.hours_per_week;
            document.getElementById('price_per_hour').value = response.data.price_per_hour;
            document.getElementById('profile_completion_percentage').value = response.data.profile_completion_percentage;
            document.getElementById('profile_visibility').value = response.data.profile_visibility;
            document.getElementById('project_time_preference').value = response.data.project_time_preference;
            document.getElementById('total_hours').value = response.data.total_hours;
            document.getElementById('total_jobs').value = response.data.total_jobs;
            document.getElementById('total_earnings').value = response.data.total_earnings;

        })
        .catch(function(error) {

        });
}

let password = document.querySelector('#new_password');
if(password){
    password.addEventListener('keyup', (e) => {
        let number_check = document.getElementById('number_check');
        let special_check = document.getElementById('special_check');
        if(/\d/.test(e.target.value)){
            number_check.classList.remove('not-met');
            number_check.classList.add('met');
        }else{
            number_check.classList.add('not-met');
            number_check.classList.remove('met');                
        }
        if(/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(e.target.value)){
            special_check.classList.remove('not-met');
            special_check.classList.add('met');
        }else{
            special_check.classList.add('not-met');
            special_check.classList.remove('met'); 
        }
    });
}

let new_password_confirmation = document.getElementById('new_password_confirmation');
if(new_password_confirmation){
    new_password_confirmation.addEventListener('keyup', (e) => {
        let confirm_message = document.getElementById('confirm_message');
        if(password.value === new_password_confirmation.value){
            confirm_message.classList.remove('not-met');
            confirm_message.classList.add('met');
        }else{
            confirm_message.classList.add('not-met');
            confirm_message.classList.remove('met');                
        }
    });
}

let change_password_form = document.getElementById('change_password_form');
if(change_password_form){
    change_password_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(change_password_form);
        formData.append('_method', 'patch');
        axios
        .post(APP_URL + `/change-password`, formData)
        .then(function(response) {
            // console.log(response);
            location.reload();
        })
        .catch(function(error) {
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
// =========== Job admin Feedback details ==========
get_admin_feedback = (e) => {
    axios
    .get(APP_URL + `/admin/job/job-feedback/${e}`)
    .then(function(response) {
        document.getElementById('feedback_body').innerHTML = response.data;
        console.log(response);
        // location.href = response.data;
    })
    .catch(function(error) {
        if (typeof error.response !== "undefined") {
            // This is for error from laravel
            showValidation(error.response.data);
        } else {
            // Other JS related error
            console.log(error);
        }
    });
}

let edit_contact = document.getElementById('edit_contact');
if(edit_contact){
    edit_contact.addEventListener('click', () => {
        let show_div = document.getElementById('show_div');
        let edit_div = document.getElementById('edit_div');
        show_div.classList.toggle('d-none');
        edit_div.classList.toggle('d-none');
        console.log('click');
    });
}

let update_contact_info = document.getElementById('update_contact_info');
if(update_contact_info){
    update_contact_info.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(update_contact_info);
        axios
        .post(APP_URL + `/user/edit`, formData)
        .then(function(response) {
            // console.log(response);
            location.reload();
        })
        .catch(function(error) {
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

let getExperienceEdit = (e) => {
    axios
    .get(APP_URL + `/experience/${e.currentTarget.dataset.experience}/edit`)
    .then(function(response) {
        document.getElementById('edit_work_body').innerHTML = response.data;
        new TomSelect("#edit_experience_month_start", { create: false });
        new TomSelect("#edit_experience_year_start_exp", { create: false });
        new TomSelect("#edit_experience_month_end", { create: false });
        new TomSelect("#edit_experience_year_end_exp", { create: false });
    })
}

edit_work_experience = (e, id) => {
    event.preventDefault();
    let formData = new FormData(e);
    formData.append('_method', 'patch');
    axios
    .post(APP_URL + `/experience/${id}`, formData)
    .then(function(response) {
        console.log(response);
        location.reload();
    })
    .catch(function(error) {
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

let experience_edit = document.querySelectorAll('.experience_edit');
if(experience_edit.length > 0){
    experience_edit.forEach((element) => {
        element.addEventListener('click', getExperienceEdit);
    });
}

let getPortfolioEdit = (e) => {
    axios
    .get(APP_URL + `/user_portfolio/${e.currentTarget.dataset.portfolio}/edit`)
    .then(function(response) {
        document.getElementById('portfolio_title').value = response.data.title;
        document.getElementById('portfolio_description').value = response.data.description;
        let creation_date = new Date(response.data.created_at);
        document.getElementById('completion_date').value = creation_date.toISOString().substring(0,10);;
        document.getElementById('project_url').value = response.data.project_url;
        document.getElementById('edit_portfolio').value = response.data.id;        
    })
}

let edit_portfolio_form = document.getElementById('edit_portfolio_form');
if(edit_portfolio_form){
    edit_portfolio_form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(edit_portfolio_form);
        formData.append('_method', 'patch');
        axios
        .post(APP_URL + `/user_portfolio/${document.getElementById('edit_portfolio').value}`, formData)
        .then(function(response) {
            location.reload();
        })
        .catch(function(error) {
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

let portfolio_edit = document.querySelectorAll('.portfolio_edit');
if(portfolio_edit.length > 0){
    portfolio_edit.forEach((element) => {
        element.addEventListener('click', getPortfolioEdit);
    });
}


// Stripe payment

let alert_div = document.getElementById('alert_div');

let initialize = () => {
    axios
    .post(APP_URL + `/stripe/card/create`)
    .then(function(response) {
        const clientSecret = response.data.clientSecret;
        elements = stripe.elements({clientSecret});
        // Create and mount the Payment Element
        const paymentElement = elements.create('payment');
        paymentElement.mount('#payment-element');
    })
    .catch(function(error) {
        
    });
}

let confirmCardHandler = (e) => {
    e.preventDefault();
    let credited_amount = document.getElementById('credited_amount').value;
    axios
    .post(APP_URL + `/stripe/card/update`, {
        'credited_amount': credited_amount
    })
    .then(function(response) {
        location.reload();
    })
    .catch(function(error) {
        
    });
}

let addPaymentToggle = (e) => {
    const not_added_text = document.getElementById('not_added_text');
    if(typeof elements === 'undefined'){
        initialize();
    }
    const card_add = document.getElementById('card_add');
    not_added_text.classList.toggle('d-none');
    card_add.classList.toggle('d-none');
    console.log(not_added_text);
}

let add_payment_btn = document.getElementById("add_payment_method_btn")
if(add_payment_btn){
    add_payment_btn.addEventListener("click", addPaymentToggle);
}



let payment_form = document.getElementById("payment-form")
if(payment_form){
    payment_form.addEventListener("submit", handleSubmit);
}

let confirm_credit_card = document.getElementById("confirm_credit_card")
if(confirm_credit_card){
    confirm_credit_card.addEventListener("submit", confirmCardHandler);
}



function showMessage(messageText) {

    alert_div.classList.remove('hidden');
    document.getElementById('alert').innerHTML = messageText;

}    

let fixed_price = document.getElementById('price');
let first_deposit = document.getElementById('deposit_amount.0');

let contractEstimateCalculator = (e) => {
    if(first_deposit.value == ''){
        document.getElementById('estimate_amount').innerHTML = fixed_price.value;
    }else{
        document.getElementById('estimate_amount').innerHTML = first_deposit.value;
    }
}

if(fixed_price){
    fixed_price.addEventListener('keyup', contractEstimateCalculator);
    first_deposit.addEventListener('keyup', contractEstimateCalculator);
}

let edit_pay_amount = () => {
    document.getElementById('pay_amount').classList.remove('d-none');
    document.getElementById('pay_amount_first_show').classList.add('d-none');    
};
let add_bonus = () => {
    document.getElementById('bonus_input').classList.toggle('d-none');    
}
let release_fund = document.getElementById('release_fund');
if(release_fund){
    release_fund.addEventListener('click', (e) => {
        axios
        .get(APP_URL + `/r/contract-milestone/create/${e.currentTarget.dataset.milestone}`)
        .then(function(response) {
            document.getElementById('pay_milestone_body').innerHTML = response.data;
            document.getElementById('toggle_pay_amount').addEventListener('click', edit_pay_amount);
            document.getElementById('bonus_pay').addEventListener('click', add_bonus);            
        })
    });
}
let release_payment_form = document.getElementById('release_payment_form');
if(release_payment_form){
    release_payment_form.addEventListener('submit', (e) => {
        e.preventDefault();
        removeValidation();
        let formData = new FormData(release_payment_form);
        axios
        .post(APP_URL + `/r/contract-milestone/${document.getElementById('edit_portfolio').value}`, formData)
        .then(function(response) {
            console.log(response);
            location.href = response.data;
            // location.reload();
        })
        .catch(function(error) {
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