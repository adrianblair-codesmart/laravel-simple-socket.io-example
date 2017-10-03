@extends('layouts.master') 
@section('content')
<div class="container">
    <div class="text-center"><h1>Laravel, Socket.io, and Redis Example</h1></div>
    <div class="row">
        <label for="data-input">Enter your message to send:</label>
        <div class="input-group">
            <input id="data-input" class="form-control" type="text">
            <span class="input-group-btn">
                <button id="data-input-button" class="btn btn-default" type="button">Send</button>
            </span>
        </div>
        <div id="output" class="text-center">Here the message you send will display...</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Echo.channel('channel-name')
            .listen('SendMessage', (e) => {
                console.log('message received: ' + e.data);
                $('#output').text('message received: ' + e.data);
            });

    $('#data-input-button').on("click", function () {
        var value = $('#data-input').val();

        axios.post('/SendMessage', {'data': value}).then(response => {
            console.log(response.data);
        });
    });
</script>
@endsection