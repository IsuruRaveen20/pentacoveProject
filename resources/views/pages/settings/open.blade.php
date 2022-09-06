<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Opening Time Settings</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('settings.day') }}">
                                            Settings
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Opening Time</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="row justify-content-center">
            <div class="col-xl-8 order-xl-1">
                <div class="shadow card">
                    <div class="card-body">
                        <div>
                            <div style="min-height: 20vh">
                                <form role="form" action="{{route('settings.update.day')}}" method="POST"
                                    enctype="multipart/form-data">
                                    <h6 class="mb-4 heading-small text-muted">Opening Time Information</h6>
                                    {{csrf_field()}}
                                    @if ($OpenTime ->count()==0)
                                    @for ($i = 0; $i < 7; $i++) <div class="col-lg-12">
                                        <label class="form-control-label" for="input-name"> {{$daysInWeek[$i]}}</label>
                                        <div class="mb-3 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="textday{{$i}}">Open Time & Close
                                                    Time</span>
                                            </div>
                                            <div class="input-group-text">
                                                <input type="checkbox" id="{{$i}}" onclick="setvalueday('{{$i}}');"
                                                    class="daysCheckbox">
                                            </div>
                                            <input type="time" class="form-control dayselect" id="dayopen{{$i}}"
                                                placeholder="Open Time" required name="{{$daysInWeekmin[$i]}}open">
                                            <input type="time" class="form-control dayselect" id="dayclose{{$i}}"
                                                placeholder="Close Time" required name="{{$daysInWeekmin[$i]}}close">
                                        </div>
                            </div>

                            @endfor
                            @else
                            @foreach ($OpenTime as $item)
                            @php
                            switch ($item['name']) {
                            case 'mon':
                            $key=0;
                            break;
                            case 'tue':
                            $key=1;
                            break;
                            case 'wed':
                            $key=2;
                            break;
                            case 'thu':
                            $key=3;
                            break;
                            case 'fri':
                            $key=4;
                            break;
                            case 'sat':
                            $key=5;
                            break;
                            case 'sun':
                            $key=6;
                            break;
                            }
                            @endphp
                            <div class="col-lg-12">
                                <label class="form-control-label" for="input-name"> {{$daysInWeek[$key]}}</label>
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="textday{{$key}}">Open Time & Close
                                            Time</span>
                                    </div>
                                    <div class="input-group-text">
                                        <input type="checkbox" id="{{$key}}" onclick="setvalueday('{{$key}}');"
                                            class="daysCheckbox" {{ ($item['status']==0) ?'checked':''}}>
                                    </div>
                                    <input type="time" class="form-control dayselect" id="dayopen{{$key}}"
                                        placeholder="Open Time" required name="{{$item['name']}}open"
                                        value="{{$item['open']}}">
                                    <input type="time" class="form-control dayselect" id="dayclose{{$key}}"
                                        placeholder="Close Time" required name="{{$item['name']}}close"
                                        value="{{$item['close']}}">
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name"> Special Note </label>
                                    <input type="text" id="input-name" name="note" class="form-control dayselect"
                                        placeholder="Enter Special Note"
                                        value="{{ isset($open_time_note->note) ?$open_time_note->note:''}}">
                                    @error('telephone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="text-center ">
                                            <input type="hidden" name="monstatus" id="dy0">
                                            <input type="hidden" name="tuestatus" id="dy1">
                                            <input type="hidden" name="wedstatus" id="dy2">
                                            <input type="hidden" name="thustatus" id="dy3">
                                            <input type="hidden" name="fristatus" id="dy4">
                                            <input type="hidden" name="satstatus" id="dy5">
                                            <input type="hidden" name="sunstatus" id="dy6">
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </x-slot>
    @push('styles')
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: rgb(38, 150, 124);
        }

        .nav-pills .nav-link {
            color: rgb(38, 150, 124);
        }

        .nav-pills .nav-link:hover {
            color: rgb(43, 179, 147);
        }

        .dayselect:focus {
            border: 2px solid rgb(38, 150, 124);
        }

        .input-group-text {

            color: #585858;
            border: 1px solid rgb(38, 150, 124);
        }

        .daysCheckbox {
            zoom: 1.2;
        }

        .dayselect {
            color: black;
            font-size: 12px;
            font-weight: 400;
        }

        input[type=text] {
            color: black;
            font-size: 14px;
            font-weight: 400;

        }

        .text-denger {
            color: rgb(255, 0, 0) !important;
        }

    </style>
    @endpush
    @push('scripts')
    <script>
        $(document).ready(function () {
            $('#homesubmenu').toggle();

            for (let i = 0; i < 7; i++) {
                setvalueday(i);
            }
        });

        function setvalueday(dayid) {
            daysInWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            var checkid = "textday" + dayid;
            var openid = "dayopen" + dayid;
            var closeid = "dayclose" + dayid;
            var status = "dy" + dayid;
            if (document.getElementById(dayid).checked) {
                document.getElementById(checkid).innerHTML = daysInWeek[dayid] + " Close";
                document.getElementById(checkid).classList.add("text-denger");
                document.getElementById(openid).disabled = true;
                document.getElementById(closeid).disabled = true;
                document.getElementById(status).value = "0";
            } else {
                document.getElementById(checkid).innerHTML = " Open Time & Close Time";
                document.getElementById(checkid).classList.remove("text-denger");
                document.getElementById(openid).disabled = false;
                document.getElementById(closeid).disabled = false;
                document.getElementById(status).value = "1";
                console.log(document.getElementById(dayid).value);
            }
        }

    </script>
    @endpush
</x-app-layout>
