@extends('frontend.frontbody.body')
@section('interface')

<div class="wrapper bg-white">
    <form action="#">
        <div class="form-group border-bottom d-flex align-items-center justify-content-between flex-wrap">
            <label class="option my-sm-0 my-2">
                <input type="radio" name="radio" checked>Turkey
                <span class="checkmark"></span>
            </label>
            <label class="option my-sm-0 my-2">
                <input type="radio" name="radio">USA
                <span class="checkmark"></span>
            </label>
            <div class="d-flex align-items-center my-sm-0 my-2">
                <a href="#" class="text-decoration-none">
                    Multi-city/Stopovers <span class="fas fa-angle-right ps-2 text-primary"></span>
                </a>
            </div>
        </div>
        <div class="form-group d-sm-flex margin">
            <div class="d-flex align-items-center flex-fill me-sm-1 my-sm-0 my-4 border-bottom position-relative">
                <input type="text" required placeholder="From" class="form-control">
                <div class="label" id="from"></div>
                <span class="fas fa-dot-circle text-muted"></span>
            </div>
            <div class="d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 border-bottom position-relative">
                <input type="text" required placeholder="To" class="form-control">
                <div class="label" id="to"></div>
                <span class="fas fa-map-marker text-muted"></span>
            </div>
        </div>


        <div class="form-group d-sm-flex margin">
            <div class="d-flex align-items-center flex-fill me-sm-1 my-sm-0 my-4 border-bottom position-relative">
                <input type="file" required placeholder="From" class="form-control">
                <div class="label" id="from"></div>
                <span class="fas fa-dot-circle text-muted"></span>
            </div>
            <div class="d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 border-bottom position-relative">
                <input type="text" required placeholder="To" class="form-control">
                <div class="label" id="to"></div>
                <span class="fas fa-map-marker text-muted"></span>
            </div>
        </div>


        <div class="form-group d-sm-flex margin">
            <div class="d-flex align-items-center flex-fill me-sm1 my-sm-0 border-bottom position-relative">
                <input type="date" required placeholder="Depart Date" class="form-control">
                <div class="label" id="depart"></div>
            </div>
            <div class="d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 border-bottom position-relative">
                <input type="date" required placeholder="Return Date" class="form-control">
                <div class="label" id="return"></div>
            </div>
        </div>
        <div class="form-group border-bottom d-flex align-items-center position-relative">
            <input type="text" required placeholder="Traveller(s)" class="form-control">
            <div class="label" id="psngr"></div>
            <span class="fas fa-users text-muted"></span>
        </div>
        <div class="form-group my-3">
            <div class="btn melon rounded-0 d-flex justify-content-center text-center p-3">Search Flights
            </div>
        </div>
    </form>

</div>

<style>


/* Resetting */


body {
    background: #eecda3;
  background: -webkit-linear-gradient(to right, #eecda3, #dab83d);
  background: linear-gradient(to right, #eecda3, #dab83d);
}
.melon{
    background-color: black!important;
    color: #dab83d!important;
}
.wrapper {
    max-width: 800px;
    margin: 50px auto;
}

.wrapper form {
    padding: 30px 50px;
}

.wrapper form .form-group {
    padding-bottom: .5rem;
}

.wrapper form .option {
    position: relative;
    padding-left: 25px;
    cursor: pointer;
    display: block;
}

.wrapper form .option input {
    display: none;
}

.wrapper form .checkmark {
    position: absolute;
    top: 4px;
    left: 0;
    height: 17px;
    width: 17px;
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 50%;
}

.wrapper form .option input:checked~.checkmark:after {
    display: block;
}

.wrapper form .option .checkmark:after {
    content: "";
    width: 7px;
    height: 7px;
    display: block;
    border-radius: 50%;
    background-color: #333;
    position: absolute;
    top: 48%;
    left: 52%;
    transform: translate(-50%, -50%) scale(0);
    transition: 200ms ease-in-out 0s;
}

.wrapper form .option:hover input[type="radio"]~.checkmark {
    background-color: #f4f4f4;
}

.wrapper form .option input[type="radio"]:checked~.checkmark {
    background: #fff;
    color: #fff;
    transition: 300ms ease-in-out 0s;
}

.wrapper form .option input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1);
    color: #fff;
}

.wrapper form a {
    color: #333;
}

.wrapper form .form-control {
    outline: none;
    border: none;
}

.wrapper form .form-control:focus {
    box-shadow: none;
}

.wrapper form input[type="text"]:focus::placeholder {
    color: transparent
}

input[type="date"] {
    cursor: pointer;
}

.wrapper form .label::after {
    position: absolute;
    /* background-color: #fff; */
    top: 5px;
    left: 0px;
    font-size: 0.9rem;
    margin: 0rem 0.4rem;
    text-transform: uppercase;
    letter-spacing: 0.08rem;
    font-weight: 600;
    color: #999;
    transition: all .2s ease-in-out;
    transform: scale(0);
}

.wrapper form .label#from::after {
    content: 'From';
}

.wrapper form .label#to::after {
    content: 'To';
}

.wrapper form .label#depart::after {
    content: 'Depart Date';
}

.wrapper form .label#return::after {
    content: 'Return Date';
}

.wrapper form .label#psngr::after {
    content: 'Traveller(s)';
}

.wrapper form input[type="text"]:focus~.label::after {
    top: -15px;
    left: 0px;
    transform: scale(1);
}

.wrapper form input[type="date"]:focus~.label::after {
    top: -15px;
    left: 0px;
    transform: scale(1);
}

/* Margin */
.margin {
    margin: 2rem 0rem;
}

/* Media Queries */
@media(max-width: 575.5px) {
    .wrapper {
        margin: 10px;
    }

    .wrapper form {
        padding: 20px;
    }

    .margin {
        margin: .2rem 0rem;
    }
}
</style>

@endsection
