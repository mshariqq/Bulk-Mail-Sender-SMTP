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

    <div class="col-md-12">
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
