@extends('layout')

@section('content')
    <div class="container">
        <form action="{{ '/speaker/'.($speaker ? $speaker->id: 0) }}" method="POST">
            {{ csrf_field() }}
            <div>
                <div>
                    Name:
                </div>
                <div>
                    <input type="text" name="name" value="{{$speaker ? $speaker->name: ''}}" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false">
                </div>
            </div>
            <div>
                <div>
                    Title:
                </div>
                <div>
                    <textarea name="title">{{$speaker ? $speaker->title: ''}}</textarea>
                </div>
            </div>
            <div class="flex-container form-group">
                @foreach(\App\Conference::all() as $event)
                    <div>
                        {{$event->name}} <input {{ $speaker && $speaker->attend($event) ? 'checked=checked': '' }} type="checkbox" name="events[]" value="{{$event->id}}"/>
                    </div>
                @endforeach
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection