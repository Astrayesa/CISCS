@extends("user.layouts.main")

@section('content')
    <section class="jurusan py-5">
        <div class="container">
            <div class="text-center">
                <h1>{{ $department->name_en }}</h1>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-5">
                    <table class="table table-bordered">
                        <tr>
                            <td>Code</td>
                            <th>{{ $department->code }}</th>
                        </tr>
                        <tr>
                            <td>Establishment Cert Number</td>
                            <th>{{ $department->establishment_cert_num }}</th>
                        </tr>
                        <tr>
                            <td>Accreditation Cert Number</td>
                            <th>{{ $department->accreditation_cert_num }}</th>
                        </tr>
                        <tr>
                            <td>Accreditation Ranking</td>
                            <th>{{ $department->accreditation_ranking }}</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="ratio ratio-16x9 mt-3">
                <iframe src="{{ asset($department->accreditation_file) }}" title="Accreditation File"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>
@endsection
