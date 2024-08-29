@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h4>Campaigns</h4>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('email_campaign.create') }}" class="btn btn-primary mb-3">Create New Campaign</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>List</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campaigns as $campaign)
                            <tr>
                                <td>{{ $campaign->list_name }}</td>
                                <td>{{ $campaign->emails_status }}</td>
                                <td>{{ $campaign->name }}</td>
                                <td>{{ $campaign->subject }}</td>
                                <td>{{ $campaign->created_at->format('M d Y, h:i:s A') }}</td>
                                <td>
                                    <button class="btn btn-success start-campaign" 
                                            data-id="{{ $campaign->id }}" 
                                            data-emails-per-hour="{{ $campaign->emails_per_hour }}">
                                        Start
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <x-pagination :paginator="$campaigns" />
                    </tfoot>
                </table>
            </div>

            <div class="col-md-4">
                <div id="email-status" class="col-12 bg-light p-3 border border-info">
                    <p>Time remaining for next email: <span id="timer">--</span></p>
                    <p>Emails sent: <span id="emails-sent">0</span></p>
                </div>
                <div id="log" class="col-12 bg-dark text-warning p-3">
                    <p>LOG :</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.start-campaign').click(function() {
            const campaignId = $(this).data('id');
            const emailsPerHour = parseInt($(this).data('emails-per-hour'));

            // Calculate the delay between emails
            const delay = Math.floor((60 * 60 * 1000) / emailsPerHour); // Time in milliseconds
            const minDelay = delay - 500; // Adding some randomness
            const maxDelay = delay + 500; // Adding some randomness

            let emailsSent = 0;
            let timerInterval;

            function startTimer(duration) {
                let remainingTime = duration;

                if (timerInterval) {
                    clearInterval(timerInterval);
                }

                timerInterval = setInterval(function() {
                    if (remainingTime <= 0) {
                        clearInterval(timerInterval);
                        $('#timer').text('0 seconds');
                    } else {
                        $('#timer').text(Math.ceil(remainingTime / 1000) + ' seconds');
                        remainingTime -= 1000; // Decrease by 1 second
                    }
                }, 1000);
            }

            function sendNextEmail() {
                $.ajax({
                    url: '{{ route('email_campaign.start') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        campaign_id: campaignId
                    },
                    success: function(response) {
                        if (response.error) {
                            $('#log').append(response.error + '<br>');
                            alert(response.error);
                        } else {
                            emailsSent++;
                            $('#log').append(response.success + '<br>');
                            $('#emails-sent').text(emailsSent);

                            // Random delay between minDelay and maxDelay
                            const randomDelay = Math.floor(Math.random() * (maxDelay - minDelay + 1)) + minDelay;
                            
                            // Start the countdown timer for the next email
                            startTimer(randomDelay);
                            
                            setTimeout(sendNextEmail, randomDelay);
                        }
                    },
                    error: function() {
                        alert('An error occurred while sending emails.');
                    }
                });
            }

            // Start the email sending process
            sendNextEmail();
        });
    });
</script>
@endsection
