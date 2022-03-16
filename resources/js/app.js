require('./bootstrap');
window.bootstrap = require('./bootstrap_v5-0-2/bootstrap.bundle.js');


languages = `<option value="af">Afrikaans</option> <option value="sq">Albanian - shqip</option> <option value="am">Amharic - አማርኛ</option> <option value="ar">Arabic - العربية</option> <option value="an">Aragonese - aragonés</option> <option value="hy">Armenian - հայերեն</option> <option value="ast">Asturian - asturianu</option> <option value="az">Azerbaijani - azərbaycan dili</option> <option value="eu">Basque - euskara</option> <option value="be">Belarusian - беларуская</option> <option value="bn">Bengali - বাংলা</option> <option value="bs">Bosnian - bosanski</option> <option value="br">Breton - brezhoneg</option> <option value="bg">Bulgarian - български</option> <option value="ca">Catalan - català</option> <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option> <option value="zh">Chinese - 中文</option> <option value="co">Corsican</option> <option value="hr">Croatian - hrvatski</option> <option value="cs">Czech - čeština</option> <option value="da">Danish - dansk</option> <option value="nl">Dutch - Nederlands</option> <option value="en">English</option> <option value="eo">Esperanto - esperanto</option> <option value="et">Estonian - eesti</option> <option value="fo">Faroese - føroyskt</option> <option value="fil">Filipino</option> <option value="fi">Finnish - suomi</option> <option value="fr">French - français</option> <option value="gl">Galician - galego</option> <option value="ka">Georgian - ქართული</option> <option value="de">German - Deutsch</option> <option value="el">Greek - Ελληνικά</option> <option value="gn">Guarani</option> <option value="gu">Gujarati - ગુજરાતી</option> <option value="ha">Hausa</option> <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option> <option value="he">Hebrew - עברית</option> <option value="hi">Hindi - हिन्दी</option> <option value="hu">Hungarian - magyar</option> <option value="is">Icelandic - íslenska</option> <option value="id">Indonesian - Indonesia</option> <option value="ia">Interlingua</option> <option value="ga">Irish - Gaeilge</option> <option value="it">Italian - italiano</option> <option value="ja">Japanese - 日本語</option> <option value="kn">Kannada - ಕನ್ನಡ</option> <option value="kk">Kazakh - қазақ тілі</option> <option value="km">Khmer - ខ្មែរ</option> <option value="ko">Korean - 한국어</option> <option value="ku">Kurdish - Kurdî</option> <option value="ky">Kyrgyz - кыргызча</option> <option value="lo">Lao - ລາວ</option> <option value="la">Latin</option> <option value="lv">Latvian - latviešu</option> <option value="ln">Lingala - lingála</option> <option value="lt">Lithuanian - lietuvių</option> <option value="mk">Macedonian - македонски</option> <option value="ms">Malay - Bahasa Melayu</option> <option value="ml">Malayalam - മലയാളം</option> <option value="mt">Maltese - Malti</option> <option value="mr">Marathi - मराठी</option> <option value="mn">Mongolian - монгол</option> <option value="ne">Nepali - नेपाली</option> <option value="no">Norwegian - norsk</option> <option value="nb">Norwegian Bokmål - norsk bokmål</option> <option value="nn">Norwegian Nynorsk - nynorsk</option> <option value="oc">Occitan</option> <option value="or">Oriya - ଓଡ଼ିଆ</option> <option value="om">Oromo - Oromoo</option> <option value="ps">Pashto - پښتو</option> <option value="fa">Persian - فارسی</option> <option value="pl">Polish - polski</option> <option value="pt">Portuguese - português</option> <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option> <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option> <option value="pa">Punjabi - ਪੰਜਾਬੀ</option> <option value="qu">Quechua</option> <option value="ro">Romanian - română</option> <option value="mo">Romanian (Moldova) - română (Moldova)</option> <option value="rm">Romansh - rumantsch</option> <option value="ru">Russian - русский</option> <option value="gd">Scottish Gaelic</option> <option value="sr">Serbian - српски</option> <option value="sh">Serbo-Croatian - Srpskohrvatski</option> <option value="sn">Shona - chiShona</option> <option value="sd">Sindhi</option> <option value="si">Sinhala - සිංහල</option> <option value="sk">Slovak - slovenčina</option> <option value="sl">Slovenian - slovenščina</option> <option value="so">Somali - Soomaali</option> <option value="st">Southern Sotho</option> <option value="es">Spanish - español</option> <option value="su">Sundanese</option> <option value="sw">Swahili - Kiswahili</option> <option value="sv">Swedish - svenska</option> <option value="tg">Tajik - тоҷикӣ</option> <option value="ta">Tamil - தமிழ்</option> <option value="tt">Tatar</option> <option value="te">Telugu - తెలుగు</option> <option value="th">Thai - ไทย</option> <option value="ti">Tigrinya - ትግርኛ</option> <option value="to">Tongan - lea fakatonga</option> <option value="tr">Turkish - Türkçe</option> <option value="tk">Turkmen</option> <option value="tw">Twi</option> <option value="uk">Ukrainian - українська</option> <option value="ur">Urdu - اردو</option> <option value="ug">Uyghur</option> <option value="uz">Uzbek - o‘zbek</option> <option value="vi">Vietnamese - Tiếng Việt</option> <option value="wa">Walloon - wa</option> <option value="cy">Welsh - Cymraeg</option> <option value="fy">Western Frisian</option> <option value="xh">Xhosa</option> <option value="yi">Yiddish</option> <option value="yo">Yoruba - Èdè Yorùbá</option> <option value="zu">Zulu - isiZulu</option>`;
const fa_spinning = '<i style="font-size: 1.2em" class="fas fa-circle-notch fa-spin"></i>';


