@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div style="width: 100%">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table style="border: 1px solid black">
                            <thead>
                            <th>Property 1</th>
                            <th>Property 2</th>
                            <th>Property 3</th>
                            <th>Property 4</th>
                            <th>Property 5</th>
                            <th>Property 6</th>
                            <th>Property 7</th>
                            <th>Property 8</th>
                            <th>Property 9</th>
                            <th>Property 10</th>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr style="border-bottom: 1px solid  grey">
                                    <td>{{$record->property_1}}</td>
                                    <td>{{$record->property_2}}</td>
                                    <td>{{$record->property_3}}</td>
                                    <td>{{$record->property_4}}</td>
                                    <td>{{$record->property_5}}</td>
                                    <td>{{$record->property_6}}</td>
                                    <td>{{$record->property_7}}</td>
                                    @if ($record->firstProp)
                                        <td>
                                            @foreach($record->firstProp as $first)
                                                {{$first->property_8}}<br>
                                            @endforeach
                                        </td>
                                    @endif
                                    @if ($record->secondProp)
                                        <td>
                                            @foreach($record->secondProp as $second)
                                                {{$second->property_9}}<br>
                                            @endforeach
                                        </td>
                                    @endif
                                    @if ($record->thirdProp)
                                        <td>
                                        @foreach($record->thirdProp as $third)
                                            {{$third->property_10}}<br>
                                        @endforeach
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
