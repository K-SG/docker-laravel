<html>
    <body>
       <h1>hellooooooo<h1>
       <p>{{$id}}</p>
       <p>{{$msg}}</p>
       <form method="POST" action="/test3_14">
            @csrf
            <input type="text" name="msg">
            <input type="submit">
        </from>
    </body>
</html>