// Fotter down arrow rotate
toggleFoooterIcon = (e) => {
    let child = e.querySelector('.fas');
    console.log(child)
    child.classList.toggle('active');
}
// --------------

// Question One

questionSelect = (val, link) => {
    location.href=link
}

first_working_experience = (link) => {
    location.href=link
}

// Helper Functions

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

// -------------


// Adding Work Experience and Appeding HTML
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
        if(typeof error.response !== 'undefined'){ // This is for error from laravel
            showValidation(error.response.data);
        }else{ // Other JS related error
            console.log(error);
        }
    });
    
};
// ---------------------


// Adding Education and Appeding HTML

add_education = () => {
    event.preventDefault();

    removeValidation();

    let form = document.getElementById('education_form');
    let formData = new FormData(form);

    axios.post(APP_URL + '/user/create/add-education', formData)
    .then(function (response) {
        console.log(response);
        location.href= '';

    })
    .catch(function (error) {
        if(typeof error.response !== 'undefined'){ // This is for error from laravel
            showValidation(error.response.data);
        }else{ // Other JS related error
            console.log(error);
        }
    });
    
};
// -----------------


// Inserting Language

add_language = () => {
    document.getElementById('error').innerHTML = '';
    let form = document.getElementById('language_form');
    let formData = new FormData(form);

    axios.post(APP_URL + '/user/create/language', formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if(typeof error.response !== 'undefined'){ // This is for error from laravel
            document.getElementById('error').innerHTML = 'Please fill all inputs!';
        }else{ // Other JS related error
            console.log(error);
        }
    });
}

// -----------------------


// Qusetion Ten - add Bio

add_bio = () => {
    removeValidation();

    let form = document.getElementById('bio_form');
    let formData = new FormData(form);
    
    axios.post(APP_URL + '/user/create/freelancer-bio', formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if(typeof error.response !== 'undefined'){ // This is for error from laravel
            showValidation(error.response.data);
        }else{ // Other JS related error
            console.log(error);
        }
    });
}

// -------------

// Category

add_category = () => {
    removeValidation();

    let form = document.getElementById('category_form');
    let formData = new FormData(form);
    
    axios.post(APP_URL + '/user/create/category', formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if(typeof error.response !== 'undefined'){ // This is for error from laravel
            showValidation(error.response.data);
        }else{ // Other JS related error
            console.log(error);
        }
    });
}

// -----------


// Hourly Rate

add_hourly_rate = () => {
    removeValidation();

    let form = document.getElementById('hourly_rate_form');
    let formData = new FormData(form);
    
    axios.post(APP_URL + '/user/create/hourly_rate', formData)
    .then(function (response) {
        location.href = response.data;
    })
    .catch(function (error) {
        if(typeof error.response !== 'undefined'){ // This is for error from laravel
            showValidation(error.response.data);
        }else{ // Other JS related error
            console.log(error);
        }
    });
}

// ----------

// Upload Image

upload_profile_image = (image) => {
    let image_input = document.getElementById("base64image")
    let formData = new FormData();
    formData.append('image', image_input.value);

    axios.post(APP_URL + '/user/create/uplaod_image', formData)
    .then(function (response) {
        // location.href = response.data;
    })
    .catch(function (error) {
        if(typeof error.response !== 'undefined'){ // This is for error from laravel
            showValidation(error.response.data);
        }else{ // Other JS related error
            console.log(error);
        }
    });
}

// -----------

resend_email_verification = (ele, email) => {
    let temp = ele.innerHTML;
    ele.innerHTML = fa_spinning;

    let formData = new FormData();
    formData.append('email', email);

    axios.post(APP_URL + '/user/resend_verification', formData)
    .then(function (response) {
        // location.href = response.data;
        ele.innerHTML = temp;
    })
    .catch(function (error) {
        if(typeof error.response !== 'undefined'){ // This is for error from laravel
            // showValidation(error.response.data);
        }else{ // Other JS related error
            console.log(error);
        }
    });
}
