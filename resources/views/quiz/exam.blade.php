
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/mediaquery.css')}}">
    <title>Document</title>
</head>
<body>


<section class="exam">
    <div class="container">
        <h2 class="text-center p-5">{{$quiz->name}}</h2>

        <form action="{{route('quiz.result',$quiz->id)}}" method="post">
            @csrf

            @foreach($quiz['question'] as $item )
                <div class="card w-100 p-4" style="width: 18rem;">
                    {{$item->body}}
                    <div class="card-body">
                        @foreach($item->option as $o)
                            <div class="d-flex align-items-center ">
                                <input type="radio" name="questions[{{$item->id}}]" id="option-{{$o->id}}"
                                       value="{{$o->id}}">
                                <label for="option-{{$o->id}}">{{$o->option}}</label>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center m-4">
                <button class="btn btn-primary w-25 ">
                    submit
                </button>
            </div>

        </form>
        <?php
        use Symfony\Component\Process\Process;
        use Symfony\Component\Process\Exception\ProcessFailedException;
        exec('py C:/xampp/htdocs/EvaluateSystem/public/Proctoring-AI/eye_tracker.py');
        ?>

    </div>
</section>
<script src="{{URL::asset('js/all.min.js')}}"></script>
<script src="{{URL::asset('js/script.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
