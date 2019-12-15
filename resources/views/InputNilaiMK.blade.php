@extends('template.template')
@section('title', 'Input Nilai Mata Kuliah')
@section('css')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        #regForm {
            margin: auto;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #5395ed;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #146fe8;
        }

        input.form-control {
            text-align: right;
        }
    </style>
@endsection
@section('content')
    <div class="justify-content-md-center">
        <div class="card mb-3" style="width: 80%; margin: auto;">
            <div class="card-header">
                    <i class="fas fa-table"></i>
                    Input Nilai Mata Kuliah
            </div>
            <div class="card-body">
                <form id="regForm" action="/InputNilaiMK" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="tab">
                        <div class="form-group">
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk1[0]->IdMasterMK}}" class="form-control" name="{{$mk1[0]->BidangMinat}}[]" placeholder="{{$mk1[0]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk1[0]->IdMasterMK}}">{{$mk1[0]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk1[1]->IdMasterMK}}" class="form-control" name="{{$mk1[1]->BidangMinat}}[]" placeholder="{{$mk1[1]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk1[1]->IdMasterMK}}">{{$mk1[1]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk1[2]->IdMasterMK}}" class="form-control" name="{{$mk1[2]->BidangMinat}}[]" placeholder="{{$mk1[2]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk1[2]->IdMasterMK}}">{{$mk1[2]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk1[3]->IdMasterMK}}" class="form-control" name="{{$mk1[3]->BidangMinat}}[]" placeholder="{{$mk1[3]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk1[3]->IdMasterMK}}">{{$mk1[3]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk1[4]->IdMasterMK}}" class="form-control" name="{{$mk1[4]->BidangMinat}}[]" placeholder="{{$mk1[4]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk1[4]->IdMasterMK}}">{{$mk1[4]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk1[5]->IdMasterMK}}" class="form-control" name="{{$mk1[5]->BidangMinat}}[]" placeholder="{{$mk1[5]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk1[5]->IdMasterMK}}">{{$mk1[5]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk1[6]->IdMasterMK}}" class="form-control" name="{{$mk1[6]->BidangMinat}}[]" placeholder="{{$mk1[6]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk1[6]->IdMasterMK}}">{{$mk1[6]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="form-group">
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk2[0]->IdMasterMK}}" class="form-control" name="{{$mk2[0]->BidangMinat}}[]" placeholder="{{$mk2[0]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk2[0]->IdMasterMK}}">{{$mk2[0]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk2[1]->IdMasterMK}}" class="form-control" name="{{$mk2[1]->BidangMinat}}[]" placeholder="{{$mk2[1]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk2[1]->IdMasterMK}}">{{$mk2[1]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk2[2]->IdMasterMK}}" class="form-control" name="{{$mk2[2]->BidangMinat}}[]" placeholder="{{$mk2[2]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk2[2]->IdMasterMK}}">{{$mk2[2]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk2[3]->IdMasterMK}}" class="form-control" name="{{$mk2[3]->BidangMinat}}[]" placeholder="{{$mk2[3]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk2[3]->IdMasterMK}}">{{$mk2[3]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk2[4]->IdMasterMK}}" class="form-control" name="{{$mk2[4]->BidangMinat}}[]" placeholder="{{$mk2[4]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk2[4]->IdMasterMK}}">{{$mk2[4]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk2[5]->IdMasterMK}}" class="form-control" name="{{$mk2[5]->BidangMinat}}[]" placeholder="{{$mk2[5]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk2[5]->IdMasterMK}}">{{$mk2[5]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk2[6]->IdMasterMK}}" class="form-control" name="{{$mk2[6]->BidangMinat}}[]" placeholder="{{$mk2[6]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk2[6]->IdMasterMK}}">{{$mk2[6]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="form-group">
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk3[0]->IdMasterMK}}" class="form-control" name="{{$mk3[0]->BidangMinat}}[]" placeholder="{{$mk3[0]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk3[0]->IdMasterMK}}">{{$mk3[0]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk3[1]->IdMasterMK}}" class="form-control" name="{{$mk3[1]->BidangMinat}}[]" placeholder="{{$mk3[1]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk3[1]->IdMasterMK}}">{{$mk3[1]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk3[2]->IdMasterMK}}" class="form-control" name="{{$mk3[2]->BidangMinat}}[]" placeholder="{{$mk3[2]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk3[2]->IdMasterMK}}">{{$mk3[2]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk3[3]->IdMasterMK}}" class="form-control" name="{{$mk3[3]->BidangMinat}}[]" placeholder="{{$mk3[3]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk3[3]->IdMasterMK}}">{{$mk3[3]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk3[4]->IdMasterMK}}" class="form-control" name="{{$mk3[4]->BidangMinat}}[]" placeholder="{{$mk3[4]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk3[4]->IdMasterMK}}">{{$mk3[4]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk3[5]->IdMasterMK}}" class="form-control" name="{{$mk3[5]->BidangMinat}}[]" placeholder="{{$mk3[5]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk3[5]->IdMasterMK}}">{{$mk3[5]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk3[6]->IdMasterMK}}" class="form-control" name="{{$mk3[6]->BidangMinat}}[]" placeholder="{{$mk3[6]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk3[6]->IdMasterMK}}">{{$mk3[6]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="form-group">
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk4[0]->IdMasterMK}}" class="form-control" name="{{$mk4[0]->BidangMinat}}[]" placeholder="{{$mk4[0]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk4[0]->IdMasterMK}}">{{$mk4[0]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk4[1]->IdMasterMK}}" class="form-control" name="{{$mk4[1]->BidangMinat}}[]" placeholder="{{$mk4[1]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk4[1]->IdMasterMK}}">{{$mk4[1]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk4[2]->IdMasterMK}}" class="form-control" name="{{$mk4[2]->BidangMinat}}[]" placeholder="{{$mk4[2]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk4[2]->IdMasterMK}}">{{$mk4[2]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk4[3]->IdMasterMK}}" class="form-control" name="{{$mk4[3]->BidangMinat}}[]" placeholder="{{$mk4[3]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk4[3]->IdMasterMK}}">{{$mk4[3]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 mb-1">
                                    <div class="form-label-group">
                                        <input type="number" id="{{$mk4[4]->IdMasterMK}}" class="form-control" name="{{$mk4[4]->BidangMinat}}[]" placeholder="{{$mk4[4]->NamaMasterMK}}" autofocus="autofocus" min="0" max="100" value="0" oninput="this.className">
                                        <label for="{{$mk4[4]->IdMasterMK}}">{{$mk4[4]->NamaMasterMK}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" class="btn btn-outline-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </form>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }

        function validateForm() {
        // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == 0) {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                    break;
                } else if (y[i].value > 100) {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                    break;
                } else {
                    y[i].className = "form-control";
                    valid = true;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
    <script type="text/javascript" src="/cleaveJS/cleave.min.js"></script>
@endsection
