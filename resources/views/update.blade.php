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
                @foreach ($scores as $score)
                    <form action="{{ route('score.update',$score->id) }}" method="POST" class="custom-validation">
                        @method('put')
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="student" class="form-label">Student name</label>
                                <input type="text" name="student" class="form-control" id="firstName" placeholder=""
                                    value="{{ old('student', (getStudent($score->student_id))) }}" readonly required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="subject" class="form-label">Subject Category</label>
                                <input type="text" name="subject" class="form-control" id="lastName" placeholder=""
                                    value="{{ old('subject', ($score->subject_id)) }}" readonly required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="score" class="form-label">Score</label>
                                <input type="number" name="score" class="form-control @error('score') is-invalid @enderror" id="score" placeholder="" value="{{ old('score', $score->score) }}" min="0" max="100" required>

                                @error('score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <br> --}}
                        {{-- <button type="submit" class="btn btn-info">Save</button> --}}
                        <a class="w-25 btn btn-outline-danger" href="{{ route('score.index') }}">Exit</a>
                        <button type="submit" class="w-25 btn btn-outline-success">Save</button>
                    </form>
                @endforeach
        </main>
        @include('layouts.custom-js')
    </div>
@endsection
