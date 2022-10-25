@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <h1 align="center" class="font-weight-normal text-black"> Score List </h1>
    @if ($pesan = session('success'))
        <div class="alert alert-success bg-success text-white alert-dismissible fade show col-2" role="alert">
            <Strong>{{ $pesan }}</Strong>
        </div>
    @endif

    Filter by Subject : <label for="areaFilter"></label>
    <select class="js-filter-drop" data-target="data-area" name="areaFilter" id="areaFilter">
        <option value="0" class="text-center" selected>--- Any ---</option>
        @foreach ($subjects as $subject)
            @if (old('areaFilter') == $subject->name)
                <option value="{{ $subject->name }}" selected>{{ $subject->name }}</option>
            @else
                <option value="{{ $subject->name }}">{{ $subject->name }}</option>
            @endif
        @endforeach
    </select>

    | <label for="colourFilter"> </label>
    <a href="{{ route('score.create') }}" type="button" data-toggle="tooltip" title="Lihat Data" class="btn btn-primary btn-lg"
        data-original-title="Lihat"> Add Score </a>

    <div class="table-wrapper">
        {{-- <table border="2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Log Name</th>
                    <th>Desc</th>
                    <th>Old</th>
                    <th>New</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dt as $act)

                @dd($act['proper'][''])
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $act['logName'] }}</td>
                        <td>{{ $act['desc'] }}</td>
                        <td>{{ print_r($act['old']) }}</td>
                        <td>{{ print_r($act['new']) }}</td>
                        <td>{{ isset($act['proper']->old) ? $act['proper']->old : '[]' }}</td>
                        <td>{{ isset($act['proper']['attributes']) ? $act['proper']['attributes'] : '[]' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
        <table id="js-sort-table" class="league">
            <thead>
                <tr>
                    <th class="league__pos">No</th>
                    <th class="league__team">Subject</th>
                    <th class="league__gd">Student</th>
                    <th class="league__points">Score</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1 @endphp
                @foreach ($scores as $score)
                    <tr class="league__champs" data-area="{{ getSubject($score->subject_id) }}">
                        <td class="league__pos">{{ $no++ }}</td>
                        <td class="league__team">{{ getSubject($score->subject_id) }}</td>
                        <td class="league__gd">{{ getStudent($score->student_id) }}</td>
                        <td class="league__points">{{ $score->score }}</td>
                        <td>
                            <form action="{{ route('score.destroy', $score->id) }} }}" method="POST" class="custom-validation">

                                <a href="{{ route('score.show', $score->id) }}" type="button" data-toggle="tooltip"
                                    title="Lihat Data" class="btn btn-primary btn-lg" data-original-title="Lihat">
                                    Read
                                </a>
                                <a href="{{ route('score.edit', $score->id) }}" type="button" data-toggle="tooltip"
                                    title="Ubah Data" class="btn btn-primary btn-lg" data-original-title="Ubah">Update</a>
                                @method('DELETE')
                                @csrf
                                <button type="submit" data-toggle="tooltip" title="Hapus Data" class="btn btn-danger"
                                    data-original-title="Hapus">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('layouts.custom-js')
@endsection
