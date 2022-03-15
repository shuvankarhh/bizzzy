@extends('layouts.app')

@section('navbar')
<x-navbar links="false"/>
@endsection

@section('content')
<section class="question">
    <div class="container py-3 mt-3 h-100">
        <div class="row">
            <div class=" col-md-1 col-lg-1 col-xl-1 col-sm-3 d-none d-sm-none d-md-block">
                <a>Prev</a>
            </div>
            <div class=" col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">    
                <p class="main-question" >Looking good. Next, tell us which languages you speak.</p>
                <p class="main-question-desc" >Bizzzy is global, so clients are often interested to know what languages you speak. English is a must, but do you speak any other languages?</p>
                <p class="text-danger" id="error"></p>
                <input type="hidden" id="number_of_div" value="1">
                <form action="#" id="language_form">
                    <div class="row mb-4">
                        <div class="col-md-5 language-input">
                            {{--  <input type="text" name="language[]" id="" value="English" readonly>  --}}
                            <select id="language" name="language[]" autocomplete="off">
                                <option value="en" selected>English</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select id="proficiency" name="proficiency[]" placeholder="Proficiency" autocomplete="off"></select>
                        </div>
                    </div>
                    
                    <div id="additinal_language">

                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div onclick="add_additional_language()" class="flex"><div role="button" class="add-language"><i class="fas fa-plus"></i></div><div role="button" class="desc ms-2"> Add Education</div role="button"></div></div>
                        </div>
                        {{-- <a class="skip" href="#">Skip for now ></a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="question-footer-height"></div>
    <div class="question-footer">
        <x-question-footer percentage=65/>
        <div class="row justify-content-end">
            <div class="col-md-3 text-end">
                <button onclick="add_language('{{ route('question.eleven') }}')" class="btn btn-bizzzy-success text-nowrap me-3"> Now Share Your Skills </button>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
    <script>
        // Javascript for TomSelect
        new TomSelect("#language", { create: false }).lock();
        let select = new TomSelect('#proficiency',{
            valueField: 'id',
            searchField: 'title',
            onChange: function(values) {
                return this.blur();
            },
            options: [
                {id: 1, title: 'Basic', desc: 'I write clearly in this language', },
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

        let language_divs = 2;
        add_additional_language = () => {
            language_divs++;
            let html = `<div class="row mb-4" id="addition_num_${language_divs}">
                            <div class="col-12"><hr></div>
                            <div class="col-md-5 language-input">
                                <select id="language_${language_divs}" name="language[]" placeholder="Language" autocomplete="off">
                                    <option value=""></option>
                                    ${languages}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select id="proficiency_${language_divs}" name="proficiency[]" placeholder="Proficiency" autocomplete="off"></select>
                            </div>
                            <div class="col-md-1 align-self-center">
                                <div onclick="remove_additional_language(${language_divs})" role="button" class="remove-language"><i class="fas fa-trash"></i></div>
                            </div>
                        </div>`;
            document.getElementById('additinal_language').innerHTML += html;
            new TomSelect(`#language_${language_divs}`, { create: false });
            let select = new TomSelect(`#proficiency_${language_divs}`,{
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
        }

        remove_additional_language = (number) => {
            var el = document.getElementById(`addition_num_${number}`);
            el.remove();
        }
        
        // -----------------------
    </script>
@endpush