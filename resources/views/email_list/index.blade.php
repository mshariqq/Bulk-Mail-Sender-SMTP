@extends('layouts.app')


@section('css')
   <style>
     tbody {
        color: #54595f;
    }
   </style>
@endsection
@section('content')
    <div class="container-fluid mt-4">

<div class="row">
    <div class="col-md-6">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <b>Email List Import</b>
            </div>
            <div class="card-body">
                <form action="{{ route('email_list.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="csv_file">Upload CSV File</label>
                        <input type="file" name="csv_file" id="csv_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>

    </div>

    <div class="col-md-6">

        <ul>
            <li>The CSV file should be in UTF-8 encoding.</li>
            <li>Each row should contain the following columns in this order:
                <ul>
                    <li><strong>Email:</strong> The email address.</li>
                    <li><strong>Company Name:</strong> (Optional) The company name.</li>
                    <li><strong>Person Name:</strong> (Optional) The person's name.</li>
                    <li><strong>Country:</strong> (Optional) The country.</li>
                    <li><strong>City:</strong> (Optional) The city.</li>
                </ul>
            </li>
            <li>Ensure that there are no empty headers or extraneous columns.</li>
            <li>Use commas to separate values and avoid including quotes.</li>
           
        </ul>


    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <b>Emails in the Database</b>
            </div>
            <div class="card-body">
                <form action="{{ route('email_list.delete_multiple') }}" method="POST">
                    @csrf
                    @method('DELETE')
        
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="select-all" />
                                    </th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Person Name</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>List Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($emailLists as $emailList)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="ids[]" value="{{ $emailList->id }}" />
                                        </td>
                                        <td>{{ $emailList->email }}</td>
                                        <td>{{ $emailList->company_name }}</td>
                                        <td>{{ $emailList->person_name }}</td>
                                        <td>{{ $emailList->country }}</td>
                                        <td>{{ $emailList->city }}</td>
                                        <td>{{ $emailList->list_name }}</td>
                                        <td>
                                            <form action="{{ route('email_list.destroy', $emailList->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
        
                    <button type="submit" class="btn btn-danger">Delete Selected</button>
                </form>
            </div>
            <div class="card-footer bg-light">
                <x-pagination :paginator="$emailLists" />

            </div>
        </div>

    </div>
</div>
        



    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#select-all').click(function() {
            $('input[name="ids[]"]').prop('checked', this.checked);
        });
    });
</script>
@endsection
