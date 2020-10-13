<html>
    <body>
       <h1>hellooooooo<h1>
       <p>ID:{{$id}}</p>
       @if ($msg !=''){
        <p>こんにちは.{{$msg}}.さん。</p>
       }
       @else
       <p>何か書いてください</p>
       @endif
       
       <p>{{$msg}}</p>
       <form method="POST" action="/test3_14">
            @csrf
            <input type="text" name="msg">
            <input type="submit">
        </from>
    </body>
</html>