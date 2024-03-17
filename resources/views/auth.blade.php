<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Please enter auth code</h1>
            @if($errors->any())
                <h4>{{$errors->first()}}</h4>
            @endif
            <form action="/auth-post" method="post">
                @csrf
                <div class="mb-3">
                    <label for="alias" class="form-label">Code</label>
                    <input type="number" class="form-control" id="code" name="code">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</form>
