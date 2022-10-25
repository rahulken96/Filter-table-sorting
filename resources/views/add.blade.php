@extends('layouts.master')

@section('content')
    <h1 align="center" class="font-weight-normal text-black">Add Score List </h1>
    <div class="container">
        <main>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Add Data</h4>
                <form action="{{ route('score.store') }}" method="post" class="custom-validation">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="student" class="form-label">Student name</label>
                            <select class="form-select @error('student') is-invalid @enderror" name="student" id="exampleFormControlSelect1">
                                <option value="" disabled selected>-- Choose --</option>

                                @foreach ($students as $student)
                                    @if (old('student') == $student->id)
                                        <option value="{{ $student->id }}" selected> {{ $student->name }} </option>
                                    @else
                                        <option value="{{ $student->id }}"> {{ $student->name }} </option>
                                    @endif
                                @endforeach

                            </select>

                            @error('student')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label for="subject" class="form-label">Subject Category</label>
                            <select class="form-select @error('subject') is-invalid @enderror" name="subject" id="exampleFormControlSelect1">
                                <option value="" disabled selected>-- Choose --</option>

                                @foreach ($subjects as $subject)
                                    @if (old('subject') == $subject->id)
                                        <option value="{{ $subject->id }}" selected> {{ $subject->name }} </option>
                                    @else
                                        <option value="{{ $subject->id }}"> {{ $subject->name }} </option>
                                    @endif
                                @endforeach

                            </select>

                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="score" class="form-label">Score</label>
                            <input type="number" name="score" class="form-control @error('score') is-invalid @enderror"
                                id="score" placeholder="" value="{{ old('score') }}" min="0"
                                max="100" required>

                            @error('score')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <a class="w-25 btn btn-outline-danger" href="{{ route('score.index') }}">Exit</a>
                    <button type="submit" class="w-25 btn btn-outline-success">Save</button>
                </form>
        </main>
        @include('layouts.custom-js')
    </div>
@endsection
