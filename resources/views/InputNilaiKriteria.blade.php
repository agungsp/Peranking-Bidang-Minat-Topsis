@extends('template.template')
@section('title', 'Input Nilai Kriteria')
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
        <div class="card card-md-6 mb-3" style="width: 80%; margin: auto;">
            <div class="card-header">
                    <i class="fas fa-table"></i>
                    Input Nilai Kriteria
            </div>
            <div class="card-body">
                <form id="regForm" action="/InputNilaiKriteria" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                    @for ($i=0; $i < 3; $i++)
                        <div class="tab">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center" colspan="3">
                                                Topik: <br>
                                                {{ $kriteria[$i]->NmMKriteria }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($j=0; $j < 3; $j++)
                                            <tr>
                                                <td>{{$alternatif[$j]->NmMAlternatif}}</td>
                                                <td>
                                                    <input id="{{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}}" type="range" class="form-control-range" name="{{$alternatif[$j]->KdMAlternatif}}[]" value="3" min="1" max="5">
                                                </td>
                                                <td style="width: 20px;">
                                                    <span id="{{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}}val"></span>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            <dl class="row">
                                @php
                                    if ($kriteria[$i]->KdMKriteria == 'tertarik') {
                                        echo '<dt class="col-sm-3">Ketertarikan / Minat</dt>';
                                        echo '<dd class="col-sm-9">'.$desk_menarik.'</dd>';
                                    }
                                    if ($kriteria[$i]->KdMKriteria == 'lingkungan') {
                                        echo '<dt class="col-sm-3">Lingkungan Belajar</dt>';
                                        echo '<dd class="col-sm-9">'.$desk_lingkungan.'</dd>';
                                    }
                                    if ($kriteria[$i]->KdMKriteria == 'pekerjaan') {
                                        echo '<dt class="col-sm-3">Pekerjaan yang Diharapkan</dt>';
                                        echo '<dd class="col-sm-9">'.$desk_pekerjaan.'</dd>';
                                    }
                                @endphp
                            </dl>
                        </div>
                    @endfor
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
            topFunction();
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

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <script type="text/javascript">
        @for ($i=0; $i < 3; $i++)
            @for ($j=0; $j < 3; $j++)
                var {{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}} = document.getElementById("{{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}}");
                var {{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}}val = document.getElementById("{{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}}val");
                {{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}}val.innerHTML = {{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}}.value; // Display the default slider value
            @endfor
        @endfor

        @for ($i=0; $i < 3; $i++)
            @for ($j=0; $j < 3; $j++)
                {{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}}.oninput = function() {
                    {{$alternatif[$j]->KdMAlternatif.$kriteria[$i]->KdMKriteria}}val.innerHTML = this.value;
                }
            @endfor
        @endfor
    </script>
@endsection
