@extends('layouts.master')

@section('content')
    <h1 align="center" class="font-weight-normal text-white"> Score List </h1>
    @if ($pesan = session('success'))
        <div class="alert alert-success bg-success text-white alert-dismissible fade show col-2" role="alert">
            <Strong>{{ $pesan }}</Strong>
        </div>
    @endif
    <div class="container">
        <main>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Detail Data</h4>
                @foreach ($scores as $score )
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Student name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="{{ getStudent($score->student_id) }}" disabled required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Subject Category</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="{{ getSubject($score->subject_id) }}" disabled required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="lastName" class="form-label">Score</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="{{ $score->score }}" disabled required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                </div>
                @endforeach
                <br>
                <a type="button" class="btn btn-primary" href="{{ route('score.index') }}">Exit</a>
        </main>
        @include('layouts.custom-js')
    </div>
@endsection
