@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <h2>End contract with "{{ $contract->recruiter->name }}"</h2>
    <p id="error" class="d-none text-danger">Please fill all inputs!</p>
    <form action="#" id="freelancer_end_contract_form">
        <input type="hidden" name="contract" id="contract" value="{{ $id }}">
        <div class="card">
            <div class="card-header">
                <p class="m-0 p-0" style="font-size: 1.2rem"><i class="fa-solid fa-lock"></i> Private Feedback</p>
            </div>
            <div class="card-body">
                <label for="end_reason">Reason for ending the contract!</label>
                <select name="end_reason" id="end_reason" class="form-control w-50">
                    <option value="">Why are you ending the contract</option>
                    <option value="1">Job Completed Successfully</option>
                </select>
                <p class="mt-4 mb-0" for="private_rating">How likely are you to recommend this client to a friend or a colleague?</p>
                <label>Not at all likely</label>
                <div class="form-check form-check-inline ms-4">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating1" value="1" />
                    <label class="form-check-label" for="rating1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating2" value="2" />
                    <label class="form-check-label" for="rating2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating3" value="3" />
                    <label class="form-check-label" for="rating3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating4" value="4" />
                    <label class="form-check-label" for="rating4">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating5" value="5" />
                    <label class="form-check-label" for="rating5">5</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating6" value="6" />
                    <label class="form-check-label" for="rating6">6</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating7" value="7" />
                    <label class="form-check-label" for="rating7">7</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating8" value="8" />
                    <label class="form-check-label" for="rating8">8</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating9" value="9" />
                    <label class="form-check-label" for="rating9">9</label>
                </div>
                <div class="form-check form-check-inline me-4">
                    <input class="form-check-input" type="radio" name="private_rating" id="rating10" value="10" />
                    <label class="form-check-label" for="rating10">10</label>
                </div>
                <label>Extreamly likely</label>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">
                <p class="m-0 p-0" style="font-size: 1.2rem"><i class="fa-solid fa-bullhorn"></i> Public Feedback</p>
            </div>
            <div class="card-body">
                <p class="m-0 p-0">Feedback to client</p>
                <div class="rating-wrapper">
                    <div class="rating">
                        <label>
                            <input class="feedback-input" type="radio" name="skill" value="1" />
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="skill" value="2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="skill" value="3" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="skill" value="4" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="skill" value="5" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                    </div>
                    <label>Skills</label>
                </div>
                <div class="rating-wrapper">
                    <div class="rating">
                        <label>
                            <input class="feedback-input" type="radio" name="quality_of_requirment" value="1" />
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="quality_of_requirment" value="2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="quality_of_requirment" value="3" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="quality_of_requirment" value="4" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="quality_of_requirment" value="5" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                    </div>
                    <label>Quality of Requirment</label>
                </div>
                <div class="rating-wrapper">
                    <div class="rating">
                        <label>
                            <input class="feedback-input" type="radio" name="availability" value="1" />
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="availability" value="2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="availability" value="3" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="availability" value="4" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="availability" value="5" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                    </div>
                    <label>Availability</label>
                </div>
                <div class="rating-wrapper">
                    <div class="rating">
                        <label>
                            <input class="feedback-input" type="radio" name="deadline_set" value="1" />
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="deadline_set" value="2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="deadline_set" value="3" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="deadline_set" value="4" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="deadline_set" value="5" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                    </div>
                    <label>Set reasonable deadline</label>
                </div>
                <div class="rating-wrapper">
                    <div class="rating">
                        <label>
                            <input class="feedback-input" type="radio" name="communication" value="1" />
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="communication" value="2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="communication" value="3" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="communication" value="4" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="communication" value="5" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                    </div>
                    <label>Communication</label>
                </div>
                <div class="rating-wrapper">
                    <div class="rating">
                        <label>
                            <input class="feedback-input" type="radio" name="cooperation" value="1" />
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="cooperation" value="2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="cooperation" value="3" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="cooperation" value="4" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input class="feedback-input" type="radio" name="cooperation" value="5" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                    </div>
                    <label>Cooperation</label>
                </div>
                
                <p>Total Score: <strong id="total_score">0.00</strong></p>
                <input type="hidden" name="public_feedback" id="public_feedback">
                <div class="form-outline">
                    <textarea class="form-control" name="experience" id="experience" rows="4" placeholder="Share your experience with this freelancer!"></textarea>
                    <label class="form-label" for="experience">Experience</label>
                </div>
            </div>
        </div>
        <div class="mt-4" style="display: flex; align-items: center; gap: 1rem">
            <button class="btn btn-primary" style="border-radius: 0">End Contract</button>
            <a href="#">Cancel</a>
        </div>
    </form>
    
</div>
@endsection

@push('script')
    <script>
        let feedback_calculator = (e) => {
            let skill =  document.querySelector('input[name="skill"]:checked');
            skill = (skill === null) ? 0 : (Number(skill.value) / 5);

            let quality_of_requirment =  document.querySelector('input[name="quality_of_requirment"]:checked');
            quality_of_requirment = (quality_of_requirment === null) ? 0 : (Number(quality_of_requirment.value) / 5);

            let availability =  document.querySelector('input[name="availability"]:checked');
            availability = (availability === null) ? 0 : ((Number(availability.value) * 0.75) / 5);

            let deadline_set =  document.querySelector('input[name="deadline_set"]:checked');
            deadline_set = (deadline_set === null) ? 0 : ((Number(deadline_set.value) * 0.75) / 5);

            let communication =  document.querySelector('input[name="communication"]:checked');
            communication = (communication === null) ? 0 : ((Number(communication.value) * 0.75) / 5);

            let cooperation =  document.querySelector('input[name="cooperation"]:checked');
            cooperation = (cooperation === null) ? 0 : ((Number(cooperation.value) * 0.75) / 5);

            let total = skill + quality_of_requirment + availability + deadline_set + communication + cooperation

            document.getElementById('public_feedback').value = total.toPrecision(3);
            document.getElementById('total_score').innerHTML = total.toPrecision(3);
        }

        (function(){
            let feedback_inputs = document.querySelectorAll('.feedback-input');
            feedback_inputs.forEach((e) => {
                e.addEventListener('click', feedback_calculator)
            });
        })();
    </script>
@endpush