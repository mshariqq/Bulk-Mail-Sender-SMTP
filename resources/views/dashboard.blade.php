@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <h4>Dashboard</h4>
        
        <div class="row mb-4">
            <div class="col-md-2">
                <div class="card bg-light text-dark mb-3">
                    <div class="card-header">Total Emails Sent</div>
                    <div class="card-body">
                        <p class="card-text">{{ $totalEmailsSent }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-light text-dark mb-3">
                    <div class="card-header">Total Today</div>
                    <div class="card-body">
                        <p class="card-text">{{ $totalEmailsSentToday }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-light text-dark mb-3">
                    <div class="card-header">Total This Week</div>
                    <div class="card-body">
                        <p class="card-text">{{ $totalEmailsSentThisWeek }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-light text-dark mb-3">
                    <div class="card-header">Total This Month</div>
                    <div class="card-body">
                        <p class="card-text">{{ $totalEmailsSentThisMonth }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card bg-light text-dark mb-3">
                    <div class="card-header">Total This Year</div>
                    <div class="card-body">
                        <p class="card-text">{{ $totalEmailsSentThisYear }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="mt-4">Latest 5 Campaigns</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>List Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestCampaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->name }}</td>
                        <td>{{ $campaign->subject }}</td>
                        <td>{{ $campaign->list_name }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
