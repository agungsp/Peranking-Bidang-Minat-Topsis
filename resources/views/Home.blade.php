@extends('template.template')
@section('title', 'Home')
@section('css')
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
@endsection
@section('content')
    <div class="jumbotron mt-2">
        <h1 class="display-4">Selamat datang, {{ $nm_pendek }}!</h1>
        <p class="lead">
            Program Peranking Bidang Minat.
        </p>
        <hr class="my-4">
        <p>
            Ini adalah program peranking bidang minat, yang mana akan membantu kamu dalam menentukan bidang minat jurusan Informatika yang ada di ITATS.
        </p>
        <a class="btn btn-primary btn-sm" style="float:right;" href="/InputNilaiMK" role="button">Mulai</a>
    </div>
    @if (!empty($topsis))
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Alternatif</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        arsort($topsis);
                        $i = 1;
                    @endphp
                    @foreach ($topsis as $key => $value)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $key }}</td>
                            <td>{{ number_format((float)$value*100, 2, '.', '') }}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
