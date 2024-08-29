@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Campaign</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('email_campaign.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Campaign Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="list_name">List Name</label>
                                <input type="text" id="list_name" name="list_name" class="form-control" placeholder="must be matching to email list" required>
                            </div>
                            <div class="form-group">
                                <label for="emails_per_hour">Emails per hour</label>
                                <input type="text" id="emails_per_hour" name="emails_per_hour" class="form-control" placeholder="must be matching to email list" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea id="body" name="body" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="attachment">Attachment (optional)</label>
                                <input type="file" id="attachment" name="attachment" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Campaign</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
