@extends('template.template')
@section('title', 'Hasil')
@section('content')
    <div class="justify-content-md-center">
        <div class="card card-md-6 mb-3" style="width: 80%; margin: auto;">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Hasil Perankingan
            </div>
            <div class="card-body">
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
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
@endsection
