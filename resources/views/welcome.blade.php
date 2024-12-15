<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Task Planner</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Developer Task Planner</h1>
        @forelse($developerPlans as $developerPlan)
            @foreach ($developerPlan['weeks'] as $week => $plan)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>Week {{ $week }}:</h5>
                        @if (isset($plan['tasks']) && count($plan['tasks']) > 0)
                            @foreach ($plan['tasks'] as $taskCategory => $tasks)
                                <div class="card-header">
                                    <h6>Developer {{ $taskCategory }}</h6>
                                </div>
                                <ul>
                                    @foreach ($tasks as $task)
                                        <li>{{ $task['name'] }}</li>
                                    @endforeach
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @empty
            <p>No developer plans available.</p>
        @endforelse
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
